@extends('layouts.content')

@section('content')
    <br>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Document List</div>
                        </div>
                        <div class="card-body">
                            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                                    data-bs-target="#addDocument">Add Document</button>
                            </div>
                            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                                    data-bs-target="#addDocType">Add Document Type</button>
                            </div>
                            <hr />
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <table class="table table-striped table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>DMS No.</th>
                                                    <th>Document Type</th>
                                                    <th>Case No.</th>
                                                    <th>Subject</th>
                                                    <th>Attachments</th>
                                                    <th>Attachment Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($documentQuery->where('office', Auth::user()->office_id) as $doc)
                                                    <tr>
                                                        <td>{{ $doc->dms_no }}</td>
                                                        <td>{{ $doc->docType->document_type ?? 'N/A' }}</td>
                                                        <td>{{ $doc->case_no }}</td>
                                                        <td>{{ $doc->subject }}</td>
                                                        <td>
                                                            @if ($doc->status === 'Forwarded')
                                                            @else
                                                                <form action="{{ URL::to('update-file/' . $doc->id) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf

                                                                    <input type="file" name="file_upload[]"
                                                                        id="file_upload_{{ $doc->id }}" multiple
                                                                        hidden>

                                                                    <label for="file_upload_{{ $doc->id }}"
                                                                        class="btn btn-outline-secondary btn-sm"
                                                                        aria-label="Upload file">
                                                                        <i class="bi bi-upload"></i>
                                                                    </label>

                                                                    <button type="submit"
                                                                        id="uploadBtn_{{ $doc->id }}"
                                                                        class="btn btn-primary btn-sm" disabled>
                                                                        Upload
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span id="fileNames_{{ $doc->id }}"
                                                                class="ms-2 text-muted"></span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ URL::to('view-document/' . $doc->id) }}"
                                                                class="btn btn-info btn-sm">View</a>
                                                            @if ($doc->status === 'Forwarded')
                                                                <a href="{{ URL::to('review-document/' . $doc->id) }}"
                                                                    class="btn btn-success btn-sm disabled"
                                                                    aria-disabled="true">Forward</a>

                                                                <button class="btn btn-primary btn-sm"
                                                                    onclick="btnDocumentUpdate({{ $doc->id }})"
                                                                    disabled>Edit</button>
                                                                <button class="btn btn-danger btn-sm"
                                                                    onclick="btnDocumentDelete({{ $doc->id }})"
                                                                    disabled>Cancel</button>
                                                            @else
                                                                <a href="{{ URL::to('review-document/' . $doc->id) }}"
                                                                    class="btn btn-success btn-sm">Forward</a>
                                                                <button class="btn btn-primary btn-sm"
                                                                    onclick="btnDocumentUpdate({{ $doc->id }})">Edit</button>
                                                                <button class="btn btn-danger btn-sm"
                                                                    onclick="btnDocumentDelete({{ $doc->id }})">Cancel</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer clearfix">
                                        <ul class="pagination pagination-sm m-0 float-end">
                                            <li class="page-item">
                                                <a class="page-link" href="#">&laquo;</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">&raquo;</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.document')
    @include('modals.doctype')
    @include('modals.user')
@endsection
