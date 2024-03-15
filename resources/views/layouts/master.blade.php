<!doctype html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" loader="disable">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="CertWizard Admin & Dashboard Template">
    <meta name="author" content="CertWizard Private Limited">
    <meta name="keywords"
        content="admin panel template, admin dashboard template, admin panel, bootstrap admin template, dashboard, laravel, bootstrap dashboard, admin dashboard, admin panel laravel template, laravel framework, admin laravel, laravel admin panel.">

    <title>CertWizard Admin &amp; Dashboard Template </title>
    <link rel="icon" href="{{asset('build/assets/images/brand/favicon.ico')}}" type="image/x-icon">
    <link href="{{asset('build/assets/iconfonts/icons.css')}}" rel="stylesheet">
    <script src="{{asset('build/assets/main.js')}}"></script>
    @include('layouts.components.styles')
    @vite(['resources/sass/app.scss' ])
    @yield('styles')

</head>

<body class="app sidebar-mini">
    <div id="loader">
        <img src="{{asset('build/assets/images/loader.svg')}}" class="loader-img" alt="Loader">
    </div>
    <!-- PAGE -->
    <div class="page">
        <div class="page-main">
            <!-- Main-Header -->
            @include('layouts.components.main-header')
            @include('layouts.components.main-sidebar')
            <div class="main-content app-content mt-0">
                @yield('content')
            </div>
        </div>
        <!-- Footer opened -->
        @include('layouts.components.footer')
        <!-- End Footer -->
        @yield('modals')
    </div>
    <!-- END PAGE-->
    @include('layouts.components.scripts')
    <!-- Sticky JS -->
    <script src="{{asset('build/assets/sticky.js')}}"></script>

    <!-- APP JS-->
    @vite('resources/js/app.js')
    <!-- END SCRIPTS -->

</body>

</html>