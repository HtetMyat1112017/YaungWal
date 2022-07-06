<div class="col-12 col-lg-9 col-xl-10 vh-100 py-3 content">
    <div class="row header mb-4">
        <div class="col-12">
            <div class="p-2 bg-primary d-flex justify-content-between align-items-center rounded">
                <button class="show-sidebar-btn btn btn-primary d-block d-lg-none">
                    <i class="feather-menu text-light" style="font-size: 2em;"></i>
                </button>
                <form action="" method="post" class="d-none d-md-block">
                    <div class="d-flex">
                        <input type="text" class="form-control me-2" placeholder="Search Everything">
                        <button class="btn btn-light">
                            <i class="feather-search text-primary"></i>
                        </button>
                    </div>
                </form>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('storage/user_photo/'.auth()->user()->user_photo) ? asset('storage/user_photo/'.auth()->user()->user_photo) : asset('photo/user_default.png')}}" class=" rounded-circle" width="20px" height="20px" alt="">
                        {{auth()->user()->name}}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--content Area Start-->
    @yield('content')
    <!--content Area Start-->
</div>
