@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.sharemeshi') }}
@endsection

@section('add-meta')
@endsection

@section('content')
@php
	$passwordPlaceholder = trans('app.password placeholder');
	$retypePasswordPlaceholder = trans('app.confirm password placeholder');
@endphp

<section id="" class="clearfix user-page">
	<div class="container">
		<div class="row text-center">
			<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<div class="user-account boxes-card">
					<h2>{{ trans('app.Change Password') }}</h2>
					{!! Form::open(['url' => '/password/changing/', 'method' => 'post', 'files'=>'true']) !!}
		                {{ Form::hidden('email_id',Crypt::encrypt($decripted_email),[]) }}
			            <div class="box-body">
							<div class="form-custom-group form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<label>{{ trans('app.New Password') }}</label>
								{{ Form::password('password',['class'=>'form-control createeventinput','placeholder'=>$passwordPlaceholder]) }}
				                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <span class="signup-error">{{ $errors->first('password') }}</span>
                                    </span>
                                @endif
			                </div>
			                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} form-custom-group">
								<label>{{ trans('app.Password Confirmation') }}</label>
								{{ Form::password('password_confirmation',['class'=>'form-control createeventinput','placeholder'=>$retypePasswordPlaceholder]) }}
				                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <span class="signup-error">{{ $errors->first('password_confirmation') }}</span>
                                    </span>
                                @endif
			                </div>
		                </div>
		              	<div class="box-footer text-center">
		                	<button class="btn btn-booking">{{ trans('app.Submit') }}</button>
		                </div>
		            {!! Form::close() !!}
            	</div>
			</div>
		</div>
	</div>
</section>

@endsection

@section('add-js')
@endsection
