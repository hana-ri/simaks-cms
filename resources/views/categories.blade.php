@extends('layouts/main')

@section('container')
@include('/partials/navbar')
<div class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <div class="list-group">
                <h1 class="display-6 text-muted text-center">Categories</h1>
                @foreach($categories as $category)
                  <a href="/blog?category={{ $category->slug }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="{{ asset('img/undraw_profile.svg') }}" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                      <div>
                        <h6 class="mb-0"><strong>{{ $category->name }}</strong></h6>
                        <p class="mb-0 opacity-75">{{ $category->description }}</p>
                      </div>
                    </div>
                  </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('/partials/footer')
@endsection
@push('pageTitle')
    <title>Categories</title>
@endpush
@push('seo')
  {!! SEO::generate() !!}
@endpush