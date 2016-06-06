<html>
<head>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script src="{{asset('node_modules/angular/angular.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/common/master.css')}}">
    @yield('modules')
</head>

<body>
@yield('container')
</body>
</html>