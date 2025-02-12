@extends('layout.cc')


@section('title', 'Profile')

@section('content')
    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">



            <div class="card rounded-4 mt-5">
                <div class="card-body p-4">
                    <div class="position-relative mb-5">
                        <img src="{{ asset('assets/images/gallery/profile-cover.png') }}" class="img-fluid rounded-4 shadow"
                            alt="">
                        <div class="profile-avatar position-absolute top-100 start-50 translate-middle">
                            <img src="{{ asset('assets/images/avatars/11.png') }}"
                                class="img-fluid rounded-circle p-1 bg-grd-danger shadow" width="170" height="170"
                                alt="">
                        </div>
                    </div>
                    <div class="profile-info pt-5 d-flex align-items-center justify-content-between">
                        <div class="">
                            <h3>{{ $user->name }}</h3>
                            <p class="mb-0">{{ $user->role }}</p>
                        </div>

                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12 col-xl-8">
                    <div class="card rounded-4 border-top border-4 border-primary border-gradient-1">
                        <div class="card-body p-4">
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

                            <form class="row g-4" method="post" action="{{ route('users.update', $user->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="col-md-12">
                                    <label for="input1" class="form-label">Full Name</label>
                                    <input type="text" value="{{ $user->name }}" name="name" class="form-control"
                                        id="input1" placeholder="First Name">
                                </div>

                                <div class="col-md-12">
                                    <label for="input4" class="form-label">Email</label>
                                    <input type="email" value="{{ $user->email }}" name="email" class="form-control"
                                        id="input4" disabled>
                                </div>

                                <div class="col-md-12">
                                    <label for="input3" class="form-label">Phone</label>
                                    <input type="text" value="{{ $user->phone }}" name="phone" class="form-control"
                                        id="input3" placeholder="Phone">
                                </div>


                                <div class="col-md-12">
                                    <label for="input3" class="form-label">Address</label>
                                   
                                        <textarea name="address" id="input5" class="form-control" placeholder="Jalan Kuala Lumpur" cols="30" rows="5">{{ $user->address }}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" class="form-control" id="role" required disabled>
                                        <option value="Content Creator"
                                            {{ isset($user) && $user->role == 'Content Creator' ? 'selected' : '' }}>
                                            Content Creator</option>
                                        <option value="Staff"
                                            {{ isset($user) && $user->role == 'Staff' ? 'selected' : '' }}>Staff</option>
                                        <option value="Admin"
                                            {{ isset($user) && $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label for="tiktok_username" class="form-label">TikTok Username</label>
                                    <input type="text" value="{{ $user->tiktok_username ?? '' }}" name="tiktok_username"
                                        class="form-control" id="tiktok_username" placeholder="TikTok Username">
                                </div>

                                <div class="col-md-12">
                                    <label for="tiktok_profile_link" class="form-label">TikTok Profile Link</label>
                                    <input type="url" value="{{ $user->tiktok_profile_link ?? '' }}"
                                        name="tiktok_profile_link" class="form-control" id="tiktok_profile_link"
                                        placeholder="TikTok Profile Link">
                                </div>

                                

                                <div class="col-md-12">
                                    <label for="ic_number" class="form-label">IC Number</label>
                                    <input type="text" value="{{ $user->ic_number ?? '' }}" name="ic_number"
                                        class="form-control" id="ic_number" placeholder="IC Number">
                                </div>

                                <div class="col-md-12">
                                    <label for="bank_name" class="form-label">Bank Name</label>
                                    <input type="text" value="{{ $user->bank_name ?? '' }}" name="bank_name"
                                        class="form-control" id="bank_name" placeholder="Bank Name">
                                </div>

                                <div class="col-md-12">
                                    <label for="cardholder_name" class="form-label">Cardholder Name</label>
                                    <input type="text" value="{{ $user->cardholder_name ?? '' }}"
                                        name="cardholder_name" class="form-control" id="cardholder_name"
                                        placeholder="Cardholder Name">
                                </div>

                                <div class="col-md-12">
                                    <label for="bank_account_number" class="form-label">Bank Account Number</label>
                                    <input type="text" value="{{ $user->bank_account_number ?? '' }}"
                                        name="bank_account_number" class="form-control" id="bank_account_number"
                                        placeholder="Bank Account Number">
                                </div>

                                <div class="col-md-12">
                                    <label for="is_approved" class="form-label">Approval Status</label>
                                    <select name="is_approved" class="form-control" id="is_approved" required disabled>
                                        <option value="1" {{ isset($user) && $user->is_approved ? 'selected' : '' }}>
                                            Approved</option>
                                        <option value="0"
                                            {{ isset($user) && !$user->is_approved ? 'selected' : '' }}>Pending</option>
                                    </select>
                                </div>





                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-primary px-4">Save</button>
                                        {{-- <button type="button" class="btn btn-light px-4">Reset</button> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="card rounded-4">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-3">
                                <div class="">
                                    <h5 class="mb-0 fw-bold">About</h5>
                                </div>

                            </div>
                            <div class="full-info">
                                <div class="info-list d-flex flex-column gap-3">
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">account_circle</span>
                                        <p class="mb-0">Full Name: {{ $user->name }}</p>
                                    </div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">done</span>
                                        <p class="mb-0">Status: active</p>
                                    </div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">code</span>
                                        <p class="mb-0">Role: {{ $user->role }}</p>
                                    </div>
                                    {{-- <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">flag</span>
                                        <p class="mb-0">Country: {{ $user->country ?? 'No Details' }}</p>
                                    </div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">language</span>
                                        <p class="mb-0">Language: {{ $user->language ?? 'No Details' }}</p>
                                    </div> --}}
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">send</span>
                                        <p class="mb-0">Email: {{ $user->email }}</p>
                                    </div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">call</span>
                                        <p class="mb-0">Phone: {{ $user->phone ?? 'No Details' }}</p>
                                    </div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">home</span>
                                        <p class="mb-0">Address: {{ $user->address ?? 'No Details' }}</p>
                                    </div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">tiktok</span>
                                        <p class="mb-0">TikTok Username: {{ $user->tiktok_username ?? 'No Details' }}
                                        </p>
                                    </div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">link</span>
                                        <p class="mb-0">TikTok Profile Link: <a
                                                href="{{ $user->tiktok_profile_link ?? '#' }}"
                                                target="_blank">{{ $user->tiktok_profile_link ?? 'No Details' }}</a></p>
                                    </div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">credit_card</span>
                                        <p class="mb-0">IC Number: {{ $user->ic_number ?? 'No Details' }}</p>
                                    </div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">account_balance</span>
                                        <p class="mb-0">Bank Name: {{ $user->bank_name ?? 'No Details' }}</p>
                                    </div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">person</span>
                                        <p class="mb-0">Cardholder Name: {{ $user->cardholder_name ?? 'No Details' }}
                                        </p>
                                    </div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">account_balance</span>
                                        <p class="mb-0">Bank Account Number:
                                            {{ $user->bank_account_number ?? 'No Details' }}</p>
                                    </div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">verified</span>
                                        <p class="mb-0">Approval Status:
                                            {{ $user->is_approved ? 'Approved' : 'Pending' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card rounded-4">
                                <div class="card-body">
                                    <div class="d-flex align-items-start justify-content-between mb-3">
                                        <div class="">
                                            <h5 class="mb-0 fw-bold">Accounts</h5>
                                        </div>
                                        <div class="dropdown">
                                            <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                                                data-bs-toggle="dropdown">
                                                <span class="material-icons-outlined fs-5">more_vert</span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                                <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                                <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="account-list d-flex flex-column gap-4">
                                        <div class="account-list-item d-flex align-items-center gap-3">
                                            <img src="assets/images/apps/05.png" width="35" alt="">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">Google</h6>
                                                <p class="mb-0">Events and Reserch</p>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </div>
                                        <div class="account-list-item d-flex align-items-center gap-3">
                                            <img src="assets/images/apps/02.png" width="35" alt="">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">Skype</h6>
                                                <p class="mb-0">Events and Reserch</p>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </div>
                                        <div class="account-list-item d-flex align-items-center gap-3">
                                            <img src="assets/images/apps/03.png" width="35" alt="">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">Slack</h6>
                                                <p class="mb-0">Communication</p>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </div>
                                        <div class="account-list-item d-flex align-items-center gap-3">
                                            <img src="assets/images/apps/06.png" width="35" alt="">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">Instagram</h6>
                                                <p class="mb-0">Social Network</p>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </div>
                                        <div class="account-list-item d-flex align-items-center gap-3">
                                            <img src="assets/images/apps/17.png" width="35" alt="">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">Facebook</h6>
                                                <p class="mb-0">Social Network</p>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </div>
                                        <div class="account-list-item d-flex align-items-center gap-3">
                                            <img src="assets/images/apps/11.png" width="35" alt="">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">Paypal</h6>
                                                <p class="mb-0">Social Network</p>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div> -->

                </div>
            </div><!--end row-->



        </div>
    </main>
    <!--end main wrapper-->


@endsection
