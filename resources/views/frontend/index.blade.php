@extends('frontend.layouts.master')

@section('title')
  ShareMeshi
@endsection

@section('add-meta')
@endsection

@section('content')
<!-- world-gmap -->
	<section id="main" class="clearfix home-two">
		<!-- <div class="container"> -->
			<!-- gmap -->	
			<div id="road_map"></div>	
		<!-- </div> -->
		<div class="container">
		<div class="row">
			<!-- banner -->
			<!-- <div class="col-sm-12"> -->
				<!-- <div class="banner">						 -->
					<!-- banner-form -->
					<!-- <div class="banner-form banner-form-full"> -->
						<!-- <form action="#"> -->
							<!-- category-change -->
							<!-- <div class="dropdown category-dropdown">						
								<a data-toggle="dropdown" href="#"><span class="change-text">Select Category</span> <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu category-change">
									<li><a href="#">Breakfast</a></li>
									<li><a href="#">Lunch</a></li>
									<li><a href="#">Dinner</a></li>
									<li><a href="#">Desert</a></li>
									<li><a href="#">Cakes</a></li>
									<li><a href="#">Snacks & Cakes</a></li>
									<li><a href="#">Omelette Dishes</a></li>
									<li><a href="#">Protein Diet</a></li>
									<li><a href="#">Fish Special</a></li>
									<li><a href="#">Non-veg Special</a></li>
									<li><a href="#">Egg Dishes</a></li>
									<li><a href="#">Egg Dishes</a></li>
									<li><a href="#">Rice Meal</a></li>
								</ul>								
							</div> --><!-- category-change -->
							
							<!-- language-dropdown -->
							<!-- <div class="dropdown category-dropdown language-dropdown ">						
								<a data-toggle="dropdown" href="#"><span class="change-text">Japan</span> <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu  language-change">
									<li><a href="#">Other Country</a></li>
								</ul>								
							</div> --><!-- language-dropdown -->
						
							<!-- <input type="text" class="form-control" placeholder="Type Your key word">
							<button type="submit" class="form-control" value="Search">Search</button> -->
						<!-- </form> -->
					<!-- </div> --><!-- banner-form -->						
				<!-- </div> -->
			<!-- </div> --><!-- banner -->
		</div><!-- row -->
		<!-- featureds -->
		@if(count($tomorrow_food_items)>0)
			<div class="section featureds">
				<div class="row">
					<!-- featured-top -->
					<div class="col-sm-12">
						<div class="featured-top">
							<h4>{{ trans('app.Tomorrow') }}</h4>
						</div>
					</div><!-- featured-top -->
				</div>
					
				<div class="row">
						@foreach($tomorrow_food_items as $food)
							<!-- featured -->
							<div class="col-md-4 col-lg-3">
								<!-- featured -->
								<div class="featured">
									<div class="featured-image">
										<a href="{{route('food_details',['food_item_id' => $food->food_item_id])}}">
											@if(!empty($food->foodImages))
												<img src="{{url('/uploads/food/'.$food->foodImages[0])}}" alt="" class="img-respocive images-featured">
											@else
												<img src="{{ url('frontend/images/featured/food1.png') }}" alt="" class="img-respocive">
											@endif
										</a>
										<!-- <a href="#" class="verified" data-toggle="tooltip" data-placement="top" title="Verified"><i class="fa fa-check-square-o"></i></a> -->
										<a href="{{route('profile_details',['user_id' => $food->offered_by])}}">
											<div class="feature-over-person">
											@if(!empty($food->image))
												<img src="{{url('/uploads/profile/picture/'.$food->image)}}" class="img-responsive feature-over-image">
											@else
												<img src="{{ url('frontend/images/Food-creator-sm1.png') }}" class="img-responsive">
											@endif
											</div>
										</a>
									</div>
									
									<!-- ad-info -->
									<div class="ad-info">
										<h3 class="item-price">&yen;{{$food->price}}</h3>
										<h4 class="item-title">{{$food->item_name}}</h4>
										<div class="item-cat">
											<span>{{$food->category_name}}</span> 
										</div>
									</div><!-- ad-info -->
									
									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated">{{$food->date}}</span>
										</div>									
										<!-- item-info-right -->
										<!-- <div class="user-option pull-right">
											<a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
											<a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-suitcase"></i> </a>											
										</div> --><!-- item-info-right -->
									</div><!-- ad-meta -->
								</div><!-- featured -->
							</div><!-- featured -->
						@endforeach
				</div><!-- row -->				
			</div><!-- featureds -->
		@endif
		<!-- featureds -->
		@if(count($day_after_tomorrow_food_items)>0)
			<div class="section featureds">
				<div class="row">
					<!-- featured-top -->
					<div class="col-sm-12">
						<div class="featured-top">
							<h4>{{ trans('app.Day After Tomorrow') }}</h4>
						</div>
					</div><!-- featured-top -->
				</div>
					
				<div class="row">
						@foreach($day_after_tomorrow_food_items as $food)
							<!-- featured -->
							<div class="col-md-4 col-lg-3">
								<!-- featured -->
								<div class="featured">
									<div class="featured-image">
										<a href="{{route('food_details',['food_item_id' => $food->food_item_id])}}">
											@if(!empty($food->foodImages))
												<img src="{{url('/uploads/food/'.$food->foodImages[0])}}" alt="" class="img-respocive images-featured">
											@else
												<img src="{{ url('frontend/images/featured/food1.png') }}" alt="" class="img-respocive">
											@endif
										</a>
										<!-- <a href="#" class="verified" data-toggle="tooltip" data-placement="top" title="Verified"><i class="fa fa-check-square-o"></i></a> -->
										<a href="{{route('profile_details',['user_id' => $food->offered_by])}}">
											<div class="feature-over-person">
											@if(!empty($food->image))
												<img src="{{url('/uploads/profile/picture/'.$food->image)}}" class="img-responsive feature-over-image">
											@else
												<img src="{{ url('frontend/images/Food-creator-sm1.png') }}" class="img-responsive">
											@endif
											</div>
										</a>
									</div>
									
									<!-- ad-info -->
									<div class="ad-info">
										<h3 class="item-price">&yen;{{$food->price}}</h3>
										<h4 class="item-title">{{$food->item_name}}</h4>
										<div class="item-cat">
											<span>{{$food->category_name}}</span> 
										</div>
									</div><!-- ad-info -->
									
									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated">{{$food->date}}</span>
										</div>									
										<!-- item-info-right -->
										<!-- <div class="user-option pull-right">
											<a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
											<a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-suitcase"></i> </a>											
										</div> --><!-- item-info-right -->
									</div><!-- ad-meta -->
								</div><!-- featured -->
							</div><!-- featured -->
						@endforeach
				</div><!-- row -->				
			</div><!-- featureds -->
		@endif
		<!-- featureds -->
		@if(count($next_day_of_tomorrow_food_items)>0)
			<div class="section featureds">
				<div class="row">
					<!-- featured-top -->
					<div class="col-sm-12">
						<div class="featured-top">
							<h4>{{ date('d-m-Y', strtotime($next_day_of_tomorrow))}}</h4>
						</div>
					</div><!-- featured-top -->
				</div>
					
				<div class="row">
						@foreach($next_day_of_tomorrow_food_items as $food)
							<!-- featured -->
							<div class="col-md-4 col-lg-3">
								<!-- featured -->
								<div class="featured">
									<div class="featured-image">
										<a href="{{route('food_details',['food_item_id' => $food->food_item_id])}}">
											@if(!empty($food->foodImages))
												<img src="{{url('/uploads/food/'.$food->foodImages[0])}}" alt="" class="img-respocive images-featured">
											@else
												<img src="{{ url('frontend/images/featured/food1.png') }}" alt="" class="img-respocive">
											@endif
										</a>
										<!-- <a href="#" class="verified" data-toggle="tooltip" data-placement="top" title="Verified"><i class="fa fa-check-square-o"></i></a> -->
										<a href="{{route('profile_details',['user_id' => $food->offered_by])}}">
											<div class="feature-over-person">
											@if(!empty($food->image))
												<img src="{{url('/uploads/profile/picture/'.$food->image)}}" class="img-responsive feature-over-image">
											@else
												<img src="{{ url('frontend/images/Food-creator-sm1.png') }}" class="img-responsive">
											@endif
											</div>
										</a>
									</div>
									
									<!-- ad-info -->
									<div class="ad-info">
										<h3 class="item-price">&yen;{{$food->price}}</h3>
										<h4 class="item-title">{{$food->item_name}}</h4>
										<div class="item-cat">
											<span>{{$food->category_name}}</span> 
										</div>
									</div><!-- ad-info -->
									
									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated">{{$food->date}}</span>
										</div>									
										<!-- item-info-right -->
										<!-- <div class="user-option pull-right">
											<a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
											<a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-suitcase"></i> </a>											
										</div> --><!-- item-info-right -->
									</div><!-- ad-meta -->
								</div><!-- featured -->
							</div><!-- featured -->
						@endforeach
				</div><!-- row -->				
			</div><!-- featureds -->
		@endif
				
		<!-- cta -->
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
			</div>
		</div><!-- cta -->
		</div><!-- container -->
	</section><!-- world-gmap -->	
