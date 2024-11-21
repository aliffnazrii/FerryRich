@extends('layout.staff')


@section('title', 'Dashboard')

@section('content')

    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
           


            <div class="row">
                <!-- Congratulations Card -->
                <div class="col-12 col-lg-4 col-xxl-4 d-flex">
                    <div class="card rounded-4 w-100">
                        <div class="card-body">
                            <div class="">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <h5 class="mb-0">Welcome Back <span class="fw-600">{{ auth()->user()->name }}</span>
                                    </h5>
                                    <img src="assets/images/apps/party-popper.png" width="24" height="24"
                                        alt="">
                                </div>
                                <p class="mb-4">Here's a quick overview of the system's performance</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="">
                                        <h3 class="mb-0 text-indigo">{{ $totalPayments }} RM</h3>
                                        <p class="mb-3">Total Payments Processed</p>
                                    </div>
                                    <img src="assets/images/apps/gift-box-3.png" width="100" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Assigned Reviews -->
                <div class="col-12 col-lg-4 col-xxl-2 d-flex">
                    <div class="card rounded-4 w-100">
                        <div class="card-body">
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <div
                                    class="wh-42 d-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10 text-primary">
                                    <span class="material-icons-outlined fs-5">assignment</span>
                                </div>
                                <div>
                                    <span class="text-success d-flex align-items-center">+12%<i
                                            class="material-icons-outlined">expand_less</i></span>
                                </div>
                            </div>
                            <div>
                                <h4 class="mb-0">{{ $totalAssignedReviews }}</h4>
                                <p class="mb-3">Assigned Reviews</p>
                                <div id="chart1"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Approved Videos -->
                <div class="col-12 col-lg-4 col-xxl-2 d-flex">
                    <div class="card rounded-4 w-100">
                        <div class="card-body">
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <div
                                    class="wh-42 d-flex align-items-center justify-content-center rounded-circle bg-success bg-opacity-10 text-success">
                                    <span class="material-icons-outlined fs-5">check_circle</span>
                                </div>
                                <div>
                                    <span class="text-success d-flex align-items-center">+8%<i
                                            class="material-icons-outlined">expand_less</i></span>
                                </div>
                            </div>
                            <div>
                                <h4 class="mb-0">{{ $totalApprovedVideos }}</h4>
                                <p class="mb-3">Approved Videos</p>
                                <div id="chart2"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Pending Videos -->
                <div class="col-12 col-lg-4 col-xxl-2 d-flex">
                    <div class="card rounded-4 w-100">
                        <div class="card-body">
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <div
                                    class="wh-42 d-flex align-items-center justify-content-center rounded-circle bg-info bg-opacity-10 text-info">
                                    <span class="material-icons-outlined fs-5">hourglass_empty</span>
                                </div>
                                <div>
                                    <span class="text-danger d-flex align-items-center">-5%<i
                                            class="material-icons-outlined">expand_less</i></span>
                                </div>
                            </div>
                            <div>
                                <h4 class="mb-0">{{ $totalPendingVideos }}</h4>
                                <p class="mb-3">Pending Videos</p>
                                <div id="chart3"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Content Creators -->
                <div class="col-12 col-lg-6 col-xxl-2 d-flex">
                    <div class="card rounded-4 w-100">
                        <div class="card-body">
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <div
                                    class="wh-42 d-flex align-items-center justify-content-center rounded-circle bg-warning bg-opacity-10 text-warning">
                                    <span class="material-icons-outlined fs-5">people</span>
                                </div>
                                <div>
                                    <span class="text-success d-flex align-items-center">+15%<i
                                            class="material-icons-outlined">expand_less</i></span>
                                </div>
                            </div>
                            <div>
                                <h4 class="mb-0">{{ $totalContentCreators }}</h4>
                                <p class="mb-3">Content Creators</p>
                                <div id="chart4"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Payments -->
                <div class="col-12 col-lg-6 col-xxl-2 d-flex">
                    <div class="card rounded-4 w-100">
                        <div class="card-body">
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <div
                                    class="wh-42 d-flex align-items-center justify-content-center rounded-circle bg-secondary bg-opacity-10 text-secondary">
                                    <span class="material-icons-outlined fs-5">attach_money</span>
                                </div>
                                <div>
                                    <span class="text-success d-flex align-items-center">+20%<i
                                            class="material-icons-outlined">expand_less</i></span>
                                </div>
                            </div>
                            <div>
                                <h4 class="mb-0">RM {{ $totalPayments }}</h4>
                                <p class="mb-3">Total Payments</p>
                                <div id="chart5"></div>
                            </div>
                        </div>
                    </div>
                </div>
        
            <!--end row-->




            <!-- Order Status (Pie Chart) -->
            <div class="col-6">
                <div class="card w-100 rounded-4">
                    <div class="card-body">
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="">
                                    <h5 class="mb-0">Review Status</h5>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                                        data-bs-toggle="dropdown">
                                        <span class="material-icons-outlined fs-5">more_vert</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:;">View Details</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="position-relative">
                                <div class="piechart-legend">
                                    <h2 class="mb-1">{{ $reviewCompletionRate }}%</h2>
                                    <h6 class="mb-0">Completed Reviews</h6>
                                </div>
                                <div id="chart6"></div> <!-- Include your chart.js implementation here -->
                            </div>
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 d-flex align-items-center gap-2 w-25">
                                        <span class="material-icons-outlined fs-6 text-primary">fiber_manual_record</span>
                                        Pending
                                    </p>
                                    <div class="">
                                        <p class="mb-0">{{ $pendingReviews }}%</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 d-flex align-items-center gap-2 w-25">
                                        <span class="material-icons-outlined fs-6 text-danger">fiber_manual_record</span>
                                        In Progress
                                    </p>
                                    <div class="">
                                        <p class="mb-0">{{ $inProgressReviews }}%</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 d-flex align-items-center gap-2 w-25">
                                        <span class="material-icons-outlined fs-6 text-success">fiber_manual_record</span>
                                        Completed
                                    </p>
                                    <div class="">
                                        <p class="mb-0">{{ $completedReviews }}%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sales & Views (Bar/Line Chart) -->
            <div class="col-4">
                <div class="card w-100 rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <div class="">
                                <h5 class="mb-0">Video Status & Payments</h5>
                            </div>
                            <div class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                                    data-bs-toggle="dropdown">
                                    <span class="material-icons-outlined fs-5">more_vert</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">View Details</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="chart5"></div> <!-- Include your chart.js implementation here -->
                        <div
                            class="d-flex flex-column flex-lg-row align-items-start justify-content-around border p-3 rounded-4 mt-3 gap-3">
                            <!-- Monthly Stats -->
                            <div class="d-flex align-items-center gap-4">
                                <div class="">
                                    <p class="mb-0 data-attributes">
                                        <span
                                            data-peity='{ "fill": ["#2196f3", "rgb(255 255 255 / 12%)"], "innerRadius": 32, "radius": 40 }'>{{ $monthlyVideosApproved }}/{{ $monthlyVideosTotal }}</span>
                                    </p>
                                </div>
                                <div class="">
                                    <p class="mb-1 fs-6 fw-bold">Monthly Approved</p>
                                    <h2 class="mb-0">{{ $monthlyVideosApproved }}</h2>
                                    <p class="mb-0"><span
                                            class="text-success me-2 fw-medium">+{{ $monthlyVideoGrowth }}%</span><span>Videos</span>
                                    </p>
                                </div>
                            </div>
                            {{-- <div class="vr"></div>
                            <!-- Yearly Stats -->
                            <div class="d-flex align-items-center gap-4">
                                <div class="">
                                    <p class="mb-0 data-attributes">
                                        <span
                                            data-peity='{ "fill": ["#ffd200", "rgb(255 255 255 / 12%)"], "innerRadius": 32, "radius": 40 }'>{{ $yearlyPaymentsCompleted }}/{{ $yearlyPaymentsTotal }}</span>
                                    </p>
                                </div>
                                <div class="">
                                    <p class="mb-1 fs-6 fw-bold">Yearly Payments</p>
                                    <h2 class="mb-0">RM {{ $yearlyPaymentsCompleted }}</h2>
                                    <p class="mb-0"><span
                                            class="text-success me-2 fw-medium">+{{ $yearlyPaymentGrowth }}%</span><span>Payments</span>
                                    </p>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card w-100 rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <div class="">
                                <h5 class="mb-0">Video Status & Payments</h5>
                            </div>
                            <div class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                                    data-bs-toggle="dropdown">
                                    <span class="material-icons-outlined fs-5">more_vert</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">View Details</a></li>
                                </ul>
                            </div>
                        </div>
                        {{-- <div id="chart5"></div> <!-- Include your chart.js implementation here -->
                        <div
                            class="d-flex flex-column flex-lg-row align-items-start justify-content-around border p-3 rounded-4 mt-3 gap-3">
                            <!-- Monthly Stats -->
                            <div class="d-flex align-items-center gap-4">
                                <div class="">
                                    <p class="mb-0 data-attributes">
                                        <span
                                            data-peity='{ "fill": ["#2196f3", "rgb(255 255 255 / 12%)"], "innerRadius": 32, "radius": 40 }'>{{ $monthlyVideosApproved }}/{{ $monthlyVideosTotal }}</span>
                                    </p>
                                </div>
                                <div class="">
                                    <p class="mb-1 fs-6 fw-bold">Monthly Approved</p>
                                    <h2 class="mb-0">{{ $monthlyVideosApproved }}</h2>
                                    <p class="mb-0"><span
                                            class="text-success me-2 fw-medium">+{{ $monthlyVideoGrowth }}%</span><span>Videos</span>
                                    </p>
                                </div>
                            </div> --}}
                            <div class="vr"></div>
                            <!-- Yearly Stats -->
                            <div class="d-flex align-items-center gap-4">
                                <div class="">
                                    <p class="mb-0 data-attributes">
                                        <span
                                            data-peity='{ "fill": ["#ffd200", "rgb(255 255 255 / 12%)"], "innerRadius": 32, "radius": 40 }'>{{ $yearlyPaymentsCompleted }}/{{ $yearlyPaymentsTotal }}</span>
                                    </p>
                                </div>
                                <div class="">
                                    <p class="mb-1 fs-6 fw-bold">Yearly Payments</p>
                                    <h2 class="mb-0">RM {{ $yearlyPaymentsCompleted }}</h2>
                                    <p class="mb-0"><span
                                            class="text-success me-2 fw-medium">+{{ $yearlyPaymentGrowth }}%</span><span>Payments</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end row-->




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
