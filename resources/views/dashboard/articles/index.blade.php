@extends('dashboard/layouts/main')
@section('container')
    <a href="/dashboard/articles/create" class="btn btn-primary mb-4">Create Post</a>
    <div class="card">
        <h5 class="card-header m-0">Posts</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover" id="postTable">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($articles as $article)
                        <tr>
                            <td><strong>{{ $article->title }}</strong></td>
                            <td>{!! $article->is_published == true ? '<span class="badge bg-label-primary me-1">Published</span>' : '<span class="badge bg-label-warning me-1">Unpublished</span>' !!}</td>
                            <td>{{ $article->category->name }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/dashboard/articles/{{ $article->slug }}/edit"><i
                                                class="bx bx-edit me-2"></i> Edit</a>
                                        <button type="button" class="dropdown-item btn btn-link" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" data-bs-whatever="{{ $article->slug }}"><i
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
    @include('/dashboard/partials/deleteModal')
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endpush

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
            $('#postTable').DataTable({
                paging: false,
                ordering: false,
                info: false,
            });
        });
    </script>
@endpush
