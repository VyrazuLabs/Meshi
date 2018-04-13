@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.sharemeshi') }}
@endsection

@section('add-meta')
@endsection

@section('content')
<section id="" class="clearfix details-page">
	<div class="container">
		<div class="breadcrumb-section">
			<!-- breadcrumb -->
			<ol class="breadcrumb new-breadcrumb">
				<li><a href="{{ url('/')}}">{{ trans('app.HOME') }}</a></li>
				@if(!empty($food_details))
					<li><a href="{{route('food_details',['food_item_id' => $food_details->food_item_id])}}">{{ trans('app.Food Details') }}</a></li>

			</ol><!-- breadcrumb -->						
			<h2 class="title t-orange">{{ $food_details->category_name }}</h2>
				@endif
		</div>
		

		<div class="section slider">					
			<div class="row">
				<!-- carousel -->
				<div class="col-md-7">
					<div id="product-carousel" class="carousel slide" data-ride="carousel">
						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">

							@if(!empty($foodImages))
								<!-- item -->
								<div class="item active">
									<div class="carousel-image">
										<!-- image-wrapper -->
										<img src="{{url('/uploads/food/'.$foodImages[0])}}" alt="Featured Image" class="img-responsive  carousel-details-imgs">
											
									</div>
								</div><!-- item -->
								@foreach($foodImages as $image)
									<!-- item -->
									<div class="item">
										<div class="carousel-image">
											<!-- image-wrapper -->
											<img src="{{url('/uploads/food/'.$image)}}" alt="Featured Image" class="img-responsive carousel-details-imgs">
												
										</div>
									</div><!-- item -->
								@endforeach
							@endif
						</div><!-- carousel-inner -->

						<!-- Controls -->
						<a class="left carousel-control" href="#product-carousel" role="button" data-slide="prev">
							<i class="fa fa-chevron-left"></i>
						</a>
						<a class="right carousel-control" href="#product-carousel" role="button" data-slide="next">
							<i class="fa fa-chevron-right"></i>
						</a><!-- Controls -->
					</div>
				</div><!-- Controls -->	
				@if(!empty($food_details))
					<!-- slider-text -->
					<div class="col-md-5">
						<div class="slider-text">
							<!-- <h2>¥{{$food_details->price}}</h2> -->
							<h2>{{$food_details->item_name}}</h2>
							<!-- <h3 class="title">{{$food_details->item_name}}</h3> -->
							<!-- <p><span>{{ trans('app.Offered by') }}: <a href="{{route('profile_details',['user_id' => $food_details->offered_by])}}"> {{$food_details->made_by}}</a></span> -->
							<!-- <span> Ad ID:<a href="#" class="time"> 251716763</a></span></p> -->
							<!-- <span class="icon"><i class="fa fa-clock-o"></i><a href="#">{{$food_details->date}}</a></span> -->
							<!-- <span class="icon"><i class="fa fa-map-marker"></i><a href="#">{{$food_details->municipality}}</a></span> -->
							<!-- <span class="icon"><i class="fa fa-user online"></i><a href="{{route('profile_details',['user_id' => $food_details->offered_by])}}">{{$food_details->made_by}}<strong>(online)</strong></a></span> -->
							
							{!! Form::open(array('id'=>"buy_now_form")) !!}
	                        	{{Form::hidden('food_item_id',Crypt::encrypt($food_details->food_item_id))}}
	                        	{{Form::hidden('amount',Crypt::encrypt($cost))}}

								<!-- price -->
								<div class="short-info details-info">
									<h4>{{ trans('app.Price') }}</h4>
									<p class="detail-price-list"><strong>{{ trans('app.Price') }}: </strong><span class="float-right"><strong>¥ {{$food_details->price}}</strong></span></p>
									<!-- <p class="detail-price-list"><strong>{{ trans('app.Tax') }}: </strong>
										@foreach($foodCosting as $key => $costing)
										<span class="float-right"> {{$costing}}: ¥{{$key}}</span></br>
										@endforeach
									</p> -->
									<!-- <p class="detail-price-list"><strong>{{ trans('app.Shipping Fee') }}: </strong><span class="float-right">
										@if(!empty($food_details->shipping_fee))
											¥ {{$food_details->shipping_fee}}
										@endif
									</span></p> -->
									<p class="detail-price-list"><strong>{{ trans('app.Commission') }}: </strong><span class="float-right"><strong>¥ {{$commission}}</strong>
									</span></p>
									<div class="price-line"></div>
									<p class="detail-price-list"><strong>{{ trans('app.Total') }}: </strong><span class="float-right"><strong>¥ {{$cost}}</strong></span></p>
									<p>※料金には、地域活性化貢献料、配送料、お料理の料金が含まれます</p>
									<p>※メシクリエーターさんが心を込めて作っています。時間変更・キャンセルはなるべくしないようにお願いいたします。</p>

									<h4>{{ trans('app.Deliverable Area') }}:</h4>
									<span style="font-size: 14px;font-weight: bold;color: #272727;">{{$food_details->deliverable_area}}</span>

									<h4>{{ trans('app.Date of Delivery') }}:</h4>
									<span style="font-size: 16px;font-weight: bold;color: #272727;">{{$food_details->date}}</span>
								</div>
								<!-- price -->



								<!-- contact-with -->

								<div class="contact-with">
									<div class="col-md-6 p-0">
										<div class="form-group">
											<select onchange="checkForValue(this)" class="form-control" name="slot">
												<option value="">{{ trans('app.Select Your Time') }}</option>
												@if(!empty($time_of_availability))
				                  					@foreach($time_of_availability as $key => $slot)
														<option value="{{$key}}-{{$slot}}">{{$key}}-{{$slot}}</option>
													@endforeach
												@endif
											</select>
										</div>
									</div>
									<div class="col-md-6">
										@if(Auth::User())
											@if((Auth::User()->user_id) != $food_details->offered_by)
												<button id="buy_now_btn" disabled="disabled" class="btn btn-red detail-buy-btn makeOrder" type="button">{{ trans('app.Buy Now') }}</button>
											@endif
										@else
											<a disabled="disabled" class="btn btn-red detail-buy-btn" id="buy_now_btn_bfr_login" href="{{route('sign_in')}}">{{ trans('app.Buy Now') }}</a>
										@endif
										<!-- </a> -->

									</div>
								</div><!-- contact-with -->
		            		{!! Form::close() !!}
						</div>
					</div><!-- slider-text -->	
				@endif			
			</div>				
		</div><!-- slider -->

		@if(!empty($food_details))
			<div class="description-info">
				<div class="row">
					<!-- description -->
					<div class="col-md-8">
						<div class="col-lg-12 col-12 description description-main-div">
							<div class="col-md-3">
								<div class="">
									<a href="{{route('profile_details',['user_id' => $food_details->offered_by])}}">
										@if(!empty($food_details->image))
											<img src="{{url('/uploads/profile/picture/'.$food_details->image)}}" class="img-circle">
										@else
											<img src="{{ url('frontend/images/description.png') }}" class="img-circle">
										@endif
									</a>
								</div>
							</div>
							<div class="col-md-9">
								<div class="">
									<h4>{{ trans('app.Description') }}</h4>
									<p>{{$food_details->food_description}}</p>
								</div>
							</div>
						</div>
					</div>
					<!-- description -->

					<!-- description-short-info -->
					<div class="col-md-4">					
						<div class="short-info detail-short-info">
							<h4>{{ trans('app.Some Information') }}</h4>
							<!-- social-icon -->
							<ul>
								<li><i class="fa fa-shopping-cart"></i>{{ trans('app.Regular Purchase') }}: {{ trans('app.Preparing') }}</li>
								<li>
									<i class="fa fa-user-plus"></i>{{ trans('app.Party Order') }}: {{ trans('app.Preparing') }}</span>

								</li>
							</ul><!-- social-icon -->
						</div>
					</div>
				</div><!-- row -->
			</div><!-- description-info -->	
		@endif
		
		<div class="section cta text-center">
			<div class="row">
				<!-- single-cta -->
				<div class="col-sm-4">
					<div class="single-cta">
						<!-- cta-icon -->
						<div class="cta-icon icon-secure">
							<img src="{{ url('frontend/images/a1.png') }}" alt="Icon" class="img-responsive">
						</div><!-- cta-icon -->

						<h4>{{ trans('app.Handmade Foods') }}</h4>
						<p>{{ trans('app.Description of Handmade Foods') }}</p>
					</div>
				</div><!-- single-cta -->

				<!-- single-cta -->
				<div class="col-sm-4">
					<div class="single-cta">
						<!-- cta-icon -->
						<div class="cta-icon icon-support">
							<img src="{{ url('frontend/images/a2.png') }}" alt="Icon" class="img-responsive">
						</div><!-- cta-icon -->

						<h4>{{ trans('app.Food Delivery') }}</h4>
						<p>{{ trans('app.Description of Food Delivery') }}</p>
					</div>
				</div><!-- single-cta -->

				<!-- single-cta -->
				<div class="col-sm-4">
					<div class="single-cta">
						<!-- cta-icon -->
						<div class="cta-icon icon-trading">
							<img src="{{ url('frontend/images/a3.png') }}" alt="Icon" class="img-responsive">
						</div><!-- cta-icon -->

						<h4>{{ trans('app.Community') }}</h4>
						<p>{{ trans('app.Description of Community') }}</p>
					</div>
				</div><!-- single-cta -->
			</div><!-- row -->
		</div><!-- recommended-info -->
	</div><!-- container -->
