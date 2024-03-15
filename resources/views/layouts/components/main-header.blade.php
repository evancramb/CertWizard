<header class="app-header header sticky">
    <!-- Start::main-header-container -->
    <div class="main-header-container container-fluid">

        <!-- Start::header-content-left -->
        <div class="header-content-left align-items-center">
            <div class="header-element">
                <div class="horizontal-logo">
                </div>
            </div>
        </div>
        <div class="header-content-right">
            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
            </button>
            <div class="navbar navbar-collapse responsive-navbar p-0">
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <div class="d-flex align-items-center">
                        <!-- Start::header-element|main-profile-user -->
                        <div class="header-element main-profile-user">
                            <!-- Start::header-link|dropdown-toggle -->
                            <a href="javascript:void(0);" class="header-link dropdown-toggle d-flex align-items-center"
                                id="mainHeaderProfile" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="me-2">
                                    <img src="{{asset('build/assets/images/users/21.jpg')}}" alt="img" width="30"
                                        height="30" class="rounded-circle">
                                </span>
                                <div class="d-xl-block d-none lh-1">
                                    <h6 class="fs-13 font-weight-semibold mb-0">Admin</h6>
                                </div>
                            </a>
                            <!-- End::header-link|dropdown-toggle -->
                            <ul class="dropdown-menu pt-0 overflow-hidden dropdown-menu-end mt-1"
                                aria-labelledby="mainHeaderProfile">
                                <li><a class="dropdown-item" href="{{url('dashboard')}}"><i
                                            class="ti ti-inbox fs-18 me-2 op-7"></i>Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{url('logout')}}"><i
                                            class="ti ti-power fs-18 me-2 op-7"></i>Sign Out</a></li>
                                <li>
                                    <hr class="dropdown-divider my-0">
                                </li>
                            </ul>
                        </div>
                        <!-- End::header-element|main-profile-user -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End::header-content-right -->
    </div>
    <!-- End::main-header-container -->

</header>