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
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Siemreap&display=swap');
        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(to bottom, #3a3a3a4f 0%, rgba(66, 66, 66, 0.134) 30%, rgba(55, 55, 55, 0.151) 70%),
                url({{ asset('images/fresh-water.jpeg') }}) no-repeat center center;
            background-size: cover;
            color: white;
            text-align: left;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding-left: 100px;
            position: relative;
            animation: fadeIn 1s ease-out;
        }

        .animated-text {
            display: inline-block;
        }

        .animated-text span {
            opacity: 0;
            display: inline-block;
            margin-right: 2px;
            transform: translateY(10px);
            animation: fadeIn 0.5s ease-in-out forwards;
        }

        /* @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        } */

         /* Animations */
         @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            line-height: 2rem;
            font-family: 'Poppins', 'Kantumruy', sans-serif !important;
        }

        p {
            line-height: 2rem;
        }

        .hero-text h1 {
            font-size: 40px;
            font-weight: bold;
            animation: fadeIn 1s ease-in;
            line-height: 4rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7); /* Better readability */
            font-weight: bold;
            margin-top: -150px;
            font-family: 'Roboto', 'Kantumruy', sans-serif !important;
        }

        .hero-image {
            position: absolute;
            right: 100px;
            bottom: 50px;
            width: 460px !important;
            height: 383px !important;
            max-width: none !important;
            max-height: none !important;
            animation: slideIn 1s ease-out;
            overflow: hidden;
        }

        .hero-image img {
            width: 100% !important;
            height: 100% !important;
            object-fit: contain;
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateX(100px);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
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
            /* 16:9 aspect ratio (314/560 ≈ 56.25%) */
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
            /* Reduced top padding from 50px to 30px */
            text-align: center;
            background: #f9f9f9;
        }

        .quality-award h2 {
            color: #0056b3;
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: bold;
            margin-top: 0;
            /* Ensure no extra margin on heading */
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
            /* Changed from cover to contain */
            border-radius: 10px;
            margin-top: 0;
            /* Remove top margin if present */
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
            border-radiusplaat: 10px;
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

            /* Hero Section */
            .hero {
                height: 50vh;
            }

            .hero-image {
                width: 350px !important;
                height: 292px !important;
                right: 50px;
            }

            .hero-text h1 {
                font-size: 40px;
                line-height: 1.2;
                margin-top: auto;
            }
        }

        @media (max-width: 992px) {

            /* Hero Section */
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
                font-size: 32px;
                line-height: 1.2;
                margin-top: auto;
            }

            /* About Section */
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

            /* Our Water Section */
            .water-item {
                flex: 0 0 50%;
                max-width: 50%;
            }

            /* Qualty Award Section */
            .quality-award-item img {
                max-height: 400px;
            }

            /* Society Section */
            .society-item {
                width: 100%;
                padding: 15px;
            }

            .society h2 {
                font-size: 2rem;
                padding: 0 30px;
            }

            /* Delivery Section */
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

        @media (max-width: 768px) {

            /* Hero Section */
            .hero-image {
                width: 250px !important;
                height: 208px !important;
                right: 20px;
                bottom: 20px;
            }

            .hero {
                padding-left: 30px;
                height: 50vh;
            }

            .hero-text h1 {
                font-size: 28px;
                line-height: 1.2;
                margin-top: auto;
            }

            /* About Section */
            .about-content {
                padding: 20px;
            }

            .about-text h2 {
                font-size: 1.8rem;
            }

            .about-text p {
                font-size: 0.9rem;
            }

            /* Our Water Section */
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

            /* Quality Award Section */
            .quality-award {
                padding: 20px;
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

            /* Society Section */
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

            /* Delivery Section */
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

            /* Hero Section */
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
                font-size: 24px;
                line-height: 1.2;
                margin-top: auto;
            }

            /* About Section */
            .about-content {
                padding: 15px;
            }

            .about-text h2 {
                font-size: 1.5rem;
            }

            .about-text p {
                font-size: 0.85rem;
            }

            /* Our Water Section */
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

            /* Quality Award Section */
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

            /* Society Section */
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

            /* Delivery Section */
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
    </style>
@endsection

@section('content')
    <section class="hero">
        <div class="hero-text">
            <h1 class="animated-text" style="width: 60%;">
                @if (session()->has('user_lang') && session('user_lang') == 'en')
                    {{ $slides->title_en }}
                @else
                    {{ $slides->title_kh }}
                @endif
            </h1>
        </div>
        <div class="hero-image">
            <img fetchpriority="high" decoding="async" src="{{ asset($slides->img) }}"
                class="attachment-full size-full wp-image-312" alt="">
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
        @if (!empty($theme)) style="background: linear-gradient(rgba(145, 145, 145, 0.031), rgba(0, 0, 0, 0.411)), url({{ asset($theme->water_bg) }})" @endif>
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
                                <img src="{{ asset('hitech-bottle/waters/250ml.png') }}" alt="HI-TECH Water Bottle">
                            @elseif ($w->bottle == '350ml')
                                <img src="{{ asset('hitech-bottle/waters/bottle-350ml.png') }}" alt="HI-TECH Water Bottle">
                            @elseif ($w->bottle == '600ml')
                                <img src="{{ asset('hitech-bottle/waters/bottle-600ml.png') }}" alt="HI-TECH Water Bottle">
                            @elseif ($w->bottle == '1500ml')
                                <img src="{{ asset('hitech-bottle/waters/bottle-1500ml.png') }}"
                                    alt="HI-TECH Water Bottle">
                            @else
                                <img src="{{ asset('hitech-bottle/waters/bottle-20L-3-2.png') }}"
                                    alt="HI-TECH Water Bottle">
                            @endif
                            <h3>
                                {{ $w->bottle }}
                                Water Bottle</h3>

                            @if (session()->has('user_lang') && session('user_lang') == 'en')
                                <p> {{ $w->title }} </p>
                            @else
                                <p> {{ $w->title_kh }} </p>
                            @endif
                            {{-- <p> {{ $w->title }} </p> --}}
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
    <!-- quality award Section -->
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
                    <!-- Dots will be added by JavaScript -->
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

    <!-- Society Section -->
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
    <!-- Delivery Section -->
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
                <a href="{{ route('contact') }}" class="btn"> {{ __('lang.contactus') }} </a>
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
            let itemsPerPage = 3; // Default for large screens
            let currentIndex = 0;

            // Adjust items per page based on screen size
            function updateItemsPerPage() {
                if (window.innerWidth <= 768) {
                    itemsPerPage = 1; // 1 item per page on mobile
                } else if (window.innerWidth <= 992) {
                    itemsPerPage = 2; // 2 items per page on tablets
                } else {
                    itemsPerPage = 3; // 3 items per page on desktops
                }
            }

            // Calculate the width of one item as a percentage
            function updateSlider() {
                const itemWidth = 100 / itemsPerPage;
                const translateX = -(currentIndex * itemWidth);
                slider.style.transform = `translateX(${translateX}%)`;
            }

            // Update on resize
            window.addEventListener('resize', () => {
                updateItemsPerPage();
                updateSlider();
            });

            // Animate items based on visibility and scroll direction
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

            // observer.observe(document.querySelector('.our-water'));
            observer.observe(document.querySelector('.our-water-theme'));

            // Next button click
            document.getElementById('next-btn').addEventListener('click', function() {
                if (currentIndex < totalItems - itemsPerPage) {
                    currentIndex++;
                    updateSlider();
                }
            });

            // Prev button click
            document.getElementById('prev-btn').addEventListener('click', function() {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateSlider();
                }
            });

            // Initial setup
            updateItemsPerPage();
            updateSlider();
        });
        // document.addEventListener('DOMContentLoaded', function() {
        //     const textElement = document.querySelector('.animated-text');
        //     const text = textElement.textContent.trim();

        //     // Function to split text into individual characters (English and Khmer)
        //     function splitTextIntoCharacters(text) {
        //         // Regex to match:
        //         // - Khmer grapheme cluster: base character + optional modifiers + optional (coeng + base character + modifiers)
        //         // - English characters individually
        //         const khmerClusterRegex =
        //             /([\u1780-\u17FF\u19E0-\u19FF][\u17B6-\u17DD\u200C\u200D]*(?:\u17D2[\u1780-\u17FF\u19E0-\u19FF][\u17B6-\u17DD\u200C\u200D]*)?)|[^\u1780-\u17FF\u19E0-\u19FF]/g;
        //         return text.match(khmerClusterRegex) || [];
        //     }

        //     // Split the text into individual characters
        //     const segments = splitTextIntoCharacters(text);

        //     function runAnimation() {
        //         // Clear the current content
        //         textElement.textContent = '';

        //         // Animate each character
        //         segments.forEach((char, index) => {
        //             const span = document.createElement('span');
        //             span.textContent = char;
        //             span.style.animationDelay = `${index * 0.2}s`;
        //             textElement.appendChild(span);
        //         });

        //         // Calculate total animation time
        //         const totalTime = (segments.length * 0.2 + 0.5) * 1000;

        //         // Clear the text and restart animation
        //         setTimeout(() => {
        //             textElement.textContent = '';
        //             runAnimation();
        //         }, totalTime);
        //     }

        //     // Start the animation
        //     runAnimation();
        // });

        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.getElementById('awardSlider');
            const sliderNav = document.getElementById('sliderNav');
            const slides = document.querySelectorAll('.quality-award-item');
            let isScrolling = false;
            let currentIndex = 0;
            let autoSlideInterval;

            // Create navigation dots
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

                // Calculate scroll position without using scrollIntoView
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

                    // Scroll to the clone without affecting page scroll
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

            // Pause on hover
            slider.addEventListener('mouseenter', stopAutoSlide);
            slider.addEventListener('mouseleave', startAutoSlide);

            // Update active dot on scroll
            slider.addEventListener('scroll', () => {
                if (isScrolling) return;
                const slideIndex = Math.round(slider.scrollLeft / slides[0].offsetWidth);
                if (slideIndex < slides.length) {
                    currentIndex = slideIndex;
                    updateDots();
                }
            });

            // Start auto-sliding
            startAutoSlide();
        });
    </script>
@endpush
