<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- third party css -->
    {{-- <link href="{{asset('assets/css/vendor/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css"> --}}
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style">
    {{-- <link href="{{asset('assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style"> --}}

    <!-- third party css -->
    <link href="{{asset('assets/css/vendor/dataTables.bootstrap5.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/vendor/responsive.bootstrap5.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/vendor/buttons.bootstrap5.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/vendor/select.bootstrap5.css')}}" rel="stylesheet" type="text/css">
    <!-- third party css end -->
    @yield('css')
</head>

<style>
    .loader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url("{{ asset('img/3.gif') }}") 50% 50% no-repeat white;
        opacity: .8;
        background-size: 120px 120px;
    } 

    .wizard-pane {
        max-height: 500px;
        overflow-y: auto;
        overflow-x: hidden;
    }
</style>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": false}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        @include('components.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="loader" id="loader" style="display: none;"></div>
            <div class="content">
                <!-- Topbar Start -->
                @include('components.navbar')
                <!-- end Topbar -->
                
                <!-- Start Content-->
                <div class="container-fluid mt-3">
                    @yield('content')
                </div>
                <!-- container -->

            </div>
            <!-- content -->

            <!-- Footer Start -->
            {{-- <footer class="footer bg-white">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>document.write(new Date().getFullYear())</script> © Hyper - Coderthemes.com
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer> --}}
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->
    @include('sweetalert::alert')

    <script>
        function show()
        {
            document.getElementById('loader').style.display = 'block';
        }
        
        function logout() {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        }
    </script>
    <!-- bundle -->
    <script src="{{asset('assets/js/vendor.min.js')}}"></script>
    <script src="{{asset('assets/js/app.min.js')}}"></script>
    <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>

    <!-- third party js -->
    <script src="{{asset('assets/js/vendor/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.select.min.js')}}"></script>
    <!-- third party js ends -->

    <script src="{{asset('assets/js/pages/demo.datatable-init.js')}}"></script>
    {{-- <script>
        $(document).ready(function() {
            $('.modal').on('shown.bs.modal', function () {
                $(this).find('select').select2({
                    dropdownParent: $(this)
                });
            });
        });
    </script> --}}

    <!-- third party js -->
    {{-- <script src="assets/js/vendor/apexcharts.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script> --}}
    <!-- third party js ends -->

    <!-- demo app -->
    {{-- <script src="assets/js/pages/demo.dashboard.js"></script> --}}
    <!-- end demo js-->

    
    @yield('js')

</body>
</html>
