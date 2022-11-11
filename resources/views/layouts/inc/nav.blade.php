<!--Navigation-->

@php
$front = App\Models\FrontControl::first();
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-light py-2 fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img style="height: 40px;" src="{{ asset('img_DB/front/logo/' . $front->logo_big) }}" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i id="bar" class="fas fa-bars"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto">


                <div class="d-flex justify-content-end">
                    {{-- change --}}
                    @if (Route::has('login'))
                    @auth
                    <!--user profile logout-->

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="nav-item  {{ Request::is('/user/profile') ? 'active' : '' }}">
                                <a class="nav-link " aria-current="page" href="{{ url('/user/profile') }}">My Profile
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </li>

                    @else
                    <a class="btn login-btn m-1 btn-sm" aria-current="page" href="{{ route('login') }}">Login</a>

                    <a class="btn login-btn m-1 btn-sm" aria-current="page" href="{{ route('register') }}">Register</a>
                    @endauth
                    @endif
                </div>
            </ul>



        </div>
    </div>


</nav>