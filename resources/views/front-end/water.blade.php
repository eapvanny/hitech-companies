@extends('front-end.layouts.master')

@section('title', 'Water')

@section('seo')
    <meta property="og:title" content="Our water" />
    <meta property="twitter:title" content="Our water" />

    @if ($waters->first())
        <meta property="og:description" content="{{ $waters->first()->description }}" />
        <meta property="twitter:description" content="{{ $waters->first()->description }}" />
    @endif
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('front-end/css/water.css') }}">
@endsection

@section('content')

<section class="water-section">
    <div class="text-content">
        <h1>{{ __('lang.products') }}</h1>
        <p>{{ __('lang.producttitle') }}</p>
    </div>
</section>

<section class="our-water">
    <div class="water-content">

        {{-- LEFT CONTENT --}}
        <div class="content-wrapper">
            <div class="content-slider" id="content-slider">
                @foreach ($waters as $w)
                    <div class="content-item">
                        <h6>Hi-TECH</h6>
                        <h2>{{ $w->bottle }} {{ __('Drinking Water') }}</h2>
                        <span>{{ __('lang.water_subtitle') }}</span>

                        <p>
                            {{ session('user_lang') === 'en' ? $w->description : $w->description_kh }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- RIGHT SLIDER --}}
        <div class="water-details-wrapper">
            <div class="water-details" id="water-slider">

                @foreach ($waters as $w)
                    <div class="water-item">
                        @php
                            $img = match($w->bottle) {
                                '250ml' => '250ml.png',
                                '350ml' => 'bottle-350ml.png',
                                '600ml' => 'bottle-600ml.png',
                                '1500ml' => 'bottle-1500ml.png',
                                default => '20l-old.png'
                            };
                        @endphp

                        <img 
                            src="{{ asset('hitech-bottle/new-image/' . $img) }}" 
                            loading="lazy" 
                            decoding="async"
                            alt="HI-TECH {{ $w->bottle }} Water Bottle">
                    </div>
                @endforeach

            </div>

            <div class="navigation">
                <span class="prev" id="prev-btn"> << {{ __('lang.prev') }} </span>
                <span class="next" id="next-btn"> {{ __('lang.next') }} >> </span>
            </div>
        </div>

    </div>
</section>

@endsection

@push('scripts')
<script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const imageSlider = document.getElementById('water-slider');
            const contentSlider = document.getElementById('content-slider');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const items = imageSlider.querySelectorAll('.water-item');
            const totalItems = items.length;
            let currentIndex = 0;

            function updateDisplay() {
                items.forEach(item => item.classList.remove('active'));
                items[currentIndex].classList.add('active');

                const itemWidthPercentage = 100 / 3;
                const translateX = -currentIndex * itemWidthPercentage;
                imageSlider.style.transform = `translateX(${translateX}%)`;

                contentSlider.style.transform = `translateX(-${currentIndex * 100}%)`;

                prevBtn.classList.toggle('disabled', currentIndex === 0);
                nextBtn.classList.toggle('disabled', currentIndex === totalItems - 1);
            }

            nextBtn.addEventListener('click', function() {
                if (currentIndex < totalItems - 1) {
                    currentIndex++;
                    updateDisplay();
                }
            });

            prevBtn.addEventListener('click', function() {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateDisplay();
                }
            });

            updateDisplay();
        });
    </script>
@endpush
