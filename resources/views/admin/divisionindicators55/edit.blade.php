@extends('admin.layouts.master')
@section('title', 'Division Indicators')
@section('content')


    <div class="row">
        <div class="col-md-12">


    <div class="box box-warning">
        <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-pencil fa-fw"></i>Division Indicators Edit</h3>
        </div>
        <div class="box-body">
            {!! Form::model($divisionindicators55, array('id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('admin'.'.divisionindicators55.update', encrypt($divisionindicators55->id)))) !!}

            <div class="form-group {{ $errors->has('successindicators55_id') ? 'is-invalid' : '' }}">
    {!! Form::label('successindicators55_id', 'Success Indicator', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::select('successindicators55_id', $successindicators55, old('successindicators55_id',$divisionindicators55->successindicators55_id), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> isset($view) ? true : false)) !!}
        @if ($errors->has('successindicators55_id'))
                         <span class="invalid-feedback">
                         <strong>{{ $errors->first('successindicators55_id') }}</strong>
                         </span>
                     @endif
        
</div><div class="form-group {{ $errors->has('division55_id') ? 'is-invalid' : '' }}">
    {!! Form::label('division55_id', 'Division', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::select('division55_id', $division55, old('division55_id',$divisionindicators55->division55_id), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> isset($view) ? true : false)) !!}
        @if ($errors->has('division55_id'))
                         <span class="invalid-feedback">
                         <strong>{{ $errors->first('division55_id') }}</strong>
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