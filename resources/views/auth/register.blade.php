@extends('layout.app')

@section('title', 'Register')

@section('content')
<div class="section-authentication-cover">
    <div class="">
        <div class="row g-0">
            <div
                class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex border-end bg-transparent">
                <div class="card rounded-0 mb-0 border-0 shadow-none bg-transparent bg-none">
                    <div class="card-body">
                        <img src="{{ asset('assets/images/auth/register1.png') }}" class="img-fluid auth-img-cover-login" width="650"
                            alt="">
                    </div>
                </div>
            </div>

            <div
                class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center border-top border-4 border-primary border-gradient-1">
                <div class="card rounded-0 m-3 mb-0 border-0 shadow-none bg-none">
                    <div class="card-body p-sm-5">
                        {{-- <img src="assets/images/logo1.png" class="mb-4" width="145" alt=""> --}}
                        <h1>FerryRich</h1>
                        <h4 class="fw-bold">Join the Community</h4>
                        <p class="mb-0">Create an account to start your journey.</p>

                        <div class="form-body mt-4">
                            <form class="row g-3" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="col-12">
                                    <label for="inputName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="inputName" name="name"
                                        placeholder="Your Name" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="inputEmailAddress" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputEmailAddress" name="email"
                                        placeholder="jhon@example.com" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputChoosePassword" class="form-label">Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" class="form-control" id="inputChoosePassword"
                                            name="password" placeholder="Enter Password" required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                class="bi bi-eye-slash-fill"></i></a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" class="form-control" id="inputConfirmPassword"
                                            name="password_confirmation" placeholder="Confirm Password" required>
                                        <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                class="bi bi-eye-slash-fill"></i></a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-grd-primary">Register</button>
                                    </div>
                                </div>
                               
                                <div class="col-12">
                                    <div class="text-start">
                                        <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>

<!--plugins-->
<script src="assets/js/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bi-eye-slash-fill");
                $('#show_hide_password i').removeClass("bi-eye-fill");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bi-eye-slash-fill");
                $('#show_hide_password i').addClass("bi-eye-fill");
            }
        });
    });
</script>
@endsection