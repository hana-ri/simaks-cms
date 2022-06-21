@extends('dashboard/layouts/main')
@section('container')
    <div class="row">
        <!-- Area Chart -->
        <div class="col-md-12 col-md-8">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Create Article</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form method="POST" action="/dashboard/posts/" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="titleLabel" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="titleLabel"
                                aria-describedby="title" name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slugLabel" class="form-label">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slugLabel"
                                name="slug" value="{{ old('slug') }}" readonly>
                            @error('slug')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="thumbnail"
                                class="form-label @error('thumbnail') is-invalid @enderror">Thumbnail</label>
                            <img class="thumbnail-preview img-fluid mb-3 col-sm-5">
                            {{-- <image class="thumbnail-preview img-fluid mb-3 col-sm-5"></image> --}}
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
                                        @if (old('category_id') == $category->id)
                                            <option value="{{ $category->id }}" selected> {{ $category->name }}
                                            </option>
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
                                        <option value="1">Published</option>
                                        <option value="0" selected>Unpublished</option>
                                    </select>
                                @else
                                    <input type="hidden" name="is_published" value="0">
                                @endcan
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="body" class="form-label">Content</label>
                            <textarea id="summernote" name="body">{!! old('body') !!}</textarea>
                            @error('body')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/summernote/summernote-lite.css') }}">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('assets/vendor/summernote/summernote-lite.js') }}"></script>
    <script>
        // Slug
        const title = document.querySelector('#titleLabel');
        const slug = document.querySelector('#slugLabel');

        title.addEventListener('input', function() {
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
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                placeholder: 'Text editor...',
                height: 200,
            });
        });
    </script>
@endpush
