<!-- Modal -->
<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">Create new account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="user" action="/settings/account" method="POST" id="createNewAccount">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="usernameId" class="form-label">Username</label>
                        <input type="text" class="form-control  @error('username') is-invalid @enderror" id="usernameId"
                            name="username" value="{{ old('username') }}">
                        @error('username')
                            <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="emailId" class="form-label">Email address</label>
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="emailId"
                            name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="passwordId" class="form-label">Password</label>
                            <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                id="passwordId" name="password">
                            @error('password')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="passwordConfirmationId" class="form-label">Confirm password</label>
                            <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                id="passwordConfirmationId" name="password_confirmation">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label class="form-label">Roles</label>
                            <select class="form-select" aria-label="select roles" name="is_admin">
                                <option value="1">Admin</option>
                                <option value="0">User</option>
                            </select>
                            @error('is_admin')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Status</label>
                            <select class="form-select" aria-label="select roles" name="is_actived">
                                <option value="1">Active</option>
                                <option value="0">Unactive</option>
                            </select>
                            @error('is_active')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitButton">Save changes</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#submitButton").click(function() {
                $("#createNewAccount").submit();
            });
        });
    </script>
@endpush
