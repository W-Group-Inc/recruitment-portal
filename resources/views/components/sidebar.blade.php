<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{url('home')}}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{asset('img/wgroup1.png')}}" alt="" height="100">
        </span>
        <span class="logo-sm">
            <img src="{{asset('img/wgroup1.png')}}" alt="" height="45">
        </span>
    </a>
    <hr class="bg-white mt-3">
    <!-- LOGO -->
    {{-- <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a> --}}

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

            @if(auth()->user()->role != 'Head Business Unit')
            <li class="side-nav-title side-nav-item">Home</li>

            <li class="side-nav-item">
                <a href="{{url('home')}}" class="side-nav-link" onclick="show()">
                    <i class="uil-home"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            @endif

            @if(auth()->user()->role == "Administrator")
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
                <a href="{{url('user')}}" class="side-nav-link" onclick="show()">
                    <i class="uil-user"></i>
                    <span> Users </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Settings</li>

            <li class="side-nav-item">
                <a href="{{url('company')}}" class="side-nav-link" onclick="show()">
                    <i class="uil-building"></i>
                    <span> Company </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{url('department')}}" class="side-nav-link" onclick="show()">
                    <i class=" uil-sitemap"></i>
                    <span> Department </span>
                </a>
            </li>
            @endif

            @if(auth()->user()->role == "Department Head" || auth()->user()->role == "Human Resources" || auth()->user()->role == "Human Resources Manager" || auth()->user()->role == "Head Business Unit")
            <li class="side-nav-title side-nav-item">MRF</li>
            
            @if(auth()->user()->role == "Human Resources" || auth()->user()->role == "Human Resources Manager") 
            {{-- <li class="side-nav-item">
                <a href="{{url('for-approval')}}" class="side-nav-link" onclick="show()">
                    <i class=" uil-check"></i>
                    <span>MRF For Approval</span>
                    
                    @if(auth()->user()->role == 'Human Resources Manager')
                        @php
                            $total_count = countMrfForApproval(auth()->user()->id);
                        @endphp
                        @if($total_count > 0)
                        <span class="ms-2 translate-middle badge rounded-pill bg-danger">
                            {{$total_count}}
                        </span>
                        @endif
                    @endif
                </a>
            </li> --}}

            {{-- <li class="side-nav-item">
                <a href="{{url('approved-mrf')}}" class="side-nav-link" onclick="show()">
                    <i class=" uil-thumbs-up"></i>
                    <span>Approved MRF</span>
                </a>
            </li> --}}

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#mrfMenuList" aria-expanded="false" aria-controls="mrfMenuList" class="side-nav-link">
                    <i class=" dripicons-menu"></i>
                    <span> MRF Menu </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="mrfMenuList">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{url('for-approval')}}" onclick="show()">
                                <span>For Approval</span>
                                
                                @if(auth()->user()->role == 'Human Resources Manager')
                                    @php
                                        $total_count = countMrfForApproval(auth()->user()->id);
                                    @endphp
                                    @if($total_count > 0)
                                    <span class="ms-2 translate-middle badge rounded-pill bg-danger">
                                        {{$total_count}}
                                    </span>
                                    @endif
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="{{url('approved-mrf')}}" onclick="show()">
                                <span>Approved</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('cancelled-mrf')}}" onclick="show()">
                                <span>Cancelled</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('rejected-mrf')}}" onclick="show()">
                                <span>Rejected</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('onhold-mrf')}}" onclick="show()">
                                <span>On Hold</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('served-mrf')}}" onclick="show()">
                                <span>Served</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="{{url('assigned-mrf')}}" class="side-nav-link" onclick="show()">
                    <i class=" uil-user"></i>
                    <span> Assigned To Me </span>
                </a>
            </li>
            @endif

            <li class="side-nav-item">
                <a href="{{url('mrf')}}" class="side-nav-link" onclick="show()">
                    @if(auth()->user()->role == "Department Head")
                    <i class="uil-file"></i>
                    <span> MRF</span>
                    @elseif(auth()->user()->role == "Human Resources" || auth()->user()->role == "Human Resources Manager" || auth()->user()->role == "Head Business Unit")
                    <i class="uil-file"></i>
                    <span>MRF</span>
                    @endif
                </a>
            </li>
            @endif

            @if(auth()->user()->role == "Human Resources" || auth()->user()->role == "Department Head" || auth()->user()->role == "Human Resources Manager" || auth()->user()->role == "Head Business Unit")
            <li class="side-nav-title side-nav-item">Applicant</li>

            <li class="side-nav-item">
                <a href="{{url('applicant')}}" class="side-nav-link" onclick="show()">
                    <i class=" uil-user"></i>
                    <span>Applicant</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{url('for-interview')}}" class="side-nav-link" onclick="show()">
                    <i class="uil-folder"></i>
                    <span>For Interview</span>
                    @php
                        $total_count = countForInterview(auth()->user()->id);
                    @endphp
                    @if($total_count > 0)
                    <span class="ms-1 translate-middle badge rounded-pill bg-danger">
                        {{$total_count}}
                        <span class="visually-hidden">unread messages</span>
                    </span>
                    @endif
                </a>
            </li>

            @if(auth()->user()->role == 'Human Resources' || auth()->user()->role == "Human Resources Manager")
            <li class="side-nav-item">
                <a href="{{url('document')}}" class="side-nav-link" onclick="show()">
                    <i class=" uil-file"></i>
                    <span>Document</span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{url('job-position')}}" class="side-nav-link" onclick="show()">
                    <i class="uil-briefcase-alt"></i>
                    <span>Job Position</span>
                </a>
            </li>
            @endif

            @endif

            @if(auth()->user()->role == 'Applicant' && auth()->user()->is_login == 1)
            <li class="side-nav-title side-nav-item">Applicant</li>

            <li class="side-nav-item">
                <a href="{{url('job-application')}}" class="side-nav-link" onclick="show()">
                    <i class=" uil-user"></i>
                    <span>Job Application</span>
                </a>
            </li>
            
                @if(checkIfApplicantPass(auth()->user()->id))
                    <li class="side-nav-item">
                        <a href="{{url('applicant-documents')}}" class="side-nav-link" onclick="show()">
                            <i class=" uil-upload"></i>
                            <span>Applicant Documents</span>
                        </a>
                    </li>
                @endif
            @endif
        </ul>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>