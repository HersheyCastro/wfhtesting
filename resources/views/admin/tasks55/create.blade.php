@extends('admin.layouts.master')
@section('title', 'Tasks')
@section('content')

 

    <div class="row">
        <div class="col-md-12">

 <div class="box box-primary ">
        <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-plus-circle fa-fw"></i>Add New Tasks</h3>
        </div>
        <div class="box-body">
         {!! Form::open(array('route' => 'admin'.'.tasks55.store', 'id' => 'form-with-validation')) !!}
            <div class="form-group {{ $errors->has('name') ? 'is-invalid' : '' }}">
    {!! Form::label('name', 'Name', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::text('name', old('name'), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
        @if ($errors->has('name'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        
</div><div class="form-group {{ $errors->has('description') ? 'is-invalid' : '' }}">
    {!! Form::label('description', 'Description', array('class'=>'control-label')) !!}
            
        {!! Form::text('description', old('description'), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
        @if ($errors->has('description'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
        
</div><div class="form-group {{ $errors->has('targets55_id') ? 'is-invalid' : '' }}">
    {!! Form::label('targets55_id', 'Targets', array('class'=>'control-label')) !!}
            <span style="font-weight: 700; color: red">*</span>
        {!! Form::select('targets55_id', $targets55, old('targets55_id'), array('class'=>'form-control select2', 'width'=>'100' ,'disabled'=> isset($view) ? true : false)) !!}
        @if ($errors->has('targets55_id'))
                         <span class="invalid-feedback">
                         <strong>{{ $errors->first('targets55_id') }}</strong>
                         </span>
                     @endif
        
</div><div class="form-group {{ $errors->has('color') ? 'is-invalid' : '' }}">
    {!! Form::label('color', 'Color', array('class'=>'control-label')) !!}

          <div class="input-group colorpicker">
                     {!! Form::text('color', old('color'), array('class'=>'form-control','disabled'=> isset($view) ? true : false)) !!}

                      <span class="input-group-addon">
                         <i></i>
                      </span>
          </div>
          @if ($errors->has('color'))
                          <span class="invalid-feedback">
                          <strong>{{ $errors->first('color') }}</strong>
                          </span>
                      @endif
            

</div><div class="form-group {{ $errors->has('duration') ? 'is-invalid' : '' }}">
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

<div class="form-group {{ $errors->has('percent') ? 'is-invalid' : '' }}">
    {!! Form::label('percent', 'Percent', array('class'=>'control-label')) !!}
    
        {!! Form::number('percent', old('percent'), array('step'=>'any', 'class'=>'form-control','disabled'=> isset($view) ? true : false)) !!}
         @if ($errors->has('percent'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('percent') }}</strong>
                                </span>
                            @endif
        

</div><div class="form-group {{ $errors->has('order') ? 'is-invalid' : '' }}">
    {!! Form::label('order', 'Order', array('class'=>'control-label')) !!}
        
        {!! Form::number('order', old('order'), array('class'=>'form-control','disabled'=> isset($view) ? true : false)) !!}
         @if ($errors->has('order'))
                                                 <span class="invalid-feedback">
                                                 <strong>{{ $errors->first('order') }}</strong>
                                                 </span>
                                             @endif
        

</div><div class="form-group {{ $errors->has('parent_id') ? 'is-invalid' : '' }}">
    {!! Form::label('parent_id', 'Parent', array('class'=>'control-label')) !!}
        
        {!! Form::number('parent_id', old('parent_id'), array('class'=>'form-control','disabled'=> isset($view) ? true : false)) !!}
         @if ($errors->has('parent_id'))
                                                 <span class="invalid-feedback">
                                                 <strong>{{ $errors->first('parent_id') }}</strong>
                                                 </span>
                                             @endif
        

</div><div class="form-group {{ $errors->has('percent_completed') ? 'is-invalid' : '' }}">
    {!! Form::label('percent_completed', 'Percent Completed', array('class'=>'control-label')) !!}
    
        {!! Form::number('percent_completed', old('percent_completed'), array('step'=>'any', 'class'=>'form-control','disabled'=> isset($view) ? true : false)) !!}
         @if ($errors->has('percent_completed'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('percent_completed') }}</strong>
                                </span>
                            @endif
        

</div><div class="form-group {{ $errors->has('created_by') ? 'is-invalid' : '' }}">
    {!! Form::label('created_by', 'Created By', array('class'=>'control-label')) !!}
        
        {!! Form::number('created_by', old('created_by'), array('class'=>'form-control','disabled'=> isset($view) ? true : false)) !!}
         @if ($errors->has('created_by'))
                                                 <span class="invalid-feedback">
                                                 <strong>{{ $errors->first('created_by') }}</strong>
                                                 </span>
                                             @endif
        

</div><div class="form-group">
    {!! Form::label('active', 'Active', array('class'=>'control-label')) !!}
            
      <br>  {!! Form::checkbox('active', 1, old('active'), array('data-toggle'=>'toggle','disabled'=> isset($view) ? true : false)) !!}
        
</div><div class="form-group {{ $errors->has('weight') ? 'is-invalid' : '' }}">
    {!! Form::label('weight', 'Weight', array('class'=>'control-label')) !!}
    
        {!! Form::number('weight', old('weight'), array('step'=>'any', 'class'=>'form-control','disabled'=> isset($view) ? true : false)) !!}
         @if ($errors->has('weight'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('weight') }}</strong>
                                </span>
                            @endif
        

</div><div class="form-group {{ $errors->has('means_verification') ? 'is-invalid' : '' }}">
    {!! Form::label('means_verification', 'Means Verification', array('class'=>'control-label')) !!}
            
        {!! Form::text('means_verification', old('means_verification'), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
        @if ($errors->has('means_verification'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('means_verification') }}</strong>
            </span>
        @endif
        
</div><div class="form-group {{ $errors->has('evaluation') ? 'is-invalid' : '' }}">
    {!! Form::label('evaluation', 'Evaluation', array('class'=>'control-label')) !!}
            
        {!! Form::text('evaluation', old('evaluation'), array('class'=>'form-control','disabled'=> isset($view) ? true : false))  !!}
        @if ($errors->has('evaluation'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('evaluation') }}</strong>
            </span>
        @endif
        
</div>
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-md-12">
                  {!! Form::submit( 'Create' , array('class' => 'btn btn-primary')) !!}
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