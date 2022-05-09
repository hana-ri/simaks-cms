@extends('dashboard/layouts/main')

@section('container')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">
      <form action="/dashboard/categories/{{ $category->slug }}" method="post">
            <div class="modal-body">
              @csrf
              @method('put')
              <div class="mb-3">
                <label for="nameLabel" class="form-label">Name</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="nameLabel" aria-describedby="name" name="name" value="{{ old('name', $category->name) }}" required>
                @error('name')
                  <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="slugLabel" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slugLabel" aria-describedby="name" name="slug" value="{{ old('slug', $category->slug) }}" required readonly>
                @error('name')
                  <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="Description" class="form-label">Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="Description" aria-describedby="name" name="description" value="{{ old('description', $category->description) }}" placeholder="Description mask 250 character" required>
                @error('name')
                  <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
              </div>
            </div>
        </div>
    </div>
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
    </script>
@endpush
