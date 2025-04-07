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
    /* Hero Section */
    .hero {
        height: 100vh;
        background: linear-gradient(to bottom, #0000004f 0%, rgba(0, 0, 0, 0.134) 30%, rgba(0, 0, 0, 0.151) 70%), 
                    url('https://hitech.com.kh/wp-content/uploads/2022/03/bg-image-1.jpg') no-repeat center center;
        background-size: cover;
        color: white;
        text-align: left;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        padding-left: 100px;
        position: relative;
    }
    .hero-text h1 {
        font-size: 68px;
        font-weight: bold;
        animation: fadeIn 1s ease-in;
        line-height: 1.2;
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
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes slideIn {
        from { transform: translateX(100px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
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
    }
    .about-image {
        width: 45%;
    }
    .about-image img {
        width: 100%;
        height: auto;
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
        background: linear-gradient(to bottom, #87CEEB, #E0F6FF);

    }
    /* .our-water {
        padding: 50px;
        text-align: center;
        background: linear-gradient(to bottom, #87CEEB, #E0F6FF);
        min-height: 400px;
        position: relative;
    } */
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
        /* color: #0056b3; */
        color: #ffffff;
        margin-bottom: 5px;
        font-weight: bold;
    }
    .water-item p {
        font-size: 1rem;
        /* color: #666; */
        color: #dbdbdb;
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
        margin-top: 20px;
    }
    .navigation span {
        cursor: pointer;
        color: #666;
        font-size: 1.1rem;
        padding: 5px 15px;
        font-weight: bold;
    }
    .navigation span:hover {
        color: #0056b3;
    }

    /* Society Section */
    .society {
        padding: 50px;
        text-align: center;
        background: #f9f9f9;
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
        height: auto;
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
        background: #e0f6ff;
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
        }

        /* About Section */
        .about-content {
            flex-direction: column;
            padding: 30px;
        }
        .about-text, .about-image {
            width: 100%;
        }
        .about-image {
            margin-top: 20px;
        }

        /* Our Water Section */
        .water-item {
            flex: 0 0 50%; /* Show 2 items per row */
            max-width: 50%;
        }

        /* Society Section */
        .society-item {
            width: 100%; /* Stack items in a single column */
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
        .delivery-image, .delivery-text {
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
            height: 50vh; /* Reduce height for smaller screens */
        }
        .hero-text h1 {
            font-size: 28px;
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
        .our-water {
            padding: 30px;
        }
        .water-content h2 {
            font-size: 2rem;
        }
        .water-content p {
            font-size: 1rem;
        }
        .water-item {
            flex: 0 0 100%; /* Show 1 item per row */
            max-width: 100%;
        }
        .water-item h3 {
            font-size: 1.3rem;
        }
        .water-item p {
            font-size: 0.9rem;
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
            height: 50vh; /* Further reduce height */
        }
        .hero-text h1 {
            font-size: 24px;
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
        .our-water {
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
            <h1 style="width: 50%"> 
                @if (session()->has('user_lang') && session('user_lang') == 'en')
                    {{ $slides->title_en }}
                @else
                    {{ $slides->title_kh }}
                @endif    
            </h1>
        </div>
        <div class="hero-image">
            <img fetchpriority="high" decoding="async" src="{{ asset($slides->img) }}" class="attachment-full size-full wp-image-312" alt="">
        </div>
    </section>
    <section class="about">
        <div class="about-content">
            <div class="about-text">
                <h2>{{__('lang.aboutus')}}</h2>

                @if (session()->has('user_lang') && session('user_lang') == 'en')
                    {!! $overview->title_en !!}
                @else
                    {!!  $overview->title_kh !!}
                @endif   
            </div>
            <div class="about-image">
                <img src="{{asset($overview->img)}}" alt="HI-TECH bottling facility with staff">
            </div>
        </div>
    </section>
    <section class="our-water-theme" 
        @if (!empty($theme))
            style="background: linear-gradient(rgba(145, 145, 145, 0.031), rgba(0, 0, 0, 0.411)), url({{ asset($theme->water_bg) }})"
        @endif
    >
        <div class="water-content">
            <h2> {{ __('lang.ourwater') }} </h2>
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
                            <img src="{{ asset('hitech-bottle/waters/350ml.png') }}" alt="HI-TECH Water Bottle">
                        @elseif ($w->bottle == '600ml')
                            <img src="{{ asset('hitech-bottle/waters/600ml.png') }}" alt="HI-TECH Water Bottle">
                        @elseif ($w->bottle == '1500ml')
                            <img src="{{ asset('hitech-bottle/waters/1500ml.png') }}" alt="HI-TECH Water Bottle">
                        @else
                            <img src="{{ asset('hitech-bottle/waters/20l.png') }}" alt="HI-TECH Water Bottle">
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
                        <a href="{{route('water')}}"  class="view-more"> {{ __('lang.viewmore') }} </a>
                    </div>
                    @endforeach
                    
                    {{-- <div class="water-item">
                        <img src="https://hitech.com.kh/wp-content/uploads/2022/03/bottle-600ml.png" alt="HI-TECH 600 ml Water Bottle">
                        <h3>600 ml Water Bottle</h3>
                        <p>For casual day</p>
                        <a href="{{route('water')}}" class="view-more">VIEW MORE</a>
                    </div>
                    <div class="water-item">
                        <img src="https://hitech.com.kh/wp-content/uploads/2022/03/bottle-1500ml.png" alt="HI-TECH 1500 ml Water Bottle">
                        <h3>1500 ml Water Bottle</h3>
                        <p>For travelling</p>
                        <a href="{{route('water')}}" class="view-more">VIEW MORE</a>
                    </div>
                    <div class="water-item">
                        <img src="https://hitech.com.kh/wp-content/uploads/2022/03/bottle-20L-3-2.png" alt="HI-TECH 20L Water">
                        <h3>20L Water</h3>
                        <p>For home and office</p>
                        <a href="{{route('water')}}" class="view-more">VIEW MORE</a>
                    </div> --}}
                </div>
            </div>
            <div class="navigation">
                <span class="prev" id="prev-btn"><< {{__('lang.prev')}}</span>
                <span class="next" id="next-btn"> {{ __('lang.next') }} >></span>
            </div>
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
           
            {{-- <div class="society-item">
                <img src="https://hitech.com.kh/wp-content/uploads/elementor/thumbs/blog-image-3-1-qkisjwvdxl43w7aznxp1jlu8wvv4xus8vkiowscha4.jpg" alt="Response to Society Necessity" data-src="path-to-response-image.jpg">
                <h3>Response to society necessity</h3>
                <p>Due to Covid-19 widely spread, all employees are fully vaccinated to meet the requirement of government and to ensure the safety of our product to customer.</p>
            </div>
            <div class="society-item">
                <img src="https://hitech.com.kh/wp-content/uploads/elementor/thumbs/hitech-qkisjwvdxl43w7aznxp1jlu8wvv4xus8vkiowscha4.jpg">
                <h3>Corporate social responsibility</h3>
                <p>During Covid-19 crisis, we have contributed our drinking water to Ministry of health and districts in Phnom Penh city to those who in needs and particularly Covid-19 patient. </p>
            </div>
            <div class="society-item">
                <img src="https://hitech.com.kh/wp-content/uploads/elementor/thumbs/IMG_9999-6-qkisjyr2b96ojf89cyiaold63nlvd8zpjttnvc9oxo.jpg">
                <h3>Corporate social responsibility </h3>
                <p>To participate and show encouragement in social activities, we have constantly contributed our water to UYFC (Union of Youth Federation of Cambodia) for their social campaigns.</p>
            </div> --}}
        </div>
    </section>
    <!-- Delivery Section -->
    <section class="delivery">
        <div class="delivery-content">
            <div class="delivery-image">
                <img src="https://hitech.com.kh/wp-content/uploads/2022/04/deliverytruck-2.jpg" alt="Delivery Truck" data-src="path-to-delivery-image.jpg">
            </div>
            <div class="delivery-text">
                <h3>{{__('lang.contacttitle')}}</h3>
                <p>
                    {{ __('lang.contactdescription') }}
                </p>
                <a href="{{route('contact')}}" class="btn"> {{ __('lang.contactus') }} </a>
            </div>
        </div>
    </section>
@endsection

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
            }, { threshold: 0.5 });

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
    </script>
@endpush