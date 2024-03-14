<!doctype html>
<style>
.login-img {
    display: block !important;
}
</style>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="CertWizard Admin & Dashboard Template">
    <meta name="author" content="CertWizard Private Limited">
    <meta name="keywords"
        content="admin panel template, admin dashboard template, admin panel, bootstrap admin template, dashboard, laravel, bootstrap dashboard, admin dashboard, admin panel laravel template, laravel framework, admin laravel, laravel admin panel.">
    <title>CertWizard Admin &amp; Dashboard Template </title>
    @vite('resources/assets/js/authentication-main.js')
    <link rel="icon" href="{{asset('build/assets/images/brand/favicon.ico')}}" type="image/x-icon">
    <link href="{{asset('build/assets/iconfonts/icons.css')}}" rel="stylesheet">
    <link id="style" href="{{asset('build/assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    @vite(['resources/css/app.css' , 'resources/sass/app.scss'])
    @yield('styles')

</head>

<body class="app sidebar-mini ltr login-img">
    <div>
        <div class="page">

            @yield('content')

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{asset('build/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    @yield('scripts')

    <!-- Custom-Switcher JS -->
    @vite('resources/assets/js/custom-switcher.js')

</body>

</html>