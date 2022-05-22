@extends('dashboard/layouts/main')
@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Update Article</h6>
                    </div>
                    <div class="card-body">
                        <form class="user" action="/dashboard/users/{{ $user->username }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="usernameId" class="form-label">Username</label>
                                <input type="text" class="form-control  @error('username') is-invalid @enderror"
                                    id="usernameId" name="username" value="{{ old('username', $user->username) }}">
                                @error('username')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="emailId" class="form-label">Email address</label>
                                <input type="email" class="form-control  @error('email') is-invalid @enderror" id="emailId"
                                    name="email" value="{{ old('email', $user->email) }}">
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
                                        <option value="1" {{ ($user->is_admin) ? 'Selected' : '' }}>Admin</option>
                                        <option value="0" {{ (!$user->is_admin) ? 'Selected' : '' }}>User</option>
                                    </select>
                                    @error('is_admin')
                                        <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" aria-label="select roles" name="is_actived">
                                        <option value="1" {{ ($user->is_actived) ? 'Selected' : '' }}>Active</option>
                                        <option value="0" {{ (!$user->is_actived) ? 'Selected' : '' }}>Unactive</option>
                                    </select>
                                    @error('is_active')
                                        <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">Update User <span
                                        data-feather="log-out"></span></button>
                                <a href="/dashboard/users" class="btn btn-secondary">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
