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
					<?php $url = url('/uploads/cover/picture/' . $user->cover_image);?>
				@else
					<?php $url = url('/frontend/images/cover-image.jpg');?>
				@endif
					<div class="col-lg-12 col-xs-12 p-0 profilecover-imgs">
						<div class="col-lg-12 col-xs-12 profile-section profile-back" style="background-image: url(<?php echo $url; ?>);">
							<!-- <div class="col-md-9 profile-image-div text-center">

								@if(!empty($user->image))
									<img src="{{url('/uploads/profile/picture/'.$user->image)}}" class="img-circle">
								@endif
							</div> -->
						</div>
					</div>



					<!-- <div class="col-lg-12 col-12  profile-section profile-back"> -->
						<!-- <div class="profile-image-div text-center"> -->
							<!-- <div>
								@if(!empty($user->image))
									<img src="{{url('/uploads/profile/picture/'.$user->image)}}" class="img-circle profile-images">
								@endif
							</div> -->
							<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 profile-descriptions">


								<p class="profile-title profile-head-title">
									<span style="font-size: 14px;">{{ trans('app.Nickname') }} : </span>{{$user->nick_name}}</p>
							</div>
						<!-- </div> -->
						{{--<div class="col-md-4 profile-timeline">--}}
							{{--<div class="col-md-6">--}}
								{{--<p class="timeline-numbers mb-0">{{$user->total_dishes}}</p>--}}
								{{--<p class="t-black">{{ trans('app.Dishes')}}</p>--}}
							{{--</div>--}}
							<!-- <div class="col-md-4">
								<p class="timeline-numbers mb-0">105</p>
								<p class="t-black">Favourites</p>
							</div> -->
							{{--<div class="col-md-6">--}}
								{{--<p class="timeline-numbers mb-0">{{count($reviews)}}</p>--}}
								{{--<p class="t-black">{{ trans('app.Reviews') }}</p>--}}
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
							{{--</div>--}}
						{{--</div>--}}
					<!-- </div> -->
					<div class="col-lg-12 col-12 p-0 profile-description">
						<div class="col-md-8 float-none profileplace-name">
							<!-- <div class="col-md-3">
								<p><strong>EmailId :</strong><span> {{$user->email}}</span></p>
							</div>
							<div class="col-md-3">
								<p><strong>Phone No. :</strong><span> {{$user->phone_number}}</span></p>
							</div> -->
							<div class="col-md-8 col-md-offset-2">
								<p class="mb-0 profile-deliverable-area"><strong>{{ trans('app.Deliverable Area') }} :</strong>
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
					<div class="row">
						<div class="col-md-offset-3 col-md-6">
							<div class="embed-responsive embed-responsive-16by9">
								<?php echo $user->video_link ?>
							</div>
						</div>
					</div>
					<!-- < ! width="100%" height="480" src="https://www.youtube.com/embed/KGBxpefNqvw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> -->
				</div>
			@endif
			@if(count($food_items)>0)
			<div class="col-sm-12 col-md-12 text-center profile-box section">
				<h4 class="text-left t-black mt-0">{{ trans('app.Schedule') }}</h4>
				<div class="row">
					@php $currentDate = date("Y-m-d"); @endphp
					@if(!empty($food_items))
						@foreach($food_items as $food)
							@if($food->category_status == 1)
								<!-- featured -->
								<div class="col-md-4 col-lg-3">
									<!-- featured -->
									@if($food->closed_order == 1)
										<div class="featured profile-featured featured-overlay">
									@else
										<div class="featured profile-featured">
									@endif

										<div class="featured-image">
												<a href="{{route('food_details',['food_item_id' => $food->food_item_id])}}">

												@if(!empty($food->foodImages))
													@foreach($food->foodImages as $key=>$food_image)
														@if($key == 0)
															<img src="{{url('/uploads/food/'.$food_image)}}" alt="" class="img-respocive images-featured">
														@endif
													@endforeach
												@else
													<img src="{{ url('frontend/images/featured/food1.png') }}" alt="" class="img-respocive">
												@endif
											</a>
											<!-- <a href="#" class="verified" data-toggle="tooltip" data-placement="top" title="Verified"><i class="fa fa-check-square-o"></i></a> -->
										</div>

										<!-- ad-info -->
										<div class="ad-info">
											<h3 class="item-price">&yen;{{$food->price}}</h3>
											<h4 class="item-title" title="@php echo $food->item_name; @endphp">
												@if(mb_strlen($food->item_name) >= 30)
													@php echo mb_substr($food->item_name, 0, 30, "UTF-8") @endphp ...
												@else
													{{$food->item_name}}
												@endif
											</h4>
											<div class="item-cat">
												<span>{{$food->category_name}}</span>
											</div>
										</div><!-- ad-info -->

										<!-- ad-meta -->
										<div class="ad-meta">
											<div class="meta-content">
												@if($food->closed_order == 1)
													<span class="dated">Order Closed</span>
												@else
													<span class="dated">{{$food->date}}</span>
												@endif
											</div>
											<!-- item-info-right -->
											<!-- <div class="user-option pull-right">
												<a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-suitcase"></i> </a>
											</div> --><!-- item-info-right -->
										</div><!-- ad-meta -->
									</div><!-- featured -->

								</div><!-- featured -->
							@endif
						@endforeach
					@endif
				</div>
			</div>
			@endif
			@if(count($reviews)>0)
				<div class="col-lg-12 col-xs-12 text-center profile-box section">
					<h4 class="text-left t-black mt-0 profile-review-heading">{{ trans('app.Review') }}</h4>
					@foreach($reviews as $review)
						@php
							$age = DataTranslation::getTranslated()['ages'][$review->age];
							$gender = DataTranslation::getTranslated()['genders'][$review->gender];
						@endphp
						<div class="col-lg-12 col-xs-12 p-0 review-main-div">
							<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12 p-0">
								<div class="t-orange review-img-div float-left">
									{{$review->eater_name}}
								</div>
							</div>
							<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12 p-0">
								<p class="mb-0 text-left t-black">{{ $age }} {{ $gender }}</p>
							</div>
							<p class="text-left">
								{{$review->review_description}}
							</p>
						</div>
					@endforeach
				</div>
			@endif
			@if(!empty($user->description))
			<div class="col-lg-12 col-xs-12 text-center profile-box section">
				<h4 class="text-left t-black mt-0">{{ trans('app.Introduction') }}</h4>
				<p class="text-left">
					@php echo nl2br($user->description); @endphp
				</p>
			</div>
			@endif
			@if(!empty($user->profile_message))
			<div class="col-lg-12 col-xs-12 text-center profile-box section">
				<h4 class="text-left t-black mt-0">{{ trans('app.Message From') }} </h4>
				<div class="col-lg-12 col-xs-12 p-0">
					<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12 message-logo-div">
						<img src="{{ url('frontend/images/Logo.png') }}" class="img-responsive">
					</div>
					<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12 p-0">
						<p class="text-left">
							@php echo nl2br($user->profile_message); @endphp
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