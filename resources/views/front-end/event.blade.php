@extends('front-end.layouts.master')

@section('title', 'HiTech Drinking Water Launch Event')

@section('styles')
    <style>
        /* Global Reset and Font */
        /* * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        } */

        /* Event Hero Section */
        .event-section {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 0 5%;
            background: linear-gradient(rgba(125, 143, 161, 0.209), rgba(125, 143, 161, 0.209)), url("{{asset('images/ocean.jpg')}}") no-repeat center center;
            background-size: cover;
            background-position: center;
            color: #fff;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3), inset 0 0 20px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1.5s ease-out;
        }

        .event-section div {
            max-width: 600px;
            padding: 20px;
            backdrop-filter: blur(8px);
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .event-section h1 {
            font-size: clamp(2.5rem, 2vw, 4.5rem);
            font-weight: 900;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
        }

        .event-section p {
            font-size: clamp(1rem, 2.5vw, 1.3rem);
            line-height: 1.7;
            margin-bottom: 30px;
        }

        /* Button Styling */
        .btn {
            display: inline-block;
            padding: 15px 40px;
            background: linear-gradient(45deg, #1a6aa8, #00aaff);
            color: #fff;
            font-size: clamp(0.9rem, 2vw, 1rem);
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

        /* General Section Styling */
        .section {
            max-width: 1400px;
            margin: 40px auto;
            padding: 50px 20px;
            display: flex;
            align-items: center;
            gap: 40px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2), 0 5px 15px rgba(0, 0, 0, 0.1);
            animation: slideUp 1s ease-out;
        }

        .section.reverse {
            flex-direction: row-reverse;
        }

        .text-content {
            flex: 1;
            padding: 20px;
        }

        .text-content h2 {
            font-size: clamp(1.8rem, 3.5vw, 2.5rem);
            color: #0056b3;
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }

        .text-content p {
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            line-height: 1.8;
            color: #333;
        }

        .image-content {
            flex: 1;
        }

        .image-content img {
            width: 100%;
            height: auto;
            border-radius: 12px;
            object-fit: cover;	
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.5s ease;
        }

        .image-content img:hover {
            transform: scale(1.05);
        }

        /* Event Details Section */
        .event-details {
            padding: 60px 20px;
            background: linear-gradient(180deg, #f9f9f9, #e8f0ff);
            text-align: center;
            border-radius: 20px;
            margin: 40px auto;
            max-width: 1400px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
            animation: fadeIn 1.2s ease-out;
        }

        .event-details h2 {
            font-size: clamp(2rem, 4vw, 3rem);
            color: #0056b3;
            font-weight: 900;
            margin-bottom: 25px;
        }

        .event-details p, .event-details ul {
            font-size: clamp(0.9rem, 2.5vw, 1.1rem);
            max-width: 800px;
            margin: 0 auto 20px;
            color: #333;
        }

        .event-details ul {
            text-align: left;
            list-style: none;
            padding: 0;
        }

        .event-details ul li {
            position: relative;
            padding-left: 30px;
            margin-bottom: 10px;
        }

        .event-details ul li::before {
            content: '✔';
            position: absolute;
            left: 0;
            color: #1a6aa8;
            font-weight: bold;
        }

        /* Sustainability Section */
        .sustainability-section {
            max-width: 1400px;
            margin: 40px auto;
            padding: 50px 20px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            animation: slideUp 1s ease-out;
        }

        .sustainability-section h2 {
            font-size: clamp(1.8rem, 3.5vw, 2.5rem);
            color: #0056b3;
            font-weight: 800;
            text-align: center;
            margin-bottom: 30px;
        }

        .sustainability-section .image-gallery {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .sustainability-section .image-gallery img {
            max-width: 450px;
            width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.5s ease;
        }

        .sustainability-section .image-gallery img:hover {
            transform: scale(1.05);
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
        @media (max-width: 768px) {
            .event-section {
                padding: 0 20px;
                height: 50vh;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            }

            .event-section h1 {
                font-size: clamp(2rem, 5vw, 3rem);
            }

            .event-section p {
                font-size: clamp(0.9rem, 2vw, 1.1rem);
            }

            .section {
                flex-direction: column;
                margin: 20px;
                padding: 30px 15px;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            }

            .section.reverse {
                flex-direction: column;
            }

            .text-content h2 {
                font-size: clamp(1.5rem, 3vw, 2rem);
            }

            .text-content p {
                font-size: clamp(0.85rem, 1.8vw, 1rem);
            }

            .event-details {
                margin: 20px;
                padding: 40px 15px;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            }

            .sustainability-section {
                margin: 20px;
                padding: 30px 15px;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            }

            .sustainability-section .image-gallery {
                flex-direction: column;
                align-items: center;
            }

            .sustainability-section .image-gallery img {
                max-width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    <section class="event-section">
        <div>
            <h1>Pure Water, Pure Life</h1>
            <p>Join us for the grand launch of HiTech Drinking Water! Discover our advanced filtration technology and unwavering commitment to delivering pure, safe, and affordable water to Cambodia.</p>
            <a href="#register" class="btn">Register Now</a>
        </div>
    </section>
    <section class="section">
        <div class="text-content">
            <h2>RUNNIG AND CHARITY</h2>
            <p>The International Half Marathon in Sihanoukville, join in playing sports together for health and stay away from drugs that destroy your health.</p>
            <p>The International Half Marathon in Sihanoukville, join in playing sports together for health and stay away from drugs that destroy your health.</p>
        </div>
        <div class="image-content">
            <img src="{{asset('images/running.jpg')}}" alt="Aquifer Source">
        </div>
    </section>

    <!-- Vision & Innovation Section -->
    <section class="section reverse">
        <div class="text-content">
            <h2>TRIP</h2>
            <p>HI-TECH, founded in 2004 by HI-TECH Drinking Water is committed to well-being and sustainability. It combines Cambodia’s natural treasures with advanced European technology to deliver pure, mineral-rich water, perfect for a healthy lifestyle, while honoring traditional values.</p>
            <p>HI-TECH, founded in 2004 by HI-TECH Drinking Water is committed to well-being and sustainability. It combines Cambodia’s natural treasures with advanced European technology to deliver pure, mineral-rich water, perfect for a healthy lifestyle, while honoring traditional values.</p>
        </div>
        <div class="image-content">
            <img src="{{asset('images/moutain.jpg')}}" alt="Production Facility">
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="section">
        <div class="text-content">
            <h2>OUR EVENT</h2>
            <p>HiTech’s core values reflect our dedication to a healthy future for both people and the planet. We prioritize quality and purity in our natural mineral water, while also deeply respecting and protecting the environment.</p>
            <p>This commitment drives us to sustainable practices, responsible operations, and a genuine investment in the well-being of our community.</p>
        </div>
        <div class="image-content">
            <img src="{{asset('images/charity.jpg')}}" alt="Community Event">
        </div>
    </section>

    <!-- Sustainability Efforts Section -->
    <section class="sustainability-section">
        <h2>EVENT KOH RONG CAMBODIA</h2>
        <div class="image-gallery">
            <img src="{{asset('images/koh.jpg')}}" alt="Water Conservation">
            <img src="{{asset('images/koh_rong.jpg')}}" alt="River Cleanup">
        </div>
    </section>
    <section class="event-details">
        <h2>HiTech Drinking Water Launch Event</h2>
        <p>Date: May 10, 2025 | Time: 10:00 AM - 4:00 PM | Location: Phnom Penh Convention Center</p>
        <p>Get ready for a day filled with innovation, hydration, and community spirit. Highlights include:</p>
        <ul style="text-align: left; max-width: 600px; margin: 0 auto;">
            <li>Interactive hydration stations with HiTech water tasting</li>
            <li>Live demonstration of our German and USA-standard filtration process</li>
            <li>Digital graffiti wall and iPad magician entertainment</li>
            <li>Community water donation drive with UYFC</li>
            <li>Exclusive giveaways of HiTech-branded reusable bottles</li>
        </ul>
        {{-- <a href="#register" class="btn">Join the Celebration</a> --}}
    </section>
@endsection