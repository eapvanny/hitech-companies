@extends('front-end.layouts.master')

@section('title', 'Contact')

@section('seo')

<meta property="og:title" content="Hitech contact" />
<meta property="twitter:title" content="Hitech contact " />
<meta property="og:description" content="Hi tech water contact" />
<meta property="twitter:description" content="Hi tech water contact" />

@endsection


@section('styles')
    <style>
        /* Reset some default styles for consistency */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Background Image Section */
        .contact-section {
            position: relative;
            background-image: url({{asset('images/contact-image.jpg')}});
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            animation: fadeIn 1.5s ease-out;
        }
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .contact-content h1 {
            font-size: clamp(2rem, 5vw, 3rem); /* Responsive font size */
            font-weight: bold;
            text-transform: uppercase;
        }

        .icon {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .contact-details {
            background-color:#1a6aa8;
            position: relative;
            z-index: 2;
            padding: 40px 20px;
            border-radius: 10px;
            max-width: 85%; /* Adjusted for smaller screens */
            width: 100%;
            margin: -90px auto 20px;
        }

        .contact-details {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
        }

        .contact-details .detail-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            flex: 1;
        }

        .contact-details p {
            margin: 0 20px;
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            line-height: 1.5;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: left;
            margin-top: 10px;
        }

        .contact-details i {
            font-size: clamp(1.2rem, 2.5vw, 1.5rem);
            color: white;
            margin: auto;
        }

        /* Tell Us About Yourself Section */
        .tell-us-section {
            min-height: 40vh; /* Reduced height for smaller screens */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .tell-us-content h2 {
            font-size: clamp(1.8rem, 4vw, 3rem);
            font-weight: bold;
            color: #000;
            margin: 15px;
        }

        .tell-us-content p {
            font-size: clamp(0.9rem, 2vw, 1rem);
            color: #666;
            margin-bottom: 20px;
            max-width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        .tell-us-content .btn {
            background-color: #1a6aa8;
            color: #fff;
            border-radius: 30px;
            padding: 10px;
            text-decoration: none;
            font-size: clamp(0.9rem, 2vw, 1rem);
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .tell-us-content .btn:hover {
            background-color: #1557b0;
        }

        /* Contact Form Section Styling */
        .contact-form-section {
            min-height: 50vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            background-image: url('https://via.placeholder.com/1200x600?text=Background+Image'); /* Replace with actual background image URL */
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .contact-form-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .contact-form-content {
            position: relative;
            z-index: 2;
            max-width: 1200px;
            width: 100%;
            padding: 0 15px; /* Added padding for smaller screens */
        }

        .contact-form-content h2 {
            font-size: clamp(1.5rem, 3vw, 2rem);
            font-weight: bold;
            color: #000;
            margin-bottom: 20px;
            text-align: center;
        }

        .contact-form-content form {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .contact-form-content .form-group {
            flex: 1 1 45%;
            display: flex;
            flex-direction: column;
        }

        .contact-form-content .form-group.full-width {
            flex: 1 1 100%;
        }

        .contact-form-content label {
            font-size: clamp(0.8rem, 1.5vw, 0.9rem);
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .contact-form-content label span {
            color: red;
        }

        .contact-form-content input,
        .contact-form-content textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: clamp(0.9rem, 1.5vw, 1rem);
            color: #666;
            width: 100%;
        }

        .contact-form-content textarea {
            resize: vertical;
            min-height: 120px;
        }

        .contact-form-content button {
            background-color: #ccc;
            color: #333;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            font-size: clamp(0.9rem, 1.5vw, 1rem);
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 20px auto 0;
            display: block;
        }

        .contact-form-content button:hover {
            background-color: #bbb;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .contact-section {
                min-height: 60vh; /* Reduced height for mobile */
            }
            .contact-details {
                flex-direction: row;
                gap: 20px;
                padding: 15px;
                margin: 20px auto;
            }
            .contact-details p {
                font-size: clamp(1rem, 1.5vw, 0.9rem);
                padding-bottom: 20px;
                text-align: center;
                margin: 0;
            }

            .contact-details i {
                font-size: clamp(2.3rem, 2vw, 1.2rem);
                padding-top: 20px;
                padding-bottom: 10px
            }
            .contact-details .detail-item {
                justify-content: center;
                text-align: center;
            }
            .tell-us-section{
                min-height: 30vh;
            }
            .tell-us-content h2 {
                font-size: clamp(2.8rem, 3vw, 2rem);
                padding: 10px 0;

            }
            .tell-us-content a{
               margin-bottom: 20px;
            }
            .tell-us-content p {
                font-size: clamp(1.3rem, 1.5vw, 0.9rem);
                padding: 0 10px;
                max-width: 100%;
            }
            .tell-us-content .btn {
                padding: 10px 20px;
                font-size: clamp(1.2rem, 1.5vw, 0.8rem);
            }
            .contact-form-section {
                padding: 30px 15px;
                min-height: 40vh;
            }

            .contact-form-content {
                padding: 0 10px;
                max-width: 1200px;
            }

            .contact-form-content h2 {
                font-size: clamp(1.2rem, 2.5vw, 1.5rem);
            }

            .contact-form-content form {
                gap: 10px;
            }

            .contact-form-content input,
            .contact-form-content textarea {
                padding: 8px;
                font-size: clamp(0.8rem, 1.5vw, 0.9rem);
            }

            .contact-form-content textarea {
                min-height: 150px;
            }
            .contact-form-content button {
                padding: 8px 16px;
                font-size: clamp(1rem, 1.5vw, 0.9rem);
            }
        }

        @media (max-width: 768px) {
            .contact-section {
                min-height: 60vh; /* Reduced height for mobile */
            }

            .contact-content h1 {
                font-size: clamp(1.5rem, 4vw, 2rem);
            }

            .contact-details {
                margin: 20px auto;
                max-width: 95%;
                padding: 15px;
            }
            .contact-details p {
                font-size: clamp(1.1rem, 1.5vw, 0.9rem);
            }

            .contact-details i {
                font-size: clamp(2rem, 2vw, 1.2rem);
                padding: 10px
            }
            .tell-us-section {
                min-height: 30vh;
                padding: 15px;
            }

            .tell-us-content h2 {
                font-size: clamp(2.5rem, 3vw, 2rem);
            }

            .tell-us-content p {
                font-size: clamp(1.3rem, 1.5vw, 0.9rem);
                max-width: 100%;
            }

            .tell-us-content .btn {
                padding: 8px 16px;
                font-size: clamp(1rem, 1.5vw, 0.9rem);
            }

            .contact-form-section {
                padding: 30px 15px;
                min-height: 40vh;
            }

            .contact-form-content {
                padding: 0 10px;
            }

            .contact-form-content h2 {
                font-size: clamp(1.2rem, 2.5vw, 1.5rem);
            }

            .contact-form-content form {
                gap: 10px;
            }

            .contact-form-content input,
            .contact-form-content textarea {
                padding: 8px;
                font-size: clamp(0.8rem, 1.5vw, 0.9rem);
            }

            .contact-form-content textarea {
                min-height: 150px;
            }
            .contact-form-content button {
                padding: 8px 16px;
                font-size: clamp(1rem, 1.5vw, 0.9rem);
            }
        }

        @media (max-width: 480px) {
            .contact-section {
                min-height: 50vh;
            }

            .contact-details .detail-item {
                justify-content: center;
                text-align: center;
            }
            .tell-us-section{
                min-height: 30vh;
            }
            .contact-form-content .form-group {
                flex: 1 1 100%; /* Stack form fields on tablet */
            }
            .contact-content h1 {
                font-size: clamp(1.2rem, 3vw, 1.5rem);
            }

            .contact-details {
                margin: 20px auto 10px;
                padding: 40px 10px;
                flex-direction: column;
                align-items: center;
            }

            .contact-details p {
                font-size: clamp(1.1rem, 1.5vw, 0.9rem);
            }

            .contact-details i {
                font-size: clamp(2rem, 2vw, 1.2rem);
                padding: 10px
            }

            .tell-us-section {
                min-height: 20vh;
                padding: 10px;
            }

            .tell-us-content h2 {
                font-size: clamp(1.3rem, 2.5vw, 1.5rem);
            }

            .tell-us-content p {
                font-size: clamp(1rem, 1.5vw, 0.8rem);
            }

            .tell-us-content .btn {
                padding: 6px 12px;
                font-size: clamp(0.7rem, 1.5vw, 0.8rem);
            }

            .contact-form-section {
                padding: 20px 10px;
                min-height: 30vh;
            }

            .contact-form-content h2 {
                font-size: clamp(1rem, 2vw, 1.2rem);
            }

            .contact-form-content form {
                gap: 8px;
            }

            .contact-form-content input,
            .contact-form-content textarea {
                padding: 6px;
                font-size: clamp(0.7rem, 1.5vw, 0.8rem);
            }

            .contact-form-content textarea {
                min-height: 80px;
            }

            .contact-form-content button {
                padding: 6px 12px;
                font-size: clamp(0.7rem, 1.5vw, 0.8rem);
            }
        }
    </style>
@endsection

@section('content')
    <!-- Background Image Section -->
    <section class="contact-section" id="contact-section">
        <div class="contact-content">
            <h1> {{ __('lang.contactus') }} </h1>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="contact-info-section">
        <div class="contact-details">
            <!-- Address Section with Map Marker Icon -->
            <div class="detail-item">
                <div class="icon">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>
                        {{ $company->address }}
                    </p>
                </div>
            </div>
            <!-- Other Contact Details -->
            <div class="detail-item">
                <div class="icon">
                    <i class="fas fa-phone"></i>
                        @php
                            $phoneEx = explode(' ', $company->company_phone);
                        @endphp
                        @foreach ($phoneEx as $phone)
                            <p> (+855) {{ $phone }} </p>
                        @endforeach
                </div>
            </div>
            <div class="detail-item">
                <div class="icon">
                    <i class="fas fa-envelope"></i>
                    <p> {{ $company->company_email }} </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tell Us About Yourself Section -->
    <section class="tell-us-section">
        <div class="tell-us-content">
            <a href="{{ route('user.home') }}" class="btn"> {{ __('lang.leaveMessage') }} </a>
            <h2>{{__('lang.tellus')}}</h2>
            {{-- <p>Fusce placerat pretium mauris, vel sollicitudin elit lacinia vitae. Quisque sit amet nisi erat.</p> --}}
        </div>
    </section>


    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div class="contact-form-content">

            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ __('lang.contactSuccessMessage') }}
                </div>
            @elseif (session()->has('error'))
                <form method="post" action="{{ route('contact.save') }}" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{__('lang.yourname')}}</label>
                        <input type="text" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="email"> {{ __('lang.youremail') }} <span>*</span></label>
                        <input type="email" id="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="subject"> {{ __('lang.subject') }} </label>
                        <input type="text" id="subject" name="subject" placeholder="Subject" value="{{ old('subject') }}">
                    </div>
                    <div class="form-group">
                        <label for="phone"> {{ __('lang.yourphone') }} </label>
                        <input type="tel" id="phone" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                    </div>
                    <div class="form-group full-width">
                        <label for="message"> {{ __('lang.canIhelpyou') }} </label>
                        <textarea id="message" name="description" placeholder="Your Message">{{ old('description') }}</textarea>
                    </div>
                    <button type="submit"> {{ __('lang.submit') }} </button>
                </form>
            @else
                <form method="post" action="{{ route('contact.save') }}" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{__('lang.yourname')}}</label>
                        <input type="text" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="email"> {{ __('lang.youremail') }} <span>*</span></label>
                        <input type="email" id="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="subject"> {{ __('lang.subject') }} </label>
                        <input type="text" id="subject" name="subject" placeholder="Subject" value="{{ old('subject') }}">
                    </div>
                    <div class="form-group">
                        <label for="phone"> {{ __('lang.yourphone') }} </label>
                        <input type="tel" id="phone" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                    </div>
                    <div class="form-group full-width">
                        <label for="message"> {{ __('lang.canIhelpyou') }} </label>
                        <textarea id="message" name="description" placeholder="Your Message">{{ old('description') }}</textarea>
                    </div>
                    <button type="submit"> {{ __('lang.submit') }} </button>
                </form>
            @endif
            
        </div>
    </section>
@endsection