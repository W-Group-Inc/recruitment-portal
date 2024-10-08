@extends('layouts.app');

@section('css')
<link rel="stylesheet" href="{{asset('css/component-chosen.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mx-auto" >
            <div class="card-body" >

                <h4 class="header-title mb-3">Job Application Form</h4>

                <form method="POST" action="{{url('submit-ja')}}" onsubmit="show()">
                    @csrf

                    <div id="progressbarwizard">

                        <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                            <li class="nav-item">
                                <a href="#source" data-bs-toggle="tab" data-toggle="tab"
                                    class="nav-link rounded-0 pt-2 pb-2">
                                    {{-- <i class="mdi mdi-account-circle me-1"></i> --}}
                                    <span class="d-none d-sm-inline">Source & Position Applied</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#personal_data" data-bs-toggle="tab" data-toggle="tab"
                                    class="nav-link rounded-0 pt-2 pb-2">
                                    {{-- <i class="mdi mdi-face-profile me-1"></i> --}}
                                    <span class="d-none d-sm-inline">Personal Data</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#familyBackground" data-bs-toggle="tab" data-toggle="tab"
                                    class="nav-link rounded-0 pt-2 pb-2">
                                    {{-- <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i> --}}
                                    <span class="d-none d-sm-inline">Family Background</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#educationalBackground" data-bs-toggle="tab" data-toggle="tab"
                                    class="nav-link rounded-0 pt-2 pb-2">
                                    {{-- <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i> --}}
                                    <span class="d-none d-sm-inline">Educational Background</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#examination" data-bs-toggle="tab" data-toggle="tab"
                                    class="nav-link rounded-0 pt-2 pb-2">
                                    {{-- <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i> --}}
                                    <span class="d-none d-sm-inline">Examination Undertaken</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#workExperience" data-bs-toggle="tab" data-toggle="tab"
                                    class="nav-link rounded-0 pt-2 pb-2">
                                    {{-- <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i> --}}
                                    <span class="d-none d-sm-inline">Work Experiences</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content b-0 mb-0" >

                            <div id="bar" class="progress mb-3" style="height: 7px;">
                                <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success">
                                </div>
                            </div>

                            <div class="tab-pane" id="source">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Company
                                        <input type="hidden" name="company_id" value="{{auth()->user()->company_id}}">
                                        <input type="text" name="" class="form-control form-control-sm"
                                            value="{{auth()->user()->company->name}}" readonly>
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Source
                                        <select name="source" id="" class="form-control cat required">
                                            <option value="">- Source -</option>
                                            <option value="1" @if(optional($applicant->jobApplication)->source == 1) selected @endif>Walk In</option>
                                            <option value="2" @if(optional($applicant->jobApplication)->source == 2) selected @endif>PESO</option>
                                            <option value="3" @if(optional($applicant->jobApplication)->source == 3) selected @endif>Advertisement</option>
                                            <option value="4" @if(optional($applicant->jobApplication)->source == 4) selected @endif>Job Fair</option>
                                            <option value="5" @if(optional($applicant->jobApplication)->source == 5) selected @endif>Online Application</option>
                                            <option value="6" @if(optional($applicant->jobApplication)->source == 6) selected @endif>Employee Referral</option>
                                        </select>
                                    </div> 
                                    <div class="col-lg-3 col-md-12">
                                        Position
                                        <input type="text" name="position" class="form-control form-control-sm" value="{{auth()->user()->applicant->mrf->position_title}}" readonly>
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Minimum Expected Salary
                                        <input type="text" name="minimum_expected_salary" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->minimum_expected_salary}}" data-toggle="input-mask" data-mask-format="000.000.000.000.000,00" data-reverse="true">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Date Available for Employment
                                        
                                        <input type="date" name="date_available_for_employment" value="{{date('Y-m-d', strtotime(optional($applicant->jobApplication)->date_available_for_employment))}}" class="form-control form-control-sm required" >
                                    </div> 
                                </div> 
                            </div>

                            <div class="tab-pane" id="personal_data">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12">
                                        Lastname
                                        <input type="text" name="lastname" class="form-control form-control-sm required" @if($applicant->jobApplication != null) value="{{optional($applicant->jobApplication)->lastname}}" readonly @endif>
                                    </div> 
                                    <div class="col-lg-3 col-md-12">
                                        Firstname
                                        <input type="text" name="firstname" class="form-control form-control-sm required" @if($applicant->jobApplication != null) value="{{optional($applicant->jobApplication)->firstname}}" readonly @endif>
                                    </div> 
                                    <div class="col-lg-3 col-md-12">
                                        Middlename
                                        <input type="text" name="middlename" class="form-control form-control-sm required" @if($applicant->jobApplication != null) value="{{optional($applicant->jobApplication)->middlename}}" readonly @endif>
                                    </div> 
                                    <div class="col-lg-12">
                                        <h5 class="header-title mt-2">Present Address</h5>
                                    </div>
                                    <div class="col-lg-2">
                                        House No./Bldg No.
                                        <input type="text" name="present_house_no" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->present_house_no}}">
                                    </div>
                                    <div class="col-lg-3">
                                        Street 
                                        <input type="text" name="present_street_name" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->present_street_name}}">
                                    </div>
                                    <div class="col-lg-3">
                                        Barangay
                                        <input type="text" name="present_barangay" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->present_barangay}}">
                                    </div>
                                    <div class="col-lg-4">
                                        Municipality
                                        <input type="text" name="present_municipality" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->present_municipality}}">
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="checkbox" name="same_as" id="same_as">
                                        <small><i>Same as present address</i></small>
                                    </div>
                                    <div class="col-lg-12">
                                        <h5 class="header-title mt-2">Permanent Address</h5>
                                    </div>
                                    <div class="col-lg-2">
                                        House No./Bldg No.
                                        <input type="text" name="permanent_house_no" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->permanent_house_no}}">
                                    </div>
                                    <div class="col-lg-3">
                                        Street 
                                        <input type="text" name="permanent_street_name" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->permanent_house_no}}">
                                    </div>
                                    <div class="col-lg-3">
                                        Barangay
                                        <input type="text" name="permanent_barangay" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->permanent_house_no}}">
                                    </div>
                                    <div class="col-lg-4">
                                        Municipality
                                        <input type="text" name="permanent_municipality" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->permanent_house_no}}">
                                    </div>
                                </div> 
                            </div>

                            <div class="tab-pane wizard-pane" id="familyBackground">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">Father Information</h5>
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Name
                                        <input type="text" name="father_name" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->father_name}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Occupation
                                        <input type="text" name="father_occupation" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->father_occupation}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Company Location
                                        <input type="text" name="father_company_location" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->father_company_location}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Contact No
                                        <input type="text" name="father_contact_no" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->father_contact_no}}">
                                    </div> 
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">Mother Information</h5>
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Name
                                        <input type="text" name="mother_name" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->mother_name}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Occupation
                                        <input type="text" name="mother_occupation" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->mother_occupation}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Company Location
                                        <input type="text" name="mother_company_location" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->mother_company_location}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Contact No
                                        <input type="text" name="mother_contact_no" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->mother_contact_no}}">
                                    </div> 
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">Sibling Information
                                            <button type="button" class="btn btn-sm btn-success" id="addSibling">
                                                <i class="uil-plus"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" id="removeSibling">
                                                <i class="uil-minus"></i>
                                            </button>
                                        </h5> 
                                        <div class="sibling-container">
                                            @if(optional($applicant->jobApplication)->siblingInformation->isNotEmpty())
                                                @foreach (optional($applicant->jobApplication)->siblingInformation as $sibling)
                                                <div class="row mb-2" id="sibling_1">
                                                    <div class="col-lg-3">
                                                        Name
                                                        <input type="text" name="sibling_name[]" class="form-control form-control-sm" value="{{$sibling->sibling_name}}">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        Occupation
                                                        <input type="text" name="sibling_occupation[]" class="form-control form-control-sm" value="{{$sibling->sibling_occupation}}">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        Company Location
                                                        <input type="text" name="sibling_company_location[]" class="form-control form-control-sm" value="{{$sibling->sibling_company_location}}">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        Contact No
                                                        <input type="text" name="sibling_contact_no[]" class="form-control form-control-sm" value="{{$sibling->sibling_contact_no}}">
                                                    </div>
                                                </div>
                                                @endforeach
                                            @else
                                            <div class="row mb-2" id="sibling_1">
                                                <div class="col-lg-3">
                                                    Name
                                                    <input type="text" name="sibling_name[]" class="form-control form-control-sm">
                                                </div>
                                                <div class="col-lg-3">
                                                    Occupation
                                                    <input type="text" name="sibling_occupation[]" class="form-control form-control-sm">
                                                </div>
                                                <div class="col-lg-3">
                                                    Company Location
                                                    <input type="text" name="sibling_company_location[]" class="form-control form-control-sm">
                                                </div>
                                                <div class="col-lg-3">
                                                    Contact No
                                                    <input type="text" name="sibling_contact_no[]" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">Spouse Information <small><i><span>(if applicable)</span></i></small></h5> 
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Name
                                        <input type="text" name="spouse_name" class="form-control form-control-sm" value="{{optional($applicant->jobApplication)->spouse_name}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Occupation
                                        <input type="text" name="spouse_occupation" class="form-control form-control-sm" value="{{optional($applicant->jobApplication)->spouse_occupation}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Company Location
                                        <input type="text" name="spouse_company_location" class="form-control form-control-sm" value="{{optional($applicant->jobApplication)->spouse_company_location}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Contact No
                                        <input type="text" name="spouse_contact_no" class="form-control form-control-sm" value="{{optional($applicant->jobApplication)->spouse_contact_no}}">
                                    </div> 
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">Children Information
                                            <span><small><i>(if applicable)</i></small></span>

                                            <button type="button" class="btn btn-sm btn-success" id="addChildren">
                                                <i class="uil-plus"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" id="removeChildren">
                                                <i class="uil-minus"></i>
                                            </button>
                                        </h5> 

                                        <div class="children-container">
                                            @if(optional($applicant->jobApplication)->childrenInformation->isNotEmpty())

                                            @foreach (optional($applicant->jobApplication)->childrenInformation as $children)
                                            <div class="row mb-2" id="children_1">
                                                <div class="col-lg-3 col-md-12 mb-2">
                                                    Name
                                                    <input type="text" name="children_name[]" class="form-control form-control-sm" value="{{$children->children_name}}">
                                                </div> 
                                                <div class="col-lg-3 col-md-12 mb-2">
                                                    Occupation
                                                    <input type="text" name="children_occupation[]" class="form-control form-control-sm" value="{{$children->children_occupation}}">
                                                </div> 
                                                <div class="col-lg-3 col-md-12 mb-2">
                                                    Company Location
                                                    <input type="text" name="children_company_location[]" class="form-control form-control-sm" value="{{$children->children_company_location}}">
                                                </div> 
                                                <div class="col-lg-3 col-md-12 mb-2">
                                                    Contact No
                                                    <input type="text" name="children_contact_no[]" class="form-control form-control-sm" value="{{$children->children_contact_no}}">
                                                </div> 
                                            </div>
                                            @endforeach
                                            @else 
                                            <div class="row mb-2" id="children_1">
                                                <div class="col-lg-3 col-md-12 mb-2">
                                                    Name
                                                    <input type="text" name="children_name[]" class="form-control form-control-sm">
                                                </div> 
                                                <div class="col-lg-3 col-md-12 mb-2">
                                                    Occupation
                                                    <input type="text" name="children_occupation[]" class="form-control form-control-sm">
                                                </div> 
                                                <div class="col-lg-3 col-md-12 mb-2">
                                                    Company Location
                                                    <input type="text" name="children_company_location[]" class="form-control form-control-sm">
                                                </div> 
                                                <div class="col-lg-3 col-md-12 mb-2">
                                                    Contact No
                                                    <input type="text" name="children_contact_no[]" class="form-control form-control-sm">
                                                </div> 
                                            </div>
                                            @endif
                                        </div>
                                    </div> 
                                </div> 
                            </div>

                            <div class="tab-pane" id="educationalBackground">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">College</h5>
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Course
                                        <input type="text" name="course" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->college_course}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        School Name
                                        <input type="text" name="college_school_name" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->college_school_name}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        School Address
                                        <input type="text" name="college_school_address" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->college_school_address}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Year attended <i>(From - To)</i>
                                        <input type="text" name="college_year_attended" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->college_year_attended}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Degree/Honors/Award/ Recognitions Received
                                        <textarea type="text" name="college_awards" class="form-control form-control-sm required">{!! nl2br(optional($applicant->jobApplication)->college_awards) !!}</textarea>
                                    </div> 
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">High School</h5>
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Course
                                        <input type="text" name="hs_course" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->hs_course}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        School Name
                                        <input type="text" name="hs_school_name" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->hs_school_name}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        School Address
                                        <input type="text" name="hs_school_address" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->hs_school_address}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Year attended <i>(From - To)</i>
                                        <input type="text" name="hs_year_attended" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->hs_year_attended}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Degree/Honors/Awrd/ Recognitions Received
                                        <textarea type="text" name="hs_awards" class="form-control form-control-sm required">{!! nl2br(optional($applicant->jobApplication)->hs_awards) !!}</textarea>
                                    </div> 
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">Others</h5> 
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Course
                                        <input type="text" name="others_course" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->others_course}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        School Name
                                        <input type="text" name="others_school_name" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->others_school_name}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        School Address
                                        <input type="text" name="others_school_address" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->others_school_address}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Year attended <i>(From - To)</i>
                                        <input type="text" name="others_year_attended" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->others_year_attended}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Degree/Honors/Awrd/ Recognitions Received
                                        <textarea type="text" name="others_awards" class="form-control form-control-sm required">{!!nl2br(optional($applicant->jobApplication)->others_awards)!!}</textarea>
                                    </div> 
                                </div> 
                            </div>

                            <div class="tab-pane" id="examination">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Licensure Examination
                                        <input type="text" name="licensure_examination" class="form-control form-control-sm" value="{{optional($applicant->jobApplication)->licensure_examination}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Rating
                                        <input type="text" name="rating" class="form-control form-control-sm" value="{{optional($applicant->jobApplication)->rating}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Government Examination
                                        <input type="text" name="government_examination" class="form-control form-control-sm" value="{{optional($applicant->jobApplication)->government_examination}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Rating
                                        <input type="text" name="gov_rating" class="form-control form-control-sm" value="{{optional($applicant->jobApplication)->gov_rating}}">
                                    </div> 
                                </div> 
                            </div>

                            <div class="tab-pane" id="workExperience">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">Work Experiences</h5>
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Name of Company
                                        <input type="text" name="company_name" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->name_of_company}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Address of Company
                                        <input type="text" name="company_address" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->address_of_company}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Position
                                        <input type="text" name="last_position" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->last_position}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Employment Period
                                        <input type="text" name="employment_period" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->employment_period}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Company Industry
                                        <input type="text" name="company_industry" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->company_industry}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Reason for leaving
                                        <textarea name="reason_for_leaving" class="form-control form-control-sm required" cols="30" rows="10">{!! nl2br(optional($applicant->jobApplication)->reason_for_leaving) !!}</textarea>
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Last Salary
                                        <input type="text" name="last_salary" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->last_salary}}" data-toggle="input-mask" data-mask-format="000.000.000.000.000,00" data-reverse="true">
                                    </div> 
                                </div> 
                            </div>

                            <ul class="list-inline mb-0 wizard mt-3">
                                <li class="previous list-inline-item">
                                    <a href="#" class="btn btn-info">Previous</a>
                                </li>
                                <li class="next list-inline-item float-end">
                                    <a href="#" class="btn btn-info">Next</a>
                                </li>
                            </ul>

                        </div> <!-- tab-content -->
                    </div> <!-- end #progressbarwizard-->
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> 
</div>
@endsection

