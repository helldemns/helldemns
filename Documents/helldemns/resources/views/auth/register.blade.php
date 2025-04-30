@extends('layouts.app')

@section('title')
    Daftar Akun
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-start align-items-center min-vh-100">
        <div class="col-md-5">

            <!-- Logo -->
            <div class="mb-5">
                <h1 style="font-family: serif; font-weight: 250; font-size: 1.5rem; letter-spacing: 1.5px;">DETAIL PRIBADI</h1>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="form-label">NAMA</label>
                    <input id="name" type="text" class="form-control border-0 border-bottom rounded-0 px-0 @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name">
                    @error('name')
                        <span class="invalid-feedback d-block mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label">EMAIL</label>
                    <input id="email" type="email" class="form-control border-0 border-bottom rounded-0 px-0 @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback d-block mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">KATA SANDI</label>
                    <input id="password" type="password" class="form-control border-0 border-bottom rounded-0 px-0 @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback d-block mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password-confirm" class="form-label">KONFIRMASI KATA SANDI</label>
                    <input id="password-confirm" type="password"
                        class="form-control border-0 border-bottom rounded-0 px-0"
                        name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="promo">
                    <label class="form-check-label small" for="promo">
                        I want to receive personalised commercial communications from <strong>MONARCH</strong> by email.
                    </label>
                </div>

                <div class="form-check mb-4">
                    <input type="checkbox" class="form-check-input" id="terms" required>
                    <label class="form-check-label small" for="terms">
                        Saya telah membaca dan memahami Kebijakan Privasi dan Cookie.
                    </label>
                </div>

                <div>
                    <button type="submit" class="btn btn-outline-dark rounded-0 px-5 py-2" style="font-size: 0.9rem;">
                        BUAT AKUN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #fff;
    }

    .form-label {
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        color: #000;
        font-weight: 400;
    }

    .form-control {
        font-size: 0.9rem;
        background-color: transparent;
    }

    input:focus {
        outline: none !important;
        box-shadow: none !important;
        border-color: #ccc !important;
    }

    .btn-outline-dark:hover {
        background-color: #000;
        color: #fff;
    }

    .form-check-input:focus {
        box-shadow: none;
    }
</style>
@endsection
