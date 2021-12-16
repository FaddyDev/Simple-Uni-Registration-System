@extends('layouts.app')
@section('content')
<section >
  @include('layouts.side')
 </section>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <?php if(isset($success)){//echo $fail;} ?>
    <div class="alert alert-success" style="text-align:center;" role="alert"><span class="glyphicon glyphicon-ok"></span> <?php echo $success; ?> </div>
    <?php } ?>
                <div class="panel panel-success">
                    <div class="panel-heading"><center>Add School</center></div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ URL::to('/add/school')}}">
                            {{ csrf_field() }}

                            <aside id="sidebar">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="Units" class="col-sm-4 control-label">School Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="name" aria-multiline="true" class="form-control" name="schoolname" placeholder="computer science" required>

                                        @if ($errors->has('name'))
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
                                            Add
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
                        <div class="panel-heading">Available Schools</div>
                        <div class="panel-body">
                        
                            <table class="table w3-bordered w3-border w3-table w3-striped" style="font-size: 12px;">
                                <th><span class="glyphicon glyphicon-tasks"></span> id</th>
                                <th><span class="glyphicon glyphicon-edit"></span> Message</th>
                                <th><span class="glyphicon glyphicon-edit"></span> Date Added</th>
                                @foreach($schools as $content)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $content->school  }}</td>
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

