@extends('front-end.layouts.master')

@section('title', $event->seo_title ?? 'Event Detail')

@section('seo')
<meta property="og:title" content="{{ $event->seo_title }}" />
<meta property="twitter:title" content="{{ $event->seo_title }}" />
<meta property="og:description" content="{{ $event->seo_description }}" />
<meta property="twitter:description" content="{{ $event->seo_description }}" />
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('front-end/css/event.css') }}">
@endsection

@section('content')
<section class="event-detail-section">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-8">
            <div class="event-detail-image">
                <img loading="lazy" src="{{ asset('storage/'.$event->img) }}" alt="Event Image">
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
                    <img loading="lazy" src="{{ asset('storage/'.$image) }}" alt="ads">
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
                        <img loading="lazy" src="{{ asset('storage/'.$events->img) }}" alt="Event Image">
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