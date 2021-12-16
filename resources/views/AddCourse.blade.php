@extends('layouts.app')
@section('content')
<section >
  @include('layouts.side')
 </section>

    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <?php if(isset($success)){//echo $fail;} ?>
    <div class="alert alert-success" style="text-align:center;" role="alert"><span class="glyphicon glyphicon-ok"></span> <?php echo $success; ?> </div>
    <?php } ?>
                <div class="panel panel-success">
                    <div class="panel-heading"><center>Add Course</center></div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ URL::to('add/course')}}">
                            {{ csrf_field() }}



                            <aside id="sidebar">
                                <div class="form-group{{ $errors->has('schoolname') ? ' has-error' : '' }}">
                                    <label for="schoolname" class="col-md-4 control-label">Select School</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="school_id" required>
                                            <option value="" disabled selected>Belongs to School</option>

                                            @foreach($data as $data)
                                                <option value="{{$data->id}}">{{$data->school}}</option>

                                            @endforeach


                                        </select>
                                    </div>
                                </div>

                            </aside>

                            <aside id="sidebar">
                                <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                    <label for="level" class="col-md-4 control-label">Select Level</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="level" required>
                                            <option value="" disabled selected>Course Level</option>
                                            <option value="0">Under-graduate</option>
                                            <option value="1">Post-graduate</option>
                                        </select>
                                    </div>
                                </div>

                            </aside>

                            <aside id="sidebar">
                                <div class="form-group{{ $errors->has('coursename') ? ' has-error' : '' }}">
                                    <label for="Units" class="col-sm-4 control-label">Course Name</label>

                                    <div class="col-md-6">
                                        <input id="coursename" type="text" aria-multiline="true" class="form-control" name="coursename" placeholder="BBIT" required>

                                        @if ($errors->has('coursename'))
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
                                            Add  / Update
                                        </button>
                                    </div>
                                </div>
                            </aside>
                        </form>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
    <div class="panel panel-success">
                        <div class="panel-heading">Available Courses</div>
                        <div class="panel-body">
                        
                            <table class="table w3-bordered w3-border w3-table w3-striped" style="font-size: 12px;">
                                <th><span class="glyphicon glyphicon-tasks"></span> id</th>
                                <th><span class="glyphicon glyphicon-edit"></span> School</th>
                                <th><span class="glyphicon glyphicon-edit"></span> Course</th>
                                <th><span class="glyphicon glyphicon-edit"></span> Level</th>
                                <th><span class="glyphicon glyphicon-edit"></span> Date Added</th>
                                @foreach($courses as $content)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $content->school  }}</td>
                                        <td>{{ $content->course  }}</td>
                                        <td>@if($content->level == 0) Under-graduate @endif
                                        @if($content->level == 1) Post-graduate @endif</td>
                                        <td>{{ $content->created_at  }}</td>
                                    </tr>

                                @endforeach

                            </table>
                        </div>
    </div> 

    <section>
        @include('layouts.footer')
    </section>


    </body>
    @endsection

