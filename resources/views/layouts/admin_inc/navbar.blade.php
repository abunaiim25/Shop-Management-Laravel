@php
$front = App\Models\FrontControl::first();
@endphp

<!-- partial:partials/_navbar.html -->
<nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
        <a class="navbar-brand brand-logo-mini" href="#"><img
                src="{{ asset('img_DB/front/logo/' . $front->logo_small) }}" alt="logo" /></a>
    </div>


    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">

        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>

        {{--sesrch--}}
        @yield('search')

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
        </button>



    </div>
</nav>
<!-- partial -->