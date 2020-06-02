@extends('admin.layouts.master')
@section('title', 'Targets')
@section('content')
<!-- edit view of Targets for standard user -->
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

        <div class="box box-primary ">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-plus-circle fa-fw"></i>Edit Targets</h3>
        </div>
        <div class="box-body">
          {!! Form::model($targets55, array('id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('admin'.'.targets55.update', encrypt($targets55->id)))) !!}
            <div class="form-group {{ $errors->has('successindicators55_id') ? 'is-invalid' : '' }}">
             
                {!! Form::label('successindicators55_id', 'Success Indicator', array('class'=>'control-label')) !!}
                        <span style="font-weight: 700; color: red">*</span>
                    {!! Form::select('successindicators55_id', $success, old('successindicators55_id'), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> isset($view) ? true : false)) !!}
            </div>
            <div class="form-group {{ $errors->has('name') ? 'is-invalid' : '' }}">
                {!! Form::label('name', 'Targets (per sem)', array('class'=>'control-label')) !!}
                        <span style="font-weight: 700; color: red">*</span>
                    {!! Form::textarea('name', old('name'), array('class'=>'form-control mceEditor','disabled'=> isset($view) ? true : false))  !!}   
            </div>
           <!--  <div class="form-group {{ $errors->has('duration') ? 'is-invalid' : '' }}">
                {!! Form::label('duration', 'Duration', array('class'=>'control-label')) !!}
                    <span style="font-weight: 700; color: red">*</span>
                    <div class="input-group date">

                         {!! Form::hidden('duration', old('duration'), array('class'=>'form-control pull-right daterange','disabled'=> isset($view) ? true : false)) !!}
                          <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </span>
                    </div>
            </div> -->
            <input type="hidden" name="duration" value="0000-00-00">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-plus-circle fa-fw"></i>Edit or  Add Task/s</h3>
            </div>
            
             <table id="t01" class="table table-hover table-responsive table-bordered" width="100%" >
            <tr>
              <th width="40%">Task/s</th>
              @if(Auth::user()->roles55_id=="4")
              <th width="10%">Weight</th> 
              @endif
              <th width="30%">Task duration</th>  
              
              <!-- <th width="10%">%Completion</th> -->
              <th width="30%">Means of Verification</th>
              <th><button type="button" class="btn btn-default btn-sm fa fa-plus add_another"></button></th>
            </tr>
            @foreach($tasks as $task)
            <tr >
                <td>
                    <div class="form-group {{ $errors->has('task_name') ? 'is-invalid' : '' }}">
                     
                       <!-- <input type="text" name="task_name[]" class="form-control" value="" required />  -->

                       <textarea rows="3" cols="80" name="task_name[]" class="form-control" >{{$task->name}}</textarea>
                        
                    </div>
                </td>
                @if(Auth::user()->roles55_id=="4")
                  <td>
                    <input type="number" name="weight[]" value="{{$task->weight}}">
                  </td>
                @endif
                <input type="hidden" name="weight[]" value="{{$task->weight}}">
                <td>
                  <!-- <input type="week" name="targetweek[]" class="form-control" value="" required> -->
                   <div class="form-group ">
                      <!-- {!! Form::label('duration', 'Duration', array('class'=>'control-label')) !!}
                        <span style="font-weight: 700; color: red">*</span> -->
                          <!-- <div class="input-group date">

                               {!! Form::text('taskduration[]', old('taskduration[]'), array('class'=>'form-control pull-right daterange','disabled'=> isset($view) ? true : false)) !!}
                                <span class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </span>
                          </div>
                          @if ($errors->has('taskduration[]'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('taskduration[]') }}</strong>
                              </span>
                          @endif -->
                          <div class="input-group date">
                            <input type="date" name="start_date[]" placeholder="Start" class="form-control pull-right" value="{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$task->duration_s)->format('Y-m-d')}}" >
                            <input type="date" name="end_date[]" class="form-control pull-right" value="{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$task->duration_e)->format('Y-m-d')}}">  
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                          </div>
                    </div>

                    

                    
                </td>
                
                <!-- <td>
                    <div class="form-group {{ $errors->has('weight') ? 'is-invalid' : '' }}">
                       
                            <input type="number" name="weight[]" class="form-control" value="" /> 
                            
                    </div>
                </td>
                <td>
                    <div class="form-group {{ $errors->has('percent_completed') ? 'is-invalid' : '' }}">
                     
                        <input type="number" name="percent_completed[]" class="form-control" value="" /> 
                          
                  </div>
                  
                </td> -->
                <td>
                    <div class="form-group {{ $errors->has('means_verification') ? 'is-invalid' : '' }}">
                   
                        <!-- <input type="text" name="means_verification[]" class="form-control" value="" />  -->
                        <textarea rows="3" class="form-control" cols="70" name="means_verification[]">{{ $task->means_verification}}</textarea>
                        
                    </div>
                </td>
                <td>
                 <!-- <div class="btn-group">
                            <button class="btn dropdown-toggle btn-default btn-sm fa fa-bars"
                                    data-toggle="dropdown"></button>
                            <ul class="dropdown-menu pull-right" role="menu">
                               
                                <li action="form"  ><a href=""class="addTarget"  data-toggle="modal" data-target="#basicModal" 
                                   ><i class="fa fa-file-text-o"></i>Attachment/s</a>
                                </li> -->
                                <!-- <li action="form"  ><a href="" onclick="getFiles()"
                                   ><i class="fa fa-file-text-o"></i>Attachment/s</a>
                                </li> -->
                              <!-- <input type="hidden" name="targetID" value="{{$task->targets55_id}}">
                                <li action="delete"><a href="#" data-toggle="modal" id="{{encrypt($task->id)}}" data-route="{{route('admin'.'.tasks55.destroy', encrypt($task->id))}}" data-target="#mDeleteTasks55DataTable">
                                                    <i class="fa fa-minus"></i>Delete</a></li>
                            </ul>
                        </div> -->
                        <input type="hidden" name="targetID" value="{{$task->targets55_id}}">
                        <button type="button" class="btn btn-default btn-sm fa fa-minus" data-toggle="modal" id="{{encrypt($task->id)}}" data-route="{{route('admin'.'.tasks55.destroy', encrypt($task->id))}}" data-target="#mDeleteTasks55DataTable"></button>
                </td>
              </tr>
               <input type="hidden"  name="task_id[]" value="{{ $task->id}}">
              @endforeach
            
        </table>
            
            <input type="hidden"  name="ipcr55_id" value="{{ $targets55->ipcr55_id}}">
        </div> 
        <div class="box-footer">
            <div class="row">
                <div class="col-md-12">
                  {!! Form::submit( 'Save' , array('class' => 'btn btn-primary')) !!}
                    <a href="{{URL::previous()}}" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        <div id="eModalContainer">
                <div class="modal fade" id="mDeleteTasks55DataTable">
                    <div class="modal-dialog">
                        <div class="modal-content">

                               {!! Form::open(array('method' => 'DELETE', 'id' => 'deleteEntryTasks55DataTable')) !!}

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Delete</h4>
                                </div>
                                <div class="modal-body">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <p id="deleteMessageTasks55DataTable"></p>
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
            <!-- ------------------- -->
        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header blue">
                  <button type="button" class="close" data-dismiss="modal" style="color: white" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Attachments</h4>
                </div>
                <div class="modal-body">
                  <div class="box-body">
                    
                    {!! Form::open(array('route' => 'admin'.'.files55.store', 'method' => 'post', 'files' => true)) !!}
                   <table class="table table-striped table-hover table-responsive table-bordered" id="Files55DataTable"  width="100%">
                      <thead >
                          <tr>
                            <th>File Name</th>
                            <th>File Link</th>
                            <th>Task</th>
                            <th class="all">
                              <div class="btn-group tools">
                                
                                 <!--  <button action="form" type="button" onclick="location.href ='{{ route('admin'.'.files55.create') }}'" class="btn btn-default btn-sm fa fa-plus"></button> -->

                                 <button action="form" type="button" id="add_newfile" class="btn btn-default btn-sm fa fa-plus"></button>
                               
                                  
                              </div>
                            </th>
                          </tr>
                      </thead>

                      <tbody>
                          @foreach ($files as $row)
                            @if(!empty($row->filename))
                              <tr>
                                <td>{{ $row->filename }}</td>
                                <td>{!! $row->link !!}</td>
                                <td>{{ $row->tasks }}</td>
                                <td>
                                  <!-- <div class="btn-group tools">
                                    @if(Guard::allows('files55_view'))
                                    <button type="button" onclick="location.href ='{{route('admin'.'.files55.show', array(encrypt($row->id))) }}'" class="btn btn-default btn-sm fa fa-search"></button>
                                    @endif
                                    @if(Guard::allows('files55_edit') || Guard::allows('files55_delete'))
                                    <div class="btn-group">
                                        <button class="btn dropdown-toggle btn-default btn-sm fa fa-bars"
                                                data-toggle="dropdown"></button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            @if(Guard::allows('files55_edit'))
                                            <li action="form"><a href="{{route('admin'.'.files55.edit', array(encrypt($row->id))) }}"><i class="fa fa-pencil-square-o"></i>Edit</a></li>
                                            @endif
                                            @if(Guard::allows('files55_delete'))
                                            <li action="delete"><a href="#" data-toggle="modal" id="{{encrypt($row->id)}}" data-route="{{route('admin'.'.files55.destroy', encrypt($row->id))}}" data-target="#mDeleteFiles55DataTable">
                                                    <i class="fa fa-minus"></i>Delete</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                   @endif
                                  </div> -->
                                </td>
                              </tr>
                            @else
                               <!-- <tr>No files</tr> -->
                            @endif
                         @endforeach
                      </tbody>
                  </table>
                  <br/>
                  <div id="addfile_toggle" style="border: 1px solid gray; padding: 10px;display: none">
                    <label class="control-label">Add new attachment</label>
                    <br/>
                    <select name="taskFile" class="form-control">
                      @foreach($tasks as $task)
                        <option value="{{$task->id}}" >{{$task->name}}</option>
                      @endforeach
                    </select>
                    <br/>
                    <input type="file"  name="task_file[]" multiple="multiple">
                    <input type="hidden"  name="target_Id" value="{{$targets55->id}}">
                  
                  </div>
                  
                   
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                     <button action="form" type="submit" onclick="location.href ='{{ route('admin'.'.files55.store',$task->id) }}'" class="btn btn-primary">Save</button>
                  </div>
              </div>

            </div>
          </div>
          {!! Form::close() !!}
        </div>
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
        editor_deselector : "mceNoEditor",
        height : "100",
        menubar: "false",
    statusbar: "false"
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
<script type="text/javascript">
  $('document').ready(function() {
  $('.add_another').click(function() {
      $("#t01").append('<tr><td><textarea rows="3" cols="80" class="form-control" name="task_name[]" required></textarea></td>@if(Auth::user()->roles55_id=="4")<td><input type="number" name="weight[]" ></td>@endif<td><div class="form-group"><div class="input-group date"><input type="date" name="start_date[]" placeholder="Start" class="form-control pull-right daterange" required><input type="date" name="end_date[]" class="form-control pull-right daterange" required>  <span class="input-group-addon"><i class="fa fa-calendar"></i></span></div></div></td>  </td><td><textarea rows="3" class="form-control" cols="70" name="means_verification[]"></textarea></td><td><button type="button" class="btn btn-default btn-sm fa fa-minus" onclick="deleteRow(this)"></button></td></tr>');


      
   });
})

  function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("t01").deleteRow(i);
}
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
     function getFiles() {
        $.ajax({
           type:'POST',
           url:'admin/getfile',
           data:'_token = <?php echo csrf_token() ?>',
           success:function(data) {
              $("#msg").html(data.msg);
           }
        });

        alert(data.msg);
     }
</script>
<script>
jQuery(document).ready(function($)
{
  
    $("#add_newfile").click(function()
    {
        $("#addfile_toggle").slideToggle( "slow");

    });  
}); 
</script>
<script>
        $('#mDeleteTasks55DataTable').on('show.bs.modal', function(e) {
            var id     = e.relatedTarget.id,
                    name = 'this entry',
                    modal    = $(this);
            $('#deleteMessageTasks55DataTable').replaceWith(' <p> Confirm delete '+name+' ?</p>');
            $('#deleteEntryTasks55DataTable').attr('action', e.relatedTarget.dataset.route);
        });
    </script>
@endsection