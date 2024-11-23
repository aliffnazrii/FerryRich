@extends('layout.staff')

@section('title', 'Code Ad')


@section('content')
    <main class="main-wrapper">
        <div class="main-content">


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
                                    <th>No</th>
                                    <th>Tiktok ID</th>
                                    <th>Code Ad</th>
                                    <th>Video Link</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->tiktok_username != '' ? $user->tiktok_username : $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>

                                        <td><span
                                                class="badge 
                                {{ $user->is_approved === 1 ? 'bg-success' : 'bg-warning' }}">
                                                {{-- {{ ucfirst($user->is_approved) }} --}}
                                                {{ $user->is_approved ? 'Approved' : 'Pending' }}
                                            </span></td>

                                        <td>
                                            <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal"
                                                data-bs-target="#UpdateModal{{ $user->id }}">View</button>
                                        </td>


                                        <!-- Modal -->
                                        <div class="modal fade modal-xl" id="UpdateModal{{ $user->id }}" tabindex="-1"
                                            aria-labelledby="UpdateModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header py-3">
                                                        <h5 class="modal-title" id="UpdateModalLabel">Content Creator
                                                            Information</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <form method="POST"
                                                                                action="{{ route('users.update', $user->id) }}">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                            <label
                                                                                                for="name">Name:</label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="name"
                                                                                                value="{{ $user->name }}"
                                                                                                disabled>
                                                                                            @error('name')
                                                                                                <span
                                                                                                    class="text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                            <label
                                                                                                for="email">Email:</label>
                                                                                            <input type="email"
                                                                                                class="form-control"
                                                                                                disabled name="email"
                                                                                                value="{{ $user->email }}"
                                                                                                disabled>
                                                                                            @error('email')
                                                                                                <span
                                                                                                    class="text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                            <label
                                                                                                for="phone">Phone:</label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="phone"
                                                                                                value="{{ $user->phone }}"
                                                                                                disabled>
                                                                                            @error('phone')
                                                                                                <span
                                                                                                    class="text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                            <label
                                                                                                for="role">Role:</label>
                                                                                            <select class="form-control"
                                                                                                id="role"
                                                                                                name="role" disabled>
                                                                                                <option
                                                                                                    value="{{ $user->role == 'Content Creator' ? 'Content Creator' : 'Staff' }}">
                                                                                                    {{ $user->role == 'Content Creator' ? 'Content Creator' : 'Staff' }}
                                                                                                </option>
                                                                                            </select>
                                                                                            @error('role')
                                                                                                <span
                                                                                                    class="text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                            <label
                                                                                                for="tiktok_username">TikTok
                                                                                                Username:</label>
                                                                                            <input type="text"
                                                                                                class="form-control mb-3"
                                                                                                id="tiktok_username"
                                                                                                name="tiktok_username"
                                                                                                value="{{ $user->tiktok_username ?? 'No Details' }}"
                                                                                                readonly disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                            <label
                                                                                                for="tiktok_profile_link">TikTok
                                                                                                Profile Link:</label>
                                                                                            <input type="text"
                                                                                                class="form-control mb-3"
                                                                                                id="tiktok_profile_link"
                                                                                                name="tiktok_profile_link"
                                                                                                value="{{ $user->tiktok_profile_link ?? 'No Details' }}"
                                                                                                readonly disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                            <label for="ic_number">IC
                                                                                                Number:</label>
                                                                                            <input type="text"
                                                                                                class="form-control mb-3"
                                                                                                id="ic_number"
                                                                                                name="ic_number"
                                                                                                value="{{ $user->ic_number ?? 'No Details' }}"
                                                                                                readonly disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                            <label for="bank_name">Bank
                                                                                                Name:</label>
                                                                                            <input type="text"
                                                                                                class="form-control mb-3"
                                                                                                id="bank_name"
                                                                                                name="bank_name"
                                                                                                value="{{ $user->bank_name ?? 'No Details' }}"
                                                                                                readonly disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                            <label
                                                                                                for="cardholder_name">Cardholder
                                                                                                Name:</label>
                                                                                            <input type="text"
                                                                                                class="form-control mb-3"
                                                                                                id="cardholder_name"
                                                                                                name="cardholder_name"
                                                                                                value="{{ $user->cardholder_name ?? 'No Details' }}"
                                                                                                readonly disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                            <label
                                                                                                for="bank_account_number">Bank
                                                                                                Account Number:</label>
                                                                                            <input type="text"
                                                                                                class="form-control mb-3"
                                                                                                id="bank_account_number"
                                                                                                name="bank_account_number"
                                                                                                value="{{ $user->bank_account_number ?? 'No Details' }}"
                                                                                                readonly disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                            <label
                                                                                                for="approval">Approval:</label>
                                                                                            <select class="form-control"
                                                                                                id="approval"
                                                                                                name="is_approved"
                                                                                                {{ Auth::user()->role == 'Finance' ? 'disabled' : '' }}>
                                                                                                <option value=""
                                                                                                    {{ $user->is_approved == null ? 'selected' : '' }}>
                                                                                                    Select</option>
                                                                                                <option value="1"
                                                                                                    {{ $user->is_approved == 1 ? 'selected' : '' }}>
                                                                                                    Approve</option>
                                                                                                <option value="0"
                                                                                                    {{ $user->is_approved != 1 ? 'selected' : '' }}>
                                                                                                    Reject</option>
                                                                                            </select>
                                                                                            @error('role')
                                                                                                <span
                                                                                                    class="text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">


                                                                                    <div
                                                                                        class="col-md-12 d-flex justify-content-end">
                                                                                        @if (Auth::user()->role == 'Finance')
                                                                                        @else
                                                                                            <button type="submit"
                                                                                                class="btn btn-primary px-4 me-2">Submit</button>
                                                                                        @endif
                                                                                        <button type="button"
                                                                                            class="btn btn-danger px-4"
                                                                                            data-bs-dismiss="modal">Close</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
