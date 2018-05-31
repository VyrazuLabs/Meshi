@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.Terms & conditions') }}
@endsection

@section('add-meta')

@endsection

@section('content')
	
	<section id="" class="clearfix category-page main-categories">
		<div class="container">
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb new-breadcrumb">
					<li><a href="#">Home</a></li>
					<li><a href="#">For beginner of sharemeshi</a></li>
					
				</ol><!-- breadcrumb -->		
				<h2 class="title d-inline-block t-orange">For beginner of sharemeshi</h2>				
			</div>
			<!-- for food creator -->
			<div class="col-lg-12 col-xs-12 p-0">
				<h5 class="title d-inline-block t-black">For Food Creator</h5>
				<div class="col-lg-12 col-xs-12 mb-0 section cart-section support-main-box">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p-0">
						<p class="t-orange beginner-step-title">Step 1</p>
						<p class="t-orange beginner-step-sub-text">You can use this time whenever you're free(available time)</p>
						<p class="t-black beginner-step-description">Please confirm your available date & time to deliver food.Even if you make your food too much you can deeliver it to food eater.</p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0">
						<img src="frontend/images/creator-step1.png" class="img-responsive beginner-right-img">
					</div>
				</div>
				<div class="col-lg-12 col-xs-12 text-center beginner-step-arrow-box">
					<i class="fa fa-angle-down beginner-arrow-down" aria-hidden="true"></i>
				</div>
				<div class="col-lg-12 col-xs-12 mb-0 section cart-section support-main-box">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p-0">
						<p class="t-orange beginner-step-title">Step 2</p>
						<p class="t-orange beginner-step-sub-text">Upload your food</p>
						<p class="t-black beginner-step-description">Please upload the food you always make too muchYou can upload the food you always make or you're good at.</p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0">
						<img src="frontend/images/creator-step2.png" class="img-responsive beginner-right-img">
					</div>
				</div>
				<div class="col-lg-12 col-xs-12 text-center beginner-step-arrow-box">
					<i class="fa fa-angle-down beginner-arrow-down" aria-hidden="true"></i>
				</div>
				<div class="col-lg-12 col-xs-12 mb-0 section cart-section support-main-box">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p-0">
						<p class="t-orange beginner-step-title">Step 3</p>
						<p class="t-orange beginner-step-sub-text">Deliver the food to eater.</p>
						<p class="t-black beginner-step-description">When you got the order,please deliver the food to food eater.</p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0">
						<img src="frontend/images/creator-step3.png" class="img-responsive beginner-right-img">
					</div>
				</div>
				<div class="col-lg-12 col-xs-12 text-center beginner-step-arrow-box">
					<i class="fa fa-angle-down beginner-arrow-down" aria-hidden="true"></i>
				</div>
				<div class="col-lg-12 col-xs-12 mb-0 section cart-section support-main-box">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p-0">
						<p class="t-orange beginner-step-title">Step 4</p>
						<p class="t-orange beginner-step-sub-text">Write Review</p>
						<p class="t-black beginner-step-description">Please write review with many appreciate.</p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0">
						<img src="frontend/images/creator-step4.png" class="img-responsive beginner-right-img">
					</div>
				</div>
			</div>
			<!-- for food eater -->
			<div class="col-lg-12 col-xs-12 p-0">
				<h5 class="title d-inline-block t-black">For Food Eater</h5>
				<div class="col-lg-12 col-xs-12 mb-0 section cart-section support-main-box">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p-0">
						<p class="t-orange beginner-step-title">Step 1</p>
						<p class="t-orange beginner-step-sub-text">Select the food you want to eat</p>
						<p class="t-black beginner-step-description">Please Select the food you want to eat.</p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0">
						<img src="frontend/images/eater-step1.png" class="img-responsive beginner-right-img">
					</div>
				</div>
				<div class="col-lg-12 col-xs-12 text-center beginner-step-arrow-box">
					<i class="fa fa-angle-down beginner-arrow-down" aria-hidden="true"></i>
				</div>
				<div class="col-lg-12 col-xs-12 mb-0 section cart-section support-main-box">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p-0">
						<p class="t-orange beginner-step-title">Step 2</p>
						<p class="t-orange beginner-step-sub-text">Specify time and number of food</p>
						<p class="t-black beginner-step-description">Please select the time and number.Food creator will deliver your house. If you want to deliver your another place, you can contact us to tell us.</p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0">
						<img src="frontend/images/eater-step2.png" class="img-responsive beginner-right-img">
					</div>
				</div>
				<div class="col-lg-12 col-xs-12 text-center beginner-step-arrow-box">
					<i class="fa fa-angle-down beginner-arrow-down" aria-hidden="true"></i>
				</div>
				<div class="col-lg-12 col-xs-12 mb-0 section cart-section support-main-box">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p-0">
						<p class="t-orange beginner-step-title">Step 3</p>
						<p class="t-orange beginner-step-sub-text">Receive the food.</p>
						<p class="t-black beginner-step-description">Food creator will deliver the food to your house at the time. Please enjoy the food and communication with food creator.</p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0">
						<img src="frontend/images/eater-step3.png" class="img-responsive beginner-right-img">
					</div>
				</div>
				<div class="col-lg-12 col-xs-12 text-center beginner-step-arrow-box">
					<i class="fa fa-angle-down beginner-arrow-down" aria-hidden="true"></i>
				</div>
				<div class="col-lg-12 col-xs-12 mb-0 section cart-section support-main-box">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p-0">
						<p class="t-orange beginner-step-title">Step 4</p>
						<p class="t-orange beginner-step-sub-text">Make Review</p>
						<p class="t-black beginner-step-description">Please write review for food creator.</p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0">
						<img src="frontend/images/eater-step4.png" class="img-responsive beginner-right-img">
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('add-js')
@endsection