@extends('front-end.layouts.master')

@section('title', 'About Us')
@php
    $lang = session('user_lang', 'kh'); // default kh
@endphp
@section('seo')
    <meta property="og:title" content="About HI-TECH Water" />
    <meta property="twitter:title" content="About HI-TECH Water" />
    <meta property="og:description" content="{{ $ourcompany->{'description_' . $lang} }}" />
    <meta property="twitter:description" content="{{ $ourcompany->{'description_' . $lang} }}" />
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('front-end/css/about.css') }}">
@endsection

@section('content')
    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="about-container">
                <div class="about-content">
                    <h1>{{ __('lang.ourcompany') }}</h1>
                    <p>{!! $ourcompany->{'description_' . $lang} !!}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Commitment Section -->
    <!-- MESSAGES SECTION -->
    @foreach ($messages as $m)
        <section class="commitment-section">
            <div class="container">
                <div class="commitment-container">
                    <div class="commitment-content">

                        <div class="commitment-image">
                            <img loading="lazy" src="{{ asset('storage/' . $m->img_founder) }}" alt="{{ $m->founder_name }}">
                            <div class="commitment-name">
                                <p>{{ $m->founder_name }}</p>
                                <span style="font-size: 12px;">{{ __('Founder & CEO') }}</span>
                            </div>
                        </div>

                        <div class="commitment-image">
                            <img loading="lazy" src="{{ asset('storage/' . $m->img) }}" alt="{{ $m->em_name }}">
                            <div class="commitment-name">
                                <p>{{ $m->em_name }}</p>
                                <span style="font-size: 12px;">{{ __('Executive Director') }}</span>
                            </div>
                        </div>

                    </div>

                    <div class="commitment-text">
                        <h2>{{ __('lang.messageem') }}</h2>
                        {!! $m->{'message_' . $lang} !!}
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <!-- VISION -->
    <section class="vision-section">
        <div class="container">
            <div class="vision-container">
                <div class="vision-content">
                    <div class="vision-image">
                        <img loading="lazy" src="{{ asset('images/hi-tech-3.png') }}" alt="HI-TECH Water">
                    </div>

                    <div class="vision-text">
                        <div class="logo">
                            <img loading="lazy" src="{{ asset('images/Hi-Tech-Water Logo-blue.png') }}" alt="Hi-Tech Logo">
                        </div>

                        {!! $missionvision->{'text_' . $lang} !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CORE VALUES -->
    <section class="core-values-section">
        <div class="core-values-container">
            <div class="core-values-content">
                <h2>{{ __('lang.corevalue') }}</h2>

                <div class="core-values-grid">
                    @foreach ($corevalues as $cv)
                        <div class="core-value-item">
                            <p>
                                <strong>{{ $cv->{'title_' . $lang} }}</strong>
                                <br><br>
                                {{ $cv->{'description_' . $lang} }}
                            </p>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    <!-- ACCREDITATIONS -->
    <section class="accreditation-section">
        <div class="container">
            <div class="accreditation-container">
                <div class="accreditation-content">
                    <h2>{{ __('lang.accreditation') }}</h2>

                    <div class="accreditation-images">
                        @foreach ($accreditations as $acc)
                            <div class="accreditation-image">
                                <img loading="lazy" src="{{ asset('storage/' . $acc->logo) }}" alt="Accreditation">
                                <p>{{ $acc->{'name_' . $lang} }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
