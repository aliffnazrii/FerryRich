@extends('layout.staff')

@section('title', 'Paid Review')


@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Select2 Bootstrap Theme (Optional for better styling with Bootstrap 5) -->
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
        rel="stylesheet" />


    <main class="main-wrapper">
        <div class="main-content">


            <h6 class="mb-0 text-uppercase">Review List</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('failed'))
                        <div class="alert alert-danger">
                            {{ session('failed') }}
                        </div>
                    @endif



                    @if (Auth::user()->role == 'Staff' || Auth::user()->role == 'Admin')
                        <div class="row">
                            <div class="col-10"></div>

                            <div class="col  text-center">
                                <button type="button" class="btn btn-primary px-4 m-3" data-bs-toggle="modal"
                                    data-bs-target="#addReview">Add</button>
                            </div>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-border">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tiktok Username</th>
                                    <th>Product</th>
                                    <th>Deal Rate (RM)</th>
                                    <th>Total Products</th>
                                    <th>Order Status</th>
                                    <th>Payment Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($paidReviews as $review)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        @if ($review->contentCreator->tiktok_username)
                                            <td>{{ $review->contentCreator->tiktok_username }}</td>
                                        @else
                                            <td>{{ $review->contentCreator->name }} (Name)</td>
                                        @endif
                                        <td>{{ $review->product->name }}</td>
                                        <td>{{ $review->deal_rate }}</td>
                                        <td>{{ $review->total_product }}</td>
                                        <td><span
                                                class="badge 
                                    {{ $review->order_status == 'Delivered' ? 'bg-success' : ($review->order_status == 'Cancelled' ? 'bg-danger' : 'bg-warning') }}">
                                                {{ ucfirst($review->order_status) }}
                                            </span></td>

                                        <td><span
                                                class="badge 
                                    {{ $review->payment_status == 'Paid' ? 'bg-success' : 'bg-warning' }}">
                                                {{ ucfirst($review->payment_status) }}
                                            </span></td>
                                        <td>
                                            <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal"
                                                data-bs-target="#viewReview{{ $review->id }}">View</button>
                                        </td>

                                        <div class="modal fade modal-xl" id="viewReview{{ $review->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header py-2 ">
                                                        <h5 class="modal-title">Review Information</h5>
                                                        <a href="javascript:;" class="primaery-menu-close"
                                                            data-bs-dismiss="modal">
                                                            <i class="material-icons-outlined">close</i>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-body">
                                                            <form class="row g-3" method="post"
                                                                action="{{ route('reviews.update', $review->id) }}">
                                                                @csrf
                                                                @method('PUT')

                                                                <div class="modal-body">
                                                                    <div class="col-md-12 my-3">
                                                                        <label for="content_creator_id"
                                                                            class="form-label">Content Creator</label>
                                                                        <input type="text"
                                                                            value="{{ $review->contentCreator->tiktok_username != '' ? $review->contentCreator->tiktok_username : $review->contentCreator->name }}"
                                                                            disabled name="content_creator_id"
                                                                            class="form-control" id="content_creator_id"
                                                                            required>
                                                                    </div>

                                                                    <div class="col-md-12 my-3">
                                                                        <label for="product_id"
                                                                            class="form-label">Product</label>
                                                                        <input type="text"
                                                                            value="{{ $review->product->name ?? '' }}"
                                                                            name="product_id" disabled class="form-control"
                                                                            id="product_id" required>
                                                                    </div>

                                                                    <div class="col-md-12 my-3">
                                                                        <label for="deal_rate" class="form-label">Deal Rate
                                                                            (RM)
                                                                        </label>
                                                                        <input type="number"
                                                                            value="{{ $review->deal_rate ?? '' }}"
                                                                            name="deal_rate" step="0.01"
                                                                            class="form-control" id="deal_rate"
                                                                            placeholder="Deal Rate" required disabled>
                                                                    </div>

                                                                    <div class="col-md-12 my-3">
                                                                        <label for="total_product" class="form-label">Total
                                                                            Products</label>
                                                                        <input type="number"
                                                                            value="{{ $review->total_product ?? '' }}"
                                                                            disabled name="total_product"
                                                                            class="form-control" id="total_product"
                                                                            placeholder="Total Products" required>
                                                                    </div>

                                                                    <div class="col-md-12 my-3">
                                                                        <label for="order_status" class="form-label">Order
                                                                            Status</label>
                                                                        <select name="order_status" class="form-control"
                                                                            id="order_status" required disabled>
                                                                            <option value="Pending"
                                                                                {{ isset($review) && $review->order_status == 'Pending' ? 'selected' : '' }}>
                                                                                Pending</option>
                                                                            <option value="Delivered"
                                                                                {{ isset($review) && $review->order_status == 'Delivered' ? 'selected' : '' }}>
                                                                                Delivered</option>
                                                                            <option value="Cancelled"
                                                                                {{ isset($review) && $review->order_status == 'Cancelled' ? 'selected' : '' }}>
                                                                                Cancelled</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-12 my-3">
                                                                        <label for="payment_status"
                                                                            class="form-label">Payment Status</label>
                                                                        <select name="payment_status" class="form-control"
                                                                            id="payment_status" required disabled>
                                                                            <option value="Pending"
                                                                                {{ isset($review) && $review->payment_status == 'Pending' ? 'selected' : '' }}>
                                                                                Pending</option>
                                                                            <option value="Paid"
                                                                                {{ isset($review) && $review->payment_status == 'Paid' ? 'selected' : '' }}>
                                                                                Paid</option>
                                                                            <option value="Failed"
                                                                                {{ isset($review) && $review->payment_status == 'Failed' ? 'selected' : '' }}>
                                                                                Failed</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-12 my-3">
                                                                        <label for="shipment_tracking_number"
                                                                            class="form-label">Tracking Number</label>
                                                                        <span
                                                                            class="badge bg-danger">
                                                                           J&T
                                                                        </span>
                                                                        <input type="text"
                                                                            value="{{ $review->shipment_tracking_number ?? '' }}"
                                                                            name="shipment_tracking_number"
                                                                            class="form-control"
                                                                            id="shipment_tracking_number"
                                                                            placeholder="Tracking Number"
                                                                            {{ Auth::user()->role == 'Finance' ? 'disabled' : '' }}>
                                                                    </div>

                                                                    <div class="col-md-12 my-3">
                                                                        <label for="product_received"
                                                                            class="form-label">Product Received</label>
                                                                        <select name="product_received"
                                                                            class="form-control" id="product_received"
                                                                            disabled>
                                                                            <option value="1"
                                                                                {{ isset($review) && $review->product_received == 1 ? 'selected' : '' }}>
                                                                                Yes</option>
                                                                            <option value="0"
                                                                                {{ isset($review) && $review->product_received == 0 ? 'selected' : '' }}>
                                                                                No</option>
                                                                        </select>
                                                                    </div>


                                                                </div>
                                                                <div class="modal-footer">
                                                                    @if (Auth::user()->role != 'Finance')
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save</button>
                                                                    @endif
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade modal-xl" id="addReview">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header py-2">
                        <h5 class="modal-title">Add Reviews</h5>
                        <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                            <i class="material-icons-outlined">close</i>
                        </a>
                    </div>

                    <div class="modal-body">
                        <div class="form-body">
                            <form class="row g-3" method="post" action="{{ route('reviews.store') }}">
                                @csrf
                                <div class="modal-body">
                                    <!-- Searchable Dropdown -->
                                    <div class="mb-3">
                                        <label for="content_creator_id" class="form-label">Content Creator</label>
                                        <select name="content_creator_id" class="form-select select2"
                                            id="single-select-field" required>
                                            <option value="">Select</option>
                                            @foreach ($contentcreators as $cc)
                                                <option value="{{ $cc->id }}">
                                                    {{ $cc->tiktok_username != '' ? $cc->tiktok_username : $cc->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>





                                    <div class="col-md-12 my-3">
                                        <label for="product_id" class="form-label">Product</label>
                                        <select name="product_id" class="form-select select2" id="product-list" required>
                                            <option value="">Select</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">
                                                    {{ $product->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>




                                    <div class="col-md-12 my-3">
                                        <label for="deal_rate" class="form-label">Deal Rate (RM)</label>
                                        <input type="number" value="" step="0.01" name="deal_rate"
                                            class="form-control" id="deal_rate" placeholder="Deal Rate" required>
                                    </div>

                                    <div class="col-md-12 my-3">
                                        <label for="total_product" class="form-label">Total Products</label>
                                        <input type="number" value="" name="total_product" class="form-control"
                                            id="total_product" placeholder="Total Products" required>
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->



        <!--bootstrap js-->
        <script src="assets/js/bootstrap.bundle.min.js"></script>

        <!--plugins-->
        <script src="assets/js/jquery.min.js"></script>
        <!--plugins-->
        <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
        <script src="assets/plugins/metismenu/metisMenu.min.js"></script>
        <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="assets/plugins/select2/js/select2-custom.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
        <script>
            $(document).ready(function() {
                var table = $('#example2').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'print']
                });

                table.buttons().container()
                    .appendTo('#example2_wrapper .col-md-6:eq(0)');
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#single-select-field').select2({
                    theme: 'bootstrap-5', // Matches the Bootstrap 5 theme
                    placeholder: "Select a content creator", // Optional placeholder
                    allowClear: true, // Allows a clear button to reset the dropdown
                    dropdownParent: $('#addReview') // Replace with the ID of your modal
                });
                $('#product-list').select2({
                    theme: 'bootstrap-5', // Matches the Bootstrap 5 theme
                    placeholder: "Select a product", // Optional placeholder
                    allowClear: true, // Allows a clear button to reset the dropdown
                    dropdownParent: $('#addReview') // Replace with the ID of your modal
                });
            });
        </script>

        <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
        <script src="assets/js/main.js"></script>

        <!-- Select2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!-- Select2 Bootstrap Theme (Optional) -->
        <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
            rel="stylesheet" />

        {{-- <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Select2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}


    </main>
@endsection
