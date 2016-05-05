<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{asset('assets/styles/common/master.css')}}">
        <script src="{{asset('node_modules/es6-shim/es6-shim.min.js')}}"></script>
        <script src="{{asset('node_modules/zone.js/dist/zone.js')}}"></script>
        <script src="{{asset('node_modules/reflect-metadata/Reflect.js')}}"></script>
        <script src="{{asset('node_modules/rxjs/bundles/Rx.umd.js')}}"></script>
        <script src="{{asset('node_modules/@angular/core/core.umd.js')}}"></script>
        <script src="{{asset('node_modules/@angular/common/common.umd.js')}}"></script>
        <script src="{{asset('node_modules/@angular/compiler/compiler.umd.js')}}"></script>
        <script src="{{asset('node_modules/@angular/platform-browser/platform-browser.umd.js')}}"></script>
        <script src="{{asset('node_modules/@angular/platform-browser-dynamic/platform-browser-dynamic.umd.js')}}"></script>
        @yield('modules')
    </head>
    
    <body>
    @yield('content')
    </body>
</html>