@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 75vh; margin-top: 40px;">
    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 20px;">
        <div class="card-body">
            <div class="text-center mb-1">
                <img src="{{ asset('images/laravel.png') }}" alt="Laravel Logo" style="height: 30px;">
            </div> 

            <h3 class="text-center mb-4 fw-bold" style="font-size: 32px;">{{ __('Register') }}</h3>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <input id="name" type="text" placeholder="{{ __('Name') }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input id="email" type="email" placeholder="{{ __('Email Address') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 position-relative">
                    <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <i class="fa fa-eye-slash toggle-password position-absolute" style="top: 50%; right: 15px; cursor: pointer;"></i>
                </div>

                <div class="mb-3 position-relative">
                    <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <i class="fa fa-eye-slash toggle-password-confirm position-absolute" style="top: 50%; right: 15px; cursor: pointer;"></i>
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-3">{{ __('Register') }}</button>

                <div class="text-center mb-2">
                    <span>{{ __('Already have an account?') }}</span>
                    <a href="{{ route('login') }}" class="text-decoration-none">{{ __('Login') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelector('.toggle-password').addEventListener('click', function (e) {
        const passwordField = document.getElementById('password');
        const icon = this;
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    });

    document.querySelector('.toggle-password-confirm').addEventListener('click', function (e) {
        const passwordConfirmField = document.getElementById('password-confirm');
        const icon = this;
        if (passwordConfirmField.type === 'password') {
            passwordConfirmField.type = 'text';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            passwordConfirmField.type = 'password';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    });
</script>
@endsection
