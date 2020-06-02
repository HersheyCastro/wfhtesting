@extends('admin.layouts.master')
@section('title', 'Permissions')
@section('content')



    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary ">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-plus-circle fa-fw"></i>Add New Permissions</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(array('route' => 'admin'.'.permissions55.store', 'id' => 'form-with-validation')) !!}
                    <div class="form-group {{ $errors->has('sPermissionName') ? 'is-invalid' : '' }}">
                        {!! Form::label('sPermissionName', 'Permission Name', array('class'=>'control-label')) !!}
                        <span style="font-weight: 700; color: red">*</span>
                        {!! Form::text('sPermissionName', old('sPermissionName'), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
                        @if ($errors->has('sPermissionName'))
                            <span class="invalid-feedback">
            <strong>{{ $errors->first('sPermissionName') }}</strong>
            </span>
                        @endif

                    </div>
                    <div class="form-group {{ $errors->has('sPermissionCode') ? 'is-invalid' : '' }}">
                        {!! Form::label('sPermissionCode', 'Code', array('class'=>'control-label')) !!}
                        <span style="font-weight: 700; color: red">*</span>
                        {!! Form::text('sPermissionCode', old('sPermissionCode'), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
                        @if ($errors->has('sPermissionCode'))
                            <span class="invalid-feedback">
            <strong>{{ $errors->first('sPermissionCode') }}</strong>
            </span>
                        @endif

                    </div>
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::submit( 'Create' , array('class' => 'btn btn-primary')) !!}
                            {!! link_to_route('admin'.'.permissions55.index', 'Cancel', null, array('class' => 'btn btn-default')) !!}
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
            mode: "textareas",
            editor_selector: "mceEditor",
            editor_deselector: "mceNoEditor"
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