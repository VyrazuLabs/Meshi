@extends('frontend.layouts.master')

@section('title')
  ShareMeshi
@endsection

@section('add-meta')
@endsection

@section('content')
<!-- <section class=""></section> -->
<section id="" class="clearfix category-page cart-pages">
	<div class="col-lg-12 col-xs-12 p-0">
		<div class="container">
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li>Cart</li>
				</ol><!-- breadcrumb -->						
				<h2 class="title d-inline-block">Cart</h2>
			</div>
			<div class="col-lg-12 col-xs-12 p-0">
				<div class="section cart-section">
					<div class="col-lg-12 cart-box p-0">
						<div class="cart-item">
							<div class="item-image-box cart-image-box">
								<img src="{{ url('/frontend/images/categories/1.png') }}" class="img-responsive cart-img">
							</div>
							<div class="cart-content">
								<div class="cart-content-details">
									<h3 class="t-black cart-item-title">Delicious Pan Cake</h3>
									<h4>More food by <span class="t-orange">Ankita Deb</span></h4>
									<h5><strong class="t-black">Delivery Time:</strong> 19:00 - 19:30</h5>
								</div>
								<div class="cart-content-btn-div">
									<h3 class="t-orange text-right">¥350.00</h3>
									<button type="button" class="btn cart-remove-btn text-right">Remove</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 cart-box p-0">
						<div class="cart-item">
							<div class="item-image-box cart-image-box">
								<img src="{{ url('/frontend/images/categories/8.png') }}" class="img-responsive cart-img">
							</div>
							<div class="cart-content">
								<div class="cart-content-details">
									<h3 class="t-black cart-item-title">Fruit Cake</h3>
									<h4>More food by <span class="t-orange">Ankita Deb</span></h4>
									<h5><strong class="t-black">Delivery Time:</strong> 19:00 - 19:30</h5>
								</div>
								<div class="cart-content-btn-div">
									<h3 class="t-orange text-right">¥850.00</h3>
									<button type="button" class="btn cart-remove-btn text-right">Remove</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 cart-box p-0">
						<div class="cart-item">
							<div class="item-image-box cart-image-box">
								<img src="{{ url('/frontend/images/categories/7.png') }}" class="img-responsive cart-img">
							</div>
							<div class="cart-content">
								<div class="cart-content-details">
									<h3 class="t-black cart-item-title">Pastry</h3>
									<h4>More food by <span class="t-orange">Ankita Deb</span></h4>
									<h5><strong class="t-black">Delivery Time:</strong> 19:00 - 19:30</h5>
								</div>
								<div class="cart-content-btn-div">
									<h3 class="t-orange text-right">¥350.00</h3>
									<button type="button" class="btn cart-remove-btn text-right">Remove</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-xs-12 p-0 text-center cart-order-btn-div">
						<button type="button" class="btn back-orange cart-order-btn">Order Place</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('add-js')	
@endsection