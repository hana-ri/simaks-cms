@extends('dashboard/layouts/main')
@section('container')
    <div class="container-fluid">
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
                        <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#createModal">
                            Create new category
                        </button>
                        <div class="row">
                            <div class="col">
                                @foreach ($categories as $category)
                                    <!-- Collapsable Card Example -->
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Accordion -->
                                        <a href="#card-{{ $loop->iteration }}" class="d-block card-header py-3"
                                            data-toggle="collapse" role="button" aria-expanded="true"
                                            aria-controls="card-{{ $loop->iteration }}">
                                            <h6 class="m-0 font-weight-bold text-primary">{{ $category->name }}</h6>
                                        </a>
                                        <!-- Card Content - Collapse -->
                                        <div class="collapse hidden" id="card-{{ $loop->iteration }}">
                                            <div class="card-body">
                                                <p>{{ $category->description }}</p>
                                                <a href="/dashboard/categories/{{ $category->slug }}/edit"
                                                    class="btn btn-warning text-white">Edit</a>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-whatever="{{ $category->slug }}">Delete</button>                                             
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Create Modal-->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/categories" method="POST" id="categoryForm">
                    @csrf
                    <div class="mb-3">
                        <label for="nameLabel" class="form-label">Name</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="nameLabel" aria-describedby="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                        <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slugLabel" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slugLabel" aria-describedby="name" name="slug" value="{{ old('slug') }}" required readonly>
                        @error('slug')
                        <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="Description" aria-describedby="name" name="description" value="{{ old('description') }}" placeholder="Description mask 250 character" required>
                        @error('description')
                        <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="submitButton">Create</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>

    @include('dashboard/partials/deleteModal')
    

@endsection

@push('scripts')
    <script>
        const title = document.querySelector('#nameLabel');
        const slug = document.querySelector('#slugLabel');

        title.addEventListener('change', function() {
            fetch(`/dashboard/articles/checkSlug?title=${title.value}`)
                .then(response => response.json())
                .then(data => slug.value = data.slug);
        });

        $(document).ready(function() {
            $("#submitButton").click(function() {
                $("#categoryForm").submit();
            });
        });
    </script>
@endpush
