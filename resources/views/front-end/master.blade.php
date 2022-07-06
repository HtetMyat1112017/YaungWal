<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Yaung Wal')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('yaungwal_front_end/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('yaungwal_dashboard/feather-icons-web/feather.css')}}">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="#" class="mt-5 mb-4 search">
                <input type="text" class="form-control custom-input-box px-5 border-0 shadow-sm" placeholder="&#128269; Search here..">
            </form>
            @include('front-end.inclue_ui.nav-bar')
        </div>

        <div class="col-12 mb-5">
            <div class="mb-5">
                <a href="#" class="btn btn-warning custom-btn text-white font-weight-bold">
                    New Arrivals
                </a>
            </div>

            <div class="d-flex justify-content-center">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<script src="{{asset('yaungwal_front_end/js/app.js')}}"></script>
</body>
</html>
