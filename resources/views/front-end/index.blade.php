@extends('front-end.layouts.master')

@section('title', 'Home')

@section('seo')
    <meta property="og:title" content="Hi Tech Water">
    <meta property="og:description" content="{{ $slides->title_en }}">
    <meta name="description" content="{{ $overview->title_en }}">
@endsection

@section('styles')
    <link rel="preload" href="{{ asset('front-end/css/index.css') }}" as="style">
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
            <!-- <img loading="lazy" src="{{ asset($slides->img) }}" alt="Hi-Tech Water"> -->
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
                    <iframe loading="lazy"
                        src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2Fhitechforhealth%2Fvideos%2F846104387666224%2F&show_text=false&width=560&t=0"
                        scrolling="no" frameborder="0" allowfullscreen="true"
                        allow="clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
            </div>
        </div>
    </section>
    <section class="our-water-theme"
        @if (!empty($theme)) style="background: url('{{ asset('storage/' . $theme->water_bg) }}');  background-size: cover;
            background-position: center;
            background-repeat: no-repeat;" @endif>
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
                                <img src="{{ asset('hitech-bottle/new-image/250ml.png') }}" loading="lazy" alt="HI-TECH Water Bottle">
                            @elseif ($w->bottle == '350ml')
                                <img src="{{ asset('hitech-bottle/new-image/bottle-350ml.png')}}" loading="lazy" 
                                    alt="HI-TECH Water Bottle">
                            @elseif ($w->bottle == '600ml')
                                <img src="{{ asset('hitech-bottle/new-image/bottle-600ml.png')}}" loading="lazy" 
                                    alt="HI-TECH Water Bottle">
                            @elseif ($w->bottle == '1500ml')
                                <img src="{{ asset('hitech-bottle/new-image/bottle-1500ml.png')}}" loading="lazy" 
                                    alt="HI-TECH Water Bottle">
                            @else
                                <img src="{{ asset('hitech-bottle/new-image/20l-old.png') }}" loading="lazy" alt="HI-TECH Water Bottle">
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
                            <img src="{{ asset('storage/'.$image) }}" loading="lazy" alt="Quality Award">
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
                    <img src="{{ asset('storage/' . $s->img) }}" loading="lazy" alt="Quality and Price" data-src="path-to-quality-price-image.jpg">
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
                <img src="{{ asset('images/Truck.png') }}" loading="lazy" alt="Delivery Truck" data-src="path-to-delivery-image.jpg">
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
        document.addEventListener('DOMContentLoaded', function () {

            /* ------------------------------------------
            *  OUR WATER SLIDER
            * ------------------------------------------ */

            const waterSlider = document.getElementById('water-slider');
            const waterItems = waterSlider.querySelectorAll('.water-item');
            const totalWaterItems = waterItems.length;

            let waterItemsPerPage = 3;
            let waterIndex = 0;

            function updateWaterItemsPerPage() {
                if (window.innerWidth <= 768) {
                    waterItemsPerPage = 1;
                } else if (window.innerWidth <= 992) {
                    waterItemsPerPage = 2;
                } else {
                    waterItemsPerPage = 3;
                }
            }

            function updateWaterSlider() {
                const itemWidth = 100 / waterItemsPerPage;
                const translateX = -(waterIndex * itemWidth);
                waterSlider.style.transform = `translateX(${translateX}%)`;
            }

            window.addEventListener('resize', () => {
                updateWaterItemsPerPage();
                updateWaterSlider();
            });

            // Animation using IntersectionObserver
            const waterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    const items = entry.target.querySelectorAll('.water-item');
                    const sectionTop = entry.boundingClientRect.top;

                    if (entry.isIntersecting) {
                        items.forEach((item, index) => {
                            setTimeout(() => item.classList.add('active'), index * 200);
                        });
                    } else {
                        if (sectionTop >= 0) {
                            items.forEach(item => item.classList.remove('active'));
                        }
                    }
                });
            }, { threshold: 0.5 });

            waterObserver.observe(document.querySelector('.our-water-theme'));

            // Water button navigation
            document.getElementById('next-btn').addEventListener('click', function () {
                if (waterIndex < totalWaterItems - waterItemsPerPage) {
                    waterIndex++;
                    updateWaterSlider();
                }
            });

            document.getElementById('prev-btn').addEventListener('click', function () {
                if (waterIndex > 0) {
                    waterIndex--;
                    updateWaterSlider();
                }
            });

            updateWaterItemsPerPage();
            updateWaterSlider();


            /* ------------------------------------------
            *  AWARD SLIDER
            * ------------------------------------------ */

            const awardSlider = document.getElementById('awardSlider');
            const awardSlides = document.querySelectorAll('.quality-award-item');
            const awardNav = document.getElementById('sliderNav');

            let awardIndex = 0;
            let awardScrolling = false;
            let autoSlideInterval;

            // Create dots
            awardSlides.forEach((slide, index) => {
                const dot = document.createElement('span');
                dot.classList.add('slider-dot');
                if (index === 0) dot.classList.add('active');

                dot.addEventListener('click', () => {
                    if (!awardScrolling) {
                        awardIndex = index;
                        scrollToAward(index);
                    }
                });

                awardNav.appendChild(dot);
            });

            function updateAwardDots() {
                const dots = document.querySelectorAll('.slider-dot');
                dots.forEach((dot, i) => {
                    dot.classList.toggle('active', i === awardIndex);
                });
            }

            function scrollToAward(index) {
                if (awardScrolling) return;
                awardScrolling = true;

                const slide = awardSlides[index];
                const scrollPos = slide.offsetLeft - awardSlider.offsetLeft;

                awardSlider.scrollTo({
                    left: scrollPos,
                    behavior: 'smooth'
                });

                awardIndex = index;
                updateAwardDots();

                setTimeout(() => {
                    awardScrolling = false;
                }, 1000);
            }

            function autoAwardSlide() {
                if (awardScrolling) return;

                const next = (awardIndex + 1) % awardSlides.length;
                const looping = next === 0;

                if (looping) {
                    const clone = awardSlides[0].cloneNode(true);
                    awardSlider.appendChild(clone);

                    awardSlider.scrollTo({
                        left: awardSlider.scrollWidth,
                        behavior: 'smooth'
                    });

                    setTimeout(() => {
                        awardSlider.scrollLeft = 0;
                        awardSlider.removeChild(clone);
                        awardIndex = 0;
                        updateAwardDots();
                        awardScrolling = false;
                    }, 1000);

                } else {
                    awardIndex = next;
                    scrollToAward(next);
                }
            }

            function startAutoAward() {
                autoSlideInterval = setInterval(autoAwardSlide, 3000);
            }

            function stopAutoAward() {
                clearInterval(autoSlideInterval);
            }

            awardSlider.addEventListener('mouseenter', stopAutoAward);
            awardSlider.addEventListener('mouseleave', startAutoAward);

            awardSlider.addEventListener('scroll', () => {
                if (awardScrolling) return;

                const index = Math.round(awardSlider.scrollLeft / awardSlides[0].offsetWidth);
                if (index < awardSlides.length) {
                    awardIndex = index;
                    updateAwardDots();
                }
            });

            startAutoAward();

        });
</script>

@endpush
