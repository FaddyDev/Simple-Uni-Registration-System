@extends('layouts.app')
@section('content')
    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
                background: {{url('images/back.png')}};

                background-repeat: no-repeat;

            }

            li {
                border-radius: 19px;
                margin: 5px;
                background-color: gold;

            }

            a {
                border-radius: 12px;
            }

            ul {

                padding: 0;

                list-style: none;

            }

            ul li {

                display: inline-block;

                position: relative;

                line-height: 21px;

                text-align: left;

            }

            ul li a {

                display: block;

                padding: 8px 25px;

                text-decoration: none;

            }

            ul li a:hover {

                color: #fff;

            }

            ul li ul.dropdown {

                min-width: 250%; /* Set width of the dropdown */

                display: none;

                position: absolute;

                z-index: 999;

                left: 0;

            }

            ul li:hover ul.dropdown {

                display: block; /* Display the dropdown */

            }

            ul li ul.dropdown li {

                display: block;

            }

            * {
                box-sizing: border-box
            }

            * {
                box-sizing: border-box
            }

            body {
                font-family: Verdana, sans-serif;
            }

            .mySlides {
                display: none
            }

            /* Slideshow container */
            .slideshow-container {
                max-width: 1000px;
                position: relative;
                margin: auto;
            }
            

            /* Fading animation */
            .fade {
                -webkit-animation-name: fade;
                -webkit-animation-duration: 7s;
                animation-name: fade;
                animation-duration: 7s;
            }

            @-webkit-keyframes fade {
                from {
                    opacity: 9
                }
                to {
                    opacity: 7
                }
            }

            @keyframes fade {
                from {
                    opacity: .9
                }
                to {
                    opacity: 7
                }
            }

        </style>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Home Page</title>
    </head>
    <body>

    <div class="row"
         style="color:white; background-color:green;text-align:center;border-radius:2px;margin:1px;margin-color:black">
        <div class="col-md-2">
            <img src="images/logo.png" width="100%" height="100%">
        </div>
        <div class="col-md-8" style="padding:1px;line-height:1Px">
            <h1>DEDAN KIMATHI UNIVERSITY OF TECHNOLOGY</h1>
            <p style="color:red;font-family:monotype corsiva;font-size:22px">Better Life Through technology</p>
            <h2 style="color:gold">E-Registration</h2>
        </div>
    </div>

    <div class="container-fluid" style="background-color:green;border-radius:4px">
        <ul class="nav navbar-nav" style="border-radius:12px; margin;2px">
            <li>
                {{--<a href="index.html">HOME</a>--}}
                <a href="{{URL::to('/')}}">HOME</a>
            </li>
            {{--<li>--}}
            {{--<a href="#">Admin Services </a>--}}
            {{--<ul class="dropdown">--}}
            {{--<li><a href="{{URL::to('/addschool')}}">Add School</a></li>--}}

            {{--<li><a href="{{URL::to('/addcourse')}}">Add Course</a></li>--}}

            {{--<li><a href="{{URL::to('/addcluster')}}">Add Cluster</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            <li>
                <a href="{{URL::to('/users')}}">Under-Graduate Programmes </a>

                <ul class="dropdown">

                    <li style="color:white;background-color:green">Bachelor of Commerce<br>Bachelor of Purchasing and
                        Supplies Management</br>Bachelor of Science in Criminology and Security Management
                        <br>Bachelor of Business Administration</br>Bachelor of Science in Information Technology</br>
                        Bachelor of Science in Computer Science<br>Bachelor in Business Information Technology</br>
                        Bachelor of Science in Electrical and Electronics Engineering<br>Bachelor of Science in
                        Mechatronic
                        Engineering</br>Bachelor of Science in Mechanical Engineering<br>
                        Bachelor of Science in Civil Engineering</br>Bachelor of Science in Geometrics and Geospatial
                        Information Systems<br>Bachelor of Science in Geospatial Information Science and Remote
                        Sensing</br>
                        Bachelor of Science in Food Science and Technology<br>Bachelor of Science in Nursing (Direct
                        Entry)</br>Bachelor of Science in Nursing (Upgrading)<br>Bachelor of Sustainable Tourism and
                        Hospitality Management</br>
                        Bachelor of Science in Industrial Chemistry<br>Bachelor of Science in Leather Technology</br>
                        Bachelor of Science in Actuarial Science<br>Bachelor of Technology in Building Construction</br>
                        Bachelor of Education in Technology (Civil Engineering)</br>
                        Bachelor of Education in Technology ( Electrical and Electronic Engineering) </a>

                    </li>

                </ul>

            </li>


            <li>
                <a href="user.html">Post-Graduate Programmes </a>

                <ul class="dropdown">


                    <li style="color:white;background-color:green">PhD Mechanical Engineering<br>Master in Business
                        Administration</br>Master in Science in Supply Chain Management<br>Master of Science In
                        Economics</br>
                        Master of Science in Industrial Engineering and Management<br>Master of Science in Advanced
                        Manufacturing & Automation Engineering</br>Master of Science in Geospatial Information Systems
                        and
                        Remote Sensing<br>
                        Master of Science in Industrial Mathematics</br>Master of Science in Food Science and Technology<br>Master
                        of Science Leather Technology</br>MSc. Security and Forensic Management
                        <br>Master of Science in Mechanical Engineering</br>

                        </a></li>


                </ul>


        </ul>
        <ul class="nav navbar-nav" style="float:right">
        <li><a href="{{ route('register') }}">Register </a></li>
            <li>            
                <a href="login/student">Student Login </a>
                {{--<a href="#">About Us </a>--}}

                {{--<ul class="dropdown">--}}
                    {{--<li><a href="#">Contacts</a></li>--}}

                    {{--<li><a href="#">Location</a></li>--}}
                {{--</ul>--}}
            </li>
            <li><a href="map">Contact</a></li>
        </ul>


    </div>
    </ul>

    <div class="row">
        <div class="col-md-12">
        <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d127671.1432397323!2d36.89212638601243!3d-0.395584004437164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x1828677a4955ff13%3A0x7ae4dae9615396a6!2sgoogle+map+-+dedan+kimathi+university!3m2!1d-0.3955843!2d36.962167!5e0!3m2!1sen!2ske!4v1515869578853" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>


    <div>

        <marquee style="font-size:14px;font-type:Times Roman p">Welcome To Dedan Kimathi University of Technology
            "Better
            life through Technology.... Fof more Info please contact us via; P.O BOX 657-10100
            Nyeri, Kenya. Landline: +254612050000. Marketing Mobile: 0713123021".
        </marquee>

    </div>
    <section>
        @include('layouts.footer')
    </section>

@endsection