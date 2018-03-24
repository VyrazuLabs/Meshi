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
							<li class="active"><a href="{{ url('/')}}">Home</a></li>
							<!-- <li><a href="{{ url('food/categories') }}">Category</a></li> -->
							<!-- <li><a href="{{ url('food/details') }}">all ads</a></li> -->
							<!-- <li><a href="#">Help/Support</a></li>  -->
							<!-- <li><a href="#">Pages</a></li> -->
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
					<ul class="sign-in">
						<li><i class="fa fa-user"></i></li>
						@if(Auth::User())
							{{Auth::User()->name}}
							<div class="pull-right">
			                  <a href="{{route('user_sign_out')}}" class="btn btn-default btn-flat">Sign out</a>
			                </div>
						@else
						<li><a href="{{ url('/sign-in') }}"> Sign In </a></li>
						@endif
						<!-- <li><a href="#">Register</a></li> -->
					</ul><!-- sign-in -->					

					<!-- <a href="#" class="btn">Post Your Food</a> -->
				</div>
				<!-- nav-right -->
			</div><!-- container -->
		</nav><!-- navbar -->
	</header><!-- header -->