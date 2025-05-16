@extends('front-end.layouts.master')

@section('title', 'Blog')

@section('seo')
    

<meta property="og:title" content="Hitech blog" />
<meta property="twitter:title" content="Hitech blog " />
<meta property="og:description" content="Hi tech water blog post" />
<meta property="twitter:description" content="Hi tech water blog post" />

<meta property="og:title" content=" {{ $blog->seo_title }} " />
<meta property="twitter:title" content=" {{ $blog->seo_title }} " />
<meta property="og:description" content=" {{ $blog->seo_description }} " />
<meta property="twitter:description" content=" {{ $blog->seo_description }} " />

@endsection

@section('styles')
    <style>
        /* Base styles */
        .section {
            background-image: url( " {{ asset($blog->img) }} " );
            background-size: cover;
            background-position: center;
            height: 90vh;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        /* h1, h2, h3 {
           line-height: 2rem;
        }    */
        h6{
            line-height: 2rem;
        }
        .content-box {
            padding: 20px;
            width: 90%;
            max-width: 1200px;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .single-post-header {
            background: #fff url({{asset('images/profile-pattern.png')}}) bottom center no-repeat;
            background-size: 100%;
            padding: 40px 20px 100px;
            text-align: center;
            border-radius: 15px;
            width: 100%;
            max-width: 1200px;
            position: relative;
            margin: 0 auto;
            margin-top: 75vh;
        }

        .category {
            font-size: 0.9rem;
            color: #333;
            margin-bottom: 10px;
        }

        .title {
            font-size: clamp(1.8rem, 5vw, 2.8rem);
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            /* line-height: 5rem; */
        }

        .author {
            position: absolute;
            bottom: 20px;
            /* top: 50%; */
            left: 50%;
            transform: translate(-50%,70%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            width: 100%;
        }

        .author-image img {
            border-radius: 50%;
            width: clamp(80px, 20vw, 140px);
            height: clamp(80px, 20vw, 140px);
            object-fit: cover;
        }

        .blog-content-section {
            padding: 50px 20px;
            margin-top: 50px;
        }

        .blog-content {
            max-width: 1200px;
            margin: 0 auto;
            text-align: left;
            padding: 0 15px;
        }

        .blog-date {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .blog-date::before {
            content: '⏰';
            margin-right: 5px;
        }

        .blog-content h1 {
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .blog-content p {
            font-size: 1rem;
            line-height: 2rem;
            color: #555;
            margin-bottom: 20px;
        }
        .blog-content span{
            line-height: 2rem;
        }
        .blog-content h2 {
            font-size: clamp(1.2rem, 3vw, 1.5rem);
            font-weight: bold;
            color: #333;
            margin: 40px 0 25px;
        }

        .blog-content h3 {
            margin-top: 100px;
            font-weight: 700;
            color: #1A6AA8;
            font-size: clamp(1.1rem, 2.5vw, 1.25rem);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .section {
                height: 40vh;
            }
            
            .single-post-header {
                margin-top: 40vh;
                padding: 30px 15px 80px;
            }
            .single-post-header .title{
                font-size: 35px;
            }
            .single-post-header .category{
                font-size: 16px
            }
            .content-box {
                padding: 15px;
            }
            .author{
                margin-top: -30px;
            }
            .blog-content-section {
                margin-top: 13vh;
            }
        }
        @media (max-width: 912px) {
            .author{
                margin-top: 10px;
            }
        }
        @media (max-width: 820px) {
            .author{
                margin-top: 10px;
            }
        }
        @media (max-width: 768px) {
            .section {
                height: 45vh;
            }
            
            .single-post-header {
                margin-top: 45vh;
                padding: 25px 15px 60px;
            }
            
            .author {
                bottom: 15px;
                gap: 10px;
                margin-top: auto;
            }
            
            .blog-content-section {
                padding: 30px 15px;
                margin-top: 17vh;
            }
            /* .author{
                margin-top: auto;
            } */
        }

        @media (max-width: 480px) {
            .section {
                height: 40vh;
            }
            
            .single-post-header {
                margin-top: 50vh;
                padding: 20px 10px 40px;
            }
            
            .content-box {
                padding: 10px;
            }
            
            .author {
                bottom: 10px;
                gap: 8px;
            }
            
            .blog-content-section {
                padding: 20px 10px;
                margin-top: 13vh;
            }
            .blog-content h1 {
                font-size: clamp(1.5rem, 4vw, 2rem);
            }
            
            .blog-content p {
                font-size: 0.95rem;
            }
        }
        @media (max-width: 430px) {
            .single-post-header {
                margin-top: 40vh;
                padding: 30px 15px 60px;
            }
            .single-post-header .title{
                font-size: 24px;
            }
            .single-post-header .category{
                font-size: 16px
            }
            .author{
                position: absolute;
                left: 50%;
                transform: translate(-50%,75%);
            } 
        }
        @media (max-width: 414px) {
            .single-post-header {
                margin-top: 40vh;
                padding: 30px 15px 60px;
            }
            .single-post-header .title{
                font-size: 24px;
            }
            .single-post-header .category{
                font-size: 16px
            }
            .author{
                position: absolute;
                left: 50%;
                transform: translate(-50%,75%);
            }
        }
        @media (max-width: 360px) {
            .single-post-header {
                margin-top: 40vh;
                padding: 30px 15px 60px;
            }
            .single-post-header .title{
                font-size: 24px;
            }
            .single-post-header .category{
                font-size: 16px
            }
            .author{
                margin-top: 27px;
            }
            
        }
    </style>
@endsection

@section('content')
    <section class="section">
        <div class="content-box">
            <div class="single-post-header">
                <div class="category"> {{ __('lang.health') }} </div>
                <h1 class="title">

                    @if (session()->has('user_lang') && session('user_lang') == 'en')
                        {{ $blog->title }}
                    @else
                        {{ $blog->title_kh }}
                    @endif    

                </h1>
                <div class="author">
                    <div class="author-image">
                        <img src="{{asset('images/backround.jpg')}}" alt="Author Image">
                    </div>
                    <div class="author-name">
                        <p> {{ __('lang.author') }} : <strong> {{ $blog->author }} </strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-content-section">
        <div class="blog-content">
            <h3> {{ __('lang.health') }} </h3>

            <h1>
                @if (session()->has('user_lang') && session('user_lang') == 'en')
                    {{ $blog->title }}
                @else
                    {{ $blog->title_kh }}
                @endif    
            </h1>
            <div class="blog-date">
                {{ \Carbon\Carbon::parse($blog->created_at)->format('d-M-Y') }}
            </div>

            <p>
                {{-- {{ $blog->short_text }} --}}

                @if (session()->has('user_lang') && session('user_lang') == 'en')
                    {{ $blog->short_text }}
                @else
                    {{ $blog->short_text_kh }}
                @endif    
            </p>
            <span>
                @if (session()->has('user_lang') && session('user_lang') == 'en')
                    {{-- {{ $blog->short_text }} --}}
                    {!! $blog->description !!}
                @else
                    {{-- {{ $blog->short_text_kh }} --}}
                    {!! $blog->description_kh !!}
                @endif   
            </span> 
        </div>
    </section>
@endsection