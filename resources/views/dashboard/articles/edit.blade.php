@extends('dashboard/layouts/main')
@section('container')
    <!-- Begin Page Content -->
    <div class="col-md-12  col-md-8">
        <div class="card shadow mb-4">
            <h5 class="card-header">Update post</h5>
            <div class="card-body">
                <form form method="POST" action="/dashboard/articles/{{ $article->slug }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="titleLabel"
                            aria-describedby="title" name="title" value="{{ $article->title }}" required>
                        @error('title')
                            <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slugLabel"
                            name="slug" value="{{ $article->slug }}" readonly>
                        @error('slug')
                            <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
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
                    <div class="form-group row mb-3">
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
                            @can('admin')
                                <label for="category" class="form-label">Status</label>
                                <select class="form-select" aria-label="Default select example" name="is_published">
                                    <option value="1" {{ $article->is_published ? 'Selected' : '' }}>Published</option>
                                    <option value="0" {{ !$article->is_published ? 'Selected' : '' }}>Unpublished
                                    </option>
                                </select>
                            @else
                                <input type="hidden" name="is_published" value="0">
                            @endcan
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Content</label>
                        <textarea id="summernote" class="form-control" name="body">{!! $article->body !!}</textarea>
                        @error('body')
                            <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Content</label>
                        <select class="form-select" aria-label="multiple select" id="tags" name="tags[]" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->slug }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/summernote/summernote-lite.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/summernote/summernote-lite.js') }}"></script>
    <script>
        // Slug
        const title = document.querySelector('#titleLabel');
        const slug = document.querySelector('#slugLabel');

        title.addEventListener('change', function() {
            fetch(`/dashboard/articles/checkSlug?title=${title.value}`)
                .then(response => response.json())
                .then(data => slug.value = data.slug);
        });

        // Preview thumbnail
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

    <script>
        // summernote
        $(document).ready(function() {
            $('#summernote').summernote({
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                placeholder: 'Text editor...',
                height: 200,
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#tags").select2({
                placeholder: "Select Tags",
                maximumSelectionLength: 3,
            });
        });
    </script>
@endpush
