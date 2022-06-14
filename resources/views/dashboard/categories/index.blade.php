@extends('dashboard/layouts/main')

@section('container')
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
    Create new category
</button>
    <div class="row">
        <div class="col-md-12 col-md-8">
            <div class="card">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    @foreach ($categories as $category)
                        <div class="card accordion-item mb-3">
                            <h2 class="accordion-header" id="heading{{ $loop->iteration }}">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#accordion{{ $loop->iteration }}" aria-expanded="false"
                                    aria-controls="accordion{{ $loop->iteration }}">
                                    {{ $category->name }}
                                </button>
                            </h2>
                            <div id="accordion{{ $loop->iteration }}" class="accordion-collapse collapse"
                                aria-labelledby="heading{{ $loop->iteration }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {{ $category->description }}
                                    <div>
                                        <a href="/dashboard/categories/{{ $category->slug }}/edit"
                                            class="btn btn-warning text-white mt-3">Edit</a>
                                        <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"
                                            data-bs-whatever="{{ $category->slug }}">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('dashboard\categories\create')
    @include('dashboard/partials/deleteModal')
@endsection

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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Launch demo modal
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
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"
                                                data-bs-whatever="{{ $category->slug }}">Delete</button>
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
    @include('dashboard\categories\create')
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
