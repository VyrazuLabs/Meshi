@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.FOOD LIST') }} | {{ trans('app.sharemeshi') }}
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
		          <li><a href="{{ url('/food/lists')}}">{{ trans('app.FOOD LIST') }}</a></li>
		        </ol><!-- breadcrumb -->
		        <h2 class="title">{{ trans('app.FOOD LIST') }}</h2>
		    </div>
	      	@if(count($foods)>0)
				<div class="col-lg-12 col-xs-12 p-0">
					<div class="section cart-section">
						@foreach($foods as $food)
							<div class="col-lg-12 cart-box p-0">
								<div class="cart-item">
									<div class="col-lg-9 col-md-9 col-xs-12 p-0">
										<h3 class="t-black cart-item-title">{{$food->item_name}}</h3>
										<h5><span><strong class="t-orange">{{ trans('app.Category') }}:</strong> {{$food->category_name}} </span><span class="food-listing-date"><strong class="t-black"> {{ trans('app.Date of Delivery') }}:</strong> {{$food->date}}</span></h5>
										<h5 class="t-black"><strong>{{ trans('app.FoodDescription') }}</strong></h5>
										<p class="mb-0">{{$food->food_description}}</p>
									</div>
									<div class="col-lg-3 col-md-3 col-xs-12 p-0 food-creator-pricebtn">
										<h3 class="t-orange text-right mt-0"> ¥{{$food->price}}</h3>
										<div class="food-creator-btn-group float-right">
											<a href="{{route('delete_food',['food_item_id' => $food->food_item_id])}}" type="button" class="btn text-right food-creator-list-btn">{{ trans('app.Remove') }}</a>
											<a href="{{route('edit_food',['food_item_id' => $food->food_item_id])}}" type="button" class="btn text-right food-creator-list-btn food-creator-list-edit back-orange">{{ trans('app.EDIT') }}</a>
										</div>
									</div>
								</div>
							</div>
						@endforeach
						<div class="col-lg-12 col-xs-12 p-0 text-center cart-order-btn-div">
							<!-- pagination  -->
							<div class="text-center">
								<ul class="pagination ">
									{!! $foods->render() !!}
								</ul>
							</div><!-- pagination  -->
						</div>
					</div>
				</div>
			@else
				<div class="col-lg-12 col-xs-12 text-center p-0">
					<div class="section boxes-card">
						<div class="col-md-6 float-none d-inline-block">
							<div class="empty-cart-img">
								<img src="{{url('/frontend/images/empty-food-list.jpg')}}" class="img-responsive m-auto">
							</div>
							<p class="t-orange empty-cart-text">Oops your food list is empty</p>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
							<div class="col-lg-12 col-xs-12 p-0 text-center cart-order-btn-div">
								<a href="{{ url('/')}}" class="btn back-orange cart-order-btn">Continue Shopping</a>
							</div>
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
