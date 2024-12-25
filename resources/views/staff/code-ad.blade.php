@extends('layout.staff')

@section('title', 'Code Ad')


@section('content')
    <main class="main-wrapper">
        <div class="main-content">


            <h6 class="mb-0 text-uppercase">Code Ad List</h6>
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

                        {{-- <div class="col  text-center">
                        <button type="button" class="btn btn-grd-primary px-4 m-3" data-bs-toggle="modal"
                            data-bs-target="#FormModal">Add CC</button>
                    </div> --}}
                    </div>

                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tiktok Username</th>
                                    <th>Code Ad</th>
                                    <th>Video Link</th>
                                    {{-- <th>Actions</th> --}}
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($reviews as $reviews)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $reviews->contentCreator->name }}</td>
                                        <!-- Assuming you have a tiktok_id field -->
                                        {{-- @if ($reviews->video->ad_code)
                                            <td>{{ $reviews->video->ad_code }}</td>
                                        @else
                                            <td>N/A</td>
                                        @endif

                                        @if ($reviews->video->video_link != '')
                                            <td><a href="{{ $reviews->video->video_link }}" target="_blank">View Video</a>
                                            </td> <!-- Link to the video -->
                                        @else
                                            <td>N/A</td> <!-- Link to the video -->
                                        @endif --}}

                                 
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
