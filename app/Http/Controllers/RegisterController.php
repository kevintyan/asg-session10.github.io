<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    //
    public function index() {
        return view('credentials.register');
    }

    public function create(Request $request) {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $validation['password'] = bcrypt($validation['password']);

        User::create($validation);
        return redirect('/login')->with('success', 'Registration successful! Please login');
    }
}
