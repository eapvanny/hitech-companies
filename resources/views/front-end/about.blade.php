@extends('front-end.layouts.master')

@section('title', 'About Us')

@section('seo')
    <meta property="og:title" content="About hitech water" />
    <meta property="twitter:title" content=" About hitech water " />
    <meta property="og:description" content=" {{ $ourcomapny->description_en }} " />
    <meta property="og:description" content=" {{ $ourcomapny->description_kh }} " />
    <meta property="twitter:description" content=" {{ $ourcomapny->description_en }} " />
    <meta property="twitter:description" content=" {{ $ourcomapny->description_kh }} " />

@endsection


@section('styles')
    <style>
        /* Reset default margins and improve box-sizing */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        h1,h2,p{
            line-height: 1.65rem;
        }
        h1{
            margin-bottom: 20px;
        }
        /* Existing About Section Styles */
        .about-section {
            padding: 220px 0;
            background-image: url({{asset('images/about-image-header.jpg')}});
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            height: 110vh;
            color: #fff;
            margin-top: -68px;
        }

        p {
            margin-top: 0;
            margin-bottom: 0;
        }

        .about-container {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            min-height: 100%;
            /* padding: 20px; */
        }

        .about-content {
            max-width: 500px;
            text-align: left;
            margin-top: -30px;
        }

        .about-content h1 {
            font-size: clamp(1.5rem, 5vw, 2.8rem);
            /* Dynamic font size */
            color: #FFFFFF;
            font-weight: bold;
        }

        .about-content p {
            font-size: clamp(0.85rem, 2.5vw, 1rem);
            line-height: 1.7;
            color: #FFFFFF;
        }

        /* Commitment Section Styles */
        .commitment-section {
            padding: 50px 0;
            background-color: #fff;
        }

        .commitment-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .commitment-content {
            display: flex;
            flex-direction: row;
            align-items: center;
            max-width: 1200px;
            gap: 30px;
        }

        .commitment-image {
            flex: 1;
            position: relative;
        }

        .commitment-image img {
            width: 100%;
            max-width: 500px;
            height: auto;
        }

        .commitment-name {
            position: absolute;
            bottom: 40px;
            left: -40px;
            background-color: #1a6aa8;
            color: #fff;
            font-size: clamp(1rem, 2vw, 1.2rem);
            font-weight: bold;
            padding: 8px 20px;
            /* box-shadow: 8px 8px 0px 0px #EDC932; */
        }

        .commitment-text {
            flex: 1;
            text-align: left;
        }

        .commitment-text h2 {
            font-size: clamp(1.2rem, 3vw, 1.5rem);
            color: #1a6aa8;
            margin-bottom: 10px;
            font-weight: bold;
            position: relative;
            text-transform: uppercase;
            display: inline-block;
            word-spacing: 5px;
            /* Added to make the width match content */
        }

        .commitment-text h2::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 100%;
            /* Changed to 100% to match the h2 text width */
            height: 3px;
            background-color: #1a6aa8;
        }

        .commitment-text p {
            font-size: clamp(0.9rem, 2.5vw, 1rem);
            line-height: 1.7;
            color: #333;
            margin-top: 40px;
        }

        /* Vision Section Styles */
        .vision-section {
            padding: 20px 10px 40px 0;
            background-color: #1A6AA8;
            position: relative;
            overflow: hidden;
        }

        .vision-section::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 30px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.29,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" fill="white"/></svg>') repeat-x;
            background-size: cover;
            /* Better scaling */
        }

        .vision-container {
            display: flex;
            justify-content: left;
            align-items: center;
            padding: 20px;
        }

        .vision-content {
            display: flex;
            flex-direction: row;
            align-items: center;
            max-width: 1200px;
            gap: 30px;
        }

        .vision-image {
            flex: 1;
            position: relative;
        }

        .vision-image img {
            width: 100%;
            max-width: 330px;
            height: auto;
            border-radius: 20%;
            object-fit: cover;
        }

        .vision-text {
            flex: 1;
            text-align: left;
            color: #fff;
        }

        .vision-text .logo {
            margin-bottom: 15px;
            margin-top: -100px;
        }

        .vision-text .logo img {
            width: 100%;
            max-width: 300px;
            height: auto;
        }

        .vision-text h2 {
            font-size: clamp(1.2rem, 3vw, 1.5rem);
            font-weight: bold;
            margin-bottom: 15px;
            text-transform: uppercase;
            margin-top: 80px;
        }

        .vision-text p {
            font-size: clamp(0.9rem, 2.5vw, 1rem);
            line-height: 1.7;
        }

        /* Core Values Section */
        .core-values-section {
            padding: 50px 0;
            background-color: #fff;
        }

        .core-values-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .core-values-content {
            text-align: center;
            max-width: 1200px;
        }

        .core-values-content h2 {
            font-size: clamp(1.2rem, 3vw, 1.5rem);
            color: #1a6aa8;
            margin-bottom: 40px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .core-values-grid {
            position: relative;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
            padding: 40px 0;
        }

        .core-values-grid::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M0,60 C150,30 300,90 450,60 C600,30 750,90 900,60 C1050,30 1200,90 1200,60" fill="none" stroke="rgba(0,0,0,0.2)" stroke-width="40"/></svg>') repeat-x;
            background-size: cover;
            z-index: 1;
            transform: translateY(-50%);
        }

        .core-value-item {
            position: relative;
            z-index: 2;
            width: clamp(140px, 20vw, 200px);
            /* Scales with viewport */
            height: clamp(140px, 20vw, 200px);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-size: clamp(0.5rem, 1.5vw, 0.8rem);
            color: #000;
            padding: 20px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            border: 8px solid;
            background-color: #fff;
        }

        /* Specific colors for each core value item based on the image */
        .core-value-item:first-child {
            border-color: #D32F2F;

        }

        .core-value-item:nth-child(even) {
            border-color: #FBC02D;
        }

        .core-value-item {
            border-color: #4DA8DA;
        }

        .core-value-item.integrity {
            border-color: #4DA8DA;
            /* Light blue */
        }

        .core-value-item:last-child {
            border-color: #0056B3;
            /* Dark blue */
        }

        .core-value-item.respect {
            border-color: #D32F2F;
            /* Red */
        }

        .core-value-item.excellence {
            border-color: #FBC02D;
            /* Yellow */
        }

        .core-value-item.accountability {
            border-color: #7B1FA2;
            /* Purple */
        }

        /* Accreditation Section */
        .accreditation-section {
            padding: 50px 0;
            background-color: #fff;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .accreditation-content h2 {
            font-size: clamp(1.2rem, 3vw, 1.5rem);
            color: #0056b3;
            text-transform: uppercase;
            margin-bottom: 40px;
            font-weight: bold;
            text-align: center;
        }

        .accreditation-images {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: clamp(10px, 5vw, 120px);
            margin-bottom: 40px;
        }

        .accreditation-image {
            flex: 0 0 clamp(200px, 33%, 400px);
            text-align: center;
        }

        .accreditation-image p {
            font-weight: bold
        }

        .accreditation-image img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        /* Updated Media Queries */
        @media (max-width: 1200px) {
            /* .about-section {
                    padding: 180px 0;
                    height: 60vh;
                } */

            .about-content p {
                font-size: clamp(0.8rem, 2.5vw, 1rem);
                line-height: 1.3rem;
                color: #FFFFFF;
                margin-top: 20px;
            }

            .commitment-text h2::after {
                width: 100%;
                /* Full width on smaller screens */
            }

            .accreditation-content h2 {
                font-size: 30px;
            }

            .accreditation-image img {
                max-width: 300px;
            }

            .accreditation-image p {
                font-weight: bold;
            }

        }
        @media (max-width: 1024px) {
            .about-section {
                height: 60vh;
            }
            .about-section p{
                line-height: 2rem;
                font-size: 18px;
            }
            .commitment-name {
                margin-left: 20px;
                width: 300px;
            }
            .commitment-content {
                flex-direction: row;
                text-align: center;
            }

            .commitment-text h2 {
                font-size: 1em
            }
        }
        /* @media (max-width: 1024px) {
            .about-section {
                height: 100vh;
            }
        } */
        @media (max-width: 992px) {
            .about-section {
                padding: 150px 0;
                margin-top: 0;
                height: 60vh;

            }

            .vision-content {
                flex-direction: column;
                text-align: center;
            }

            .commitment-content {
                flex-direction: row;
                text-align: center;
            }

            .commitment-name {
                left: 50%;
                width: 350px;
                transform: translateX(-50%);
                bottom: 20px;
            }

            .commitment-text h2 {
                font-size: 1em
            }

            .vision-text .logo {
                margin-top: 0;
            }

            .vision-text h2 {
                margin-top: 20px;
            }

            .core-value-item {
                width: 175px;
                height: 175px;
                padding: 10px;
                border-width: 5px;
            }
        }

        @media (max-width: 912px) {
            .about-section {
                height: 50vh;
            }
            .about-section p{
                line-height: 1.5rem;
                font-size: 18px;
            }
            .about-content{
                margin-top: 30px;
            }
            .about-content p{
                line-height: 1.7rem;
            }
            .commitment-text h2 {
                font-size: 1em
            }
            .commitment-name {
                margin-left: -19%;
                width: 300px;
            }
        }

        @media (max-width: 853px) {
            .about-content{
                margin-top: auto
            }
        }

        @media (max-width: 820px) {
            .about-section {
                height: 60vh;
            }
            .about-content{
                margin-top: 30px;
            }
            .commitment-name {
                width: 240px;
                margin-left: -21%;
            }
            .commitment-text h2 {
                font-size: 0.9rem
            }
        }

        @media (max-width: 768px) {
            .about-section {
                height: 60vh;
            }

            .about-section {
                padding: 120px 0;
            }
            .about-content{
                margin-top: auto;
            }
            .commitment-name {
                width: 220px;
                margin-left: -21%;
            }
            .commitment-text h2 {
                font-size: 0.9rem
            }

            .core-values-grid {
                flex-direction: row;
                align-items: center;
                gap: 40px;
            }

            .core-value-item {
                width: 175px;
                height: 175px;
                padding: 10px;
                border-width: 5px;
            }

            .core-value-item:nth-child(odd) {
                transform: translateX(-20px);
            }

            .core-value-item:nth-child(even) {
                transform: translateX(20px);
            }
        }

        @media (max-width: 576px) {
            .about-section {
                padding: 100px 0;
            }

            .about-content h1 {
                margin-left: 20px;
            }

            .about-content p {
                margin-left: 20px;
                line-height: 1rem;
                font-size: 13px;
            }

            .commitment-content {
                flex-direction: column;
                text-align: center;
            }

            .commitment-text h2 {
                font-size: 1em
            }

            .vision-text .logo {
                margin-top: 0;
            }
        }
        @media (max-width: 576px) {
            .about-section {
                height: 60vh;
            }

            .about-container {
                margin-top: 40px;
            }

            .about-content h1 {
                margin-left: 20px;
            }

            .about-content p {
                margin-left: 20px;
                line-height: 1rem;
                font-size: 13px;
            }
            .commitment-name {
                width: 250px;
                margin-left: -27%;
            }
        }
        @media (max-width: 540px) {
            .about-content{
                margin-top: -40px;
            }
            .about-content p{
                line-height: 1.4rem;
            }
            P{
                line-height: 1.2rem;
            }
        }
        @media (max-width:430px) {
            .about-section {
                height: 60vh;
            }

            .about-container {
                margin-top: 70px;
            }

            .about-content h1 {
                margin-left: 20px;
            }

            .about-content p {
                margin-left: 20px;
                line-height: 1.3rem;
                font-size: 14px;
            }
            .commitment-name {
                width: 240px;
                margin-left: -21%;
            }
            P{
                line-height: 1.2rem;
            }

        }

        @media (max-width:414px) {
            .about-section {
                height: 60vh;
            }

            .about-container {
                margin-top: 30px;
            }

            .about-content h1 {
                margin-left: 20px;
            }

            .about-content p {
                margin-left: 20px;
                line-height: 1.24rem;
                font-size: 14px;
            }
            .commitment-name {
                width: 230px;
                margin-left: -21%;
            }
            p{
                line-height: 1.2rem;
            }

        }

        /* Ultra-small screens (e.g., old phones < 400px) */
        @media (max-width: 400px) {
            .about-section {
                height: 60vh;
            }

            .about-content {
                padding: 0 10px;
            }

            .commitment-content {
                flex-direction: column;
                text-align: center;
            }

            .commitment-text h2 {
                font-size: 1em
            }


            .commitment-name {
                font-size: 0.9rem;
                padding: 5px 10px;
            }

            .core-value-item {
                width: 140px;
                height: 140px;
                padding: 10px;
                border-width: 5px;
            }
        }
        @media (max-width:390px) {
            .about-section {
                height: 60vh;
            }

            .about-container {
                margin-top: 30px;
            }

            .about-content h1 {
                margin-left: 20px;
            }

            .about-content p {
                margin-left: 20px;
                line-height: 1.18rem;
                font-size: 13.5px;
            }
            .commitment-name {
                width: 220px;
                margin-left: -21%;
            }
            .commitment-text h2 {
                font-size: .9rem
            }

        }
        @media (max-width: 375px) {
            .about-section {
                height: 70vh;
            }

            .about-container {
                margin-top: 20px;

            }

            .about-content h1 {
                margin-left: 5px;
            }

            .about-content p {
                font-size: 9px;
                line-height: 1.1rem;
                color: #FFFFFF;
                margin-top: 10px;
                margin-left: 5px;
            }
            .commitment-name {
                width: 200px;
                margin-left: -20%;
            }
            .commitment-content {
                flex-direction: column;
                text-align: center;
            }
            .commitment-text h2 {
                font-size: .9rem
            }
            p{
                line-height: 1.2rem;
            }
        }

        @media (max-width: 360px) {
            .about-section {
                height: 62vh;
            }

            .about-container {
                margin-top: 25px;
            }

            .about-content h1 {
                margin-left: 0px;
            }

            .about-content p {
                font-size: 11px;
                line-height: 1.1rem;
                color: #FFFFFF;
                margin-top: 10px;
                margin-left: 0px;
            }

            .commitment-text h2 {
                font-size: .8rem
            }
            p{
                line-height: 1.2rem;
            }
        }

        @media (max-width: 344px) {
            .about-section {
                /* padding: 120px 0; */
                height: 50vh;
            }

            .about-content {
                max-width: 700px;
            }

            .about-content h1 {
                font-size: 22px;
            }

            .about-content p {
                font-size: 11px;
                line-height: 0.9rem;
                color: #FFFFFF;
                /* margin-top: 10px; */
            }

            .commitment-text h2 {
                font-size: 0.8rem
            }

        }
    </style>
