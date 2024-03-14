@extends('layouts.custom-master1')

@section('styles')
@endsection

@section('content')
    <div class="container-lg">
        <div class="row justify-content-center mt-4 mx-0">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                <div class="card shadow-none">
                    <div class="card-body p-sm-6">
                        <div class="text-center mb-4">
                            <h4 class="mb-1">Forgot Password?</h4>
                        </div>
                        <form action="{{ url('update-password') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2 fw-500">Email<span class="text-danger ms-1">*</span></label>
                                        <input class="form-control ms-0" type="email" name="email" id="email"
                                            placeholder="Enter your email" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2 fw-500">Password<span class="text-danger ms-1">*</span></label>
                                        <input class="form-control ms-0" type="password" name="password" id="password"
                                            placeholder="Enter your new password" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2 fw-500">New Password<span
                                                class="text-danger ms-1">*</span></label>
                                        <input class="form-control ms-0" type="password" id="newPassword"
                                            name="newPasswords" placeholder="Enter your new password" required>
                                        <span id="passwordError" style="display: none; color: red;">Passwords do not
                                            match</span>

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2 fw-500">Confirm Password<span
                                                class="text-danger ms-1">*</span></label>
                                        <input class="form-control ms-0" type="password" id="confirmPassword"
                                            name="password_confirmation" placeholder="Confirm your new password" required>
                                        <span id="passwordError" style="display: none; color: red;">Passwords do not
                                            match</span>

                                    </div>
                                </div>
                                <div class="col-xl-12">

                                    <div class="text-center d-flex justify-content-center">
                                        <button type="button" class="btn btn-primary" style="margin-right: 10px;">
                                            <a href="{{ url('login') }}" style="-webkit-text-fill-color: white;">Cancel</a>
                                        </button>

                                        <button type="submit" class="btn btn-primary">Update</button>

                                    </div> <br>
                                    <p class="mb-0 tx-14" style="text-align: center;">Remembered your
                                        password?
                                        <a href="{{ url('login') }}" class="tx-primary ms-1 text-decoration-underline">Sign
                                            In</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('confirmPassword').addEventListener('input', function() {
            var newPassword = document.getElementById('newPassword').value;
            var confirmPassword = this.value;
            var errorSpan = document.getElementById('passwordError');
            if (newPassword !== confirmPassword) {
                errorSpan.style.display = 'block';
            } else {
                errorSpan.style.display = 'none';
            }
        });
        document.getElementById('newPassword').addEventListener('input', function() {
            var confirmPassword = document.getElementById('confirmPassword').value;
            var newPassword = this.value;
            var errorSpan = document.getElementById('passwordError');
            if (newPassword !== confirmPassword) {
                errorSpan.style.display = 'block';
            } else {
                errorSpan.style.display = 'none';
            }
        });
    </script>
@endsection
