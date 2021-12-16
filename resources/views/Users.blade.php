@extends('layouts.app')

@section('content')

<script>
//Limiting input to integers only
function numbersonly(e){
    var unicode=e.charCode? e.charCode : e.keyCode
    if (unicode!=8 & unicode!=46 & unicode!=37 & unicode!=39 ){ //if the key isn't the backspace,delete,left and right arrow keys (which we should allow)
        if (unicode<48||unicode>57) //if not a number
            return false //disable key press
    }
}
</script>

    <div class="modal-body row">

        <div class="col-md-12 ">

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><center>Student Registeration</center></div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ URL::to('/register/user')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-6 ">
                                <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                                    <label for="Units" class="col-sm-4 control-label">Full Name</label>

                                    <div class="col-md-6">
                                        <input id="fullname" type="text" aria-multiline="true" class="form-control"
                                               name="fullname" placeholder="" required>

                                        @if ($errors->has('fullname'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                                    <label for="Units" class="col-sm-4 control-label">Phone Number</label>

                                    <div class="col-md-6">
                                        <input id="phonenumber" type="text" aria-multiline="true" class="form-control"
                                               name="phonenumber" placeholder="" onKeyPress="return numbersonly(event)" required>

                                        @if ($errors->has('phonenumber'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('id_no') ? ' has-error' : '' }}">
                                    <label for="Units" class="col-sm-4 control-label">National ID</label>

                                    <div class="col-md-6">
                                        <input id="id_no" type="text" aria-multiline="true" class="form-control"
                                               name="id_no" placeholder="" onKeyPress="return numbersonly(event)" required>

                                        @if ($errors->has('id_no'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('id_no') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="Units" class="col-sm-4 control-label">Address</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text" aria-multiline="true" class="form-control"
                                               name="address" placeholder="" required>

                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                    <label for="Units" class="col-sm-4 control-label">Upload Photo</label>

                                    <div class="col-md-6">
                                        <input id="photo" type="file" aria-multiline="true" class="form-control"
                                               name="photo" placeholder="" required>

                                        @if ($errors->has('photo'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
<script>
$('#photo').bind('change', function(){
    var ext = this.value.substr(this.value.lastIndexOf('.'));
    var lext = ext.toLowerCase();
    switch(lext)
    {
        case '.jpg':
        case '.jpeg':
        case '.png':
        if(this.files[0].size > 1024*1024*2){
         alert('File exceeds the maximum allowed size of 2MB');
        $(this).val('');
     //return false;
       }else {return true;}       
        break;
        default:
        alert('Unsuported File. Images Only!');
        this.value = ''; //Remove the value;
    }  
});
</script>

                                <div class="form-group{{ $errors->has('birth') ? ' has-error' : '' }}">
                                    <label for="Units" class="col-sm-4 control-label">Upload Birth Certificate</label>

                                    <div class="col-md-6">
                                        <input id="birth" type="file" aria-multiline="true" class="form-control"
                                               name="birth" placeholder="" required>

                                        @if ($errors->has('birth'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('birth') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
<script>
$('#birth').bind('change', function(){
        if(this.files[0].size > 1024*1024*2){
         alert('File exceeds the maximum allowed size of 2MB');
        $(this).val('');
     //return false;
       }else {return true;} 
});
</script>

                                <div class="form-group{{ $errors->has('result') ? ' has-error' : '' }}">
                                    <label for="Units" class="col-sm-4 control-label">Upload Result Certificate</label>

                                    <div class="col-md-6">
                                        <input id="result" type="file" aria-multiline="true" class="form-control"
                                               name="result" placeholder="" required>

                                        @if ($errors->has('result'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('result') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
<script>
$('#result').bind('change', function(){
        if(this.files[0].size > 1024*1024*2){
         alert('File exceeds the maximum allowed size of 2MB');
        $(this).val('');
     //return false;
       }else {return true;} 
});
</script>

                                <div class="form-group{{ $errors->has('national') ? ' has-error' : '' }}">
                                    <label for="Units" class="col-sm-4 control-label">Upload National ID</label>

                                    <div class="col-md-6">
                                        <input id="national" type="file" aria-multiline="true" class="form-control"
                                               name="national" placeholder="Upload National ID" required>

                                        @if ($errors->has('national'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('national') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
<script>
$('#national').bind('change', function(){
        if(this.files[0].size > 1024*1024*2){
         alert('File exceeds the maximum allowed size of 2MB');
        $(this).val('');
     //return false;
       }else {return true;} 
});
</script>

                            </div>


                            <div class="col-md-6  ">

                                {{--go on--}}
                                <div class="form-group{{ $errors->has('parentfullname') ? ' has-error' : '' }}">
                                    <label for="parentfullname" class="col-sm-4 control-label">Parents Full Name</label>

                                    <div class="col-md-6">
                                        <input id="parentfullname" type="text" aria-multiline="true" class="form-control"
                                               name="parentfullname" placeholder="" required>

                                        @if ($errors->has('parentfullname'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('parentfullname') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('parentphonenumber') ? ' has-error' : '' }}">
                                    <label for="parentphonenumber" class="col-sm-4 control-label">Parents Phone Number</label>

                                    <div class="col-md-6">
                                        <input id="parentphonenumber" type="text" onKeyPress="return numbersonly(event)" aria-multiline="true" class="form-control"
                                               name="parentphonenumber" placeholder="" required>

                                        @if ($errors->has('parentphonenumber'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('parentphonenumber') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('parentid_no') ? ' has-error' : '' }}">
                                    <label for="parentid_no" class="col-sm-4 control-label">Parents National ID</label>

                                    <div class="col-md-6">
                                        <input id="parentid_no" type="text" aria-multiline="true" class="form-control"
                                               name="parentid_no" placeholder="" onKeyPress="return numbersonly(event)" required>

                                        @if ($errors->has('parentid_no'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('parentid_no') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('highschool') ? ' has-error' : '' }}">
                                    <label for="Units" class="col-sm-4 control-label">Highschool Attended</label>

                                    <div class="col-md-6">
                                        <input id="highschool" type="text" aria-multiline="true" class="form-control"
                                               name="highschool" placeholder="" required>

                                        @if ($errors->has('highschool'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('highschool') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('indexnumber') ? ' has-error' : '' }}">
                                    <label for="Units" class="col-sm-4 control-label"> Index Number</label>

                                    <div class="col-md-6">
                                        <input id="indexnumber" type="text" aria-multiline="true" class="form-control"
                                               name="index_number" placeholder="" onKeyPress="return numbersonly(event)" required>

                                        @if ($errors->has('indexnumber'))
                                            <span class="help-block">
                            <strong>{{ $errors->first('indexnumber') }}</strong>
                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('pointsattained') ? ' has-error' : '' }}">
                                    <label for="Units" class="col-sm-4 control-label">Points Attained</label>

                                    <div class="col-md-6">
                                        <input id="pointsattained" type="number" aria-multiline="true"
                                               class="form-control" name="pointsattained" placeholder="45" required>

                                        @if ($errors->has('pointsattained'))
                                            <span class="help-block">
                            <strong>{{ $errors->first('pointsattained') }}</strong>
                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('course_id') ? ' has-error' : '' }}">
                                    <label for="course_id" class="col-md-4 control-label">Select Course</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="course_id" required>
                                            <option value="" disabled selected>--select--</option>

                                            @foreach($data as $data)
                                                <option value="{{$data->id}}">{{$data->course}}</option>

                                            @endforeach


                                        </select>
                                    </div>
                                </div>

                                {{--course_id--}}

                                {{--go on--}}
                                <center>
                                    <div class="row">
                                        <input type="submit" class="btn btn-success" name="send" value="Send">
                                    </div>

                                </center>
                        </form>
                    </div>
                </div>
                <section class="container">
                    @include('layouts.footer')
                </section>

            </div>
        </div>
    </div>
@endsection
