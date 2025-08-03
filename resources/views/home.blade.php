@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 55vh; margin-top: 40px;">
    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 20px;">
        <div class="card-body">
            <h3 class="text-center mb-4 fw-bold" style="font-size: 32px;">{{ __('Dashboard') }}</h3>

            @if (session('status'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <p class="text-center">{{ __("You're logged in!") }}</p>

            <div class="text-center mt-4">
                <a href="{{ route('logout') }}" class="btn btn-danger w-100"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
