{{--@extends('layouts.app')--}}

@extends('layouts.app')
@section('content')
    <section >
        @include('layouts.sidebar')
    </section>
    <br><br>
    <br><br>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success">
                <?php if(isset($success)){//echo $fail;} ?>
    <div class="alert alert-success" style="text-align:center;" role="alert"><span class="glyphicon glyphicon-ok"></span> <?php echo $success; ?> </div>
    <?php } ?>
                    <div class="panel-heading">Registrar Services</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{URL::to('/regservice') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('service') ? ' has-error' : '' }}">
                                <label for="service" class="col-md-4 control-label">Select Service</label>

                                <div class="col-md-6">
                                <select name="service" class="form-control" required autofocus>
                                <option value="">Select Registrar Service</option>
                                <option value="School ID Replacement">School ID Replacement</option>
                                <option value="Academic Leave">Academic Leave</option>
                                <option value="Registration of Units">Registration of Units</option>
                                </select>                                   

                                    @if ($errors->has('service'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('service') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                <label for="message" class="col-md-4 control-label">Your Message</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="message" required placeholder="E.g: Applying for a one academic year leave to raise fees." cols="30" rows="10"></textarea>

                                    @if ($errors->has('message'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit Request
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    
    <div class="container">
    <div class="panel panel-success">
                        <div class="panel-heading">Previous Requests</div>
                        <div class="panel-body">
                        
                            <table class="table w3-bordered w3-border w3-table w3-striped" style="font-size: 12px;">
                                <th><span class="glyphicon glyphicon-tasks"></span> Service</th>
                                <th><span class="glyphicon glyphicon-edit"></span> Message</th>
                                <th><span class="glyphicon glyphicon-edit"></span> Date</th>
                                <th><span class="glyphicon glyphicon-edit"></span> Response</th>
                                <th><span class="glyphicon glyphicon-edit"></span> Response Date</th>
                                @foreach($data2 as $content)
                                    <tr>
                                        <td>{{ $content->service }}</td>
                                        <td>{{ $content->message  }}</td>
                                        <td>{{ $content->created_at  }}</td>
                                        <td>{{ $content->response }}</td>
                                        <td>@if($content->status == 0) None @endif
                                        @if($content->status == 1) {{ $content->updated_at }} @endif</td>
                                    </tr>

                                @endforeach

                            </table>
                        </div>
                    </div>
    </div>              
    <section>
        @include('layouts.footer')
    </section>
@endsection
