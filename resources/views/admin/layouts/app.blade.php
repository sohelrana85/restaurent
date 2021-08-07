<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('admin')}}/assets/images/favicon.ico">
    {{-- Toastr --}}
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/assets/libs/toastr/build/toastr.min.css">
    <!-- Bootstrap Css -->
    <link href="{{asset('admin')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Fontawesome Css -->
    <link href="{{asset('admin')}}/assets/css/fontawesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('admin')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('admin')}}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    @stack('css')
    <!-- Custom Css-->
    <link href="{{asset('admin')}}/assets/css/custom.css" rel="stylesheet" type="text/css" />
</head>

<body data-sidebar="dark">
    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('admin.layouts.partials.header')
        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                @include('admin.layouts.partials.sidemenu')
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">{{ $title}}</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li> --}}
                                        {{-- <li class="breadcrumb-item active">{{ $title}}</li> --}}
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
                @yield('content')
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('admin.layouts.partials.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    <!-- JAVASCRIPT -->
    <script src="{{asset('admin')}}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{asset('admin')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('admin')}}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{asset('admin')}}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{asset('admin')}}/assets/libs/node-waves/waves.min.js"></script>
    <!-- toastr plugin -->
    <script src="{{asset('admin')}}/assets/libs/toastr/build/toastr.min.js"></script>

    <!-- toastr init -->
    <script src="{{asset('admin')}}/assets/js/pages/toastr.init.js"></script>
    <!-- apexcharts -->
    {{-- <script src="{{asset('admin')}}/assets/libs/apexcharts/apexcharts.min.js"></script> --}}

    <!-- dashboard init -->
    {{-- <script src="{{asset('admin')}}/assets/js/pages/dashboard.init.js"></script> --}}

    @stack('js')
    <!-- App js -->
    <script src="{{asset('admin')}}/assets/js/app.js"></script>
</body>
</html>
