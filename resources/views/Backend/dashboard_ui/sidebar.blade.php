<div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar">
    <div class="d-flex justify-content-between align-items-center py-2 mt-3 nav-brand">
        <div class="d-flex align-items-center">
                    <span class="bg-primary p-2 rounded d-flex justify-content-center align-items-center me-2">
                        <i class="feather-shopping-bag text-white h4 mb-0"></i>
                    </span>
            <span class="font-weight-bolder h4 mb-0 text-uppercase text-primary">Yaung Wal</span>
        </div>
        <button class="hide-sidebar-btn btn btn-light d-block d-lg-none">
            <i class="feather-x text-primary" style="font-size: 2em;"></i>
        </button>
    </div>
    <div class="nav-menu">
        <ul>
            <li class="menu-item">
                <a href="" class="menu-item-link nav-link  active">
                            <span>
                                <i class="feather-home"></i>
                                Dashboard
                            </span>
                </a>
            </li>
            <li class="menu-spacer"></li>
            <li class="menu-title">
                <span>Manage Test</span>
            </li>
            <li class="menu-item">
                <a href="" class="menu-item-link nav-link ">
                    <span>
                        <i class="feather-home"></i>
                        Home
                    </span>
                </a>
            </li>
            <li class="menu-title">
                <span>Category Management</span>
            </li>
            <li class="menu-item">
                <a href="{{route('category.create')}}" class="menu-item-link nav-link text-black {{request()->is('category/create') ? "active": " "}}">
                    <span>
                        <i class="feather-plus-circle text-primary"></i>
                      Add Category
                    </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{route('category.index')}}" class="menu-item-link nav-link text-black {{request()->is('category') ? "active": " "}}">
                    <span>
                        <i class="feather-list text-primary"></i>
                       All Category
                    </span>
                </a>
            </li>
            <li class="menu-title">
                <span>Product Management</span>
            </li>
            <li class="menu-item">
                <a href="{{route('product.create')}}" class="menu-item-link nav-link text-black {{request()->is('product/create') ? "active": " "}}">
                    <span>
                        <i class="feather-plus-circle text-primary"></i>
                       Add Product
                    </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{route('product.index')}}" class="menu-item-link nav-link text-black {{request()->is('product') ? "active": " "}}">
                    <span>
                        <i class="feather-list text-primary"></i>
                       All Product
                    </span>
                </a>
            </li>
            <li class="menu-title">
                <span>User Management</span>
            </li>
            <li class="menu-item">
                <a href="{{route('user.index')}}" class="menu-item-link nav-link text-black {{request()->is('user') ? "active": " "}}">
                    <span>
                        <i class="feather-list text-primary"></i>
                       All User
                    </span>
                </a>
            </li>
            <li class="menu-title">
                <span>Setting</span>
            </li>
            <li class="menu-item">
                <a href="{{route('user.show',auth()->user()->id)}}" class="menu-item-link nav-link text-black {{request()->is('user/edit',auth()->user()->id) ? "active": " "}}">
                    <span>
                        <i class="feather-user text-primary"></i>
                       Profile
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>
