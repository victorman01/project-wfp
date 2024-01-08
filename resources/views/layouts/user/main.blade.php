<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
    <meta name="keywords"
        content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
    <meta name="author" content="elemis">
    @yield('title')
    <link rel="shortcut icon" href="{{ asset('sandbox360/img/eCommerceIcon.png') }}">
    <link rel="stylesheet" href="{{ asset('sandbox360/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('sandbox360/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('sandbox360/css/colors/orange.css') }}">
</head>

<body>
    <div class="content-wrapper">
        <header class="wrapper bg-soft-primary">
            <nav class="navbar navbar-expand-lg center-nav transparent navbar-light py-3">
                <div class="container flex-lg-row flex-nowrap align-items-center">
                    <div class="navbar-brand w-100">
                        <a href="/" class="display-6 align-items-center">
                            <img src="{{ asset('sandbox360/img/eCommerceIcon.png') }}" style="width: 40px;"/>
                            HardwareBrand
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
                                        <li class="nav-item"><a class="dropdown-item" href="{{route('historiTransaksi')}}">Histori Transaksi</a></li>
                                        <li class="nav-item"><a class="dropdown-item" href="{{route('alamatPengiriman.index')}}">Alamat</a></li>
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
        <!-- /header -->

        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    {{-- DIVIDER --}}
    <section class="wrapper bg-light angled upper-end lower-start mt-10"></section>

    <footer class="bg-dark text-inverse">
        <div class="container pt-17 pt-md-19 pb-13 pb-md-15">
            <div class="row gy-6 gy-lg-0">
                <div class="col-md-4 col-lg-3">
                    <div class="widget">
                        <p class="display-6">HardwareBrand</p>
                        <img class="mb-4" src="{{ asset('sandbox360/img/logo-light.png') }}"
                            srcset="{{ asset('sandbox360/img/logo-light@2x.png') }} 2x" alt="">
                        <p class="mb-4">© 2022 E-commerce. <br class="d-none d-lg-block">All rights reserved.</p>
                        <nav class="nav social social-white">
                            <a href="#"><i class="uil uil-twitter"></i></a>
                            <a href="#"><i class="uil uil-facebook-f"></i></a>
                            <a href="#"><i class="uil uil-dribbble"></i></a>
                            <a href="#"><i class="uil uil-instagram"></i></a>
                            <a href="#"><i class="uil uil-youtube"></i></a>
                        </nav>
                        <!-- /.social -->
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /column -->

                <div class="offset-md-8 offset-lg-6 col-md-12 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title text-white mb-3">Contact Us</h4>
                        <p class="mb-5">Unlock the power of seamless communication by reaching out to us today! Our dedicated team is here to transform your inquiries into solutions</p>
                        <!-- /.newsletter-wrapper -->
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </footer>

    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <script src="{{ asset('sandbox360/js/plugins.js') }}"></script>
    <script src="{{ asset('sandbox360/js/theme.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    @yield('js')
</body>

</html>
