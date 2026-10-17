@extends('front-end.layouts.master')

@section('title', $blog->seo_title ?? $blog->title)

@section('seo')
<meta property="og:title" content="{{ $blog->seo_title ?? $blog->title }}" />
<meta property="og:description" content="{{ $blog->seo_description ?? Str::limit(strip_tags($blog->description), 150) }}" />
<meta property="og:image" content="{{ $blog->img ? asset('storage/' . $blog->img) : asset('no-image.png') }}" />

<meta property="twitter:title" content="{{ $blog->seo_title ?? $blog->title }}" />
<meta property="twitter:description" content="{{ $blog->seo_description ?? Str::limit(strip_tags($blog->description), 150) }}" />
<meta property="twitter:image" content="{{ $blog->img ? asset('storage/' . $blog->img) : asset('no-image.png') }}" />
@endsection


@section('styles')
<link rel="stylesheet" href="{{ asset('front-end/css/blog-detail.css') }}">

<style>
    .section {
        background-image: url('{{ $blog->img ? asset("storage/" . $blog->img) : asset("no-image.png") }}');
        background-size: cover;
        background-position: center;
        height: 90vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }
</style>
@endsection


@section('content')

{{-- ===================== HERO SECTION ===================== --}}
<section class="section">
    <div class="content-box">

        <div class="single-post-header">

            <div class="category">
                {{ __('lang.health') }}
            </div>

            <h1 class="title">
                {{ session('user_lang') == 'en' ? $blog->title : $blog->title_kh }}
            </h1>

            <div class="author">
                <div class="author-image">
                    <img loading="lazy" src="{{ asset('images/backround.jpg') }}" alt="Author">
                </div>
                <div class="author-name">
                    <p>{{ __('lang.author') }} : <strong>{{ $blog->author }}</strong></p>
                </div>
            </div>

        </div>

    </div>
</section>



{{-- ===================== CONTENT SECTION ===================== --}}
<section class="blog-content-section">

    <div class="blog-content">

        <h3>{{ __('lang.health') }}</h3>

        <h1>
            {{ session('user_lang') == 'en' ? $blog->title : $blog->title_kh }}
        </h1>

        <div class="blog-date">
            {{ $blog->created_at->format('d-M-Y') }}
        </div>

        <span>
            {!! session('user_lang') == 'en' ? $blog->description : $blog->description_kh !!}
        </span>

    </div>

</section>

@endsection
