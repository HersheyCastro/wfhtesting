@extends('admin.layouts.master')
@section('title', 'Targets')
@section('content')



    <div class="row">
        <div class="col-md-12">


    <div class="box box-danger">
        <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list fa-fw"></i>Targets</h3>
        </div>
        <div class="box-body">
            {!! Form::model($targets55, array('id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('admin'.'.targets55.update', encrypt($targets55->id)))) !!}

            <div class="form-group {{ $errors->has('name') ? 'is-invalid' : '' }}">
    {!! Form::label('name', 'Name', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::text('name', old('name',$targets55->name), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
        @if ($errors->has('name'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        
</div><div class="form-group {{ $errors->has('description') ? 'is-invalid' : '' }}">
    {!! Form::label('description', 'Description', array('class'=>'control-label')) !!}
            
        {!! Form::text('description', old('description',$targets55->description), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
        @if ($errors->has('description'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
        
</div><div class="form-group {{ $errors->has('users55_id') ? 'is-invalid' : '' }}">
    {!! Form::label('users55_id', 'User', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::select('users55_id', $users55, old('users55_id',$targets55->users55_id), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> isset($view) ? true : false)) !!}
        @if ($errors->has('users55_id'))
                         <span class="invalid-feedback">
                         <strong>{{ $errors->first('users55_id') }}</strong>
                         </span>
                     @endif
        
</div><div class="form-group {{ $errors->has('duration') ? 'is-invalid' : '' }}">
    {!! Form::label('duration', 'Duration', array('class'=>'control-label')) !!}
<span style="font-weight: 700; color: red">*</span>
        <div class="input-group date">

             {!! Form::text('duration', date('m/d/Y h:m:s A', strtotime($targets55->duration_s)).' - '.date('m/d/Y h:m:s A', strtotime($targets55->duration_e)), array('class'=>'form-control pull-right daterange','disabled'=> isset($view) ? true : false)) !!}
              <span class="input-group-addon">
                         <i class="fa fa-calendar"></i>
                         </span>


        </div>
        @if ($errors->has('duration'))
                        <span class="invalid-feedback">
                        <strong>{{ $errors->first('duration') }}</strong>
                        </span>
                    @endif
    

</div>

<div class="form-group {{ $errors->has('percent') ? 'is-invalid' : '' }}">
    {!! Form::label('percent', 'Percent', array('class'=>'control-label')) !!}
    
        {!! Form::number('percent', old('percent',$targets55->percent), array('step'=>'any', 'class'=>'form-control','disabled'=> isset($view) ? true : false)) !!}
         @if ($errors->has('percent'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('percent') }}</strong>
                                </span>
                            @endif
        

</div><div class="form-group {{ $errors->has('created_by') ? 'is-invalid' : '' }}">
    {!! Form::label('created_by', 'Created By', array('class'=>'control-label')) !!}
        
        {!! Form::number('created_by', old('created_by',$targets55->created_by), array('class'=>'form-control','disabled'=> isset($view) ? true : false)) !!}
         @if ($errors->has('created_by'))
                                                 <span class="invalid-feedback">
                                                 <strong>{{ $errors->first('created_by') }}</strong>
                                                 </span>
                                             @endif
        

</div><div class="form-group">
    {!! Form::label('active', 'Active', array('class'=>'control-label')) !!}
            
      <br>  {!! Form::checkbox('active', 1, old('active',$targets55->active), array('data-toggle'=>'toggle','disabled'=> isset($view) ? true : false)) !!}
        
</div><div class="form-group {{ $errors->has('successindicators55_id') ? 'is-invalid' : '' }}">
    {!! Form::label('successindicators55_id', 'Success Indicator', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::select('successindicators55_id', $successindicators55, old('successindicators55_id',$targets55->successindicators55_id), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> isset($view) ? true : false)) !!}
        @if ($errors->has('successindicators55_id'))
                         <span class="invalid-feedback">
                         <strong>{{ $errors->first('successindicators55_id') }}</strong>
                         </span>
                     @endif
        
</div><div class="form-group {{ $errors->has('ipcr55_id') ? 'is-invalid' : '' }}">
    {!! Form::label('ipcr55_id', 'IPCR', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::select('ipcr55_id', $ipcr55, old('ipcr55_id',$targets55->ipcr55_id), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> isset($view) ? true : false)) !!}
        @if ($errors->has('ipcr55_id'))
                         <span class="invalid-feedback">
                         <strong>{{ $errors->first('ipcr55_id') }}</strong>
                         </span>
                     @endif
        
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