@extends('layouts.app');

@section('css')
<link rel="stylesheet" href="{{asset('css/component-chosen.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mx-auto" style="width: 90%;">
            <div class="card-body">

                <h4 class="header-title mb-3">Job Application Form</h4>

                <form method="POST" action="{{url('submit-ja')}}">
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
                                    <span class="d-none d-sm-inline">Family Background <small><i>add N/A if not applicable</i></small></span>
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
                        </ul>

                        <div class="tab-content b-0 mb-0">

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
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Source
                                        <select name="source" id="" class="form-control cat required">
                                            <option value="">- Source -</option>
                                            <option value="1">Walk In</option>
                                            <option value="2">PESO</option>
                                            <option value="3">Advertisement</option>
                                            <option value="4">Job Fair</option>
                                            <option value="5">Online Application</option>
                                            <option value="6">Employee Referral</option>
                                        </select>
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12">
                                        Position
                                        <input type="text" name="position" class="form-control form-control-sm" value="{{auth()->user()->applicant->mrf->position_title}}" readonly>
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Minimum Expected Salary
                                        <input type="text" name="minimum_expected_salary" class="form-control form-control-sm required" data-toggle="input-mask" data-mask-format="000.000.000.000.000,00" data-reverse="true">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Date Available for Employment
                                        <input type="date" name="date_available_for_employment" class="form-control form-control-sm required" min="{{date('Y-m-d')}}">
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>

                            <div class="tab-pane" id="personal_data">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12">
                                        Lastname
                                        <input type="text" name="lastname" class="form-control form-control-sm" >
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12">
                                        Firstname
                                        <input type="text" name="lastname" class="form-control form-control-sm" >
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12">
                                        Middlename
                                        <input type="text" name="lastname" class="form-control form-control-sm" >
                                    </div> <!-- end col -->
                                    <div class="col-lg-12">
                                        <h5 class="header-title mt-2">Present Address</h5>
                                    </div>
                                    <div class="col-lg-2">
                                        House No./Bldg No.
                                        <input type="text" name="present_house_no" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-3">
                                        Street 
                                        <input type="text" name="present_street_name" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-3">
                                        Barangay
                                        <input type="text" name="present_barangay" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-4">
                                        Municipality
                                        <input type="text" name="present_municipality" class="form-control form-control-sm">
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
                                        <input type="text" name="permanent_house_no" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-3">
                                        Street 
                                        <input type="text" name="permanent_street_name" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-3">
                                        Barangay
                                        <input type="text" name="permanent_barangay" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-4">
                                        Municipality
                                        <input type="text" name="permanent_municipality" class="form-control form-control-sm">
                                    </div>
                                </div> <!-- end row -->
                            </div>

                            <div class="tab-pane" id="familyBackground">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">Father Information</h5>
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Name
                                        <input type="text" name="father_name" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Occupation
                                        <input type="text" name="father_occupation" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Company Location
                                        <input type="text" name="father_company_location" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Contact No
                                        <input type="text" name="father_contact_no" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">Mother Information</h5>
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Name
                                        <input type="text" name="mother_name" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Occupation
                                        <input type="text" name="mother_occupation" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Company Location
                                        <input type="text" name="mother_company_location" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Contact No
                                        <input type="text" name="mother_contact_no" class="form-control form-control-sm">
                                    </div> <!-- end col -->
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
                                            <div class="row mb-2" id="sibling_1">
                                                <div class="col-lg-3">
                                                    Name
                                                    <input type="text" name="" class="form-control form-control-sm">
                                                </div>
                                                <div class="col-lg-3">
                                                    Contact
                                                    <input type="text" name="" class="form-control form-control-sm">
                                                </div>
                                                <div class="col-lg-3">
                                                    Company Location
                                                    <input type="text" name="" class="form-control form-control-sm">
                                                </div>
                                                <div class="col-lg-3">
                                                    Contact No
                                                    <input type="text" name="" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">Spouse Information <small><i><span>(if applicable)</span></i></small></h5> 
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Name
                                        <input type="text" name="mother_name" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Occupation
                                        <input type="text" name="mother_occupation" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Company Location
                                        <input type="text" name="mother_company_location" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Contact No
                                        <input type="text" name="mother_contact_no" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">Children Information</h5> <small><i>(if applicable)</i></small>
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Name
                                        <input type="text" name="mother_name" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Occupation
                                        <input type="text" name="mother_occupation" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Company Location
                                        <input type="text" name="mother_company_location" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Contact No
                                        <input type="text" name="mother_contact_no" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>

                            <div class="tab-pane" id="educationalBackground">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">College</h5>
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Course
                                        <input type="text" name="course" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Name & Address of School
                                        <input type="text" name="college_school_name_address" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Year attended <i>(From - To)</i>
                                        <input type="text" name="college_year_attended" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Degree/Honors/Awrd/ Recognitions Received
                                        <input type="text" name="college_awards" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">High School</h5>
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Course
                                        <input type="text" name="course" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Name & Address of School
                                        <input type="text" name="college_school_name_address" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Year attended <i>(From - To)</i>
                                        <input type="text" name="college_year_attended" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Degree/Honors/Awrd/ Recognitions Received
                                        <input type="text" name="college_awards" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <h5 class="header-title">Others</h5> 
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Course
                                        <input type="text" name="course" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Name & Address of School
                                        <input type="text" name="college_school_name_address" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Year attended <i>(From - To)</i>
                                        <input type="text" name="college_year_attended" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Degree/Honors/Awrd/ Recognitions Received
                                        <input type="text" name="college_awards" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>

                            <div class="tab-pane" id="examination">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Licensure Examination
                                        <input type="text" name="licensure_examination" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Rating
                                        <input type="text" name="rating" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Government Examination
                                        <input type="text" name="government_examination" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                    <div class="col-lg-3 col-md-12 mb-2">
                                        Rating
                                        <input type="text" name="gov_rating" class="form-control form-control-sm">
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
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
    </div> <!-- end col -->
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
                var o = (a + 1) / r.find("li").length * 100;
                $("#progressbarwizard").find(".bar").css({ width: o + "%" });
            },
            onNext:function(t,r,a){
                var isValid = true;

                $('.required').each(function(k, obj) {
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

                // if($('[name="source"]').val() == '')
                // {
                //     $('[name="source"]').siblings().css('border', '1px solid red')
                // }
                // else
                // {
                //     isValid = true;
                // }
                
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
            var siblingId = lastId[1]
            
            var newRow = `
                <div class="row mb-2" id="sibling_${siblingId}">
                    <div class="col-lg-3">
                        Name
                        <input type="text" name="" class="form-control form-control-sm">
                    </div>
                    <div class="col-lg-3">
                        Contact
                        <input type="text" name="" class="form-control form-control-sm">
                    </div>
                    <div class="col-lg-3">
                        Company Location
                        <input type="text" name="" class="form-control form-control-sm">
                    </div>
                    <div class="col-lg-3">
                        Contact No
                        <input type="text" name="" class="form-control form-control-sm">
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
    })
</script>
@endsection