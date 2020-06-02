@extends('admin.layouts.master')
@section('title', 'Targets')
@section('content')


    <div class="row">
        <div class="col-md-12">


    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-hourglass-start fa-fw"></i>Targets</h3>
            <div class="box-tools pull-right">
                @if(Guard::allows('targets55_delete'))
                <button  id="delete" type="button" data-toggle="tooltip" data-original-title="Delete Selected Records" class="btn btn-box-tool" ><i class="fa fa-trash"></i></button>
                @endif
                <span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="{{count($targets55)}} Records">{{count($targets55)}}</span>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">

            <form id="form-search" method="GET" action="{{route('admin.targets55.index')}}">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="collapse navbar-collapse filter" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <div class="form-group">
                            <label>Reset</label>
                            <div>
                                <a href="{{route('admin.targets55.index')}}" class="btn btn-default">Reset</a>
                            </div>
                        </div>
                    </li>

                    <li>
   <div class="form-group">
        <label>User</label>
        <div>
             {!! Form::select('fusers55_id', $users55,  Input::get('fusers55_id'), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> isset($view) ? true : false)) !!}
        </div>
    </div>
</li>
<li>
   <div class="form-group">
        <label>Success Indicator</label>
        <div>
             {!! Form::select('fsuccessindicators55_id', $successindicators55,  Input::get('fsuccessindicators55_id'), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> isset($view) ? true : false)) !!}
        </div>
    </div>
</li>
<li>
   <div class="form-group">
        <label>IPCR</label>
        <div>
             {!! Form::select('fipcr55_id', $ipcr55,  Input::get('fipcr55_id'), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> isset($view) ? true : false)) !!}
        </div>
    </div>
</li>


                    <li>
                        <div class="form-group">
                            <label>Search</label>
                            <div><button type="submit" class="btn btn-default">Search</button></div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</form>

            <table class="table table-striped table-hover table-responsive table-bordered" id="Targets55DataTable"  width="100%">
                <thead>
                    <tr>
                        <th class="all">
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>
                        <th>Name</th>
<th>Description</th>
<th>User</th>
<th>Duration</th>
<th>Percent</th>
<th>Created By</th>
<th>Active</th>
<th>Success Indicator</th>
<th>IPCR</th>

                        <th class="all">
                            <div class="btn-group tools">
                                @if(Guard::allows('targets55_create'))
                                <button action="form" type="button" onclick="location.href ='{{ route('admin'.'.targets55.create') }}'" class="btn btn-default btn-sm fa fa-plus"></button>
                                @endif
                                <div class="btn-group">
                                    <button class="btn dropdown-toggle btn-default btn-sm fa fa-bars"
                                            data-toggle="dropdown" aria-expanded="false"></button>
                                    <ul class="dropdown-menu pull-right ColumnToggle" role="menu">
                                       <li action="form" data-column="1" class="toggle-vis Checked"><a href="javascript:void(0)"><i class="fa fa-check"></i>Name</a></li>
<li action="form" data-column="2" class="toggle-vis Checked"><a href="javascript:void(0)"><i class="fa fa-check"></i>Description</a></li>
<li action="form" data-column="3" class="toggle-vis Checked"><a href="javascript:void(0)"><i class="fa fa-check"></i>User</a></li>
<li action="form" data-column="4" class="toggle-vis Checked"><a href="javascript:void(0)"><i class="fa fa-check"></i>Duration</a></li>
<li action="form" data-column="5" class="toggle-vis Checked"><a href="javascript:void(0)"><i class="fa fa-check"></i>Percent</a></li>
<li action="form" data-column="6" class="toggle-vis Checked"><a href="javascript:void(0)"><i class="fa fa-check"></i>Created By</a></li>
<li action="form" data-column="7" class="toggle-vis Checked"><a href="javascript:void(0)"><i class="fa fa-check"></i>Active</a></li>
<li action="form" data-column="8" class="toggle-vis Checked"><a href="javascript:void(0)"><i class="fa fa-check"></i>Success Indicator</a></li>
<li action="form" data-column="9" class="toggle-vis Checked"><a href="javascript:void(0)"><i class="fa fa-check"></i>IPCR</a></li>

                                    </ul>
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($targets55 as $row)
                        <tr>
                            <td>
                                {!! Form::checkbox('del-'.encrypt($row->id),1,false,['class' => 'single','data-id'=> encrypt($row->id)]) !!}
                            </td>
                            <td>{{ $row->name }}</td>
