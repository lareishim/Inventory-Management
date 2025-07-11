@extends('layouts.app')

  @section('title', 'Verify Email - AutoParts Pro')

  @section('content')
      <div class="auth-page">
          <main>
              <div class="gradient-card">
                  <h2 class="auth-title">Verify Your Email</h2>
                  <p>Before proceeding, please check your email for a verification link.</p>
                  <form method="POST" action="{{ route('verification.send') }}">
                      @csrf
                      <button type="submit" class="btn-gradient">Resend Verification Email</button>
                  </form>
                  <p class="auth-link">Didn’t receive the email? Check your spam folder or <a href="#">contact support</a>.</p>
              </div>
          </main>
      </div>
  @endsection