@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.sharemeshi') }}
@endsection

@section('add-meta')
@endsection

@section('content')
<section id="" class="clearfix user-page">
	<div class="container">
		<div class="row text-center">
			<!-- user-login -->
			<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<div class="user-account boxes-card">
					<p>
						Oops this session has expired!!
					</p>
				</div>
			</div><!-- user-login -->
		</div><!-- row -->
	</div><!-- container -->
</section>


@endsection

@section('add-js')
@endsection
