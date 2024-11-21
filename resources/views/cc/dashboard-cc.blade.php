@extends('layout.cc')

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
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <!-- Main Dashboard Content -->
        <div class="row">
            <!-- Welcome Card -->
            <div class="col-12 col-lg-4 col-xxl-4 d-flex">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <h5 class="mb-0">Welcome <span class="fw-600">{{ auth()->user()->name }}</span></h5>
                                <img src="assets/images/apps/party-popper.png" width="24" height="24" alt="">
                            </div>
                            <p class="mb-4">Here’s a quick overview of your performance</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="">
                                    <h3 class="mb-0 text-indigo">RM {{ number_format($totalEarnings, 2) }}</h3>
                                    <p class="mb-3">Your total earnings</p>
                                    <button class="btn btn-grd btn-grd-primary rounded-5 border-0 px-4">View Payments</button>
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
                            <h4 class="mb-0">{{ $assignedReviewsCount }}</h4>
                            <p class="mb-3">Assigned Reviews</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Approved Videos -->
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
                            <h4 class="mb-0">{{ $approvedVideosCount }}</h4>
                            <p class="mb-3">Approved Videos</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Videos -->
            <div class="col-12 col-lg-6 col-xxl-2 d-flex">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            <div
                                class="wh-42 d-flex align-items-center justify-content-center rounded-circle bg-warning bg-opacity-10 text-warning">
                                <span class="material-icons-outlined fs-5">hourglass_empty</span>
                            </div>
                            <div>
                                <span class="text-danger d-flex align-items-center">-5%<i
                                        class="material-icons-outlined">expand_less</i></span>
                            </div>
                        </div>
                        <div>
                            <h4 class="mb-0">{{ $pendingVideosCount }}</h4>
                            <p class="mb-3">Pending Videos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</main>
<!--end main wrapper-->
@endsection
