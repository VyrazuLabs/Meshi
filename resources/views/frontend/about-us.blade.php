@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.About Us') }}
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
					<li class="t-orange"><a href="{{route('about_us')}}">{{ trans('app.About Us') }}</a></li>
				</ol><!-- breadcrumb -->						
				<h2 class="title d-inline-block t-orange">{{ trans('app.About Us') }}</h2>
			</div>
			<div class="section about boxes-card">
				<div class="about-info">
					<div class="row">
						<!-- about-text -->
						<div class="col-md-12 col-xs-12 text-center">
							<div class="col-md-8 float-none d-inline-block">
								<div class="about-text">
									<h3 class="t-black about-text-title">{{ trans('app.About Us') }}</h3>
									<!-- description-paragraph -->
									<div class="description-paragraph">
										<p class="about-us-text">おすそ分け文化、はじめませんか？</p>
									</div>
									<!-- description-paragraph -->
									
									<!-- description-paragraph -->
									<div class="description-paragraph">
										<p class="about-us-text">高度経済成長期、日本にはご近所づきあいという素晴らしい文化がありました。ご近所同士のふれあい、見守り、おすそ分け.......</p>
									</div>
									<!-- description-paragraph -->
									<!-- description-paragraph -->
									<div class="description-paragraph">
										<p class="about-us-text">我々シェアメシはこのご近所づきあいこそ、高齢化社会や少子化問題、女性の社会進出など、日本の重要課題を解決する糸口であると考えております。</p>
									</div>
									<!-- description-paragraph -->
									<!-- description-paragraph -->
									<div class="description-paragraph">
										<p class="about-us-text mb-0">シェアメシは、手料理の「おすそ分け」を通して、ご近所付き合いという『「顔の見える」地域社会を取り戻す事』、女性の活躍促進をミッションとしてサービスをご提供しております。</p>
									</div>
									<!-- description-paragraph --> 
								</div>
							</div>
						</div><!-- about-text -->
					</div>
				</div><!-- about-info -->
			</div>
		</div>
	</div>
</section>
@endsection

@section('add-js')
@endsection
