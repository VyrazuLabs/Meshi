@extends('frontend.layouts.master')

@section('title')
	{{ __('app.nickname\'s', ['nickname' => $user->nick_name]) }}@lang('app.Profile') | @lang('app.sharemeshi')
@endsection

@section('add-meta')
@endsection

@section('content')
<section id="" class="clearfix category-page">
	<div class="container">
		<div class="breadcrumb-section">
			<h2 class="title t-orange d-inline-block">@lang('app.Profile')</h2>
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
						</div>
					</div>
					<div class="col-md-12 nickPicMain">
						@if(!empty($user->image))
							<img src="{{url('/uploads/profile/picture/'.$user->image)}}" class="img-circle profile-images">
						@else
							<img src="{{url('/uploads/profile/picture/'.$food->image)}}" class="img-circle">
						@endif
						<p class="profile-title profile-head-title">
							<span style="font-size: 14px;">{{ trans('app.Nickname') }} : </span>{{$user->nick_name}}
						</p>
					</div>
					{{--<div class="col-md-4 profile-timeline">--}}
						{{--<div class="col-md-6">--}}
							{{--<p class="timeline-numbers mb-0">{{$user->total_dishes}}</p>--}}
							{{--<p class="t-black">{{ trans('app.Dishes')}}</p>--}}
						{{--</div>--}}
						{{--<div class="col-md-6">--}}
							{{--<p class="timeline-numbers mb-0">{{count($reviews)}}</p>--}}
							{{--<p class="t-black">{{ trans('app.Reviews') }}</p>--}}
						{{--</div>--}}
					{{--</div>--}}
					<div class="col-lg-12 col-12 p-0 profile-description">
						<div class="col-md-8 float-none profileplace-name">
							<div class="col-md-8 col-md-offset-2">
								<p class="mb-0 profile-deliverable-area"><strong>{{ trans('app.Deliverable Area') }} :</strong>
									<span>{{$user->deliverable_area}}</span>
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
														<span title="@php echo $food->category_name; @endphp">
				                                            @if(mb_strlen($food->category_name) > 12)
				                                                @php echo mb_substr($food->category_name, 0, 12, "UTF-8") @endphp ...
				                                            @else
				                                                {{ $food->category_name }}
				                                            @endif
			                                            </span>
													</div>
												</div><!-- ad-info -->
												<!-- ad-meta -->
												<div class="ad-meta">
													<div class="meta-content">
														@if($food->closed_order == 1)
															<span class="dated">{{ trans('app.Order Closed') }}</span>
														@else
															<span class="dated">{{$food->date}}</span>
														@endif
													</div>
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
							<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12 p-0 text-left">
								<p class="mb-0 text-left t-black d-inline-block">{{ $age }} {{ $gender }}</p>
								<p class="mb-0 text-left t-black d-inline-block">
									<a href="{{route('food_details',['food_item_id' => $review->food_item_id])}}"" class="t-orange profile-food-names" title="@php echo $review->item_name; @endphp">
										@if(mb_strlen($review->item_name) > 20)
		                                    @php echo mb_substr($review->item_name, 0, 20, "UTF-8") @endphp ...
		                                @else
		                                    {{ $review->item_name }}
		                                @endif
	                                </a>
	                            </p>
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