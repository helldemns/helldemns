@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
<div class="container-fluid">
    <div class="row min-vh-100">

        <!-- Login Form (Left Side) -->
        <div class="col-md-6 d-flex align-items-center ps-md-5" style="padding-left: 4rem;">
            <div class="w-100" style="max-width: 320px;">

                <!-- Logo -->
                <div class="mb-4">
                    <h1 style="
                        font-family: serif;
                        font-weight: 400;
                        font-size: 1rem;
                        letter-spacing: 1px;
                        text-transform: uppercase;
                        color: #3f3f3f;
                        margin: 0;
                    ">MULAI SESI</h1>
                </div>

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <input id="email" type="email"
                               class="form-control border-0 border-bottom rounded-0 shadow-none px-0 @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                               placeholder="SUREL"
                               style="background-color: transparent; font-size: 0.85rem;">
                        @error('email')
                            <span class="invalid-feedback d-block mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input id="password" type="password"
                               class="form-control border-0 border-bottom rounded-0 shadow-none px-0 @error('password') is-invalid @enderror"
                               name="password" required autocomplete="current-password"
                               placeholder="KATA SANDI"
                               style="background-color: transparent; font-size: 0.85rem;">
                        @error('password')
                            <span class="invalid-feedback d-block mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    @if (Route::has('password.request'))
                        <div class="mb-4">
                            <a class="text-decoration-none" href="{{ route('password.request') }}" style="font-size: 0.75rem; color: #555;">
                                Apakah Anda lupa kata sandi?
                            </a>
                        </div>
                    @endif

                    <div class="mb-3">
                        <button type="submit" class="btn btn-outline-dark rounded-0 py-2 px-4"
                                style="font-size: 0.85rem; letter-spacing: 1px; text-transform: uppercase;">
                                MULAI SESI
                        </button>
                    </div>
                </form>

            </div>
        </div>

        <!-- Full Height Image (Right Side) -->
        <div class="col-md-6 d-none d-md-block p-0">
            <img src="{{ asset('images/login-banner.png') }}" alt="Login Visual"
                 class="img-fluid w-100" style="height: 100vh; object-fit: cover;">
        </div>

    </div>
</div>

<style>
body {
    background-color: #ffffff;
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-size: 14px;
    color: #111;
}

input:focus {
    border-color: #000;
    box-shadow: none;
    outline: none;
}

/* Placeholder tetap uppercase, input tetap normal */
::placeholder {
    text-transform: uppercase;
}

.btn-outline-dark:hover {
    background-color: #000;
    color: #fff;
    border-color: #000;
}
</style>
@endsection
