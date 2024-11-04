@extends('layouts.public_app')

@section('public_content')
    <div class="col-lg-12">
        <div class="card mt-3">
            <div class="card-body">
                <form method="GET" onsubmit="show()">
                    <div class="row">
                        <div class="col-lg-4">
                            Search
                            <input type="search" name="search" class="form-control" placeholder="Search jobs"  value="{{$search}}" spellcheck="true">
                        </div>
                        <div class="col-lg-4">
                            Sort By
                            <select name="sort" class="form-control">
                                <option value="">Select sort by</option>
                                <option value="desc" @if($sort == 'desc') selected @endif>Newest</option>
                                <option value="asc" @if($sort == 'asc') selected @endif>Oldest</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            &nbsp;
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">
                                    <i class="uil-search"></i>
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(count($mrf) > 0)
    @foreach ($mrf as $m)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p class="h4 fw-bold m-0">{{$m->jobPosition->position}}</p>
                    <p class="m-0"><small><i class="uil-building me-2"></i>{{$m->company->name}}</small></p>
                    <p class="m-0"><small><i class="uil-map-marker me-2"></i>{{$m->company->address}}</small></p>
                    <p class="m-0"><small><i class="uil-briefcase-alt me-2"></i>Rank and File</small></p>
                </div>
                <div class="card-footer">
                    <a href="{{url('view-jobs/'.encrypt($m->id))}}" class="btn btn-sm btn-info float-end">View Job</a>
                </div>
            </div>
        </div>
    @endforeach
    @else
    <p class="h3"><em>No job posting</em></p>
    @endif
@endsection