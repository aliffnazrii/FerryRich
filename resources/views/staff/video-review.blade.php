@extends('layout.staff')

@section('title', 'video Queue')

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
                    

                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-border">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tiktok Username</th>
                                    <th>File Path</th>
                                    <th>Status</th>
                                    <th>Feedback</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($videos as $video)
                                    <tr>
                                        
                                        <td>{{ $loop->iteration }}</td>
                                      

                                        @if ($video->uploader->tiktok_username)
                                        <td>{{ $video->uploader->tiktok_username }}</td>
                                    @else
                                        <td>{{ $video->uploader->name }} (Name)</td>
                                    @endif
                                        <td>
                                            @if ($video->file_path != '')
                                                <a href="{{ route('videos.stream', $video->id) }}" target="_blank">View
                                                    Video</a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td> <span
                                            class="badge 
                                            {{ $video->status == 'Approved' ? 'bg-success' : ($video->status == 'Pending' ? 'bg-warning text-dark' : 'bg-danger') }}">
                                            {{ ucfirst($video->status) }}
                                        </span></td>
                                        <td>{{ $video->feedback == '' ? 'N/A' : $video->feedback }}</td>
                                        <td> <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal"
                                                data-bs-target="#updateVideo{{ $video->id }}">View</button></td>


                                        <div class="modal fade modal-xl" id="updateVideo{{ $video->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header py-2 ">
                                                        <h5 class="modal-title">Video Information</h5>
                                                        <a href="javascript:;" class="primaery-menu-close"
                                                            data-bs-dismiss="modal">
                                                            <i class="material-icons-outlined">close</i>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-body">
                                                            <form class="row g-3" method="post"
                                                                action="{{ route('videos.updateStatus', $video->id) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <div class="col-md-12 mb-3">
                                                                        <label for="feedback" class="form-label">Feedback</label>
                                                                        <textarea class="form-control" id="feedback" name="feedback" rows="3">{{ $video->feedback ?? 'N/A' }}</textarea>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-12 mb-3">
                                                                        <label for="status" class="form-label">Status</label>
                                                                        <select class="form-select" id="status" name="status">
                                                                            <option value="Pending" {{ $video->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                                            <option value="Approved" {{ $video->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                                                            <option value="Rejected" {{ $video->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                                                        </select>
                                                                    </div>
                                                                   
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Save</button>
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
