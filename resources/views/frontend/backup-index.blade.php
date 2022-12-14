@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.sharemeshi') }}
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
		</div><!-- row -->
		@php 
			$date_today = date("Y-m-d"); 
			$date_tomorrow = date('Y-m-d',  strtotime($date_today . ' +1 day'));
        	$date_after_tomorrow = date('Y-m-d',  strtotime($date_today . ' +2 day'));
        	$date_next_day_of_tomorrow = date('Y-m-d',  strtotime($date_today . ' +3 day'));
		@endphp

		<!-- featureds -->
		@if(count($today_food_items)>0)
			<div class="section featureds">
				<div class="row">
					<!-- featured-top -->
					<div class="col-sm-12">
						<div class="featured-top">
							<h4>{{ trans('app.Today') }}</h4>
						</div>
					</div><!-- featured-top -->
				</div>
					
				<div class="row">
					@foreach($today_food_items as $food)
						@if($food->date == $date_today)
							<!-- featured -->
							<div class="col-md-4 col-lg-3">
								<!-- featured -->
								<div class="featured">
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
						@endif
					@endforeach
				</div><!-- row -->				
			</div><!-- featureds -->
		@endif
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
						@if($food->date == $date_tomorrow)
							<!-- featured -->
							<div class="col-md-4 col-lg-3">
								<!-- featured -->
								<div class="featured">
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
						@endif
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
							@if($food->date == $date_after_tomorrow)
								<!-- featured -->
								<div class="col-md-4 col-lg-3">
									<!-- featured -->
									<div class="featured">
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
							@endif
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
							<h4>{{ date('Y-m-d', strtotime($next_day_of_tomorrow))}}</h4>
						</div>
					</div><!-- featured-top -->
				</div>
					
				<div class="row">
					@foreach($next_day_of_tomorrow_food_items as $food)
						@if($food->date == $date_next_day_of_tomorrow)
							<!-- featured -->
							<div class="col-md-4 col-lg-3">
								<!-- featured -->
								<div class="featured">
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
						@endif
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
		        scaleControl: false,
                scrollwheel: false,
                zoomControl: false,
                mapTypeControl: false,
                navigationControl: false,
                disableDoubleClickZoom: true,
                markers: [
                    {latitude: 35.5625, longitude: 139.7161, icon: '' + url + '/mapicon/charactor.png'},
                    {latitude: 35.5642, longitude: 138.7161, icon: '' + url + '/mapicon/charactor.png'},
                    {latitude: 35.56595, longitude: 139.70959, icon: '' + url + '/mapicon/charactor.png'},
                    {latitude: 35.57477, longitude: 139.69635, icon: '' + url + '/mapicon/charactor.png'},
                    {latitude: 35.56913, longitude: 139.68733, icon: '' + url + '/mapicon/charactor.png'},
                    {latitude: 35.58555, longitude: 139.70637, icon: '' + url + '/mapicon/charactor.png'},
                    {latitude: 35.56317, longitude: 139.7053, icon: '' + url + '/mapicon/charactor.png'},
                    {latitude: 35.55389, longitude: 139.73061, icon: '' + url + '/mapicon/user1.png'},
                    {latitude: 35.55416, longitude: 139.71254, icon: '' + url + '/mapicon/user2.png'},
                    {latitude: 35.56604, longitude: 139.69665, icon: '' + url + '/mapicon/user3.png'},
                    {latitude: 35.594912, longitude: 139.681057, icon: '' + url + '/mapicon/5ad1e502ad8f1.png'},
					{latitude: 35.594912, longitude: 139.681057, icon: '' + url + '/mapicon/5ad1e502ad8f1.png'},
                    {latitude: 35.556392, longitude: 139.725880, icon: '' + url + '/mapicon/5ad1d3815d447.png'},
                    {latitude: 35.556605, longitude: 139.725880, icon: '' + url + '/mapicon/5ad1c4e53b88a.png'},
                    {latitude: 35.572387, longitude: 139.707566, icon: '' + url + '/mapicon/5ad1bcc313395.png'},
                    {latitude: 35.563625, longitude: 139.707788, icon: '' + url + '/mapicon/5ad2255fc7b61.png'},
                    {latitude: 35.570664, longitude: 139.714478, icon: '' + url + '/mapicon/charactor.png'}
                ]
		    });
		});

	 	// -------------------------------------------------------------
	    //   Google Map 
	    // -------------------------------------------------------------  

	    (function(){

            // var map;
            //
            // map = new GMaps({
	         //    el: '#gmap',
	         //    lat: 48.8612228,
	         //    lng: 2.313042,
	         //    scrollwheel:false,
	         //    zoom: 60,
	         //    zoomControl : false,
	         //    panControl : true,
	         //    streetViewControl : true,
	         //    mapTypeControl: false,
	         //    overviewMapControl: true,
	         //    clickable: false
            // });
            //
            // var image = '';
            // map.addMarker({
	         //    lat: 48.8612228,
	         //    lng: 2.313042,
	         //    icon: image,
	         //    animation: google.maps.Animation.DROP,
	         //    verticalAlign: 'bottom',
	         //    horizontalAlign: 'center',
	         //    backgroundColor: '#d3cfcf',
            // });
            //
            //
            // var styles = [
            //
            // {
	         //    "featureType": "road",
	         //    "stylers": [
	         //    { "color": "#969696" }
	         //    ]
            // },{
	         //    "featureType": "water",
	         //    "stylers": [
	         //    { "color": "#cecece" }
	         //    ]
            // },{
	         //    "featureType": "landscape",
	         //    "stylers": [
	         //    { "color": "#efefef" }
	         //    ]
            // },{
	         //    "elementType": "labels.text.fill",
	         //    "stylers": [
	         //    { "color": "#555555" }
	         //    ]
            // },{
	         //    "featureType": "poi",
	         //    "stylers": [
	         //    { "color": "#cfcfcf" }
	         //    ]
            // },{
	         //    "elementType": "labels.text",
	         //    "stylers": [
	         //    { "saturation": 1 },
	         //    { "weight": 0.1 },
	         //    { "color": "#848484" }
	         //    ]
            // }
            //
            // ];
            //
            // map.addStyle({
	         //    styledMapName:"Styled Map",
	         //    styles: styles,
	         //    mapTypeId: "map_style"
            // });
            //
            // map.setStyle("map_style");
            // console.log(map.getMaximumResolution());
            // map.getMinimumResolution = function(){return 15;};
            // map.getMaximumResolution = function(){return 15;};
            // console.log(map);
	    }()); 
	</script>
@endsection