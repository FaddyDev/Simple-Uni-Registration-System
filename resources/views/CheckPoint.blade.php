@extends('layouts.header');
@section('content')
    {{--<section>--}}
        {{--@include('layouts.header')--}}
    {{--</section>--}}

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            @if(session('success'))
            <div class="alert alert-success" style="text-align:center;" role="alert"><span class="glyphicon glyphicon-ok"></span> {{ session('success') }}</div>
            @endif
            @if(session('fail'))
            <div class="alert alert-warning" style="text-align:center;" role="alert"><span class="glyphicon glyphicon-warning-sign"></span> {{ session('fail') }}</div>
            @endif
                <div class="panel panel-success">
                    <div class="panel-heading">Confirm Cluster</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ URL::to('check/point')}}">
                            {{ csrf_field() }}

                            <aside id="sidebar">
                                <div class="form-group{{ $errors->has('schoolname') ? ' has-error' : '' }}">
                                    <label for="schoolname" class="col-md-4 control-label">Select Course</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="course_id" required>
                                            <option value="" disabled selected>Belongs to Course</option>

                                            @foreach($data as $data)
                                                <option value="{{$data->id}}">{{$data->course}}</option>

                                            @endforeach


                                        </select>
                                    </div>
                                </div>

                            </aside>

                            <aside id="sidebar">
                                <div class="form-group{{ $errors->has('math') ? ' has-error' : '' }}">
                                    <label for="Units" class="col-sm-4 control-label">MATHS</label>

                                    <div class="col-md-6">
                                        <input id="math" type="number" aria-multiline="true" class="form-control" name="maths" placeholder="7" required>

                                        @if ($errors->has('math'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('maths') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </aside> <aside id="sidebar">
                                <div class="form-group{{ $errors->has('languages') ? ' has-error' : '' }}">
                                    <label for="Units" class="col-sm-4 control-label">LANGUAGES</label>

                                    <div class="col-md-6">
                                        <input id="languages" type="number" aria-multiline="true" class="form-control" name="languages" placeholder="7" required>

                                        @if ($errors->has('languages'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('Languages') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </aside> <aside id="sidebar">
                                <div class="form-group{{ $errors->has('sciences') ? ' has-error' : '' }}">
                                    <label for="Units" class="col-sm-4 control-label">SCIENCES</label>

                                    <div class="col-md-6">
                                        <input id="sciences" type="number" aria-multiline="true" class="form-control" name="sciences" placeholder="7" required>

                                        @if ($errors->has('sciences'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('Sciences') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </aside>
                            <aside id="sidebar">
                                <div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">
                                    <label for="Units" class="col-sm-4 control-label">Aggregate points</label>

                                    <div class="col-md-6">
                                        <input id="total" type="number" aria-multiline="true" class="form-control" name="total" placeholder="45" required>

                                        @if ($errors->has('total'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('Case') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </aside>


                            <aside id="sidebar">
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary" color="blue">
                                           Check
                                        </button>
                                    </div>
                                </div>
                            </aside>
                        </form>

                        <br/>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>



    </body>
    <section>
        @include('layouts.footer');
    </section>
@endsection

