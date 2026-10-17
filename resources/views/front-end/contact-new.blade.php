@extends('front-end.layouts.master')

@section('title', 'Contact')

@section('seo')
    <meta property="og:title" content="Hitech contact" />
    <meta property="twitter:title" content="Hitech contact" />
    <meta property="og:description" content="Hi tech water contact" />
    <meta property="twitter:description" content="Hi tech water contact" />
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('front-end/css/contact.css') }}">
@endsection

@section('content')
    <!-- Background Image Section -->
    <section class="contact-section" id="contact-section">
        <div class="contact-content">
            <h1>{{ __('lang.contactus') }}</h1>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="contact-info-section">
        <div class="contact-details">
            <!-- Address Section -->
            <div class="detail-item">
                <div class="icon">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>{{ $company->address }}</p>
                </div>
            </div>

            <!-- Phone Section -->
            <div class="detail-item">
                <div class="icon">
                    <i class="fas fa-phone"></i>
                    @php
                        $phoneEx = explode(' ', $company->company_phone);
                    @endphp
                    @foreach ($phoneEx as $phone)
                        <p>(+855) {{ $phone }}</p>
                    @endforeach
                </div>
            </div>

            <!-- Email Section -->
            <div class="detail-item">
                <div class="icon">
                    <i class="fas fa-envelope"></i>
                    <p>{{ $company->company_email }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tell Us Section -->
    <section class="tell-us-section">
        <div class="tell-us-content">
            <a href="{{ route('user.home') }}" class="btn">{{ __('lang.leaveMessage') }}</a>
            <h2>{{ __('lang.tellus') }}</h2>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div class="contact-form-content">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ __('lang.contactSuccessMessage') }}
                </div>
            @else
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.save') }}" autocomplete="off">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name">{{ __('lang.yourname') }}</label>
                        <input type="text" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('lang.youremail') }} <span>*</span></label>
                        <input type="email" id="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="subject">{{ __('lang.subject') }}</label>
                        <input type="text" id="subject" name="subject" placeholder="Subject" value="{{ old('subject') }}">
                    </div>

                    <div class="form-group">
                        <label for="phone">{{ __('lang.yourphone') }}</label>
                        <input type="tel" id="phone" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                    </div>

                    <div class="form-group full-width">
                        <label for="message">{{ __('lang.canIhelpyou') }}</label>
                        <textarea id="message" name="description" placeholder="Your Message">{{ old('description') }}</textarea>
                    </div>

                    <button type="submit">{{ __('lang.submit') }}</button>
                </form>
            @endif
        </div>
    </section>
@endsection