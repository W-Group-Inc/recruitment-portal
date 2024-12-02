@extends('layouts.app')
@section('css')
{{-- <link rel="stylesheet" href="{{asset('css/chosen.min.css')}}"> --}}
<link rel="stylesheet" href="{{asset('css/component-chosen.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="row">
        <div class="col-lg-6">
            <a class="btn btn-sm btn-danger mb-2" href="{{url('applicant')}}">
                <i class="dripicons-arrow-thin-left"></i>
                Back to list
            </a>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card text-center">
            <div class="card-body">
                <img src="{{asset('img/user.png')}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                <h4 class="mb-2 mt-2">{{$applicant->lastname.' '.$applicant->firstname.' '.$applicant->middlename}}</h4>

                @foreach ($applicant->interviewers->where('status', 'Pending')->where('user_id', auth()->user()->id)->where('applicant_id', $applicant->id) as $i)
            
                    <button type="button" class="btn btn-danger btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#failedApplicant">Fail</button>
                    
                    <form method="POST" action="{{url('update-status/'.$applicant->id)}}" class="d-inline-block" onsubmit="show()">
                        @csrf

                        <input type="hidden" name="action" value="passed">
                        <input type="hidden" name="interviewer_id" value="{{$i->id}}">

                        <button type="button" class="btn btn-success btn-sm mb-2 passedBtn">Pass</button>
                    </form>

                    {{-- @if(auth()->user()->role == 'Human Resources' || auth()->user()->role == 'Human Resources Manager')
                    <a href="{{url('print-jo/'.$applicant->id)}}" type="button" class="btn btn-primary btn-sm mb-2" target="_blank">Job Offer</a>
                    <button type="button" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#jobOffer{{$applicant->id}}">Job Offer</button>

                        @if($applicant->applicant_status == 'Pending')
                        <button type="button" class="btn btn-secondary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#schedule">Schedule Interview</button>
                        @endif
                    @endif --}}

                    @if($applicant->applicant_status == 'Pending')
                    <a href="{{url('interview-assessment/'.$applicant->id)}}" class="btn btn-warning btn-sm mb-2">Interview Assessment Form</a>
                    @endif
                @endforeach

                @if(auth()->user()->role == 'Human Resources Manager')
                <button type="button" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#jobOffer{{$applicant->id}}">Job Offer</button>
                @endif

                <hr>
                <div class="text-start mt-3">
                    <p class="text-muted mb-2 font-13"><strong>Position Applied :</strong> <span class="ms-2">{{$applicant->mrf->jobPosition->position}}</span></p>
                    <p class="text-muted mb-2 font-13"><strong>Email:</strong> <span class="ms-2">{{$applicant->email}}</span></p>
                    {{-- <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">{{$applicant->mobile_number}}</span></p> --}}
                    <p class="text-muted mb-2 font-13"><strong>Status :</strong>
                        @if($applicant->applicant_status == "Pending")
                        <span class="ms-2 badge bg-warning">{{$applicant->applicant_status}}</span>
                        @elseif($applicant->applicant_status == "Passed")
                        <span class="ms-2 badge bg-success">{{$applicant->applicant_status}}</span>
                        @elseif($applicant->applicant_status == "Failed")
                        <span class="ms-2 badge bg-danger">{{$applicant->applicant_status}}</span>
                        @endif
                    </span></p>
                    <p class="text-muted mb-2 font-13"><strong>Date Applied :</strong><span class="ms-2">{{date('M d, Y', strtotime($applicant->created_at))}}</span></p>
                    <p class="text-muted mb-2 font-13"><strong>Resume</strong><span class="ms-2"><a href="{{url($applicant->resume)}}"  target="_blank"><i class="uil-file"></i></a></span></p>
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col-->

    <div class="col-lg-9 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body">
                {{-- @if(session()->has('access_token'))
                    @php
                        $token = session()->get('access_token');
                    @endphp
                    <pre>{{ json_encode($token, JSON_PRETTY_PRINT) }}</pre>
                @else
                    <p>Google access token not available.</p>
                @endif --}}
                <h3 class="fs-3"><i class="uil-calendar-alt me-2"></i>Schedule</h3>
                <hr>
                @if($interviewer)
                    @if(session()->has('access_token'))
                        <button type="button" class="btn btn-secondary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#schedule">Add Schedule Interview</button>
                    @else
                        <form method="POST" action="{{url('schedule-interview')}}" onsubmit="show()" >
                            @csrf 
                            <button type="submit" class="btn btn-danger btn-sm mb-2">Sign In Google</button>
                        </form>
                    @endif
                @endif
                <div class="table-responsive">
                    <table class="table tables table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Date</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Name of Schedule</th>
                                <th>Interviewer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applicant->schedule as $sched)
                                <tr>
                                    <td>
                                        @if($sched->user_id == auth()->user()->id)
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#schedule{{$sched->id}}" @if($check_if_passed->status == 'Passed') disabled @endif>
                                                <i class="dripicons-document-edit"></i>
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        {{date('M d, Y', strtotime($sched->start_datetime))}}
                                    </td>
                                    <td>
                                        {{date('g:i A', strtotime($sched->start_datetime))}}
                                    </td>
                                    <td>
                                        {{date('g:i A', strtotime($sched->end_datetime))}}
                                    </td>
                                    <td>
                                        {{$sched->schedule_name}}
                                    </td>
                                    <td>{{$sched->user->name}}</td>
                                </tr>

                                @include('human_resources.update_schedule')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3  d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body">
                <h3 class="fs-3">
                    <i class="uil-user"></i>
                    Interviewer
                </h3>
                <hr>
                {{-- <div class="row">
                    <div class="col-lg-6">
                        <b>Name</b>
                    </div>
                    <div class="col-lg-6">
                        <b>Status</b>
                    </div>
                    @foreach ($applicant->mrf->interviewer as $i)
                        <div class="col-lg-6">
                            {{$i->user->name}}
                        </div>
                        <div class="col-lg-6">
                            @if($i->status == 'Pending')
                                <div class="badge bg-warning">{{$i->status}}</div>
                            @else
                                <div class="badge bg-info">{{$i->status}}</div>
                            @endif
                        </div>
                    @endforeach
                </div> --}}
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($applicant->interviewers) > 0)
                                @foreach ($applicant->interviewers as $i)
                                <tr>
                                    <td>
                                        {{$i->user->name}}
                                    </td>
                                    <td>
                                        @if($i->status == 'Pending')
                                            <div class="badge bg-warning">{{$i->status}}</div>
                                        @elseif($i->status == 'Failed')
                                            <div class="badge bg-danger">{{$i->status}}</div>
                                            
                                        @elseif($i->status == 'Passed')
                                            <div class="badge bg-success">{{$i->status}}</div>
                                        @else
                                            <div class="badge bg-info">{{$i->status}}</div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr><td colspan="2">No interviewer available.</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-9 col-lg-7">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                            {{-- <i class="mdi mdi-home-variant d-md-none d-block"></i> --}}
                            <span class="d-none d-md-block">Application Status</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#applicantDocuments" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            {{-- <i class="mdi mdi-home-variant d-md-none d-block"></i> --}}
                            <span class="d-none d-md-block">Pre-employment Requirements</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#examResult" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            {{-- <i class="mdi mdi-home-variant d-md-none d-block"></i> --}}
                            <span class="d-none d-md-block">Assessment Results</span>
                        </a>
                    </li>
                </ul>
                
                <div class="tab-content">
                    <div class="tab-pane show active" id="home">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover tables">
                                <thead>
                                    <tr>
                                        <th>Position</th>
                                        <th>Date Applied</th>
                                        <th>Interviewed By</th>
                                        <th>Remarks</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($applicant->historyApplicant as $history)
                                        <tr>
                                            <td>{{$history->position}}</td>
                                            <td>{{date('M d, Y', strtotime($history->date_applied))}}</td>
                                            <td>{{$history->interviewer->name}}</td>
                                            <td>{{$history->applicant->remarks}}</td>
                                            <td>
                                                @if($history->status == 'Passed')
                                                <span class="badge bg-success">{{$history->status}}</span>
                                                @else
                                                <span class="badge bg-danger">{{$history->status}}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="applicantDocuments">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover tables">
                                <thead>
                                    <tr>
                                        <th>Actions</th>
                                        <th>Document</th>
                                        <th>Document Files</th>
                                        <th>Status</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documents as $docs)
                                        @php
                                            $applicant_docs = $docs->applicantDocument->where('applicant_id', $applicant->id)->first();
                                        @endphp
                                        <tr>
                                            <td>
                                                @if($applicant->applicant_status == 'Passed')
                                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#returned{{$docs->id}}">
                                                        <i class="dripicons-return"></i>
                                                    </button>
                                                @endif
                                            </td>
                                            <td>{{$docs->document_name}}</td>
                                            <td>
                                                @if(!empty($applicant_docs))
                                                <a href="{{url($applicant_docs->document_file)}}" target="_blank">
                                                    <i class="uil-file"></i>
                                                </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if(!empty($applicant_docs))
                                                    @if($applicant_docs->status == 'Submitted')
                                                    <span class="badge bg-success">Submitted</span>
                                                    @elseif($applicant_docs->status == 'Returned')
                                                    <span class="badge bg-warning">Returned</span>
                                                    @endif
                                                @else
                                                <span class="badge bg-danger">Not Submitted</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if(!empty($applicant_docs))
                                                    {{$applicant_docs->remarks}}
                                                @endif
                                            </td>
                                        </tr>

                                        @include('human_resources.returned_docs')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="examResult">
                        @if(!empty($applicant->examResult))
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#newExam">
                                <i class="dripicons-pencil"></i>
                                Update
                            </button>
                        @else
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#newExam">
                                <i class="uil-plus"></i>
                                Add
                            </button>
                        @endif
                        <div class="table-responsive">
                            {{-- <table class="table table-bordered table-hover tables">
                                <thead>
                                    <tr>
                                        <th>Actions</th>
                                        <th>Critical Thinking Assessment</th>
                                        <th>DISC Personality Profile</th>
                                        @if($applicant->mrf->job_level == 'Supervisory')
                                        <th>Supervisory Skills Test</th>
                                        @elseif($applicant->mrf->job_level == 'Managerial')
                                        <th>Managerial Skills Test</th>
                                        @endif
                                        @if(accountingDepartment($applicant->mrf->department_id))
                                        <th>Accounting Skills Test</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exam_result as $ex_res)
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editExam{{$ex_res->id}}">
                                                    <i class="dripicons-document-edit"></i>
                                                </button>
                                            </td>
                                            <td>{{$ex_res->critical_thinking}}</td>
                                            <td>{{$ex_res->disc_personality}}</td>
                                            @if($applicant->mrf->job_level == 'Supervisory')
                                                <td>{{$ex_res->supervisory_skills}}</td>
                                            @elseif($applicant->mrf->job_level == 'Managerial')
                                                <td>{{$ex_res->managerial_skills}}</td>
                                            @endif
                                            @if(accountingDepartment($applicant->mrf->department_id))
                                                <td>{{$ex_res->accounting_skills}}</td>
                                            @endif
                                        </tr>

                                        @include('human_resources.edit_exam')
                                    @endforeach
                                </tbody>
                            </table> --}}
                            <table class="table table-bordered table-hover table-sm tables" style="table-layout: fixed;">
                                <thead class="table-secondary">
                                    <tr>
                                        <th colspan="2">Results</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(empty($applicant->examResult))
                                        <tr>
                                            <td colspan="2" class="text-center">No assessment results yet.</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>Critical Thinking Assessment</td>
                                            <td>{{$applicant->examResult->critical_thinking}}</td>
                                        </tr>
                                        <tr>
                                            <td>DISC Personality Profile</td>
                                            <td>{{$applicant->examResult->disc_personality}}</td>
                                        </tr>
                                        @if($applicant->mrf->job_level == 'Supervisory')
                                            <tr>
                                                <td>Supervisory Skills</td>
                                                <td>{{$applicant->examResult->supervisory_skills}}</td>
                                            </tr>
                                        @endif
                                        @if($applicant->mrf->job_level == 'Managerial')
                                            <tr>
                                                <td>Managerial Skills</td>
                                                <td>{{$applicant->examResult->managerial_skills}}</td>
                                            </tr>
                                        @endif
                                        @if(accountingDepartment($applicant->mrf->department_id))
                                            <tr>
                                                <td>Accounting Skills</td>
                                                <td>{{$applicant->examResult->accounting_skills}}</td>
                                            </tr>
                                        @endif
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end card body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>

@include('human_resources.new_exam')
@include('human_resources.schedule_interview')
@include('human_resources.job_offer')
@foreach ($applicant->mrf->interviewer->where('status', 'Pending')->where('user_id', auth()->user()->id)->where('applicant_id', $applicant->id) as $i)
@include('human_resources.failed_applicant')
@endforeach

@section('js')
    <script src="{{asset('js/chosen.jquery.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.cat').chosen({width:"100%"})
            
            $('.tables').DataTable({
                ordering: false,
                paginate: false
            })

            $('.passedBtn').on('click', function() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "The applicant will be passed",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Passed it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).closest('form').submit()
                    }
                });
            })

            $('.failedBtn').on('click', function() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "The applicant will be failed",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Failed it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).closest('form').submit()
                    }
                });
            })
        })
    </script>
@endsection
@endsection