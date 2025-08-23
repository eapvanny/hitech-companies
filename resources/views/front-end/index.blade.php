@extends('front-end.layouts.master')

@section('title', 'Home')

@section('seo')
    <meta property="og:title" content="Hi tech water " />
    <meta property="og:description" content="{{ $slides->title_en }}" />
    <meta property="og:description" content="{{ $slides->title_kh }}" />
    <meta property="twitter:title" content="Hi tech water " />
    <meta property="twitter:description" content="{{ $slides->title_en }}" />
    <meta property="twitter:description" content="{{ $slides->title_kh }}" />
    <meta property="og:description" content="Hi tech home page" />
    <meta property="twitter:description" content="Hi tech home page" />
    <meta name="description" content="{{ $overview->title_en }}">
    <meta name="description" content="{{ $overview->title_kh }}">
@endsection

@section('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Hanuman:wght@100;300;400;700;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Siemreap&display=swap');

        /* Hero Section */
        /* Hero section styling */
        /* .hero {
                                height: 100vh;
                                position: relative;
                                display: flex;
                                align-items: center;
                                justify-content: flex-start;
                                padding-left: 100px;
                                color: white;
                                text-align: left;
                                animation: fadeIn 1s ease-out;
                                overflow: hidden;
                                Prevent video overflow
                            } */

        .hero {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: url('{{ asset('images/artwork_website1.jpeg') }}') center/cover no-repeat;
            overflow: hidden;
            padding: 0 8%;
        }

        /* Gradient overlay */
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* background: linear-gradient(to right, rgba(27,107,168,0.7), rgba(255,255,255,0.2)); */
            z-index: 1;
        }

        /* Text Content */
        .hero-content {
            position: absolute;
            top: 50%;
            right: 6%;
            /* distance from the right edge */
            transform: translateY(-50%);
            /* vertical center */
            z-index: 2;
            color: #fff;
            text-align: right;
            /* right-align inner text & button */
        }

        .hero-content h1 {
            font-size: 3rem;
            font-weight: 700;
            font-family: 'Poppins', 'Siemreap', sans-serif;
            line-height: 1.3;
            background: linear-gradient(90deg, #1B6BA8, #1B6BA8, #1B6BA8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientFlow 5s ease-in-out infinite;
        }

        .subtitle {
            font-size: 1.3em;
            margin: 20px 0;
            color: #1B6BA8;
            opacity: 0.9;
            text-align: right;
        }

        /* CTA Button */
        .cta-btn {
            display: inline-block;
            padding: 10px 23px;
            font-size: 1.1em;
            color: #fff;
            background: #1B6BA8;
            border-radius: 30px;
            text-decoration: none;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            transition: 0.3s ease;
            margin-top: 10px;
        }

        .cta-btn:hover {
            background: #14507c;
            transform: translateY(-3px);
        }


        /* Product Image */
        .hero-image {
            position: relative;
            z-index: 2;
            width: 420px;
            top: 150px;
            animation: float 3s ease-in-out infinite;
        }

        .hero-image img {
            width: 100%;
            filter: drop-shadow(0 10px 25px rgba(0, 0, 0, 0.3));
        }




        /* .hero-video {
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                object-fit: cover;
                                z-index: -1;
                            } */


        /* .hero::before {
                            content: '';
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background: linear-gradient(to bottom, rgba(66, 148, 255, 0.5));
                            z-index: 1;
                        } */



        h1,
        h2,
        h3,
        h4,
        h6 {
            line-height: 2rem;
            font-family: 'Poppins', 'Kantumruy', sans-serif !important;
        }

        p {
            line-height: 2rem;
        }



        /* About Section */
        .about-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 50px;
        }

        .about-text {
            width: 50%;
            line-height: 2rem;
        }

        .about-text h2 {
            color: #0056b3;
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .about-image {
            width: 45%;
        }

        .about-image .video-wrapper {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
        }

        .about-image .video-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 10px;
        }

        /* Our Water Section */
        .our-water-theme {
            padding: 50px;
            text-align: center;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 400px;
            position: relative;
            color: #fff;
            background: linear-gradient(to bottom, #8ccbe2, #c8e1eb);
        }

        .water-content h2 {
            color: #0056b3;
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .water-content p {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #333;
            font-weight: bold;
        }

        .water-details-wrapper {
            overflow: hidden;
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            position: relative;
        }

        .water-details {
            display: flex;
            align-items: center;
            transition: transform 0.5s ease-in-out;
        }

        .water-item {
            text-align: center;
            flex: 0 0 33.33%;
            max-width: 33.33%;
            padding: 0 15px;
            box-sizing: border-box;
            opacity: 0;
            transform: translateX(100%);
            transition: opacity 0.5s ease, transform 1s ease;
            margin-bottom: 10px;
        }

        .water-item a {
            text-decoration: none;
        }

        .water-item.active {
            opacity: 1;
            transform: translateX(0);
        }

        .water-item img {
            max-width: 180px;
            height: auto;
        }

        .water-item h3 {
            font-size: 1.5rem;
            color: #0056b3;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .water-item p {
            font-size: 1rem;
            color: #3975b4;
            margin-bottom: 10px;
        }

        .view-more {
            background: none;
            border: 2px solid #f5c518;
            color: #f5c518;
            padding: 8px 20px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        .view-more:hover {
            background: #f5c518;
            color: #fff;
        }

        .navigation {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .navigation span {
            cursor: pointer;
            color: #666;
            font-size: 1.1rem;
            padding: 5px 15px;
            font-weight: bold;
            margin-top: 10px;
        }

        .navigation span:hover {
            color: #0056b3;
        }

        /* QUALITY AWARD Section */
        .quality-award {
            padding: 30px 70px;
            text-align: center;
            background: #f9f9f9;
        }

        .quality-award h2 {
            color: #0056b3;
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: bold;
            margin-top: 0;
        }

        .quality-award-content {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .award-slider-container {
            width: 98%;
            position: relative;
            margin: 0 auto;
        }

        .award-slider {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .award-slider::-webkit-scrollbar {
            display: none;
        }

        .quality-award-item {
            flex: 0 0 100%;
            scroll-snap-align: start;
            padding: 10px;
            box-sizing: border-box;
            pointer-events: none;
        }

        .quality-award-item img {
            width: 98%;
            max-height: 550px;
            object-fit: cover;
            border-radius: 10px;
            margin-top: 0;
        }

        .slider-nav {
            text-align: center;
            margin-top: 10px;
        }

        .slider-dot {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #ccc;
            margin: 0 5px;
            cursor: pointer;
        }

        .slider-dot.active {
            background: #0056b3;
        }

        .description {
            width: 98%;
            padding: 20px;
            text-align: left;
            box-sizing: border-box;
        }

        .description h3 {
            color: #0056b3;
            font-size: 1.5rem;
            font-weight: bold;
            padding-top: 10px;
        }

        .description p {
            color: #666;
            font-size: 1rem;
        }

        /* Society Section */
        .society {
            padding: 50px;
            text-align: center;
            background: #f9f9f9;
            margin-top: -50px;
        }

        .society h2 {
            color: #0056b3;
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left;
            padding: 0 50px;
        }

        .society-content {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .society-item {
            width: 45%;
            padding: 20px;
            text-align: left;
            box-sizing: border-box;
        }

        .society-item img {
            width: 100%;
            height: 370px;
            object-fit: cover;
            border-radius: 10px;
        }

        .society-item h3 {
            color: #0056b3;
            font-size: 1.5rem;
            margin: 10px 0;
            font-weight: bold;
            padding-top: 10px;
        }

        .society-item p {
            color: #666;
            font-size: 1rem;
        }

        /* Delivery Section */
        .delivery {
            padding: 50px;
            text-align: center;
            background: #c8e1eb;
        }

        .delivery-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 0 50px;
        }

        .delivery-image {
            width: 45%;
        }

        .delivery-image img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .delivery-text {
            width: 50%;
            text-align: left;
        }

        .delivery-text h3 {
            color: #0056b3;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .delivery-text p {
            color: #666;
            font-size: 1rem;
        }

        .delivery-text .btn {
            background: #0056b3;
            color: #fff;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .delivery-text .btn:hover {
            background: #003d82;
        }

        /* Responsive Adjustments */
        @media (max-width: 1200px) {
            .hero {
                height: 39vh;
            }

            .hero-image {
                width: 350px !important;
                height: 292px !important;
                right: 50px;
            }

            .hero-content h1 {
                font-size: 2.3rem;
                line-height: 1.5;
                /* margin-top: -100px; */
            }
        }

        @media (max-width: 992px) {
            .hero-image {
                width: 300px !important;
                height: 250px !important;
                right: 30px;
                bottom: 30px;
            }

            .hero {
                padding-left: 50px;
                height: 50vh;
            }

            .hero-text h1 {
                font-size: 2em;
                line-height: 1.5;
                margin-top: auto;
            }

            .about-content {
                flex-direction: column;
                padding: 30px;
            }

            .about-text,
            .about-image {
                width: 100%;
            }

            .about-image {
                margin-top: 20px;
            }

            .water-item {
                flex: 0 0 50%;
                max-width: 50%;
            }

            .quality-award-item img {
                max-height: 400px;
            }

            .society-item {
                width: 100%;
                padding: 15px;
            }

            .society h2 {
                font-size: 2rem;
                padding: 0 30px;
            }

            .delivery-content {
                flex-direction: column;
                padding: 0 30px;
            }

            .delivery-image,
            .delivery-text {
                width: 100%;
            }

            .delivery-image {
                margin-bottom: 20px;
            }

            .delivery-text {
                text-align: center;
            }
        }

        @media (max-width: 912px) {
            .hero {
                height: 35vh;
            }
            .hero-content h1 {
                font-size: 1.9em;
                line-height: 1.4;
            }
             .subtitle {
                font-size: 1em;
                margin: 10px 0;
            }

            /* CTA Button */
            .cta-btn {
                font-size: .9em;
                padding: 5px 12px;

            }
        }

        @media (max-width: 820px) {
            .hero {
                height: 36vh;
            }

            .hero-content h1 {
                font-size: 1.7rem;
                line-height: 1.3;
                /* margin-top: -100px; */
            }

            .subtitle {
                font-size: 1.1em;
                margin: 10px 0;
            }

            /* CTA Button */
            .cta-btn {
                font-size: 1.1em;
                padding: 5px 12px;

            }
        }

        @media (max-width: 768px) {
            .hero-image {
                width: 250px !important;
                height: 208px !important;
                right: 20px;
                bottom: 20px;
            }

            .hero {
                padding-left: 30px;
                height: 39vh;
            }

            /* CTA Button */
            .cta-btn {
                font-size: .9em;
                padding: 5px 12px;

            }

            .about-content {
                padding: 20px;
            }

            .about-text h2 {
                font-size: 1.8rem;
            }

            .about-text p {
                font-size: 0.9rem;
            }

            .our-water-theme {
                padding: 30px;
            }

            .water-content h2 {
                font-size: 2rem;
            }

            .water-content p {
                font-size: 1rem;
            }

            .water-item {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .water-item h3 {
                font-size: 1.3rem;
            }

            .water-item p {
                font-size: 0.9rem;
            }

            .quality-award {
                padding: 20px 15px;
            }

            .quality-award-item img {
                max-height: 300px;
            }

            .slider-dot {
                width: 12px;
                height: 12px;
                margin: 0 6px;
            }

            .society {
                padding: 30px;
            }

            .society h2 {
                font-size: 1.8rem;
                padding: 0 20px;
            }

            .society-item h3 {
                font-size: 1.3rem;
            }

            .society-item p {
                font-size: 0.9rem;
            }

            .delivery {
                padding: 30px;
            }

            .delivery-text h3 {
                font-size: 1.3rem;
            }

            .delivery-text p {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            .hero-image {
                width: 200px !important;
                height: 167px !important;
                right: 10px;
                bottom: 10px;
            }

            .hero {
                padding-left: 15px;
                height: 50vh;
            }

            .hero-text h1 {
                font-size: 1.5rem;
                line-height: 1.4;
                margin-top: auto;
            }

            .about-content {
                padding: 15px;
            }

            .about-text h2 {
                font-size: 1.5rem;
            }

            .about-text p {
                font-size: 0.85rem;
            }

            .our-water-theme {
                padding: 20px;
            }

            .water-content h2 {
                font-size: 1.5rem;
            }

            .water-content p {
                font-size: 0.9rem;
            }

            .water-item h3 {
                font-size: 1.2rem;
            }

            .water-item p {
                font-size: 0.85rem;
            }

            .view-more {
                padding: 6px 15px;
                font-size: 0.8rem;
            }

            .navigation span {
                font-size: 0.9rem;
                padding: 5px 10px;
            }

            .quality-award h2 {
                font-size: 1.5rem;
            }

            .quality-award-item img {
                max-height: 250px;
            }

            .description h3 {
                font-size: 1.1rem;
            }

            .description p {
                font-size: 0.8rem;
            }

            .slider-dot {
                width: 10px;
                height: 10px;
                margin: 0 5px;
            }

            .society {
                padding: 20px;
            }

            .society h2 {
                font-size: 1.5rem;
                padding: 0 15px;
            }

            .society-item h3 {
                font-size: 1.2rem;
            }

            .society-item p {
                font-size: 0.85rem;
            }

            .delivery {
                padding: 20px;
            }

            .delivery-content {
                padding: 0 15px;
            }

            .delivery-text h3 {
                font-size: 1.2rem;
            }

            .delivery-text p {
                font-size: 0.85rem;
            }

            .delivery-text .btn {
                padding: 8px 15px;
                font-size: 0.9rem;
            }
        }
        @media (max-width: 540px) {
            .hero {
                height: 40vh;
                margin: 60px 0 0 0;
            }
            .hero-content h1 {
                font-size: 1.2rem;
            }
            .subtitle {
                font-size: .7em;
                line-height: 1.2em
                /* margin: 10px 0; */
            }

            /* CTA Button */
            .cta-btn {
                font-size: .7em;
                padding: 4px 8px;

            }
        }
        @media (max-width: 430px) {
            .hero {
                height: 24vh;
                margin: 60px 0 0 0;
                /* top: 60px; */
            }
            .hero-content h1 {
                font-size: .9rem;
            }
            .subtitle {
                font-size: .6em;
                line-height: 1.2em
                /* margin: 10px 0; */
            }

            /* CTA Button */
            .cta-btn {
                font-size: .6em;
                padding: 4px 8px;

            }
        }

        @media (max-width: 414px) {
            .hero {
                height: 24vh;
                margin: 60px 0 0 0;
                /* top: 60px; */
            }
            .hero-content h1 {
                font-size: .9rem;
            }
            .subtitle {
                font-size: .6em;
                line-height: 1.2em
                /* margin: 10px 0; */
            }

            /* CTA Button */
            .cta-btn {
                font-size: .6em;
                padding: 4px 8px;

            }
        }

        @media (max-width: 390px) {
            .hero-content h1 {
                font-size: .8rem;
            }
        }

        @media (max-width: 360px) {
            .hero-text h1 {
                font-size: 1.1rem;
                line-height: 1.5;
                margin-top: -50px;
            }
        }
         @media (max-width: 344px) {
            .hero {
                height: 20vh;
                margin: 60px 0 0 0;
                /* top: 60px; */
            }
            .hero-content h1 {
                font-size: .7rem;
            }
            .subtitle {
                font-size: .45em;
            }

            /* CTA Button */
            .cta-btn {
                font-size: .45em;
                padding: 4px 8px;

            }
        }
    </style>
@endsection

@section('content')
    <section class="hero">
        <div class="hero-overlay"></div>

        <div class="hero-content" style="width: {{ session('user_lang') == 'en' ? '40.5%' : '35%' }};">
            <h1>
                @if (session()->has('user_lang') && session('user_lang') == 'en')
                    {{ $slides->title_en }}
                @else
                    {{ $slides->title_kh }}
                @endif
            </h1>
            <a href="https://t.me/+85570212400" class="cta-btn" target="_blank"> <i class="bi bi-telegram"></i> {{__('lang.contactus')}}</a>
        </div>

        <div class="hero-image">
            <!-- <img src="{{ asset($slides->img) }}" alt="Hi-Tech Water"> -->
        </div>
    </section>
    <section class="about">
        <div class="about-content">
            <div class="about-text">
                <h2>{{ __('lang.aboutus') }}</h2>
                @if (session()->has('user_lang') && session('user_lang') == 'en')
                    {!! $overview->title_en !!}
                @else
                    {!! $overview->title_kh !!}
                @endif
            </div>
            <div class="about-image">
                <div class="video-wrapper">
                    <iframe
                        src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2Fhitechforhealth%2Fvideos%2F846104387666224%2F&show_text=false&width=560&t=0"
                        scrolling="no" frameborder="0" allowfullscreen="true"
                        allow="clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
            </div>
        </div>
    </section>
    <section class="our-water-theme"
        @if (!empty($theme)) style="background: linear-gradient(rgba(145, 145, 145, 0.031), rgba(0, 0, 0, 0.411)), url('{{ asset($theme->water_bg) }}')" @endif>
        <div class="water-content">
            <h2> {{ __('lang.hitech') }} </h2>
            <p>
                {{ __('lang.ourtitle') }}
            </p>
            <div class="water-details-wrapper">
                <div class="water-details" id="water-slider">
                    @foreach ($waters as $w)
                        <div class="water-item">
                            @if ($w->bottle == '250ml')
                                <img src="{{ asset('hitech-bottle/new-image/250ml.png') }}" alt="HI-TECH Water Bottle">
                            @elseif ($w->bottle == '350ml')
                                <img src="{{ asset('hitech-bottle/new-image/bottle-350ml.png') }}"
                                    alt="HI-TECH Water Bottle">
                            @elseif ($w->bottle == '600ml')
                                <img src="{{ asset('hitech-bottle/new-image/bottle-600ml.png') }}"
                                    alt="HI-TECH Water Bottle">
                            @elseif ($w->bottle == '1500ml')
                                <img src="{{ asset('hitech-bottle/new-image/bottle-1500ml.png') }}"
                                    alt="HI-TECH Water Bottle">
                            @else
                                <img src="{{ asset('hitech-bottle/new-image/20l-old.png') }}" alt="HI-TECH Water Bottle">
                            @endif
                            <h3>
                                {{ $w->bottle }}
                                Water Bottle</h3>
                            @if (session()->has('user_lang') && session('user_lang') == 'en')
                                <p> {{ $w->title }} </p>
                            @else
                                <p> {{ $w->title_kh }} </p>
                            @endif
                            <a href="{{ route('water') }}" class="view-more"> {{ __('lang.viewmore') }} </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="navigation">
                <span class="prev" id="prev-btn">
                    << {{ __('lang.prev') }}</span>
                        <span class="next" id="next-btn"> {{ __('lang.next') }} >></span>
            </div>
        </div>
    </section>
    <section class="quality-award">
        <h2>{{ __('lang.QUALITY AWARD-MONDE SELECTION') }}</h2>
        <div class="quality-award-content">
            <div class="award-slider-container">
                <div class="award-slider" id="awardSlider">
                    @foreach (optional($awards)->img ?? [] as $image)
                        <div class="quality-award-item">
                            <img src="{{ asset($image) }}" alt="Quality Award">
                        </div>
                    @endforeach
                </div>
                <div class="slider-nav" id="sliderNav">
                </div>
            </div>
            <span class="description">
                <h3>
                    @if (session()->has('user_lang') && session('user_lang') == 'en')
                        {{ $awards->title_en }}
                    @else
                        {{ $awards->title_kh }}
                    @endif
                </h3>
                <p>
                    @if (session()->has('user_lang') && session('user_lang') == 'en')
                        {{ $awards->description_en }}
                    @else
                        {{ $awards->description_kh }}
                    @endif
                </p>
            </span>
        </div>
    </section>
    <section class="society">
        <h2>{{ __('lang.SOCIETY') }}</h2>
        <div class="society-content">
            @foreach ($societys as $s)
                <div class="society-item">
                    <img src="{{ asset($s->img) }}" alt="Quality and Price" data-src="path-to-quality-price-image.jpg">
                    <h3>
                        @if (session()->has('user_lang') && session('user_lang') == 'en')
                            {{ $s->title_en }}
                        @else
                            {{ $s->title_kh }}
                        @endif
                    </h3>
                    <p>
                        @if (session()->has('user_lang') && session('user_lang') == 'en')
                            {{ $s->description_en }}
                        @else
                            {{ $s->description_kh }}
                        @endif
                    </p>
                </div>
            @endforeach
        </div>
    </section>
    <section class="delivery">
        <div class="delivery-content">
            <div class="delivery-image">
                <img src="{{ asset('images/Truck.png') }}" alt="Delivery Truck" data-src="path-to-delivery-image.jpg">
            </div>
            <div class="delivery-text">
                <h3>{{ __('lang.contacttitle') }}</h3>
                <p>
                    {{ __('lang.contactdescription') }}
                </p>
                <a href="{{ route('contact') }}" class="btn"> {{ __('lang.contactusNow') }} </a>
            </div>
        </div>
    </section>
@endsection
<script src="https://cdn.jsdelivr.net/npm/grapheme-splitter@1.0.4/build/grapheme-splitter.min.js"></script>
@push('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.getElementById('water-slider');
            const items = slider.querySelectorAll('.water-item');
            const totalItems = items.length;
            let itemsPerPage = 3;
            let currentIndex = 0;

            function updateItemsPerPage() {
                if (window.innerWidth <= 768) {
                    itemsPerPage = 1;
                } else if (window.innerWidth <= 992) {
                    itemsPerPage = 2;
                } else {
                    itemsPerPage = 3;
                }
            }

            function updateSlider() {
                const itemWidth = 100 / itemsPerPage;
                const translateX = -(currentIndex * itemWidth);
                slider.style.transform = `translateX(${translateX}%)`;
            }

            window.addEventListener('resize', () => {
                updateItemsPerPage();
                updateSlider();
            });

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    const waterItems = entry.target.querySelectorAll('.water-item');
                    const sectionTop = entry.boundingClientRect.top;

                    if (entry.isIntersecting) {
                        waterItems.forEach((item, index) => {
                            setTimeout(() => {
                                item.classList.add('active');
                            }, index * 200);
                        });
                    } else {
                        if (sectionTop < 0) {
                            return;
                        } else {
                            waterItems.forEach(item => {
                                item.classList.remove('active');
                            });
                        }
                    }
                });
            }, {
                threshold: 0.5
            });

            observer.observe(document.querySelector('.our-water-theme'));

            document.getElementById('next-btn').addEventListener('click', function() {
                if (currentIndex < totalItems - itemsPerPage) {
                    currentIndex++;
                    updateSlider();
                }
            });

            document.getElementById('prev-btn').addEventListener('click', function() {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateSlider();
                }
            });

            updateItemsPerPage();
            updateSlider();
        });

        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.getElementById('awardSlider');
            const sliderNav = document.getElementById('sliderNav');
            const slides = document.querySelectorAll('.quality-award-item');
            let isScrolling = false;
            let currentIndex = 0;
            let autoSlideInterval;

            slides.forEach((slide, index) => {
                const dot = document.createElement('span');
                dot.classList.add('slider-dot');
                if (index === 0) dot.classList.add('active');
                dot.addEventListener('click', () => {
                    if (isScrolling) return;
                    currentIndex = index;
                    scrollToSlide(index);
                });
                sliderNav.appendChild(dot);
            });

            function updateDots() {
                document.querySelectorAll('.slider-dot').forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            }

            function scrollToSlide(index) {
                if (isScrolling) return;
                isScrolling = true;

                const slide = slides[index];
                const scrollPosition = slide.offsetLeft - slider.offsetLeft;

                slider.scrollTo({
                    left: scrollPosition,
                    behavior: 'smooth'
                });

                currentIndex = index;
                updateDots();

                setTimeout(() => {
                    isScrolling = false;
                }, 1000);
            }

            function startAutoSlide() {
                autoSlideInterval = setInterval(autoSlide, 3000);
            }

            function stopAutoSlide() {
                clearInterval(autoSlideInterval);
            }

            function autoSlide() {
                if (isScrolling) return;

                const nextIndex = (currentIndex + 1) % slides.length;
                const isLooping = nextIndex === 0;

                if (isLooping) {
                    const clone = slides[0].cloneNode(true);
                    slider.appendChild(clone);

                    slider.scrollTo({
                        left: slider.scrollWidth,
                        behavior: 'smooth'
                    });

                    setTimeout(() => {
                        slider.scrollLeft = 0;
                        slider.removeChild(clone);
                        currentIndex = 0;
                        updateDots();
                        isScrolling = false;
                    }, 1000);
                } else {
                    currentIndex = nextIndex;
                    scrollToSlide(currentIndex);
                }
            }

            slider.addEventListener('mouseenter', stopAutoSlide);
            slider.addEventListener('mouseleave', startAutoSlide);

            slider.addEventListener('scroll', () => {
                if (isScrolling) return;
                const slideIndex = Math.round(slider.scrollLeft / slides[0].offsetWidth);
                if (slideIndex < slides.length) {
                    currentIndex = slideIndex;
                    updateDots();
                }
            });

            startAutoSlide();
        });
    </script>
@endpush
