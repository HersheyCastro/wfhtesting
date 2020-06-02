@extends('admin.layouts.master')
@section('title', 'Success Indicators')
@section('content')



    <div class="row">
        <div class="col-md-12">


    <div class="box box-danger">
        <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list fa-fw"></i>Success Indicators</h3>
        </div>
        <div class="box-body">
            {!! Form::model($successindicators55, array('id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('admin'.'.successindicators55.update', encrypt($successindicators55->id)))) !!}

            <div class="form-group {{ $errors->has('success_indicator_name') ? 'is-invalid' : '' }}">
    {!! Form::label('success_indicator_name', 'Success Indicator', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::text('success_indicator_name', old('success_indicator_name',$successindicators55->success_indicator_name), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
        @if ($errors->has('success_indicator_name'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('success_indicator_name') }}</strong>
            </span>
        @endif
        
</div><div class="form-group {{ $errors->has('strategicobjectives55_id') ? 'is-invalid' : '' }}">
    {!! Form::label('strategicobjectives55_id', 'Strategic Objective', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::select('strategicobjectives55_id', $strategicobjectives55, old('strategicobjectives55_id',$successindicators55->strategicobjectives55_id), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> isset($view) ? true : false)) !!}
        @if ($errors->has('strategicobjectives55_id'))
                         <span class="invalid-feedback">
                         <strong>{{ $errors->first('strategicobjectives55_id') }}</strong>
                         </span>
                     @endif
        
</div><div class="form-group {{ $errors->has('created_by') ? 'is-invalid' : '' }}">
    {!! Form::label('created_by', 'Created By', array('class'=>'control-label')) !!}
        
        {!! Form::number('created_by', old('created_by',$successindicators55->created_by), array('class'=>'form-control','disabled'=> isset($view) ? true : false)) !!}
         @if ($errors->has('created_by'))
                                                 <span class="invalid-feedback">
                                                 <strong>{{ $errors->first('created_by') }}</strong>
                                                 </span>
                                             @endif
        

</div><div class="form-group">
    {!! Form::label('active', 'Active', array('class'=>'control-label')) !!}
            
      <br>  {!! Form::checkbox('active', 1, old('active',$successindicators55->active), array('data-toggle'=>'toggle','disabled'=> isset($view) ? true : false)) !!}
        
</div>
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-md-12">
                     @if(!isset($view)){!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}@endif
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
        editor_deselector : "mceNoEditor"
        plugins: "code image table preview",
        @if(isset($view))
        ,readonly : 1
        @endif
    });
</script>


@endsection