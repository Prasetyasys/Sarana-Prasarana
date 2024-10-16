@extends('layouts.app')

@section('content')
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="mb-5">
                    <a href="index.html"><img src={{ asset("pict/logo.svg") }} alt="Logo"></a>
                </div>
                <h1 class="auth-title">Log in.</h1>
                <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input id="username" type="username"
                            class="form-control form-control-xl @error('username') is-invalid @enderror" placeholder="Username"
                            name="username" value="{{ old('username') }}" autofocus>
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input id="password" type="password"
                            class="form-control form-control-xl  @error('password') is-invalid @enderror"
                            placeholder="Password" name="password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <div class="form-check form-check-lg d-flex align-items-end">
                        <input class="form-check-input me-2" type="checkbox" value name="remember" id="remember">
                        <label class="form-check-label text-gray-600" for="remember">
                            Keep me logged in
                        </label>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Log
                        in</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    @if (Route::has('register'))
                        <p class="text-gray-600">Don't have an account? <a href="{{ route('register') }}"
                                class="font-bold">Sign up</a>.</p>
                    @endif

                    @if (Route::has('password.request'))
                        <p><a class="font-bold" href="{{ route('password.request') }}">Forgot password?</a>.</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">
                <img src="{{ asset("pict/login1.svg") }}" class="img-fluid" alt="errorr">
            </div>
        </div>
    </div>
@endsection
