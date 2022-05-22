@extends('dashboard/layouts/main')

@section('container')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-md-8">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary ">Update Category</h6>
      </div>
      <div class="card-body shadow mb-4">
        <form action="/dashboard/categories/{{ $category->slug }}" method="post">
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
                @error('slug')
                  <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="Description" class="form-label">Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="Description" aria-describedby="name" name="description" value="{{ old('description', $category->description) }}" placeholder="Description mask 250 character" required>
                @error('description')
                  <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="/dashboard/categories" class="btn btn-secondary">Back</a>
      </form>
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
