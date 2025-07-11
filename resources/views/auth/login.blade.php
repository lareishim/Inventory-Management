@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="login-box">
        <h2 class="text-2xl font-bold text-center mb-6">Log into your account</h2>

        <!-- Session Status -->
        @if (session('status'))
            <div class="status">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="form-options">
                <label>
                    <input type="checkbox" name="remember">
                    Remember me
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="text-decoration: none;">Forgot your password?</a>
                @endif
            </div>

            <!-- Log in -->
            <button type="submit" class="btn-primary">Log in</button>
        </form>

        <!-- Google Login -->
        <div class="google-login">
            <p>Google Log in:</p>
            <a href="{{ route('google.redirect') }}" class="btn-google">Sign in with Google</a>
        </div>

        <!-- Register & Home Links -->
        <div class="links">
            <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
            <p><a href="{{ url('/') }}">← Back to Home</a></p>
        </div>
    </div>
@endsection