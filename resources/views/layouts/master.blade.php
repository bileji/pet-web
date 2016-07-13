<html>
<head>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{asset('node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/common/master.css')}}">
    <script src="{{asset('node_modules/angular/angular.min.js')}}"></script>
    <script src="{{asset('node_modules/jquery/dist/jquery.min.js')}}"></script>
    @yield('modules')
</head>

<body>
@yield('container')
</body>
</html>