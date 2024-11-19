@extends('layout.staff')

@section('title', 'Content Creator List')


@section('content')
<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Components</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Content Creator List</h6>
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
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Approval Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->is_approved ? 'Approved' : 'Pending' }}</td>
                                {{-- <td>
                                    <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                                    <a href="{{ route('users.destroy', $user->id) }}">Delete</a>
                                </td> --}}
                            <td> 
                                <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal"
                                    data-bs-target="#UpdateModal{{$user->id}}">View</button></td>
                       
                       
<!-- Modal -->
<div class="modal fade modal-xl" id="UpdateModal{{$user->id}}" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-3">
                <h5 class="modal-title" id="UpdateModalLabel">Content Creator Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="{{ route('users.update',$user->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="phone">Phone:</label>
                                <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="role">Role:</label>
                                <input type="text" class="form-control" name="role" value="{{$user->role == 'cc' ? 'Content Creator': 'Staff'}}" disabled>

                                {{-- <select class="form-control" id="role" name="role">
                                    <option {{$user->role == 'cc'? 'Content Creator': 'Staff'}} value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select> --}}
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary px-4 me-2">Submit</button>
                                    <button type="button" class="btn btn-danger px-4" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
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