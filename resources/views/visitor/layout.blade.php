<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- My Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="visitor/css/style.css">
    <link rel="stylesheet" type="text/css" href="visitor/css/lightslider.css"/>
    <!--Jquery-->
    <script type="text/javascript" src="visitor/js/JQuery3.3.1.js"></script>
    <script type="text/javascript" src="visitor/js/lightslider.js"></script>

    <title>@yield('title')</title>
  </head>

<body>

  <div class="dashboard-main-wrapper">
    <div>
      <!-- Header -->
      @include('visitor.header')
    </div>
    <!-- Content -->
    <div>
      @yield('content')
    </div>
    <div>
      <!-- Footer -->
      @include('visitor.footer')
    </div>
  </div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="visitor/js/script.js" type="text/javascript"></script> 
</body>


</html>