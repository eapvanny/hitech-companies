@extends('front-end.layouts.master')

@section('title', 'Services')

@section('styles')
    <style>
        .services-section { padding: 80px 0; background-color: #f8f9fa; }
        .service-card { opacity: 0; transition: all 0.5s ease-out; }
        .service-card.visible { opacity: 1; transform: translateY(0); }
        .service-card:hover { transform: scale(1.05); box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
    </style>
@endsection

@section('content')
    <section class="services-section">
        <div class="container">
            <h1 class="text-center mb-5">Our Services</h1>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="service-card card p-3">
                        <h3>Web Design</h3>
                        <p>Beautiful, responsive websites tailored to your brand.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="service-card card p-3">
                        <h3>Graphic Design</h3>
                        <p>Stunning visuals to elevate your marketing.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="service-card card p-3">
                        <h3>Digital Marketing</h3>
                        <p>Strategies to grow your online presence.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        const cards = document.querySelectorAll('.service-card');
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.3 });
        cards.forEach(card => observer.observe(card));
    </script>
@endsection