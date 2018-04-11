@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.sharemeshi') }}
@endsection

@section('add-meta')
@endsection

@section('content')

<!-- signin-page -->
	<section id="" class="clearfix user-page">
		<div class="container">
			<div class="row text-center">
				<!-- user-login -->			
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="user-account boxes-card">
						<h2>Change Password</h2>
						<!-- form -->
						
						{!! Form::open(['url' => '/password/changing/', 'method' => 'post', 'files'=>'true']) !!}
			                {{ Form::hidden('email_id',Crypt::encrypt($decripted_email),[]) }}

			              <div class="box-body">
							<div class="form-group form-custom-group">
			                  	{{ Form::label('password','New Password') }}
								{{ Form::password('password',['id'=>'fblink','class'=>'form-control profileinput createeventinput','placeholder'=>'Enter new password']) }}

				                @if ($errors->has('password'))
				                                    <span class="help-block">
				                                        <span class="signup-error">{{ $errors->first('password') }}</span>
				                                    </span>
				                                @endif
			                </div>
			                <div class="form-group form-custom-group">
			                  	{{ Form::label('confirm_password','Confirm Password') }}
			                  	
								{{ Form::password('confirm_password',['id'=>'fblink','class'=>'form-control profileinput createeventinput','placeholder'=>'Confirm your password']) }}
				                @if ($errors->has('confirm_password'))
				                                    <span class="help-block">
				                                        <span class="signup-error">{{ $errors->first('confirm_password') }}</span>
				                                    </span>
				                                @endif
			                </div>
		                </div>
			              
			              	<div class="box-footer text-center">
			                  {{ Form::submit('Change Password',['class'=>'btn btn-booking']) }}
			                </div>
			            {!! Form::close() !!}
	                <!-- /.box-body -->
	            </div>



					</div>
					<!-- <a href="#" class="btn-primary">Create a New Account</a> -->
				</div><!-- user-login -->			
			</div><!-- row -->	
		</div><!-- container -->
	</section><!-- signin-page -->
	

@endsection

@section('add-js')	
@endsection