@extends('layouts.custom-master1')

@section('styles')

@endsection

@section('content')

<!-- CONTAINER OPEN -->
<div class="container-lg">
    <div class="row justify-content-center mt-4 mx-0">
        <div class="col-xl-4 col-lg-6">
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="card shadow-none">
                    <div class="card-body p-sm-6">
                        <div class="text-center mb-4">
                            <h4 class="mb-1">Sign In</h4>
                            <p>Sign in to your account to continue.</p>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="mb-2 fw-500">Email<span class="text-danger ms-1">*</span></label>
                                    <input class="form-control ms-0" name="email" type="email"
                                        placeholder="Enter your Email"
                                        pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="mb-2 fw-500">Password<span class="text-danger ms-1">*</span></label>
                                    <div>
                                        <input type="password" name="password" class="form-control" id="input-password"
                                            placeholder="Password" required maxlength="36">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="d-flex mb-3">
                                    <div class="ms-auto">
                                        <a href="{{ url('forgot-password') }}" class="tx-primary ms-1 tx-13">Forgot
                                            Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="d-grid mb-3">
                                    <button class="btn btn-primary" type="submit">Login</button>
                                </div>
                                <div class="text-center">
                                    <p class="mb-0 tx-14">Don't have an account yet?
                                        <a href="{{url('registration')}}"
                                            class="tx-primary ms-1 text-decoration-underline">Sign Up</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- CONTAINER CLOSED -->

@endsection

@section('scripts')



@endsection