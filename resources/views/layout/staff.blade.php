<!doctype html>
<html lang="en" data-bs-theme="semi-dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'default title')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png">

    <!-- Loader -->
    <link rel="stylesheet" href="{{ asset('assets/css/pace.min.css') }}">
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/metismenu/mm-vertical.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" href="{{ asset('sass/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/horizontal-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('sass/dark-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('sass/blue-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('sass/semi-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('sass/bordered-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('sass/responsive.css') }}">


</head>

<body>
    <main>
        <!--start header-->
        <header class="top-header">
            <nav class="navbar navbar-expand align-items-center justify-content-between gap-4 border-bottom">
                <div class="logo-header d-none d-xl-flex align-items-center gap-2">
                    <div class="logo-icon">
                        <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-img" width="45"
                            alt="">
                    </div>
                    <div class="logo-name">
                        <h5 class="mb-0">FerryRich</h5>
                    </div>
                </div>
                <div class="btn-toggle d-xl-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
                    <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
                </div>


            </nav>
        </header>
        <!--end top header-->


        <!--navigation-->
        <div class="primary-menu">
            <nav class="navbar navbar-expand-xl align-items-center">
                <div class="offcanvas offcanvas-start w-260" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header border-bottom h-70">
                        <div class="d-flex align-items-center gap-2">
                            <div class="">
                                <img src="assets/images/logo-icon.png" class="logo-icon" width="45" alt="logo icon">
                            </div>
                            <div class="">
                                <h4 class="logo-text">FerryRich</h4>
                            </div>
                        </div>
                        <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
                            <i class="material-icons-outlined">close</i>
                        </a>
                    </div>

                    <div class="offcanvas-body p-0">
                        <ul class="navbar-nav align-items-center flex-grow-1">

                            <!-- Dashboard -->
                            <li class="nav-item m-2">
                                <a href="/dashboard" class="nav-link">
                                    <div class="parent-icon"><i class="material-icons-outlined">home</i></div>
                                    <div class="menu-title d-flex align-items-center">Dashboard</div>
                                </a>
                            </li>

                            @if (Auth::user()->role == 'Staff' || Auth::user()->role == 'Admin')
                                <!-- Product -->
                                <li class="nav-item m-2">
                                    <a href="{{ route('products.index') }}" class="nav-link">
                                        <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i>
                                        </div>
                                        <div class="menu-title d-flex align-items-center">Product</div>
                                    </a>
                                </li>
                            @endif

                            <!-- Review -->
                            <li class="nav-item m-2">
                                <a href="{{ route('reviews.index') }}" class="nav-link">
                                    <div class="parent-icon"><i class="material-icons-outlined">rate_review</i>
                                    </div>
                                    <div class="menu-title d-flex align-items-center">Review</div>
                                </a>
                            </li>


                            <!-- Content Creator -->
                            <li class="nav-item m-2">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    <div class="parent-icon"><i class="material-icons-outlined">group</i></div>
                                    <div class="menu-title d-flex align-items-center">Content Creator</div>
                                </a>
                            </li>

                            @if (Auth::user()->role == 'Staff' || Auth::user()->role == 'Admin')
                                <!-- Video Queue -->
                                <li class="nav-item m-2">
                                    <a href="{{ route('videos.index') }}" class="nav-link">
                                        <div class="parent-icon"><i class="material-icons-outlined">movie</i></div>
                                        <div class="menu-title d-flex align-items-center">Video Queue</div>
                                    </a>
                                </li>
                            @endif

                            @if (Auth::user()->role == 'Finance' || Auth::user()->role == 'Admin')
                                <!-- Payment -->
                                <li class="nav-item m-2">
                                    <a href="{{ route('payments.index') }}" class="nav-link">
                                        <div class="parent-icon"><i class="material-icons-outlined">attach_money</i>
                                        </div>
                                        <div class="menu-title d-flex align-items-center">Payment</div>
                                    </a>
                                </li>
                            @endif


                            <!-- Ad Code -->
                            <li class="nav-item m-2">
                                <a href="{{ route('reviews.code-ad') }}" class="nav-link">
                                    <div class="parent-icon"><i class="material-icons-outlined">ads_click</i></div>
                                    <div class="menu-title d-flex align-items-center">Ad Code</div>
                                </a>
                            </li>




                            <!-- Profile -->
                            <li class="nav-item m-2">
                                <a href="{{ route('users.show', auth()->id()) }}" class="nav-link">
                                    <div class="parent-icon"><i class="material-icons-outlined">person_outline</i>
                                    </div>
                                    <div class="menu-title d-flex align-items-center">Profile</div>
                                </a>
                            </li>

                            <!-- Logout -->
                            <li class="nav-item m-2">
                                <a href="#"
                                    onclick="event.preventDefault(); document.getElementById('logoutForm').submit()"
                                    class="nav-link">
                                    <div class="parent-icon"><i class="material-icons-outlined">logout</i></div>
                                    <div class="menu-title d-flex align-items-center">Logout</div>
                                </a>
                                <form method="POST" action="{{ route('logout') }}" id="logoutForm"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <!--end navigation-->


        @yield('content')

        <!--start footer-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2024. All right reserved.</p>
        </footer>
        <!--top footer-->

    </main>
</body>

</html>
