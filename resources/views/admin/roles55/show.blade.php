@extends('admin.layouts.master')
@section('title', 'Roles')
@section('content')


    <div class="row">
        <div class="col-md-12">


            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-pencil fa-fw"></i>Roles Edit </h3>
                </div>
                <div class="box-body">
                    {!! Form::model($roles55, array('id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('admin'.'.roles55.update', encrypt($roles55->id)))) !!}

                    {{--<div class="form-group {{ $errors->has('iPermission') ? 'is-invalid' : '' }}">--}}
                    {{--{!! Form::label('iPermission', 'Permission', array('class'=>'control-label')) !!}--}}
                    {{--<span style="font-weight: 700; color: red">*</span>--}}
                    {{--{!! Form::text('iPermission', $old_modules55, array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}--}}
                    {{--@if ($errors->has('iPermission'))--}}
                    {{--<span class="invalid-feedback">--}}
                    {{--<strong>{{ $errors->first('iPermission') }}</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}

                    {{--</div>--}}

                    <div class="form-group">
                        {!! Form::label('bActive', 'Active', array('class'=>'control-label')) !!}

                        <br> {!! Form::checkbox('bActive', 1, 1, array('data-toggle'=>'toggle','disabled'=> isset($view) ? true : false)) !!}

                    </div>
                    <div class="form-group {{ $errors->has('sRoleName') ? 'is-invalid' : '' }}">
                        {!! Form::label('sRoleName', 'Role Name', array('class'=>'control-label')) !!}
                        <span style="font-weight: 700; color: red">*</span>
                        {!! Form::text('sRoleName', old('sRoleName',$roles55->sRoleName), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
                        @if ($errors->has('sRoleName'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('sRoleName') }}</strong>
                            </span>
                        @endif

                    </div>
                    <div class="form-group {{ $errors->has('modules55_id') ? 'is-invalid' : '' }}">
                        {!! Form::label('modules55_id[]', 'Permitted Modules', array('class'=>'control-label')) !!}
                        <span style="font-weight: 700; color: red">*</span>
                        {{--<span style="font-weight: 700; color: red">*</span>--}}
                        {{--{!! Form::select('modules55_id[]', $modules55, $old_modules55, array('class'=>'form-control select2', 'width'=>'100', 'multiple'=>'multiple' ,'disabled'=> isset($view) ? true : false)) !!}--}}
                        @if ($errors->has('modules55_id'))
                            <span class="invalid-feedback">
                         <strong>{{ $errors->first('modules55_id') }}</strong>
                         </span>
                        @endif

                    </div>


                    {{--<h5>Permitted Modules</h5>--}}
                    <ul id="sortable1" class="connectedSortable">
                        @foreach($role_modules as $row)

                            <li>
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <i class="fa fa-arrow-right handle"></i><a data-toggle="collapse"
                                                                                       href="#collapse{{$row->modules55_id}}">{{$row->modules55->sModuleName}}</a>
                                            <input name="modules55_id[]" type="hidden"
                                                   value="{{$row->modules55_id}}">
                                        </h4>
                                    </div>
                                    <div id="collapse{{$row->modules55_id}}" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul class="list-unstyled">
                                                @php($i = 0)
                                                @foreach($row->modules55->permissions55 as $key => $row2)
                                                    <li class="access">
                                                        <input type="hidden"
                                                               name="{{'permissions['.$row->modules55_id.'][]'}}"
                                                               value="{{$permissions['permissions'][$row->modules55_id][$key]}}"
                                                               class="permissions_hid">
                                                        <input type="checkbox"
                                                               value="{{$permissions['permissions'][$row->modules55_id][$key]}}"
                                                               {{($permissions['permissions'][$row->modules55_id][$key])? 'checked' : ''}}
                                                               class="permissions"> {{$row2->permissions55->sPermissionName}}

                                                        {{--<input type="hidden"--}}
                                                        {{--name="{{'permissions['.$row->modules55_id.'][]'}}"--}}
                                                        {{--value="{{$permissions['permissions'][$row->modules55_id][$row2->iBitIndex]}}"--}}
                                                        {{--class="permissions_hid">--}}
                                                        {{--<input type="checkbox"--}}
                                                        {{--value="{{$permissions['permissions'][$row->modules55_id][$row2->iBitIndex]}}"--}}
                                                        {{--{{($permissions['permissions'][$row->modules55_id][$row2->iBitIndex])? 'checked' : ''}}--}}
                                                        {{--class="permissions"> {{$row2->permissions55->sPermissionName}}--}}
                                                    </li>
                                                    @php($i++)
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        @endforeach
                    </ul>

                    {{--<h5>Available Modules</h5>--}}
                    <ul id="sortable2" class="connectedSortable">
                        @foreach($modules as $row)
                            <li>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <i class="fa fa-lock handle"></i><a data-toggle="collapse" class="disabled"
                                                                                href="#collapse{{$row->id}}">{{$row->sModuleName}}</a>
                                            <input name="modules[]" type="hidden" value="{{$row->id}}">
                                        </h4>
                                    </div>
                                    <div id="collapse{{$row->id}}" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul class="list-unstyled">
                                                @foreach($row->permissions55 as $row2)
                                                    <li class="access">
                                                        <input type="hidden" name="{{'permissions['.$row->id.'][]'}}"
                                                               value="1"
                                                               class="permissions_hid">
                                                        <input type="checkbox" value="1" checked
                                                               class=""> {{$row2->permissions55->sPermissionName}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>


                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-12">
                            @if(!isset($view)){!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}@endif
                            {!! link_to_route('admin'.'.roles55.index', 'Cancel', null, array('class' => 'btn btn-default')) !!}
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
    <script>
        $(function () {
            $("#sortable1, #sortable2").disableSelection();
        });

        $(document).ready(function () {

            $('.permissions').iCheck('disable');


            $(document).on('ifChanged', '.permissions', function () {
                var checked = $(this).is(":checked");
                if (checked) {
                    $(this).closest('li').find('.permissions_hid').val(1);
                } else {
                    $(this).closest('li').find('.permissions_hid').val(0);
                }
            });

        });
    </script>

@endsection