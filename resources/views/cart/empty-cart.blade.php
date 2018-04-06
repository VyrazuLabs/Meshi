@extends('frontend.layouts.master')

@section('title')
  ShareMeshi
@endsection

@section('add-meta')
@endsection

@section('content')
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
			<div class="col-lg-12 col-xs-12 text-center p-0">
				<div class="section boxes-card">
					<div class="col-md-6 float-none d-inline-block">
						<div class="empty-cart-img">
							<img src="{{url('/frontend/images/cart_mty.png')}}" class="img-responsive m-auto">
						</div>
						<p class="t-orange empty-cart-text">Oops your cart is empty</p>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
						<div class="col-lg-12 col-xs-12 p-0 text-center cart-order-btn-div">
							<button type="button" class="btn back-orange cart-order-btn">Continue Shopping</button>
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