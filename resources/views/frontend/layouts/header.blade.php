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
							<!-- @if(Auth::user() && Auth::user()->type == 1)
								<li class="active"><a href="{{ url('/food/create')}}">Add Food Item </a></li>
							@endif -->
							<!-- <li><a href="{{ url('food/categories') }}">Category</a></li> -->
							<!-- <li><a href="{{ url('food/details') }}">all ads</a></li> -->
							<!-- <li><a href="#">Help/Support</a></li>  -->
							<!-- <li><a href="#">Pages</a></li> -->
						@php
							$choose_type = trans('app.-- Select Language --');
							$Japanese = trans('app.Japanese');
						@endphp

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

					<!-- sign-in -->
					<!-- <div class="languagedropdown">
						<div id="google_translate_element" class="headlanguage-select"></div>
					</div> -->					
					<ul class="sign-in">
						<li>
                
						@php 
							$langName =[];
							if(Session::has('lang_name')) {
								$langName = Session::get('lang_name');
                    			
							}

						@endphp
							{{ Form::select('language', ['en' => 'English', 'ja' => $Japanese], $langName, ['class' => 'head-choose','placeholder' => "$choose_type", 'id'=>'languageSwitcher']) }}

						</li>
						<li>
							
						@if(Auth::User())
							<i class="fa fa-user"></i>
							{{Auth::User()->name}}
						</li>
			            <li>  <a href="{{route('user_sign_out')}}" class=""><i class="fa fa-sign-out"></i></a></li>
						@else
						<li><a href="{{ url('/sign-in') }}"> {{ trans('app.Sign In') }} </a></li>
						@endif
					</ul><!-- sign-in -->					
				</div>
				<!-- nav-right -->
			</div><!-- container -->
		</nav><!-- navbar -->
	</header><!-- header -->