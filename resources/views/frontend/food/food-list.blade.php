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
		        <ol class="breadcrumb ">
		          <li><a href="{{ url('/')}}">{{ trans('app.HOME') }}</a></li>
		          <li><a href="{{ url('/food/lists')}}">{{ trans('app.FOOD LIST') }}</a></li>
		        </ol><!-- breadcrumb -->
		        <h2 class="title">{{ trans('app.FOOD LIST') }}</h2>
		      </div>
			<div class="col-lg-12 col-xs-12 p-0">
				<div class="section cart-section">
				@if(!empty($foods))
				@foreach($foods as $food)
					<div class="col-lg-12 cart-box p-0">
						<div class="cart-item">
							<div class="col-lg-9 col-md-9 col-xs-12 p-0">
								<h3 class="t-black cart-item-title">{{$food->item_name}}</h3>
								<h5><span><strong class="t-orange">Category:</strong> {{$food->category_name}} </span><span class="food-listing-date"><strong class="t-black"> Date:</strong> {{$food->date}}</span></h5>
								<h5 class="t-black"><strong>Description</strong></h5>
								<p class="mb-0">{{$food->food_description}}</p>
							</div>
							<div class="col-lg-3 col-md-3 col-xs-12 p-0 food-creator-pricebtn">
								<h3 class="t-orange text-right mt-0">Price ¥{{$food->price}}</h3>
								<div class="food-creator-btn-group float-right">
									<a href="{{route('delete_food',['food_item_id' => $food->food_item_id])}}" type="button" class="btn text-right food-creator-list-btn">Remove</a>
									<a href="{{route('edit_food',['food_item_id' => $food->food_item_id])}}" type="button" class="btn text-right food-creator-list-btn food-creator-list-edit back-orange">Edit</a>
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
								{!! $foods->render() !!}
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
