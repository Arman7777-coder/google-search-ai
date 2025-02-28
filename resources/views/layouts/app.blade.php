<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Transform Company</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link href="{{asset('admin-src/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>


    <link href="{{asset('admin-src/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- icons -->
    <link href="{{asset('admin-src/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

</head>
<body class="loading authentication-bg authentication-bg-pattern">
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{asset('admin-src/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('admin-src/libs/feather-icons/feather.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('admin-src/js/app.min.js')}}"></script>
</body>
</html>
