@extends('layouts.app')
@section('content')
    <section >
        @include('layouts.sidebar')
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 xcol-md-offset-2">
                <div class="panel panel-success">
                    <div class="panel-heading">Welcome</div>
                    <div class="panel-body">
                    </div>


                    <table class="table w3-bordered w3-border w3-table w3-striped" style="font-size: 12px;">
                        <th><span class="glyphicon glyphicon-tasks"></span> id</th>
                        <th><span class="glyphicon glyphicon-edit"></span> Unit</th>
                        <th><span class="glyphicon glyphicon-edit"></span> Notes</th>
                        {{--<th><span class="glyphicon glyphicon-alert"></span> Action</th>--}}

                        @foreach($datanotes as $data)

                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->subject  }}</td>

                                <td><a class="carousel-inner"
                                       href="http://localhost/FinalAmos/public/storage/uploads/{{ $data->notes }}"
                                       width="50px" height="50px">{{ $data->notes }}</a>
                                </td>

                                {{--<td><a data-toggle="modal" data-target="#myModalEdit{{ $data->id }}"--}}
                                       {{--href="{{URL::to('respond')}}/{{ $data->id  }}"><span class="glyphicon glyphicon-edit">Respond</span></a>--}}
                                {{--</td>--}}

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