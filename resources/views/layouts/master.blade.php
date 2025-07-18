<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashbaord</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href={{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}>
    <link rel="stylesheet" href={{ asset('assets/vendors/css/vendor.bundle.base.css') }}>
    <link rel="stylesheet" href={{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href={{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}>
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href={{ asset('assets/css/style.css') }}>
    <link rel="stylesheet" href={{ asset('css/admin.css') }}>
    <!-- End layout styles -->
    <link rel="shortcut icon" href={{ asset('assets/images/favicon.png') }} />
</head>

<body>
    <div class="container-scroller">
        {{-- <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates,
                                and more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/"
                                target="_blank" class="btn me-2 buy-now-btn border-0">Buy Now</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/"><i
                                class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white mr-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <a class="navbar-brand brand-logo" href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('images/autoparts-pro.png') }}" alt="logo" style="height: auto; width: auto;" />
                </a>
                <a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" style="height: 30px;" />
                </a>
            </div>
            @include('layouts.navbar')
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('layouts.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    {{-- <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023
                                <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights
                                reserved.</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                                with <i class="mdi mdi-heart text-danger"></i></span>
                        </div>
                    </footer> --}}
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- Vendor JS -->
        <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
        <!-- Plugin JS for this page -->
        <script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>
        <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
        <!-- Core JS -->
        <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
        <script src="{{ asset('assets/js/misc.js') }}"></script>
        <script src="{{ asset('assets/js/settings.js') }}"></script>
        <script src="{{ asset('assets/js/todolist.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.cookie.js') }}"></script>
        <!-- Custom JS for this page -->
        <script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>

</html>