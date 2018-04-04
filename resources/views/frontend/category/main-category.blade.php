@extends('frontend.layouts.master')

@section('title')
  ShareMeshi
@endsection

@section('add-meta')
@endsection

@section('content')

<!-- main -->
	<section id="" class="clearfix category-page main-categories">
		<div class="container">
		<div class="breadcrumb-section">
			<!-- breadcrumb -->
			<ol class="breadcrumb new-breadcrumb">
				<li><a href="{{ url('/')}}">{{ trans('app.HOME') }}</a></li>
				<li><a href="{{route('food_all_categories')}}">{{ trans('app.ALL CATEGORIES') }}</a></li>
				
			</ol><!-- breadcrumb -->						
		</div>
	
			<div class="category-info category-box">	
				<div class="row">
					<!-- accordion-->
					<div class="col-md-3 col-sm-4">
						<div class="accordion">
							<!-- panel-group -->
							<div class="panel-group" id="accordion">
							 	
								<!-- panel -->
								<div class="panel-default panel-faq">
									<!-- panel-heading -->
									<div class="panel-heading">
										<a data-toggle="collapse" data-parent="#accordion" href="#accordion-one">
											<h4 class="panel-title">{{ trans('app.Categories') }}<span class="pull-right"><i class="fa fa-minus"></i></span></h4>
										</a>
									</div><!-- panel-heading -->

									<div id="accordion-one" class="panel-collapse collapse in">
										<!-- panel-body -->
										<div class="panel-body">
											<ul>
												@if(!empty($all_categories))
													@foreach($all_categories as $category)
														<li><a href="#">{{$category}}</a></li>
													@endforeach
												@endif
											</ul>
										</div><!-- panel-body -->
									</div>
								</div><!-- panel -->

						
 							</div><!-- panel-group -->
						</div>
					</div><!-- accordion-->

					<!-- recommended-ads -->
					<div class="col-sm-8 col-md-7">				
						<div class="section recommended-ads">
							<!-- featured-top -->
							<div class="featured-top">
								<h4>{{ trans('app.Recommended for You') }}</h4>
								<div class="dropdown pull-right">
								
								<!-- category-change -->
								<div class="dropdown category-dropdown">
									<!-- <h5>Sort by:</h5>						
									<a data-toggle="dropdown" href="#"><span class="change-text">Popular</span><i class="fa fa-caret-square-o-down"></i></a> -->
									<ul class="dropdown-menu category-change">
										<li><a href="#">{{ trans('app.Featured') }}</a></li>
										<li><a href="#">{{ trans('app.Newest') }}</a></li>
										<li><a href="#">{{ trans('app.All') }}</a></li>
										<li><a href="#">{{ trans('app.Bestselling') }}</a></li>
									</ul>								
								</div><!-- category-change -->														
								</div>							
							</div><!-- featured-top -->	

							@if(!empty($food_items))
								@foreach($food_items as $item)
									<!-- ad-item -->
									<div class="recomended-item row">
										<!-- item-image -->
										<div class="item-image-box col-sm-4">
											<div class="item-image">
											<a href="{{route('food_details',['food_item_id' => $item->food_item_id])}}">
												@if(!empty($item->foodImages))
													<img src="{{url('/uploads/food/'.$item->foodImages[0])}}" alt="" class="img-respocive images-featured">
												@else
													<img src="{{ url('frontend/images/categories/1.png') }}" alt="Image" class="img-responsive">
												@endif
											</a>
											</div><!-- item-image -->
										</div>
										
										<!-- rending-text -->
										<div class="item-info col-sm-8">
											<!-- ad-info -->
											<div class="ad-info">
												<h3 class="item-price">${{$item->price}}</h3>
												<h4 class="item-title"><a href="{{route('food_details',['food_item_id' => $item->food_item_id])}}">{{$item->item_name}}</a></h4>
												<div class="item-cat">
													<span>{{$item->category_name}}</span> 
													
												</div>										
											</div><!-- ad-info -->
											
											<!-- ad-meta -->
											<div class="ad-meta">
												<div class="meta-content">
													<span class="dated">{{$item->date}}</span>
													<!-- <a href="#" class="tag"><i class="fa fa-tags"></i> New</a> -->
												</div>										
												<!-- item-info-right -->
												<!-- <div class="user-option pull-right">
													<a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
													<a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
												</div> --><!-- item-info-right -->
											</div><!-- ad-meta -->
										</div><!-- item-info -->
									</div><!-- ad-item -->
								@endforeach
								<div class="text-center">
									<ul class="pagination ">
										{!! $food_items->render() !!}
									</ul>
								</div>
								
							@endif

							

							
	
							
							<!-- pagination  -->
							<!-- <div class="text-center"> -->
						<!-- 		<ul class="pagination ">
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
							</div> --><!-- pagination  -->					
						</div>
					</div><!-- recommended-ads -->


				</div>	
			</div>
		</div><!-- container -->
	</section>
	<!-- main -->

@endsection

@section('add-js')	
@endsection