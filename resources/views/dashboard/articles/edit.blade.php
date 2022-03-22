{{-- @dd($article) --}}
@extends('dashboard/layouts/main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Update article</h1>
        <div class="col-md-8">
            <form form method="POST" action="/dashboard/articles/{{ $article->slug }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        aria-describedby="title" name="title" value="{{ $article->title }}" required>
                    @error('title')
                        <div class="invalid-feedback"> {{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                        value="{{ $article->slug }}" readonly>
                    @error('slug')
                        <div class="invalid-feedback"> {{ $message }}</div>
                    @enderror
                </div>`

                <div class="mb-3">
                    <label for="thumbnail" class="form-label @error('thumbnail') is-invalid @enderror">Thumbnail</label>
                    @if ($article->thumbnail)
                        <img class="thumbnail-preview img-fluid mb-3 col-sm-5 d-block"
                            src="{{ asset('storage/' . $article->thumbnail) }}">
                    @else
                        <img class="thumbnail-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <input class="form-control" type="file" id="thumbnail" name="thumbnail"
                        onchange="previewThumbnail()">
                    @error('thumbnail')
                        <div class="invalid-feedback"> {{ $message }}</div>
                    @enderror
                </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select" aria-label="Default select example" name="category_id">
                                        @foreach ($categories as $category)
                                            @if (old('category_id', $article->category_id) == $category->id)
                                                <option value="{{ $category->id }}" selected> {{ $category->name }}</option>
                                            @else
                                                <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                        <label for="category" class="form-label">Status</label>
                                        <select class="form-select" aria-label="Default select example" name="is_published">
                                            <option value="1" {{ $article->is_published == 1 ? 'selected' : '' }}>Published</option>
                                            <option value="0" {{ $article->is_published != 1 ? 'selected' : '' }}>Unpublished</option>
                                        </select>
                                </div>
                            </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Content</label>
                    <textarea id="summernote" class="form-control" name="body">{!! $article->body !!}</textarea>
                </div>
                @error('body')
                    <div class="invalid-feedback"> {{ $message }}</div>
                @enderror

                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Submit <span data-feather="log-out"></span></button>
                    <a href="/dashboard/articles" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.min.css') }}">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch(`/dashboard/articles/checkSlug?title=${title.value}`)
                .then(response => response.json())
                .then(data => slug.value = data.slug);
        });

        // summernote
        $(document).ready(function() {
            $('#summernote').summernote();
        });

        // Preview image
        function previewThumbnail() {
            const thumbnail = document.querySelector('#thumbnail');
            const thumbnailPreview = document.querySelector('.thumbnail-preview');

            thumbnailPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(thumbnail.files[0]);

            oFReader.onload = function(oFReader) {
                thumbnailPreview.src = oFReader.target.result;
            }
        }
    </script>
@endpush
