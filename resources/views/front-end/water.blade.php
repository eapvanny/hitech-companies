@extends('front-end.layouts.master')

@section('title', 'Water')

@section('seo')

    <meta property="og:title" content="Our water" />
    <meta property="twitter:title" content="Our water " />
    <meta property="og:description" content="Water hitech" />
    <meta property="twitter:description" content="Water hitech" />

    @foreach ($waters as $w)
        <meta property="og:description" content="{{ $w->description }}" />
        <meta property="twitter:description" content="{{ $w->description }}" />
    @endforeach
    

    {{-- <meta name="description" content="">
    <meta name="description" content=""> --}}

@endsection

@section('styles')
    <style>
        .water-section {
            background-image: url({{asset('images/water-image-header-2.jpg')}});
            background-size: cover;
            background-position: center;
            height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 50px;
            /* margin-top: 40px; */
        }

        .water-section .text-content {
            color: white;
            max-width: 50%;
        }

        .water-section .text-content h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 10px;
            margin-left: 50px;
            margin-top: -158px;
        }

        .water-section .text-content p {
            font-size: 18px;
            font-weight: 600;
            margin-left: 50px;
        }

        .our-water {
            padding: 30px 20px;
            background: linear-gradient(180deg, #052660 0%, #021E4FC2 100%);
            color: white;
        }

        .water-content {
            display: flex;
            max-width: 1300px;
            align-items: center;
            gap: 30px;
        }

        .content-wrapper {
            overflow: hidden;
            width: 100%;
            max-width: 500px;
        }

        .content-slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .content-item {
            flex: 0 0 100%;
            background-color: #112A5A;
            padding: 100px 60px;
            border: 2px solid #1D3D7A;
            border-radius: 10px;
            box-sizing: border-box;
            line-height: 1.9rem;
        }

        .content-item h6 {
            font-size: 16px;
            font-weight: bold;
            line-height: 1.9rem;
            

        }

        .content-item h2 {
            font-size: 24px;
            font-weight: bold;
            margin: 10px 0;
            line-height: 1.9rem;

        }

        .content-item span {
            font-size: 14px;
            font-weight: 600;
            color: #adc3df;
        }

        .content-item p {
            margin-top: 10px;
            font-size: 14px;
            line-height: 1.9rem;
        }

        .water-details-wrapper {
            overflow: hidden;
            width: 100%;
            max-width: 750px;
        }

        .water-details {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .water-item {
            flex: 0 0 33.33%;
            text-align: center;
            opacity: 0.5;
            transition: opacity 0.5s ease;
        }

        .water-item.active {
            opacity: 1;
        }

        .water-item img {
            max-width: 100%;
            height: auto;
        }

        .navigation {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 10px;
        }

        .navigation span {
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 15px;
            transition: 0.3s;
            opacity: 1;
        }

        .navigation span.disabled {
            opacity: 0.3;
            cursor: not-allowed;
        }

        @media (max-width: 1280px) {
            .water-section {
                height: 85vh;
                margin-top: auto;
            }

            .water-section .text-content {
                max-width: 100%;
                justify-content: left;
            }

            .water-section .text-content h1 {
                font-size: 32px;
            }

            .water-section .text-content p {
                font-size: 14px;
            }
            .water-content {
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .content-wrapper {
                width: 45%;
                max-width: 450px;
            }

            .water-details-wrapper {
                width: 50%;
                max-width: 500px;
            }

            .content-item {
                justify-content: flex-start;
                text-align: left;
                padding: 20px;
            }

            .content-item h2 {
                font-size: 22px;
            }

            .content-item p {
                font-size: 13px;
                margin-top: 50px;
            }
            
            .navigation span {
                font-size: 15px;
            }
        }

        @media (max-width: 1024px) {
            .water-section {
                height: 35vh;
                /* margin-top: 70px; */
            }

            .water-section .text-content {
                max-width: 100%;
                justify-content: left;
            }

            .water-section .text-content h1 {
                font-size: 32px;
            }

            .water-section .text-content p {
                font-size: 14px;
            }

            .water-content {
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .content-wrapper {
                width: 45%;
                max-width: 450px;
            }

            .water-details-wrapper {
                width: 50%;
                max-width: 500px;
            }

            .content-item h2 {
                font-size: 22px;
            }

            .content-item p {
                font-size: 13px;
            }

            .navigation span {
                font-size: 15px;
            }
        }
        @media (max-width: 1024px) {
            .water-section {
                height: 35vh;
            }

            .water-section .text-content {
                max-width: 90%;
                margin-left: -120px;
                margin-top: 100px;
            }

            .water-section .text-content h1 {
                font-size: 35px;
                margin-left: 80px;
            }

            .water-section .text-content p {
                font-size: 18px;
                margin-left: 80px
            }
        }
        @media (max-width: 820px) {
            .water-section {
                height: 35vh;
            }

            .water-section .text-content {
                max-width: 90%;
                margin-left: -120px;
                margin-top: 210px;
            }

            .water-section .text-content h1 {
                font-size: 35px;
                margin-left: 80px;
            }

            .water-section .text-content p {
                font-size: 18px;
                margin-left: 80px
            }
        }
        @media (max-width: 768px) {
            .water-section {
                height: 35vh;
            }

            .water-section .text-content {
                max-width: 90%;
                margin-left: -120px;
                margin-top: 210px;
            }

            .water-section .text-content h1 {
                font-size: 35px;
                margin-left: 80px;
            }

            .water-section .text-content p {
                font-size: 18px;
                margin-left: 80px
            }

            .water-content {
                flex-direction: row;
                flex-wrap: nowrap;
                justify-content: space-between;
            }

            .content-wrapper {
                width: auto;
                max-width: 350px;
            }

            .water-details-wrapper {
                width: 100%;
                max-width: 400px;
            }

            .content-item {
                padding: 15px;
            }

            .water-item img {
                max-width: 100%;
            }
        }
        @media (max-width: 540px) {
            .water-section {
                height: 40vh;
            }
            .water-section .text-content {
                max-width: 90%;
                margin-left: -85px;
                margin-top: 160px;
            }
            .water-section .text-content h1 {
                font-size: 22px;
                margin-left: 50px;
            }
            .water-section .text-content p {
                font-size: 13px;
                margin-left: 50px
            }
            .water-content {
                flex-direction: column;
                flex-wrap: wrap;
                justify-content: center;
            }
        }
        @media (max-width: 430px) {
            .water-section {
                height: 30vh;
            }
            .water-section .text-content {
                max-width: 90%;
                margin-left: -85px;
                margin-top: 160px;
            }
            .water-section .text-content h1 {
                font-size: 22px;
                margin-left: 50px;
            }
            .water-section .text-content p {
                font-size: 18px;
                margin-left: 80px
            }
            .water-content {
                flex-direction: column;
                flex-wrap: wrap;
                justify-content: center;
            }
        }
        @media (max-width: 430px) {
            .water-section {
                height: 30vh;
                margin-top: 50px;

            }

            .water-section .text-content {
                max-width: 90%;
                margin-left: -85px;
                margin-top: 170px;
            }

            .water-section .text-content h1 {
                font-size: 22px;
                margin-left: 50px;
                margin-top: -100px;

            }

            .water-section .text-content p {
                font-size: 14px;
                margin-left: 50px;
            }
        }
        @media (max-width: 420px) {
            .water-section {
                height: 30vh;
                margin-top: 50px;
            }

            .water-section .text-content {
                max-width: 90%;
                margin-left: -85px;
                margin-top: 170px;
            }

            .water-section .text-content h1 {
                font-size: 22px;
                margin-left: 50px;
                margin-top: -100px;
            }

            .water-section .text-content p {
                font-size: 13px;
            }

            .water-content {
                flex-direction: column;
            }

            .content-wrapper {
                width: 100%;
                max-width: 500px;
            }

            .water-details-wrapper {
                width: 100%;
                max-width: 750px;
            }

            .content-item h2 {
                font-size: 18px;
            }

            .content-item p {
                font-size: 10px;
            }

            .navigation span {
                font-size: 12px;
            }
        }

        @media (max-width: 360px) {
            .water-section .text-content {
                max-width: 100%;
                margin-left: -85px;
                margin-top: 160px;
            }
            .water-section .text-content h1 {
                font-size: 18px;
                margin-left: 50px;
            }
            .water-section .text-content p {
                font-size: 11px;
            }
        }
        @media (max-width: 344px) {
            .water-section{
                height: 25vh;
            }
        }
    </style>
@endsection

@section('content')
    <section class="water-section">
        <div class="text-content">
            <h1> {{ __('lang.products') }} </h1>
            <p>
                {{ __('lang.producttitle') }}
            </p>
        </div>
    </section>

    <section class="our-water">
        <div class="water-content">
            <div class="content-wrapper">
                <div class="content-slider" id="content-slider">
                    @foreach ($waters as $w)
                    <div class="content-item">
                        <h6>Hi-TECH</h6>

                        <h2> {{ $w->bottle }} Water Bottle</h2>
                        <span> {{ __('lang.water_subtitle') }} </span>

                        <p>
                        @if (session()->has('user_lang') && session('user_lang') == 'en')
                            {{ $w->description_en }}
                        @else
                            {{ $w->description_kh }}
                        @endif    
                            {{-- {{ $w->description }} --}}
                        </p>
                    </div>
                    @endforeach
                    
                    {{-- <div class="content-item">
                        <h6>Hi-TECH</h6>
                        <h2>600 ml Water Bottle</h2>
                        <span>Suitable for use in many programs</span>
                        <p>600ml water is suitable for daily consumption as well as in any occasions such as meeting,
                            wedding ceremony, party, travelling, sports and other purposes. Hi-tech drinking water fulfills
                            your need of pure water in every moment.</p>
                    </div>
                    <div class="content-item">
                        <h6>Hi-TECH</h6>
                        <h2>1500 ml Water Bottle</h2>
                        <span>Suitable for use in many programs</span>
                        <p>1500ml water is suitable for daily consumption as well as in any occasions such as meeting,
                            wedding ceremony, party, travelling, sports and other purposes. Hi-tech drinking water fulfills
                            your need of pure water in every moment.</p>
                    </div>
                    <div class="content-item">
                        <h6>Hi-TECH</h6>
                        <h2>20 L Water</h2>
                        <span>Suitable for use in many programs</span>
                        <p>20L water is suitable for traveling, home and office use.</p>
                    </div> --}}
                </div>
            </div>

            <div class="water-details-wrapper">
                <div class="water-details" id="water-slider">

                    {{-- <div class="water-item active">
                        <img src="https://hitech.com.kh/wp-content/uploads/2022/03/bottle-350ml.png"
                            alt="HI-TECH 350 ml Water Bottle">
                    </div> --}}

                    @foreach ($waters as $w)
                    <div class="water-item">
                        @if ($w->bottle == '250ml')
                            <img src="{{ asset('hitech-bottle/waters/250ml.png') }}" alt="HI-TECH Water Bottle">
                        @elseif ($w->bottle == '350ml')
                            <img src="{{ asset('hitech-bottle/waters/bottle-350ml.png') }}" alt="HI-TECH Water Bottle">
                        @elseif ($w->bottle == '600ml')
                            <img src="{{ asset('hitech-bottle/waters/bottle-600ml.png') }}" alt="HI-TECH Water Bottle">
                        @elseif ($w->bottle == '1500ml')
                            <img src="{{ asset('hitech-bottle/waters/bottle-1500ml.png') }}" alt="HI-TECH Water Bottle">
                        @else
                            <img src="{{ asset('hitech-bottle/waters/bottle-20L-3-2.png') }}" alt="HI-TECH Water Bottle">
                        @endif
                        {{-- <h3>
                            {{ $w->bottle }}
                            Water Bottle</h3>
                        <p> {{ $w->title }} </p>
                        <a href="{{route('water')}}"  class="view-more"> {{ __('lang.viewmore') }} </a> --}}
                    </div>
                    @endforeach

                    {{-- <div class="water-item">
                        <img src="https://hitech.com.kh/wp-content/uploads/2022/03/bottle-600ml.png"
                            alt="HI-TECH 600 ml Water Bottle">
                    </div>
                    <div class="water-item">
                        <img src="https://hitech.com.kh/wp-content/uploads/2022/03/bottle-1500ml.png"
                            alt="HI-TECH 1500 ml Water Bottle">
                    </div>
                    <div class="water-item">
                        <img src="https://hitech.com.kh/wp-content/uploads/2022/03/bottle-20L-3-2.png"
                            alt="HI-TECH 20L Water">
                    </div> --}}
                </div>
                <div class="navigation">
                    <span class="prev" id="prev-btn">
                        << {{__('lang.prev')}}</span>
                            <span class="next" id="next-btn"> {{ __('lang.next') }} >></span>
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
