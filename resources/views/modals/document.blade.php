<div class="modal modal-lg fade" id="addDocument" tabindex="-1" aria-labelledby="addDocumentLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ URL::to('add-document') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" id="user_id" value="">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addDocumentLabel">Document Information</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="dms_no" class="form-label">DMS No.</label>
                    <input type="text" name="dms_no" id="dms_no" class="form-control" readonly
                        placeholder="Auto-Generated" />
                </div>
                <div class="modal-body">
                    <label for="doc_type" class="form-label">Document Type</label>
                    <select name="doc_type" id="doc_type" class="form-select" required>
                        <option value="" selected disabled>Select Document Type</option>
                        @foreach ($doctypeQuery as $doctype)
                            <option value="{{ $doctype->id }}">{{ $doctype->document_type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-body">
                    <label for="case_no" class="form-label">Case No.</label>
                    <input type="text" name="case_no" id="case_no" class="form-control" required />
                </div>
                <div class="modal-body">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" name="location" id="location" class="form-control" required />
                </div>
                <div class="modal-body">
                    <label for="investigator" class="form-label">Investigator</label>
                    <input type="text" name="investigator" id="investigator" class="form-control" required />
                </div>
                <div class="modal-body">
                    <label for="approver" class="form-label">Approver</label>
                    <input type="text" name="approver" id="approver" class="form-control" required />
                </div>
                <div class="modal-body">
                    <label for="subject" class="form-label">Subject</label>
                    <textarea name="subject" id="subject" class="form-control" rows="3" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
