<html>
<head>
    <title>Angular 2 QuickStart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{URL::asset('assets/styles/styles.css')}}">

    <script src="{{URL::asset('node_modules/es6-shim/es6-shim.min.js')}}"></script>

    <script src="{{URL::asset('node_modules/zone.js/dist/zone.js')}}"></script>
    <script src="{{URL::asset('node_modules/reflect-metadata/Reflect.js')}}"></script>
    <script src="{{URL::asset('node_modules/systemjs/dist/system.src.js')}}"></script>

    <!-- 2. Configure SystemJS -->
    <script src="{{URL::asset('public/scripts/systemjs.config.js')}}"></script>
    <script>
        System.import('app').catch(function (err) {
            console.error(err);
        });
    </script>
</head>

<!-- 3. Display the application -->
<body>
    <my-app>Loading...</my-app>
</body>
</html>