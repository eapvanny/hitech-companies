@extends('front-end.layouts.master')

@section('title', 'Contact')

@section('styles')
    <style>
        .contact-section { padding: 80px 0; }
        .form-group { opacity: 0; animation: fadeUp 0.8s ease-out forwards; }
        .form-group:nth-child(1) { animation-delay: 0.2s; }
        .form-group:nth-child(2) { animation-delay: 0.4s; }
        .form-group:nth-child(3) { animation-delay: 0.6s; }
        .form-group:nth-child(4) { animation-delay: 0.8s; }
        .btn-submit { transition: transform 0.3s; }
        .btn-submit:hover { transform: scale(1.1); }
        .map-placeholder { height: 300px; background: #ddd; animation: fadeIn 1s ease-in; }
        @keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    </style>
@endsection

@section('content')
    <section class="contact-section">
        <div class="container">
            <h1 class="text-center mb-5">Get in Touch</h1>
            <div class="row">
                <div class="col-md-6">
                    <form>
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Your Name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" rows="4" placeholder="Your Message"></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="map-placeholder mt-3 mt-md-0">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3466.4853217556897!2d104.9369986744223!3d11.52743024489393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095718930aba8b%3A0xa3fe58dfe70d02db!2sHi-Tech!5e1!3m2!1sen!2skh!4v1742353332113!5m2!1sen!2skh" width="650" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection