<!DOCTYPE html>
<html>
  <head>
    <!-- Your Stylesheets, Scripts & Title
    ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
  
    @include('layouts.head')

    @yield('add-meta')
    <!-- section for adding page specific CSS -->

    @yield('add-css')
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      @include('layouts.header')
      @include('layouts.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
     
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            @yield('content')
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      @include('layouts.footer')
      <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ url('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Morris.js charts -->
    <script src="{{ url('bower_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ url('bower_components/morris.js/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ url('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ url('bower_components/jvectormap/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ url('bower_components/jvectormap/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ url('bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ url('bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ url('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ url('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- timepicker -->
    <script src="{{ url('bower_components/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ url('bower_components/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ url('bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('/js/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('/js/demo.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlnFMM7LYrLdByQPJopWVNXq0mJRtqb38&libraries=places"></script>

    <!-- PNOTIFY js -->
    <script type="text/javascript" src="{{ url('js/pnotify.custom.min.js') }}"></script>

    <script type="text/javascript">
      //PNOTIFY GLOBAL POPUPS
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
