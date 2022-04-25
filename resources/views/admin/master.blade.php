<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lowongan Kerja</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{ asset('/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">

    <!-- ck editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>

</head>

<body>
    <div class="dashboard-main-wrapper">
        <!-- Header -->
        @include('admin.header')
        <!-- Sideabar -->
        @include('admin.sidebar')
        <!-- Content -->
        @yield('content')
        <!-- Footer -->
        @include('admin.footer')
    </div>
    <script src="{{ asset('/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="{{ asset('/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{ asset('/libs/js/main-js.js')}}"></script>

</body>

</html>
