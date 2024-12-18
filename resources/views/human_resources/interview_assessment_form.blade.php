@extends('layouts.app')
@section('css')
{{-- <link rel="stylesheet" href="{{asset('css/chosen.min.css')}}"> --}}
<link rel="stylesheet" href="{{asset('css/component-chosen.css')}}">
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
                <a class="btn btn-sm btn-danger mb-2" href="{{url('view-applicant/'.$applicant->id)}}">
                    <i class="dripicons-arrow-thin-left"></i>
                    Back
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <dl class="row mb-0">
                    <dt class="col-md-1">
                        <p class="mb-0">MRF No.</p>
                    </dt>
                    <dd class="col-md-9">
                        <p class="mb-0">MRF-{{str_pad($applicant->mrf->mrf_no, "4", 0, STR_PAD_LEFT)}}</p>
                    </dd>
                </dl>
                <dl class="row mb-0">
                    <dt class="col-md-1">
                        <p class="mb-0">Applicant Name</p>
                    </dt>
                    <dd class="col-md-9">
                        <p class="mb-0">{{$applicant->lastname.' '.$applicant->firstname.' '.$applicant->middlename}}</p>
                    </dd>
                </dl>
                <hr class="mt-0 mb-2">
                <h1 class="header-title mb-3">Interview Assessment Form</h1>
                <form method="POST" action="{{url('submit-interview-assessment')}}" onsubmit="show()">
                    @csrf
                    
                    <input type="hidden" name="applicant_id" value="{{$applicant->id}}">

                    {{-- <h4 class="header-title">BACKGROUND</h4>
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            Personal Background
                            <textarea name="personal_background" class="form-control" cols="30" rows="10">{!! nl2br(optional($applicant->interviewAssessment)->personal_background) !!}</textarea>
                        </div>
                        <div class="col-lg-6 mb-2">
                            Qualification
                            <textarea name="qualification" class="form-control" cols="30" rows="10">{!! nl2br(optional($applicant->interviewAssessment)->qualification) !!}</textarea>
                        </div>
                        <div class="col-lg-6 mb-2">
                            Reason for Transfer
                            <textarea name="reason_for_transfer" class="form-control" cols="30" rows="10">{!! nl2br(optional($applicant->interviewAssessment)->reason_for_transfer) !!}</textarea>
                        </div>
                        <div class="col-lg-6 mb-2">
                            Examination Result
                            <input type="text" name="examination_result" class="form-control" value="{{optional($applicant->interviewAssessment)->examination_result}}">
                        </div>
                    </div> --}}

                    @if(auth()->user()->role == 'Human Resources' || auth()->user()->role == 'Human Resources Manager')
                    <h4 class="header-title">HBU ASSESSMENT</h4>
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            Interviewer's Assessment
                            <textarea name="interview_assessment" class="form-control" cols="30" rows="10" required>{{optional($applicant->interviewAssessment)->interview_assessment}}</textarea>
                        </div>
                    </div>
    
                    <h4 class="header-title">FOR COMPENSATION PURPOSES ONLY</h4>
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <p class="mt-2 mb-0">Salary Scale</p>
                            {{-- <input type="text" name="salary_scale" class="form-control" value="{{optional($applicant->interviewAssessment)->salary_scale}}" required> --}}
                            <select name="salary_scale" class="form-control cat" required>
                                <option value="">Select salary scale</option>
                                <option value="2" @if(optional($applicant->interviewAssessment)->salary_scale == 2) selected @endif>2</option>
                                <option value="3" @if(optional($applicant->interviewAssessment)->salary_scale == 3) selected @endif>3</option>
                                <option value="4" @if(optional($applicant->interviewAssessment)->salary_scale == 4) selected @endif>4</option>
                                <option value="5" @if(optional($applicant->interviewAssessment)->salary_scale == 5) selected @endif>5</option>
                                <option value="6" @if(optional($applicant->interviewAssessment)->salary_scale == 6) selected @endif>6</option>
                                <option value="7" @if(optional($applicant->interviewAssessment)->salary_scale == 7) selected @endif>7</option>
                                <option value="8" @if(optional($applicant->interviewAssessment)->salary_scale == 8) selected @endif>8</option>
                                <option value="9" @if(optional($applicant->interviewAssessment)->salary_scale == 9) selected @endif>9</option>
                                <option value="10"@if(optional($applicant->interviewAssessment)->salary_scale == 10) selected @endif>10</option>
                            </select>
                        </div>
                        <div class="col-lg-6 mb-2">
                            Salary Peers 
                            <button type="button" class="btn btn-sm btn-success" id="addSalaryPeers"><i class="uil-plus"></i></button> 
                            <button type="button" class="btn btn-sm btn-danger" id="removeSalaryPeers"><i class="uil-minus"></i></button>
                            <div class="row" id="salaryPeersContainer">
                                @if($applicant->interviewAssessment != null)
                                    @if(count($applicant->interviewAssessment->salaryPeers) > 0)
                                        @foreach ($applicant->interviewAssessment->salaryPeers as $salary_peers)
                                            <div class="col-lg-12 mb-2">
                                                <input type="text" name="salary_peers[]" class="form-control" value="{{$salary_peers->salary_peers}}" required>
                                            </div>
                                        @endforeach
                                    @else
                                    <div class="col-lg-12 mb-2">
                                        <input type="text" name="salary_peers[]" class="form-control" required>
                                    </div>
                                    @endif
                                @else
                                <div class="col-lg-12 mb-2">
                                    <input type="text" name="salary_peers[]" class="form-control" required>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            Current Salary
                            <input type="text" name="current_salary" class="form-control" value="{{optional($applicant->interviewAssessment)->current_salary}}" required>
                        </div>
                        <div class="col-lg-6 mb-2">
                            Expected Salary
                            <input type="text" name="expected_salary" class="form-control" value="{{optional($applicant->interviewAssessment)->expected_salary}}" required>
                        </div>
                        <div class="col-lg-6 mb-2">
                            Recommendation by Human Resources
                            <input type="text" name="recommendation_by_human_resources" class="form-control" value="{{optional($applicant->interviewAssessment)->recommendation_by_human_resources}}" required>
                        </div>
                        <div class="col-lg-6 mb-2">
                            Recommendation by Vice President / CEO / President
                            <input type="text" name="recommendation_hbu" class="form-control" value="{{optional($applicant->interviewAssessment)->recommendation_hbu}}" required>
                        </div>
                        <div class="col-lg-6 mb-2">
                            Negotiated Amount
                            <input type="text" name="negotiated_amount" class="form-control" value="{{optional($applicant->interviewAssessment)->negotiated_amount}}" required>
                        </div>
                        <div class="col-lg-6 mb-2">
                            Remarks
                            <input type="text" name="remarks" class="form-control" value="{{optional($applicant->interviewAssessment)->remarks}}" required>
                        </div>
                    </div>

                    <h4 class="header-title">PRELIMINARY INTERVIEW - HR ASSESSMENT</h4>
                    <hr>

                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <b>Appearance</b>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="appearance" value="1" @if(optional($applicant->interviewAssessment)->appearance == 1) checked @endif>
                                        <label class="ms-1">Indifferent to attire and gromming sloppy unkempt</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="appearance" class="form-check-input" value="2" @if(optional($applicant->interviewAssessment)->appearance == 2) checked @endif>
                                        <label class="ms-1">Careless Attire, poor grooming</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="appearance" class="form-check-input" value="3" @if(optional($applicant->interviewAssessment)->appearance == 3) checked @endif>
                                        <label class="ms-1">Functional attire, neatly groomed</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="appearance" class="form-check-input" value="4" @if(optional($applicant->interviewAssessment)->appearance == 4) checked @endif>
                                        <label class="ms-1">Well groomed</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="appearance" class="form-check-input" value="5" @if(optional($applicant->interviewAssessment)->appearance == 5) checked @endif>
                                        <label class="ms-1">Immaculate attire and gromming</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <b>Bearing</b>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="bearing" value="1" @if(optional($applicant->interviewAssessment)->bearing == 1) checked @endif>
                                        <label class="ms-1">No bearing, lacks confidence, slovenly posture</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="bearing" class="form-check-input" value="2" @if(optional($applicant->interviewAssessment)->bearing == 2) checked @endif>
                                        <label class="ms-1">Often appears uncertain, poor posture</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="bearing" class="form-check-input" value="3" @if(optional($applicant->interviewAssessment)->bearing == 3) checked @endif>
                                        <label class="ms-1">Holds self well, seems confident</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="bearing" class="form-check-input" value="4" @if(optional($applicant->interviewAssessment)->bearing == 4) checked @endif>
                                        <label class="ms-1">Sure of self, reflects confidence</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="bearing" class="form-check-input" value="5" @if(optional($applicant->interviewAssessment)->bearing == 5) checked @endif>
                                        <label class="ms-1">Highly confident, inspires other, asserts presence</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <b>Expression</b>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="expression" value="1" @if(optional($applicant->interviewAssessment)->expression == 1) checked @endif>
                                        <label class="ms-1">Uncommunicative, confused thoughts, poor vocabulary</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="expression" class="form-check-input" value="2" @if(optional($applicant->interviewAssessment)->expression == 2) checked @endif>
                                        <label class="ms-1">Poor speaker, hazy thoughts</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="expression" class="form-check-input" value="3" @if(optional($applicant->interviewAssessment)->expression == 3) checked @endif>
                                        <label class="ms-1">Speaks well, expressess ideas adequately</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="expression" class="form-check-input" value="4" @if(optional($applicant->interviewAssessment)->expression == 4) checked @endif>
                                        <label class="ms-1">Speaks and thinks clearly with confidence</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="expression" class="form-check-input" value="5" @if(optional($applicant->interviewAssessment)->expression == 5) checked @endif>
                                        <label class="ms-1">Exceptional speaks clearly and concisely with confidence ideas well thought out</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <b>Motivation</b>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="motivation" value="1" @if(optional($applicant->interviewAssessment)->motivation == 1) checked @endif>
                                        <label class="ms-1">None apathetic, indifferent, disinterested</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="motivation" class="form-check-input" value="2" @if(optional($applicant->interviewAssessment)->motivation == 2) checked @endif>
                                        <label class="ms-1">Doubtful interest in position</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="motivation" class="form-check-input" value="3" @if(optional($applicant->interviewAssessment)->motivation == 3) checked @endif>
                                        <label class="ms-1">Sincere desire to do work</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="motivation" class="form-check-input" value="4" @if(optional($applicant->interviewAssessment)->motivation == 4) checked @endif>
                                        <label class="ms-1">Strong interest in position, asks questions</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="motivation" class="form-check-input" value="5" @if(optional($applicant->interviewAssessment)->motivation == 5) checked @endif>
                                        <label class="ms-1">Highly motivated, eager to work, asks many quetions</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <b>Personality</b>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="personality" value="1" @if(optional($applicant->interviewAssessment)->personality == 1) checked @endif>
                                        <label class="ms-1">Unpleasant</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="personality" class="form-check-input" value="2" @if(optional($applicant->interviewAssessment)->personality == 2) checked @endif>
                                        <label class="ms-1">Slightly objectionable</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="personality" class="form-check-input" value="3" @if(optional($applicant->interviewAssessment)->personality == 3) checked @endif>
                                        <label class="ms-1">Likeable</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="personality" class="form-check-input" value="4" @if(optional($applicant->interviewAssessment)->personality == 4) checked @endif>
                                        <label class="ms-1">Pleasing</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="personality" class="form-check-input" value="5" @if(optional($applicant->interviewAssessment)->personality == 5) checked @endif>
                                        <label class="ms-1">Extremely pleasing / charming</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-2">
                            <h4 class="header-title">Functional</h4>
                            <div class="row">
                                <b>Job Knowledge</b>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="job_knowledge" value="1" @if(optional($applicant->interviewAssessment)->job_knowledge == 1) checked @endif>
                                        <label class="ms-1">None as pertains to this position</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="job_knowledge" value="2" @if(optional($applicant->interviewAssessment)->job_knowledge == 2) checked @endif>
                                        <label class="ms-1">Will need considerable training</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="job_knowledge" value="3" @if(optional($applicant->interviewAssessment)->job_knowledge == 3) checked @endif>
                                        <label class="ms-1">Basic but will learn on</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="job_knowledge" value="4" @if(optional($applicant->interviewAssessment)->job_knowledge == 4) checked @endif>
                                        <label class="ms-1">Well versed in position, little training needed</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="job_knowledge" value="5" @if(optional($applicant->interviewAssessment)->job_knowledge == 5) checked @endif>
                                        <label class="ms-1">Extremely well versed, able to work without further training</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 mb-2">
                            Strengths
                            <textarea name="hr_strengths" class="form-control" cols="30" rows="10">{{optional($applicant->interviewAssessment)->hr_strengths}}</textarea>
                        </div>
                        <div class="col-lg-6 mb-2">
                            Areas of Improvements
                            <textarea name="hr_areas_of_improvements" class="form-control" cols="30" rows="10">{{optional($applicant->interviewAssessment)->hr_areas_of_improvements}}</textarea>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <b>Recommendation</b>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="hr_recommendation" value="1" @if(optional($applicant->interviewAssessment)->hr_recommendation == 1) checked @endif>
                                        <label class="ms-1">For further interview</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="hr_recommendation" class="form-check-input" value="2" @if(optional($applicant->interviewAssessment)->hr_recommendation == 2) checked @endif>
                                        <label class="ms-1">Not qualified</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="hr_recommendation" class="form-check-input" value="3" @if(optional($applicant->interviewAssessment)->hr_recommendation == 3) checked @endif>
                                        <label class="ms-1">For waiting list</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <h5>IMMEDIATE SUPERIOR ASSESSMENT</h5>
                        <hr>

                        <div class="col-lg-12 mb-2">
                            <h4 class="header-title">Interviewer's Assessment</h4>
                            <div class="row">
                                <b>Job Knowledge</b>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="job_knowledge_superior">
                                        <label class="ms-1">None as pertains to this position</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="job_knowledge_superior">
                                        <label class="ms-1">Will need considerable training</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="job_knowledge_superior">
                                        <label class="ms-1">Basic but will learn on</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="job_knowledge_superior">
                                        <label class="ms-1">Well versed in position, little training needed</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="job_knowledge_superior">
                                        <label class="ms-1">Extremely well versed, able to work without further training</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-2">
                            Strengths
                            <textarea name="superior_strengths" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-lg-6 mb-2">
                            Areas of Improvements
                            <textarea name="superior_improvements" class="form-control" cols="30" rows="10"></textarea>
                        </div>

                        <h5>DEPARTMENT HEAD ASSESSMENT</h5>
                        <hr>

                        <div class="col-lg-12 mb-2">
                            <h4 class="header-title">Interviewer's Assessment</h4>
                            <div class="row">
                                <b>Job Knowledge</b>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="job_knowledge_superior">
                                        <label class="ms-1">None as pertains to this position</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="job_knowledge_superior">
                                        <label class="ms-1">Will need considerable training</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="job_knowledge_superior">
                                        <label class="ms-1">Basic but will learn on</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="job_knowledge_superior">
                                        <label class="ms-1">Well versed in position, little training needed</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="job_knowledge_superior">
                                        <label class="ms-1">Extremely well versed, able to work without further training</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-2">
                            Strengths
                            <textarea name="superior_strengths" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-lg-6 mb-2">
                            Areas of Improvements
                            <textarea name="superior_improvements" class="form-control" cols="30" rows="10"></textarea>
                        </div> --}}

                    </div>
                    @endif

                    @if(auth()->user()->role == 'Department Head')
                    <h4 class="header-title">Department Head Assessment</h4>
                    <div class="col-lg-12">
                        <div class="col-lg-12 mb-2">
                            <b>Job Knowledge</b>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="head_job_knowledge" value="1" @if(optional($applicant->interviewAssessment)->head_job_knowledge == 1) checked @endif>
                                        <label class="ms-1">None as pertains to this position</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="head_job_knowledge" class="form-check-input" value="2" @if(optional($applicant->interviewAssessment)->head_job_knowledge == 2) checked @endif>
                                        <label class="ms-1">Will need considerable training</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="head_job_knowledge" class="form-check-input" value="3" @if(optional($applicant->interviewAssessment)->head_job_knowledge == 3) checked @endif>
                                        <label class="ms-1">Basic but will learn on</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="head_job_knowledge" class="form-check-input" value="4" @if(optional($applicant->interviewAssessment)->head_job_knowledge == 4) checked @endif>
                                        <label class="ms-1">Well versed in position, little training needed</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" name="head_job_knowledge" class="form-check-input" value="5" @if(optional($applicant->interviewAssessment)->head_job_knowledge == 5) checked @endif>
                                        <label class="ms-1">Extremely well versed, able to work without further training</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    Strength
                                    <textarea name="head_strength" class="form-control" cols="30" rows="10" required>{!! nl2br(optional($applicant->interviewAssessment)->head_strength) !!}</textarea>
                                </div>
                                <div class="col-lg-6">
                                    Areas for Improvement
                                    <textarea name="head_areas_for_improvement" class="form-control" cols="30" rows="10" required>{!! nl2br(optional($applicant->interviewAssessment)->head_areas_for_improvement) !!}</textarea>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <b>Recommendation</b>
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="head_recommendation" value="1" @if(optional($applicant->interviewAssessment)->head_recommendation == 1) checked @endif>
                                                <label class="ms-1">For further interview</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-check">
                                                <input type="radio" name="head_recommendation" class="form-check-input" value="2" @if(optional($applicant->interviewAssessment)->head_recommendation == 2) checked @endif>
                                                <label class="ms-1">Not qualified</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-check">
                                                <input type="radio" name="head_recommendation" class="form-check-input" value="3" @if(optional($applicant->interviewAssessment)->head_recommendation == 3) checked @endif>
                                                <label class="ms-1">For waiting list</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    @endif
                    <div class="d-grid">
                        @if($applicant->interviewAssessment != null)
                        <a href="{{url('print-interview-assessment/'.$applicant->interviewAssessment->id)}}" class="btn btn-danger mb-2" target="_blank">Print</a>
                        @endif
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="{{asset('js/chosen.jquery.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.cat').chosen({width:"100%"})

        $('#addSalaryPeers').on('click', function() {
            var newRow = `
                <div class="col-lg-12 mb-2">
                    <input type="text" name="salary_peers[]" class="form-control" required>
                </div>
            `

            $('#salaryPeersContainer').append(newRow)
        })

        $("#removeSalaryPeers").on('click', function() {
            if($("#salaryPeersContainer").children().length > 1)
            {
                $("#salaryPeersContainer").children().last().remove()
            }
        })
    })
</script>
@endsection