@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.sharemeshi') }}
@endsection

@section('add-meta')
@endsection

@section('content')
@php $emailPlaceholder = trans('app.email placeholder');@endphp
	<section id="" class="clearfix user-page">
		<div class="container">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="user-account boxes-card">
						<h2>{{ trans('app.Forgot Password') }}</h2>
						<form method="POST" action="{{ route('user_send_mail') }}">
	                        {{ csrf_field() }}
	                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                        	<input type="email" class="form-control" name="email" value="{{ old('email') }}"  autofocus placeholder="{{$emailPlaceholder}}">
	                            @if ($errors->has('email'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('email') }}</strong>
	                                </span>
	                            @endif
							</div>
							<button type="submit" href="#" class="btn">{{ trans('app.Submit') }}</button>
                    	</form>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('add-js')
@endsection
