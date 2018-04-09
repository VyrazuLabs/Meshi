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

			<!-- gmap -->
			<div id="gmap"></div>
			<div class="corporate-info">
				<div class="row">
					<!-- contact-info -->
					<div class="col-sm-4">
						<div class="contact-info">
							<h2>{{ trans('app.Corporate Info') }}</h2>
							<address>
								<p><strong>{{ trans('app.Address') }}: </strong>1234 Street Name, City Name, Country</p>
								<p><strong>{{ trans('app.Phone') }}:</strong> <a href="#">(123) 456-7890</a></p>
								<p><strong>{{ trans('app.Email') }}: </strong><a href="#">info@company.com</a></p>
							</address>
							<ul class="social">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div><!-- contact-info -->
					@php 
	                	$name = trans('app.Name'); 
	                	$emailId = trans('app.Email'); 
	                	$subject = trans('app.Subject');
	                	$message = trans('app.Message'); 
	                @endphp

					<!-- feedback -->
					<div class="col-sm-8">
						<div class="feedback">
							<h2>{{ trans('app.Send Us Your Feedback') }}</h2>
							{!! Form::open(array('url' => route('send_feedback'),'class' => 'contact-form')) !!}
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											{!! Form::text('name', null, array('class'=>'form-control', 'placeholder' => $name)) !!}
											@if ($errors->has('name'))
											  	<span class="help-block">
											      <strong class="strong t-red">{{ $errors->first('name') }}</strong>
											  	</span>
											@endif
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											{!! Form::email('email', null, 
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
											{!! Form::text('subject', null, array('class'=>'form-control', 'placeholder' => $subject)) !!}
											@if ($errors->has('subject'))
											  	<span class="help-block">
											      <strong class="strong t-red">{{ $errors->first('subject') }}</strong>
											  	</span>
											@endif
										</div> 
									</div> 
									
									<div class="col-sm-12">
										<div class="form-group">
											{!! Form::textarea('message', null, array('class'=>'form-control', 'placeholder' => $message,'rows' => '7')) !!}
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