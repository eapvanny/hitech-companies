@extends('front-end.layouts.master')

@section('title', 'Blog')

@section('seo')
    <meta property="og:title" content="Hitech Blog" />
    <meta property="og:description" content="Latest blog posts from Hi Tech Water" />

    <meta property="twitter:title" content="Hitech Blog" />
    <meta property="twitter:description" content="Latest blog posts from Hi Tech Water" />
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('front-end/css/blog.css') }}">
@endsection

@section('content')
    <section class="blog-section">
        <h1> {{ __('lang.blog') }} </h1>
        <div class="blog-container">

            
        @foreach ($blogs as $blog)
            <div class="blog-post">
                <a href="{{ route('blog.detail', $blog->id) }}">
                    
                    <img loading="lazy" src="{{ $blog->img ? asset('storage/' . $blog->img) : asset('no-image.png') }}" 
                         alt="Blog thumbnail">

                    <h3>
                        @if (session('user_lang') == 'en')
                            {{ $blog->title }}
                        @else
                            {{ $blog->title_kh }}
                        @endif
                    </h3>

                    <p>
                        @if (session('user_lang') == 'en')
                            {{ $blog->short_text }}
                        @else
                            {{ $blog->short_text_kh }}
                        @endif
                    </p>

                    <span class="date">
                        {{ $blog->created_at->format('d-M-Y') }}
                    </span>
                </a>
            </div>
        @endforeach



        </div>
    </section>
@endsection
