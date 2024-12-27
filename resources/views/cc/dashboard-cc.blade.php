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

                <!-- Notifications -->
                <div class="col-12 d-flex">
                    <div class="card rounded-4 w-100">
                        <div class="card-body">
                            <h4 class="mb-4">Notifications</h4>
                            <div class="notification-list" style="max-height: 300px; overflow-y: auto;">
                                @if (auth()->user()->notifications->count() > 0)
                                    @foreach (auth()->user()->notifications->take(15) as $notification)
                                        <div
                                            class="notification-item d-flex justify-content-between align-items-start mb-3 p-3 border rounded">
                                            <div>
                                                <strong>{{ $notification->data['title'] }}</strong>
                                                <p class="mb-1">{{ $notification->data['message'] }}</p>
                                                <small
                                                    class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                            </div>
                                            <a href="{{ $notification->data['url'] }}"
                                                class="btn btn-primary btn-lg">View</a>
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
