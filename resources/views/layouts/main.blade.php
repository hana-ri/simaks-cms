<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page }}</title>

    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <!-- BS5 CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-5.1.3-dist/css/bootstrap.min.css') }}">
    @stack('styles')

</head>

<body>

    @yield('container')

    <!-- BS5 JavaScript -->
    <script type="text/javascript" src="{{ asset('vendor/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
