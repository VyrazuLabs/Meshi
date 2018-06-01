@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.News') }}
@endsection

@section('add-meta')

@endsection

@section('content')

<section id="" class="clearfix category-page">
	<div class="col-lg-12 col-xs-12 p-0">
		<div class="container">
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb new-breadcrumb">
					<li class="t-orange"><a href="{{ url('/')}}">{{ trans('app.HOME')}}</a></li>
					<li class="t-orange"><a href="{{route('news_details',['news_id' => $news->news_id])}}">{{ trans('app.News') }}</a></li>
				</ol><!-- breadcrumb -->
				<h2 class="title d-inline-block t-orange">{{ trans('app.News') }}</h2>
			</div>
			<div class="col-lg-12 col-xs-12 p-0 text-center">
				<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-0 d-inline-block float-none section about boxes-card">
					<div class="about-info news-list-box">
						<!-- about-text -->
						<div class="col-md-12 col-xs-12 text-center">
							<!-- <div class="col-md-8 float-none d-inline-block"> -->
								<div class="about-text">
									<!-- title-paragraph -->
									<div class="description-paragraph news-list-title">
										<h3 class="about-us-text news-details-text">{{$news->title}}</h3>
									</div>
									<!-- title-paragraph -->

									<!-- content-paragraph -->
									<div class="description-paragraph">
										<p class="about-us-text news-details-description-text">@php echo nl2br($news->contents); @endphp</p>
									</div>
									<!-- content-paragraph -->
								</div>
							<!-- </div> -->
						</div><!-- about-text -->
					</div><!-- about-info -->
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('add-js')
@endsection
