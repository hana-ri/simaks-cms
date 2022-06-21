@extends('dashboard/layouts/main')
@section('container')
    <div class="row">
        <div class="col-md-12 col-md-8">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary ">Categories</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
                        Create new category
                    </button>
                    <table class="table" id="categoryTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <button type="button" class="dropdown-item btn btn-link" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="{{ $category->slug }}"><i class="bx bx-edit me-2"></i> Edit</button>
                                                <button type="button" class="dropdown-item btn btn-link" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-whatever="{{ $category->slug }}"><i class="bx bx-trash me-2"></i> Delete</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    @include('dashboard/categories/create')
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
