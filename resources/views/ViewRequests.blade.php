@extends('layouts.app')
@section('content')
        <section >
            @include('layouts.side')
        </section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 xcol-md-offset-2">
                    <div class="panel panel-success">
                        <div class="panel-heading">Requested services</div>
                        <div class="panel-body">
                        </div>


                            <table class="table w3-bordered w3-border w3-table w3-striped" style="font-size: 12px;">
                                <th><span class="glyphicon glyphicon-tasks"></span> id</th>
                                <th><span class="glyphicon glyphicon-edit"></span> Student RegNo</th>
                                <th><span class="glyphicon glyphicon-tasks"></span> Service</th>
                                <th><span class="glyphicon glyphicon-edit"></span> Message</th>
                                <th><span class="glyphicon glyphicon-edit"></span> Date</th>
                                <th><span class="glyphicon glyphicon-alert"></span> Action</th>
                                @foreach($regs as $content)
                                    <tr>
                                        <td>{{ $content->student_regno }}</td>
                                        <td>{{ $content->service }}</td>
                                        <td>{{ $content->message  }}</td>
                                        <td>{{ $content->created_at  }}</td>
                                        
                                        <td><a 
                                               href="{{URL::to('declineReq')}}/{{ $content->id  }}"><span class="bg-danger glyphicon glyphicon-edit">Decline</span></a>
                                        </td> <td><a 
                                               href="{{URL::to('approveReq')}}/{{ $content->id  }}"><span class="bg-info glyphicon glyphicon-edit">Approve</span></a>
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