@extends('layouts.app')

@section('content')
    <br><br>
    <br><br>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success">
                    <div class="panel-heading"><center>Student Login</center></div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{URL::to('/login/user') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('idnumber') ? ' has-error' : '' }}">
                                <label for="idnumber" class="col-md-4 control-label">Id Number</label>

                                <div class="col-md-6">
                                    <input id="idnumber" type="number" class="form-control" name="idnumber" value="{{ old('idnumber') }}" required autofocus>

                                    @if ($errors->has('idnumber'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('idnumber') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('regNo') ? ' has-error' : '' }}">
                                <label for="regNo" class="col-md-4 control-label">Registration Number</label>

                                <div class="col-md-6">
                                    <input id="regNo" type="text" class="form-control" name="regNo" required>

                                    @if ($errors->has('regNo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('regNo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
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
    <br><br>
    <section>
        @include('layouts.footer')
    </section>
@endsection
