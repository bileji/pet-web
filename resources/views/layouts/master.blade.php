<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{asset('node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
        <script src="{{asset('node_modules/angular/angular.min.js')}}"></script>
        @yield('modules')
    </head>

    <body>
    @yield('container')
    </body>
</html>