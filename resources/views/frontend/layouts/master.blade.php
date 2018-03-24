<!DOCTYPE html>
<html lang="en">
  <head>
	<!-- Your Stylesheets, Scripts & Title
    ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Theme Region">
   	<meta name="description" content="">

    <title>@yield('title')</title>
  
    @include('frontend.layouts.head')

    @yield('add-meta')
    <!-- section for adding page specific CSS -->

    @yield('add-css')
  </head>
    @include('frontend.layouts.header')
    @yield('content')
    @include('frontend.layouts.footer')
	<!-- JS -->
    <script src="{{ url('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ url('frontend/js/modernizr.min.js') }}"></script>
    <script src="{{ url('frontend/js/bootstrap.min.js') }}"></script>
	  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlnFMM7LYrLdByQPJopWVNXq0mJRtqb38"></script>
	  <script src="{{ url('frontend/js/gmaps.min.js') }}"></script>
	  <script src="{{ url('frontend/js/goMap.js') }}"></script>
    <script src="{{ url('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('frontend/js/smoothscroll.min.js') }}"></script>
    <script src="{{ url('frontend/js/scrollup.min.js') }}"></script>
    <script src="{{ url('frontend/js/price-range.js') }}"></script> 
    <script src="{{ url('frontend/js/jquery.countdown.js') }}"></script>   
    <script src="{{ url('frontend/js/custom.js') }}"></script>
	   <script src="{{ url('frontend/js/switcher.js') }}"></script>
    <!-- sweetalert -->
    <script src="{{ url('/js/sweetalert.min.js') }}"></script>
    <!-- PNOTIFY js -->
    <script type="text/javascript" src="{{ url('js/pnotify.custom.min.js') }}"></script>
    <script type="text/javascript">

    //For language translate
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ja,en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <script type="text/javascript">
      @if( session('success') )
          new PNotify({
              title: 'Success',
              text: '{{ session("success") }}',
              type: 'success',
              buttons: {
                  sticker: false
              }
          });
      @endif
      @if( session('error') )
          new PNotify({
              title: 'Error',
              text: '{{ session("error") }}',
              type: 'error',
              buttons: {
                  sticker: false
              }
          });
      @endif
    </script>
    @yield('add-js')

  </body>
</html>