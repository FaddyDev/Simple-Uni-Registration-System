<!--Import Google Icon Font-->
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="{{'css/materialize.min.css'}}" media="screen,projection"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">


<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, init">

<div id="side" class="row">
    <div id="side" class="row">
        <div class="navbar-fixed-top">
            <nav style="background-color: green">
                <ul class="container-fluid" style="font-size: xx-large">
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
        <ul id="slide-out" class="side-navXX fixedXX" style="background-color: #8eb4cb; min-height: 50px;">

            <li style="float: right;">
                <div class="userView">
                   <!--  <div class="background" style="background: transparent">
                       <img src="http://localhost/FinalAmos/public/images/user-img-background.jpg"> 
                    </div> -->

                    <span class="white-text name">Admin</span>

                    <a href="#"><img class="circle" src="http://localhost/FinalAmos/public/images/resource.png"
                                     width="50px"
                                     height="50px"></a>
                   <!-- <a href="#"><span class="white-text name"> Admin</span></a> -->
                    <a href="#"><span class="white-text name"> {{ Auth::user()->name }}</span></a>
                    <a href="#"><span class="white-text email">{{ Auth::user()->email }}</span></a>

                    {{--category of authenticate person--}}


                </div>
            </li>

            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ URL::to('addcluster') }}">Add Cluster</a></li>
            <li><a href="{{ URL::to('addschool') }}">Add School</a></li>
            <li><a href="{{ URL::to('addcourse') }}">Add Course</a></li>
            <li><a href="{{ URL::to('upload/notes') }}">Upload Notes</a></li>
            <li><a href="{{ URL::to('requests') }}">Service Requests</a></li>
            <li><a href="{{ url('/block') }}">Block User</a></li>            
        <li><a href="{{ route('register') }}">Register </a></li>
            <li style="float: right;"><a href="{{ url('/logout') }}" class="btn bn-danger"> <span class="glyphicon glyphicon-log-out">Logout</span> </a></li>

        </ul>
       {{-- <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a> --}}


        <script>

         /*   $('.button-collapse').sideNav({
                    width: 150,// Default is 240
                    edge: 'left', // Choose the horizontal origin
                    closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
                    draggable: true // Choose whether you can drag to open on touch screens
                }
            ); */
        </script>
    </div>
</div>