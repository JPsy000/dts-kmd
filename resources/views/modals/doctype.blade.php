<div class="modal modal-lg fade" id="addDocType" tabindex="-1" aria-labelledby="addDocTypeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ URL::to ('add-doctype')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" id="user_id" value="">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addDocTypeLabel">Document Type</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="doc_type" class="form-label">Document Type</label>
                    <input type="text" name="doc_type" id="doc_type" class="form-control" required />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
