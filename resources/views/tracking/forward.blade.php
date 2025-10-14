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
                        <input type="hidden" name="user_id" id="user_id" value="">
                        <form action="{{ URL::to('forward-documents') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">DMS No.</label>
                                    <input type="text" class="form-control" name="dms_no" id="dms_no"
                                        value="{{ $docForward->dms_no }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Date Released</label>
                                    <input type="date" class="form-control" name="date_released" id="date_released"
                                        value="" required>
                                </div>
                                <input type="hidden" name="from" id="from" value="{{ auth()->user()->office_id }}">
                                <div class="mb-3">
                                    <label class="form-label">Remarks</label>
                                    <textarea class="form-control" name="remarks" id="remarks" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">To</label>
                                    <select class="form-select" name="to" id="to" required>
                                        <option value="" selected disabled>Select User</option>
                                        @foreach ($office as $offices)
                                            <option value="{{ $offices->id }}"
                                                @if ($offices->id == auth()->user()->office_id) disabled @endif>
                                                {{ $offices->office_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status" id="status" required>
                                        <option value="" selected disabled>Select Status</option>
                                        <option value="For Review">For Review</option>
                                        <option value="For Approval">For Approval</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Received">Received</option>
                                        <option value="Revised">Revised</option>
                                        <option value="Disapproved">Disapproved</option>
                                    </select>
                                </div>
                                <input type="hidden" name="forwardstatus" id="forwardstatus" value="Forwarded">
                                <input type="hidden" name="button_cue" id="button_cue" value="Received">
                            </div>
                            <div class="card-footer">
                                <a href="{{ URL::to('user-document') }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary float-end">Forward</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
