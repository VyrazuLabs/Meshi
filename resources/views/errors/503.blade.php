<!DOCTYPE html>
<html lang="ja">
<head>
  <!-- Your Stylesheets, Scripts & Title
    ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="sharemeshi">
   	<meta name="description" content="シェアメシは、空いた時間を使ってお料理を近所の方におすそ分けしたい方と、栄養価の高い家庭料理を求めている方をマッチングする、新しいフードシェアリングサービスです。">

    <title>@yield('title')</title>

    @include('frontend.layouts.head')

    @yield('add-meta')
    <!-- section for adding page specific CSS -->

    @yield('add-css')

    @if(App::environment('production'))
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-K3JV9SN');
    </script>
    @endif
    <!-- End Google Tag Manager -->
  </head>

  <body>
    @if(App::environment('production'))

    <!-- Google Tag Manager (noscript) -->
    <noscript>
      <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K3JV9SN"
                      height="0" width="0" style="display:none;visibility:hidden">
      </iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    @endif
    <header></header>





<!-- signin-page -->
	<section id="" class="clearfix user-page maintanence-back">
		<div class="container">
			<div class="row text-center">
				<!-- user-login -->
				<div class="col-sm-12 col-md-10 float-none d-inline-block">
					<div class="user-account boxes-card signin-box maintainance-box">
						<div class="col-md-6 col-sm-12">
							<img src="{{ url('frontend/images/Logo.png') }}" class="img-responsive maintainance-logo">
							<p class="t-orange text-left mb-0 maintainanc-text">Site is under maintenance.</p>
							<p class="t-orange text-left mb-0 maintainanc-text">We'll be back soon.</p>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="maintainance-image-back">
							<img src="{{ url('frontend/images/maintenance_image.png') }}" class="img-responsive maintainance-image">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer></footer>
	</body>
</html>
