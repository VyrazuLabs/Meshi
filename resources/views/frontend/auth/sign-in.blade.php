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
						<h2>{{ trans('app.User') }} {{ trans('app.Login') }}</h2>
						<!-- form -->
						
						<form method="POST" action="{{ route('authentication') }}">
	                        {{ csrf_field() }}

	                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}"  autofocus>

	                            @if ($errors->has('email'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('email') }}</strong>
	                                </span>
	                            @endif
							</div>

							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<input type="password" class="form-control" name="password" value="{{ old('password') }}"  >

	                            @if ($errors->has('password'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('password') }}</strong>
	                                </span>
	                            @endif
							</div>

							
							<!-- forgot-password -->
							<div class="user-option">
                                <div class="checkbox pull-left">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ trans('app.Keep Me Logged In') }}
                                    </label>
                                </div>
								<div class="pull-right forgot-password">
									<a href="#">{{ trans('app.Forgot Your Password') }}?</a>
								</div>
							</div><!-- forgot-password -->
							<button type="submit" href="#" class="btn">{{ trans('app.Login') }}</button>
                    	</form>
                    	{{ trans('app.Do not have an account') }}? <a href="{{ url('/user/register') }}">{{ trans('app.Sign Up here') }}</a>
					</div>
					<!-- <a href="#" class="btn-primary">Create a New Account</a> -->
				</div><!-- user-login -->			
			</div><!-- row -->	
		</div><!-- container -->
	</section><!-- signin-page -->
	

@endsection

@section('add-js')	
@endsection