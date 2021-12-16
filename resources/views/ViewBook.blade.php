@extends('layouts.app')
@section('content')
        <section >
            @include('layouts.side')
        </section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 xcol-md-offset-2">
                    <div class="panel panel-success">
                        <div class="panel-heading">Registered Students - Pending Response</div>
                        <div class="panel-body">
                        </div>


                            <table class="table w3-bordered w3-border w3-table w3-striped" style="font-size: 12px;">
                                <th><span class="glyphicon glyphicon-tasks"></span> id</th>
                                <th><span class="glyphicon glyphicon-edit"></span> name</th>
                                <th><span class="glyphicon glyphicon-edit"></span> Course</th>
                                <th><span class="glyphicon glyphicon-edit"></span> Id number</th>
                                <th><span class="glyphicon glyphicon-edit"></span> copy id</th>
                                <th><span class="glyphicon glyphicon-edit"></span> birth certificate</th>
                                <th><span class="glyphicon glyphicon-edit"></span> result slip</th>
                                <th><span class="glyphicon glyphicon-edit"></span> points</th>
                                <th><span class="glyphicon glyphicon-edit"></span> image</th>
                                <th><span class="glyphicon glyphicon-alert"></span> Action</th>
                                @foreach($data as $content)
                                    <tr>
                                        <td>{{ $content->id  }}</td>
                                        <td>{{ $content->fullname  }}</td>
                                        <td>{{ $content->course  }}</td>
                                        <td>{{ $content->id_number  }}</td>
                                    
                                        <td><a class="carousel-inner"
                                               href="{{ asset('storage/uploads/') }}/{{ $content->id_copy }}"
                                               width="50px" height="50px">{{ $content->id_copy }}</a></td>
                                        <td><a class="circle"
                                               href="{{ asset('storage/uploads/') }}/{{ $content->birth_certificate}}"
                                               width="50px" height="50px">{{ $content->birth_certificate}}</a></td>
                                        <td><a class="circle"
                                               href="{{ asset('storage/uploads/') }}/{{ $content->result_certificate}}"
                                               width="50px" height="50px">{{ $content->result_certificate}}</a></td>
                                        <td>{{ $content->points  }}</td>
                                        <td><img class="circle"
                                                 src="{{ asset('storage/uploads') }}/{{ $content->photo }}"
                                                 width="50px" height="50px"></td>
                                        <td><a 
                                               href="{{URL::to('decline')}}/{{ $content->id  }}"><span class="bg-danger glyphicon glyphicon-edit">Decline</span></a>
                                        </td> <td><a 
                                               href="{{URL::to('accept')}}/{{ $content->id  }}"><span class="bg-info glyphicon glyphicon-edit">Accept</span></a>
                                        </td>

                                    </tr>

                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <section>
        @include('layouts.footer')
    </section>

    @endsection