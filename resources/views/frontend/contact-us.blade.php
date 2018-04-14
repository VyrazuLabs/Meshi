@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.Contact Us') }}
@endsection

@section('add-meta')

@endsection

@section('content')
	<section id="" class="clearfix contact-us">
		<div class="container">
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb new-breadcrumb">
					<li class="t-orange"><a href="{{ url('/')}}">{{ trans('app.HOME')}}</a></li>
					<li class="t-orange"><a href="{{route('contact_us')}}">{{ trans('app.Contact Us') }}</a></li>
				</ol><!-- breadcrumb -->						
				<h2 class="title d-inline-block t-orange">{{ trans('app.Contact Us') }}</h2>
			</div>

			<div class="corporate-info">
				<div class="row">
					@php
	                	$name = trans('app.Name'); 
	                	$emailId = trans('app.Email'); 
	                	$subject = trans('app.Subject');
	                	$message = trans('app.Message'); 
	                @endphp

					<!-- feedback -->
					<div class="col-sm-12">
						<div class="feedback">
							<h2>{{ trans('app.Send Us Your Feedback') }}</h2>
							{!! Form::open(array('url' => route('send_feedback'),'class' => 'contact-form')) !!}
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											{!! Form::text('name', 'test', array('class'=>'form-control', 'placeholder' => $name)) !!}
											@if ($errors->has('name'))
											  	<span class="help-block">
											      <strong class="strong t-red">{{ $errors->first('name') }}</strong>
											  	</span>
											@endif
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											{!! Form::email('email', 'a.imanaga@gmail.com',
				                          		array('class'=>'form-control','placeholder' => $emailId)) !!}
				                          	@if ($errors->has('email'))
											  	<span class="help-block">
											      <strong class="strong t-red">{{ $errors->first('email') }}</strong>
											  	</span>
											@endif
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											{!! Form::text('subject', 'title', array('class'=>'form-control', 'placeholder' => $subject)) !!}
											@if ($errors->has('subject'))
											  	<span class="help-block">
											      <strong class="strong t-red">{{ $errors->first('subject') }}</strong>
											  	</span>
											@endif
										</div> 
									</div> 
									
									<div class="col-sm-12">
										<div class="form-group">
											{!! Form::textarea('message', 'aabb', array('class'=>'form-control', 'placeholder' => $message,'rows' => '7')) !!}
											@if ($errors->has('message'))
											  	<span class="help-block">
											      <strong class="strong t-red">{{ $errors->first('message') }}</strong>
											  	</span>
											@endif
										</div>             
									</div>     
								</div>
								<div class="form-group">
									<button type="submit" class="btn">{{ trans('app.Submit Your Message') }}</button>
								</div>
							{!! Form::close() !!}
						</div>				
					</div><!-- feedback -->				
				</div><!-- row -->
			</div>
		</div><!-- container -->
	</section><!-- main -->
@endsection

@section('add-js')
<script src="{{ url('frontend/js/map.js') }}"></script>
@endsection