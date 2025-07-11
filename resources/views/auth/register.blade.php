@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="login-box">
        <h2 class="text-2xl font-bold text-center mb-6">Create an Account</h2>

        {{-- Session Message --}}
        @if(session('success'))
            <div class="status">{{ session('success') }}</div>
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="error">
                <ul style="padding-left: 1rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.submit') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="register-name">Name</label>
                <input id="register-name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="register-email">Email</label>
                <input id="register-email" type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="register-password">Password</label>
                <input id="register-password" type="password" name="password" required>
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="register-password-confirmation">Confirm Password</label>
                <input id="register-password-confirmation" type="password" name="password_confirmation" required>
            </div>

            <!-- Register -->
            <button type="submit" class="btn-primary">Register</button>
        </form>

        <!-- Links -->
        <div class="links">
            <p>Already have an account? <a href="{{ route('login') }}">Log in</a></p>
            <p><a href="{{ url('/') }}">← Back to Home</a></p>
        </div>
    </div>
@endsection