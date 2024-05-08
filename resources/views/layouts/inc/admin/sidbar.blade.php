<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="mdi mdi-speedometer menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-circle-outline menu-icon"></i>
                <span class="menu-title">UI Elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                    </li>
                </ul>
            </div>
        </li>



        <li class="nav-item {{ Request::is('admin/orders') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/orders') }}">
                <i class="mdi mdi-sale menu-icon"></i>
                <span class="menu-title">Order</span>
            </a>
        </li>



        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false"
                aria-controls="category">
                <i class="mdi mdi-view-list menu-icon"></i>
                <span class="menu-title">category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/category/created') }}">
                            add category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/category') }}" {{-- href="view category" --}}>
                            view category</a>
                    </li>
                </ul>
            </div>
        </li>



        <li class="nav-item {{ Request::is('admin/sliders') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/sliders') }}">
                <i class="mdi mdi-view-carousel menu-icon"></i>
                <span class="menu-title">Home slider</span>
            </a>
        </li>



        <li class="nav-item {{ Request::is('admin/Brand') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/Brand') }}">
                <i class="mdi  mdi-factory menu-icon"></i>
                <span class="menu-title">brands</span>
            </a>
        </li>



        <li class="nav-item {{ Request::is('admin/colors') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/colors') }}">
                <i class="mdi mdi-invert-colors menu-icon"></i>
                <span class="menu-title">colors</span>
            </a>
        </li>



        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="false"
                aria-controls="products">
                <i class="mdi mdi-shopping menu-icon"></i>
                <span class="menu-title">products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="products">
                <ul class="nav flex-column sub-menu">
                    {{--   <li>
                         <a class="nav-link" href="{{ url('admin/Products/create') }}">
                             add products
                         </a>
                     </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/Products') }}">products view</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/Products/create') }}">add products</a>
                    </li>


                </ul>
            </div>
        </li>

        <li class="nav-item {{ Request::is('admin/users') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/users') }}">
                <i class="mid mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">user mang</span>
            </a>
        </li>



        <li class="nav-item {{ Request::is('admin/setting') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/setting') }}">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">site setting</span>
            </a>
        </li>
    </ul>
</nav>


{{-- <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Sales</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-circle-outline menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/category/create') }}">ِAdd
                            Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/category') }}">View Category</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-circle-outline menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/Products/create') }}">ِAdd
                            Products</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/Products') }}">View Products</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/Brand') }}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/colors') }}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Colors</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">User </span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/sliders') }}">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Home Slider</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="documentation/documentation.html">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Site Setting</span>
            </a>
        </li>
    </ul>
</nav>
 --}}
