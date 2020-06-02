@extends('admin.layouts.master')
@section('title', 'Roles')
@section('content')



    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary ">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-plus-circle fa-fw"></i>Add New Roles</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(array('route' => 'admin'.'.roles55.store', 'id' => 'form-with-validation')) !!}

                    {{--<div class="form-group {{ $errors->has('iPermission') ? 'is-invalid' : '' }}">--}}
                    {{--{!! Form::label('iPermission', 'Permission', array('class'=>'control-label')) !!}--}}
                    {{--<span style="font-weight: 700; color: red">*</span>--}}
                    {{--{!! Form::text('iPermission', old('iPermission'), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}--}}
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
                        {!! Form::text('sRoleName', old('sRoleName'), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
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
                                            <input name="modules55_id[]" type="hidden" value="{{$row->modules55_id}}">
                                        </h4>
                                    </div>
                                    <div id="collapse{{$row->modules55_id}}" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul class="list-unstyled">
                                                @foreach($row->modules55->permissions55 as $row2)
                                                    <li class="access">
                                                        <input type="hidden"
                                                               name="{{'permissions['.$row->modules55_id.'][]'}}"
                                                               class="permissions_hid" value="1">
                                                        <input type="checkbox" value="1" checked
                                                               class="permissions"> {{$row2->permissions55->sPermissionName}}
                                                    </li>
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
                                                               class="permissions_hid" value="1">
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
                            {!! Form::submit( 'Create' , array('class' => 'btn btn-primary')) !!}
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
            $("#sortable1, #sortable2").sortable({
                connectWith: ".connectedSortable",
                receive: function (event, ui) {

                    if (ui.sender[0].id == 'sortable2') {
                        $(this).find(".panel").removeClass('panel-default').addClass('panel-primary');
                        $(this).find("i").removeClass('fa-lock').addClass('fa-arrow-right');
                        $(this).find("a").removeClass('disabled');
                        $(this).find(".panel").find("a").not('.collapsed').click();

                        $(this).find(".panel").find('input:hidden').not('.permissions_hid').not('input:checkbox').attr('name', 'modules55_id[]');
//                        $(this).find(".collapse").find('.panel-body').find('ul').find('li').find('input:hidden').not('permissions_hid').attr('name', 'modules55_id[]');
                        $(this).find(".collapse").find('.panel-body').find('ul').find('li').find('input:checkbox').addClass('permissions');

                    } else {
                        $(this).find(".panel").removeClass('panel-primary').addClass('panel-default');
                        $(this).find("i").removeClass('fa-arrow-right').addClass('fa-lock');
                        $(this).find("a").addClass('disabled');
                        $(this).find(".collapse").removeClass('in');
                        $(this).find(".panel").find('input:hidden').not('.permissions_hid').not('input:checkbox').attr('name', 'modules[]');
//                        $(this).find(".collapse").find('.panel-body').find('ul').find('li').find('input:hidden').not('permissions_hid').attr('name', 'modules[]');
                        $(this).find(".collapse").find('.panel-body').find('ul').find('li').find('input:checkbox').removeClass('permissions');
                    }

                }

            }).disableSelection();
        });

        $(document).ready(function () {

            $('.permissions').prop('checked', true);
            $('.permissions_hid').val(1);


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