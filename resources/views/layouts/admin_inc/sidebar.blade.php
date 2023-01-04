@php
$front = App\Models\FrontControl::first();
@endphp


<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="#"><img src="{{ asset('img_DB/front/logo/' . $front->logo_big) }}" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="#"><img src="{{ asset('img_DB/front/logo/' . $front->logo_small) }}" alt="logo" /></a>
    </div>
    <ul class="nav">

        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/home')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/')}}" target="_blank">
                <span class="menu-icon">
                    <i class="fas fa-eye"></i>
                </span>
                <span class="menu-title">Visit Site </span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('admin_invoice_bill')}}">
                <span class="menu-icon">
                    <i class="fa-solid fa-money-bill"></i>
                </span>
                <span class="menu-title">Invoice/Bill</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('admin_combined_ledger')}}">
                <span class="menu-icon">
                    <i class="fa-solid fa-dollar-sign"></i>
                </span>
                <span class="menu-title">Transaction</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('admin_category')}}">
                <span class="menu-icon">
                    <i class="fa-solid fa-list"></i>
                </span>
                <span class="menu-title">Product Category</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('admin_shop_stock')}}">
                <span class="menu-icon">
                    <i class="fa-solid fa-cart-shopping"></i>
                </span>
                <span class="menu-title">Shop Stock</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('admin_godown_stock')}}">
                <span class="menu-icon">
                    <i class="fa-solid fa-shop"></i>
                </span>
                <span class="menu-title">Godown Stock</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('admin_contact')}}">
                <span class="menu-icon">
                    <i class="fa-solid fa-comments"></i>
                </span>
                <span class="menu-title">Contacts</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('admin_front_control')}}">
                <span class="menu-icon">
                    <i class="fa-solid fa-palette"></i>
                </span>
                <span class="menu-title">Design</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('users')}}">
                <span class="menu-icon">
                    <i class="fa-solid fa-users"></i>
                </span>
                <span class="menu-title">Users</span>
            </a>
        </li>


        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic5" aria-expanded="false" aria-controls="ui-basic5">
                <span class="menu-icon">
                    <i class="fa-solid fa-user"></i>
                </span>
                <span class="menu-title">Profile</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic5">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item menu-items">
                        <a class="nav-link" href="{{url('/user/profile')}}">
                            <span class="menu-icon">
                                <i class="fa-regular fa-user"></i>
                            </span>
                            <span class="menu-title">My Profile</span>
                        </a>
                    </li>

                    <li class="nav-item menu-items">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                            <span class="menu-icon">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </span>
                            <span class="menu-title">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
        </li>

    </ul>
</nav>