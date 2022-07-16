@extends('dashboard/layouts/main')
@section('container')
    <div class="row mb-5">
        <div class="col-lg-12 col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <h6 class="card-subtitle text-muted">By {{ $article->author->name }}, in
                        <strong class="text-primary">{{ $article->category->name }}</strong>
                    </h6>
                </div>
                <img src="{{ asset('/assets/assets/images/blog/blog-lg.jpg') }}" alt="#">
                <div class="card-body">
                    <article>{!! $article->body !!}</article>
                    <footer>
                        <p class="d-inline">Tags : </p>
                        @foreach ($article->tags as $tag)
                         <span class="badge rounded-pill bg-label-primary">{{ $tag->name }}</span>
                        @endforeach
                    </footer>
                </div>
            </div>
        </div>
    </div>
@endsection