@endsection

@section('content')
    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="about-container">
                <div class="about-content">
                    <h1>{{ __('lang.ourcompany') }}</h1>
                    @if (session()->has('user_lang') && session('user_lang') == 'en')
                       <P> {!! $ourcomapny->description_en !!}</P>
                    @else
                <P>{!! $ourcomapny->description_kh !!}</P>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Commitment Section -->
    {{-- <section class="commitment-section">
        <div class="container">
            <div class="commitment-container">
                <div class="commitment-content">
                    <div class="commitment-image">
                        <img src="https://hitech.com.kh/wp-content/uploads/2022/03/Executive-Manager.png"
                            alt="Lok Chumteav Khleoung Chandy">
                        <div class="commitment-name">
                            <p>Lok Chumteav Khleoung Chandy</p>
                        </div>
                    </div>
                    <div class="commitment-text">
                        <h2>Message from Executive Manager</h2>
                        <p>
                            We are delighted to serve customer our product and very happy for your continuously support of
                            Hi-tech drinking water. We’re dedicated to maintain our standard, quality and service to our
                            value customer.
                        </p>
                    </div>
                </div>

                
            </div>
        </div>
    </section> --}}


    @foreach ($messages as $m)
        <section class="commitment-section">
            <div class="container">
                <div class="commitment-container">
                    <div class="commitment-content">
                        <div class="commitment-image">
                            <img src="{{ asset($m->img) }}" alt=" {{ $m->em_name }} ">
                            <div class="commitment-name">
                                <p>{{ $m->em_name }}</p>
                            </div>
                        </div>
                        <div class="commitment-text">
                            <h2>{{ __('lang.messageem') }}</h2>
                            @if (session()->has('user_lang') && session('user_lang') == 'en')
                                {!! $m->message_en !!}
                            @else
                                {!! $m->message_kh !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach



    <!-- Vision Section -->
    <section class="vision-section">
        <div class="container">
            <div class="vision-container">
                <div class="vision-content">
                    <div class="vision-image">
                        <img src="{{asset('images/hi-tech-3.png')}}"
                            alt="HI-TECH Water Bottles">
                    </div>
                    <div class="vision-text">
                        <div class="logo">
                            <img src="{{ asset('images/Hi-Tech-Water Logo-blue.png') }}" alt="Hi-Tech Logo">
                        </div>
                        @if (session()->has('user_lang') && session('user_lang') == 'en')
                            {!! $missionvision->text_en !!}
                        @else
                            {!! $missionvision->text_kh !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Core Values Section -->
    <section class="core-values-section">
        <div class="core-values-container">
            <div class="core-values-content">
                <h2> {{ __('lang.corevalue') }} </h2>
                <div class="core-values-grid">
                    @foreach ($corevalues as $corevalue)
                        <div class="core-value-item">
                            <p>
                                <strong>
                                    @if (session()->has('user_lang') && session('user_lang') == 'en')
                                        {{ $corevalue->title_en }}
                                    @else
                                        {{ $corevalue->title_kh }}
                                    @endif
                                </strong>
                                <br><br>
                                @if (session()->has('user_lang') && session('user_lang') == 'en')
                                    {{ $corevalue->description_en }}
                                @else
                                    {{ $corevalue->description_kh }}
                                @endif
                            </p>
                        </div>
                    @endforeach

                    {{-- <div class="core-value-item teamwork">
                        <p><strong>TEAMWORK</strong><br><br>Maximizing efficiency through collaboration and individual
                            strengths</p>
                    </div>
                    <div class="core-value-item respect">
                        <p><strong>RESPECT</strong><br><br>Valuing diversity and treating all customers with fairness and
                            friendliness</p>
                    </div>
                    <div class="core-value-item excellence">
                        <p><strong>EXCELLENCE IN SERVICE</strong><br><br>Striving for excellence and quality in everything
                            we do</p>
                    </div>
                    <div class="core-value-item accountability">
                        <p><strong>ACCOUNTABILITY</strong><br><br>Taking ownership of one’s actions</p>
                    </div> --}}

                </div>
            </div>
        </div>
    </section>



    <!-- Accreditation Section -->
    <section class="accreditation-section">
        <div class="container">
            <div class="accreditation-container">
                <div class="accreditation-content">
                    <h2> {{ __('lang.accreditation') }} </h2>
                    <div class="accreditation-images">
                        @foreach ($accreditations as $acc)
                            <div class="accreditation-image">
                                <img src="{{ asset($acc->logo) }}" alt="Accreditation Certificate">
                                <p>
                                    @if (session()->has('user_lang') && session('user_lang') == 'en')
                                        {{ $acc->name_en }}
                                    @else
                                        {{ $acc->name_kh }}
                                    @endif
                                </p>
                            </div>
                        @endforeach

                        {{-- <div class="accreditation-image">
                            <img src="https://hitech.com.kh/wp-content/uploads/2022/03/Accreditation-2.jpg"
                                alt="Accreditation Certificate 2">
                            <p>Certificate of FOOD QUALITY MANAGEMENT SYSTEM</p>
                        </div>
                        <div class="accreditation-image">
                            <img src="https://hitech.com.kh/wp-content/uploads/2022/03/Accreditation-2.jpg"
                                alt="Accreditation Certificate 2">
                            <p>Certificate of FOOD QUALITY MANAGEMENT SYSTEM</p>
                        </div> --}}
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
