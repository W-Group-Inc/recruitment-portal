@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/component-chosen.css')}}">
@endsection
@section('content')
    <div class="row">
        <h4 class="header-title">Applicants</h4>
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
                                    <th>Interviewer</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(auth()->user()->role == "Human Resources")
                                @foreach ($applicants as $applicant)
                                    <tr>
                                        <td>
                                            @if($applicant->applicant_status != 'Pending')
                                            <a href="{{url('view-applicant/'.$applicant->id)}}" class="btn btn-sm btn-info" target="_blank" title="View Applicant">
                                                <i class="uil-eye"></i>
                                            </a>    
                                            @endif
                                            
                                            {{-- @if($applicant->applicant_status == "Pending")
                                            <button type="button" class="btn btn-warning btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#edit{{$applicant->id}}">
                                                <i class="dripicons-pencil"></i>
                                            </button>
                                            @endif --}}
                                            
                                            @if($applicant->applicant_status == "Pending")
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#interviewer{{$applicant->id}}">
                                                <i class="uil-user"></i>
                                            </button>
                                            @endif
                                        </td>
                                        <td>{{$applicant->lastname}}</td>
                                        <td>{{$applicant->firstname}}</td>
                                        <td>{{$applicant->middlename}}</td>
                                        <td>{{$applicant->email}}</td>
                                        <td>{{$applicant->mrf->jobPosition->position}}</td>    
                                        <td>
                                            @foreach ($applicant->interviewers as $interviewer)
                                                <small>{{$interviewer->level}} . {{$interviewer->user->name}} - {{$interviewer->status}}</small> <br>
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
                                @endforeach
                                @endif

                                @if(auth()->user()->role == "Department Head")
                                @foreach ($applicants as $applicant)
                                    <tr>
                                        <td>
                                            {{-- <a href="{{url('view-applicant/'.$applicant->id)}}" class="btn btn-sm btn-info" target="_blank">
                                                <i class="uil-eye"></i>
                                            </a> --}}
                                        </td>
                                        <td>{{$applicant->lastname}}</td>
                                        <td>{{$applicant->firstname}}</td>
                                        <td>{{$applicant->middlename}}</td>
                                        <td>{{$applicant->email}}</td>
                                        <td>{{$applicant->mrf->jobPosition->position}}</td>    
                                        <td>
                                            @foreach ($applicant->interviewers as $interviewer)
                                                <small>{{$interviewer->level}} . {{$interviewer->user->name}} - {{$interviewer->status}}</small> <br>
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
        if (lastId)
        {
            var id = lastId.split('_')
            var finalId = parseInt(id[2]) + 1
        }
        else
        {
            var finalId = 1
        }

        var new_row = `
            <div class="row" id="interviewer_${mrfId}_${finalId}">
                <div class="col-md-1">
                    <small>${finalId}</small>
                </div>
                <div class="col-md-11 mb-3">
                    <select name="interviewer[]" class="form-control cat">
                        <option value="">- Interviewer -</option>
                        @foreach ($interviewers->whereIn('role', ['Department Head', 'Human Resources']) as $interviewer)
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