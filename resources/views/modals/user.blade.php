<div class="modal modal-lg fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ URL::to('add-user') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" id="user_id" value="">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addUserLabel">Office</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name">

                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name">

                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" id="phone_number">

                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" name="address" id="address" rows="3"></textarea>

                    <label for="office_id" class="form-label">Office</label>
                    <select class="form-select" name="office_id" id="office_id" required>
                        <option selected disabled>Choose Option</option>
                        @foreach ($officeQuery as $office)
                            <option value="{{ $office->id }}">{{ $office->office_name }}</option>
                        @endforeach
                    </select>

                    <label for="position_name" class="form-label">Position</label>
                    <select class="form-select" name="position_name" id="position_name" required>
                        <option selected disabled>Choose Option</option>
                        <!-- Positions will be loaded here dynamically -->
                    </select>

                    <label for="profile_picture" class="form-label">Profile Picture</label>
                    <input type="text" class="form-control" name="profile_picture" id="profile_picture">

                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email">

                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
