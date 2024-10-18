<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shorup Admin Panel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('admin-p/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('admin-p/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{ asset('admin-p/css/font.css') }}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Muli:300,400,700') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('admin-p/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('admin-p/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('admin-p/img/favicon.ico') }}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>


   @include('admin.header')


    <div class="d-flex align-items-stretch">

      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->




      <div class="page-content">



        <h1 class="text-center py-3" style="font-size: 35px">Welcome to <b class="text-primary" href="">Shorup Blog</b></h1>
      


        @include('admin.footer')



      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('admip-p/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-p/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('admin-p/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin-p/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('admin-p/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin-p/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin-p/js/charts-home.js') }}"></script>
    <script src="{{ asset('admin-p/js/front.js') }}"></script>
  </body>
</html>
