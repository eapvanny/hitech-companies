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
    {{-- <link rel="icon" href="https://hitech.com.kh/wp-content/uploads/2022/03/Hi-Tech-Water-eng-white-01.svg"
        type="image/png"> --}}
    <link rel="icon" href="{{ asset('backends/assets/img/logo/hitech-icon.png') }}" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('front-end/css/style.css') }}">
    <meta property="description" content="Hitech water" />
    <meta property="description" content="Hitech water" />
    @yield('seo')
    
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

    <div id="snow"></div>

    <!-- Header -->
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand order-md-1" href="{{ url('/') }}">
                @if (!empty(@$theme->decor))
                    <span class="logo-default">
                        <img style="width: auto;" src="{{ asset('images/Logo-01.png') }}" alt="Default Logo">
                    </span>
                    <span class="logo-scrolled">
                        <img style="width: auto;" src="{{ asset('images/Logo-02.png') }}" alt="Scrolled Logo">
                    </span>
                @else
                    <span class="logo-default">
                        <img style="width: auto;" src="{{ asset('images/Hi-Tech_Water_Logo.png') }}" alt="Default Logo">
                    </span>
                    <span class="logo-scrolled">
                        <img style="width: auto;" src="{{ asset('images/Hi-Tech-Water Logo-blue.png') }}" alt="Scrolled Logo">
                    </span>
                @endif
                <!-- <img style="width: auto;" src="{{ asset($companyInfo->logo) }}" alt="Hi-Tech Water Logo"> -->
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
            <div class="collapse navbar-collapse order-md-2" id="navbarNav" style="font-family: 'Poppins','Kantumruy', sans-serif">
                <ul class="navbar-nav mx-auto">
                    @php
                        $navClass = session('user_lang', 'kh') === 'en' ? 'nav-item-en' : 'nav-item';
                    @endphp

                    <li class="{{ $navClass }}">
                        <a class="nav-link {{ request()->routeIs('user.home') ? 'active' : '' }}"
                            href="{{ url('/') }}">{{ __('lang.home') }}</a>
                    </li>
                    <li class="{{ $navClass }}">
                        <a class="nav-link {{ request()->routeIs('water') ? 'active' : '' }}"
                            href="{{ url('/water') }}"> {{ __('lang.product') }} </a>
                    </li>
                    <li class="{{ $navClass }}">
                        <a class="nav-link {{ request()->routeIs('event') ? 'active' : '' }}"
                            href="{{ url('/event') }}"> {{ __('lang.event') }} </a>
                    </li>
                    <li class="{{ $navClass }}">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                            href="{{ url('/about') }}"> {{ __('lang.aboutus') }} </a>
                    </li>
                    <li class="{{ $navClass }}">
                        <a class="nav-link {{ request()->routeIs('blog') ? 'active' : '' }}"
                            href="{{ url('/blog') }}"> {{ __('lang.blog') }} </a>
                    </li>
                    {{-- <li class="{{ $navClass }}">
                        <a class="nav-link {{ request()->routeIs('career') ? 'active' : '' }}"
                            href="{{ url('/career') }}"> {{ __('lang.career') }} </a>
                    </li> --}}
                    <li class="{{ $navClass }}">
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
        {{-- <div class="waves"></div>
        <div class="waves"></div>
        <div class="waves"></div> --}}
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
                        <p><i class="bi bi-geo-alt-fill"></i> {{ $companyInfo->address }}</p>
                    </a>
                    <a href="">
                        <p><i class="bi bi-envelope-fill"></i> {{ $companyInfo->company_email }}</p>
                    </a>
                </div>
                <div class="col-md-3">
                    <h5> {{ __('lang.Hi-Tech Water') }} </h5>
                    <ul class="list-unstyled">

                        <li><a href="{{ url('/water') }}">{{ __('lang.product') }}</a></li>
                        <li><a href="{{ url('/about') }}">{{ __('lang.aboutus') }}</a></li>
                        <li><a href="{{ url('/blog') }}">{{ __('lang.blog') }}</a></li>
                        {{-- <li><a href="{{ url('/career') }}">{{ __('lang.career') }}</a></li> --}}
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
        window.addEventListener('scroll', function () {
            const navbar = document.querySelector('.navbar');
            const backToTop = document.querySelector('.back-to-top');
            const bannerLeft = document.querySelector('.decorative-banner-left');
            const bannerRight = document.querySelector('.decorative-banner-right');

            // Navbar and banner scroll behavior for non-mobile devices
            if (window.innerWidth > 767.98) {
                if (window.scrollY > 100) {
                    navbar.classList.add('navbar-scrolled');
                    document.body.classList.add('navbar-colored');
                    // if (bannerLeft) bannerLeft.style.top = '75px';
                    // if (bannerRight) bannerRight.style.top = '75px';
                } else {
                    navbar.classList.remove('navbar-scrolled');
                    document.body.classList.remove('navbar-colored');
                    // if (bannerLeft) bannerLeft.style.top = '0';
                    // if (bannerRight) bannerRight.style.top = '0';
                }
            }

            // Back-to-top visibility
            if (window.scrollY > 300) {
                backToTop.classList.add('visible');
                console.log('Back to Top button should be visible'); // Debug log
            } else {
                backToTop.classList.remove('visible');
            }
        });

        // Smooth scroll to top when back-to-top is clicked
        document.querySelector('.back-to-top').addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        $(document).ready(function() {
            $('#test').click(function() {
                alert('clicked');
            });
        });
        // Snow Falling Effect
            function createSnowflake() {
            const el = document.createElement('div');
            el.classList.add('snowflake');
            el.innerHTML = ['.','❅', '❆', '❄'][Math.floor(Math.random() * 4)];

            // Position and animation settings
            el.style.left = Math.random() * 100 + 'vw';
            el.style.fontSize = (Math.random() * 1 + 0.7) + 'em';
            const duration = Math.random() * 5 + 8; // 8s - 13s
            el.style.animationDuration = duration + 's';
            el.style.setProperty('--drift', (Math.random() * 100 - 50) + 'px');

            document.getElementById('snow').appendChild(el);

            // Remove after falling to avoid memory
            setTimeout(() => el.remove(), duration * 1000);
        }

        // Smooth animation every 200ms
        let snowInterval = setInterval(createSnowflake, 200);

        // Stop after 2 minutes
        setTimeout(() => {
            clearInterval(snowInterval);
            console.log("Snowfall stopped after 2 minutes.");
        }, 120000); // 120,000 ms = 2 minutes

        // Nice initial effect
        for (let i = 0; i < 20; i++) {
            setTimeout(createSnowflake, i * 100);
        }

    </script>
    @stack('scripts')
</body>

</html>
