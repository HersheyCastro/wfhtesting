@extends('admin.layouts.master')
@section('title', 'Users')
@section('content')

 

    <div class="row">
        <div class="col-md-12">

 <div class="box box-primary ">
        <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-plus-circle fa-fw"></i>Add New Users</h3>
        </div>
        <div class="box-body">
         {!! Form::open(array('route' => 'admin'.'.users55.store', 'id' => 'form-with-validation')) !!}
            <div class="form-group {{ $errors->has('name') ? 'is-invalid' : '' }}">
    {!! Form::label('name', 'Name', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::text('name', old('name'), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
        @if ($errors->has('name'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        
</div><div class="form-group {{ $errors->has('email') ? 'is-invalid' : '' }}">
    {!! Form::label('email', 'Email', array('class'=>'control-label')) !!}
    <span style="font-weight: 700; color: red">*</span>
        {!! Form::email('email', old('email'), array('class'=>'form-control','disabled'=> isset($view) ? true : false)) !!}
         @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
        


</div><div class="form-group {{ $errors->has('password') ? 'is-invalid' : '' }}">
    {!! Form::label('password', 'Password', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::password('password', array('class'=>'form-control','disabled'=> isset($view) ? true : false)) !!}
               @if ($errors->has('password'))
                 <span class="invalid-feedback">
                 <strong>{{ $errors->first('password') }}</strong>
                 </span>
             @endif
        
</div>
<div class="form-group {{ $errors->has('password-confirm') ? 'is-invalid' : '' }}">
    {!! Form::label('password-confirm', 'Confirm Password', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::password('password-confirm', array('class'=>'form-control','disabled'=> isset($view) ? true : false)) !!}
               @if ($errors->has('password-confirm'))
                 <span class="invalid-feedback">
                 <strong>{{ $errors->first('password-confirm') }}</strong>
                 </span>
             @endif
        
</div><div class="form-group {{ $errors->has('roles55_id') ? 'is-invalid' : '' }}">
    {!! Form::label('roles55_id', 'Role', array('class'=>'control-label')) !!}
            
        {!! Form::select('roles55_id', $roles55, old('roles55_id'), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> isset($view) ? true : false)) !!}
        @if ($errors->has('roles55_id'))
                         <span class="invalid-feedback">
                         <strong>{{ $errors->first('roles55_id') }}</strong>
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