@extends('admin.layouts.master')
@section('title', 'Files')
@section('content')



    <div class="row">
        <div class="col-md-12">


    <div class="box box-danger">
        <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list fa-fw"></i>Files</h3>
        </div>
        <div class="box-body">
            {!! Form::model($files55, array('id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('admin'.'.files55.update', encrypt($files55->id)))) !!}

            <div class="form-group {{ $errors->has('filename') ? 'is-invalid' : '' }}">
    {!! Form::label('filename', 'File Name', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::text('filename', old('filename',$files55->filename), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
        @if ($errors->has('filename'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('filename') }}</strong>
            </span>
        @endif
        
</div><div class="form-group {{ $errors->has('description') ? 'is-invalid' : '' }}">
    {!! Form::label('description', 'File Description', array('class'=>'control-label')) !!}
            
        {!! Form::textarea('description', old('description',$files55->description), array('class'=>'form-control mceEditor','disabled'=> isset($view) ? true : false))  !!}
          @if ($errors->has('description'))
                <span class="invalid-feedback">
                <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        
</div><div class="form-group {{ $errors->has('link') ? 'is-invalid' : '' }}">
    {!! Form::label('link', 'File link', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::text('link', old('link',$files55->link), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
        @if ($errors->has('link'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('link') }}</strong>
            </span>
        @endif
        
</div><div class="form-group {{ $errors->has('file') ? 'is-invalid' : '' }}">
    {!! Form::label('file', 'File', array('class'=>'control-label')) !!}
            
        {!! Form::text('file', old('file',$files55->file), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
        @if ($errors->has('file'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('file') }}</strong>
            </span>
        @endif
        
</div><div class="form-group {{ $errors->has('tasks55_id') ? 'is-invalid' : '' }}">
    {!! Form::label('tasks55_id', 'Task', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::select('tasks55_id', $tasks55, old('tasks55_id',$files55->tasks55_id), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> isset($view) ? true : false)) !!}
        @if ($errors->has('tasks55_id'))
                         <span class="invalid-feedback">
                         <strong>{{ $errors->first('tasks55_id') }}</strong>
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