@extends('admin.layouts.master')
@section('title', 'Modules')
@section('content')


    <div class="row">
        <div class="col-md-12">


            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-puzzle-piece fa-fw"></i>Modules</h3>
                </div>
                <div class="box-body">

                    <table class="table table-striped table-hover table-responsive table-bordered"
                           id="Modules55DataTable" width="100%">
                        <thead>
                        <tr>
                            <th class="all">
                                {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                            </th>
                            <th>Module Name</th>
                            <th>Code</th>
                            <th>Table</th>
                            <th>Access</th>

                            <th class="all">
                                <div class="btn-group tools">
                                    @if(Guard::allows('modules55_create'))
                                        <button action="form" type="button"
                                                onclick="location.href ='{{ route('admin'.'.modules55.create') }}'"
                                                class="btn btn-default btn-sm fa fa-plus"></button>
                                    @endif
                                    <div class="btn-group">
                                        <button class="btn dropdown-toggle btn-default btn-sm fa fa-bars"
                                                data-toggle="dropdown" aria-expanded="false"></button>
                                        <ul class="dropdown-menu pull-right ColumnToggle" role="menu">
                                            <li action="form" data-column="1" class="toggle-vis Checked"><a
                                                        href="javascript:void(0)"><i class="fa fa-check"></i>Module Name</a>
                                            </li>
                                            <li action="form" data-column="2" class="toggle-vis Checked"><a
                                                        href="javascript:void(0)"><i class="fa fa-check"></i>Code</a>
                                            </li>
                                            <li action="form" data-column="3" class="toggle-vis Checked"><a
                                                        href="javascript:void(0)"><i class="fa fa-check"></i>Table</a>
                                            </li>
                                            <li action="form" data-column="4" class="toggle-vis Checked"><a
                                                        href="javascript:void(0)"><i class="fa fa-check"></i>Access</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($modules55 as $row)
                            <tr>
                                <td>
                                    {!! Form::checkbox('del-'.encrypt($row->id),1,false,['class' => 'single','data-id'=> encrypt($row->id)]) !!}
                                </td>
                                <td>{{ $row->sModuleName }}</td>
                                <td>{{ $row->sModuleCode }}</td>
                                <td>{{ $row->sTable }}</td>
                                <td> @forelse($row->permissions55 as $key) <span
                                            class="label label-primary">{{$key->permissions55->sPermissionName}}</span> @empty
                                        Empty @endforelse </td>
                                <td>

                                    <div class="btn-group tools">
                                        @if(Guard::allows('modules55_view'))
                                            <button type="button"
                                                    onclick="location.href ='{{route('admin'.'.modules55.show', array(encrypt($row->id))) }}'"
                                                    class="btn btn-default btn-sm fa fa-search"></button>
                                        @endif
                                        @if(Guard::allows('modules55_edit') || Guard::allows('modules55_delete'))
                                            <div class="btn-group">
                                                <button class="btn dropdown-toggle btn-default btn-sm fa fa-bars"
                                                        data-toggle="dropdown"></button>
                                                <ul class="dropdown-menu pull-right" role="menu">
                                                    @if(Guard::allows('modules55_edit'))
                                                        <li action="form"><a
                                                                    href="{{route('admin'.'.modules55.edit', array(encrypt($row->id))) }}"><i
                                                                        class="fa fa-pencil-square-o"></i>Edit</a></li>
                                                    @endif
                                                    @if(Guard::allows('modules55_delete'))
                                                        <li action="delete"><a href="#" data-toggle="modal"
                                                                               id="{{encrypt($row->id)}}"
                                                                               data-route="{{route('admin'.'.modules55.destroy', encrypt($row->id))}}"
                                                                               data-target="#mDelete">
                                                                <i class="fa fa-minus"></i>Delete</a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        @endif
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-xs-12">
                            @if(Guard::allows('modules55_delete'))
                                <button class="btn btn-danger" id="delete">Delete checked</button>
                            @endif
                        </div>
                    </div>
                    {!! Form::open(['route' => 'admin'.'.modules55.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                    <input type="hidden" id="send" name="toDelete">
                    {!! Form::close() !!}
                </div>
            </div>
            <div id="eModalContainer">
                <div class="modal fade" id="mDelete">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            {!! Form::open(array('method' => 'DELETE', 'id' => 'deleteEntry')) !!}

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Delete</h4>
                            </div>
                            <div class="modal-body">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <p id="deleteMessage"></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            @if (Session::has('message'))
            toastr.success("Successful", "{{Session::get('message')}}", {
                closeButton: true,
                positionClass: 'toast-bottom-right'
            });
            @elseif(Session::has('created'))
            toastr.success("Successful", "{{Session::get('created')}}", {
                closeButton: true,
                positionClass: 'toast-bottom-right',
            });
            @elseif(Session::has('updated'))
            toastr.success("Successful", "{{Session::get('updated')}}", {
                closeButton: true,
                positionClass: 'toast-bottom-right',
            });
            @elseif(Session::has('deleted'))
            toastr.success("Successful", "{{Session::get('deleted')}}", {
                closeButton: true,
                positionClass: 'toast-bottom-right',
            });
            @elseif ($errors->count() > 0)
            toastr.warning("Oops!", "There was an error occured", {
                closeButton: true,
                positionClass: 'toast-bottom-right'
            });
            @endif
            $('#delete').click(function () {
                alertify.confirm("Are you sure you want to delete these items?", function () {
                    var send = $('#send');
                    var mass = $('.mass').is(":checked");
                    if (mass == true) {
                        send.val('mass');
                    } else {
                        var toDelete = [];
                        $('.single').each(function () {
                            if ($(this).is(":checked")) {
                                toDelete.push($(this).data('id'));
                            }
                        });
                        send.val(JSON.stringify(toDelete));
                    }
                    $('#massDelete').submit();
                }, function () {
                });
            });
            var table = $('#Modules55DataTable').DataTable(
                {
                    "columnDefs": [{
                        "width": "30px",
                        "targets": 0,
                        "searchable": false,
                        "orderable": false,
                        "visible": true
                    }, {"targets": 1, "searchable": true, "orderable": true, "visible": true}, {
                        "targets": 2,
                        "searchable": true,
                        "orderable": true,
                        "visible": true
                    }, {"targets": 3, "searchable": true, "orderable": true, "visible": true}, {
                        "targets": 4,
                        "searchable": true,
                        "orderable": true,
                        "visible": true
                    }, {"targets": 5, "searchable": false, "orderable": false, "visible": true}],
                    "responsive": true,
                    "autoWidth": true
                }
            );
            $('.toggle-vis').on('click', function (e) {
                e.preventDefault();

                // Get the column API object
                var column = table.column($(this).attr('data-column'));

                // Toggle the visibility
                column.visible(!column.visible());


                if (!column.visible() == true) {
                    $(this).removeClass('Checked');
                } else {
                    $(this).addClass('Checked');
                }

            });
        });
    </script>
    <script>
        $('#mDelete').on('show.bs.modal', function (e) {
            var id = e.relatedTarget.id,
                name = 'this entry',
                modal = $(this);
            $('#deleteMessage').replaceWith(' <p> Comfirm delete ' + name + ' ?</p>');
            $('#deleteEntry').attr('action', e.relatedTarget.dataset.route);
        });
    </script>
@stop