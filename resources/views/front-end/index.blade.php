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
    <link rel="stylesheet" href="{{ asset('front-end/css/index.css') }}">
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
        @if (!empty($theme)) style="background: url('{{ asset($theme->water_bg) }}')" @endif>
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
