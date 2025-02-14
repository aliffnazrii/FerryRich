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
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <!-- Simplified Dashboard Content -->
        <div class="row justify-content-center col-8 m-auto">

            <!-- Notifications -->
            <div class="col-12 d-flex mb-4">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <h4 class="mb-4">Notifications</h4>
                        <div class="notification-list" style="max-height: 300px; overflow-y: auto;">
                            @if (auth()->user()->notifications->count() > 0)
                                @foreach (auth()->user()->notifications->take(15) as $notification)
                                    <div class="notification-item d-flex justify-content-between align-items-start mb-3 p-3 border rounded">
                                        <div>
                                            <strong>{{ $notification->data['title'] }}</strong>
                                            <p class="mb-1">{{ $notification->data['message'] }}</p>
                                            <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                        </div>
                                        <a href="{{ $notification->data['url'] }}" class="btn btn-primary btn-lg">View</a>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center">
                                    <strong>No notifications</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Welcome Card -->
            <div class="col-12 col-md-12 d-flex  mb-4">
                <div class="card rounded-4 w-100 bg-gradient-primary text-center py-3 px-4">
                    <div class="card-body">
                        <h4 class="mb-0">Welcome Back, {{ auth()->user()->name }}!</h4>
                        <p>Here’s a quick overview of the system's performance</p>
                        <h3 class="mt-3">RM {{ number_format($totalPaidPayments, 2) }}</h3>
                        <p>Total Paid Payments</p>
                    </div>
                </div>
            </div>

          
            <!-- First Row Cards -->
            <div class="col-12 col-md-4 d-flex justify-content-center mb-4">
                <div class="card rounded-4 w-100 border-start border-4 border-primary text-center py-3 px-4">
                    <div class="card-body">
                        <h4 class="mb-3 text-primary">{{ $totalAssignedReviews }}</h4>
                        <p class="mb-0">Assigned Reviews</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 d-flex justify-content-center mb-4">
                <div class="card rounded-4 w-100 border-start border-4 border-success text-center py-3 px-4">
                    <div class="card-body">
                        <h4 class="mb-3 text-success">{{ $totalApprovedVideos }}</h4>
                        <p class="mb-0">Approved Videos</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 d-flex justify-content-center mb-4">
                <div class="card rounded-4 w-100 border-start border-4 border-warning text-center py-3 px-4">
                    <div class="card-body">
                        <h4 class="mb-3 text-warning">{{ $totalPendingVideos }}</h4>
                        <p class="mb-0">Pending Videos</p>
                    </div>
                </div>
            </div>

            <!-- Second Row Cards -->
            <div class="col-12 col-md-6 d-flex justify-content-center mb-4">
                <div class="card rounded-4 w-100 border-start border-4 border-info text-center py-3 px-4">
                    <div class="card-body">
                        <h4 class="mb-3 text-info">{{ $totalContentCreators }}</h4>
                        <p class="mb-0">Content Creators</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 d-flex justify-content-center mb-4">
                <div class="card rounded-4 w-100 bg-gradient-secondary text-center py-3 px-4">
                    <div class="card-body">
                        <h4 class="mb-3">RM {{ number_format($totalPayments, 2) }}</h4>
                        <p class="mb-0">Total Payments</p>
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
    <p class="mb-0">Copyright © 2024. All rights reserved.</p>
</footer>
<!--end footer-->

@endsection