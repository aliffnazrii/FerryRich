@extends('layout.staff')


@section('title', 'Dashboard')

@section('content')

    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Dashboard</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">eCommerce</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->


            <div class="row">
                <div class="col-12 col-lg-4 col-xxl-4 d-flex">
                    <div class="card rounded-4 w-100">
                        <div class="card-body">
                            <div class="">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <h5 class="mb-0">Congratulations <span class="fw-600">Jhon</span></h5>
                                    <img src="assets/images/apps/party-popper.png" width="24" height="24"
                                        alt="">
                                </div>
                                <p class="mb-4">You are the best seller of this monnth</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="">
                                        <h3 class="mb-0 text-indigo">$168.5K</h3>
                                        <p class="mb-3">58% of sales target</p>
                                        <button class="btn btn-grd btn-grd-primary rounded-5 border-0 px-4">View
                                            Details</button>
                                    </div>
                                    <img src="assets/images/apps/gift-box-3.png" width="100" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-xxl-2 d-flex">
                    <div class="card rounded-4 w-100">
                        <div class="card-body">
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <div
                                    class="wh-42 d-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10 text-primary">
                                    <span class="material-icons-outlined fs-5">shopping_cart</span>
                                </div>
                                <div>
                                    <span class="text-success d-flex align-items-center">+24%<i
                                            class="material-icons-outlined">expand_less</i></span>
                                </div>
                            </div>
                            <div>
                                <h4 class="mb-0">248k</h4>
                                <p class="mb-3">Total Orders</p>
                                <div id="chart1"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-xxl-2 d-flex">
                    <div class="card rounded-4 w-100">
                        <div class="card-body">
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <div
                                    class="wh-42 d-flex align-items-center justify-content-center rounded-circle bg-success bg-opacity-10 text-success">
                                    <span class="material-icons-outlined fs-5">attach_money</span>
                                </div>
                                <div>
                                    <span class="text-success d-flex align-items-center">+14%<i
                                            class="material-icons-outlined">expand_less</i></span>
                                </div>
                            </div>
                            <div>
                                <h4 class="mb-0">$47.6k</h4>
                                <p class="mb-3">Total Sales</p>
                                <div id="chart2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xxl-2 d-flex">
                    <div class="card rounded-4 w-100">
                        <div class="card-body">
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <div
                                    class="wh-42 d-flex align-items-center justify-content-center rounded-circle bg-info bg-opacity-10 text-info">
                                    <span class="material-icons-outlined fs-5">visibility</span>
                                </div>
                                <div>
                                    <span class="text-danger d-flex align-items-center">-35%<i
                                            class="material-icons-outlined">expand_less</i></span>
                                </div>
                            </div>
                            <div>
                                <h4 class="mb-0">189K</h4>
                                <p class="mb-3">Total Visits</p>
                                <div id="chart3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xxl-2 d-flex">
                    <div class="card rounded-4 w-100">
                        <div class="card-body">
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <div
                                    class="wh-42 d-flex align-items-center justify-content-center rounded-circle bg-warning bg-opacity-10 text-warning">
                                    <span class="material-icons-outlined fs-5">leaderboard</span>
                                </div>
                                <div>
                                    <span class="text-success d-flex align-items-center">+18%<i
                                            class="material-icons-outlined">expand_less</i></span>
                                </div>
                            </div>
                            <div>
                                <h4 class="mb-0">24.6%</h4>
                                <p class="mb-3">Bounce Rate</p>
                                <div id="chart4"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!--end row-->


            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card w-100 rounded-4">
                        <div class="card-body">
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div class="">
                                        <h5 class="mb-0">Order Status</h5>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                                            data-bs-toggle="dropdown">
                                            <span class="material-icons-outlined fs-5">more_vert</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                            <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="position-relative">
                                    <div class="piechart-legend">
                                        <h2 class="mb-1">68%</h2>
                                        <h6 class="mb-0">Total Sales</h6>
                                    </div>
                                    <div id="chart6"></div>
                                </div>
                                <div class="d-flex flex-column gap-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="mb-0 d-flex align-items-center gap-2 w-25"><span
                                                class="material-icons-outlined fs-6 text-primary">fiber_manual_record</span>Sales
                                        </p>
                                        <div class="">
                                            <p class="mb-0">68%</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="mb-0 d-flex align-items-center gap-2 w-25"><span
                                                class="material-icons-outlined fs-6 text-danger">fiber_manual_record</span>Product
                                        </p>
                                        <div class="">
                                            <p class="mb-0">25%</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="mb-0 d-flex align-items-center gap-2 w-25"><span
                                                class="material-icons-outlined fs-6 text-success">fiber_manual_record</span>Income
                                        </p>
                                        <div class="">
                                            <p class="mb-0">14%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-8">
                    <div class="card w-100 rounded-4">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-3">
                                <div class="">
                                    <h5 class="mb-0">Sales & Views</h5>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                                        data-bs-toggle="dropdown">
                                        <span class="material-icons-outlined fs-5">more_vert</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                        <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                        <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="chart5"></div>
                            <div
                                class="d-flex flex-column flex-lg-row align-items-start justify-content-around border p-3 rounded-4 mt-3 gap-3">
                                <div class="d-flex align-items-center gap-4">
                                    <div class="">
                                        <p class="mb-0 data-attributes">
                                            <span
                                                data-peity='{ "fill": ["#2196f3", "rgb(255 255 255 / 12%)"], "innerRadius": 32, "radius": 40 }'>5/7</span>
                                        </p>
                                    </div>
                                    <div class="">
                                        <p class="mb-1 fs-6 fw-bold">Monthly</p>
                                        <h2 class="mb-0">65,127</h2>
                                        <p class="mb-0"><span
                                                class="text-success me-2 fw-medium">16.5%</span><span>55.21 USD</span></p>
                                    </div>
                                </div>
                                <div class="vr"></div>
                                <div class="d-flex align-items-center gap-4">
                                    <div class="">
                                        <p class="mb-0 data-attributes">
                                            <span
                                                data-peity='{ "fill": ["#ffd200", "rgb(255 255 255 / 12%)"], "innerRadius": 32, "radius": 40 }'>5/7</span>
                                        </p>
                                    </div>
                                    <div class="">
                                        <p class="mb-1 fs-6 fw-bold">Yearly</p>
                                        <h2 class="mb-0">984,246</h2>
                                        <p class="mb-0"><span
                                                class="text-success me-2 fw-medium">24.9%</span><span>267.35 USD</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->



        </div>
    </main>
    <!--end main wrapper-->




    <!--start footer-->
    <footer class="page-footer">
        <p class="mb-0">Copyright © 2024. All right reserved.</p>
    </footer>
    <!--end footer-->


    <!--bootstrap js-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <!--plugins-->
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/metismenu/metisMenu.min.js"></script>
    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/peity/jquery.peity.min.js"></script>
    <script>
        $(".data-attributes span").peity("donut")
    </script>
    <script src="assets/js/dashboard2.js"></script>
    <script src="assets/js/main.js"></script>




@endsection
