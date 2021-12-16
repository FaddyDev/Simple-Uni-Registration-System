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

            .mySlides {
                display: none;
            }

            /* Next & previous buttons */
            .prev, .next {
                cursor: pointer;
                position: absolute;
                top: 50%;
                width: auto;
                margin-top: -22px;
                padding: 16px;
                color: white;
                font-weight: bold;
                font-size: 18px;
                transition: 0.6s ease;
                border-radius: 0 3px 3px 0;
            }

            /* Position the "next button" to the right */
            .next {
                right: 0;
                border-radius: 3px 0 0 3px;
            }

            /* On hover, add a black background color with a little bit see-through */
            .prev:hover, .next:hover {
                background-color: rgba(0, 0, 0, 0.8);
            }

            /* Caption text */
            .text {
                color: #f2f2f2;
                font-size: 15px;
                padding: 8px 12px;
                position: absolute;
                bottom: 8px;
                width: 100%;
                text-align: center;
            }

            /* Number text (1/3 etc) */
            .numbertext {
                color: #f2f2f2;
                font-size: 12px;
                padding: 8px 12px;
                position: absolute;
                top: 0;
            }

            /* The dots/bullets/indicators */
            .dot {
                cursor: pointer;
                height: 13px;
                width: 13px;
                margin: 0 2px;
                background-color: #bbb;
                border-radius: 50%;
                display: inline-block;
                transition: background-color 0.6s ease;
            }

            .active, .dot:hover {
                background-color: #717171;
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

            /* On smaller screens, decrease text size */
            @media only screen and (max-width: 300px) {
                .text {
                    font-size: 11px
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
                <a href="#">Post-Graduate Programmes </a>

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
        <li><a href="{{ url('/checkpoint') }}">Check Point</a></li>
        <?php if(Session::get('is_logged') == true){ ?>
        <li>{{Session::get('regno')}}</li>
        <li> <a href="{{ url('/logout') }}"> <span class="glyphicon glyphicon-log-out">Logout</span> </a></li>
        <?php } else{ ?>
            <li>    
               <a href="login/student">Student Login </a>
             
                
                {{--<a href="#">About Us </a>--}}

                {{--<ul class="dropdown">--}}

                    {{--<li><a href="#">Location</a></li>--}}
                {{--</ul>--}}
            </li>
            <li><a href="map">Contact</a></li>
            <?php } ?> 
        </ul>


    </div>
    </ul>

    <div class="row">
        <div class="col-md-8">
            <div class="slideshow-container">

                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <img src="images/lib.png" style="width:80%">
                    <div class="text"> Resource Center</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <img src="images/lab.jpg" style="width:100%">
                    <div class="text">Computer lab</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img src="images/golf.jpg" style="width:100%">
                    <div class="text">Field activity</div>
                </div>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>

            <script>
                var slideIndex = 0;
                showSlides();

                function showSlides() {
                    var i;
                    var slides = document.getElementsByClassName("mySlides");
                    var dots = document.getElementsByClassName("dot");
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    slideIndex++;
                    if (slideIndex > slides.length) {
                        slideIndex = 1
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex - 1].style.display = "block";
                    dots[slideIndex - 1].className += " active";
                    setTimeout(showSlides, 5000); // Change image every 5 seconds
                }
            </script>

            <div class="col-md-2">
            </div>
        </div>
    </div>


    <div>

        <marquee style="font-size:14px;font-type:Times Roman p">Welcome To Dedan Kimathi University of Technology
            "Better
            life through Technology.... Fof more Info please contact us via; P.O BOX 657-10100
            Nyeri, Kenya. Landline: +254612050000. Marketing Mobile: 0713123021".
        </marquee>

    </div>


    </div>
    <section>
        @include('layouts.footer')
    </section>

@endsection