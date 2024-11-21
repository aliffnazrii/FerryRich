@extends('layout.cc')

@section('title', 'Product List')


@section('content')
    <main class="main-wrapper">
        <div class="main-content">


            <h6 class="mb-0 text-uppercase">Product List</h6>
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
                                    <th>Paid Review ID</th>
                                    <th>Amount (RM)</th>
                                    <th>Status</th>
                                    <th>Reference Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $review)
                                    @foreach ($review->payments as $payment)
                                        <tr>
                                            <td>{{ $loop->parent->iteration }}</td>
                                            <td>{{ $review->id }}</td>
                                            <td>{{ $payment->amount }}</td>
                                            <td>
                                                <span
                                                    class="badge 
                                                    {{ $payment->status == 'Completed' ? 'bg-success' : ($payment->status == 'Pending' ? 'bg-warning text-dark' : 'bg-danger') }}">
                                                    {{ ucfirst($payment->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $payment->reference_number ?? 'N/A' }}</td>
                                            <td>
                                                <button class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#paymentModal{{ $payment->id }}">View</button>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="paymentModal{{ $payment->id }}" tabindex="-1"
                                            aria-labelledby="modalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLabel">Payment Details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="mb-3">
                                                                <label for="paid_review_id" class="form-label">Paid Review
                                                                    ID</label>
                                                                <input type="text" class="form-control"
                                                                    id="paid_review_id" value="{{ $review->id }}"
                                                                    readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="amount" class="form-label">Amount (RM)</label>
                                                                <input type="text" class="form-control" id="amount"
                                                                    value="{{ $payment->amount }}" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Status</label>
                                                                <input type="text" class="form-control" id="status"
                                                                    value="{{ ucfirst($payment->status) }}" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="reference_number" class="form-label">Reference
                                                                    Number</label>
                                                                <input type="text" class="form-control"
                                                                    id="reference_number"
                                                                    value="{{ $payment->reference_number ?? 'N/A' }}"
                                                                    readonly>
                                                            </div>

                                                            @if ($payment->file_path)
                                                                <div class="mb-3">
                                                                    <label for="reference_number" class="form-label">Receipt
                                                                    </label>
                                                                    <br>
                                                                    <a class="btn btn-primary mt-1 ml-1"
                                                                        href="{{ route('payments.viewReceipt', $payment->id) }}"
                                                                        target="_blank">View Receipt</a>
                                                                </div>
                                                            @endif
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
