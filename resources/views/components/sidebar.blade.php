<div class="leftside-menu">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Home</li>

            <li class="side-nav-item">
                <a href="{{url('home')}}" class="side-nav-link">
                    <i class="uil-home"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            {{-- <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                    <i class="uil-envelope"></i>
                    <span> Email </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="apps-email-inbox.html">Inbox</a>
                        </li>
                        <li>
                            <a href="apps-email-read.html">Read Email</a>
                        </li>
                    </ul>
                </div>
            </li> --}}

            <li class="side-nav-title side-nav-item">User Management</li>

            <li class="side-nav-item">
                <a href="{{url('user')}}" class="side-nav-link">
                    <i class="uil-user"></i>
                    <span> Users </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Settings</li>

            <li class="side-nav-item">
                <a href="{{url('company')}}" class="side-nav-link">
                    <i class="uil-building"></i>
                    <span> Company </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{url('department')}}" class="side-nav-link">
                    <i class=" uil-sitemap"></i>
                    <span> Department </span>
                </a>
            </li>
        </ul>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>