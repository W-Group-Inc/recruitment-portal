@extends('layouts.app')
@section('content')
    <div class="card-lg-12">
        <div class="card">
            @include('components.error')
            <div class="card-body">
                <h4 class="header-title">Applicant Documents</h4>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Documents</th>
                                <th>Status</th>
                                <th>View Document</th>
                                <th>Remarks</th>
                            </tr>
                            <tr>
                                @foreach ($documents as $document)
                                    @php
                                        $uploaded_docs = $document->applicantDocument->where('applicant_id', auth()->user()->applicant_id)->first();
                                    @endphp
                                    
                                    <tr>
                                        <td>
                                            <a href="{{url($document->document_file)}}" class="btn btn-sm btn-primary" title="Download Form" download="{{$document->document_name}}">
                                                <i class=" dripicons-download"></i>
                                            </a>
                                            
                                            <button class="btn btn-info btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#upload{{$document->id}}" title="Upload Form">
                                                <i class="uil-upload"></i>
                                            </button>
                                        </td>
                                        <td>
                                            {{$document->document_name}} 
                                        </td>
                                        <td>
                                            @if($uploaded_docs != null)
                                                @if($uploaded_docs->status == 'Submitted')
                                                <span class="badge bg-success">Submitted</span>
                                                @elseif($uploaded_docs->status == 'Returned')
                                                <span class="badge bg-warning">Returned</span>
                                                @endif
                                            @else
                                            <span class="badge bg-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($uploaded_docs != null)
                                            <a href="{{url($uploaded_docs->document_file)}}" class="btn btn-outline-danger btn-sm" target="_blank">
                                                <i class="uil-file"></i>
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($uploaded_docs != null)
                                            {!! nl2br($uploaded_docs->remarks) !!}
                                            @endif
                                        </td>
                                    </tr>

                                    @include('applicant.upload_applicant_document')
                                @endforeach
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection