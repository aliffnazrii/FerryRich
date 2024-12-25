@extends('layout.staff')

@section('title', 'Payment')


@section('content')
    <main class="main-wrapper">
        <div class="main-content">


            <h6 class="mb-0 text-uppercase">Payment List</h6>
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


                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-border">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Content Creator</th>
                                    <th>Paid Review ID</th>
                                    <th>Amount (RM)</th>
                                    <th>Status</th>
                                    <th>Reference Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $payment->paidReview->contentCreator->name }}</td>
                                        <td>{{ $payment->paid_review_id }}</td>
                                        <td>{{ $payment->amount }}</td>

                                        <td><span
                                                class="badge 
                                    {{ $payment->status == 'Completed' ? 'bg-success' : ($payment->status == 'Failed' ? 'bg-danger' : 'bg-warning') }}">
                                                {{ ucfirst($payment->status) }}
                                            </span></td>
                                        <td>{{ $payment->reference_number ? $payment->reference_number : 'N/A' }}</td>
                                        <td> <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal"
                                                data-bs-target="#viewPayment{{ $payment->id }}">View</button>
                                        </td>

                                        <div class="modal fade modal-xl" id="viewPayment{{ $payment->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header py-2 ">
                                                        <h5 class="modal-title">Payment Information</h5>
                                                        <a href="javascript:;" class="primaery-menu-close"
                                                            data-bs-dismiss="modal">
                                                            <i class="material-icons-outlined">close</i>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-body">
                                                            <form class="row g-3" method="post"
                                                                action="{{ route('payments.update', $payment->id) }}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="col-md-12 my-3">
                                                                    <label for="paid_review_id" class="form-label">Paid
                                                                        Review</label>
                                                                    <input type="text" name="paid_review_id"
                                                                        class="form-control" id="paid_review_id"
                                                                        value="{{ isset($payment) ? $payment->paid_review_id : old('paid_review_id') }}"
                                                                        disabled required>
                                                                </div>

                                                                <div class="col-md-12 my-3">
                                                                    <label for="paid_review_id"
                                                                        class="form-label">Reviewer</label>
                                                                    <input type="text" class="form-control"
                                                                        value=" {{ $payment->paidReview->contentCreator->name }}"
                                                                        disabled required>
                                                                </div>

                                                                <div class="col-md-12 my-3">
                                                                    <label for="amount" class="form-label">Amount
                                                                        (RM)
                                                                    </label>
                                                                    <input type="number"
                                                                        value="{{ $payment->amount ?? '' }}" name="amount"
                                                                        class="form-control" id="amount"
                                                                        placeholder="Amount" disabled required>
                                                                </div>

                                                                <div class="col-md-12 my-3">
                                                                    <label for="reference_number"
                                                                        class="form-label">Reference Number</label>
                                                                    <input type="text"
                                                                        value="{{ $payment->reference_number ?? '' }}"
                                                                        name="reference_number" class="form-control"
                                                                        id="reference_number" placeholder="Reference Number"
                                                                        {{ $payment->status == 'Failed' ? 'disabled' : '' }}>
                                                                </div>

                                                                @if ($payment->status == 'Pending')
                                                                    <div class="col-md-12 my-3">
                                                                        <label for="receipt_photo"
                                                                            class="form-label">Receipt
                                                                        </label>
                                                                        <input type="file" name="receipt"
                                                                            class="form-control" id="receipt_photo"
                                                                            accept=".jpg, .jpeg, .png, .pdf"
                                                                            {{ $payment->status != 'Pending' ? 'disabled' : '' }}>

                                                                        @if ($payment->file_path != '')
                                                                            <a class="btn btn-primary mt-3 ml-1"
                                                                                href="{{ route('payments.viewReceipt', $payment->id) }}"
                                                                                target="_blank">View Receipt</a>
                                                                        @endif

                                                                    </div>
                                                                @else
                                                                    <div class="col-md-12 my-3">
                                                                        <label for="receipt_photo"
                                                                            class="form-label">Receipt
                                                                        </label>
                                                                        <br>
                                                                        {{-- <input type="text" name="receipt"
                                                                            class="form-control" id="receipt_photo"
                                                                            value="{{ $payment->file_path }}"
                                                                            {{ $payment->status != 'Pending' ? 'disabled' : '' }}> --}}

                                                                        @if ($payment->file_path != '')
                                                                            <a class="btn btn-primary ml-1"
                                                                                href="{{ route('payments.viewReceipt', $payment->id) }}"
                                                                                target="_blank">View Receipt</a>
                                                                        @endif
                                                                    </div>
                                                                @endif

                                                                <div class="col-md-12 my-3">
                                                                    <label for="status" class="form-label">Payment
                                                                        Status</label>
                                                                    <select name="status" class="form-control"
                                                                        id="status"
                                                                        {{ $payment->status != 'Completed' ? '' : 'disabled' }}>
                                                                        <option value="Pending"
                                                                            {{ isset($payment) && $payment->status == 'Pending' ? 'selected' : '' }}>
                                                                            Pending</option>
                                                                        <option value="Completed"
                                                                            {{ isset($payment) && $payment->status == 'Completed' ? 'selected' : '' }}>
                                                                            Completed</option>
                                                                        <option value="Failed"
                                                                            {{ isset($payment) && $payment->status == 'Failed' ? 'selected' : '' }}>
                                                                            Failed</option>
                                                                    </select>
                                                                </div>
                                                                <div class="modal-footer">

                                                                    @if ($payment->status == 'Pending' || $payment->status == 'Failed')
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
