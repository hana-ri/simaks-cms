@extends('layouts/main')
@section('container')
<!--MAIN BANNER AREA START -->
<div class="page-banner-area page-contact" id="page-banner">
    <div class="overlay dark-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
                <div class="banner-content content-padding">
                    <h1 class="text-white">{{ $article->title }}</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, perferendis?</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--MAIN HEADER AREA END -->
<section class="section blog-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                                <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-post">
                                <img src="{{ asset('/assets/assets/images/blog/blog-lg.jpg') }}" alt="" class="img-fluid">
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
                                
                                <article>
                                    {!! $article->body !!}
                                </article>
                                
                                <div class="mt-5 mb-3">
                                    <h5 class="d-inline-block mr-3">Tags:</h5>
                                    <ul class="list-inline d-inline-block">
                                        <li class="list-inline-item"><a href="#">Agency</a>,</li>
                                        <li class="list-inline-item"><a href="#">Marketing</a>,</li>
                                        <li class="list-inline-item"><a href="#">Business</a></li>
                                    </ul>
                                </div>
                                <div class="my-4">
                                    <h5 class="d-inline-block mr-3">Share Now:</h5>
                                    <ul class="list-inline d-inline-block">
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-4">
                                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sidebar-widget search">
                                <div class="form-group">
                                    <input type="text" placeholder="search" class="form-control">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="sidebar-widget about-bar">
                                <h5 class="mb-3">About us</h5>
                                <p>Nostrum ullam porro iusto. Fugit eveniet sapiente nobis nesciunt velit cum fuga doloremque dignissimos asperiores</p>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="sidebar-widget category">
                                <h5 class="mb-3">Category</h5>
                                <ul class="list-styled">
                                    <li>Marketing</li>
                                    <li>Digiatl</li>
                                    <li>SEO</li>
                                    <li>Web Design</li>
                                    <li>Development</li>
                                    <li>video</li>
                                    <li>audio</li>
                                    <li>slider</li>
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
                    </div>
                </div>
            </div>   
        </div>
    </div>
</section>
@endsection

@push('seo')
    {!! SEO::generate() !!}
@endpush
