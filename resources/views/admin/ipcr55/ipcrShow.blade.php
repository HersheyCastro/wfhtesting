@extends('admin.layouts.master')
@section('title', 'IPCR')
@section('content')
<style type="text/css">
    table#t01 th {
      background-color: #3C8DBC;
      color: white;
      text-align: center;
    }
    table#t01 td {
        border: 1px solid black;
    }

    .blue {
        background-color: #3C8DBC;
        color: white;
    }
</style>



    <div class="row">
        <div class="col-md-12">


    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-list fa-fw"></i>IPCR List </h3>
        </div>
        <div class="box-body">
           <form id="form-search" method="GET" action="{{route('admin.ipcr55.show',encrypt($ipcr55->id))}}">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse filter" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-left">
                                    <li>
                                        <div class="form-group">
                                            <label>Reset</label>
                                            <div>
                                                <a href="{{route('admin.ipcr55.show',encrypt($ipcr55->id))}}" class="btn btn-default">Reset</a>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                       <div class="form-group">
                                            <label>Week</label>
                                            <div>
                                                 <!-- {!! Form::select('fstatus55_id', $status55,  Input::get('fstatus55_id'), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> isset($view) ? true : false)) !!} -->

                                                 <!-- <select class="form-control select2" name="month">
                                                      <option>January</option>
                                                      <option>February</option>
                                                      <option>March</option>
                                                      <option>April</option>
                                                 </select>

                                                  <select class="form-control select2" name="week">
                                                      <option>Week 1</option>
                                                      <option>Week 2</option>
                                                      <option>Week 3</option>
                                                      <option>Week 4</option>
                                                 </select> -->

                                                <input type="week" name="targetweekform" class="form-control" value="" >
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


          <table id="t01" class="table table-hover table-responsive table-bordered" width="100%" >
            <tr>
              <th width="15%">Strategic Objective</th>
              <th width="15%">Success Indicator</th> 
              <th width="15%">Targets (per sem)</th>
              <th width="15%">Tasks</th>
              <th>Means of Verification</th>
              <th width="10%">Weight</th>
              <th width="15%">Remarks (from Senior)</th>
              <th width="15%">Remarks</th>
              <!-- <th width="15%">%Completion</th> -->
             
              
              <th>
                
                 <!--  <button type="button" onclick="location.href ='{{ route('admin'.'.targets55.create') }}/{{$ipcr55->id}}'" class="btn btn-default btn-sm fa fa-plus"></button> -->
                
                
              </th>
            </tr>
           
            
            @foreach($targets as $target_index => $target)
              @php($counter = 0)
                @foreach($tasks->where('targets_id', $target->id) as $task_index => $task)
                  @foreach($successindicators55->where('id',$target->successindicators55_id) as $si)
                    @foreach($strategicobjectives->where('id',$si->strategicobjectives55_id) as $so )
                      <tr>
                        @if(!$counter)
                        <td  rowspan="{{$tasks->where('targets_id', $target->id)->count() ?? '1'}}">{{ $so->strategic_objective_name}}</td>
                        <td  rowspan="{{$tasks->where('targets_id', $target->id)->count() ?? '1'}}">{{ $si->success_indicator_name}}</td>
                        <td  rowspan="{{$tasks->where('targets_id', $target->id)->count() ?? '1'}}" style="">{!! $target->name !!}</td>
                        @endif
                        <td>{{$task->tasks}}</td>
                        <td>{{$task->verification}}</td>
                        <td>{{$task->weight}}%</td>
                        <td>{{$task->evaluation}}</td>
                        <td>{{$task->evaluation_divhead}}</td>
                       <!--  <td>
                          <div class="progress-bar progress-bar-success progress-bar-striped active" aria-valuenow="{{ $task->percent }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $task->percent }}%;">{{$task->percent}}%</div>
                        </td> -->
                       
                       	@if(!$counter)
	                    <td rowspan="{{$tasks->where('targets_id', $target->id)->count() ?? '1'}}">
							<button type="button" onclick="location.href ='{{ route('admin'.'.editdivisionhead',$target->id) }}'" class="btn btn-default btn-sm fa fa-pencil-square-o"></button>
             <!--  <button type="button" class="btn btn-default btn-sm fa fa-minus" data-toggle="modal" id="{{encrypt($target->id)}}" data-route="{{route('admin'.'.targets55.destroy', encrypt($target->id))}}" data-target="#mDeleteTargets55DataTable"></button> 
	                     </td> -->
						@endif
                      </tr>
                    @endforeach
                  @endforeach
                @php($counter++)
              @endforeach   
            @endforeach
            
          </table>


        <!-- ------------- -->
        <div class="container">
            <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header blue">
                    <button type="button" class="close" data-dismiss="modal" style="color: white" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Add Targets</h4>
                  </div>
                  <div class="modal-body">
                    <!-- ------------------- -->

                     <div class="box-body">
                     {!! Form::open(array('route' => 'admin'.'.targets55.store', 'id' => 'form-with-validation')) !!}
                      <div class="form-group {{ $errors->has('successindicators55_id') ? 'is-invalid' : '' }}">
                        {!! Form::label('successindicators55_id', 'Strategic Objective', array('class'=>'control-label')) !!}
                          <span style="font-weight: 700; color: red">*</span>
                            {!! Form::select('successindicators55_id', $successindicators55, old('successindicators55_id'), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> isset($view) ? true : false)) !!}
                            @if ($errors->has('successindicators55_id'))
                                <span class="invalid-feedback">
                               <strong>{{ $errors->first('successindicators55_id') }}</strong>
                               </span>
                           @endif
                      </div>
                       <div class="form-group {{ $errors->has('successindicators55_id') ? 'is-invalid' : '' }}">
                        {!! Form::label('successindicators55_id', 'Success Indicator', array('class'=>'control-label')) !!}
                          <span style="font-weight: 700; color: red">*</span>
                            {!! Form::select('successindicators55_id', $successindicators55, old('successindicators55_id'), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> isset($view) ? true : false)) !!}
                            @if ($errors->has('successindicators55_id'))
                                <span class="invalid-feedback">
                               <strong>{{ $errors->first('successindicators55_id') }}</strong>
                               </span>
                           @endif
                      </div>
                        <div class="form-group {{ $errors->has('name') ? 'is-invalid' : '' }}">
                          {!! Form::label('name', 'Name', array('class'=>'control-label')) !!}
                                  <span style="font-weight: 700; color: red">*</span>
                              {!! Form::text('name', old('name'), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
                              @if ($errors->has('name'))
                                  <span class="invalid-feedback">
                                  <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                              
                      </div>
                      <div class="form-group {{ $errors->has('duration') ? 'is-invalid' : '' }}">
                        {!! Form::label('duration', 'Duration', array('class'=>'control-label')) !!}
                          <span style="font-weight: 700; color: red">*</span>
                              <div class="input-group date">
                                   {!! Form::text('duration', old('duration'), array('class'=>'form-control pull-right daterange','disabled'=> isset($view) ? true : false)) !!}
                                    <span class="input-group-addon">
                                       <i class="fa fa-calendar"></i>
                                      </span>
                              </div>
                              @if ($errors->has('duration'))
                                  <span class="invalid-feedback">
                                  <strong>{{ $errors->first('duration') }}</strong>
                                  </span>
                              @endif
                      </div>
                      {!! Form::close() !!}
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
         <!-- ------------------- -->
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-md-12">
                    

                    {!! Form::model($ipcr55, array('id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('admin'.'.updateStatus/', encrypt($ipcr55->id)))) !!}
                   
                    <input type="hidden" name="statusofipcr" value="approve">
                    <input type="hidden" name="ipcr_id" value="{{$ipcr55->id}}">
                    {!! Form::submit('Approve', array('class' => 'btn btn-primary')) !!}
                    <a href="{{URL::previous()}}" class="btn btn-default">Back</a>
                  {!! Form::close() !!}
                </div>
            </div>
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
<script type="text/javascript">
    $(".addTarget").click(targets55_id{, $target->id
          e.preventDefault();
          var $this = $(this);
          var fileName = $(this).data("file");
            $("#basicModal").data("fileName", fileName).modal("toggle", $this);
          
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


@endsection