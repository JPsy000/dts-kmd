@extends('layouts.content')

@section('content')
    <br>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Receive Document</div>
                        </div>
                        <form action="{{ URL::to('save-receive') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="doctrack_id" id="doctrack_id" value=" {{ $receive->id }}">
                            <div class="card-body">

                                {{-- To update the last row --}}
                                <input type="hidden" name="date_received" id="date_received"
                                    value="{{ date('Y-m-d H:i:s') }}">
                                <input type="hidden" name="received_by" id="received_by" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="to" id="to" value="">
                                <input type="hidden" name="forward_status" id="forward_status" value="Received">
                                <input type="hidden" name="forward_status1" id="forward_status1" value="Completed">
                                {{-- Display only the Data of the Document --}} <div class="mb-3">
                                    <label class="form-label">DMS No.</label>
                                    <input type="hidden" name="dms_no" id="dms_no"
                                        value="{{ $receive->DocTrack->id }}">
                                    <input type="text" class="form-control" value="{{ $receive->DocTrack->dms_no }}"
                                        readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Case No.</label>
                                    <input type="text" class="form-control" name="case_no" id="case_no"
                                        value="{{ $receive->DocTrack->case_no }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Location</label>
                                    <input type="text" class="form-control" name="location" id="location"
                                        value="{{ $receive->DocTrack->location }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Investigator</label>
                                    <input type="text" class="form-control" name="investigator" id="investigator"
                                        value="{{ $receive->DocTrack->investigator }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Approver</label>
                                    <input type="text" class="form-control" name="approver" id="approver"
                                        value="{{ $receive->DocTrack->approver }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Subject</label>
                                    <textarea class="form-control" name="subject" id="subject" rows="3" readonly>{{ $receive->DocTrack->subject }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <input type="text" class="form-control" name="status" id="status"
                                        value="{{ $receive->DocTrack->status }}" readonly>
                                </div>
                                <input type="hidden" name="from" id="from" value="{{ $receive->from }}">
                                <input type="hidden" name="encoded_by" id="encoded_by" value="{{ $receive->encoded_by }}">
                                <input type="hidden" name="status" id="status" value="{{ $receive->status }}">
                                {{-- End Display --}}
                                {{--  --}}
                            </div>
                            <div class="card-footer">
                                <a href="{{ URL::to('incoming-documents') }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary float-end">Receive</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
