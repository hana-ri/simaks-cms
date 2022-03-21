@extends('layouts/main')

@section('container')
    <div class="container my-3">
        {{-- Search Navigation --}}
        <div class="row justify-content-center mt-3">
            <div class="col-lg">
                <div class="card mb-4">
                    <div class="card-header text-center bg-dark text-white h4">Search Article</div>
                    <div class="card-body">
                        <form action="/blog/">
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @elseif(request('author'))
                                <input type="hidden" name="author" value="{{ request('author') }}">
                            @endif
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="Input the title or content of article..." aria-label="Search" name="search" value="{{ request('search')}}">
                                <button class="btn btn-dark" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">

                {{-- Highlight article --}}
                <div class="card mb-3">
                  <img src="https://source.unsplash.com/850x350/?{{ $articles[0]->category->name }}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <div class="small text-muted">{{ $articles[0]->created_at->diffForHumans() }} By {{ $articles[0]->author->name }}</div>
                    <h1 class="card-title">{{ $articles[0]->title }}</h1>
                    <p class="card-text">{{ $articles[0]->excerpt }}</p>
                    <a href="/blog/{{ $articles[0]->slug }}" class="btn btn-dark">Read more →</a>
                  </div>
                </div>

                {{-- article --}}
                <div class="row">
                    @foreach($articles->skip(1) as $article)
                    <div class="col-lg-6 mb-3">
                        <div class="card h-100 mb-3">
                            <img src="https://source.unsplash.com/700x350/?{{ $article->category->name }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="small text-muted">{{ $article->created_at->diffForHumans() }} By {{ $article->author->name }}</div>
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">{{ $article->excerpt }}</p>
                                <a href="/blog/{{ $article->slug }}" class="btn btn-dark">Read more →</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- @dd($articles) --}}

            <div class="col-lg-4">
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header bg-dark text-white">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">Web Design</a></li>
                                    <li><a href="#!">HTML</a></li>
                                    <li><a href="#!">Freebies</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">JavaScript</a></li>
                                    <li><a href="#!">CSS</a></li>
                                    <li><a href="#!">Tutorials</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Pagenation --}}
        <div class="d-flex justify-content-center mt-3">
                {{ $articles->links() }}
        </div>

    </div>
@endsection