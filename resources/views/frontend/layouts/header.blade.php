  	<!-- header -->
	<header id="header" class="clearfix">
		<!-- navbar -->
		<nav class="navbar navbar-default">
			<div class="container">
				<!-- navbar-header -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ url('/')}}"><img class="img-responsive" src="{{ url('frontend/images/Logo.png') }}" alt="Logo"></a>
				</div>
				<!-- /navbar-header -->
				<div class="navbar-left">
					<div class="collapse navbar-collapse" id="navbar-collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="{{ url('/')}}">{{ trans('app.HOME')}}</a></li>
							@if(Auth::user() && Auth::user()->type == 1)
								<li><a href="{{route('profile_details',['user_id' => Auth::User()->user_id])}}">{{ trans('app.PROFILE') }}</a></li>
								<li><a href="{{ url('/food/create')}}">{{ trans('app.ADD FOOD ITEM') }} </a></li>
								<li><a href="{{ url('/food/lists')}}">{{ trans('app.FOOD LIST') }} </a></li>
								<li><a href="{{route('order_list')}}">{{ trans('app.Order List') }}</a></li>

							@elseif(Auth::user() && Auth::user()->type == 2)
								<li><a href="{{route('edit_profile_details',['user_id' => Auth::User()->user_id])}}">{{ trans('app.EDIT PROFILE') }}</a></li>
								<li><a href="{{route('purchased_list')}}">{{ trans('app.Purchased List') }}</a></li>
							@endif
							<!-- <li><a href="{{ url('food/categories') }}">{{ trans('app.CATEGORY') }}</a></li> -->

							<li><a href="{{ url('/about-us') }}">{{ trans('app.About Us') }}</a> </li>
							<li><a href="{{ url('/faq') }}">{{ trans('app.FAQ') }}</a></li>
						</ul>
					</div>
				</div>

				<!-- nav-right -->
				<div class="nav-right">
					<!-- language-dropdown -->
					<!-- <div class="dropdown language-dropdown">
						<i class="fa fa-globe"></i>
						<a data-toggle="dropdown" href="#"><span class="change-text">Japan</span> <i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu language-change">
							<li><a href="#">Other Country</a></li>
						</ul>
					</div> --><!-- language-dropdown -->
					<!-- <div class="cart-box-list">
						<a href="{{route('view_cart')}}"><img src="{{ url('frontend/images/cart.png') }}" class="img-responsive cart-icon-img"><span class="badge cart-badges">3</span></a>
					</div>
					<div class="cart-box-list">
						<a href="{{route('empty_cart')}}"><img src="{{ url('frontend/images/cart.png') }}" class="img-responsive cart-icon-img"><span class="badge cart-badges">0</span></a>
					</div> -->

					<!-- sign-in -->
					<ul class="sign-in">
						@if(Auth::User())
							<li><i class="fa fa-user"></i>{{Auth::User()->nick_name}}</li>
			            	<li><a href="{{route('user_sign_out')}}" class=""><i class="fa fa-sign-out"></i></a></li>
						@else
							<li><a href="{{ url('/sign-in') }}"> {{ trans('app.Sign In') }} </a></li>
							<li><a href="{{ url('/user/register') }}"> {{ trans('app.Sign Up here') }} </a></li>
						@endif
					</ul><!-- sign-in -->

					<div class="language-box ">
						@php
							$choose_type = trans('app.Select Language');
							$japanese = trans('app.Japanese');
							$langName =[];
							if(Session::has('lang_name')) {
								$langName = Session::get('lang_name');
							}
						@endphp
						{{ Form::select('language', ['ja' => $japanese,'en' => 'English'], $langName, ['class' => 'head-choose language-select', 'id'=>'languageSwitcher']) }}
					</div>
				</div>
				<!-- nav-right -->
			</div><!-- container -->
		</nav><!-- navbar -->
	</header><!-- header -->