@section('js')
<script src="{{asset('js/chosen.jquery.min.js')}}"></script>
{{-- <script src="{{asset('js/demo.form-wizard.js')}}"></script> --}}

<script>
    $(document).ready(function() {
        $('.cat').chosen({width:"100%"})

        $("#progressbarwizard").bootstrapWizard({
            onTabShow: function(t, r, a) {
                var totalSteps = r.find("li").length;
                var currentStep = a + 1;
                var progress = (currentStep / totalSteps) * 100;

                var o = (a + 1) / r.find("li").length * 100;
                $("#progressbarwizard").find(".bar").css({ width: o + "%" });

                if (currentStep === totalSteps) {
                    $('#progressbarwizard').find('.next').children().remove();
                    $('#progressbarwizard').find('.next').append(`<button type="submit" class="btn btn-info">Submit</button>`);
                } else {
                    $('#progressbarwizard').find('.next').children().text('Next');
                }
            },
            onNext:function(t,r,a){
                var isValid = true;
                var sourceName = $(t[0]).children().attr('href')

                $('.tab-pane' + sourceName).find('.required').each(function(k, obj) {
                    if (obj.value == '' || obj.value == null) {
                        $(obj).css('border', '1px solid red')

                        isValid = false
                    }
                    else {
                        $(obj).css('border', '1px solid #dee2e6')
                    }
                }) 

                if (!isValid) {
                    if($('.cat').val() == '') {
                        $('.cat').siblings().css('border', '1px solid red')
                    }
                } else {
                    $('.cat').siblings().css('border', '1px solid #dee2e6')
                }
                
                return isValid;
            }
        });

        $('[name="source"]').on('change', function() {
            
            $('[name="application"]').closest('.col-lg-3').remove();
            $('[name="employee"]').closest('.col-lg-3').remove();

            if ($(this).val() == 5) 
            {
                var newColumn = `
                    <div class="col-lg-3 col-md-12 mb-2">
                        Application
                        <input type="text" name="application" class="form-control form-control-sm" placeholder="Example: Jobstreet, Indeed, Social Media etc.">
                    </div>
                `;
                
                $('.cat').closest('.col-lg-3').after(newColumn);
            }
            else if($(this).val() == 6) 
            {
                var newColumn = `
                    <div class="col-lg-3 col-md-12 mb-2">
                        Name of Employee
                        <input type="text" name="employee" class="form-control form-control-sm">
                    </div>
                `;
                
                $('.cat').closest('.col-lg-3').after(newColumn);
            }
        })

        $('#addSibling').on('click', function() {
            var sibling = $('.sibling-container').children().last().attr('id')
            var lastId = sibling.split('_')
            var siblingId = parseInt(lastId[1]) + 1
            
            var newRow = `
                <div class="row mb-2" id="sibling_${siblingId}">
                    <div class="col-lg-3">
                        Name
                        <input type="text" name="sibling_name[]" class="form-control form-control-sm">
                    </div>
                    <div class="col-lg-3">
                        Occupation
                        <input type="text" name="sibling_occupation[]" class="form-control form-control-sm">
                    </div>
                    <div class="col-lg-3">
                        Company Location
                        <input type="text" name="sibling_company_location[]" class="form-control form-control-sm">
                    </div>
                    <div class="col-lg-3">
                        Contact No
                        <input type="text" name="sibling_contact_no[]" class="form-control form-control-sm">
                    </div>
                </div>
            `

            $('.sibling-container').append(newRow)
        })

        $('#removeSibling').on('click', function() {
            
            if ($('.sibling-container').children().length > 1) {
                $('.sibling-container').children().last().remove()
            }
        })

        $("#same_as").on('change', function() {
            var house_no = $('[name="present_house_no"]').val()
            var street = $('[name="present_street_name"]').val()
            var barangay = $('[name="present_barangay"]').val()
            var municipality = $('[name="present_municipality"]').val()
            
            if ($(this).is(':checked')) {
                $('[name="permanent_house_no"]').val(house_no).prop('readonly', true)
                $('[name="permanent_street_name"]').val(street).prop('readonly', true)
                $('[name="permanent_barangay"]').val(barangay).prop('readonly', true)
                $('[name="permanent_municipality"]').val(municipality).prop('readonly', true)
            }
            else {
                $('[name="permanent_house_no"]').val("").removeAttr('readonly')
                $('[name="permanent_street_name"]').val("").removeAttr('readonly')
                $('[name="permanent_barangay"]').val("").removeAttr('readonly')
                $('[name="permanent_municipality"]').val("").removeAttr('readonly')
            }
        })

        $('#addChildren').on('click', function() {
            var children = $('.children-container').children().last().attr('id')
            var lastId = children.split('_')
            var childrenId = parseInt(lastId[1]) + 1
            
            var newRow = `
                <div class="row mb-2" id="children_${childrenId}">
                    <div class="col-lg-3">
                        Name
                        <input type="text" name="children_name[]" class="form-control form-control-sm">
                    </div>
                    <div class="col-lg-3">
                        Occupation
                        <input type="text" name="children_occupation[]" class="form-control form-control-sm">
                    </div>
                    <div class="col-lg-3">
                        Company Location
                        <input type="text" name="children_company[]" class="form-control form-control-sm">
                    </div>
                    <div class="col-lg-3">
                        Contact No
                        <input type="text" name="children_contact[]" class="form-control form-control-sm">
                    </div>
                </div>
            `

            $('.children-container').append(newRow)
        })

        $('#removeChildren').on('click', function() {
            
            if ($('.children-container').children().length > 1) {
                $('.children-container').children().last().remove()
            }
        })
    })
</script>
@endsection