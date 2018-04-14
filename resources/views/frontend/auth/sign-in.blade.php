@extends('frontend.layouts.master')

@section('title')
	{{ trans('app.sharemeshi') }}
@endsection

@section('add-meta')
@endsection

@section('content')

<!-- signin-page -->
	<section id="" class="clearfix user-page sign-back">
		<div class="container">
			<div class="row text-center">
				<!-- user-login -->			
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="user-account boxes-card signin-box">
						<h2>{{ trans('app.User') }} {{ trans('app.Login') }}</h2>
						<!-- form -->
						
						@if(Session::has('login_status'))
            				<p class="alert alert-danger load-limit">{{ Session::get('login_status') }}</p>
        				@endif
        				@if(Session::has('inactive_status'))
            				<p class="alert alert-danger load-limit">{{ Session::get('inactive_status') }}</p>
        				@endif
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
							<button type="submit" href="#" class="btn signin-btn">{{ trans('app.Login') }}</button>
                    	</form>
                    	{{ trans('app.Do not have an account') }}? 
                    	<a href="{{ url('/user/register') }}">{{ trans('app.Sign Up here') }}</a>
					</div>
					<!-- <a href="#" class="btn-primary">Create a New Account</a> -->
				</div><!-- user-login -->			
			</div><!-- row -->	
		</div><!-- container -->
	</section><!-- signin-page -->
 {!! Session::forget('login_status'); !!}
 {!! Session::forget('inactive_status'); !!}
 

	

@endsection

@section('add-js')	
@endsection