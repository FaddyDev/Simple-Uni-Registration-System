
<!--Import Google Icon Font-->
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="{{'css/materialize.min.css'}}" media="screen,projection"/>


<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, init">

<div id="side" class="row">
    <div id="side" class="row">
        <div class="navbar-fixed-top">
            <nav style="background-color: green">
                {{--<ul class="navbar-header" style="font-size: xx-large">--}}
                <ul class="container-fluid" style="font-size: xx-large">
                    {{--<li><a href="{{ url('/home') }}"><h6> HOME</h6> </a></li>--}}
                    <ul class="nav navbar-nav" style="border-radius:12px; margin:2px">

                        <li role="presentation" class="active"><a href="{{URL::to('/')}}">Home</a></li>
                    </ul>

                    <ul class="nav navbar-nav" style="float:right">
                    <li role="presentation"><a href="map">Contact</a></li>
                    </ul>

                </ul>
            </nav>
        </div>
        <style>
#slide-out li{
    display: inline-block;
    margin-right: 5px;
    background-color: gold;
    text-align: center;
}
</style>

        <ul id="slide-out" class="side-navXX fixed" style="background-color: #8eb4cb; min-height: 50px;">

<div class="container">

            <li style="float: right;">
                <div class="userView" style="margin-right: 10px;">
                  <!--  <div class="background" style="background: transparent">
                        <img src="http://localhost/FinalAmos/public/images/user-img-background.jpg">
                    </div> -->

                    <span class="white-text name">Student</span>
                    
                    <a href="#"><img class="circle" src="{{ asset('storage/uploads/') }}/{{Session::get('photo')}}"
                                     width="50px"
                                     height="50px"></a>
                    @foreach($data as $content)                    
                    <a href="#"><span class="white-text name"> {{$content->fullname}}:</span></a>
                    <a href="#"><span class="white-text email">{{$content->reg_number}}</span></a>
                    @endforeach
                    {{--category of authenticate person--}}


                </div>
            </li>


            <li><a href="{{ url('/student') }}">Home</a></li>
            <li><a href="{{ URL::to('download/notes') }}">Download Notes</a></li>
            {{--<li><a href="{{ URL::to('download/fee/structure') }}">Download Fees Structure</a></li>--}}
            <li><a href="{{ url('/regservices') }}">Registrar Services</a>                
            </li>

            <li style="float: right;"><a href="{{ url('/logout') }}" class="btn btn-warning"> <span class="glyphicon glyphicon-log-out">Logout</span> </a></li>

        </ul>
</div>

    </div>
</div>

