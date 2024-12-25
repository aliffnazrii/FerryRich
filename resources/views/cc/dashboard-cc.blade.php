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

        <!-- Simple Dashboard Content -->
        <div class="row">
            <!-- Total Earnings -->
            <div class="col-12 col-lg-6 col-xxl-6 d-flex">
                <div class="card rounded-4 w-100">
                    <div class="card-body text-center py-5">
                        <h1 class="mb-3">RM {{ number_format($totalEarnings, 2) }}</h1>
                        <h4 class="mb-0">Total Earnings</h4>
                    </div>
                </div>
            </div>

            <!-- Assigned Reviews -->
            <div class="col-12 col-lg-6 col-xxl-6 d-flex">
                <div class="card rounded-4 w-100">
                    <div class="card-body text-center py-5">
                        <h1 class="mb-3">{{ $assignedReviewsCount }}</h1>
                        <h4 class="mb-0">Assigned Reviews</h4>
                    </div>
                </div>
            </div>

            <!-- Approved Videos -->
            <div class="col-12 col-lg-6 col-xxl-6 d-flex">
                <div class="card rounded-4 w-100">
                    <div class="card-body text-center py-5">
                        <h1 class="mb-3">{{ $approvedVideosCount }}</h1>
                        <h4 class="mb-0">Approved Videos</h4>
                    </div>
                </div>
            </div>

            <!-- Pending Videos -->
            <div class="col-12 col-lg-6 col-xxl-6 d-flex">
                <div class="card rounded-4 w-100">
                    <div class="card-body text-center py-5">
                        <h1 class="mb-3">{{ $pendingVideosCount }}</h1>
                        <h4 class="mb-0">Pending Videos</h4>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</main>
<!--end main wrapper-->
@endsection
