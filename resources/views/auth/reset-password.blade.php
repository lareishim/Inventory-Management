@extends('layouts.app')

@section('title', 'Reset Password - AutoParts Pro')

@section('content')
    <div class="auth-page">
        <main>
            <div class="gradient-card">
                <h2 class="auth-title">Reset Password</h2>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="input-group icon-input">
                        <label for="email">Email</label>
                        <div class="input-wrapper">
                            <span class="input-icon">✉</span>
                            <input type="email" name="email" id="email" placeholder=" email" required />
                        </div>
                    </div>
                    <div class="input-group icon-input">
                        <label for="password">New Password</label>
                        <div class="input-wrapper">
                            <span class="input-icon">🔒</span>
                            <input type="password" name="password" id="password" placeholder=" new password" required />
                        </div>
                    </div>
                    <div class="input-group icon-input">
                        <label for="password_confirmation">Confirm Password</label>
                        <div class="input-wrapper">
                            <span class="input-icon">🔒</span>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                placeholder=" confirm password" required />
                        </div>
                    </div>
                    <button type="submit" class="btn-gradient">Reset Password</button>
                </form>
            </div>
        </main>
    </div>
@endsection