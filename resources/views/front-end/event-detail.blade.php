@extends('front-end.layouts.master')

@section('title', $event->seo_title ?? 'Event Detail')

@section('seo')
<meta property="og:title" content="{{ $event->seo_title }}" />
<meta property="twitter:title" content="{{ $event->seo_title }}" />
<meta property="og:description" content="{{ $event->seo_description }}" />
<meta property="twitter:description" content="{{ $event->seo_description }}" />
@endsection

@section('styles')
<style>
    .event-detail-section {
        padding: 60px 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .event-detail-image img {
        width: 100%;
        max-height: 400px;
        margin-top: 25px;
        object-fit: cover;
        border-radius: 12px;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .ads {
        margin-top: 25px;
    }

    .ads img {
        width: 100%;
        height: 190px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .event-detail-card-small {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .event-detail-image-small {
        width: 100%;
        height: 200px;
        overflow: hidden;
        position: relative;
    }

    .event-detail-image-small img {
        width: 100%;
        max-height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease-in-out;
        margin-bottom: 10px;
    }

    .event-detail-image-small:hover img {
        transform: scale(1.05);
    }

    .event-detail-title {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .event-detail-title-small {
        padding: 20px;
    }

    .event-detail-title-small h3 {
        font-size: clamp(1.2rem, 1vw, 1.5rem);
        font-weight: 700;
        color: #1a6aa8;
        margin-bottom: 10px;
    }

    .event-detail-title-small p {
        font-size: clamp(0.9rem, 1.5vw, 1rem);
        color: #666;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .event-detail-title-small .news-link {
        color: #666;
        text-decoration: none;
        display: block;
        transition: color 0.3s ease;
    }

    .event-detail-title-small .news-link:hover {
        color: #1a6aa8;
        text-decoration: underline;
    }

    .event-detail-title-small .date-time-small {
        font-size: clamp(0.8rem, 1vw, 0.9rem);
        color: #1a6aa8;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .event-detail-title-small .view-count {
        font-size: clamp(0.8rem, 1vw, 0.9rem);
        color: #666;
        font-weight: 500;
    }

    .event-detail-description {
        font-size: 1.1rem;
        line-height: 1.7;
        color: #333;
    }

    .event-detail-description-small {
        font-size: 0.9rem;
        color: #333;
        line-height: 1.5;
    }

    .date-time {
        font-size: 18px;
        font-family: Hanuman !important;
        font-weight: 200;
        color: grey;
        margin-bottom: 15px;
    }

    .row.mt-5 {
        margin-top: 60px;
    }
</style>
@endsection

@section('content')
<section class="event-detail-section">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-8">
            <div class="event-detail-image">
                <img src="{{ asset($event->img) }}" alt="Event Image">
            </div>
            <div class="event-detail-title">
                {{ session('user_lang') == 'en' ? $event->title_en : $event->title_kh }}
            </div>
            <div class="date-time">
                •{{ $event->created_at->format('F j, Y') }} • {{ formatViewCount($event->view_num ?: 0) }} views
            </div>
            <div class="event-detail-description">
                {!! nl2br(e(session('user_lang') == 'en' ? $event->description_en : $event->description_kh)) !!}
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-lg-4">
            <!-- <img src="{{ asset('images/Quality-award.jpg') }}" alt="Ad 1">
            <img src="{{ asset('images/Quality-award.jpg') }}" alt="Ad 2"> -->

            <div class="ads">
                @foreach (optional($ads)->img ?? [] as $image)
                    <img src="{{ asset($image) }}" alt="ads">
                @endforeach
            </div>
        </div>
    </div>

    <!-- Grid of 3 Columns -->
    <div class="row mt-5">
        @foreach ($otherEvents as $events)
        <div class="col-md-6 col-sm-12 col-lg-4 mb-4">
            <div class="event-detail-card-small">
                <div class="event-detail-image-small">
                    <a href="{{ route('event.detail', ['id' => $events->id]) }}">
                        <img src="{{ asset($events->img) }}" alt="Event Image">
                    </a>
                </div>
                <div class="event-detail-title-small">
                    <h3>
                        {{ session('user_lang') == 'en' ? $events->title_en : $events->title_kh }}
                    </h3>
                    <a href="{{ route('event.detail', ['id' => $events->id]) }}" class="news-link">
                        <p>
                            {{ Str::limit(
                                session('user_lang') == 'en' ? $events->description_en : $events->description_kh,
                                session('user_lang') == 'en' ? 70 : 80,
                                '...'
                            ) }}
                        </p>
                    </a>
                    <div class="date-time-small">{{ $events->created_at->format('F j, Y') }}</div>
                    <div class="view-count">{{ formatViewCount($events->view_num ?: 0) }} views</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection