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
                        <img src="assets/images/logo-icon.png" class="logo-img" width="45" alt="">
                    </div>
                    <div class="logo-name">
                        <h5 class="mb-0">FerryRich</h5>
                    </div>
                </div>
                <div class="btn-toggle d-xl-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
                    <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
                </div>

                <ul class="navbar-nav gap-1 nav-right-links align-items-center">

                    <li class="nav-item dropdown">




                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                            data-bs-auto-close="outside" data-bs-toggle="dropdown" href="javascript:;"><i
                                class="material-icons-outlined">notifications</i>
                            <span class="badge-notify">5</span>
                        </a>
                        <div class="dropdown-menu dropdown-notify dropdown-menu-end shadow">
                            <div class="px-3 py-1 d-flex align-items-center justify-content-between border-bottom">
                                <h5 class="notiy-title mb-0">Notifications</h5>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle dropdown-toggle-nocaret option"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="material-icons-outlined">
                                            more_vert
                                        </span>
                                    </button>
                                    <div class="dropdown-menu dropdown-option dropdown-menu-end shadow">
                                        <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                                href="javascript:;"><i
                                                    class="material-icons-outlined fs-6">inventory_2</i>Archive All</a>
                                        </div>
                                        <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                                href="javascript:;"><i
                                                    class="material-icons-outlined fs-6">done_all</i>Mark all as
                                                read</a></div>
                                        <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                                href="javascript:;"><i
                                                    class="material-icons-outlined fs-6">mic_off</i>Disable
                                                Notifications</a></div>
                                        <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                                href="javascript:;"><i
                                                    class="material-icons-outlined fs-6">grade</i>What's new ?</a></div>
                                        <div>
                                            <hr class="dropdown-divider">
                                        </div>
                                        <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                                href="javascript:;"><i
                                                    class="material-icons-outlined fs-6">leaderboard</i>Reports</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="notify-list">
                                <div>
                                    <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="">
                                                <img src="assets/images/avatars/01.png" class="rounded-circle"
                                                    width="45" height="45" alt="">
                                            </div>
                                            <div class="">
                                                <h5 class="notify-title">Congratulations Jhon</h5>
                                                <p class="mb-0 notify-desc">Many congtars jhon. You have won the gifts.
                                                </p>
                                                <p class="mb-0 notify-time">Today</p>
                                            </div>
                                            <div class="notify-close position-absolute end-0 me-3">
                                                <i class="material-icons-outlined fs-6">close</i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="user-wrapper bg-primary text-primary bg-opacity-10">
                                                <span>RS</span>
                                            </div>
                                            <div class="">
                                                <h5 class="notify-title">New Account Created</h5>
                                                <p class="mb-0 notify-desc">From USA an user has registered.</p>
                                                <p class="mb-0 notify-time">Yesterday</p>
                                            </div>
                                            <div class="notify-close position-absolute end-0 me-3">
                                                <i class="material-icons-outlined fs-6">close</i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown">
                            <img src="assets/images/avatars/01.png" class="rounded-circle p-1 border" width="45"
                                height="45" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
                            <a class="dropdown-item  gap-2 py-2" href="javascript:;">
                                <div class="text-center">
                                    <img src="assets/images/avatars/01.png" class="rounded-circle p-1 shadow mb-3"
                                        width="90" height="90" alt="">
                                    <h5 class="user-name mb-0 fw-bold">Hello, Jhon</h5>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                                    class="material-icons-outlined">person_outline</i>Profile</a>
                            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                                    class="material-icons-outlined">local_bar</i>Setting</a>
                            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                                    class="material-icons-outlined">dashboard</i>Dashboard</a>
                            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                                    class="material-icons-outlined">account_balance</i>Earning</a>
                            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                                    class="material-icons-outlined">cloud_download</i>Downloads</a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                                    class="material-icons-outlined">power_settings_new</i>Logout</a>
                        </div>
                    </li>
                </ul>

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
                                <img src="assets/images/logo-icon.png" class="logo-icon" width="45"
                                    alt="logo icon">
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

                            @if (Auth::user()->role == 'Staff' || Auth::user()->role == 'Admin')
                                <!-- Dashboard -->
                                <li class="nav-item m-2">
                                    <a href="/dashboard" class="nav-link">
                                        <div class="parent-icon"><i class="material-icons-outlined">home</i></div>
                                        <div class="menu-title d-flex align-items-center">Dashboard</div>
                                    </a>
                                </li>

                                <!-- Product -->
                                <li class="nav-item m-2">
                                    <a href="{{ route('products.index') }}" class="nav-link">
                                        <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i>
                                        </div>
                                        <div class="menu-title d-flex align-items-center">Product</div>
                                    </a>
                                </li>

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

                                <!-- Video Queue -->
                                <li class="nav-item m-2">
                                    <a href="{{ route('videos.index') }}" class="nav-link">
                                        <div class="parent-icon"><i class="material-icons-outlined">movie</i></div>
                                        <div class="menu-title d-flex align-items-center">Video Queue</div>
                                    </a>
                                </li>
                            @else
                                <!-- Payment -->
                                <li class="nav-item m-2">
                                    <a href="{{ route('payments.index') }}" class="nav-link">
                                        <div class="parent-icon"><i class="material-icons-outlined">attach_money</i>
                                        </div>
                                        <div class="menu-title d-flex align-items-center">Payment</div>
                                    </a>
                                </li>
                            @endif







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
