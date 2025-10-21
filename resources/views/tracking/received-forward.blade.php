@extends('layouts.content')

@section('content')
    <br>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Receive Documents</div>
                        </div>
                        <input type="hidden" name="user_id" id="user_id" value="">
                        <form action="{{ URL::to('receivedForward-documents') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">DMS No.</label>
                                    <input type="hidden" name="dms_no" id="dms_no" value="{{ $docForwards->id }}">
                                    <input type="text" class="form-control" value="{{ $docForwards->dms_no }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Date Released</label>
                                    <input type="date" class="form-control" name="date_released" id="date_released"
                                        value="" required>
                                </div>
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
                                        <option value="Filed">Filed</option>
                                    </select>
                                </div>
                                <input type="date" name="date_received" id="date_received"
                                    value="{{ date('Y-m-d H:i:s') }}" disabled hidden>
                                <input type="text" name="received_by" id="received_by" value="{{ Auth::user()->id }}"
                                    disabled hidden>
                                <input type="hidden" name="forward_status" id="forward_status" value="Forwarded">
                            </div>
                            <div class="card-footer">
                                <a href="{{ URL::to('received-documents') }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary float-end">Forward</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusEl = document.getElementById('status');
            const toEl = document.getElementById('to');
            const dateEl = document.getElementById('date_received');

            const encEl = document.getElementById('encoded_by') || document.getElementById('received_by');

            const myOfficeId = @json(Auth::user()->office_id);

            function toggleFields() {
                const isFiled = (statusEl?.value === 'Filed');
                const isMyOffice = String(toEl?.value || '') === String(myOfficeId || '');

                const shouldEnable = isFiled && isMyOffice;

                [dateEl, encEl].forEach(function(el) {
                    if (!el) return;
                    el.disabled = !shouldEnable;
                    el.required = shouldEnable;
                });
            }

            toggleFields();
            statusEl?.addEventListener('change', toggleFields);
            toEl?.addEventListener('change', toggleFields);

        });
    </script>
@endsection
