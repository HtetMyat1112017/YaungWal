<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yaung Wal</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('yaungwal_dashboard/feather-icons-web/feather.css')}}">
    <link rel="stylesheet" href="{{asset('yaungwal_dashboard/style.css')}}">
</head>
<body>
<section class="main container-fluid">
    <div class="row">
        <!--        sidebar start-->
    @include('Backend.dashboard_ui.sidebar')
        <!--        sidebar end-->
        <!--        content start   -->
    @include('Backend.dashboard_ui.content-header')
    <!--        content end   -->
    </div>
</section>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('yaungwal_dashboard/js/popper.js')}}"></script>
@yield('jsscript');
</body>
</html>
