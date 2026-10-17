@extends('front-end.layouts.master')

@section('title', 'HiTech Drinking Water Launch Event')

@php
$firstEvent = $events->first();
$mainEvent = $mainEventPhoto->first();
@endphp

@section('seo')
    @if($firstEvent)
        <meta property="og:title" content="{{ $firstEvent->seo_title }}" />
        <meta property="og:description" content="{{ $firstEvent->seo_description }}" />
        <meta property="twitter:title" content="{{ $firstEvent->seo_title }}" />
        <meta property="twitter:description" content="{{ $firstEvent->seo_description }}" />
    @endif
@endsection



@section('styles')
    <link rel="stylesheet" href="{{ asset('front-end/css/event.css') }}">
    <style>
        .event-section {
            min-height: 70vh; /* Adjusted for better mobile fit */
            display: flex;
            align-items: center;
            justify-content: center; /* Center content for better mobile display */
            padding: 20px 5%;
            background: linear-gradient(rgba(125, 143, 161, 0.209), rgba(125, 143, 161, 0.209)),
                url("{{ $mainEvent ? asset('storage/'.$mainEvent->img) : asset('default-event.jpg') }}") no-repeat center center;
            background-size: cover;
            background-position: center;
            color: #fff;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3), inset 0 0 20px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1.5s ease-out;
        }
    </style>
@endsection

@section('content')
<section class="event-section">
    @foreach ($mainEventPhoto as $main)
        <div>
            <!-- <h1>Pure Water, Pure Life</h1>
            <p>Join us for the grand launch of HiTech Drinking Water! Discover our advanced filtration technology and unwavering commitment to delivering pure, safe, and affordable water to Cambodia.</p> -->
            <h1> {{ session('user_lang') == 'en' ? $main->title_en : $main->title_kh }}</h1>
            <p> {{ session('user_lang') == 'en' ? $main->des_en : $main->des_kh }}</p>
        </div>
    @endforeach
</section>

<section class="news-section">
    <h2>{{__('lang.Our Events')}}</h2>
    <div class="news-grid">
        @foreach ($events as $event)
        <div class="news-card">
            <div class="news-card-image">
                <a href="{{ route('event.detail', ['id' => $event->id]) }}">
                    <img loading="lazy" src="{{ asset('storage/'.$event->img) }}" alt="Water Filtration Technology">
                </a>
            </div>
            <div class="news-card-content">
                <h3>
                    {{ session('user_lang') == 'en' ? $event->title_en : $event->title_kh }}
                </h3>
                <a href="{{ route('event.detail', ['id' => $event->id]) }}" class="news-link">
                    <p>
                        {{ Str::limit(
                            session('user_lang') == 'en' ? $event->description_en : $event->description_kh,
                            session('user_lang') == 'en' ? 70 : 80,
                            '...'
                        ) }}
                    </p>
                </a>
                <div class="date-time">
                    {{ $event->created_at->format('F j, Y') }}
                </div>
                <div class="view-count">{{ formatViewCount($event->view_num ?: 0) }} views</div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection