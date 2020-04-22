<!DOCTYPE html>
<html>
<head>
  <title>Star Admin Premium Laravel Admin Dashboard Template</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

  <!-- plugin css -->
    <link rel="stylesheet" href="{{asset('assets/plugins/@mdi/font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css')}}">
  <!-- end plugin css -->

  <!-- plugin css -->
  @stack('plugin-styles')
  <!-- end plugin css -->

  <!-- common css -->
    <script src="{{asset('/css/app.css')}}"></script>
  <!-- end common css -->

  @stack('style')
</head>
<body data-base-url="{{url('/')}}">

  <div class="container-scroller" id="app">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      @yield('content')
    </div>
  </div>

    <!-- base js -->
  <script src="{{ asset('/assets/plugins/jQuery/app.js') }}"></script>
  <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/js/all.min.js"></script>

  <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    @stack('custom-scripts')
</body>
</html>