<td>{{ $row->description }}</td>
<td>{{ isset($row->users55->firstname) ? $row->users55->firstname : '' }}</td>
<td>{{ date('m/d/Y h:i A', strtotime($row->duration_s)) .' - '. date('m/d/Y h:i A', strtotime($row->duration_e))   }}</td>
<td>{{ $row->percent }}</td>
<td>{{ $row->created_by }}</td>
@if($row->active== 1)<td><span class="label label-success">True</span></td>@else<td><span class="label label-danger">False</span></td>@endif<td>{{ isset($row->successindicators55->success_indicator_name) ? $row->successindicators55->success_indicator_name : '' }}</td>
<td>{{ isset($row->ipcr55->ipcr_name) ? $row->ipcr55->ipcr_name : '' }}</td>

                            <td>
   
                                <div class="btn-group tools">
                                    @if(Guard::allows('targets55_view'))
                                    <button type="button" onclick="location.href ='{{route('admin'.'.targets55.show', array(encrypt($row->id))) }}'" class="btn btn-default btn-sm fa fa-search"></button>
                                    @endif
                                    @if(Guard::allows('targets55_edit') || Guard::allows('targets55_delete'))
                                    <div class="btn-group">
                                        <button class="btn dropdown-toggle btn-default btn-sm fa fa-bars"
                                                data-toggle="dropdown"></button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            @if(Guard::allows('targets55_edit'))
                                            <li action="form"><a href="{{route('admin'.'.targets55.edit', array(encrypt($row->id))) }}"><i class="fa fa-pencil-square-o"></i>Edit</a></li>
                                            @endif
                                            @if(Guard::allows('targets55_delete'))
                                            <li action="delete"><a href="#" data-toggle="modal" id="{{encrypt($row->id)}}" data-route="{{route('admin'.'.targets55.destroy', encrypt($row->id))}}" data-target="#mDeleteTargets55DataTable">
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
            {!! Form::open(['route' => 'admin'.'.targets55.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="sendTargets55DataTable" name="toDeleteTargets55DataTable">
            {!! Form::close() !!}
        </div>
	</div>
	 <div id="eModalContainer">
                <div class="modal fade" id="mDeleteTargets55DataTable">
                    <div class="modal-dialog">
                        <div class="modal-content">

                               {!! Form::open(array('method' => 'DELETE', 'id' => 'deleteEntryTargets55DataTable')) !!}

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Delete</h4>
                                </div>
                                <div class="modal-body">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <p id="deleteMessageTargets55DataTable"></p>
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
           @elseif(Session::has('danger'))
                      toastr.error("Error", "{{Session::get('danger')}}", {
                          closeButton: true,
                          positionClass: 'toast-bottom-right',
                      });

            @elseif ($errors->count() > 0)
                 toastr.warning("Oops!", "There was an error occured", {
                        closeButton: true,
                        positionClass: 'toast-bottom-right'
                    });
            @endif
            $('#deleteTargets55DataTable').click(function () {
                alertify.confirm("Are you sure you want to delete these items?", function () {
                    var send = $('#sendTargets55DataTable');
                    var mass = $('.mass').is(":checked");
                    if (mass == true) {
                        send.val('mass');
                    } else {
                        var toDeleteTargets55DataTable = [];
                        $('.single').each(function () {
                            if ($(this).is(":checked")) {
                                toDeleteTargets55DataTable.push($(this).data('id'));
                            }
                        });
                        send.val(JSON.stringify(toDeleteTargets55DataTable));
                    }
                    $('#massDeleteTargets55DataTable').submit();
                }, function () {
                });
            });
             var tableTargets55DataTable = $('#Targets55DataTable').DataTable(
             {"dom":"Bfrtip","buttons":[{"extend":"copy","text":"Copy","exportOptions":{"columns":"th:not(:last-child):visible:not(:eq(0))"}},{"extend":"excel","text":"Excel","exportOptions":{"columns":"th:not(:last-child):visible:not(:eq(0))"}},{"extend":"pdf","text":"PDF","exportOptions":{"columns":"th:not(:last-child):visible:not(:eq(0))"}},{"extend":"print","text":"Print","exportOptions":{"stripHtml":false,"columns":"th:not(:last-child):visible:not(:eq(0))"}}],"columnDefs":[{"width":"30px","targets":0,"searchable":false,"orderable":false,"visible":true},{"targets":1,"searchable":true,"orderable":true,"visible":true},{"targets":2,"searchable":true,"orderable":true,"visible":true},{"targets":3,"searchable":true,"orderable":true,"visible":true},{"targets":4,"searchable":true,"orderable":true,"visible":true},{"targets":5,"searchable":true,"orderable":true,"visible":true},{"targets":6,"searchable":true,"orderable":true,"visible":true},{"targets":7,"searchable":true,"orderable":true,"visible":true},{"targets":8,"searchable":true,"orderable":true,"visible":true},{"targets":9,"searchable":true,"orderable":true,"visible":true},{"targets":10,"searchable":false,"orderable":false,"visible":true}],"responsive":true,"autoWidth":true}
             );
                $('.toggle-vis').on('click', function (e) {
                    e.preventDefault();
                    //find table
                    // Get the column API object
                    var column = tableTargets55DataTable.column($(this).attr('data-column'));

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
        $('#mDeleteTargets55DataTable').on('show.bs.modal', function(e) {
            var id     = e.relatedTarget.id,
                    name = 'this entry',
                    modal    = $(this);
            $('#deleteMessageTargets55DataTable').replaceWith(' <p> Comfirm delete '+name+' ?</p>');
            $('#deleteEntryTargets55DataTable').attr('action', e.relatedTarget.dataset.route);
        });
    </script>
@stop