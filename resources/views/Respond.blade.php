@extends('layouts.app')
@section('content')
    <section >
        @include('layouts.sidebar')
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 xcol-md-offset-2">
                <div class="panel panel-success">
                    <div class="panel-heading">Welcome {{Session::get('regno')}}</div>
                    <div class="panel-body">
                                    

                    @foreach($data as $content)                    
                    <strong> Course: </strong> {{$content->course}}<br>
                    <strong> Registration Number: </strong> {{$content->reg_number}}
                    <br><br>
                    <img src="{{ asset('storage/uploads/') }}/{{$content->photo}}" width="100px" height="100px" class="img-round"><br>
                   <strong> Name: </strong> {{$content->fullname}}<br>
                    <strong> ID Number: </strong> {{$content->id_number}}<br>
                    <strong> Phone: </strong> {{$content->phonenumber}}<br>
                    <strong> Address: </strong> {{$content->address}}
                    <br><br>
                    <strong> Parent Name: </strong> {{$content->parentfullname}}<br>
                    <strong> Parent Phone: </strong> {{$content->parentphonenumber}}<br>
                    <strong> Parent ID: </strong> {{$content->parentid_number}}
                    <br><br>
                    <strong> High School: </strong> {{$content->highschool}}<br>
                    <strong> Index No: </strong> {{$content->index_number}}<br>
                    <strong> Points: </strong> {{$content->points}}
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    </div>


    <section>
        @include('layouts.footer')
    </section>

@endsection