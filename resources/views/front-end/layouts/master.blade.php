@php
    $companyInfo = DB::table('company_informations')->get()->first();
    $theme = DB::table('them_settings')->where('active_status', 1)->get()->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Hi-Tech Drinking Water</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="icon" href="https://hitech.com.kh/wp-content/uploads/2022/03/Hi-Tech-Water-eng-white-01.svg"
        type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('front-end/css/style.css')}}">
    <!-- Custom CSS -->
    <meta property="description" content="Hitech water" />
    <meta property="description" content="Hitech water" />
    @yield('seo')
    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap'); */
        

        body {
            font-family: "Poppins", "Siemreap", sans-serif;
            overflow-x: hidden;
            background-color: #f5f5f5;
        }

        .navbar {
            background: transparent;
            /* Initial state */
            display: flex;
            flex-wrap: wrap;
            transition: background 0.3s ease;
            /* Smooth transition */
        }

        .navbar-scrolled {
            background: linear-gradient(90deg, rgba(26, 106, 168, 1) 0%, rgba(217, 36, 40, 1) 100%);
        }

        .navbar-nav .nav-item {
            margin: 0 15px;
        }

        .navbar-brand {
            color: white;
            font-weight: bold;
            font-size: 24px;
        }

        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link.show {
            color: #ffffff;
        }

        .navbar-brand img {
            height: 50px;
        }

        .nav-link {
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            text-decoration: none;
            position: relative;
            padding: 0.5rem 1rem;
            transition: color 0.3s ease;
            display: inline-block;
            /* Ensures the element respects its content width */
        }

        .nav-link:hover {
            color: white;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            /* Start with 0 width */
            height: 10px;
            bottom: -5px;
            left: 50%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 10"><path d="M0 5 Q 5 0, 10 5 T 20 5 T 30 5 T 40 5 T 50 5 T 60 5" stroke="white" stroke-width="3" fill="none"/></svg>') repeat-x;
            background-size: 45px 10px;
            /* Adjusted for a more frequent wave */
            transform: translateX(-50%);
        }

        .nav-link:hover::after{
            width: calc(100% - 1rem);
            /* Subtract the padding (1rem left + 1rem right) to match the text width */
            animation: wave 3s linear infinite;
            /* Apply the wave animation */
        }
        .nav-link.active::after{
            width: calc(100% - 1rem);
        }
        @keyframes wave {
            0% {
                background-position-x: 0;
            }

            100% {
                background-position-x: 75px;
            }
        }

        .nav-link.active {
            color: #fff;
        }

        .language-switcher {
            color: white;
            display: flex;
            align-items: center;
        }

        .language-switcher img {
            height: 20px;
            margin-right: 5px;
        }

        /* Footer Styles */
        /* .footer {
            background: linear-gradient(to bottom, #e0f7fa, #ffffff);
            color: #333;
            padding: 40px 0;
            border-top: 1px solid #8dc6f162;
        } */
        .footer {
            position: relative;
            /* For overlay positioning */
            background: linear-gradient(to bottom, #e0f7fa, #ffffff);


            /* Path to your image */
            background-size: cover;
            /* Ensure the image covers the entire footer */
            background-position: center;
            /* Center the image */
            background-repeat: no-repeat;
            /* Prevent tiling */
            color: #fff;
            /* Change text color to white for better contrast */
            padding: 40px 0;
            border-top: 1px solid #8dc6f162;
        }

        /* Add a semi-transparent overlay to improve text readability */
        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.438);
            /* Dark overlay with 50% opacity */
            z-index: 1;
        }

        /* Ensure footer content is above the overlay */
        .footer .container {
            position: relative;
            z-index: 2;
        }

        .footer a {
            /* color: #333; */
            color: #000000;
            text-decoration: none;
        }

        .footer a:hover {
            color: #1a6aa8;
            text-decoration: none;
        }

        .footer h5 {
            /* color: #1a6aa8; */
            color: #000000;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 15px;
            font-size: 15px;
        }

        .footer p,
        .footer ul {
            font-size: 14px;
            line-height: 1.8;
            color: #000000;
        }

        .footer .list-unstyled li {
            margin-bottom: 5px;
        }

        .footer .social-icons a {
            margin-right: 15px;
            font-size: 24px;
            color: #333;
        }

        .footer .social-icons a:hover {
            color: #1a6aa8;
        }

        .footer-logo {
            margin-bottom: 30px;
        }

        .footer-logo img {
            width: 150px;
        }

        .footer-copyright {
            color: #666;
            font-size: 14px;
            margin-top: 30px;
        }

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: transparent;
            border: 2px solid #333;
            color: #333;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            opacity: 0;
            transition: opacity 0.3s;
            z-index: 100;
        }

        .back-to-top.visible {
            opacity: 1;
        }

        .back-to-top:hover {
            background: #1a6aa8;
            color: white;
            border-color: #1a6aa8;
        }

        hr {
            color: #053fe0;
            margin-top: 8%;
        }

        .decorative-banner-left,
        .decorative-banner-center,
        .decorative-banner-right {
            position: fixed;
            z-index: 1000;
            width: 300px;
            height: auto;
            transition: all 0.3s ease;
        }

        .decorative-banner-left {
            left: 0;
            top: 0;
        }

        .decorative-banner-center {
            left: 50%;
            top: -100%;
            /* Initially hidden above the viewport */
            transform: translateX(-50%);
            /* Center horizontally */
            opacity: 0;
            /* Start invisible */
        }

        .decorative-banner-right {
            right: 0;
            top: 0;
            transform: scaleX(1);
        }

        .decorative-banner-center.visible {
            top: 50%;
            /* Center vertically in viewport */
            transform: translateX(-50%) translateY(-50%);
            /* Center both horizontally and vertically */
            opacity: 1;
        }


        @media (max-width: 992px) {

            .decorative-banner-left,
            .decorative-banner-center,
            .decorative-banner-right {
                width: 150px;
            }

            .footer-logo img {
                width: 100px;
            }

            .text-reset {
                margin-left: 350px;
            }

            .navbar-nav .nav-item {
                margin: auto;
            }
        }

        @media (max-width: 768px) {

            .decorative-banner-left,
            .decorative-banner-center,
            .decorative-banner-right {
                width: 120px;
            }

            hr {
                display: none;
            }

            .text-reset {
                margin-left: 350px;
            }

            .navbar-nav .nav-item {
                margin: auto;
            }
        }

        @media (max-width: 576px) {

            .decorative-banner-left,
            .decorative-banner-right {
                display: none;
            }

            .decorative-banner-center {
                width: 100px;
            }

            hr {
                display: none;
            }

            .text-reset {
                margin-left: auto;
            }

            .navbar-toggler {
                line-height: 0;
            }

            .navbar-toggler span {
                font-size: 15px;
                padding: 0;
            }
        }

        @media (max-width: 430px) {

            .decorative-banner-left,
            .decorative-banner-right {
                display: block;
            }
        }

        @media (max-width: 414px) {

            .decorative-banner-left,
            .decorative-banner-right {
                display: block;
            }
        }

        .dropdown-menu {
            background-color: rgba(255, 255, 255, 0.95);
            border: 1px solid #E0E0E0;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 4px 0;
            min-width: 150px;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            padding: 6px 12px;
            /* font-family: 'Roboto', sans-serif; */
            font-size: 14px;
            color: #333333;
            transition: background-color 0.3s ease;
        }

        .dropdown-item[href*="'kh'"] {
            /* font-family: 'Noto Sans Khmer', sans-serif; */
        }

        .flag-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            border: 1px solid #E0E0E0;
            margin-right: 6px;
        }

        .dropdown-item:hover {
            background-color: #E6F0FA;
        }

        .dropdown-item:focus {
            outline: 2px solid #007BFF;
            outline-offset: 1px;
        }

        .text-reset {
            border: 1px solid #ffffff;
            border-radius: 15px;
            padding: 0 9px 0 2px;
            width: 90px;
        }

        .text-reset a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        /* Ensure the language dropdown is visible and properly positioned */
        .language {
            display: flex !important;
            align-items: center;
        }

        /* Custom CSS for iPad Mini, iPad Air, and iPad Pro */
        @media only screen and (min-device-width: 768px) and (max-device-width: 1366px) and (-webkit-min-device-pixel-ratio: 2) {
            .navbar {
                flex-wrap: nowrap;
                padding: 0.5rem 1rem;
            }

            .container {
                max-width: 100%;
                padding: 0 15px;
            }

            .navbar-brand img {
                height: 40px;
            }

            .navbar-nav {
                display: flex !important;
                flex-direction: row !important;
                margin: 0;
                flex-grow: 1;
                justify-content: center;
            }

            .nav-link {
                font-size: 14.5px;
                padding: 0.5rem 0.6rem;
            }

            .navbar-collapse {
                display: block !important;
                flex-grow: 0;
            }

            .language {
                margin-left: auto;
                margin-right: 10px;
                display: flex !important;
            }

            .text-reset {
                margin-left: 0;
            }

            .navbar-toggler {
                display: none !important;
            }
        }

        /* Default behavior for other devices (mobile) */
        @media (max-width: 767.98px) {

            .decorative-banner-left,
            .decorative-banner-right {
                display: block;
                margin-top: 75px
            }

            .navbar {
                flex-direction: row;
                align-items: center;
            }

            .language {
                margin-right: 10px;
                display: flex !important;
            }

            .navbar {
                background: linear-gradient(90deg, rgba(26, 106, 168, 1) 0%, rgba(217, 36, 40, 1) 100%) !important;
                /* !important ensures precedence */
            }

            .navbar-collapse {
                background: linear-gradient(90deg, rgba(26, 106, 168, 1) 0%, rgba(217, 36, 40, 1) 100%);
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                z-index: 1000;
                padding: 10px 0;
            }

            .nav-link:hover::after{
                width: calc(100% - 2rem);
                /* Subtract the padding (1rem left + 1rem right) to match the text width */
                animation: wave 3s linear infinite;
                /* Apply the wave animation */
            }
            .nav-link.active::after{
                width: calc(100% - 2rem);
            }

            .navbar-nav .nav-item {
                margin: 5px 0;
            }
        }

        /* Default behavior for larger screens (desktops) */
        @media (min-width: 1367px) {
            .navbar-nav {
                display: flex !important;
                flex-direction: row !important;
            }

            .nav-link {
                font-size: 16px;
                padding: 0.5rem 1rem;
            }

            .navbar-collapse {
                display: block !important;
            }

            .language {
                margin-left: auto;
                display: flex !important;
                /* Ensure the dropdown is visible on desktop */
            }
        }

        @media (max-width: 344px) {
            .container img{
                height: 40px;
                object-fit: cover;  
                width: 40px;
            }
        }
    </style>
    @yield('styles')
