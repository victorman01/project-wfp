<!-- BEGIN HEADER -->
<header class="wrapper bg-soft-primary">
    <nav class="navbar navbar-expand-lg center-nav transparent navbar-light py-3">
        <div class="container flex-lg-row flex-nowrap align-items-center">
            <div class="navbar-brand w-100">
                <a href="/" class="display-6 align-items-center">
                    <img src="{{ asset('sandbox360/img/eCommerceIcon.png') }}" style="width: 40px;"/>
                    ACEZ
                </a>
            </div>
            <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">

            </div>
            <!-- /.navbar-collapse -->
            <div class="navbar-other w-100 d-flex ms-auto">
                <ul class="navbar-nav flex-row align-items-center ms-auto">

                    {{-- FAVORITE PRODUCT --}}
                    <li class="nav-item"><a class="nav-link" href="{{ route('favorite.page') }}"><i
                                class="uil uil-heart"></i></a></li>

                    {{-- CART --}}
                    <li class="nav-item"><a class="nav-link" href="{{ route('keranjang.index') }}"><i
                                class="uil uil-shopping-cart"></i></a></li>

                    @if (Auth::check())
                        {{-- IF LOGGED IN --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{Auth::user()->nama}}
                            </a>
                            <ul class="dropdown-menu">
                                </li>
                                <li class="nav-item">
                                    <hr class="dropdown-divider">
                                </li>
                                <li class="nav-item">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item text-danger">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item d-none d-md-block">
                            {{-- SIGN IN BUTTON --}}
                            <a href="{{ route('loginUI') }}" class="btn btn-sm btn-primary rounded-pill">Sign
                                In</a>
                        </li>
                    @endif


                    <li class="nav-item d-lg-none">
                        <button class="hamburger offcanvas-nav-btn"><span></span></button>
                    </li>
                </ul>
                <!-- /.navbar-nav -->
            </div>
            <!-- /.navbar-other -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- /.navbar -->
</header>
<!-- END HEADER -->
