<html>
<head>
    <title>Angular 2 QuickStart JS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('assets/styles/styles.css')}}">

    <!-- 1. Load libraries -->
    <!-- IE required polyfill -->
    <script src="{{asset('node_modules/es6-shim/es6-shim.min.js')}}"></script>

    <script src="{{asset('node_modules/zone.js/dist/zone.js')}}"></script>
    <script src="{{asset('node_modules/reflect-metadata/Reflect.js')}}"></script>

    <script src="{{asset('node_modules/rxjs/bundles/Rx.umd.js')}}"></script>
    <script src="{{asset('node_modules/@angular/core/core.umd.js')}}"></script>
    <script src="{{asset('node_modules/@angular/common/common.umd.js')}}"></script>
    <script src="{{asset('node_modules/@angular/compiler/compiler.umd.js')}}"></script>
    <script src="{{asset('node_modules/@angular/platform-browser/platform-browser.umd.js')}}"></script>
    <script src="{{asset('node_modules/@angular/platform-browser-dynamic/platform-browser-dynamic.umd.js')}}"></script>

    <!-- 2. Load our 'modules' -->
    <script src="{{asset('scripts/app/app.component.js')}}"></script>
    <script src="{{asset('scripts/app/main.js')}}"></script>

</head>

<!-- 3. Display the application -->
<body>
    <my-app>Loading...</my-app>
</body>

</html>