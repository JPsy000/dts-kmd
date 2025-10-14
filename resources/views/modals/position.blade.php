<div class="modal modal-lg fade" id="addPosition" tabindex="-1" aria-labelledby="addPositionLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ URL::to('add-position') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" id="user_id" value="">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addPositionLabel">Office</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="office_id" class="form-label">Office Name</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="office_id" id="office_id"
                        required>
                        <option selected disabled value="">Select Office</option>
                        @foreach ($officeQuery as $office)
                            <option value="{{ $office->id }}">{{ $office->office_name }}</option>
                        @endforeach
                    </select>
                    <label for="position_name" class="form-label">Position Name</label>
                    <input type="text" class="form-control mb-3" id="position_name" name="position_name" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
