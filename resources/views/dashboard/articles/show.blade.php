
@extends('dashboard/layouts/main')
@section('container')
    <div class="container-fluid">
        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Article Overview</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Action :</div>
                                <a class="dropdown-item" href="/dashboard/articles">Back </a>
                                <a class="dropdown-item" href="/dashboard/articles/{{ $article->slug }}/edit"> Edit </a>
                                <div class="dropdown-divider"></div>
                                <button type="button" class="dropdown-item btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                  Delete
                                </button>{{-- 
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="dropdown-item"></i>
                                    Delete
                                </a> --}}
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <article>
                            <!-- Post header-->
                            <header class="mb-4">
                                <!-- Post title-->
                                <h1 class="fw-bolder mb-1 text-center">{{ $article->title }}</h1>
                            </header>
                            <!-- Preview image figure-->
                            @if ($article->thumbnail)
                                <div class="mb-3" style="max-height: 350px; overflow:hidden">
                                    <figure class="mb-4"><img class="img-fluid rounded"
                                            src="{{ asset('storage/' . $article->thumbnail) }}" /></figure>
                                </div>
                            @else
                                <figure class="mb-4"><img class="img-fluid rounded"
                                        src="https://source.unsplash.com/1200x400/?{{ $article->slug }}" /></figure>
                            @endif

                            <!-- Post content-->
                            <section class="mb-5">
                                {!! $article->body !!}
                            </section>
                        </article>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Article information</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body text-secondary">
                        <section class="mb-5">
                            <p><strong>Created on</strong> {{ $article->created_at->toFormattedDateString() }} </p>
                            <p><strong>Last Update on</strong> {{ $article->updated_at->toFormattedDateString() }} </p>
                            <p><strong>Category :</strong> {{ $article->category->name }} </p>
                            <p><strong>Status :</strong> {{ $article->is_published == true ? 'Published' : 'Unpublished' }} </p>
                            <p class="mb-0"><strong>Excerpt</strong></p>
                            <p>{{ $article->excerpt }}</p>
                        </section>
                    </div>
                </div>
            </div>
        </div>


<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Article</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Delete Article "{{ $article->title }}" ?
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
         <form action="/dashboard/articles/{{ $article->slug }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger" type="submit">Delete <span data-feather="log-out"></span></button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection