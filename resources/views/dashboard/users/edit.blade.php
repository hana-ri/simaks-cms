<!-- Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="editAccount">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="nameId"
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
                <button type="button" class="btn btn-primary" id="submitEditBtn">Save changes</button>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $("#submitEditBtn").click(function() {
                $("#editAccount").submit();
            });
        });
    </script>
@endpush

@push('script')
    <script>
        const editUserModal = document.getElementById('editUserModal');
        editUserModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;

            const username = button.getAttribute('data-bs-whatever');

            const modal = $(this);

            fetch(`/settings/users/${username}/edit`)
                .then(response => response.json())
                .then(data => {
                    $('#nameId').val(data.name);
                    $('#usernameId').val(data.username);
                    $('#emailId').val(data.email);
                    $('select[name="is_admin"]').find(`option[value="${data.is_admin}"]`).attr("selected",true);
                    $('select[name="is_actived"]').find(`option[value="${data.is_actived}"]`).attr("selected",true);
                    $('#editAccount').attr('action', `{{ URL::current() }}/${username}`);
                })
        })
    </script>
@endpush