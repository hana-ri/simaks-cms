@extends('dashboard/layouts/main')

@section('container')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createUserModal">
        Create new account
    </button>
    @include('dashboard/users/create')
    @include('dashboard/partials/alert')
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Accounts</h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="usersTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            {{-- <td></td> --}}
                            <td>{!! $user->is_admin ? '<span class="badge bg-primary">Admin</span>' : '<span class="badge bg-secondary">User</span>' !!}</td>
                            <td>{!! $user->is_actived ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-warning">Inactive</span>' !!}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button type="button" class="dropdown-item btn btn-link" data-bs-toggle="modal"
                                            data-bs-target="#editUserModal" data-bs-whatever="{{ $user->username }}"><i
                                                class="bx bx-edit me-2"></i> Edit</button>
                                        <button type="button" class="dropdown-item btn btn-link" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" data-bs-whatever="{{ $user->username }}"><i
                                                class="bx bx-trash me-2"></i> Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-lg-12 d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        </div>
    </div>
    @include('dashboard/partials/deleteModal')
    @include('dashboard/users/edit')
    <!--/ Basic Bootstrap Table -->
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/DataTables/DataTables/datatables.min.css') }}">
@endpush

@push('script')
    <script type="text/javascript" charset="utf8" src="{{ asset('assets/vendor/DataTables/DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable({
                paging: false,
                ordering: false,
                info: false,
            });
        });
    </script>
@endpush