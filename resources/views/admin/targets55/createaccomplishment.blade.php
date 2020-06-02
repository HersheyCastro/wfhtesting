@extends('admin.layouts.master')
@section('title', 'Targets')
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
        <h3 class="box-title"><i class="fa fa-plus-circle fa-fw"></i>Additional Accomplishments</h3>
        </div>
        <div class="box-body">
         {!! Form::open(array('route' => 'admin'.'.additionalaccomplishments', 'id' => 'form-with-validation')) !!}
          
            <div class="form-group {{ $errors->has('successindicators55_id') ? 'is-invalid' : '' }}">
                {!! Form::label('successindicators55_id', 'Success Indicator', array('class'=>'control-label')) !!}
                <span style="font-weight: 700; color: red">*</span>
                   

               <select name="successindicators" class="form-control select2">
                  @foreach($success_data as $success)
                  <option value="{{ $success->id}}" >{{ $success->success_indicator_name}}</option>
                  @endforeach
                </select>
                    
            </div>
        
            <div class="form-group {{ $errors->has('name') ? 'is-invalid' : '' }}">
                {!! Form::label('name', 'Targets (per sem)', array('class'=>'control-label')) !!}
                <span style="font-weight: 700; color: red">*</span>
                
                <textarea class="form-control mceEditor" name="name"></textarea>   

               
            </div>
         
            <input type="hidden" name="duration" value="0000-00-00">
           
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-plus-circle fa-fw"></i>Add New Task</h3>
        </div>
          <table id="t01" class="table table-hover table-responsive table-bordered" width="100%" >
            <tr>
              <th width="20%">Target duration</th>
              <th width="30%">Tasks </th>
              <!-- <th width="10%">Weight</th>  -->
               <th width="10%">% Accomplished</th>
              <th width="10%">Actual Period</th>
              <th width="30%">Actual verification</th>
              <th><button type="button" class="btn btn-default btn-sm fa fa-plus add_another"></button></th>
            </tr>
            <tr >
              <td>
                <input type="date" name="target_start[]" class="form-control pull-right" required="">
                <input type="date" name="target_end[]" class="form-control pull-right" required="">
              </td>
              <td>
                  <div class="form-group {{ $errors->has('task_accomplishments') ? 'is-invalid' : '' }}" >
                    <input type="text" name="task_accomplishments[]" class="form-control" required="" />
                  </div>
              </td>
              <td>
                  <div class="form-group {{ $errors->has('percent_completed') ? 'is-invalid' : '' }}">
                    <input type="number" name="percent_completed[]" class="form-control"  required="" /> 
                   </div>
              </td>
              <td>
                <div class="input-group date">
                  
                    <input type="date" name="actual_start[]" placeholder="Start" class="form-control pull-right" required="">
                  
                    <input type="date" name="actual_end[]" placeholder="Start" class="form-control pull-right" required="">
                   
                </div>
              </td>
              <td>
                  <textarea class="form-control" name="actual_verification[]" required=""></textarea>
              </td>
              <td></td>
            </tr>
              
            
        </table>
            <!-- targets -->
            <input type="hidden"  name="users55_id" value="{{ Auth::user()->employee_id }}">
            <input type="hidden"  name="ipcr55_id" value="{{$id}}">
            <input type="hidden"  name="active" value="1">
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
<script type="text/javascript">
    tinymce.init({
        mode : "textareas",
        editor_selector : "mceEditor2",
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
      $("#t01").append('<tr><td><input type="date" name="target_start[]" class="form-control pull-right" required><input type="date" name="target_end[]" class="form-control pull-right" required></td><td><div class="form-group"><textarea class="form-control mceEditor2" name="task_accomplishments[]" required></textarea></div></td><td><div class="form-group"><input type="number" name="percent_completed[]" class="form-control" required/></div></td><td><div class="input-group date"><input type="date" name="actual_start[]" placeholder="Start" class="form-control pull-right" required><input type="date" name="actual_end[]" placeholder="End" class="form-control pull-right" required ></div></td><td><textarea class="form-control mceEditor2" name="actual_verification[]" required></textarea></td><td><button type="button" class="btn btn-default btn-sm fa fa-minus" onclick="deleteRow(this)"></button></td></tr>');
      
   });
})

  function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("t01").deleteRow(i);
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
@endsection