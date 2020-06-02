@extends('admin.layouts.master')
@section('title', 'Tasks Users')
@section('content')

 

    <div class="row">
        <div class="col-md-12">

 <div class="box box-primary ">
        <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-plus-circle fa-fw"></i>Add New Tasks Users</h3>
        </div>
        <div class="box-body">
         {!! Form::open(array('route' => 'admin'.'.tasksusers55.store', 'id' => 'form-with-validation')) !!}
            <div class="form-group {{ $errors->has('tasks55_id') ? 'is-invalid' : '' }}">
    {!! Form::label('tasks55_id', 'Task', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::select('tasks55_id', $tasks55, old('tasks55_id'), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> isset($view) ? true : false)) !!}
        @if ($errors->has('tasks55_id'))
                         <span class="invalid-feedback">
                         <strong>{{ $errors->first('tasks55_id') }}</strong>
                         </span>
                     @endif
        
</div><div class="form-group {{ $errors->has('users55_id') ? 'is-invalid' : '' }}">
    {!! Form::label('users55_id', 'User', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::select('users55_id', $users55, old('users55_id'), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> isset($view) ? true : false)) !!}
        @if ($errors->has('users55_id'))
                         <span class="invalid-feedback">
                         <strong>{{ $errors->first('users55_id') }}</strong>
                         </span>
                     @endif
        
</div>
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-md-12">
                  {!! Form::submit( 'Create' , array('class' => 'btn btn-primary')) !!}
                    <a href="{{URL::previous()}}" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    </div>
            </div>
@endsection

@section('javascript')
<script src="{{asset('adminlte/plugins/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript">
    tinymce.init({
        mode : "textareas",
        editor_selector : "mceEditor",
        plugins: "code image table preview",
        editor_deselector : "mceNoEditor"
    });
</script>
<script>
    @if ($errors->count() > 0)
             toastr.warning("Oops!", "Invalid or incomplete data-entry", {
                closeButton: true,
                positionClass: 'toast-bottom-right'
            });
    @endif
</script>
@endsection