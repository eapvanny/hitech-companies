@extends('front-end.layouts.master')

@section('title', 'Career')

@section('styles')
    <style>
        .career-section {
            background-image: url('https://hitech.com.kh/wp-content/uploads/2022/03/career-image.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 20px 50px;
            color: white;
            text-shadow: 1px 1px 2px rgba(98, 98, 98, 0.7);
        }
        .career-section .h1{
            font-weight: bold;
            margin: 80px 10px 20px 50px;
        }
        .career-section .p{
            margin: 0 10px 20px 50px;
        }
        .team-section {
            min-height: 30vh; /* Reduced from 40vh */
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
            padding: 10px; /* Reduced from 20px */
        }
        
        .team-section div {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .team-section h1 {
            font-size: 38px;
            width: 65%;
            font-weight: bold;
            text-align: center;
        }

        .join-us-section {
            background-color: #555555;
            color: white;
            padding: 20px 10px; /* Reduced from 40px 20px */
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px; /* Reduced from 20px */
            min-height: 40vh; /* Reduced from 48vh */
            flex-direction: row;
        }

        .join-us-section h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .join-us-section p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .join-us-section ul {
            list-style: none;
            padding: 0;
        }

        .join-us-section li {
            font-size: 18px;
            margin-bottom: 8px;
            position: relative;
            padding-left: 20px;
        }

        .join-us-section li::before {
            content: ">";
            position: absolute;
            left: 0;
            color: white;
        }

        .join-us-section .department-box {
            border: 2px solid white;
            padding: 20px;
            width: 100%;
            max-width: 500px;
        }
         /* Responsive Design */
         @media (max-width: 767px) {
            .career-section {
                height: 30vh;
                padding: 70px 20px;
            }

            .career-section .h1 {
                font-size: 22px;
                font-weight: bold;
                margin-bottom: 20px
            }
            .career-section .p {
                font-size: 15px;
            }
            .team-section{
                min-height: 20vh;
                padding: 0 30px;    
            }
            .team-section h1 {
                font-size: 24px;
                width: 100%;
            }
            .join-us-section {
            background-color: #555555;
            color: white;
            padding: 20px 10px; /* Reduced from 40px 20px */
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px; /* Reduced from 20px */
            min-height: 40vh; /* Reduced from 48vh */
            flex-direction: column;
        }

            .join-us-section {
                padding: 10px; /* Reduced from 20px */
                min-height: 30vh; /* Reduced for mobile */
            }

            .join-us-section h1 {
                font-size: 30px;
            }

            .join-us-section p,
            .join-us-section li {
                font-size: 16px;
            }
        }
        @media (min-width: 768px) and (max-width: 1024px) {
            .career-section {
                height: 50vh;
                padding: 30px 0;
            }

            .career-section .h1 {
                font-size: 28px;
            }
            .career-section .p {
                font-size: 19px;
            }
            .team-section{
                min-height: 17vh;
                padding: 0 40px;    
            }
            .team-section h1 {
                font-size: 30px;
                width: 100%;
            }

            .join-us-section {
                flex-direction: row;
                gap: 20px; /* Adjusted for row layout */
                padding: 20px 40px; /* Reduced from 30px */
                min-height: 30vh; /* Reduced for tablet */
            }
            .join-us-section h1 {
                font-size: 46px;
            }

            .join-us-section p,
            .join-us-section li {
                font-size: 19px;
            }
            .join-us-section .department-box {
                border: 2px solid white;
                max-width: 700px;
            }
            .join-us-section .department-box p{
                margin: 5px auto;
                font-size:  20px
            }
        }
        @media (max-width: 540px) {
            .career-section {
                height: 50vh;
            }
        }
        @media (max-width: 414px) {
            .career-section {
                height: 40vh;
            }

            .career-section .h1 {
                font-size: 20px;
                font-weight: bold;
                margin: auto 0;
                margin-bottom: 30px;
            }
            .career-section .p {
                font-size: 15px;
                margin: auto 0;

            }
            .team-section h1 {
                font-size: 24px;
                width: 100%;
                font-weight: bold;
                text-align: center;
            }
            .join-us-section {
                background-color: #555555;
                color: white;
                padding: 20px 10px; /* Reduced from 40px 20px */
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 10px; /* Reduced from 20px */
                min-height: 40vh; /* Reduced from 48vh */
                flex-direction: column;
            }
            .join-us-section h1 {
                font-size: 25px;
                font-weight: bold;
                margin: 30px;
            }
            .join-us-section p {
                font-size: 16px;
                margin: -5px 30px 0px 30px  ;
            }
            .join-us-section .department-box p{
                margin: 5px auto;
                font-size:  20px
            }
        }
        @media (max-width: 375px) {
            .career-section {
                height: 40vh;
            }

            .career-section .h1 {
                font-size: 18px;
                font-weight: bold;
                margin: auto 0;
                margin-top: 30px;
            }
            .career-section .p {
                font-size: 14px;
                margin: auto 0;
                margin-top: 20px

            }
            .team-section h1 {
                font-size: 24px;
                width: 100%;
                font-weight: bold;
                text-align: center;
            }
            .join-us-section {
                background-color: #555555;
                color: white;
                padding: 20px 10px; /* Reduced from 40px 20px */
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 10px; /* Reduced from 20px */
                min-height: 40vh; /* Reduced from 48vh */
                flex-direction: column;
            }
            .join-us-section h1 {
                font-size: 25px;
                font-weight: bold;
                margin: 30px;
            }
            .join-us-section p {
                font-size: 16px;
                margin: -5px 30px 0px 30px  ;
            }
            .join-us-section .department-box p{
                margin: 5px auto;
                font-size:  20px
            }
        }
    </style>
@endsection

@section('content')
    <section class="career-section">
        <div>
            <h1 class="h1">Start your journey with us!!!</h1>
            <p class="p">Join our team to work hard, make a difference and succeed in a fast-paced environment.</p>
        </div>
    </section>

    <section class="team-section">
        <div>
            <h1>At Hi-Tech, we have a diverse team of people who thirst for more</h1>
        </div>
    </section>

    <section class="join-us-section">
        <div>
            <h1>JOIN US TODAY</h1>
            <p>We are looking for talented people to join the following departments at Hi-Tech</p>
        </div>
        <div class="department-box">
            <p><strong>Department :</strong></p>
            <ul>
                <li>Marketing</li>
                <li>Finance</li>
                <li>Sales</li>
                <li>Training and Development</li>
            </ul>
        </div>
    </section>
@endsection