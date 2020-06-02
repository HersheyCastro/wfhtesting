@extends('admin.layouts.master')
@section('title', 'Permissions')
@section('content')



    <div class="row">
        <div class="col-md-12">


            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-list fa-fw"></i>Permissions</h3>
                </div>
                <div class="box-body">
                    {!! Form::model($permissions55, array('id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('admin'.'.permissions55.update', encrypt($permissions55->id)))) !!}

                    <div class="form-group {{ $errors->has('sPermissionName') ? 'is-invalid' : '' }}">
                        {!! Form::label('sPermissionName', 'Permission Name', array('class'=>'control-label')) !!}
                        <span style="font-weight: 700; color: red">*</span>
                        {!! Form::text('sPermissionName', old('sPermissionName',$permissions55->sPermissionName), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
                        @if ($errors->has('sPermissionName'))
                            <span class="invalid-feedback">
            <strong>{{ $errors->first('sPermissionName') }}</strong>
            </span>
                        @endif

                    </div>
                    <div class="form-group {{ $errors->has('sPermissionCode') ? 'is-invalid' : '' }}">
                        {!! Form::label('sPermissionCode', 'Code', array('class'=>'control-label')) !!}
                        <span style="font-weight: 700; color: red">*</span>
                        {!! Form::text('sPermissionCode', old('sPermissionCode',$permissions55->sPermissionCode), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
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
                            @if(!isset($view)){!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}@endif
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

            @if(isset($view))
            , readonly: 1
            @endif
        });
    </script>


@endsection