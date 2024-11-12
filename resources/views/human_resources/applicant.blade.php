@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/component-chosen.css')}}">
@endsection
@section('content')
    <div class="row">
        <h4 class="header-title">Applicants</h4>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="uil-user text-muted" style="font-size: 24px;"></i>
                    <h3><span>{{count($applicants)}}</span></h3>
                    <p class="text-muted font-15 mb-0">Total Applicants</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="uil-user text-muted" style="font-size: 24px;"></i>
                    <h3><span>{{count($applicants->where('applicant_status','Pending'))}}</span></h3>
                    <p class="text-muted font-15 mb-0">Total Pending Applicant</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="uil-user text-muted" style="font-size: 24px;"></i>
                    <h3><span>{{count($applicants->where('applicant_status','Passed'))}}</span></h3>
                    <p class="text-muted font-15 mb-0">Total Passed Applicant</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="uil-user text-muted" style="font-size: 24px;"></i>
                    <h3><span>{{count($applicants->where('applicant_status','Rejected'))}}</span></h3>
                    <p class="text-muted font-15 mb-0">Total Failed Applicant</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="GET" onsubmit="show()">
                        <div class="row">
                            <div class="col-lg-3">
                                Position
                                <select name="position" class="form-control cat">
                                    <option value="">Select position</option>
                                    @foreach ($mrf as $m)
                                        <option value="{{$m->job_position_id}}" @if($m->job_position_id == $position) selected @endif>{{$m->jobPosition->position}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                Status
                                <select name="status" class="form-control cat">
                                    <option value="">Select status</option>
                                    <option value="Pending" @if($status == 'Pending') selected @endif>Pending</option>
                                    <option value="Approved" @if($status == 'Approved') selected @endif>Approved</option>
                                    <option value="Rejected" @if($status == 'Rejected') selected @endif>Rejected</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                Department
                                <select name="department" class="form-control cat">
                                    <option value="">Select department</option>
                                    @foreach ($mrf as $m)
                                        <option value="{{$m->department_id}}" @if($m->department_id == $department) selected @endif>{{$m->department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label for="">&nbsp;</label>
                                <div class="form-group">
                                    <button class="btn btn-sm btn-success">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('components.error')
                    
                    {{-- @if(auth()->user()->role == "Human Resources")
                    <button class="mb-3 btn btn-success btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#add">
                        <i class="uil-plus"></i>
                        Add Applicant
                    </button>
                    @endif --}}

                    <div class="table-responsive">
                        <table id="alternative-page-datatable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Actions</th>
                                    <th>Lastname</th>
                                    <th>Firstname</th>
                                    <th>Middlename</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th>Date Applied</th>
                                    <th>Interviewer</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(auth()->user()->role == "Human Resources" || auth()->user()->role == 'Human Resources Manager' || auth()->user()->role == "Head Business Unit")
                                @foreach ($applicants as $applicant)
                                    <tr>
                                        <td>
                                            <a href="{{url('view-applicant/'.$applicant->id)}}" class="btn btn-sm btn-info" title="View Applicant">
                                                <i class="uil-eye"></i>
                                            </a>    
                                            {{-- @if($applicant->applicant_status != 'Pending')
                                            @endif --}}
                                            
                                            {{-- @if($applicant->applicant_status == "Pending")
                                            <button type="button" class="btn btn-warning btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#edit{{$applicant->id}}">
                                                <i class="dripicons-pencil"></i>
                                            </button>
                                            @endif --}}
                                            @if(auth()->user()->role == 'Human Resources Manager')
                                                @if($applicant->applicant_status == "Pending")
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#interviewer{{$applicant->id}}">
                                                    <i class="uil-user"></i>
                                                </button>
                                                @endif
                                            @endif

                                            <button type="button" class="btn btn-sm btn-warning" title="Applicant Status" data-bs-toggle="modal" data-bs-target="#applicantStatus{{$applicant->id}}">
                                                <i class="dripicons-document-edit"></i>
                                            </button>
                                        </td>
                                        <td>{{$applicant->lastname}}</td>
                                        <td>{{$applicant->firstname}}</td>
                                        <td>{{$applicant->middlename}}</td>
                                        <td>{{$applicant->email}}</td>
                                        <td>{{$applicant->mrf->jobPosition->position}}</td>   
                                        <td>{{date('M. d, Y', strtotime($applicant->created_at))}}</td> 
                                        <td>
                                            @foreach ($applicant->interviewers as $key=>$interviewer)
                                                <small>{{$key+1}} . {{$interviewer->user->name}} - 
                                                    @if($interviewer->status == 'Passed')
                                                    <span class="badge bg-success">
                                                    @elseif($interviewer->status == 'Pending')
                                                    <span class="badge bg-warning">
                                                    @elseif($interviewer->status == 'Failed')
                                                    <span class="badge bg-danger">
                                                    @elseif($interviewer->status == 'Waiting')
                                                    <span class="badge bg-info">
                                                    @endif
                                                    {{$interviewer->status}}
                                                    </span>
                                                </small> 
                                                <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($applicant->applicant_status == "Pending")
                                            <span class="badge bg-warning">
                                            @elseif($applicant->applicant_status == "Passed")
                                            <span class="badge bg-success">
                                            @elseif($applicant->applicant_status == "Failed")
                                            <span class="badge bg-danger">
                                            @elseif($applicant->applicant_status == "Cancelled")
                                            <span class="badge bg-danger">
                                            @endif
                                                {{$applicant->applicant_status}}
                                            </span>
                                        </td>
                                    </tr>

                                    @include('human_resources.edit_applicant')
                                    @include('human_resources.applicant_status')
                                @endforeach
                                @endif

                                @if(auth()->user()->role == "Department Head")
                                @foreach ($applicants as $applicant)
                                    <tr>
                                        <td>
                                            <a href="{{url('view-applicant/'.$applicant->id)}}" class="btn btn-sm btn-info">
                                                <i class="uil-eye"></i>
                                            </a>
                                        </td>
                                        <td>{{$applicant->lastname}}</td>
                                        <td>{{$applicant->firstname}}</td>
                                        <td>{{$applicant->middlename}}</td>
                                        <td>{{$applicant->email}}</td>
                                        <td>{{$applicant->mrf->jobPosition->position}}</td>   
                                        <td>{{date('M. d, Y', strtotime($applicant->created_at))}}</td> 
                                        <td>
                                            @foreach ($applicant->interviewers as $key=>$interviewer)
                                                <small>{{$key+1}} . {{$interviewer->user->name}} - 
                                                    @if($interviewer->status == 'Passed')
                                                    <span class="badge bg-success">
                                                    @elseif($interviewer->status == 'Pending')
                                                    <span class="badge bg-warning">
                                                    @elseif($interviewer->status == 'Failed')
                                                    <span class="badge bg-danger">
                                                    @elseif($interviewer->status == 'Waiting')
                                                    <span class="badge bg-info">
                                                    @endif
                                                    {{$interviewer->status}}
                                                    </span>
                                                </small> 
                                                <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($applicant->applicant_status == "Pending")
                                            <span class="badge bg-warning">
                                            @elseif($applicant->applicant_status == "Passed")
                                            <span class="badge bg-success">
                                            @elseif($applicant->applicant_status == "Failed")
                                            <span class="badge bg-danger">
                                            @elseif($applicant->applicant_status == "Cancelled")
                                            <span class="badge bg-danger">
                                            @endif
                                                {{$applicant->applicant_status}}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
    
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>

{{-- @include('human_resources.new_applicant') --}}
@foreach ($applicants as $key=>$applicant)
@include('dept_head.interviewer')
@endforeach
@endsection

@section('js')
<script src="{{asset('js/chosen.jquery.min.js')}}"></script>

<script>
    function add_interviewer(mrfId)
    {
        var lastId = $('.interviewer-container-'+mrfId).children().last().attr('id');
        console.log(lastId);
        
        if (lastId)
        {
            var id = lastId.split('_')
            var finalId = parseInt(id[2]) + 1
        }
        else
        {
            var finalId = 1
        }
        console.log(finalId);
        
        var new_row = `
            <div class="row" id="interviewer_${mrfId}_${finalId}">
                <div class="col-md-1">
                    <small>${finalId}</small>
                </div>
                <div class="col-md-11 mb-3">
                    <select name="interviewer[]" class="form-control cat">
                        <option value="">- Interviewer -</option>
                        @foreach ($interviewers->whereIn('role', ['Department Head', 'Human Resources', 'Head Business Unit', 'Human Resources Manager']) as $interviewer)
                            <option value="{{$interviewer->id}}">{{$interviewer->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        `

        $('.interviewer-container-'+mrfId).append(new_row)
        $('.cat').chosen({width:"100%"})
    }

    function delete_interviewer(mrfId)
    {
        if ($('.interviewer-container-'+mrfId+' .row').length > 1)
        {
            var itemData = $('.interviewer-container-'+mrfId).children().last().attr('id')
            
            $("#"+itemData).remove()
            // $('.interviewer-container-'+mrfId+' #interviewer_'+mrfId+).remove()
        }
    }
    
    $(document).ready(function() {
        $('.cat').chosen({width:"100%"})
    })
</script>
@endsection