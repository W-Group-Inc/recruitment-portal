@extends('layouts.app')
@section('content')
    <div class="col-lg-12">
        <h4 class="header-title">Document</h4>

        <div class="card">
            <div class="card-body">
                <button class="btn btn-sm btn-success mb-3" data-bs-toggle="modal" data-bs-target="#new">
                    <i class="uil-plus"></i>
                    Add Document
                </button>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="alternative-page-datatable">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Name</th>
                                <th>File</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{$document->id}}">
                                            <i class="dripicons-pencil"></i>
                                        </button>
                                    </td>
                                    <td>{{$document->document_name}}</td>
                                    <td>
                                        <a href="{{url($document->document_file)}}" class="btn btn-outline-danger" target="_blank">
                                            <i class="uil-file"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if($document->document_status == 'Active')
                                            <span class="badge bg-success">{{$document->document_status}}</span>
                                        @elseif($document->document_status == 'Inactive')
                                            <span class="badge bg-danger">{{$document->document_status}}</span>
                                        @endif
                                    </td>
                                </tr>

                                @include('human_resources.edit_document')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('human_resources.new_document')
@endsection