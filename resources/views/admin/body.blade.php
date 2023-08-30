<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Favicons -->
    <link href="/assets/perpus/assets/img/perpus.png" rel="icon">
    <link href="/assets/perpus/assets/img/perpus.png" rel="apple-touch-icon">
    
    @yield('csrf-ajax')
    @yield('seo')
    <!-- Meta -->
    {{-- <meta name="keywords" content="">
    <meta name="description" content="Free shipping">
    <meta name="google" content="nositelinkssearchbox">
    <meta name="google-site-verification" content="9vpzZueNucS8hPqoGpZ5r10Nr2_sLMRG3AnDtNlucc4">
    <link rel="canonical" href="https://www.event-kita.com/"> --}}
    <!-- OpenGraph Meta -->
    {{-- <meta property="og:image"
        content="http://g-ec2.images-amazon.com/images/G/01/social/api-share/amazon_logo_500500._V323939215_.png"
        xmlns:og="http://opengraphprotocol.org/schema/">
    <meta property="og:description" content=""> --}}
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    {{-- Add - On --}}
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/assets/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/assets/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/assets/adminlte/plugins/sweetalert2/sweetalert2.min.css">
    @yield('ext-css')
    <title>@yield('title')</title>
</head>

<body class="sidebar-mini layout-fixed layout-navbar-fixed">

    <div class="wrapper">
        <!-- Preloader -->
        @if(request()->segment(count(request()->segments())) !== 'admin')
        @else
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/assets/perpus/assets/img/logo-perpus.png" alt="" height="60" width="250">
        </div>
        @endif

        @include('/admin/top')
        @include('/admin/nav')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('container')
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                Perpus Admin <b>Version</b> 1.1
            </div>
            <strong>Copyright &copy; 2022 <a href="#">PT Indo Mega Vision</a>.</strong> All rights reserved.
        </footer>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery 3.6.0 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Boostrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE Add-On -->
    <script src="/assets/adminlte/dist/js/adminlte.min.js"></script>
    <script src="/assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="/assets/adminlte/plugins/overlayScrollbars/js/OverlayScrollbars.min.js"></script>
    <!-- Add-Ons -->
    @yield('ext-script')
</body>

</html>