@endsection

@section('add-js')	
	<script type="text/javascript">
    	var url = '{{ url("frontend/images/") }}';
		
		"use strict";
		/* global document */
		jQuery(document).ready(function () {
		    /***
		     Adding Google Map.
		    ***/

		    /* Calling goMap() function, initializing map jQuery('#road_map.directory-map').goMap({
		    //     maptype: 'ROADMAP',
		    //     latitude: 51.450711,
		    //     longitude: 0.2760004,
		    //     zoom: 12,
		    //     scaleControl: true,
		    //     scrollwheel: false,
				// 	//        group: 'category',
			 //        markers: [
				// 	//            Markers for Doctor Search
			 //            {latitude: 51.511622, longitude: -0.150375, icon: ''+url+'map/5.png', html: {
			 //                    content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
			 //                }},
			 //            {latitude: 51.524440, longitude: -0.241699, icon: ''+url+'map/3.png', html: {
			 //                     content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
			 //                }},
			 //            {latitude: 51.537388, longitude: -0.077033, icon: ''+url+'map/6.png', html: {
			 //                     content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
			 //                }},
			 //            {latitude: 51.508930, longitude: -0.347543, icon: ''+url+'map/2.png', html: {
			 //                     content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
			 //                }},
			 //            {latitude: 51.508550, longitude: -0.008712, icon: ''+url+'map/8.png', html: {
			 //                 content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
			 //            }},
			 //            {latitude: 51.549831, longitude: -0.304971, icon: ''+url+'map/1.png', html: {
			 //                 content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
			 //            }},
			 //            {latitude: 51.486562, longitude: -0.310364, icon: ''+url+'map/4.png', html: {
			 //                 content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
			 //            }},
			 //            {latitude: 51.482473, longitude: -0.094542, icon: ''+url+'map/7.png', html: {
			 //                 content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
			 //            }},
			 //        ]
		    // 	});and adding markers. */
		    //
	    

		    /* Calling goMap() function, initializing map and adding markers. */
		    jQuery('#road_map').goMap({
		        maptype: 'ROADMAP',
                latitude: 35.5625,
                longitude: 139.7161,
		        zoom: 15,
		        scaleControl: true,
		        scrollwheel: false,
				//        group: 'category',
		        markers: [
                    {latitude: 35.5625, longitude: 139.7161, icon: '' + url + '/mapicon/11.png'},
                    {latitude: 35.55519, longitude: 139.71788, icon: '' + url + '/mapicon/12.png'},
                    {latitude: 35.55875, longitude: 139.72415, icon: '' + url + '/mapicon/13.png'},
                    {latitude: 35.5642, longitude: 138.7161, icon: '' + url + '/mapicon/14.png'},
                    {latitude: 35.56595, longitude: 139.70959, icon: '' + url + '/mapicon/15.png'},
                    {latitude: 35.56874, longitude: 139.70102, icon: '' + url + '/mapicon/16.png'},
                    {latitude: 35.57477, longitude: 139.69856, icon: '' + url + '/mapicon/17.png'},
                    {latitude: 35.56913, longitude: 139.68733, icon: '' + url + '/mapicon/18.png'},
                    {latitude: 35.58555, longitude: 139.70637, icon: '' + url + '/mapicon/icon.png'},
                    {latitude: 35.55215, longitude: 139.74082, icon: '' + url + '/mapicon/icon.png'},
                    {latitude: 35.56317, longitude: 139.7053, icon: '' + url + '/mapicon/icon.png'}
                ]
		    });
		});

	 	// -------------------------------------------------------------
	    //   Google Map 
	    // -------------------------------------------------------------  

	    (function(){

	        var map;

	        map = new GMaps({
	            el: '#gmap',
	            lat: 48.8612228,
	            lng: 2.313042,
	            scrollwheel:false,
	            zoom: 6,
	            zoomControl : true,
	            panControl : true,
	            streetViewControl : true,
	            mapTypeControl: false,
	            overviewMapControl: true,
	            clickable: false
	        });

	        var image = '';
	        map.addMarker({
	            lat: 48.8612228,
	            lng: 2.313042,
	            icon: image,
	            animation: google.maps.Animation.DROP,
	            verticalAlign: 'bottom',
	            horizontalAlign: 'center',
	            backgroundColor: '#d3cfcf',
	        });


	        var styles = [ 

	        {
	            "featureType": "road",
	            "stylers": [
	            { "color": "#969696" }
	            ]
	        },{
	            "featureType": "water",
	            "stylers": [
	            { "color": "#cecece" }
	            ]
	        },{
	            "featureType": "landscape",
	            "stylers": [
	            { "color": "#efefef" }
	            ]
	        },{
	            "elementType": "labels.text.fill",
	            "stylers": [
	            { "color": "#555555" }
	            ]
	        },{
	            "featureType": "poi",
	            "stylers": [
	            { "color": "#cfcfcf" }
	            ]
	        },{
	            "elementType": "labels.text",
	            "stylers": [
	            { "saturation": 1 },
	            { "weight": 0.1 },
	            { "color": "#848484" }
	            ]
	        }

	        ];

	        map.addStyle({
	            styledMapName:"Styled Map",
	            styles: styles,
	            mapTypeId: "map_style"  
	        });

	        map.setStyle("map_style");
	    }()); 
	</script>
@endsection