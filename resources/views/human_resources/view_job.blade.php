@extends('layouts.public_app')

@section('public_content')
    <div class="col-lg-8 mx-auto">
        <div class="row">
            <div class="col-lg-6">
                <a class="btn btn-sm btn-danger mb-2" href="{{url('jobs')}}">
                    <i class="dripicons-arrow-thin-left"></i>
                    Back
                </a>

            </div>
        </div>
        <div class="card">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Success - </strong> {{session()->get('success')}}
            </div>
            @endif
            <div class="card-body">
                <p class="h4 m-0">{{$mrf->jobPosition->position}}</p>
                <p class="m-0"><small><i class="uil-briefcase-alt me-2"></i>Rank and File</small></p>
                <p class="m-0"><small><i class=" uil-money-bill me-2"></i>{{$mrf->salary_range}}</small></p>

                <button class="btn btn-sm btn-info mt-2" data-bs-toggle="modal" data-bs-target="#apply{{$mrf->id}}">
                    <i class="uil-suitcase"></i>
                    Apply
                </button>
                <hr>
                <p class="h5">POSITION SUMMARY</p>
                <p>{!! nl2br($mrf->jobPosition->position_summary) !!}</p>

                <hr>
                <p class="h5">JOB DESCRIPTION</p>
                <p>{!! nl2br($mrf->jobPosition->duties_and_responsibility) !!}</p>

                <hr>
                <p class="h5">MINIMUM REQUIREMENTS</p>
                <p>{!! nl2br($mrf->jobPosition->minimum_requirements) !!}</p>
            </div>
        </div>
    </div>

    @include('human_resources.apply')
@endsection