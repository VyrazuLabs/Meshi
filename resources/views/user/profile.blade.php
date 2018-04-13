@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.sharemeshi') }}
@endsection

@section('add-meta')
@endsection

@section('content')

<section id="" class="clearfix category-page">
	<div class="container">
		<div class="breadcrumb-section">
			<!-- breadcrumb -->
			<ol class="breadcrumb new-breadcrumb">
				<li><a href="{{ url('/')}}">{{ trans('app.HOME')}}</a></li>
				<li><a href="#">{{$user->name}}</a></li>
			</ol><!-- breadcrumb -->						
			<h2 class="title t-orange d-inline-block">{{ trans('app.Profile')}}</h2>
			@if(Auth::user())
				@if($user->user_id == Auth::User()->user_id)
					<a href="{{route('edit_profile_details',['user_id' => Auth::User()->user_id])}}"><button class="btn back-orange t-white edit-profile-btn float-right"><i class="fa fa-edit"></i> {{ trans('app.EDIT PROFILE') }}</button></a>
					
				@endif
			@endif
		</div>
		<div class="category-info">	
			<div class="col-sm-12 col-md-12 text-center profile-box p-0">				
				<div class="recommended-ads">
				@if(!empty($user->cover_image))
					<?php $url = url('/uploads/cover/picture/'.$user->cover_image); ?>
				@else 
					<?php $url = url('/frontend/images/cover-image.jpg'); ?>
				@endif
					<div class="col-lg-12 col-xs-12 p-0 profilecover-imgs">
						<div class="col-lg-12 col-xs-12 profile-section profile-back" style="background-image: url(<?php echo $url;?>);">
							<!-- <div class="col-md-9 profile-image-div text-center">
								@if(!empty($user->image))
									<img src="{{url('/uploads/profile/picture/'.$user->image)}}" class="img-circle profile-images">
								@else
									<img src="{{url('/uploads/profile/picture/'.$food->image)}}" class="img-circle">
								@endif
							</div> -->
						</div>
					</div>

				

					<!-- <div class="col-lg-12 col-12  profile-section profile-back"> -->
						<!-- <div class="profile-image-div text-center"> -->
							<!-- <div>
								@if(!empty($user->image))
									<img src="{{url('/uploads/profile/picture/'.$user->image)}}" class="img-circle profile-images">
								@else
									<img src="{{url('/uploads/profile/picture/'.$food->image)}}" class="img-circle">
								@endif
							</div> -->
							<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 profile-descriptions">

								<p class="profile-title profile-head-title">{{$user->name}}</p>
								<p class="">@php echo nl2br($user->description); @endphp</p>
							</div>
						<!-- </div> -->
						<div class="col-md-4 profile-timeline">
							<div class="col-md-6">
								<p class="timeline-numbers mb-0">{{$user->total_dishes}}</p>
								<p class="t-black">{{ trans('app.Dishes')}}</p>
							</div>
							<!-- <div class="col-md-4">
								<p class="timeline-numbers mb-0">105</p>
								<p class="t-black">Favourites</p>
							</div> -->
							<div class="col-md-6">
								<p class="timeline-numbers mb-0">{{count($reviews)}}</p>
								<p class="t-black">{{ trans('app.Reviews') }}</p>
								<!-- <div class="rating">
									<span class="t-black">
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
									<span class="t-black">
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
									<span class="t-black">
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
									<span class="t-black">
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
									<span class="t-black">
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
								</div> -->
							</div>
						</div>
					<!-- </div> -->
					<div class="col-lg-12 col-12 p-0 profile-description">
						<div class="col-md-8 float-none profileplace-name">
							<div class="col-md-6">
								<p><strong>{{ trans('app.Nickname') }} :</strong><span> {{ $user->nick_name }}</span></p>
							</div>
							<!-- <div class="col-md-3">
								<p><strong>EmailId :</strong><span> {{$user->email}}</span></p>
							</div>
							<div class="col-md-3">
								<p><strong>Phone No. :</strong><span> {{$user->phone_number}}</span></p>
							</div> -->
							<div class="col-md-6">
								<p><strong>{{ trans('app.Deliverable Area') }} :</strong>
									<span> 
										{{$user->deliverable_area}}
									</span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			@if(!empty($user->video_link))
				<div class="col-sm-12 col-md-12 text-center profile-box section">
					<h4 class="text-left t-black mt-0">{{ trans('app.Share Video') }}</h4>
					<div class="embed-responsive embed-responsive-16by9">
						<?php echo $user->video_link ?>
					</div>
					<!-- < ! width="100%" height="480" src="https://www.youtube.com/embed/KGBxpefNqvw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> -->
				</div>
			@endif
			@if(count($food_items)>0)
			<div class="col-sm-12 col-md-12 text-center profile-box section">
				<h4 class="text-left t-black mt-0">{{ trans('app.Schedule') }}</h4>
				<div class="row">
					@if(!empty($food_items))
						@foreach($food_items as $food)
							<!-- featured -->
							<div class="col-md-4 col-lg-3">
								<!-- featured -->
								<div class="featured">
									<div class="featured-image">
										<a href="{{route('food_details',['food_item_id' => $food->food_item_id])}}">
											@if(!empty($food->foodImages))
												<img src="{{url('/uploads/food/'.$food->foodImages[0])}}" alt="" class="img-respocive images-featured">
											@else
												<img src="{{ url('frontend/images/featured/food1.png') }}" alt="" class="img-respocive">
											@endif
										</a>
										<!-- <a href="#" class="verified" data-toggle="tooltip" data-placement="top" title="Verified"><i class="fa fa-check-square-o"></i></a> -->
									</div>
									
									<!-- ad-info -->
									<div class="ad-info">
										<h3 class="item-price">&yen;{{$food->price}}</h3>
										<h4 class="item-title">{{$food->item_name}}</h4>
										<div class="item-cat">
											<span>{{$food->category_name}}</span> 
										</div>
									</div><!-- ad-info -->
									
									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated">{{$food->date}}</span>
										</div>									
										<!-- item-info-right -->
										<!-- <div class="user-option pull-right">
											<a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
											<a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-suitcase"></i> </a>											
										</div> --><!-- item-info-right -->
									</div><!-- ad-meta -->
								</div><!-- featured -->
							</div><!-- featured -->
						@endforeach
					@endif
				</div>
			</div>
			@endif
			@if(count($reviews)>0)
				<div class="col-lg-12 col-xs-12 text-center profile-box section">
					<h4 class="text-left t-black mt-0">{{ trans('app.Review') }}</h4>
					@foreach($reviews as $review)
						<div class="col-lg-12 col-xs-12 p-0 review-main-div">
						<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12 p-0">
							<div class="review-img-div float-left">
								@if(!empty($review->reviewed_by_image))
									<img src="{{url('/uploads/profile/picture/'.$review->reviewed_by_image)}}" class="img-responsive">
								@else
									<img src="{{ url('frontend/images/Food-creator-sm1.png') }}" class="img-circle review-image">
								@endif
							</div>
						</div>
						<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12 p-0">
							<p class="mb-0 text-left t-black">{{$review->age}},{{$review->gender}}</p>
							<p class="text-left">
								{{$review->review}}
							</p>
						</div>
						</div>
					@endforeach
				</div>
			@endif
			@if(!empty($user->user_introduction))
			<div class="col-lg-12 col-xs-12 text-center profile-box section">
				<h4 class="text-left t-black mt-0">{{ trans('app.Introduction') }}</h4>
				<p class="text-left">
					{{$user->user_introduction}}
				</p>
			</div>
			@endif
			@if(!empty($user->profile_message))
			<div class="col-lg-12 col-xs-12 text-center profile-box section">
				<h4 class="text-left t-black mt-0">{{ trans('app.Message From') }}&nbsp;{{ trans('app.Share') }}&nbsp;{{ trans('app.Meshi') }}</h4>
				<div class="col-lg-12 col-xs-12 p-0">
					<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12 message-logo-div">
						<img src="{{ url('frontend/images/Logo.png') }}" class="img-responsive">
					</div>
					<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12 p-0">
						<p class="text-left">
							{{$user->profile_message}}
						</p>
					</div>
				</div>
			</div>
			@endif
		</div>
	</div>
</section>
@endsection

@section('add-js')	
@endsection