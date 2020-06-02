@extends('admin.layouts.master')
@section('title', 'Verify Target')
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

        <div class="box box-primary ">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-plus-circle fa-fw"></i>Verify Accomplishments</h3>
        </div>
        <div class="box-body">
          {!! Form::model($targets55, array('id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('admin'.'.updateverifysenioraccomplishments', encrypt($targets55->id)))) !!}
            <div class="form-group {{ $errors->has('successindicators55_id') ? 'is-invalid' : '' }}">
             
                {!! Form::label('successindicators55_id', 'Success Indicator', array('class'=>'control-label')) !!}
                        <span style="font-weight: 700; color: red">*</span>
                    {!! Form::select('successindicators55_id', $successindicators55, old('successindicators55_id'), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> 'true')) !!}
            </div>
            <div class="form-group {{ $errors->has('name') ? 'is-invalid' : '' }}">
                {!! Form::label('name', 'Targets (per sem)', array('class'=>'control-label')) !!}
                        <span style="font-weight: 700; color: red">*</span>
                    {!! Form::textarea('name', old('name'), array('class'=>'form-control mceEditor','disabled'=> 'true'))  !!}   

                    <!-- textarea></textarea>
                {!! $targets55->name !!} -->
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
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-plus-circle fa-fw"></i>Edit or  Add Task/s</h3>
            </div>
            <table id="t01" class="table table-hover table-responsive table-bordered" width="100%" >
              <tr>
                <th width="20%">Target duration</th>
                <th width="40%">Task </th>
                <!-- <th width="10%">Weight</th>  -->
                
                <th width="20%">Weight</th>
                 <th width="10%">%Accomplished</th>
                <th width="40%">Remarks</th>
                
              </tr>
              @foreach($tasks as $task)
                <tr >
                    <td>
                      
                      <!-- <input type="week" name="targetweek[]" class="form-control" value="{{ $task->duration_s }}" > -->
                      <input type="text" name="targetweek[]" class="form-control" value=" {{ \Carbon\Carbon::parse($task->duration_s)->format('m/d/Y')}} - {{ \Carbon\Carbon::parse($task->duration_e)->format('m/d/Y')}}" disabled="">
                     
                    </td>
                    <td>
                        <!-- <textarea rows="2" cols="80" name="task_name[]" class="form-control" disabled="" >{{$task->name}}</textarea> -->
                          <input type="text" name="task_name[]" class="form-control" value="{!! $task->name !!}" readonly="readonly" />
                       
                    </td>
                    <input type="hidden" name="start_date[]" value="">
                    <input type="hidden" name="end_date[]" value="">

                    <td>
                        <div class="form-group {{ $errors->has('weight') ? 'is-invalid' : '' }}">
                          <input type="number" name="weight[]" class="form-control weight" value="{{$task->weight}}" /> 
                         </div>
                    </td>
                    <td>
                          <div class="progress-bar progress-bar-success progress-bar-striped active" aria-valuenow="{{ $task->percent }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $task->percent_completed }}%;">{{$task->percent_completed}}%</div>
                        </td>
                    <td>
                        <textarea rows="2" cols="50" name="evaluation[]">{{$task->chief_accomplishmentremarks}}</textarea>
                    </td>
                    
                   
                  </tr>
                  <input type="hidden"  name="task_id[]" value="{{ $task->id}}">
                  <input type="hidden"  name="percent_completed[]" value="{{ $task->percent_completed}}">
                @endforeach
		<tfoot>
			<td colspan="2">Total Weight</td>
			<td id="totalweight"></td>
			<td colspan="2"></td>
		</tfoot>
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
    statusbar: "false",
    readonly: "true",
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
      $("#t01").append('<tr><td><input type="week" name="targetweek[]" class="form-control" value="" /> <td><input type="text" name="task_name[]" class="form-control" value="" />  </td><td><input type="number" name="weight[]" class="form-control" value=""/></td><td><input type="number" name="percent_completed[]" class="form-control" value="" /></td><td></td><td><div class="btn-group"><button class="btn dropdown-toggle btn-default btn-sm fa fa-bars" data-toggle="dropdown"></button><ul class="dropdown-menu pull-right" role="menu"><li action="form"  ><a href=""class="addTarget"  data-toggle="modal" data-target="#basicModal"><i class="fa fa-file-text-o"></i>Attachment/s</a></li></ul></div><button type="button" class="btn btn-default btn-sm fa fa-minus" onclick="deleteRow(this)"></button></td></tr>');


      
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

   $(".weight").blur(function(){
      var sum = 0;
	$(".weight").each(function(){
		sum += Number($(this).val());
	});
	if(sum>100) {
	    val="<div style='color:red; font-weight:bold'>" + sum + "</div>";
	} else if(sum<100) {
	    val="<div style='color:orange; font-weight:bold'>" + sum + "</div>";

	} else {
	    val="<div style='font-weight:bold'>" + sum + "</div>";
	}
      $("#totalweight").html(val);
   });


   $(".weight").blur();
});  //end document ready
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