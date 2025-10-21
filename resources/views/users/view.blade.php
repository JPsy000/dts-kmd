@extends('layouts.content')

@section('content')
    <br>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Document Information</div>
                        </div>
                        <form>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="dms_no" class="form-label">DMS No.</label>
                                    <input type="text" class="form-control" id="dms_no"
                                        value=" {{ $viewDocs->dms_no }}" readonly />
                                </div>
                                <div class="mb-3">
                                    <label for="doc_type" class="form-label">Document Type</label>
                                    <input type="text" class="form-control" id="doc_type"
                                        value="{{ $viewDocs->docType->document_type }}" readonly />
                                </div>
                                <div class="mb-3">
                                    <label for="case_no" class="form-label">Case No.</label>
                                    <input type="text" class="form-control" id="case_no"
                                        value=" {{ $viewDocs->case_no }}" readonly />
                                </div>
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location"
                                        value="{{ $viewDocs->location }}" readonly />
                                </div>
                                <div class="mb-3">
                                    <label for="investigator" class="form-label">Investigator</label>
                                    <input type="text" class="form-control" id="investigator"
                                        value="{{ $viewDocs->investigator }}" readonly />
                                </div>
                                <div class="mb-3">
                                    <label for="approver" class="form-label">Approver</label>
                                    <input type="text" class="form-control" id="approver"
                                        value="{{ $viewDocs->approver }}" readonly />
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <textarea class="form-control" id="subject" rows="3" readonly>{{ $viewDocs->subject }}</textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ URL::to('user-document') }}" class="btn btn-danger">Back</a>
                                <a href="{{ URL::to('track-document') }}" class="btn btn-success">Track</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">File Upload</div>
                        </div>
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    @if ($viewDocs->file_upload == null)
                                        <p>No File Uploaded</p>
                                    @else
                                        @foreach (json_decode($viewDocs->file_upload, true) as $file_name)
                                            <iframe src="{{ asset('uploads/' . $file_name) }}" width="100%" height="500px"
                                                style="border:1px solid #ccc; margin-bottom:10px;">
                                            </iframe>
                                            <a href="{{ asset('uploads/' . $file_name) }}" target="_blank"
                                                class="btn btn-primary btn-sm mb-2">{{ $file_name }}</a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
