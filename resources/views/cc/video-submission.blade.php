@extends('layout.cc')

@section('title', 'Video List')


@section('content')
    <main class="main-wrapper">
        <div class="main-content">


            <h6 class="mb-0 text-uppercase">Video List</h6>
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
                                    <th>#</th>
                                    <th>Video File</th>
                                    <th>Status</th>
                                    <th>Feedback</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($videos as $video)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($video->file_path != '')
                                                <a href="{{ route('videos.stream', $video->id) }}" target="_blank">Open
                                                    Video</a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td class="text-center">

                                            <span
                                                class="badge 
                                            {{ $video->status == 'Approved' ? 'bg-success' : ($video->status == 'Rejected' ? 'bg-danger' : 'bg-warning') }}">
                                                {{ ucfirst($video->status) }}
                                            </span>

                                        </td>
                                        <td>{{ $video->status == 'Approved' ? 'Approved' : ($video->feedback == '' ? 'N/A' : $video->feedback) }}</td>

                                        <td class="text-center">

                                            @if ($video->status != 'Approved')
                                                {{-- <button class="btn btn-primary col-md-3" data-bs-toggle="modal"
                                                    data-bs-target="#videoModal{{ $video->id }}">
                                                    <i class="bi bi-eye"></i> View
                                                </button> --}}
                                                <button class="btn btn-primary col-md-3" data-bs-toggle="modal"
                                                    data-bs-target="#uploadVideo{{ $video->id }}">
                                                    <i class="bi bi-upload"></i> Upload
                                                </button>
                                            @else
                                                {{-- <button class="btn btn-primary col-md-3" data-bs-toggle="modal"
                                                    data-bs-target="#videoModal{{ $video->id }}">
                                                    <i class="bi bi-eye"></i> View
                                                </button> --}}
                                                <button class="btn btn-primary col-md-3" data-bs-toggle="modal"
                                                    data-bs-target="#linkModal{{ $video->id }}">
                                                    <i class="bi bi-link-45deg"></i> Link
                                                </button>
                                            @endif

                                            <!-- Upload Link Modal -->
                                            <div class="modal fade" id="linkModal{{ $video->id }}" tabindex="-1"
                                                aria-labelledby="modalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalLabel">Upload Link</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post"
                                                                action="{{ route('videos.uploadLink', $video->id) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-3">
                                                                    <label for="video_link" class="form-label">Upload
                                                                        Link</label>
                                                                    <input type="text" name="video_link"
                                                                        class="form-control" id="video_link"
                                                                        value="{{ $video->video_link }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="video_link" class="form-label">Upload
                                                                        Code Ad</label>
                                                                    <input type="text" name="code_ad"
                                                                        class="form-control" id="code_ad"
                                                                        value="{{ $video->ad_code }}">
                                                                </div>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Upload</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Upload Video Modal -->
                                            <div class="modal fade" id="uploadVideo{{ $video->id }}" tabindex="-1"
                                                aria-labelledby="modalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalLabel">Upload Video</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post"
                                                                action="{{ route('videos.update', $video->id) }}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-3">
                                                                    <label for="upload" class="form-label">Upload
                                                                        Video</label>
                                                                    <input type="file" name="file_path"
                                                                        class="form-control" id="upload">
                                                                </div>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Upload</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="videoModal{{ $video->id }}" tabindex="-1"
                                        aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">Video Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Status</label>
                                                            <input type="text" class="form-control" id="status"
                                                                value="{{ $video->status }}" readonly disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="feedback" class="form-label">Feedback</label>
                                                            <textarea class="form-control" id="feedback" rows="3" readonly disabled>{{ $video->feedback == '' ? 'No Feedback' : $video->feedback }}</textarea>
                                                        </div>
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
