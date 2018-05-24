@extends('layouts.master')

@section('title')
Edit Profile
@endsection

@section('add-meta')
@endsection
@section('content')
<div class="col-md-8">
  	<div class="box box-custom-main">
    	<!-- form start -->
        {!! Form::open(array('url' => route('update_admin'))) !!}
        	 @if(!empty($user))
            	{{ Form::model($user) }}
          	@endif
            {{Form::hidden('user_id',null)}}
          	<div class="box-body">
                <div class="form-group form-custom-group">
                  	<label>Name <span>*</span></label>
					{!! Form::text('name', null,
					    array(
					          'class'=>'form-control',
					          'placeholder'=>'Enter Full Name')) !!}
					@if ($errors->has('name'))
					  	<span class="help-block">
					    	<strong class="strong t-red">{{ $errors->first('name') }}</strong>
					  	</span>
					@endif
                </div>
                <div class="form-group form-custom-group">
                  	<label>Nick Name <span>*</span></label>
					{!! Form::text('nick_name', null,
					    array(
					          'class'=>'form-control',
					          'placeholder'=>'Enter Nick Name')) !!}
					@if ($errors->has('nick_name'))
					  	<span class="help-block">
					    	<strong class="strong t-red">{{ $errors->first('nick_name') }}</strong>
					  	</span>
					@endif
                </div>
                <div class="form-group form-custom-group">
                  <label>Email <span>*</span></label>
                	{!! Form::text('email', null,
                      		array('class'=>'form-control',
                            'placeholder'=>'Enter Email')) !!}
                  @if ($errors->has('email'))
                    <span class="help-block">
                    	<strong class="strong t-red">{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group form-custom-group">
                  	<label>Password <span>*</span></label>
                    {!! Form::password('password',
		              						array( 'class'=>'form-control',
		              								'placeholder'=>'Enter Password')) !!}
	                @if ($errors->has('password'))
	                    <span class="help-block">
	                    	<strong class="strong t-red">{{ $errors->first('password') }}</strong>
	                    </span>
	                @endif
                </div>
                <div class="form-group form-custom-group">
                  	<label> Status<span>*</span></label>
                  	{{ Form::select('status', ['0' => 'Inactive', '1' => 'Active'], null, ['placeholder' => '-- Select A Status --', 'class' => 'form-control']) }}
                  	@if ($errors->has('status'))
                    	<span class="help-block">
                      		<strong class="strong t-red">{{ $errors->first('status') }}</strong>
                    	</span>
                  	@endif
                </div>
            	<div class="box-footer text-center">
            		<button type="submit" id="create_user_submit" class="btn btn-success">Submit</button>
            	</div>
  			</div>
        {!! Form::close() !!}
	</div>
</div>
@endsection

@section('add-js')

@endsection
