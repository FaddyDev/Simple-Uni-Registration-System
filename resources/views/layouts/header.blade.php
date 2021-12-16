<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="{{'css/bootstrap.min.css'}}">
    <link rel="stylesheet" href="{{'css/myCss.css'}}">
</head>
<style>
    body {
        background: {{url('images/back.png')}};

        background-size: cover;
        background-position-x: center;
        background-repeat: no-repeat;

    }

    li {
        border-radius: 19px;
        margin: 5px;
     background-color: gold;
        /*background-color: chartreuse;*/
}

    a {
        border-radius: 12px;
    }

    ul {

        padding: 0;

        list-style: none;

    }
</style>


<body>

<div class="container-fluid" style="background-color:green;border-radius:4px">
    <ul class="nav navbar-nav" style="border-radius:12px; margin:2px">

        <li role="presentation" class="active"><a href="{{URL::to('/')}}">Home</a></li>
    </ul>

    <ul class="nav navbar-nav" style="float:right">
        <li role="presentation"><a href="map">Contact</a></li>
    </ul>
    <h2 style="color:red;text-align:center">Dedan Kimathi Online Registration</h2>
</div>
{{--<h1 style="color:red;font-family:Book Antiqua;text-align:center">Dedan Kimathi Online Registration</h1>--}}

<div class="row">
    <div class="col-md-1">

    </div>
</div>
</body>
@yield('content')
</html>

{{-- background-color: gold;--}}