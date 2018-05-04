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

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-K3JV9SN');
    </script>
    <!-- End Google Tag Manager -->
  </head>
  <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript>
      <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K3JV9SN"
                      height="0" width="0" style="display:none;visibility:hidden">
      </iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    @include('frontend.layouts.header')
    @yield('content')
    @include('frontend.layouts.footer')
    @include('frontend.layouts.modal')
  <!-- JS -->
    <script src="{{ url('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ url('frontend/js/modernizr.min.js') }}"></script>
    <script src="{{ url('frontend/js/bootstrap.min.js') }}"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlnFMM7LYrLdByQPJopWVNXq0mJRtqb38"></script> -->
    @php
      $langName =[];
      if(Session::has('lang_name')) {
        $langName = Session::get('lang_name');
      }
    @endphp
    @if($langName == 'ja')
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlnFMM7LYrLdByQPJopWVNXq0mJRtqb38&libraries=places&language=ja"></script>
    @elseif($langName == 'en')
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlnFMM7LYrLdByQPJopWVNXq0mJRtqb38&libraries=places&language=en"></script>
    @else
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlnFMM7LYrLdByQPJopWVNXq0mJRtqb38&libraries=places&language=ja"></script>
    @endif
    <script src="{{ url('frontend/js/gmaps.min.js') }}"></script>
    <script src="{{ url('frontend/js/goMap.js') }}"></script>

    <script src="{{ url('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('frontend/js/smoothscroll.min.js') }}"></script>
    <script src="{{ url('frontend/js/scrollup.min.js') }}"></script>
    <script src="{{ url('frontend/js/price-range.js') }}"></script>
    <script src="{{ url('frontend/js/jquery.countdown.js') }}"></script>
    <script src="{{ url('frontend/js/custom.js') }}"></script>
     <script src="{{ url('frontend/js/switcher.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ url('frontend/moment/min/moment.min.js') }}"></script>
    <script src="{{ url('frontend/moment/moment-with-locales.js') }}"></script>

    <script src="{{ url('frontend/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ url('frontend/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- timepicker -->
    <script src="{{ url('frontend/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
    <!-- bootstrap datetimepicker -->
    <script src="{{ url('frontend/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- sweetalert -->
    <script src="{{ url('/js/sweetalert.min.js') }}"></script>
    <!-- PNOTIFY js -->
    <script type="text/javascript" src="{{ url('js/pnotify.custom.min.js') }}"></script>

    <!-- <script type="text/javascript">

    For language translate
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ja,en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->

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

      $('#languageSwitcher').change(function() {
        var locale = $(this).val();
        $.ajax({
          url: "{{ url('/language') }}",
          type: 'GET',
          data: { 'locale': locale },
          success: function(data) {
            location.reload();
          }
        });
      })

      /**
       * [give reviews as eater]
       * @param  {[type]} qualityRating [description]
       * @return {[type]}               [description]
       */
      function rateQuality(qualityRating) {
        var qualityRating = qualityRating.getAttribute("data-id");
        $('#qualityRatingId').val(qualityRating);
      }

      function rateDelivery(deliveryRating) {
        var deliveryRating = deliveryRating.getAttribute("data-id");
        $('#deliveryRatingId').val(deliveryRating);
      }

      function rateCommunication(communicationRating) {
        var communicationRating = communicationRating.getAttribute("data-id");
        $('#communicationRatingId').val(communicationRating);
      }

      $('.store-reviews').click(function() {
        var form_data = new FormData($("#eaterReviewForm")[0]);
        $.ajax({
          headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
          data: form_data,
          type: 'POST',
          url: "{{ url('/user/save-eater-review') }}",
          contentType: false,
          processData: false,
          success: function(result) {
            var obj = $.parseJSON(result);
            if(obj.success == 0 ) {
              if(obj.error.quality_ratings || obj.error.delivery_ratings || obj.error.communication_ratings ){
                new PNotify({
                  title: 'Error',
                  text: 'Ratings fields are required',
                  type: 'error',
                  buttons: {
                    sticker: false
                  }
                });
              }
              if(obj.error.review_description) {
                $('.eater_reviews').addClass('review-error');
              }
            }
            else if(obj.success == 1) {
              location.reload();
            }
          }
        })
      });


      /**
       * [give reviews as creator]
       * @param  {[type]} communicationRating [description]
       * @return {[type]}                     [description]
       */
      function rateEaterCommunication(communicationRating) {
        var communicationRating = communicationRating.getAttribute("data-id");
        $('#creatorCommunicationRatingId').val(communicationRating);
      }

      $('.creator-communication').click(function() {
        var creator_review_form_data = new FormData($("#creatorReviewForm")[0]);
        $.ajax({
          headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
          data: creator_review_form_data,
          type: 'POST',
          url: "{{ url('/user/save-creator-review') }}",
          contentType: false,
          processData: false,
          success: function(result) {
            var obj = $.parseJSON(result);
            if(obj.success == 0 ) {
              if(obj.error.communication_ratings){
                new PNotify({
                  title: 'Error',
                  text: 'Rating field is required',
                  type: 'error',
                  buttons: {
                    sticker: false
                  }
                });
              }
              if(obj.error.communication_description) {
                $('.communication_details').addClass('review-error');
              }
            }
            else if(obj.success == 1) {
              location.reload();
            }
          }
        })
      });




    </script>
    @yield('add-js')

  </body>
</html>
