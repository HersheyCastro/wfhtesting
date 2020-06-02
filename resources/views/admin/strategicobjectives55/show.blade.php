@extends('admin.layouts.master')
@section('title', 'Strategic Objectives')
@section('content')



    <div class="row">
        <div class="col-md-12">


    <div class="box box-danger">
        <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list fa-fw"></i>Strategic Objectives</h3>
        </div>
        <div class="box-body">
            {!! Form::model($strategicobjectives55, array('id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('admin'.'.strategicobjectives55.update', encrypt($strategicobjectives55->id)))) !!}

            <div class="form-group {{ $errors->has('strategic_objective_name') ? 'is-invalid' : '' }}">
    {!! Form::label('strategic_objective_name', 'Strategic Objective', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::text('strategic_objective_name', old('strategic_objective_name',$strategicobjectives55->strategic_objective_name), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
        @if ($errors->has('strategic_objective_name'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('strategic_objective_name') }}</strong>
            </span>
        @endif
        
</div><div class="form-group {{ $errors->has('created_by') ? 'is-invalid' : '' }}">
    {!! Form::label('created_by', 'Created By', array('class'=>'control-label')) !!}
        
        {!! Form::number('created_by', old('created_by',$strategicobjectives55->created_by), array('class'=>'form-control','disabled'=> isset($view) ? true : false)) !!}
         @if ($errors->has('created_by'))
                                                 <span class="invalid-feedback">
                                                 <strong>{{ $errors->first('created_by') }}</strong>
                                                 </span>
                                             @endif
        

</div><div class="form-group">
    {!! Form::label('active', 'Active', array('class'=>'control-label')) !!}
            
      <br>  {!! Form::checkbox('active', 1, old('active',$strategicobjectives55->active), array('data-toggle'=>'toggle','disabled'=> isset($view) ? true : false)) !!}
        
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