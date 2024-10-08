@extends('layouts.app')
@section('css')
{{-- <link rel="stylesheet" href="{{asset('css/chosen.min.css')}}"> --}}
<link rel="stylesheet" href="{{asset('css/component-chosen.css')}}">
@endsection

@section('content')

<div class="row">
    <h5 class="header-title">Man Power Requisition Form</h5>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @include('components.error')
                <div class="row mb-3">
                    <div class="col-md-4">
                        @if(auth()->user()->role == "Department Head")
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#add">
                            <i class="dripicons-plus"></i>
                            New MRF
                        </button>
                        @endif
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="alternative-page-datatable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Date Requested</th>
                                <th>MRF #</th>
                                <th>Position</th>
                                <th>Company</th>
                                <th>Department</th>
                                <th>Status</th>
                                @if(auth()->user()->role == "Human Resources")
                                <th>Interviewer</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if(auth()->user()->role == "Department Head")
                            @foreach ($mrf->where('department_id', auth()->user()->department_id) as $m)
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{$m->id}}" @if($m->mrf_status == "Approved") disabled @endif>
                                            <i class="dripicons-document-edit"></i>
                                        </button>

                                        <form action="{{url('delete-mrf/'.$m->id)}}" method="post" class="d-inline-block">
                                            @csrf

                                            <button type="button" class="btn btn-sm btn-danger delete-btn" @if($m->mrf_status == "Approved") disabled @endif>
                                                <i class="uil-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>{{date('M d, Y', strtotime($m->created_at))}}</td>
                                    <td>MRF-{{str_pad($m->mrf_no, 4, '0', STR_PAD_LEFT)}}</td>
                                    <td>{{$m->position_title}}</td>
                                    <td>{{$m->company->name}}</td>
                                    <td>{{$m->department->name}}</td>
                                    <td>
                                        @if($m->mrf_status == "Approved")
                                        <span class="badge bg-success">
                                        @elseif($m->mrf_status == "Pending")
                                        <span class="badge bg-warning">
                                        @elseif($m->mrf_status == "Returned")
                                        <span class="badge bg-info">
                                        @elseif($m->mrf_status == "Rejected")
                                        <span class="badge bg-danger">
                                        @endif  

                                        {{$m->mrf_status}}
                                        </span>
                                    </td>
                                </tr>

                                @include('dept_head.edit_mrf')
                            @endforeach
                            @endif

                            @if(auth()->user()->role == "Human Resources")
                            @foreach ($mrf as $key=>$m)
                                <tr>
                                    <td>
                                        @if($m->mrf_status == "Approved")
                                        {{-- <form action="{{url('post-indeed/'.$m->id)}}" method="post" onsubmit="show()">
                                            @csrf

                                            <button class="btn btn-sm btn-success post-to-indeed" type="button">
                                                <i class="uil-check"></i>
                                            </button>
                                        </form> --}}

                                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#interviewer{{$m->id}}" title="Add Interviewer">
                                            <i class="uil-user"></i>
                                        </button>
                                        @endif
                                    </td>
                                    {{-- <td>
                                        @if($m->mrf_status == "Pending")
                                        <a href="{{url('print-mrf/'.$m->id)}}" class="btn btn-sm btn-info" target="_blank">
                                            <i class="dripicons-print"></i>
                                        </a>
                                        @endif

                                        <form action="{{url('delete-mrf/'.$m->id)}}" method="post" class="d-inline-block">
                                            @csrf

                                            <button type="button" class="btn btn-sm btn-danger delete-btn">
                                                <i class="uil-trash"></i>
                                            </button>
                                        </form>
                                    </td> --}}
                                    <td>{{date('M d, Y', strtotime($m->created_at))}}</td>
                                    <td>MRF-{{str_pad($m->mrf_no, 4, '0', STR_PAD_LEFT)}}</td>
                                    <td>{{$m->position_title}}</td>
                                    <td>{{$m->company->name}}</td>
                                    <td>{{$m->department->name}}</td>
                                    <td>
                                        @if($m->mrf_status == "Approved")
                                        <span class="badge bg-success">
                                        @elseif($m->mrf_status == "Pending")
                                        <span class="badge bg-warning">
                                        @elseif($m->mrf_status == "Returned")
                                        <span class="badge bg-info">
                                        @elseif($m->mrf_status == "Rejected")
                                        <span class="badge bg-danger">
                                        @endif  

                                        {{$m->mrf_status}}
                                        </span>
                                    </td>
                                    <td>
                                        @foreach ($m->interviewer as $i)
                                            <small>
                                                {{$i->level}}. {{$i->user->name}} <br>
                                            </small>
                                        @endforeach
                                    </td>
                                </tr>

                                @include('dept_head.edit_mrf')
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


@include('dept_head.new_mrf')
@foreach ($mrf as $key=>$m)
@include('dept_head.interviewer')
@endforeach

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
                        @foreach ($user->whereIn('role', ['Department Head', 'Human Resources']) as $u)
                            <option value="{{$u->id}}">{{$u->name}}</option>
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
        $('.position_status').on('change', function() {

            if($(this).val() == "Replacement")
            {
                $('.replacementOf').css("display", "block")
            }
            else
            {
                $('.replacementOf').css("display", "none")
            }
        })
        
        $('.cat').chosen({width: "100%"})

        $('.delete-btn').on('click', function() {
            Swal.fire({
                title: "Are you sure?",
                // text: "This department is active",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest('form').submit();
                }
            });
        })

        $('.post-to-indeed').on('click', function() {
            Swal.fire({
                title: "Are you sure?",
                text: "If you submit this it will automatically post to indeed.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, approved it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest('form').submit();
                }
            });
        })
    })
</script>
@endsection
@endsection