@extends('layouts.master')

@section('title')
@if($form_type == 'edit')
	Edit News
@else
  	Add News
@endif
@endsection

@section('add-meta')
@endsection

@section('content')
<div class="col-md-8">
      	<div class="box box-custom-main">
        	<!-- form start -->
            {!! Form::open(array('url' => route('save_news'))) !!}
            	@if(!empty($news_details))
                	{{ Form::model($news_details) }}
                	{{Form::hidden('news_id',null)}}
              	@endif
              	<div class="box-body">
	                <div class="form-group form-custom-group">
                  		<label>Title <span>*</span>
                  		</label>
						{!! Form::text('title', null,
						    array(
						          'class'=>'form-control c-counter',
						          'placeholder'=>'Enter Title')) !!}
						@if ($errors->has('title'))
						  	<span class="help-block strong t-red">
						      <strong class="strong">{{ $errors->first('title') }}</strong>
						  	</span>
						@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  	<label>Contents<span>*</span></label>
	                  	{!! Form::textarea('contents', null,
	                          array('class'=>'form-control',
	                                'placeholder'=>'Write Contents here')) !!}
	                  	@if ($errors->has('contents'))
	                    	<span class="help-block strong t-red">
	                      		<strong class="strong">{{ $errors->first('contents') }}</strong>
	                    	</span>
	                  	@endif
	                </div>
	                <div class="form-group form-custom-group">
                    	<label>New</label>
                    	{{ Form::checkbox('highlight') }}
                  	</div>
	                <div class="form-group form-custom-group">
	                  <label>Status<span>*</span></label>
	                  {{ Form::select('status', ['1' => 'Active','0' => 'Inactive', ], null, ['placeholder' => '-- Select A Status --', 'class' => 'form-control']) }}
	                  @if ($errors->has('status'))
	                    <span class="help-block strong t-red">
	                      <strong class="strong">{{ $errors->first('status') }}</strong>
	                    </span>
	                  @endif
	                </div>
	                <div class="form-group form-custom-group">
		                <label>Date of News <span>*</span></label>
		                {!! Form::text('date', null, [
		                                    'class' => 'form-control', 'id' => 'datePicker']) !!}
		                @if ($errors->has('date'))
		                  <span class="help-block error">
		                    <strong class="strong">{{ $errors->first('date') }}</strong>
		                  </span>
		                @endif
		            </div>
	                <!-- /.box-body -->
	            </div>
                <div class="box-footer text-center">
                  <button type="submit" class="btn btn-success btn-booking">Submit</button>
                </div>
            {!! Form::close() !!}
      	</div>
    </div>
@endsection

@section('add-js')
<script type="text/javascript">
	//Date picker
  	$('#datePicker').datepicker({
    	format: 'yyyy-mm-dd',
    	autoclose: true,
    	todayHighlight: true,
  	});
</script>
@endsection
