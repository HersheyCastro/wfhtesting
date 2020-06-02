@extends('admin.layouts.master')
@section('title', 'Division')
@section('content')

 

    <div class="row">
        <div class="col-md-12">

 <div class="box box-primary ">
        <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-plus-circle fa-fw"></i>Add New Division</h3>
        </div>
        <div class="box-body">
         {!! Form::open(array('route' => 'admin'.'.division55.store', 'id' => 'form-with-validation')) !!}
            <div class="form-group {{ $errors->has('division_name') ? 'is-invalid' : '' }}">
    {!! Form::label('division_name', 'Division Name', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::text('division_name', old('division_name'), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
        @if ($errors->has('division_name'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('division_name') }}</strong>
            </span>
        @endif
        
</div><div class="form-group {{ $errors->has('color') ? 'is-invalid' : '' }}">
    {!! Form::label('color', 'Color', array('class'=>'control-label')) !!}

          <div class="input-group colorpicker">
                     {!! Form::text('color', old('color'), array('class'=>'form-control','disabled'=> isset($view) ? true : false)) !!}

                      <span class="input-group-addon">
                         <i></i>
                      </span>
          </div>
          @if ($errors->has('color'))
                          <span class="invalid-feedback">
                          <strong>{{ $errors->first('color') }}</strong>
                          </span>
                      @endif
            

</div><div class="form-group {{ $errors->has('created_by') ? 'is-invalid' : '' }}">
    {!! Form::label('created_by', 'Created By', array('class'=>'control-label')) !!}
        <span style="font-weight: 700; color: red">*</span>
        {!! Form::number('created_by', old('created_by'), array('class'=>'form-control','disabled'=> isset($view) ? true : false)) !!}
         @if ($errors->has('created_by'))
                                                 <span class="invalid-feedback">
                                                 <strong>{{ $errors->first('created_by') }}</strong>
                                                 </span>
                                             @endif
        

</div><div class="form-group {{ $errors->has('active') ? 'is-invalid' : '' }}">
    {!! Form::label('active', 'Active', array('class'=>'control-label')) !!}
        <span style="font-weight: 700; color: red">*</span>
        {!! Form::number('active', old('active'), array('class'=>'form-control','disabled'=> isset($view) ? true : false)) !!}
         @if ($errors->has('active'))
                                                 <span class="invalid-feedback">
                                                 <strong>{{ $errors->first('active') }}</strong>
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