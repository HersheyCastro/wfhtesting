@extends('admin.layouts.master')
@section('title', 'Division IPCR')
@section('content')
<!-- index view of IPCR Targets for standard user -->


    <div class="row">
        <div class="col-md-12">


    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bar-chart fa-fw"></i>Division IPCR </h3>
            <div class="box-tools pull-right">
                @if(Guard::allows('ipcr55_delete'))
                <button  id="delete" type="button" data-toggle="tooltip" data-original-title="Delete Selected Records" class="btn btn-box-tool" ><i class="fa fa-trash"></i></button>
                @endif
                <span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="{{count($ipcr55)}} Records">{{count($ipcr55)}}</span>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">

           <!--  <form id="form-search" method="GET" action="{{route('admin.ipcr55.index')}}">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse filter" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-left">
                                    <li>
                                        <div class="form-group">
                                            <label>Reset</label>
                                            <div>
                                                <a href="{{route('admin.ipcr55.index')}}" class="btn btn-default">Reset</a>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                       <div class="form-group">
                                            <label>Status</label>
                                            <div>
                                                 {!! Form::select('fstatus55_id', $status55,  Input::get('fstatus55_id'), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> isset($view) ? true : false)) !!}
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
                </form> -->

            <table class="table table-striped table-hover table-responsive table-bordered" id="Ipcr55DataTable"  width="100%">
                <thead>
                    <tr>
                        <th class="all">
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>
                        <th>IPCR Name</th>
                        <th>Semester</th>
                        <th>Year</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Active</th>

                        <th class="all">
                            <!-- <div class="btn-group tools">
                                @if(Guard::allows('ipcr55_create'))
                                 @if((Auth::user()->roles55_id!="4") && (Auth::user()->roles55_id!="6"))
                                      <button action="form" type="button" onclick="location.href ='{{ route('admin'.'.ipcr55.create') }}'" class="btn btn-default btn-sm fa fa-plus"></button>
                                    @endif
                                   
                               
                                @endif
                                <div class="btn-group">
                                    @if((Auth::user()->roles55_id!="4") && (Auth::user()->roles55_id!="6") )
                                     <button class="btn dropdown-toggle btn-default btn-sm fa fa-bars"
                                            data-toggle="dropdown" aria-expanded="false"></button>
                                    <ul class="dropdown-menu pull-right ColumnToggle" role="menu">
                                        <li action="form" data-column="1" class="toggle-vis Checked"><a href="javascript:void(0)"><i class="fa fa-check"></i>IPCR Name</a></li>
                                        <li action="form" data-column="2" class="toggle-vis Checked"><a href="javascript:void(0)"><i class="fa fa-check"></i>Semester</a></li>
                                        <li action="form" data-column="3" class="toggle-vis Checked"><a href="javascript:void(0)"><i class="fa fa-check"></i>Year</a></li>
                                        
                                        <li action="form" data-column="5" class="toggle-vis Checked"><a href="javascript:void(0)"><i class="fa fa-check"></i>Updated At</a></li>
                                        <li action="form" data-column="6" class="toggle-vis Checked"><a href="javascript:void(0)"><i class="fa fa-check"></i>Active</a></li>
                                    @endif
                                   

                                    </ul>
                                </div>
                            </div> -->
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($ipcr55 as $row)
                        <tr>
                            <td>
                                {!! Form::checkbox('del-'.encrypt($row->id),1,false,['class' => 'single','data-id'=> encrypt($row->id)]) !!}
                            </td>
                            <td>
                                <!-- <a href="{{route('admin'.'.ipcr55.show', array(encrypt($row->id))) }}">{{ $row->ipcr_name }}</a> -->
                                <a href="{{route('admin'.'.showdivision'.'/', array(encrypt($row->id))) }}">{{ $row->ipcr_name }}</a>
                            </td>
                            <td>
                                @if($row->semester==1)
                                    1st Semester
                                @else 
                                    2nd Semester
                                @endif
                            </td>
                            <td>{{ $row->year }}</td>
                            <td>{{ $row->status_name }}</td>
                            <td>{{ $row->created_at }}</td>
                            @if($row->active== 1)<td><span class="label label-success">True</span></td>@else<td><span class="label label-danger">False</span></td>@endif
                            <td>
   
                                <div class="btn-group tools">
                                    @if(Guard::allows('ipcr55_view'))
                                    <button type="button" onclick="location.href ='{{route('admin'.'.showdivision'.'/', array(encrypt($row->id))) }}'" class="btn btn-default btn-sm fa fa-search"></button>
                                    @endif
                                    <!-- @if(Guard::allows('ipcr55_edit') || Guard::allows('ipcr55_delete'))
                                    @if((Auth::user()->roles55_id!="4") && (Auth::user()->roles55_id!="6"))
                                    <div class="btn-group">
                                        <button class="btn dropdown-toggle btn-default btn-sm fa fa-bars"
                                                data-toggle="dropdown"></button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            @if(Guard::allows('ipcr55_edit'))
                                            <li action="form"><a href="{{route('admin'.'.ipcr55.edit', array(encrypt($row->id))) }}"><i class="fa fa-pencil-square-o"></i>Edit</a></li>
                                            @endif
                                            @if(Guard::allows('ipcr55_delete'))
                                            <li action="delete"><a href="#" data-toggle="modal" id="{{encrypt($row->id)}}" data-route="{{route('admin'.'.ipcr55.destroy', encrypt($row->id))}}" data-target="#mDeleteIpcr55DataTable">
                                                    <i class="fa fa-minus"></i>Delete</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                    @endif
                                   @endif -->
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! Form::open(['route' => 'admin'.'.ipcr55.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="sendIpcr55DataTable" name="toDeleteIpcr55DataTable">
            {!! Form::close() !!}
        </div>
    </div>
     <div id="eModalContainer">
                <div class="modal fade" id="mDeleteIpcr55DataTable">
                    <div class="modal-dialog">
                        <div class="modal-content">

                               {!! Form::open(array('method' => 'DELETE', 'id' => 'deleteEntryIpcr55DataTable')) !!}

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Delete</h4>
                                </div>
                                <div class="modal-body">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <p id="deleteMessageIpcr55DataTable"></p>
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
            $('#deleteIpcr55DataTable').click(function () {
                alertify.confirm("Are you sure you want to delete these items?", function () {
                    var send = $('#sendIpcr55DataTable');
                    var mass = $('.mass').is(":checked");
                    if (mass == true) {
                        send.val('mass');
                    } else {
                        var toDeleteIpcr55DataTable = [];
                        $('.single').each(function () {
                            if ($(this).is(":checked")) {
                                toDeleteIpcr55DataTable.push($(this).data('id'));
                            }
                        });
                        send.val(JSON.stringify(toDeleteIpcr55DataTable));
                    }
                    $('#massDeleteIpcr55DataTable').submit();
                }, function () {
                });
            });
             var tableIpcr55DataTable = $('#Ipcr55DataTable').DataTable(
             {"dom":"Bfrtip","buttons":[{"extend":"copy","text":"Copy","exportOptions":{"columns":"th:not(:last-child):visible:not(:eq(0))"}},{"extend":"excel","text":"Excel","exportOptions":{"columns":"th:not(:last-child):visible:not(:eq(0))"}},{"extend":"pdf","text":"PDF","exportOptions":{"columns":"th:not(:last-child):visible:not(:eq(0))"}},{"extend":"print","text":"Print","exportOptions":{"stripHtml":false,"columns":"th:not(:last-child):visible:not(:eq(0))"}}],"columnDefs":[{"width":"30px","targets":0,"searchable":false,"orderable":false,"visible":true},{"targets":1,"searchable":true,"orderable":true,"visible":true},{"targets":2,"searchable":true,"orderable":true,"visible":true},{"targets":3,"searchable":true,"orderable":true,"visible":true},{"targets":4,"searchable":true,"orderable":true,"visible":true},{"targets":5,"searchable":true,"orderable":true,"visible":true},{"targets":6,"searchable":true,"orderable":true,"visible":true},{"targets":7,"searchable":false,"orderable":false,"visible":true}],"responsive":true,"autoWidth":true}
             );
                $('.toggle-vis').on('click', function (e) {
                    e.preventDefault();
                    //find table
                    // Get the column API object
                    var column = tableIpcr55DataTable.column($(this).attr('data-column'));

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
        $('#mDeleteIpcr55DataTable').on('show.bs.modal', function(e) {
            var id     = e.relatedTarget.id,
                    name = 'this entry',
                    modal    = $(this);
            $('#deleteMessageIpcr55DataTable').replaceWith(' <p> Comfirm delete '+name+' ?</p>');
            $('#deleteEntryIpcr55DataTable').attr('action', e.relatedTarget.dataset.route);
        });
    </script>
@stop