@extends('dashboard/layouts/main')
@section('container')
@include('dashboard/partials/alert')
    <a href="/dashboard/articles/create" class="btn btn-primary mb-4">Create new post</a>
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Posts</h5>
        <div class="table-responsive">
            <table class="table" id="postTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
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
            <div class="col-lg-12 d-flex justify-content-center">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
    @include('/dashboard/partials/deleteModal')
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/DataTables/DataTables/datatables.min.css') }}">
@endpush

@push('script')
    <script type="text/javascript" charset="utf8" src="{{ asset('assets/vendor/DataTables/DataTables/datatables.min.js') }}"></script>
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
