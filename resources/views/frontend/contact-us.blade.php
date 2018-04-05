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
					
					<!-- feedback -->
					<div class="col-sm-8">
						<div class="feedback">
							<h2>{{ trans('app.Send Us Your Feedback') }}</h2>
							<form id="contact-form" class="contact-form" name="contact-form" method="post" action="#">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" required="required">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<input type="email" class="form-control" required="required">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="text" class="form-control" required="required">
										</div> 
									</div> 
									
									<div class="col-sm-12">
										<div class="form-group">
											<textarea name="message" id="message" required="required" class="form-control" rows="7" ></textarea>
										</div>             
									</div>     
								</div>
								<div class="form-group">
									<button type="submit" class="btn">{{ trans('app.Submit Your Message') }}</button>
								</div>
							</form>
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