@extends('layouts.app');

@section('css')
<link rel="stylesheet" href="{{asset('css/component-chosen.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.6.0/build/css/intlTelInput.css">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mx-auto" >
            <div class="card-body" >

                <h4 class="header-title mb-3 d-inline-block">Job Application Form</h4>
                @if($applicant->jobApplication != null)
                <a href="{{url('print-job-application/'.$applicant->jobApplication->id)}}" class="btn btn-sm btn-danger float-end" target="_blank">
                    <i class="dripicons-print"></i>
                    Print Job Application
                </a>
                @endif

                <form method="POST" action="{{url('submit-ja')}}" onsubmit="show()">
                    @csrf

                    <div id="progressbarwizard">

                        <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                            <li class="nav-item">
                                <a href="#source" data-bs-toggle="tab" data-toggle="tab"
                                    class="nav-link rounded-0 pt-2 pb-2">
                                    {{-- <i class="mdi mdi-account-circle me-1"></i> --}}
                                    <span class="d-none d-sm-inline">Position Details</span>
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
                            {{-- <li class="nav-item">
                                <a href="#examination" data-bs-toggle="tab" data-toggle="tab"
                                    class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
                                    <span class="d-none d-sm-inline">Examination Undertaken</span>
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="#workExperience" data-bs-toggle="tab" data-toggle="tab"
                                    class="nav-link rounded-0 pt-2 pb-2">
                                    {{-- <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i> --}}
                                    <span class="d-none d-sm-inline">Work History</span>
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
                                    <div class="col-lg-3 col-md-12 mb-2" id="sourceField">
                                        Source
                                        <input type="text" name="source" class="form-control form-control-sm" value="{{$applicant->source}}" readonly>
                                        {{-- <select name="source" id="" class="form-control cat required">
                                            <option value="">- Source -</option>
                                            <option value="1" @if(optional($applicant->jobApplication)->source == 1) selected @endif>Walk In</option>
                                            <option value="2" @if(optional($applicant->jobApplication)->source == 2) selected @endif>PESO</option>
                                            <option value="3" @if(optional($applicant->jobApplication)->source == 3) selected @endif>Advertisement</option>
                                            <option value="4" @if(optional($applicant->jobApplication)->source == 4) selected @endif>Job Fair</option>
                                            <option value="5" @if(optional($applicant->jobApplication)->source == 5) selected @endif>Online Application</option>
                                            <option value="6" @if(optional($applicant->jobApplication)->source == 6) selected @endif>Employee Referral</option>
                                        </select> --}}
                                    </div> 
                                    {{-- @if(optional($applicant->jobApplication)->source == 5)
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Application
                                        <input type="text" name="application" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->application}}" placeholder="Example: Jobstreet, Indeed, Social Media etc.">
                                    </div>
                                    @elseif(optional($applicant->jobApplication)->source == 6)
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Name of Employee
                                        <input type="text" name="employee" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->employee}}">
                                    </div>
                                    @endif --}}
                                    @if($applicant->source == 'Application')
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Application
                                        <input type="text" name="application" class="form-control form-control-sm required" value="{{$applicant->application}}" readonly>
                                    </div>
                                    @elseif($applicant->source == 'Employee Referral')
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Name of Employee
                                        <input type="text" name="employee" class="form-control form-control-sm required" value="{{$applicant->employee}}" readonly>
                                    </div>
                                    @endif

                                    <div class="col-lg-3 col-md-12">
                                        Position
                                        <input type="text" name="position" class="form-control form-control-sm" value="{{$applicant->mrf->jobPosition->position}}" readonly>
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Minimum Expected Salary
                                        <input type="text" name="minimum_expected_salary" class="form-control form-control-sm required" value="{{$applicant->asking_compensation}}" readonly>
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Date Available for Employment <i><small>(MM/DD/YYYY)</small></i>
                                        
                                        <input type="date" name="date_available_for_employment" value="{{date('Y-m-d', strtotime($applicant->date_availability))}}" class="form-control form-control-sm required" readonly>
                                    </div> 
                                </div> 
                            </div>

                            <div class="tab-pane" id="personal_data">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Last Name
                                        <input type="text" name="lastname" class="form-control form-control-sm required" value="{{$applicant->lastname}}" readonly>
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        First Name
                                        <input type="text" name="firstname" class="form-control form-control-sm required" value="{{$applicant->firstname}}" readonly>
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Middle Name
                                        <input type="text" name="middlename" class="form-control form-control-sm required" value="{{$applicant->middlename}}" readonly>
                                    </div>
                                    <div class="col-lg-3 col-md-12 mb-2">
                                    </div>
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Contact Number
                                        <div class="form-group">
                                            <input type="tel" name="contact_number" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->contact_number}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Civil Status
                                        {{-- <input type="text" name="civil_status" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->civil_status}}"> --}}
                                        <select name="civil_status" class="form-control form-control-sm required cat" >
                                            <option value="">Select civil status</option>
                                            <option value="Single" @if(optional($applicant->jobApplication)->civil_status == "Single") selected @endif>Single</option>
                                            <option value="Married" @if(optional($applicant->jobApplication)->civil_status == "Married") selected @endif>Married</option>
                                            <option value="Widow" @if(optional($applicant->jobApplication)->civil_status == "Widow") selected @endif>Widow</option>
                                            <option value="Divorced" @if(optional($applicant->jobApplication)->civil_status == "Divorced") selected @endif>Divorced</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Age
                                        <input type="number" name="age" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->age}}">
                                    </div>
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Gender
                                        <select name="gender" class="form-control form-control-sm required">
                                            <option value="">Choose Gender</option>
                                            <option value="M" @if(optional($applicant->jobApplication)->gender == 'M') selected @endif>Male</option>
                                            <option value="F" @if(optional($applicant->jobApplication)->gender == 'F') selected @endif>Female</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Citizenship
                                        <input type="text" name="citizenship" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->citizenship}}">
                                    </div>
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Date of Birth
                                        <input type="date" name="date_of_birth" class="form-control form-control-sm required" max="{{date('Y-m-d', strtotime('-18 year'))}}" value="{{optional($applicant->jobApplication)->date_of_birth}}">
                                    </div>
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Place of Birth
                                        <input type="text" name="place_of_birth" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->place_of_birth}}">
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
                                        <input type="checkbox" name="same_as" id="same_as" @if(optional($applicant->jobApplication)->same_as == 'on') checked @endif>
                                        <small><i>Same as present address</i></small>
                                    </div>
                                    <div class="col-lg-12">
                                        <h5 class="header-title mt-2">Permanent Address</h5>
                                    </div>
                                    <div class="col-lg-2">
                                        House No./Bldg No.
                                        <input type="text" name="permanent_house_no" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->permanent_house_no}}" @if(optional($applicant->jobApplication)->same_as == 'on') readonly @endif>
                                    </div>
                                    <div class="col-lg-3">
                                        Street 
                                        <input type="text" name="permanent_street_name" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->permanent_street_name}}" @if(optional($applicant->jobApplication)->same_as == 'on') readonly @endif>
                                    </div>
                                    <div class="col-lg-3">
                                        Barangay
                                        <input type="text" name="permanent_barangay" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->permanent_barangay}}" @if(optional($applicant->jobApplication)->same_as == 'on') readonly @endif>
                                    </div>
                                    <div class="col-lg-4">
                                        Municipality
                                        <input type="text" name="permanent_municipality" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->permanent_municipality}}" @if(optional($applicant->jobApplication)->same_as == 'on') readonly @endif>
                                    </div>
                                </div> 
                            </div>

                            <div class="tab-pane wizard-pane" id="familyBackground" data-simplebar>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">Father's Information</h5>
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
                                        {{-- <input type="text" name="father_contact_no" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->father_contact_no}}"> --}}
                                        <div class="form-group">
                                            <input type="tel" name="father_contact_no" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->father_contact_no}}">
                                        </div>
                                    </div> 
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">Mother's Information</h5>
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
                                        {{-- <input type="text" name="mother_contact_no" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->mother_contact_no}}"> --}}
                                        <div class="form-group">
                                            <input type="tel" name="mother_contact_no" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->mother_contact_no}}">
                                        </div>
                                    </div> 
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">Sibling/s' Information
                                            <button type="button" class="btn btn-sm btn-success" id="addSibling">
                                                <i class="uil-plus"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" id="removeSibling">
                                                <i class="uil-minus"></i>
                                            </button>
                                        </h5> 
                                        <div class="sibling-container">
                                            @if($applicant->jobApplication != null)
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
                                                            {{-- <input type="text" name="sibling_contact_no[]" class="form-control form-control-sm" value="{{$sibling->sibling_contact_no}}"> --}}
                                                            <div class="form-group">
                                                                <input type="tel" name="sibling_contact_no[]" class="form-control form-control-sm" value="{{$sibling->sibling_contact_no}}">
                                                            </div>
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
                                                            {{-- <input type="text" name="sibling_contact_no[]" class="form-control form-control-sm"> --}}
                                                            <div class="form-group">
                                                                <input type="tel" name="sibling_contact_no[]" class="form-control form-control-sm">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
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
                                                        {{-- <input type="text" name="sibling_contact_no[]" class="form-control form-control-sm"> --}}
                                                        <div class="form-group">
                                                            <input type="tel" name="sibling_contact_no[]" class="form-control form-control-sm">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-lg-12 spouse_information" @if(optional($applicant->jobApplication)->civil_status == 'Single') hidden @endif>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 mb-2">
                                                <h5 class="header-title">Spouse's Information <small><i><span>(if applicable)</span></i></small></h5> 
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
                                                {{-- <input type="text" name="spouse_contact_no" class="form-control form-control-sm" value="{{optional($applicant->jobApplication)->spouse_contact_no}}"> --}}
                                                <div class="form-group">
                                                    <input type="tel" name="spouse_contact_no" class="form-control form-control-sm" value="{{optional($applicant->jobApplication)->spouse_contact_no}}">
                                                </div>
                                            </div> 
                                        </div c>
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
                                            @if($applicant->jobApplication != null)
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
                                                            {{-- <input type="text" name="children_contact_no[]" class="form-control form-control-sm" value="{{$children->children_contact_no}}"> --}}
                                                            <div class="form-group">
                                                                <input type="tel" name="children_contact_no[]" class="form-control form-control-sm" value="{{$children->children_contact_no}}">
                                                            </div>
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
                                                        {{-- <input type="text" name="children_contact_no[]" class="form-control form-control-sm"> --}}
                                                        <div class="form-group">
                                                            <input type="tel" name="children_contact_no[]" class="form-control form-control-sm">
                                                        </div>
                                                    </div> 
                                                </div>
                                                @endif
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
                                                    {{-- <input type="text" name="children_contact_no[]" class="form-control form-control-sm"> --}}
                                                    <div class="form-group">
                                                        <input type="tel" name="children_contact_no[]" class="form-control form-control-sm">
                                                    </div>
                                                </div> 
                                            </div>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-lg-6 mb-2">
                                        Do you have any relative/s working within W Group and/or its affiliates and subsidiaries?
                                        <select name="have_relatives" class="form-control form-control-sm required" >
                                            <option value="">Select action</option>
                                            <option value="Yes" @if(optional($applicant->jobApplication)->have_relative == 'Yes') selected @endif>Yes</option>
                                            <option value="No"  @if(optional($applicant->jobApplication)->have_relative == 'No') selected @endif>No</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-2 rowNameEmp" @if($applicant->jobApplication->have_relative == 'No' || $applicant->jobApplication->have_relative == null ) hidden @endif>
                                        Employee Name
                                        <input type="text" name="name_of_employee" class="form-control form-control-sm" value="{{$applicant->jobApplication->employee_name}}">
                                    </div>
                                    {{-- <div class="row rowNameEmp" hidden>
                                    </div> --}}
                                </div> 
                            </div>

                            <div class="tab-pane" id="educationalBackground">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">College</h5>
                                    </div> 
                                    {{-- <div class="col-lg-3 col-md-12 mb-2">
                                        Course
                                        <input type="text" name="course" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->college_course}}">
                                    </div>  --}}
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        School Name
                                        <input type="text" name="college_school_name" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->college_school_name}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        School Address
                                        <input type="text" name="college_school_address" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->college_school_address}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Inclusive Years
                                        <input type="text" name="college_year_attended" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->college_year_attended}}" data-mask="0000-0000" placeholder="Ex: 2023-2024">
                                    </div>
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Degree Program
                                        <input type="text" name="degree_program" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->college_degree_program}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Honors/Award/Recognitions
                                        <textarea type="text" name="college_awards" class="form-control form-control-sm required">{{optional($applicant->jobApplication)->college_awards}}</textarea>
                                    </div> 
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">High School</h5>
                                    </div> 
                                    {{-- <div class="col-lg-3 col-md-12 mb-2">
                                        Course
                                        <input type="text" name="hs_course" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->hs_course}}">
                                    </div>  --}}
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        School Name
                                        <input type="text" name="hs_school_name" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->hs_school_name}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        School Address
                                        <input type="text" name="hs_school_address" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->hs_school_address}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Inclusive Years
                                        <input type="text" name="hs_year_attended" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->hs_year_attended}}" data-mask="0000-0000" placeholder="Ex: 2023-2024">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Honors/Award/Recognitions
                                        <textarea type="text" name="hs_awards" class="form-control form-control-sm required">{{optional($applicant->jobApplication)->hs_awards}}</textarea>
                                    </div> 
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">Others</h5> 
                                    </div> 
                                    {{-- <div class="col-lg-3 col-md-12 mb-2">
                                        Course
                                        <input type="text" name="others_course" class="form-control form-control-sm required" value="{{optional($applicant->jobApplication)->others_course}}">
                                    </div>  --}}
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        School Name
                                        <input type="text" name="others_school_name" class="form-control form-control-sm" value="{{optional($applicant->jobApplication)->others_school_name}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        School Address
                                        <input type="text" name="others_school_address" class="form-control form-control-sm" value="{{optional($applicant->jobApplication)->others_school_address}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Inclusive Years
                                        <input type="text" name="others_year_attended" class="form-control form-control-sm" value="{{optional($applicant->jobApplication)->others_year_attended}}" data-mask="0000-0000" placeholder="Ex: 2023-2024">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Degree Earned
                                        <input type="text" name="degree_earned" class="form-control form-control-sm" placeholder="Ex: Diploma, Master’s, Doctorate, Others (specify)" value="{{optional($applicant->jobApplication)->others_degree_earned}}">
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Honors/Award/Recognitions
                                        <textarea type="text" name="others_awards" class="form-control form-control-sm">{{optional($applicant->jobApplication)->others_awards}}</textarea>
                                    </div> 
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Certifications/Licenses
                                        <textarea type="text" name="others_certification_licenses" class="form-control form-control-sm">{{optional($applicant->jobApplication)->others_certification_licenses}}</textarea>
                                    </div> 
                                </div> 
                            </div>

                            {{-- <div class="tab-pane" id="examination">
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
                            </div> --}}

                            <div class="tab-pane wizard-pane" id="workExperience" data-simplebar>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">Work Experiences
                                            <button type="button" class="btn btn-sm btn-success" id="addWorkExp">
                                                <i class="uil-plus"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" id="removeWorkExp">
                                                <i class="uil-minus"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="workExpContainer">
                                        @if($applicant->jobApplication != null)
                                            @if(count($applicant->jobApplication->workExperience) > 0)
                                                @foreach ($applicant->jobApplication->workExperience as $work_exp)
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-12 mb-2">
                                                        Name of Company
                                                        <input type="text" name="company_name[]" class="form-control form-control-sm " value="{{$work_exp->name_of_company}}">
                                                    </div> 
                                                    <div class="col-lg-3 col-md-12 mb-2">
                                                        Address of Company
                                                        <input type="text" name="company_address[]" class="form-control form-control-sm " value="{{$work_exp->address_of_company}}">
                                                    </div> 
                                                    <div class="col-lg-3 col-md-12 mb-2">
                                                        Position
                                                        <input type="text" name="last_position[]" class="form-control form-control-sm " value="{{$work_exp->position}}">
                                                    </div> 
                                                    <div class="col-lg-3 col-md-12 mb-2">
                                                        Employment Period
                                                        <input type="text" name="employment_period[]" class="form-control form-control-sm " value="{{$work_exp->employment_period}}">
                                                    </div> 
                                                    <div class="col-lg-3 col-md-12 mb-2">
                                                        Company Industry
                                                        <input type="text" name="company_industry[]" class="form-control form-control-sm "value="{{$work_exp->company_industry}}">
                                                    </div> 
                                                    <div class="col-lg-3 col-md-12 mb-2">
                                                        Reason for leaving
                                                        <textarea name="reason_for_leaving[]" class="form-control form-control-sm " cols="30" rows="10">{{$work_exp->reason_for_leaving}}</textarea>
                                                    </div> 
                                                    <div class="col-lg-3 col-md-12 mb-2">
                                                        Last Salary
                                                        <input type="text" name="last_salary[]" class="form-control form-control-sm " value="{{$work_exp->last_salary}}">
                                                    </div> 
                                                </div>
                                                @endforeach
                                            @else
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-12 mb-2">
                                                        Name of Company
                                                        <input type="text" name="company_name[]" class="form-control form-control-sm " >
                                                    </div> 
                                                    <div class="col-lg-3 col-md-12 mb-2">
                                                        Address of Company
                                                        <input type="text" name="company_address[]" class="form-control form-control-sm " >
                                                    </div> 
                                                    <div class="col-lg-3 col-md-12 mb-2">
                                                        Position
                                                        <input type="text" name="last_position[]" class="form-control form-control-sm " >
                                                    </div> 
                                                    <div class="col-lg-3 col-md-12 mb-2">
                                                        Employment Period
                                                        <input type="text" name="employment_period[]" class="form-control form-control-sm " >
                                                    </div> 
                                                    <div class="col-lg-3 col-md-12 mb-2">
                                                        Company Industry
                                                        <input type="text" name="company_industry[]" class="form-control form-control-sm ">
                                                    </div> 
                                                    <div class="col-lg-3 col-md-12 mb-2">
                                                        Reason for leaving
                                                        <textarea name="reason_for_leaving[]" class="form-control form-control-sm " cols="30" rows="10"></textarea>
                                                    </div> 
                                                    <div class="col-lg-3 col-md-12 mb-2">
                                                        Last Salary
                                                        <input type="text" name="last_salary[]" class="form-control form-control-sm " >
                                                    </div> 
                                                </div>
                                            @endif
                                        @else
                                            <div class="row">
                                                <div class="col-lg-3 col-md-12 mb-2">
                                                    Name of Company
                                                    <input type="text" name="company_name[]" class="form-control form-control-sm " >
                                                </div> 
                                                <div class="col-lg-3 col-md-12 mb-2">
                                                    Address of Company
                                                    <input type="text" name="company_address[]" class="form-control form-control-sm " >
                                                </div> 
                                                <div class="col-lg-3 col-md-12 mb-2">
                                                    Position
                                                    <input type="text" name="last_position[]" class="form-control form-control-sm " >
                                                </div> 
                                                <div class="col-lg-3 col-md-12 mb-2">
                                                    Employment Period
                                                    <input type="text" name="employment_period[]" class="form-control form-control-sm " >
                                                </div> 
                                                <div class="col-lg-3 col-md-12 mb-2">
                                                    Company Industry
                                                    <input type="text" name="company_industry[]" class="form-control form-control-sm ">
                                                </div> 
                                                <div class="col-lg-3 col-md-12 mb-2">
                                                    Reason for leaving
                                                    <textarea name="reason_for_leaving[]" class="form-control form-control-sm " cols="30" rows="10"></textarea>
                                                </div> 
                                                <div class="col-lg-3 col-md-12 mb-2">
                                                    Last Salary
                                                    <input type="text" name="last_salary[]" class="form-control form-control-sm " >
                                                </div> 
                                            </div>
                                        @endif
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.6/jquery.inputmask.bundle.min.js"></script>
{{-- <script src="{{asset('js/demo.form-wizard.js')}}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.6.0/build/js/intlTelInput.min.js"></script>
<script>
    $(document).ready(function() {
        const input = document.querySelectorAll('input[type="tel"]');

        function initializeIntlTelInput (input)
        {
            window.intlTelInput(input, {
                loadUtilsOnInit: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.6.0/build/js/utils.js",
                initialCountry: "ph",
                strictMode: true,
                separateDialCode: true,
                utilsScript: "/intl-tel-input/js/utils.js?1727952657388" // just for formatting/placeholders etc
            });
        }

        input.forEach(input => {
            initializeIntlTelInput(input)
        })
        
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
                
                $("[name='civil_status']").on('change', function() {
                    if ($(this).val() == 'Single')
                    {
                        $(".spouse_information").prop('hidden', true);
                    }
                    else
                    {
                        $(".spouse_information").prop('hidden', false);
                    }
                })
            },
            onNext:function(t,r,a){
                $("[name='civil_status']").on('change', function() {
                    if ($(this).val() == 'Single')
                    {
                        $(".spouse_information").prop('hidden', true);
                    }
                    else
                    {
                        $(".spouse_information").prop('hidden', false);
                    }
                })

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
                        <input type="text" name="application" class="form-control form-control-sm required" placeholder="Example: Jobstreet, Indeed, Social Media etc.">
                    </div>
                `;
                
                $('.cat').closest('#sourceField').after(newColumn);
            }
            else if($(this).val() == 6) 
            {
                var newColumn = `
                    <div class="col-lg-3 col-md-12 mb-2">
                        Name of Employee
                        <input type="text" name="employee" class="form-control form-control-sm required">
                    </div>
                `;
                
                $('.cat').closest('#sourceField').after(newColumn);
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
                        <div class="form-group">
                            <input type="tel" name="sibling_contact_no[]" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
            `

            $('.sibling-container').append(newRow)
            var input = $(`#sibling_${siblingId}`).find('input[type="tel"]')[0];
            initializeIntlTelInput(input)
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
                        <div class="form-group">
                            <input type="tel" name="children_contact[]" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
            `

            $('.children-container').append(newRow)
            var input = $(`#children_${childrenId}`).find('input[type="tel"]')[0];
            initializeIntlTelInput(input)
        })

        $('#removeChildren').on('click', function() {
            
            if ($('.children-container').children().length > 1) {
                $('.children-container').children().last().remove()
            }
        })

        $("#addWorkExp").on('click', function() {
            var newRow = `
                <div class="row">
                    <div class="col-lg-3 col-md-12 mb-2">
                        Name of Company
                        <input type="text" name="company_name[]" class="form-control form-control-sm required" >
                    </div> 
                    <div class="col-lg-3 col-md-12 mb-2">
                        Address of Company
                        <input type="text" name="company_address[]" class="form-control form-control-sm required" >
                    </div> 
                    <div class="col-lg-3 col-md-12 mb-2">
                        Position
                        <input type="text" name="last_position[]" class="form-control form-control-sm required" >
                    </div> 
                    <div class="col-lg-3 col-md-12 mb-2">
                        Employment Period
                        <input type="text" name="employment_period[]" class="form-control form-control-sm required" >
                    </div> 
                    <div class="col-lg-3 col-md-12 mb-2">
                        Company Industry
                        <input type="text" name="company_industry[]" class="form-control form-control-sm required">
                    </div> 
                    <div class="col-lg-3 col-md-12 mb-2">
                        Reason for leaving
                        <textarea name="reason_for_leaving[]" class="form-control form-control-sm required" cols="30" rows="10"></textarea>
                    </div> 
                    <div class="col-lg-3 col-md-12 mb-2">
                        Last Salary
                        <input type="text" name="last_salary[]" class="form-control form-control-sm required" >
                    </div> 
                </div>
            `

            $("#workExpContainer").append(newRow)
            inputMaskMoney('last_salary[]')
        })

        $("#removeWorkExp").on('click', function() {
            if ($("#workExpContainer").children().length > 1)
            {
                $('#workExpContainer').children().last().remove()
            }
        })

        // $("[name='minimum_expected_salary']").inputmask({
        //     prefix: "₱ ",
        //     groupSeparator: ".",
        //     alias: "numeric",
        //     placeholder: "0",
        //     autoGroup: true,
        //     digits: 2,
        //     digitsOptional: false,
        //     clearMaskOnLostFocus: false
        // })

        // $("[name='last_salary[]']").inputmask({
        //     prefix: "₱ ",
        //     groupSeparator: ".",
        //     alias: "numeric",
        //     placeholder: "0",
        //     autoGroup: true,
        //     digits: 2,
        //     digitsOptional: false,
        //     clearMaskOnLostFocus: false
        // })

        function inputMaskMoney(input)
        {
            $(`[name='${input}']`).inputmask({
                prefix: "₱ ",
                groupSeparator: ".",
                alias: "numeric",
                placeholder: "0",
                autoGroup: true,
                digits: 2,
                digitsOptional: false,
                clearMaskOnLostFocus: false
            })
        }

        $("[name='have_relatives']").on('change', function() {
            if ($(this).val() == 'Yes')
            {
                $('.rowNameEmp').removeAttr('hidden');
                $('[name="name_of_employee"]').addClass('required');
            }
            else
            {
                $('.rowNameEmp').prop('hidden', true);
                $('[name="name_of_employee"]').removeClass('required');
            }
        })
    })
</script>
@endsection