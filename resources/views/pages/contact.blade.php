@extends('layouts.app')

@section('title', 'Contact - AutoParts Pro')

@section('content')
    <main class="contact-main">

        {{-- Success Alert --}}
        @if(session('success'))
            <div class="alert alert-success" style="margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="contact-card">
            <h2 class="auth-title">Contact Us</h2>

            {{-- Form --}}
            <form id="contact-form" action="{{ route('contact.send') }}" method="POST">
                @csrf

                <div class="input-group icon-input">
                    <label for="contact-name">Name</label>
                    <div class="input-wrapper">
                        <span class="input-icon">👤</span>
                        <input type="text" id="contact-name" name="name" placeholder=" Your name" required />
                    </div>
                </div>

                <div class="input-group icon-input">
                    <label for="contact-email">Email</label>
                    <div class="input-wrapper">
                        <span class="input-icon">✉</span>
                        <input type="email" id="contact-email" name="email" placeholder=" Your email" required />
                    </div>
                </div>

                <div class="input-group icon-input">
                    <label for="contact-message">Message</label>
                    <div class="input-wrapper">
                        <span class="input-icon">✎</span>
                        <textarea id="contact-message" name="message" placeholder=" Your message" required
                            style="resize:vertical; min-height:80px;"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn gradient-btn" style="width:100%;margin-top:1rem;">
                    Send Message
                </button>
            </form>
        </div>

        <div class="contact-info-card">
            <h3>General Inquiries</h3>
            <p>Have a question or just want to say hello? Get in touch:</p>
            <p><strong>Email:</strong> <a href="mailto:support@autopartspro.com">support@autopartspro.com</a></p>
            <p><strong>Phone:</strong> <a href="tel:+1234567890">+1 234 567 890</a></p>

            <h3 style="margin-top:2rem;">Our Location</h3>
            <p>123 Main Street<br>City, Country</p>

            <h3 style="margin-top:2rem;">Newsletter</h3>
            <p>Exclusive updates & offers.<br><a href="#">Sign up here »</a></p>
        </div>
    </main>
@endsection