<!doctype html>
<html lang="en" data-bs-theme="semi-dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','default title')</title>
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png">
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet">
    <script src="assets/js/pace.min.js"></script>

    <!--plugins-->
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/metisMenu.min.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/mm-vertical.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/simplebar/css/simplebar.css">
    <!--bootstrap css-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!--main css-->
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="sass/main.css" rel="stylesheet">
    <link href="assets/css/horizontal-menu.css" rel="stylesheet">
    <link href="sass/dark-theme.css" rel="stylesheet">
    <link href="sass/blue-theme.css" rel="stylesheet">
    <link href="sass/semi-dark.css" rel="stylesheet">
    <link href="sass/bordered-theme.css" rel="stylesheet">
    <link href="sass/responsive.css" rel="stylesheet">

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
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-bs-auto-close="outside"
                            data-bs-toggle="dropdown" href="javascript:;"><i class="material-icons-outlined">notifications</i>
                            <span class="badge-notify">5</span>
                        </a>
                        <div class="dropdown-menu dropdown-notify dropdown-menu-end shadow">
                            <div class="px-3 py-1 d-flex align-items-center justify-content-between border-bottom">
                                <h5 class="notiy-title mb-0">Notifications</h5>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle dropdown-toggle-nocaret option" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="material-icons-outlined">
                                            more_vert
                                        </span>
                                    </button>
                                    <div class="dropdown-menu dropdown-option dropdown-menu-end shadow">
                                        <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                                                    class="material-icons-outlined fs-6">inventory_2</i>Archive All</a></div>
                                        <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                                                    class="material-icons-outlined fs-6">done_all</i>Mark all as read</a></div>
                                        <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                                                    class="material-icons-outlined fs-6">mic_off</i>Disable Notifications</a></div>
                                        <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                                                    class="material-icons-outlined fs-6">grade</i>What's new ?</a></div>
                                        <div>
                                            <hr class="dropdown-divider">
                                        </div>
                                        <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                                                    class="material-icons-outlined fs-6">leaderboard</i>Reports</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="notify-list">
                                <div>
                                    <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="">
                                                <img src="assets/images/avatars/01.png" class="rounded-circle" width="45" height="45" alt="">
                                            </div>
                                            <div class="">
                                                <h5 class="notify-title">Congratulations Jhon</h5>
                                                <p class="mb-0 notify-desc">Many congtars jhon. You have won the gifts.</p>
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
                        <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                            <img src="assets/images/avatars/01.png" class="rounded-circle p-1 border" width="45" height="45" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
                            <a class="dropdown-item  gap-2 py-2" href="javascript:;">
                                <div class="text-center">
                                    <img src="assets/images/avatars/01.png" class="rounded-circle p-1 shadow mb-3" width="90" height="90"
                                        alt="">
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
                <div class="offcanvas offcanvas-start w-260" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
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
                            <li class="nav-item m-2">
                                <a href="/profile" class="nav-link">
                                <div class="parent-icon"><i class="material-icons-outlined">person_outline</i>
                                </div>
                                    Profile
                                </a>
                            </li>

                            <li class="nav-item m-2">
                                <a href="/dashboard" class="nav-link">
                                    <div class="parent-icon"><i class="material-icons-outlined">home</i>
                                    </div>
                                    <div class="menu-title d-flex align-items-center">Dashboard</div>
                                </a>
                            </li>
                            <li class="nav-item m-2">

                                <a href="/list-product" class="nav-link">
                                <div class="parent-icon"><i class="material-icons-outlined">task</i>
                                </div>
                                    <div class="menu-title d-flex align-items-center">Product</div>

                                </a>
                            </li>
                            <li class="nav-item m-2">
                                <a href="/review" class="nav-link">
                                    <div class="parent-icon"><i class='material-icons-outlined'>folder</i>
                                    </div>
                                    <div class="menu-title d-flex align-items-center">Review</div>

                                </a>
                            </li>
                            <li class="nav-item m-2">
                                <a href="/list-cc" class="nav-link">
                                <div class="parent-icon"><i class="material-icons-outlined">work_outline</i>
                                </div>
                                    <div class="menu-title d-flex align-items-center"> Content Creator</div>

                                </a>
                            </li>



                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                                    <div class="parent-icon"><i class='material-icons-outlined'>apps</i>
                                    </div>
                                    <div class="menu-title d-flex align-items-center">Apps & Pages</div>
                                    <div class="ms-auto dropy-icon"><i class='material-icons-outlined'>expand_more</i></div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="app-emailbox.html"><i class='material-icons-outlined'>email</i>Email</a></li>
                                    <li><a class="dropdown-item" href="app-chat-box.html"><i class='material-icons-outlined'>chat</i>Chat Box</a></li>
                                    <li><a class="dropdown-item" href="app-file-manager.html"><i class='material-icons-outlined'>folder</i>File Manager</a></li>
                                    <li><a class="dropdown-item" href="app-to-do.html"><i class='material-icons-outlined'>task</i>Todo</a></li>
                                    <li><a class="dropdown-item" href="app-invoice.html"><i class='material-icons-outlined'>description</i>Invoice</a></li>
                                    <li class="nav-item dropend">
                                        <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"><i class='material-icons-outlined'>layers</i>Pages</a>
                                        <ul class="dropdown-menu submenu">
                                            <li class="nav-item dropend"><a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"><i class='material-icons-outlined'>navigate_next</i>Error</a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="pages-error-403.html"><i class='material-icons-outlined'>navigate_next</i>403 Error</a></li>
                                                    <li><a class="dropdown-item" href="pages-error-404.html"><i class='material-icons-outlined'>navigate_next</i>404 rror</a></li>
                                                    <li><a class="dropdown-item" href="pages-error-505.html"><i class='material-icons-outlined'>navigate_next</i>505 rror</a></li>
                                                    <li><a class="dropdown-item" href="pages-coming-soon.html"><i class='material-icons-outlined'>navigate_next</i>Coming Soon</a></li>
                                                    <li><a class="dropdown-item" href="pages-starter-page.html"><i class='material-icons-outlined'>navigate_next</i>Blank Page</a></li>
                                                </ul>
                                            </li>
                                            <li><a class="dropdown-item" href="user-profile.html"><i class='material-icons-outlined'>navigate_next</i>User Profile</a></li>
                                            <li><a class="dropdown-item" href="timeline.html"><i class='material-icons-outlined'>navigate_next</i>Timeline</a></li>
                                            <li><a class="dropdown-item" href="faq.html"><i class='material-icons-outlined'>navigate_next</i>FAQ</a></li>
                                            <li><a class="dropdown-item" href="pricing-table.html"><i class='material-icons-outlined'>navigate_next</i>Pricing</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                                    <div class="parent-icon"><i class='material-icons-outlined'>note_alt</i>
                                    </div>
                                    <div class="menu-title d-flex align-items-center">Forms</div>
                                    <div class="ms-auto dropy-icon"><i class='material-icons-outlined'>expand_more</i></div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li> <a class="dropdown-item" href="form-elements.html"><i class='material-icons-outlined'>source</i>Form Elements</a>
                                    </li>
                                    <li> <a class="dropdown-item" href="form-input-group.html"><i class='material-icons-outlined'>work_outline</i>Input Groups</a>
                                    </li>
                                    <li> <a class="dropdown-item" href="form-radios-and-checkboxes.html"><i class='material-icons-outlined'>timeline</i>Radios & Checkboxes</a>
                                    </li>
                                    <li> <a class="dropdown-item" href="form-layouts.html"><i class='material-icons-outlined'>label</i>Forms Layouts</a>
                                    </li>
                                    <li> <a class="dropdown-item" href="form-validations.html"><i class='material-icons-outlined'>tips_and_updates</i>Form Validation</a>
                                    </li>
                                    <li> <a class="dropdown-item" href="form-wizard.html"><i class='material-icons-outlined'>dns</i>Form Wizard</a>
                                    </li>
                                    <li> <a class="dropdown-item" href="form-file-upload.html"><i class='material-icons-outlined'>hourglass_empty</i>File Upload</a>
                                    </li>
                                    <li> <a class="dropdown-item" href="form-date-time-pickes.html"><i class='material-icons-outlined'>backup</i>Date Pickers</a>
                                    </li>
                                    <li> <a class="dropdown-item" href="form-select2.html"><i class='material-icons-outlined'>integration_instructions</i>Select2</a>
                                    </li>
                                    <li> <a class="dropdown-item" href="form-repeater.html"><i class='material-icons-outlined'>mark_as_unread</i>Form Repeater</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                                    <div class="parent-icon"><i class='material-icons-outlined'>account_circle</i>
                                    </div>
                                    <div class="menu-title d-flex align-items-center">Authentication</div>
                                    <div class="ms-auto dropy-icon"><i class='material-icons-outlined'>expand_more</i></div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item dropend">
                                        <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"><i class='material-icons-outlined'>event</i>Basic</a>
                                        <ul class="dropdown-menu submenu">
                                            <li><a class="dropdown-item" href="auth-basic-login.html"><i class='material-icons-outlined'>navigate_next</i>Sign In</a></li>
                                            <li><a class="dropdown-item" href="auth-basic-register.html"><i class='material-icons-outlined'>navigate_next</i>Sign Up</a></li>
                                            <li><a class="dropdown-item" href="auth-basic-forgot-password.html"><i class='material-icons-outlined'>navigate_next</i>Forgot Password</a></li>
                                            <li><a class="dropdown-item" href="auth-basic-reset-password.html"><i class='material-icons-outlined'>navigate_next</i>Reset Password</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropend">
                                        <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"><i class='material-icons-outlined'>perm_identity</i>Cover</a>
                                        <ul class="dropdown-menu submenu">
                                            <li><a class="dropdown-item" href="auth-cover-login.html"><i class='material-icons-outlined'>navigate_next</i>Sign In</a></li>
                                            <li><a class="dropdown-item" href="auth-cover-register.html"><i class='material-icons-outlined'>navigate_next</i>Sign Up</a></li>
                                            <li><a class="dropdown-item" href="auth-cover-forgot-password.html"><i class='material-icons-outlined'>navigate_next</i>Forgot Password</a></li>
                                            <li><a class="dropdown-item" href="auth-cover-reset-password.html"><i class='material-icons-outlined'>navigate_next</i>Reset Password</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropend">
                                        <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"><i class='material-icons-outlined'>assignment</i>Boxed</a>
                                        <ul class="dropdown-menu submenu">
                                            <li><a class="dropdown-item" href="auth-boxed-login.html"><i class='material-icons-outlined'>navigate_next</i>Sign In</a></li>
                                            <li><a class="dropdown-item" href="auth-boxed-register.html"><i class='material-icons-outlined'>navigate_next</i>Sign Up</a></li>
                                            <li><a class="dropdown-item" href="auth-boxed-forgot-password.html"><i class='material-icons-outlined'>navigate_next</i>Forgot Password</a></li>
                                            <li><a class="dropdown-item" href="auth-boxed-reset-password.html"><i class='material-icons-outlined'>navigate_next</i>Reset Password</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                                    <div class="parent-icon"><i class='material-icons-outlined'>medical_services</i>
                                    </div>
                                    <div class="menu-title d-flex align-items-center">UI Elements</div>
                                    <div class="ms-auto dropy-icon"><i class='material-icons-outlined'>expand_more</i></div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item dropend">
                                        <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"><i class='material-icons-outlined'>widgets</i>Widgets</a>
                                        <ul class="dropdown-menu submenu">
                                            <li><a class="dropdown-item" href="widgets-data.html"><i class='material-icons-outlined'>navigate_next</i>Data</a></li>
                                            <li><a class="dropdown-item" href="widgets-static.html"><i class='material-icons-outlined'>navigate_next</i>Static</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropend">
                                        <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"><i class='material-icons-outlined'>shopping_bag</i>eCommerce</a>
                                        <ul class="dropdown-menu submenu">
                                            <li><a class="dropdown-item" href="ecommerce-products.html"><i class='material-icons-outlined'>navigate_next</i>Products</a></li>
                                            <li><a class="dropdown-item" href="ecommerce-add-product.html"><i class='material-icons-outlined'>navigate_next</i>Add Product</a></li>
                                            <li><a class="dropdown-item" href="ecommerce-customers.html"><i class='material-icons-outlined'>navigate_next</i>Customer</a></li>
                                            <li><a class="dropdown-item" href="ecommerce-customer-details.html"><i class='material-icons-outlined'>navigate_next</i>Customer Details</a></li>
                                            <li><a class="dropdown-item" href="ecommerce-orders.html"><i class='material-icons-outlined'>navigate_next</i>Orders</a></li>
                                            <li><a class="dropdown-item" href="ecommerce-order-details.html"><i class='material-icons-outlined'>navigate_next</i>Order Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropend">
                                        <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"><i class='material-icons-outlined'>free_breakfast</i>Components</a>
                                        <ul class="dropdown-menu scroll-menu">
                                            <li><a class="dropdown-item" href="component-alerts.html"><i class='material-icons-outlined'>navigate_next</i>Alerts</a></li>
                                            <li><a class="dropdown-item" href="component-accordions.html"><i class='material-icons-outlined'>navigate_next</i>Accordions</a></li>
                                            <li><a class="dropdown-item" href="component-badges.html"><i class='material-icons-outlined'>navigate_next</i>Badges</a></li>
                                            <li><a class="dropdown-item" href="component-buttons.html"><i class='material-icons-outlined'>navigate_next</i>Buttons</a></li>
                                            <li><a class="dropdown-item" href="cards.html"><i class='material-icons-outlined'>navigate_next</i>Cards</a></li>
                                            <li><a class="dropdown-item" href="component-carousels.html"><i class='material-icons-outlined'>navigate_next</i>Carousels</a></li>
                                            <li><a class="dropdown-item" href="component-media-object.html"><i class='material-icons-outlined'>navigate_next</i>Media Objects</a></li>
                                            <li><a class="dropdown-item" href="component-modals.html"><i class='material-icons-outlined'>navigate_next</i>Modals</a></li>
                                            <li><a class="dropdown-item" href="component-navs-tabs.html"><i class='material-icons-outlined'>navigate_next</i>Navs & Tabs</a></li>
                                            <li><a class="dropdown-item" href="component-navbar.html"><i class='material-icons-outlined'>navigate_next</i>Navbar</a></li>
                                            <li><a class="dropdown-item" href="component-paginations.html"><i class='material-icons-outlined'>navigate_next</i>Pagination</a></li>
                                            <li><a class="dropdown-item" href="component-popovers-tooltips.html"><i class='material-icons-outlined'>navigate_next</i>Popovers & Tooltips</a></li>
                                            <li><a class="dropdown-item" href="component-progress-bars.html"><i class='material-icons-outlined'>navigate_next</i>Progress</a></li>
                                            <li><a class="dropdown-item" href="component-spinners.html"><i class='material-icons-outlined'>navigate_next</i>Spinners</a></li>
                                            <li><a class="dropdown-item" href="component-notifications.html"><i class='material-icons-outlined'>navigate_next</i>Notifications</a></li>
                                            <li><a class="dropdown-item" href="component-avtars-chips.html"><i class='material-icons-outlined'>navigate_next</i>Avatrs & Chips</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropend">
                                        <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"><i class='material-icons-outlined'>cases</i>Icons</a>
                                        <ul class="dropdown-menu submenu">
                                            <li><a class="dropdown-item" href="icons-line-icons.html"><i class='material-icons-outlined'>navigate_next</i>Line Icons</a></li>
                                            <li><a class="dropdown-item" href="icons-boxicons.html"><i class='material-icons-outlined'>navigate_next</i>Boxicons</a></li>
                                            <li><a class="dropdown-item" href="icons-feather-icons.html"><i class='material-icons-outlined'>navigate_next</i>Feather Icons</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                                    <div class="parent-icon"><i class='material-icons-outlined'>pie_chart</i>
                                    </div>
                                    <div class="menu-title d-flex align-items-center">Charts</div>
                                    <div class="ms-auto dropy-icon"><i class='material-icons-outlined'>expand_more</i></div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="charts-apex-chart.html"><i class='material-icons-outlined'>leaderboard</i></i>Apex</a></li>
                                    <li><a class="dropdown-item" href="charts-chartjs.html"><i class='material-icons-outlined'>analytics</i>Chartjs</a></li>
                                    <li class="nav-item dropend">
                                        <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"><i class='material-icons-outlined'>pie_chart</i>Maps</a>
                                        <ul class="dropdown-menu submenu">
                                            <li><a class="dropdown-item" href="map-google-maps.html"><i class='material-icons-outlined'>navigate_next</i>Google Maps</a></li>
                                            <li><a class="dropdown-item" href="map-vector-maps.html"><i class='material-icons-outlined'>navigate_next</i>Vector Maps</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                                    <div class="parent-icon"><i class='material-icons-outlined'>table_chart</i>
                                    </div>
                                    <div class="menu-title d-flex align-items-center">Tables</div>
                                    <div class="ms-auto dropy-icon"><i class='material-icons-outlined'>expand_more</i></div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="table-basic-table.html"><i class='material-icons-outlined'>navigate_next</i>Basic Table</a></li>
                                    <li><a class="dropdown-item" href="table-datatable.html"><i class='material-icons-outlined'>navigate_next</i>Data Table</a></li>
                                </ul>
                            </li> -->
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
