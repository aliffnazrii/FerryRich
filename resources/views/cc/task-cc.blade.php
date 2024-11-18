@extends('layout.cc')

@section('title', 'Task')

@section('content')

<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Task List</div>


        </div>
        <!--end breadcrumb-->


        <div class="card">
            <div class="card-body">


                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>CC Name</th>
                                <th>Product</th>
                                <th>Username</th>
                                <th>Platform</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <td>Azmin Aliah</td>
                            <td>Lifebuoy</td>
                            <td>mimien</td>
                            <td>Tiktok</td>
                            <td>Active</td>
                            <td> <button type="button" class="btn btn-grd-primary px-4" data-bs-toggle="modal"
                                    data-bs-target="#UpdateModal">View</button></td>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>CC Name</th>
                                <th>Product</th>
                                <th>Username</th>
                                <th>Platform</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade modal-xl" id="UpdateModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 py-2 bg-grd-info">
                    <h5 class="modal-title">Task Information</h5>
                    <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                        <i class="material-icons-outlined">close</i>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="form-body">
                        <form class="row g-3">
                            <div class="col-md-6">
                                <label for="input1" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="input1" placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="input2" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="input2" placeholder="Last Name">
                            </div>
                            <div class="col-md-12">
                                <label for="input3" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="input3" placeholder="Phone">
                            </div>
                            <div class="col-md-12">
                                <label for="input4" class="form-label">Email</label>
                                <input type="email" class="form-control" id="input4">
                            </div>
                            <div class="col-md-12">
                                <label for="input5" class="form-label">Password</label>
                                <input type="password" class="form-control" id="input5">
                            </div>
                            <div class="col-md-12">
                                <label for="input6" class="form-label">DOB</label>
                                <input type="date" class="form-control" id="input6">
                            </div>
                            <div class="col-md-12">
                                <label for="input7" class="form-label">Country</label>
                                <select id="input7" class="form-select">
                                    <option selected="">Choose...</option>
                                    <option>One</option>
                                    <option>Two</option>
                                    <option>Three</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="input8" class="form-label">City</label>
                                <input type="text" class="form-control" id="input8" placeholder="City">
                            </div>
                            <div class="col-md-4">
                                <label for="input9" class="form-label">State</label>
                                <select id="input9" class="form-select">
                                    <option selected="">Choose...</option>
                                    <option>One</option>
                                    <option>Two</option>
                                    <option>Three</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="input10" class="form-label">Zip</label>
                                <input type="text" class="form-control" id="input10" placeholder="Zip">
                            </div>
                            <div class="col-md-12">
                                <label for="input11" class="form-label">Address</label>
                                <textarea class="form-control" id="input11" placeholder="Address ..." rows="3"></textarea>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="input12">
                                    <label class="form-check-label" for="input12">Check me out</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="button" class="btn btn-grd-danger px-4">Submit</button>
                                    <button type="button" class="btn btn-grd-info px-4">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
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