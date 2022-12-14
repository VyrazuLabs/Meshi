@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.Purchased List') }}
@endsection

@section('add-meta')
@endsection

@section('content')

<section id="" class="clearfix category-page cart-pages">
	<div class="col-lg-12 col-xs-12 p-0">
		<div class="container">
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb ">
					<li><a href="{{ url('/')}}">{{ trans('app.HOME') }}</a></li>
					<li><a href="{{route('purchased_list',['user_id' => Auth::User()->user_id])}}">{{ trans('app.Purchased List') }}</a></li>
				</ol><!-- breadcrumb -->
				<h2 class="title">{{ trans('app.Purchased List') }}</h2>
			</div>

			<div class="col-lg-12 col-xs-12 p-0">
				<div class="section cart-section boxes-card">
					@if(!empty($orders))
						@foreach($orders as $order)
							<div class="col-lg-12 cart-box p-0">
								<div class="cart-item">
									<div class="item-image-box cart-image-box">
										@if(!empty($order->food_images))
											@foreach($order->food_images as $key=>$food_image)
												@if($key == 0)
													<img src="{{url('/uploads/food/'.$food_image)}}" alt="" class="img-responsive cart-img">
												@else
													<img src="{{ url('frontend/images/featured/food1.png') }}" alt="Image" class="img-responsive cart-img">
												@endif
											@endforeach
										@else
											<img src="{{ url('frontend/images/featured/food1.png') }}" alt="Image" class="img-responsive cart-img">
										@endif
									</div>

									<div class="cart-content">
										<div class="cart-content-details">
											<h3 class="t-black cart-item-title">{{$order->item_name}}</h3>
											<h4 class="t-orange">{{ trans('app.Price') }} ¥{{$order->total_price}}</h4>
											<div class="d-inline-block">
												<p>
													<strong class="t-black">{{ trans('app.Date of Delivery') }}:
													</strong> {{$order->date}}
												</p>
												<p>
													<strong class="t-black">{{ trans('app.Payment Status') }}:</strong>
													@if($order->status == 1)
														Paid
													@endif
												</p>
											</div>
											<div class="d-inline-block">
												<p class="customer-delivertime">
													<strong class="t-black">{{ trans('app.Time of Delivery') }}:
													</strong> {{$order->time}}
												</p>
												<p class="customer-delivertime">
													<strong class="t-black">{{ trans('app.Nickname') }}:</strong>
													<a href="{{route('profile_details',['user_id' => $order->offered_by])}}">{{$order->nick_name}}</a>
												</p>
											</div>
										</div>
										<div class="cart-content-btn-div ">

											<div class="review-group text-center">
											@if($order->creator_review)
												<a href="#" class="food-creator-review-text" data-toggle="modal" data-target="#FoodCreatorReviewModal" data-attr="{{ $order->order_id }}" onclick="showCreatorReview(this)">{{ trans('app.See Creator\'s Review') }}</a>
											@endif
												@if($order->review_status == 0 && $order->closed_order == 1)
													<button type="button" data-toggle="modal" data-target="#reviewmodal" class="btn text-right back-orange customer-review-btn creator-review-btn" data-attr="{{ $order->order_id }}" onclick="reviewFood(this)">{{ trans('app.Make Review') }}</button>
												@elseif($order->review_status == 1)
													<button type="button" class="btn text-right back-orange customer-review-btn parchesed-review-btn creator-review-btn">{{ trans('app.Reviewed') }}</button>
												@endif
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					@endif
					<div class="col-lg-12 text-center cart-box p-0">
						<div class="cart-item">
							<ul class="pagination ">
								{!! $orders->render() !!}
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@section('add-js')
<script type="text/javascript">

var currentTab = 0; // Current tab is set to be the first tab (0)
	showTab(currentTab); // Display the crurrent tab

	function showTab(n) {
	  // This function will display the specified tab of the form...
	  var x = document.getElementsByClassName("tab");
	  x[n].style.display = "block";
	  //... and fix the Previous/Next buttons:
	  if (n == 0) {
	    document.getElementById("prevBtn").style.display = "none";
	  } else {
	    document.getElementById("prevBtn").style.display = "inline";
	  }
	  if (n == (x.length - 1)) {
	    document.getElementById("nextBtn").style.display = "none";
	  } else {
	    document.getElementById("nextBtn").innerHTML = "<i class='fa fa-angle-right'></i>";
	    document.getElementById("nextBtn").style.display = "inline";
	  }
	  //... and run a function that will display the correct step indicator:
	  fixStepIndicator(n)
	}

	function nextPrev(n) {
	  // This function will figure out which tab to display
	  var x = document.getElementsByClassName("tab");
	  // Exit the function if any field in the current tab is invalid:
	  if (n == 1 && !validateForm()) return false;
	  // Hide the current tab:
	  x[currentTab].style.display = "none";
	  // Increase or decrease the current tab by 1:
	  currentTab = currentTab + n;
	  // if you have reached the end of the form...
	  if (currentTab >= x.length) {
	    // ... the form gets submitted:
	    document.getElementById("eaterReviewForm").submit();
	    return false;
	  }
	  // Otherwise, display the correct tab:
	  showTab(currentTab);
	}

	function validateForm() {
	  // This function deals with validation of the form fields
	  var x, y, i, valid = true;
	  x = document.getElementsByClassName("tab");
	  y = x[currentTab].getElementsByTagName("input");
	  textarea = x[currentTab].getElementsByTagName("textarea");
	  // A loop that checks every input field in the current tab:
	  for (i = 0; i < y.length; i++) {
	    // If a field is empty...
	    if (y[i].value == "") {
	      // add an "invalid" class to the field:
	      y[i].className += " invalid";
	      textarea[i].className += " review-error";
	      // and set the current valid status to false
	      valid = false;
	    }
	  }
	  // If the valid status is true, mark the step as finished and valid:
	  if (valid) {
	    document.getElementsByClassName("step")[currentTab].className += " finish";
	  }
	  return valid; // return the valid status
	}

	function fixStepIndicator(n) {
	  // This function removes the "active" class of all steps...
	  var i, x = document.getElementsByClassName("step");
	  for (i = 0; i < x.length; i++) {
	    x[i].className = x[i].className.replace(" active", "");
	  }
	  //... and adds the "active" class on the current step:
	  x[n].className += " active";
	}

	function reviewFood(orderId) {
		var orderId = $(orderId).data('attr');
		$('#orderID').val(orderId);
	}

	/* for showing creator review */
	function showCreatorReview(orderId) {
		var orderId = $(orderId).data('attr');
		$.ajax({
          	headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            data: JSON.stringify({order_id : orderId}),
            type: 'POST',
            url: "{{ url('/user/show-creator-review') }}",
            contentType: "application/json",
            processData: false,
          	success:function(data) {
            	data = jQuery.parseJSON(data);
	            $('#creator-review-description').html(data['review']);
        		$('#creator-name').html(data['name']);

        	}
      	});
	}





</script>
@endsection