</section><!-- main -->
@endsection

@section('add-js')	
<script type="text/javascript">
	
//ajax to save the food details in cart table
$('.makeOrder').click(function() {
  	var form_data = new FormData($("#buy_now_form")[0]);
  	order(form_data);
});

function order(form_data) {
	$.ajax({
	    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
	    data: form_data,
	    type: 'POST',
	    url: "{{ url('order/add-to-cart') }}",
	    contentType: false,
	    processData: false,
	    success: function(result) {
	        result = $.parseJSON(result);

	    	if(result.error == 1) {
	            new PNotify({
	              	text: 'Please select time',
		            type: 'error',
		            delay: 2500,
		            history: false,
		            sticker: true
	            });
	        }
	        else {
				var url = '{{ url("/order/payment/make-paypal-payment") }}'+ '/' +result.cart_id;
	      		window.location.href = url;
	        }
	    	
	    }
	});
}
function checkForValue(param) {
	var value = $(param).val();
	if(value != '') {
		$('#buy_now_btn').prop('disabled', false);
		$('#buy_now_btn_bfr_login').attr('disabled', false);
		$('#buy_now_btn_bfr_login').attr('href',"{{route('sign_in')}}");
	}
	else {
		$('#buy_now_btn').prop('disabled', true);
		$('#buy_now_btn_bfr_login').attr('disabled', true);
		$('#buy_now_btn_bfr_login').attr('href', '#');
	}
}

</script>
@endsection