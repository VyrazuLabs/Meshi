@extends('layouts.master')

@section('title')
  Create Review
@endsection

@section('add-meta')
@endsection

@section('content')
    <div class="col-md-8">
      	<div class="box box-custom-main">
        	<!-- form start -->
            {!! Form::open(array('url' => route('save_review'))) !!}
            	@if(!empty($review))
                	{{ Form::model($review) }}
              	@endif
                {{Form::hidden('review_id',null)}}

              	<div class="box-body">
                  <div class="form-group form-custom-group">
                      <label>Choose User<span>*</span></label>
                      {!! Form::select('user_id', $user_id,null,['class' => 'form-control', 'placeholder' => 'Select User']) !!}
                      @if ($errors->has('user_id'))
                        <span class="help-block">
                          <strong class="strong">{{ $errors->first('user_id') }}</strong>
                        </span>
                      @endif
                    </div>
                    <div class="form-group form-custom-group">
                      <label>Reviewed By<span>*</span></label>
                      {!! Form::select('reviewed_by', $reviewed_by,null,['class' => 'form-control', 'placeholder' => 'Select User']) !!}
                      @if ($errors->has('reviewed_by'))
                        <span class="help-block">
                          <strong class="strong">{{ $errors->first('reviewed_by') }}</strong>
                        </span>
                      @endif
                    </div>
	                <div class="form-group form-custom-group">
	                  	<label>Review<span>*</span></label>
	                  	{!! Form::textarea('review', null, 
	                          array('class'=>'form-control', 
	                                'placeholder'=>'Enter Review','rows'=>'3')) !!}
	                  	@if ($errors->has('review'))
	                    	<span class="help-block">
	                      		<strong class="strong">{{ $errors->first('review') }}</strong>
	                    	</span>
	                  	@endif
	                </div>
	                <!-- /.box-body -->
	              </div>
                
                <div class="box-footer text-center">
                @if($form_type == 'create')
                 <button type="submit" class="btn btn-success btn-booking">Submit</button>
                
                @endif
                </div>
            {!! Form::close() !!}
      	</div>
    </div>
@endsection

@section('add-js')
@endsection