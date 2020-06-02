@extends('admin.layouts.master')
@section('title', 'IPCR')
@section('content')

 

    <div class="row">
        <div class="col-md-12">

 <div class="box box-primary ">
        <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-plus-circle fa-fw"></i>Create New DPCR</h3>
        </div>
        <div class="box-body">
         {!! Form::open(array('route' => 'admin'.'.ipcr55.store', 'id' => 'form-with-validation')) !!}
            <div class="form-group {{ $errors->has('ipcr_name') ? 'is-invalid' : '' }}">
    {!! Form::label('ipcr_name', 'DPCR Name', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::text('ipcr_name', old('ipcr_name'), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
        @if ($errors->has('ipcr_name'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('ipcr_name') }}</strong>
            </span>
        @endif
        
</div><div class="form-group {{ $errors->has('semester') ? 'is-invalid' : '' }}">
    {!! Form::label('semester', 'Semester', array('class'=>'control-label')) !!}
        <span style="font-weight: 700; color: red">*</span>
        <!-- {!! Form::number('semester', old('semester'), array('class'=>'form-control','disabled'=> isset($view) ? true : false)) !!} -->

        <select name="semester" class="form-control">
                          <option value="1" >1st Semester</option>
                          <option value="2" >2nd Semester</option>
                        </select>
         @if ($errors->has('semester'))
                                                 <span class="invalid-feedback">
                                                 <strong>{{ $errors->first('semester') }}</strong>
                                                 </span>
                                             @endif
        

</div><div class="form-group {{ $errors->has('year') ? 'is-invalid' : '' }}">
    {!! Form::label('year', 'Year', array('class'=>'control-label')) !!}
        <span style="font-weight: 700; color: red">*</span>
        <!-- {!! Form::number('year', old('year'), array('class'=>'form-control','disabled'=> isset($view) ? true : false)) !!} -->
         
          <select name="year" class="form-control">
                          <option value="2020" >2020</option>
                          <option value="2019" >2019</option>
                          <option value="2018" >2018</option>
                          <option value="2017" >2017</option>
                          <option value="2018" >2019</option>
                        </select>
                        @if ($errors->has('year'))
                                                 <span class="invalid-feedback">
                                                 <strong>{{ $errors->first('year') }}</strong>
                                                 </span>
                                             @endif
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        

</div>
<!-- <div class="form-group {{ $errors->has('status55_id') ? 'is-invalid' : '' }}">
    {!! Form::label('status55_id', 'Status', array('class'=>'control-label')) !!}
            
        {!! Form::select('status55_id', $status55, old('status55_id'), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> isset($view) ? true : false)) !!}
        @if ($errors->has('status55_id'))
                         <span class="invalid-feedback">
                         <strong>{{ $errors->first('status55_id') }}</strong>
                         </span>
                     @endif
        
</div> -->
<div class="form-group {{ $errors->has('created_by') ? 'is-invalid' : '' }}">
    <!-- {!! Form::label('created_by', 'Created By', array('class'=>'control-label')) !!} -->
        
       <!--  {!! Form::number('created_by', old('created_by'), array('class'=>'form-control','disabled'=> isset($view) ? true : false)) !!} -->
         @if ($errors->has('created_by'))
                                                 <span class="invalid-feedback">
                                                 <strong>{{ $errors->first('created_by') }}</strong>
                                                 </span>
                                             @endif
        

</div><div class="form-group">
    {!! Form::label('active', 'Active', array('class'=>'control-label')) !!}
            
      <br>  {!! Form::checkbox('active', 1, old('active'), array('data-toggle'=>'toggle','disabled'=> isset($view) ? true : false)) !!}
        
</div>
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-md-12">
                  {!! Form::submit( 'Generate DPCR' , array('class' => 'btn btn-primary')) !!}
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
        editor_deselector : "mceNoEditor"
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
@endsection