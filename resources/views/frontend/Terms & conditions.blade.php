@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.Terms & conditions') }}
@endsection

@section('add-meta')

@endsection

@section('content')
	<section id="" class="clearfix page">
		<div class="container">
			<div class="faq-page">
				<div class="breadcrumb-section">
					<!-- breadcrumb -->
					<ol class="breadcrumb new-breadcrumb">
						<li class="t-orange"><a href="{{ url('/')}}">{{ trans('app.HOME')}}</a></li>
						<li class="t-orange"><a href="{{route('terms')}}">{{ trans('app.Terms & conditions') }}</a></li>
					</ol><!-- breadcrumb -->						
					<h2 class="title t-orange">{{ trans('app.Terms & conditions') }}</h2>
				</div>
				<h4 class="t-black">For Food creator</h4>				
				<div class="accordion">
					<div class="panel-group" id="accordion">			

						<div class="panel panel-default panel-faq">
							<div class="panel-heading active-faq">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-one">
									<h4 class="panel-title">
									Claritas est etiam processus? 
									<span class="pull-right"><i class="fa fa-minus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-one" class="panel-collapse collapse collapse in">
								<div class="panel-body">
									<p>Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla</p>
									<p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum</p>
									<p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-two">
									<h4 class="panel-title">
									Vel illum dolore eu? 
									<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-two" class="panel-collapse collapse">
								<div class="panel-body">
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla</p>
									<p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl</p>	
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-three">
									<h4 class="panel-title">
									Nam liber tempor cum soluta? 
									<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-three" class="panel-collapse collapse">
								<div class="panel-body">
									<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
									<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>									
									<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi,</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-four">
									<h4 class="panel-title">
									Claritas est etiam processus dynamicus? 
									<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-four" class="panel-collapse collapse">
								<div class="panel-body">
									<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>									
									<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi,</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-five">
									<h4 class="panel-title">
									Duis autem vel eum iriure dolor? 
									<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-five" class="panel-collapse collapse">
								<div class="panel-body">
									<p>p ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option con</p>
									<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>									
									<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi,</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-six">
									<h4 class="panel-title">
									Mirum est notare quam littera gothica? 
									<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-six" class="panel-collapse collapse">
								<div class="panel-body">
									<p>Velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option con</p>
									<p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>									
									<p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi,</p>
								</div>
							</div>
						</div><!-- panel -->
					</div>
				</div>
				<h4 class="t-black">For Eater</h4>
				<div class="accordion">
					<div class="panel-group" id="eateraccordion">			
						<div class="panel panel-default panel-faq">
							<div class="panel-heading active-faq">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-one">
									<h4 class="panel-title">
									Claritas est etiam processus? 
									<span class="pull-right"><i class="fa fa-minus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-one" class="panel-collapse collapse collapse in">
								<div class="panel-body">
									<p>Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla</p>
									<p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum</p>
									<p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-two">
									<h4 class="panel-title">
									Vel illum dolore eu? 
									<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-two" class="panel-collapse collapse">
								<div class="panel-body">
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla</p>
									<p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl</p>	
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-three">
									<h4 class="panel-title">
									Nam liber tempor cum soluta? 
									<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-three" class="panel-collapse collapse">
								<div class="panel-body">
									<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
									<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>									
									<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi,</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-four">
									<h4 class="panel-title">
									Claritas est etiam processus dynamicus? 
									<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-four" class="panel-collapse collapse">
								<div class="panel-body">
									<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>									
									<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi,</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-five">
									<h4 class="panel-title">
									Duis autem vel eum iriure dolor? 
									<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-five" class="panel-collapse collapse">
								<div class="panel-body">
									<p>p ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option con</p>
									<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>									
									<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi,</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-six">
									<h4 class="panel-title">
									Mirum est notare quam littera gothica? 
									<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-six" class="panel-collapse collapse">
								<div class="panel-body">
									<p>Velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option con</p>
									<p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>									
									<p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi,</p>
								</div>
							</div>
						</div><!-- panel -->
					</div>
				</div>
			</div><!-- faq-page -->
		</div><!-- container -->
		<section id="something-sell" class="clearfix parallax-section">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h2 class="title">Did Not find your answer yet? Still need help ?</h2>
						<h4>Send us a note to Help Center</h4>
						<a href="{{route('contact_us')}}" class="btn btn-primary">{{ trans('app.Contact Us') }}</a>
					</div>
				</div><!-- row -->
			</div><!-- contaioner -->
		</section><!-- something-sell -->
	</section>
@endsection

@section('add-js')
@endsection
