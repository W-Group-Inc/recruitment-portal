@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-xxl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="text-muted fw-normal mt-0 text-truncate">Served MRF</h5>
                            <h3 class="my-2 py-1">{{count($served_mrf)}}</h3>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($served_mrf as $m)
                                    <tr>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#view{{$m->id}}">
                                                <i class="uil-eye"></i>
                                            </button>
                                        </td>
                                        <td>{{date("M d, Y", strtotime($m->created_at))}}</td>
                                        <td>MRF-{{str_pad($m->mrf_no, 4, '0', STR_PAD_LEFT)}}</td>
                                        <td>{{$m->jobPosition->position}}</td>
                                        <td>{{$m->company->name}}</td>
                                        <td>{{$m->department->name}}</td>
                                    </tr>

                                    @include('human_resources.view_mrf')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>
@endsection