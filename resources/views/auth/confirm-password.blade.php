@extends('layouts.app')

  @section('title', 'Confirm Password - AutoParts Pro')

  @section('content')
      <div class="auth-page">
          <main>
              <div class="gradient-card">
                  <h2 class="auth-title">Confirm Password</h2>
                  <form method="POST" action="{{ route('password.confirm') }}">
                      @csrf
                      <div class="input-group icon-input">
                          <label for="password">Password</label>
                          <div class="input-wrapper">
                              <span class="input-icon">🔒</span>
                              <input type="password" name="password" id="password" placeholder=" password" required />
                          </div>
                      </div>
                      <button type="submit" class="btn-gradient">Confirm</button>
                  </form>
              </div>
          </main>
      </div>
  @endsection