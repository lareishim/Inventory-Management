@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
    <div class="login-box">
        <h2 class="text-2xl font-bold text-center mb-6">Forgot Password</h2>

        @if (session('status'))
            <div class="status">{{ session('status') }}</div>
        @endif

        @if($errors->any())
            <div class="error">
                <ul style="padding-left: 1rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn-primary">Send Reset Link</button>
        </form>

        <div class="links">
            <p><a href="{{ route('login') }}">← Back to Login</a></p>
        </div>
    </div>
@endsection