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
                    @if (session('failed'))
                        <div class="alert alert-danger">
                            {{ session('failed') }}
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
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td class="col-1">{{ $loop->iteration }}</td>
                                        @if ($review->uploader->tiktok_username)
                                        <td>{{ $review->uploader->tiktok_username }}</td>
                                        @else
                                            <td>{{ $review->uploader->name }} (Name)</td>
                                        @endif

                                        @if ($review)
                                            <td>{{ $review->ad_code ?? 'N/A' }}</td>
                                            <td>
                                                @if ($review->video_link)
                                                    <a href="{{ $review->video_link }}" target="_blank">View
                                                        Video</a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                        @else
                                            <td>N/A</td>
                                            <td>N/A</td>
                                        @endif

                                        <td>
                                            @if ($review && ($review->ad_code && $review->video_link && $review->validate == 0))
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#validate{{ $review->id }}">
                                                    Validate
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="validate{{ $review->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-center" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalTitleId">
                                                                    Validate Ad Code
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure to validate this ad code?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form
                                                                    action="{{ route('video.validateAdCode', $review->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Validate</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Cancel
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($review && $review->validate == '1')
                                                <button type="button" class="btn btn-primary" disabled>
                                                    Validated
                                                </button>
                                            @else
                                                <!-- Disabled button if no video link and ad code -->
                                                <button type="button" class="btn btn-secondary" disabled>
                                                    Validate
                                                </button>
                                            @endif
                                        </td>
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
