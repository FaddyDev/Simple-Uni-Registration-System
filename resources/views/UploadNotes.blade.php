@extends('layouts.app')
@section('content')
    <section >
        @include('layouts.side')
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
            <?php if(isset($success)){ ?>
    <div class="alert alert-success" style="text-align:center;" role="alert"><span class="glyphicon glyphicon-ok"></span> <?php echo $success; ?> </div>
    <?php } ?>
                <div class="panel panel-success">
                    <div class="panel-heading">Upload Notes</div>
                    <div class="panel-body">
                    </div>

                    <form class="form-horizontal" role="form" method="POST" action="{{ URL::to('subject/notes')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                     {{--   <aside id="sidebar">--}}
                     {{--    <div class="form-group{{ $errors->has('schoolname') ? ' has-error' : '' }}">--}}
                     {{--    <div class="form-group{{ $errors->has('schoolname') ? ' has-error' : '' }}">--}}
                             {{--     <label for="schoolname" class="col-md-4 control-label">Select School</label>--}}
                             {{--    <div class="col-md-6">--}}
                             {{--     <select class="form-control" name="school_id" required>--}}
                             {{--      <option value="" disabled selected>Belongs to School</option>--}}

                             {{--      @foreach($data as $data)--}}
                             {{--        <option value="{{$data->id}}">{{$data->school}}</option>--}}

                             {{--     @endforeach--}}
                             {{--    </select>--}}
                             {{--     </div>--}}
                             {{--      </div>--}}

                             {{--    </aside> --}}
                        <aside id="sidebar">
                            <div class="form-group{{ $errors->has('schoolname') ? ' has-error' : '' }}">
                                <label for="coursename" class="col-md-4 control-label">Select Course</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="course_id" required>
                                        <option value="" disabled selected>Belongs to Course</option>
                                        <option value="0" selected>All Courses</option>

                                        
                                        @foreach($courses as $data)
                                            <option value="{{$data->id}}">{{$data->course}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                        </aside>
                        <aside id="sidebar">
                            <div class="form-group{{ $errors->has('unitname') ? ' has-error' : '' }}">
                                <label for="Units" class="col-sm-4 control-label">Unit Name</label>

                                <div class="col-md-6">
                                    <input id="unitname" type="text" aria-multiline="true" class="form-control" name="unitname" placeholder="HIV/AIDS" required>

                                    @if ($errors->has('unitname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('Unitname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </aside>
                        <aside id="sidebar">
                        @if($errors->has('uploadnotes'))
    <div class="alert alert-warning" style="text-align:center;" role="alert"><span class="glyphicon glyphicon-warning-sign"></span>The file should be 2MB or less in size</div>
@endif
                            <div class="form-group{{ $errors->has('uploadnotes') ? ' has-error' : '' }}">
                                <label for="Units" class="col-sm-4 control-label">Upload Notes</label>

                                <div class="col-md-6">
                                    <input id="uploadnotes" type="file" aria-multiline="true" class="form-control" name="uploadnotes" placeholder="BBIT" required>

                                    @if ($errors->has('uploadnotes'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('Uploadnotes') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
<script>
$('#uploadnotes').bind('change', function(){
        if(this.files[0].size > 1024*1024*2){
         alert('File exceeds the maximum allowed size of 2MB');
        $(this).val('');
     //return false;
       }else {return true;} 
});
</script>
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


                </div>
            </div>
        </div>
    </div>
    </div>


    <section>
        @include('layouts.footer')
    </section>

@endsection