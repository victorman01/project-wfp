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
    <link rel="shortcut icon" href="{{ asset('sandbox360/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('sandbox360/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('sandbox360/css/style.css') }}">
</head>

<body>
    <div class="content-wrapper">
        <header class="wrapper bg-soft-primary">
            <nav class="navbar navbar-expand-lg center-nav transparent navbar-light py-3">
                <div class="container flex-lg-row flex-nowrap align-items-center">
                    <div class="navbar-brand w-100">
                        <a href="/" class="display-6">
                            {{-- <img src="{{ asset('sandbox360/img/logo.png') }}"
                                srcset="{{ asset('sandbox360/img/logo@2x.png') }} 2x" alt="" /> --}}
                            Brand Logo
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
                                        <li class="nav-item"><a class="dropdown-item" href="#">Another action</a>
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
                        <p class="display-6">Brand Name </p>
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
                        <p class="mb-5">Subscribe to our newsletter to get our news &amp; deals delivered to you.</p>
                        <div class="newsletter-wrapper">
                            <!-- Begin Mailchimp Signup Form -->
                            <div id="mc_embed_signup2">
                                <form
                                    action="https://elemisfreebies.us20.list-manage.com/subscribe/post?u=aa4947f70a475ce162057838d&amp;id=b49ef47a9a"
                                    method="post" id="mc-embedded-subscribe-form2" name="mc-embedded-subscribe-form"
                                    class="validate dark-fields" target="_blank" novalidate="">
                                    <div id="mc_embed_signup_scroll2">
                                        <div class="mc-field-group input-group form-floating">
                                            <input type="email" value="" name="EMAIL"
                                                class="required email form-control" placeholder="Email Address"
                                                id="mce-EMAIL2">
                                            <label for="mce-EMAIL2">Email Address</label>
                                            <input type="submit" value="Join" name="subscribe"
                                                id="mc-embedded-subscribe2" class="btn btn-primary ">
                                        </div>
                                        <div id="mce-responses2" class="clear">
                                            <div class="response" id="mce-error-response2" style="display:none">
                                            </div>
                                            <div class="response" id="mce-success-response2" style="display:none">
                                            </div>
                                        </div>
                                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input
                                                type="text" name="b_ddc180777a163e0f9f66ee014_4b1bcfa0bc"
                                                tabindex="-1" value=""></div>
                                        <div class="clear"></div>
                                    </div>
                                </form>
                            </div>
                            <!--End mc_embed_signup-->
                        </div>
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
