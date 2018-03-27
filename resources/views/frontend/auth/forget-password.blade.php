@extends('frontend.layouts.master')

@section('title')
  ShareMeshi
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
						<h2>Forget Password</h2>
						<!-- form -->
						
						<form method="POST" action="{{ route('user_send_mail') }}">
	                        {{ csrf_field() }}

	                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}"  autofocus placeholder="Enter your email id">

	                            @if ($errors->has('email'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('email') }}</strong>
	                                </span>
	                            @endif
							</div>
							<button type="submit" href="#" class="btn">Submit</button>
                    	</form>
					</div>
					<!-- <a href="#" class="btn-primary">Create a New Account</a> -->
				</div><!-- user-login -->			
			</div><!-- row -->	
		</div><!-- container -->
	</section><!-- signin-page -->
	

@endsection

@section('add-js')	
@endsection