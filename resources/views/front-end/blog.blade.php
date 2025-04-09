@extends('front-end.layouts.master')

@section('title', 'Blog')

@section('seo')
    

<meta property="og:title" content="Hitech blog" />
<meta property="twitter:title" content="Hitech blog " />
<meta property="og:description" content="Hi tech water blog post" />
<meta property="twitter:description" content="Hi tech water blog post" />

@foreach ($blogs as $blog)
    <meta property="og:title" content=" {{ $blog->seo_title }} " />
    <meta property="twitter:title" content=" {{ $blog->seo_title }} " />
    <meta property="og:description" content=" {{ $blog->seo_description }} " />
    <meta property="twitter:description" content=" {{ $blog->seo_description }} " />
@endforeach


@endsection

@section('styles')
    <style>

        .blog-section {
            padding: 50px 20px;
            background: url({{asset('images/blog-bg.jpg')}}) no-repeat center center/cover;
            /* Replace with your background image */
            position: relative;
            /* margin-top: 60px; */
        }

        .blog-section h1 {
            text-align: center;
            font-size: 48px;
            color: #ffffff;
            font-weight: bold;
            /* margin-bottom: 40px; */
            margin: 50px;
        }

        .blog-container {
            display: flex;
            justify-content: center;
            gap: 70px;
            flex-wrap: wrap;
        }

        .blog-post {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            width: 370px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .blog-post img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .blog-post h3 {
            font-size: 16px;
            font-weight: bold;
            margin: 15px;
            color: #333;
            line-height: 1.4;
        }

        .blog-post p {
            font-size: 14px;
            color: #666;
            margin: 0 15px 15px;
            line-height: 1.6;
        }

        .blog-post .date {
            display: block;
            font-size: 14px;
            color: #1A6AA8;
            margin: 0 15px 15px;
            text-align: right;
            font-weight: bold;
        }
        .blog-post a {
            text-decoration: none;
        }
        .blog-post a h3:hover {
            color: #e50909;
        }

        .scroll-up {
            position: absolute;
            bottom: 15px;
            right: 15px;
            background: #1e90ff;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 16px;
        }

        .scroll-up:hover {
            background: #187bcd;
        }

        @media (max-width: 768px) {
            .blog-container {
                flex-direction: column;
                align-items: center;
            }

            .blog-post {
                width: 90%;
            }
        }
    </style>

@endsection

@section('content')
    <section class="blog-section">
        <h1> {{ __('lang.blog') }} </h1>
        <div class="blog-container">

            @foreach ($blogs as $blog)
            <div class="blog-post">
                <a href="{{route('blog.detail', ['id' => $blog->id])}}">
                    <img src="{{asset($blog->img)}}" alt="Blog thumbnail">

                    <h3> 
                        {{-- {{ $blog->title }}  --}}

                        @if (session()->has('user_lang') && session('user_lang') == 'en')
                            {{ $blog->title }}
                        @else
                            {{ $blog->title_kh }}
                        @endif    

                    </h3>
                    <p>
                        {{-- {{ $blog->short_text }} --}}
                        @if (session()->has('user_lang') && session('user_lang') == 'en')
                            {{ $blog->short_text }}
                        @else
                            {{ $blog->short_text_kh }}
                        @endif    
                    </p>
                    <span class="date">
                        {{ \Carbon\Carbon::parse($blog->created_at)->format('d-M-Y - H:i:s') }}
                    </span>
                </a>

            </div>
            @endforeach
            


        </div>
    </section>
@endsection
