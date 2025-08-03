@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 75vh; margin-top: 40px;">
    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 20px;">
        <div class="card-body">
            <div class="text-center mb-1">
                <img src="{{ asset('images/laravel.png') }}" alt="Laravel Logo" style="height: 30px;">
            </div>   
        
            <h3 class="text-center mb-4 fw-bold" style="font-size: 32px;">{{ __('Login') }}</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <input id="email" type="email" placeholder="{{ __('Email') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-0 position-relative">
                    <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <i class="fa fa-eye-slash toggle-password position-absolute" style="top: 50%; right: 15px; cursor: pointer;"></i>
                </div>
              
                <div class="form-check mb-3" style="margin-left: -6px;">
                    <input class="form-check-input" style="font-size: 10px; transform: translateY(4.5px);"  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember" style="font-size: 10px;" >
                        {{ __('Remember me') }}
                    </label>
                </div>

                <div class="text-center mb-4">
                    <a class="text-decoration-none" style="font-size: 13px;" href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-3">{{ __('Login') }}</button>

                <div class="text-center mb-2">
                    <span>{{ __("Don't have an account?") }}</span>
                    <a href="{{ route('register') }}" class="text-decoration-none">{{ __('Signup') }}</a>
                </div>

                <div class="or-separator d-flex align-items-center my-4">
                    <hr class="flex-grow-1">
                    <span class="mx-2">{{ __('Or') }}</span>
                    <hr class="flex-grow-1">
                </div>

                <a href="{{ url('auth/google') }}" class="btn btn-light w-100 border d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/google.png') }}" style="height: 18px; margin-right: 10px;">
                    {{ __('Login with Google') }}
                </a>
            </form>
        </div>
    </div>
</div>
@endsection