@extends('layouts/main')

@section('container')
    <!--MAIN BANNER AREA START -->
    <div class="page-banner-area page-contact" id="page-banner">
        <div class="overlay dark-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
                    <div class="banner-content content-padding">
                        <h1 class="text-white">Latest Posts</h1>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, perferendis?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--MAIN HEADER AREA END -->
    <section class="section blog-wrap ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    {{-- Headline --}}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-post">
                                @if (count($articles) > 0)
                                    @if ($articles[0]->thumbnail)
                                        {{-- <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="" class="img-fluid"> --}}
                                        <img src="{{ asset('/assets/assets/images/blog/blog-lg.jpg') }}" alt=""
                                            class="img-fluid">
                                    @else
                                        <img src="{{ asset('/assets/assets/images/blog/blog-lg.jpg') }}" alt=""
                                            class="img-fluid">
                                    @endif
                                    <div class="mt-4 mb-3 d-flex">
                                        <div class="post-author mr-3">
                                            <i class="fa fa-user"></i>
                                            <span class="h6 text-uppercase">{{ $articles[0]->author->name }}</span>
                                        </div>

                                        <div class="post-info">
                                            <i class="fa fa-calendar-check"></i>
                                            <span>{{ $articles[0]->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                    <a href="/blog/{{ $articles[0]->slug }}" class="h4">{{ $articles[0]->title }}</a>
                                    <p class="mt-3">{{ $articles[0]->excerpt }}</p>
                                    <a href="/blog/{{ $articles[0]->slug }}" class="read-more">Read More <i
                                            class="fa fa-angle-right"></i></a>
                                @else
                                    <h3>not found</h3>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($articles->skip(1) as $article)
                            <div class="col-lg-6">
                                <div class="blog-post">
                                    @if ($articles[0]->thumbnail)
                                        {{-- <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="" class="img-fluid"> --}}
                                        <img src="{{ asset('/assets/assets/images/blog/blog-lg.jpg') }}" alt=""
                                            class="img-fluid">
                                    @else
                                        <img src="{{ asset('/assets/assets/images/blog/blog-lg.jpg') }}" alt=""
                                            class="img-fluid">
                                    @endif
                                    <div class="mt-4 mb-3 d-flex">
                                        <div class="post-author mr-3">
                                            <i class="fa fa-user"></i>
                                            <span class="h6 text-uppercase">{{ $article->author->name }}</span>
                                        </div>

                                        <div class="post-info">
                                            <i class="fa fa-calendar-check"></i>
                                            <span>{{ $article->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                    <a href="/blog/{{ $article->slug }}"
                                        class="h4 ">{{ $article->title }}</a>
                                    <p class="mt-3">{{ $article->excerpt }}</p>
                                    <a href="/blog/{{ $article->slug }}" class="read-more">Read More <i
                                            class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-12 d-flex justify-content-center">
                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sidebar-widget search">
                                <div class="form-group">
                                    <form action="/blog">
                                        @if (request('category'))
                                            <input type="hidden" name="category" value="{{ request('category') }}">
                                        @elseif(request('author'))
                                            <input type="hidden" name="author" value="{{ request('author') }}">
                                        @endif
                                        <div class="input-group">
                                            <input type="text" placeholder="search" class="form-control" name="search"
                                                value="{{ request('search') }}">
                                            {{-- <button class="btn btn-primary" type="submit">Search</button> --}}
                                            <button type="submit" class="btn btn-link"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="sidebar-widget category">
                                <h5 class="mb-3">Category</h5>
                                <ul class="list-styled">
                                    @foreach ($categories as $category)
                                        <li><a href="/blog/category/{{ $category->slug }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="sidebar-widget tag">
                                <a href="#">web</a>
                                <a href="#">development</a>
                                <a href="#">seo</a>
                                <a href="#">marketing</a>
                                <a href="#">branding</a>
                                <a href="#">web deisgn</a>
                                <a href="#">Tutorial</a>
                                <a href="#">Tips</a>
                                <a href="#">Design trend</a>
                            </div>
                        </div>
                        {{-- <div class="col-lg-12">
                            <div class="sidebar-widget download">
                                <h5 class="mb-4">Download Files</h5>
                                <a href="#"> <i class="fa fa-file-pdf"></i>Company Manual</a>
                                <a href="#"> <i class="fa fa-file-pdf"></i>Company Profile</a>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
