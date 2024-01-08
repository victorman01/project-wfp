    <header class="wrapper bg-soft-primary" style="position: sticky; top: 0;z-index: 1000;">
        <nav class="navbar navbar-expand-lg center-nav transparent navbar-light">
            <div class="container flex-lg-row flex-nowrap align-items-center">
                <div class="navbar-brand w-100">
                    <a href="/admin" class="display-6 align-items-center">
                        <img src="{{ asset('sandbox360/img/admin-icon.png') }}" style="width: 40px;" />
                        ACEZ ADMIN PAGE
                    </a>
                </div>
                <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">

                </div>
                <!-- /.navbar-collapse -->
                <div class="navbar-other w-100 d-flex ms-auto">
                    <ul class="navbar-nav flex-row align-items-center ms-auto">

                        @if (Auth::check())
                            {{-- IF LOGGED IN --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ ucwords(Auth::user()->nama) }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <form action="{{ route('logoutAdmin') }}" method="POST">
                                            @csrf
                                            <button class="dropdown-item text-danger">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item d-none d-md-block">
                                {{-- SIGN IN BUTTON --}}
                                <a href="{{ route('loginAdmin') }}" class="btn btn-sm btn-primary rounded-pill">Sign
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
