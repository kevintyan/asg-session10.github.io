<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    //
    public function index() {
        return view('credentials.login');
    }

    public function login_auth(Request $request) {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginFailed', 'Wrong Email Address or Password!');
    }

    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }
    public function redirectToGithub() {
        return Socialite::driver('github')->redirect();
    }

    public function handleGoogleCallback() {
        $user = Socialite::driver('google')->user();

        $this->registerOrLoginUser($user);

        return redirect('/dashboard');
    }
    public function handleGithubCallback() {
        $user = Socialite::driver('github')->user();

        $this->registerOrLoginUser($user);

        return redirect('/dashboard');
    }

    protected function registerOrLoginUser($data) {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->provider_id;
            $user->avatar = $data->avatar;
            $user->save();
        }

        Auth::login($user);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
