@extends('template.main')

@section('main')

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
@endif
@if (session()->has('loginFailed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginFailed') }}
    </div>
@endif


<div class="card mt-5 justify-content-center text-center w-50 m-auto">
    <div class="card-header bg-secondary">
        <h3 class="fw-normal text-white mt-2 text-align-center">Login Page</h3>
    </div>
    <div class="card-body">
        <main class="form-registration w-75 m-auto">
            <form action="/login" method="POST">
                @csrf
              <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
              {{-- <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" name="password" value="remember-me"> Remember me
                </label>
              </div> --}}
              <button class="w-100 btn btn-lg btn-success" type="submit">Login</button>
            </form>
            <small class="">Don't have an account? <a href="/register" class="text-decoration-none">Register now</a></small>
            <hr>
            <a href="/login/google" class="btn btn-danger w-100 mb-3">Login with Google <i class="bi-google"></i></a>
            <a href="/login/github" class="btn btn-dark w-100 mb-3">Login with Github <i class="bi-github"></i></a>
          </main>
    </div>
  </div>

@endsection


<style>
    .form-registration input {
        margin-bottom: 10px;
    }

</style>
