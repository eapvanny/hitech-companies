@extends('front-end.layouts.master')

@section('title', 'HiTech Drinking Water Launch Event')

@php
$firstEvent = $events->first();
$mainEvent = $mainEventPhoto->first();
@endphp

@section('seo')
    @if($firstEvent)
        <meta property="og:title" content="{{ $firstEvent->seo_title }}" />
        <meta property="twitter:title" content="{{ $firstEvent->seo_title }}" />
        <meta property="og:description" content="{{ $firstEvent->seo_description }}" />
        <meta property="twitter:description" content="{{ $firstEvent->seo_description }}" />
    @endif
@endsection



@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Hanuman:wght@100;300;400;700;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Siemreap&display=swap');
    /* Global Reset and Font */
    /* * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    } */

    /* Event Section */
    .event-section {
        min-height: 70vh; /* Adjusted for better mobile fit */
        display: flex;
        align-items: center;
        justify-content: center; /* Center content for better mobile display */
        padding: 20px 5%;
         background: linear-gradient(rgba(125, 143, 161, 0.209), rgba(125, 143, 161, 0.209)),
            url("{{ $mainEvent ? asset($mainEvent->img) : asset('default-event.jpg') }}") no-repeat center center;
        background-size: cover;
        background-position: center;
        color: #fff;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3), inset 0 0 20px rgba(0, 0, 0, 0.2);
        animation: fadeIn 1.5s ease-out;
    }

    .event-section div {
        max-width: 800px; /* Increased max-width for larger screens */
        width: 100%; /* Full width on smaller screens */
        padding: 20px;
        backdrop-filter: blur(8px);
        background: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.2);
        text-align: center; /* Center text for better mobile display */
    }

    .event-section h1 {
        font-size: clamp(2rem, 5vw, 3.5rem); /* Adjusted for better scaling */
        font-weight: 900;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        margin-bottom: 15px;
    }

    .event-section p {
        font-size: clamp(0.9rem, 3vw, 1.2rem); /* Slightly smaller for mobile */
        line-height: 1.6;
        margin-bottom: 20px;
    }

    /* Button Styling */
    .btn {
        display: inline-block;
        padding: 12px 30px; /* Slightly smaller padding for mobile */
        background: linear-gradient(45deg, #1a6aa8, #00aaff);
        color: #fff;
        font-size: clamp(0.85rem, 2.5vw, 0.95rem);
        font-weight: 600;
        text-decoration: none;
        border-radius: 50px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
        background: linear-gradient(45deg, #155a8a, #0088cc);
    }

    /* News Section */
    .news-section {
        padding: 40px 5%;
        background: #f5f7fa;
    }

    .news-section h2 {
        text-align: center;
        font-size: clamp(1.8rem, 4vw, 2.5rem); /* Adjusted for better scaling */
        font-family: 'Poppins', 'Siemreap', sans-serif;
        font-weight: 800;
        margin-bottom: 30px;
        color: #1a6aa8;
    }

    .news-grid {
        display: grid;
        /* grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); */
        grid-template-columns: repeat(3, 1fr); /* Always 3 columns */
        gap: 20px;
        max-width: 1400px; /* Slightly larger max-width */
        margin: 0 auto;
        justify-items: center; /* Center items in their columns */
    }

    .news-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .news-card:hover {
        /* transform: translateY(-5px); */
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .news-card-image {
        width: 100%;
        height: 180px; /* Slightly smaller for mobile */
        overflow: hidden;
        position: relative;
    }

    .news-card-image a {
        display: block;
        width: 100%;
        height: 100%;
    }

    .news-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease-in-out;
    }

    .news-card:hover img {
        transform: scale(1.05);
    }

    .news-card-content {
        padding: 15px;
    }

    .news-card-content h3 {
        font-size: clamp(1.1rem, 2vw, 1.4rem); /* Adjusted for better scaling */
        font-weight: 700;
        color: #1a6aa8;
        margin-bottom: 8px;
    }

    .news-card-content p {
        font-size: clamp(0.85rem, 1.5vw, 0.95rem);
        color: #666;
        line-height: 1.5;
        margin-bottom: 12px;
    }

    .news-card-content .news-link {
        color: #666;
        text-decoration: none;
        display: block;
        transition: color 0.3s ease;
    }

    .news-card-content .news-link:hover {
        color: #1a6aa8;
        text-decoration: underline;
    }

    .news-card-content .date-time {
        font-size: clamp(0.75rem, 1.2vw, 0.85rem);
        color: #1a6aa8;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .news-card-content .view-count {
        font-size: clamp(0.75rem, 1.2vw, 0.85rem);
        color: #666;
        font-weight: 500;
    }

    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUp {
        from { transform: translateY(50px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .event-section {
            min-height: 40vh; /* Further reduced for tablets */
            padding: 20px;
        }

        .event-section h1 {
            font-size: clamp(1.8rem, 4vw, 2.8rem);
        }

        .event-section p {
            font-size: clamp(0.85rem, 2.5vw, 1rem);
        }

        .news-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
        }

        .news-card-image {
            height: 160px; /* Adjusted for tablets */
        }
    }

    @media (max-width: 768px) {
        .event-section {
            min-height: 40vh; /* Adjusted for smaller screens */
            padding: 15px;
        }

        .event-section div {
            padding: 15px;
        }

        .event-section h1 {
            font-size: clamp(1.6rem, 5vw, 2.2rem);
        }

        .event-section p {
            font-size: clamp(0.8rem, 2.5vw, 0.95rem);
        }

        .news-section {
            padding: 30px 3%;
        }

        .news-grid {
            grid-template-columns: repeat(2, 1fr); /* Single column for mobile */
            gap: 15px;
        }

        .news-card-image {
            height: 170px; /* Smaller for mobile */
        }

        .news-card-content {
            padding: 12px;
        }
    }

    @media (max-width: 480px) {
        .event-section {
            min-height: 35vh; /* Further reduced for small mobile screens */
            padding: 10px;
        }

        .event-section div {
            padding: 10px;
            border-radius: 10px;
        }

        .event-section h1 {
            font-size: clamp(1.4rem, 5vw, 1.8rem);
        }

        .event-section p {
            font-size: clamp(0.75rem, 2.5vw, 0.9rem);
        }

        .btn {
            padding: 10px 25px;
            font-size: clamp(0.8rem, 2.5vw, 0.9rem);
        }

        .news-section h2 {
            font-size: clamp(1.5rem, 4vw, 2rem);
        }

        .news-card-image {
            height: 120px; /* Even smaller for very small screens */
        }

        .news-card-content h3 {
            font-size: clamp(1rem, 2vw, 1.2rem);
        }

        .news-card-content p {
            font-size: clamp(0.8rem, 1.5vw, 0.9rem);
        }
    }
    @media (max-width: 430px) {
        .event-section div {
            margin-top: 70px;
        }
        .news-grid {
            grid-template-columns: 1fr; /* Single column for mobile */
            gap: 15px;
        }

        .news-card-image {
            height: 180px; /* Smaller for mobile */
        }
    }
    @media (max-width: 414px) {
        .event-section div {
            margin-top: 70px;
        }
        .news-grid {
            grid-template-columns: 1fr; /* Single column for mobile */
            gap: 15px;
        }
         .news-card-image {
            height: 170px; /* Smaller for mobile */
        }
    }
    @media (max-width: 375px) {
        .event-section {
            min-height: 45vh; /* Further reduced for small mobile screens */
            padding: 10px;
        }
        .event-section div {
            margin-top: 75px;
        }
        .news-grid {
            grid-template-columns: 1fr; /* Single column for mobile */
            gap: 15px;
        }

        .news-card-image {
            height: 140px; /* Smaller for mobile */
        }
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
                    <img src="{{ asset($event->img) }}" alt="Water Filtration Technology">
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