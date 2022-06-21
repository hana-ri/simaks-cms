<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="seo & digital marketing">
    <meta name="keywords"
        content="marketing,digital marketing,creative, agency, startup,promodise,onepage, clean, modern,seo,business, company">
    <meta name="author" content="Themefisher.com">

    @stack('pageTitle')
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('/assets/assets/plugins/bootstrap/css/bootstrap.css') }}">
    <!-- Icofont Css -->
    <link rel="stylesheet" href="{{ asset('/assets/assets/plugins/fontawesome/css/all.css') }}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{ asset('/assets/assets/plugins/animate-css/animate.css') }}">
    <!-- Icofont -->
    <link rel="stylesheet" href="{{ asset('/assets/assets/plugins/icofont/icofont.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('/assets/assets/css/style.css') }}">


</head>


<body data-spy="scroll" data-target=".fixed-top">
    @include('partials\navbar')

   @yield('container')

   @include('partials/footer')



    <!--
    Essential Scripts
    =====================================-->


    <!-- Main jQuery -->
    <script src="{{ asset('/assets/assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="{{ asset('/assets/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Woow animtaion -->
    <script src="{{ asset('/assets/assets/plugins/counterup/wow.min.js') }}"></script>
    <script src="{{ asset('/assets/assets/plugins/counterup/jquery.easing.1.3.js') }}"></script>
    <!-- Counterup -->
    <script src="{{ asset('/assets/assets/plugins/counterup/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('/assets/assets/plugins/counterup/jquery.counterup.min.js') }}"></script>

    <!-- Google Map -->
    <script src="{{ asset('/assets/assets/plugins/google-map/gmap3.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap">
    </script>
    <!-- Contact Form -->
    <script src="{{ asset('/assets/assets/plugins/jquery/contact.js') }}"></script>
    <script src="{{ asset('/assets/assets/js/custom.js') }}"></script>

</body>

</html>
