<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <title>Anti Nganggur {{$title ?? ''}}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- My Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> -->
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('/visitor/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/visitor/css/lightslider.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('visitor/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('visitor/css/lightslider.css')}}">
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRuGhlvwEE2sjmF0qH4yQtVK_MY7rF6s0&callback=myMap"></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRuGhlvwEE2sjmF0qH4yQtVK_MY7rF6s0&callback=initMap&libraries=&v=weekly" defer></script>
</head>

<body>

    <div>
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

    <!--Jquery-->
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('visitor/js/JQuery3.3.1.js')}}"></script>
    <script type="text/javascript" src="{{ asset('visitor/js/lightslider.js')}}"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="{{ asset('visitor/js/script.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/vendor/ckeditor5/ckeditor.js') }}"></script>

    <script>
        [...document.querySelectorAll('.ckeditor')].forEach(element => {
            ClassicEditor.create(element);
        });
    </script>

    <!-- googlemap -->
    <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: -34.397,
                    lng: 150.644
                },
                zoom: 8,
            });
        }
    </script>
</body>

</html>