@extends('template.main')

@section('main')

<div class="card mt-5 justify-content-center text-center w-50 m-auto">
    <div class="card-header bg-secondary">
        <h3 class="fw-normal text-white mt-2 text-align-center">Register Account</h3>
    </div>
    <div class="card-body">
        <main class="form-registration w-75 m-auto">
            <form action="/register" method="POST">
                @csrf
                <div class="form-floating">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="Name" value="{{ old('name') }}">
                    <label for="floatingInput">Name</label>
                    @error('name')
                        <div class="invalid-feedback text-start mb-3">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value='{{ old('email') }}'>
                    <label for="floatingInput">Email address</label>
                    @error('email')
                        <div class="invalid-feedback text-start mb-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    @error('password')
                        <div class="invalid-feedback text-start mb-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Confirm Password</label>
                    @error('confirm_password')
                        <div class="invalid-feedback text-start mb-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-success" type="submit">Register</button>
            </form>
            <small class="">Have an account? <a href="/login" class="text-decoration-none">Login Here</a></small>
          </main>
    </div>
  </div>



@endsection


<style>
    .form-registration input {
        margin-bottom: 10px;
    }
</style>