</head>

<body>
    <!-- Decorative Banners -->
    @if (!empty(@$theme->decor))
        <img src="{{ asset(@$theme->decor) }}" alt="Decorative Banner Left" class="decorative-banner-left"
            loading="lazy">
        <img src="{{ asset(@$theme->decor) }}" alt="Decorative Banner Right" class="decorative-banner-right"
            loading="lazy">
    @endif


    <!-- Header -->
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand order-md-1" href="{{ url('/') }}">
                {{-- <img style="width: auto;" src="{{ asset('images/Hi-Tech-Water Logo-blue.png') }}" --}}
                <img style="width: auto;" src="{{ asset($companyInfo->logo) }}" alt="Hi-Tech Water Logo">
            </a>

            <!-- Language Dropdown -->
            <div class="dropdown mx-3 language order-md-3 order-1">
                <div data-mdb-dropdown-init class="main-language text-reset dropdown-toggle hidden-dropdow-xs"
                    data-bs-toggle="dropdown" href="#" id="navbarDropdownMenuLink" role="button"
                    aria-expanded="false">
                    <a href="javascript:void(0);">
                        <span class="icon-language">
                            <img style="width: 25px; height: 25px;"
                                src="{{ asset('./images/' . session('user_lang', 'kh') . '.png') }}"
                                alt="{{ session('user_lang', 'kh') == 'kh' ? 'Khmer' : 'English' }}" loading="lazy" />
                        </span>
                        <span class="label-language">
                            <small>{{ session('user_lang', 'kh') == 'kh' ? 'KH' : 'EN' }}</small>
                        </span>
                    </a>
                </div>
                <ul class="dropdown-menu dropdown-menu-end position-absolute" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('user.set_lang', 'en') }}">
                            <img src="{{ asset('./images/en.png') }}" alt="English flag" loading="lazy"
                                class="flag-icon" />
                            English
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('user.set_lang', 'kh') }}">
                            <img src="{{ asset('./images/kh.png') }}" alt="Cambodian flag" loading="lazy"
                                class="flag-icon" />
                            ភាសាខ្មែរ
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Toggler Button -->
            <button class="navbar-toggler order-md-2 order-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse order-md-2" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.home') ? 'active' : '' }}"
                            href="{{ url('/') }}">{{ __('lang.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('water') ? 'active' : '' }}"
                            href="{{ url('/water') }}"> {{ __('lang.water') }} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                            href="{{ url('/about') }}"> {{ __('lang.aboutus') }} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('blog') ? 'active' : '' }}"
                            href="{{ url('/blog') }}"> {{ __('lang.blog') }} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('career') ? 'active' : '' }}"
                            href="{{ url('/career') }}"> {{ __('lang.career') }} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                            href="{{ url('/contact') }}"> {{ __('lang.contactus') }} </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content Section -->
    @yield('content')

    <!-- Footer -->

    <footer class="footer"
        @if (!empty(@$theme->footer_decor)) style="background-image: url({{ asset(@$theme->footer_decor) }})" @endif>
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-lg-5">
                    <hr>
                </div>
                <div class="col-md-2 col-sm-2 col-lg-2 text-center footer-logo">
                    <img src="{{ asset('images/Hi-Tech_Water_Logo.png') }}" alt="Hi-Tech Logo">
                </div>
                <div class="col-md-5 col-sm-5 col-lg-5">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <h5> {{ __('lang.contactus') }} </h5>
                    <a href="{{ $companyInfo->location_link }}" target="_blank">
                        <p><i class="bi bi-geo-alt-fill"></i> {{ $companyInfo->address }}
                    </a>
                    </p>
                    <p><i class="bi bi-envelope-fill"></i> {{ $companyInfo->company_email }}</p>
                </div>
                <div class="col-md-3">
                    <h5> {{ __('lang.Hi-Tech Water') }} </h5>
                    <ul class="list-unstyled">

                        <li><a href="{{ url('/water') }}">{{ __('lang.water') }}</a></li>
                        <li><a href="{{ url('/about') }}">{{ __('lang.aboutus') }}</a></li>
                        <li><a href="{{ url('/blog') }}">{{ __('lang.blog') }}</a></li>
                        <li><a href="{{ url('/career') }}">{{ __('lang.career') }}</a></li>
                        <li><a href="{{ url('/contact') }}">{{ __('lang.contactus') }}</a></li>

                    </ul>
                </div>
                <div class="col-md-3">
                    <h5> {{ __('lang.Terms & Policies') }} </h5>
                    <ul class="list-unstyled">
                        <li><a href="#"> {{ __('lang.deliveryService') }} </a></li>
                        <li><a href="#">{{ __('lang.Terms of Use') }}</a></li>
                        <li><a href="#"> {{ __('lang.Privacy Policy') }} </a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5> {{ __('lang.Connect with Us') }} </h5>
                    <div class="social-icons">
                        @php
                            $socialMedia = DB::table('socials')
                                ->orderBy('id', 'desc')
                                ->where('active_status', 1)
                                ->get();
                        @endphp
                        @foreach ($socialMedia as $s)
                            <a href="{{ $s->link_social }}" target="_blank"><i
                                    class="bi bi-{{ $s->social }}"></i></a>
                        @endforeach
                        {{-- <a href="#"><i class="bi bi-instagram"></i></a> --}}
                    </div>
                </div>
            </div>
            <div class="text-center footer-copyright">
                <p>{{ $companyInfo->copy_right }}</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- Bootstrap 5 JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        // Toggle navbar style on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            const backToTop = document.querySelector('.back-to-top');
            const bannerLeft = document.querySelector('.decorative-banner-left');
            const bannerRight = document.querySelector('.decorative-banner-right');

            // Only apply scroll behavior for screens wider than 767.98px (non-mobile)
            if (window.innerWidth > 767.98) {
                if (window.scrollY > 100) {
                    navbar.classList.add('navbar-scrolled');
                    bannerLeft.style.top = '75px';
                    bannerRight.style.top = '75px';
                } else {
                    navbar.classList.remove('navbar-scrolled');
                    bannerLeft.style.top = '0';
                    bannerRight.style.top = '0';
                }
            }

            if (window.scrollY > 300) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });

        $(document).ready(function() {
            $('#test').click(function() {
                alert('clicked');
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
