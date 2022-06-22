@extends('dashboard/layouts/main')
@section('container')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
        Create new category
    </button>
    @include('dashboard/categories/create')

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Categories</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button type="button" class="dropdown-item btn btn-link" data-bs-toggle="modal"
                                            data-bs-target="#editModal" data-bs-whatever="{{ $category->slug }}"><i
                                                class="bx bx-edit me-2"></i> Edit</button>
                                        <button type="button" class="dropdown-item btn btn-link" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" data-bs-whatever="{{ $category->slug }}"><i
                                                class="bx bx-trash me-2"></i> Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
    @include('dashboard/categories/edit')
    @include('dashboard/partials/deleteModal')
@endsection

@push('styles')
    <style>
        #postTable_filter {
            float: left;
            padding: 10px;
        }

    </style>
@endpush

@push('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#categoryTable').DataTable({
                paging: false,
                ordering: false,
                info: false,
            });
        });
    </script>
@endpush
