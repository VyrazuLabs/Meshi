@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.Beginners Tutorial') }}
@endsection

@section('add-meta')

@endsection

@section('content')

	<section id="" class="clearfix category-page main-categories">
		<div class="container">
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb new-breadcrumb">
					<li class="t-orange"><a href="{{ url('/')}}">{{ trans('app.HOME')}}</a></li>
					<li class="t-orange"><a href="{{ route('beginners_tutorial')}}">{{ trans('app.For beginner of sharemeshi')}}</a></li>
				</ol><!-- breadcrumb -->
				<h2 class="title d-inline-block t-orange">{{ trans('app.For beginner of sharemeshi')}}</h2>
			</div>
			<div class="col-lg-12 col-xs-12 p-0 text-center">
				<ul class="nav nav-pills d-inline-block beginner-nav-pill">
			    	<li class="active"><a data-toggle="pill" href="#beginner_creator_box">{{ trans('app.For Creator')}}</a></li>
			    	<li><a data-toggle="pill" href="#beginner_eater_box">{{ trans('app.For Eater')}}</a></li>
			  	</ul>

			  	<div class="tab-content">
				    <div id="beginner_creator_box" class="tab-pane fade in active text-left">
				      	<!-- for food creator -->
						<div class="col-lg-12 col-xs-12 p-0">
							<p class="title d-inline-block t-black beginners-food-creator-title">{{ trans('app.For Food Creator') }}</p>
							<div class="col-lg-12 col-xs-12 mb-0 section cart-section support-main-box">
								<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p-0">
									<p class="t-orange beginner-step-title">{{ trans('app.Step 1') }}</p>
									<p class="t-orange beginner-step-sub-text">{{ trans('app.creator available time title step1') }}</p>
									<p class="t-black beginner-step-description">{{ trans('app.creator available time description step1') }}</p>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0">
									<img src="{{ url('frontend/images/creator-step1.png') }}" class="img-responsive beginner-right-img">
								</div>
							</div>
							<div class="col-lg-12 col-xs-12 text-center beginner-step-arrow-box">
								<i class="fa fa-angle-down beginner-arrow-down" aria-hidden="true"></i>
							</div>
							<div class="col-lg-12 col-xs-12 mb-0 section cart-section support-main-box">
								<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p-0">
									<p class="t-orange beginner-step-title">{{ trans('app.Step 2') }}</p>
									<p class="t-orange beginner-step-sub-text">{{ trans('app.creator upload food title step 2') }}</p>
									<p class="t-black beginner-step-description">{{ trans('app.creator upload food description step 2') }}</p>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0">
									<img src="{{ url('frontend/images/creator-step2.png') }}" class="img-responsive beginner-right-img">
								</div>
							</div>
							<div class="col-lg-12 col-xs-12 text-center beginner-step-arrow-box">
								<i class="fa fa-angle-down beginner-arrow-down" aria-hidden="true"></i>
							</div>
							<div class="col-lg-12 col-xs-12 mb-0 section cart-section support-main-box">
								<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p-0">
									<p class="t-orange beginner-step-title">{{ trans('app.Step 3') }}</p>
									<p class="t-orange beginner-step-sub-text">{{ trans('app.creator deliver food title step 3') }}</p>
									<p class="t-black beginner-step-description">{{ trans('app.creator deliver food description step 3') }}</p>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0">
									<img src="{{ url('frontend/images/creator-step3.png') }}" class="img-responsive beginner-right-img">
								</div>
							</div>
							<div class="col-lg-12 col-xs-12 text-center beginner-step-arrow-box">
								<i class="fa fa-angle-down beginner-arrow-down" aria-hidden="true"></i>
							</div>
							<div class="col-lg-12 col-xs-12 mb-0 section cart-section support-main-box">
								<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p-0">
									<p class="t-orange beginner-step-title">{{ trans('app.Step 4') }}</p>
									<p class="t-orange beginner-step-sub-text">{{ trans('app.creator write review title step 4') }}</p>
									<p class="t-black beginner-step-description">{{ trans('app.creator write review description step 4') }}</p>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0">
									<img src="{{ url('frontend/images/creator-step4.png') }}" class="img-responsive beginner-right-img">
								</div>
							</div>
						</div>
				 	</div>
				    <div id="beginner_eater_box" class="tab-pane fade text-left">
						<!-- for food eater -->
						<div class="col-lg-12 col-xs-12 p-0">
							<p class="title d-inline-block t-black beginners-food-creator-title">{{ trans('app.For Food Eater') }}</p>
							<div class="col-lg-12 col-xs-12 mb-0 section cart-section support-main-box">
								<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p-0">
									<p class="t-orange beginner-step-title">{{ trans('app.Step 1') }}</p>
									<p class="t-orange beginner-step-sub-text">{{ trans('app.eater select food title step1') }}</p>
									<p class="t-black beginner-step-description">{{ trans('app.eater select food description step1') }}</p>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0">
									<img src="{{ url('frontend/images/eater-step1.png') }}" class="img-responsive beginner-right-img">
								</div>
							</div>
							<div class="col-lg-12 col-xs-12 text-center beginner-step-arrow-box">
								<i class="fa fa-angle-down beginner-arrow-down" aria-hidden="true"></i>
							</div>
							<div class="col-lg-12 col-xs-12 mb-0 section cart-section support-main-box">
								<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p-0">
									<p class="t-orange beginner-step-title">{{ trans('app.Step 2') }}</p>
									<p class="t-orange beginner-step-sub-text">{{ trans('app.eater specify time title step 2') }}</p>
									<p class="t-black beginner-step-description">{{ trans('app.eater specify time description step 2') }}</p>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0">
									<img src="{{ url('frontend/images/eater-step2.png') }}" class="img-responsive beginner-right-img">
								</div>
							</div>
							<div class="col-lg-12 col-xs-12 text-center beginner-step-arrow-box">
								<i class="fa fa-angle-down beginner-arrow-down" aria-hidden="true"></i>
							</div>
							<div class="col-lg-12 col-xs-12 mb-0 section cart-section support-main-box">
								<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p-0">
									<p class="t-orange beginner-step-title">{{ trans('app.Step 3') }}</p>
									<p class="t-orange beginner-step-sub-text">{{ trans('app.eater receive food title step 3') }}</p>
									<p class="t-black beginner-step-description">{{ trans('app.eater receive food description step 3') }}</p>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0">
									<img src="{{ url('frontend/images/eater-step3.png') }}" class="img-responsive beginner-right-img">
								</div>
							</div>
							<div class="col-lg-12 col-xs-12 text-center beginner-step-arrow-box">
								<i class="fa fa-angle-down beginner-arrow-down" aria-hidden="true"></i>
							</div>
							<div class="col-lg-12 col-xs-12 mb-0 section cart-section support-main-box">
								<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p-0">
									<p class="t-orange beginner-step-title">{{ trans('app.Step 4') }}</p>
									<p class="t-orange beginner-step-sub-text">{{ trans('app.eater make review title step 4') }}</p>
									<p class="t-black beginner-step-description">{{ trans('app.eater make review description step 4') }}</p>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0">
									<img src="{{ url('frontend/images/eater-step4.png') }}" class="img-responsive beginner-right-img">
								</div>
							</div>
						</div>
				    </div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('add-js')
@endsection
