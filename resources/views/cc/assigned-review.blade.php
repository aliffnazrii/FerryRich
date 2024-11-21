@extends('layout.cc')

@section('title', 'Product List')


@section('content')
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


                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-border">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Deal Rate (RM)</th>
                                    <th>Total Products</th>
                                    <th>Order Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assignedReviews as $review)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $review->product->name }}</td>
                                        <td>{{ $review->deal_rate }}</td>
                                        <td>{{ $review->total_product }}</td>

                                        <td><span
                                                class="badge 
                                        {{ $review->order_status == 'Delivered' ? 'bg-success' : ($review->order_status == 'Cancelled' ? 'bg-danger' : 'bg-warning') }}">
                                                {{ ucfirst($review->order_status) }}
                                            </span></td>
                                        <td>
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#reviewModal{{ $review->id }}">View</button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="reviewModal{{ $review->id }}" tabindex="-1"
                                        aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">Review Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post"
                                                        action="{{ route('reviews.updateOrderStatus', $review->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="product" class="form-label">Product</label>
                                                            <input type="text" class="form-control" id="product"
                                                                value="{{ $review->product->name }}" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="deal_rate" class="form-label">Deal Rate</label>
                                                            <input type="text" class="form-control" id="deal_rate"
                                                                value="{{ $review->deal_rate }}" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="total_product" class="form-label">Total
                                                                Products</label>
                                                            <input type="text" class="form-control" id="total_product"
                                                                value="{{ $review->total_product }}" readonly>
                                                        </div>

                                                        <div class="col-md-12 my-3">
                                                            <label for="order_status" class="form-label">Order
                                                                Status</label>
                                                            <select name="order_status" class="form-control"
                                                                id="order_status" required
                                                                {{ isset($review) && $review->order_status == 'Delivered' ? 'disabled' : '' }}>
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
                                                            <label for="product_received" class="form-label">Product
                                                                Received</label>
                                                            <select name="product_received" class="form-control"
                                                                id="product_received"
                                                                {{ isset($review) && $review->product_received == 1 ? 'Disabled ' : '' }}>
                                                                <option value="1"
                                                                    {{ isset($review) && $review->product_received ? 'selected' : '' }}>
                                                                    Yes</option>
                                                                <option value="0"
                                                                    {{ isset($review) && !$review->product_received ? 'selected' : '' }}>
                                                                    No</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    @if ($review->product_received == 1 && $review->order_status == 'Delivered')
                                                    @else
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    @endif
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>





        <!--bootstrap js-->
        <script src="assets/js/bootstrap.bundle.min.js"></script>

        <!--plugins-->
        <script src="assets/js/jquery.min.js"></script>
        <!--plugins-->
        <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
        <script src="assets/plugins/metismenu/metisMenu.min.js"></script>
        <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
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
        <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
        <script src="assets/js/main.js"></script>

    </main>
@endsection
