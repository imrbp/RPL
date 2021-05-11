@extends('layouts.app')
@section('title', 'Login')

@section('content')
<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<!-- Validation Errors -->
<x-auth-validation-errors class="mb-4" :errors="$errors" />

<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div class="m-3">
        <x-label for="login" :value="__('Email/Username')" />
        <input type="text" class="form-control {{ $errors->has('username') || $errors->has('email') ?'is-invalid':'' }}" name="login" value="{{ old('username') ? old('username') : old('email')  }}" placeholder="Username or Email" />
        <!-- <x-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('username')?:old('email')" required autofocus /> -->
    </div>

    <!-- Password -->
    <div class="m-4">
        <x-label for="password" :value="__('Password')" />


        <x-input id="password" class="block mt-1 w-full" type="text" name="password" required autocomplete="current-password" />
    </div>

    <!-- Forgot Password -->
    <p>Forgot <a href="">password?</a></p>
    <!-- Register -->
    <p>Don't have an account? <a href="{{route('register')}}">Register</a></p>

    <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
        </a>
        @endif

        <x-button class="ml-3">
            {{ __('Log in') }}
        </x-button>
    </div>

</form>

@endsection