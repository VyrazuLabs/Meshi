@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.sharemeshi') }}
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
					<li>Food Listings</li>
				</ol><!-- breadcrumb -->						
				<h2 class="title d-inline-block">Cart</h2>
			</div>
			<div class="col-lg-12 col-xs-12 p-0">
				<div class="section cart-section">
				@if(!empty($foods))
				@foreach($foods as $food)
					<div class="col-lg-12 cart-box p-0">
						<div class="cart-item">
							<div class="col-lg-9 col-md-9 col-xs-12 p-0">
								<h3 class="t-black cart-item-title">{{$food->item_name}}</h3>
								<h5><span><strong class="t-orange">Category:</strong> {{$food->category_name}} </span><span class="food-listing-date"><strong class="t-black"> Date:</strong> 14/04/2018</span></h5>
								<h5 class="t-black"><strong>Description</strong></h5>
								<p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
							</div>
							<div class="col-lg-3 col-md-3 col-xs-12 p-0 food-creator-pricebtn">
								<h3 class="t-orange text-right mt-0">Price ¥350.00</h3>
								<div class="food-creator-btn-group float-right">
									<button type="button" class="btn text-right food-creator-list-btn">Remove</button>
									<button type="button" class="btn text-right food-creator-list-btn food-creator-list-edit back-orange">Edit</button>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				@endif
					<div class="col-lg-12 col-xs-12 p-0 text-center cart-order-btn-div">
						<!-- pagination  -->
						<div class="text-center">
							<ul class="pagination ">
								<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
								<li><a href="#">1</a></li>
								<li class="active"><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a>...</a></li>
								<li><a href="#">10</a></li>
								<li><a href="#">20</a></li>
								<li><a href="#">30</a></li>
								<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>			
							</ul>
						</div><!-- pagination  -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@section('add-js')	
@endsection