@extends('layouts.app')

@section('title', 'AutoParts Pro - Home')

@section('content')
    <section class="features">
        <h1 style="margin-bottom: 20px;">Welcome To AutoParts Pro.</h1>
        <img src="{{ asset('images/car.webp') }}" alt="Car Icon" style="height: 600px; margin-bottom: 20px;">
        <h2>Why Choose AutoParts Pro?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🔧</div>
                <h3>Comprehensive Catalog</h3>
                <p>Access thousands of genuine and aftermarket car parts for all makes and models.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🚗</div>
                <h3>Vehicle Compatibility</h3>
                <p>Advanced search by VIN, make, model, and year to find the exact parts you need.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📦</div>
                <h3>Fast Shipping</h3>
                <p>Quick delivery with real-time tracking for all your automotive parts orders.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💰</div>
                <h3>Competitive Pricing</h3>
                <p>Best prices on quality car parts with bulk discounts for auto shops and dealers.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Secure Checkout</h3>
                <p>We ensure your payment and personal information are always secure.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📞</div>
                <h3>Expert Support</h3>
                <p>Talk to certified car part specialists for guidance and support.</p>
            </div>
        </div>
    </section>

    <section class="stats">
        <h2>Trusted by Auto Professionals Worldwide</h2>
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">50,000+</div>
                <div class="stat-label">Car Parts Available</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">1,200+</div>
                <div class="stat-label">Auto Shops Served</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">99.8%</div>
                <div class="stat-label">Order Accuracy</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">24/</div>
                <div class="stat-label">Technical Support</div>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="cta-content">
            <h2>Ready to Get Started?</h2>
            <p>Join thousands of auto professionals already using AutoParts Pro for their parts inventory needs.</p>
            <a href="{{ route('register') }}" class="btn btn-primary">Start Free Trial</a>
        </div>
    </section>
@endsection