<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')


    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <link href="https://getbootstrap.com//docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com//docs/5.2/assets/img/favicons/apple-touch-icon.png"
        sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com//docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32"
        type="image/png">
    <link rel="icon" href="https://getbootstrap.com//docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16"
        type="image/png">
    <link rel="manifest" href="https://getbootstrap.com//docs/5.2/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com//docs/5.2/assets/img/favicons/safari-pinned-tab.svg"
        color="#712cf9">
    <link rel="icon" href="https://getbootstrap.com//docs/5.2/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">
</head>

<body>
    <div id="app ">
        <nav class="navbar navbar-expand-lg sticky-top bg-white px-4 py-4 z-3 text-white">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">
                    {{-- <img src="https://getbootstrap.com//docs/5.3/assets/brand/bootstrap-logo.svg" alt="Bootstrap"
                        class="d-inline-block align-text-top" width="30" height="24"> --}}
                    E-Commerce
                </a>

                <div class="d-flex">
                    <img src="https://tricky-photoshop.com/wp-content/uploads/2017/08/final-1.png" alt="profile"
                        class="d-inline-block align-text-top me-2" width="40" height="40">
                    <li class="navbar-collapse nav-item dropdown me-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            John Doe
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-end">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="{{ route('favorite.page') }}">Favorit</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
                        </ul>
                    </li>
                </div>
            </div>
        </nav>

        <div>
            @yield('content')
        </div>
    </div>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center ps-4">
            <span class="mb-3 mb-md-0 text-muted">© 2022 E-Commerce, Inc</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>