<!DOCTYPE html>
<html lang="en">

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

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

</style>

<body class="loading" data-layout="detached"
    data-layout-config='{"layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
</body>

<!-- Topbar Start -->
<div class="loader" id="loader" style="display: none;"></div>

<div class="navbar-custom topnav-navbar">
    <div class="container-fluid">
        @include('components.public_navbar')
    </div>
</div>

<div class="container-fluid">

    <!-- Begin page -->
    <div class="wrapper">

        <div class="content-page">
            <div class="content">
                <div class="row">
                    @yield('public_content')
                </div>
                <!-- end row -->                
            </div> <!-- End Content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            {{date('Y')}} © Wee-Recruitment
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div> 
        <!-- content-page -->

    </div> <!-- end wrapper-->
</div>
<!-- end Topbar -->

<!-- /End-bar -->


<!-- bundle -->
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
<script src="{{asset('assets/js/vendor.min.js')}}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>

<!-- third party js -->
{{-- <script src="assets/js/vendor/apexcharts.min.js"></script>
<script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script> --}}
<!-- third party js ends -->

<!-- demo app -->
{{-- <script src="assets/js/pages/demo.dashboard.js"></script> --}}
<!-- end demo js-->

</html>