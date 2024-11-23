@extends('layout.staff')

@section('title', 'Product Guidelines')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">

            <h6 class="mb-0 text-uppercase">Product Guidelines</h6>
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

                    <div class="row">
                        <div class="col-10"></div>
                        <div class="col text-center">
                            <button type="button" class="btn btn-primary px-4 m-3" data-bs-toggle="modal"
                                data-bs-target="#AddProductGuideline">Add Guideline</button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-border">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <th>Product</th>
                                    <th>Guideline Type</th>
                                    <th>Guideline</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productGuidelines as $guideline)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $guideline->product->name }}</td>
                                        <td>{{ $guideline->guideline_type }}</td>
                                        <td>
                                            @if ($guideline->guideline_type == 'image')
                                                <img src="{{ asset($guideline->guideline_path) }}" alt="Guideline Image"
                                                    width="100">
                                            @elseif ($guideline->guideline_type == 'video')
                                                <video width="320" height="240" controls>
                                                    <source src="{{ asset($guideline->guideline_path) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @else
                                                {{ $guideline->guideline_path }}
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal"
                                                data-bs-target="#ViewProductGuideline{{ $guideline->id }}">View</button>
                                            <form action="{{ route('product-guidelines.destroy', $guideline->id) }}"
                                                method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger px-4"
                                                    onclick="return confirm('Are you sure you want to delete this guideline?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <div class="modal fade modal-xl" id="ViewProductGuideline{{ $guideline->id }}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header py-2">
                                                    <h5 class="modal-title">Product Guideline Information</h5>
                                                    <a href="javascript:;" class="primaery-menu-close"
                                                        data-bs-dismiss="modal">
                                                        <i class="material-icons-outlined">close</i>
                                                    </a>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-body">
                                                        <form class="row g-3" method="post"
                                                            action="{{ route('product-guidelines.update', $guideline->id) }}">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="col m-4">
                                                                <label for="input1" class="form-label">Product</label>
                                                                <select class="form-control" id="input1"
                                                                    name="product_id">
                                                                    @foreach ($products as $product)
                                                                        <option value="{{ $product->id }}"
                                                                            {{ $guideline->product_id == $product->id ? 'selected' : '' }}>
                                                                            {{ $product->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col m-4">
                                                                <label for="input2" class="form-label">Guideline
                                                                    Type</label>
                                                                <select class="form-control" id="input2"
                                                                    name="guideline_type">
                                                                    <option value="image"
                                                                        {{ $guideline->guideline_type == 'image' ? 'selected' : '' }}>
                                                                        Image</option>
                                                                    <option value="text"
                                                                        {{ $guideline->guideline_type == 'text' ? 'selected' : '' }}>
                                                                        Text</option>
                                                                    <option value="video"
                                                                        {{ $guideline->guideline_type == 'video' ? 'selected' : '' }}>
                                                                        Video</option>
                                                                </select>
                                                            </div>
                                                            <div class="col m-4">
                                                                <label for="input3" class="form-label">Guideline
                                                                    Path</label>
                                                                <input type="text" class="form-control" id="input3"
                                                                    name="guideline_path"
                                                                    value="{{ $guideline->guideline_path }}">
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="modal fade modal-xl" id="AddProductGuideline">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h5 class="modal-title">Add Product Guideline</h5>
                    <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                        <i class="material-icons-outlined">close</i>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="form-body">
                        <form class="row g-3" method="post" action="">
                            @csrf
                            <div class="col m-4">
                                <label for="input1" class="form-label">Product</label>
                                <select class="form-control" id="input1" name="product_id">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col m-4">
                                <label for="input2" class="form-label">Guideline Type</label>
                                <select class="form-control" id="input2" name="guideline_type">
                                    <option value="image">Image</option>
                                    <option value="text">Text</option>
                                    <option value="video">Video</option>
                                </select>
                            </div>
                            <div class="col m-4">
                                <label for="input3" class="form-label">Guideline Path</label>
                                <input type="text" class="form-control" id="input3" name="guideline_path" placeholder="Path to the guideline">
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
    </div> --}}


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
