@extends('layout.staff')

@section('title', 'Guideline Management')

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">

    <main class="main-wrapper">
        <div class="main-content">

            <h6 class="mb-0 text-uppercase">Guideline Management</h6>
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
                            <div class="col text-center">
                                <button type="button" class="btn btn-primary px-4 m-3" data-bs-toggle="modal"
                                    data-bs-target="#addGuideline">Add</button>
                            </div>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="guidelineTable" class="table table-striped table-border">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product</th>
                                    <th>Title</th>
                                    <th>File Type</th>
                                    <th>Remark</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($guidelines as $guideline)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $guideline->product->name }}</td>
                                        <td>{{ $guideline->title }}</td>
                                        <td>{{ $guideline->file_type }}</td>
                                        <td>{{ $guideline->remark ?? 'N/A' }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal"
                                                data-bs-target="#viewGuideline{{ $guideline->id }}">View</button>
                                        </td>

                                        <!-- View Modal -->
                                        <div class="modal fade modal-xl" id="viewGuideline{{ $guideline->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header py-2">
                                                        <h5 class="modal-title">Guideline Information</h5>
                                                        <a href="javascript:;" class="primary-menu-close"
                                                            data-bs-dismiss="modal">
                                                            <i class="material-icons-outlined">close</i>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-body">
                                                            <form class="row g-3" method="post"
                                                                {{-- action="{{ route('guidelines.update', $guideline->id) }}" --}}
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')

                                                                <div class="modal-body">
                                                                    <div class="col-md-12 my-3">
                                                                        <label for="product_id" class="form-label">Product</label>
                                                                        <input type="text"
                                                                            value="{{ $guideline->product->name ?? '' }}"
                                                                            disabled name="product_id" class="form-control"
                                                                            id="product_id" required>
                                                                    </div>

                                                                    <div class="col-md-12 my-3">
                                                                        <label for="title" class="form-label">Title</label>
                                                                        <input type="text" value="{{ $guideline->title }}"
                                                                            name="title" class="form-control" id="title"
                                                                            placeholder="Title" required>
                                                                    </div>

                                                                    <div class="col-md-12 my-3">
                                                                        <label for="file_type" class="form-label">File Type</label>
                                                                        <input type="text" value="{{ $guideline->file_type }}"
                                                                            name="file_type" class="form-control"
                                                                            id="file_type" placeholder="File Type" required>
                                                                    </div>

                                                                    <div class="col-md-12 my-3">
                                                                        <label for="remark" class="form-label">Remark</label>
                                                                        <textarea name="remark" class="form-control"
                                                                            id="remark" placeholder="Optional">{{ $guideline->remark }}</textarea>
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Modal -->
        <div class="modal fade modal-xl" id="addGuideline">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header py-2">
                        <h5 class="modal-title">Add Guideline</h5>
                        <a href="javascript:;" class="primary-menu-close" data-bs-dismiss="modal">
                            <i class="material-icons-outlined">close</i>
                        </a>
                    </div>

                    <div class="modal-body">
                        <div class="form-body">
                            <form class="row g-3" method="post" 
                            {{-- action="{{ route('guidelines.store') }}" --}}
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="col-md-12 my-3">
                                        <label for="product_id" class="form-label">Product</label>
                                        <select name="product_id" class="form-select" required>
                                            <option value="">Select</option>
                                            {{-- @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>

                                    <div class="col-md-12 my-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" value="" name="title" class="form-control" id="title"
                                            placeholder="Title" required>
                                    </div>

                                    <div class="col-md-12 my-3">
                                        <label for="file" class="form-label">Upload File</label>
                                        <input type="file" name="file" class="form-control" id="file" required>
                                    </div>

                                    <div class="col-md-12 my-3">
                                        <label for="remark" class="form-label">Remark</label>
                                        <textarea name="remark" class="form-control" id="remark"
                                            placeholder="Optional"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#guidelineTable').DataTable();
            });
        </script>
    </main>
@endsection
