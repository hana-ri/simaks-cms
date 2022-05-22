@extends('layouts/main')
@section('container')
    @include('/partials/navbar')

    {{-- Coursel --}}
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                {{-- <svg class="my-c-bg" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777" />
                </svg> --}}
                <img src="{{ asset("/img/kampus_cibiru.png") }}" class="img-fluid" alt="...">
                <div class="container">
                    <div class="carousel-caption text-center">
                        <h1>SIMAKS</h1>
                        <p>Sistem Manajemen Konten Sederhana, merupakan perangkat lunak yang dapat digunakan untuk menyediakan layanan management konten dengan sederhana untuk kemudahan penggunaan dan pengembangan.</p>
                        <p>
                            <a class="btn btn-lg btn-primary" href="/blog">Find posts</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset("/img/kampus_cibiru_2.png") }}" class="img-fluid" alt="...">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Another example headline.</h1>
                        <p>Some representative placeholder content for the second slide of the carousel.</p>
                        <p>
                            <a class="btn btn-lg btn-primary" href="#">Learn more</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset("/img/kampus_cibiru_3.png") }}" class="img-fluid" alt="...">
                <div class="container">
                    <div class="carousel-caption text-center">
                        <h1>About us.</h1>
                        <p>Berkenalan lebih jauh dengan team yang membangung simaks padahalam berikut.</p>
                        <p>
                            <a class="btn btn-lg btn-primary" href="/about">About us</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- Body content --}}
    <div class="container martketing mb-5">

        {{-- Mini jumbotron --}}
        <div class="row align-items-md-stretch">
            <div class="col-md-6 mb-3">
                <div class="h-100 p-5 text-white bg-dark rounded-3">
                    <h2>Change the background</h2>
                    <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look.
                        Then, mix and match with additional component themes and more.</p>
                    <button class="btn btn-outline-light" type="button">Example button</button>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Add borders</h2>
                    <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be
                        sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of
                        both column's content for equal-height.</p>
                    <button class="btn btn-outline-secondary" type="button">Example button</button>
                </div>
            </div>
        </div>
        {{-- marketing --}}
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your
                        mind.</span>
                </h2>
                <p class="lead">Some great placeholder content for the first featurette here. Imagine some
                    exciting prose here.</p>
            </div>
            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#eee" />
                    <text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>
                </svg>
            </div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for
                        yourself.</span>
                </h2>
                <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea
                    of how this layout would work with some actual real-world content in place.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#eee" />
                    <text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>
                </svg>
            </div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span>
                </h2>
                <p class="lead">And yes, this is the last block of representative placeholder content. Again, not
                    really intended to be actually read, simply here to give you a better view of what this would look like
                    with some actual content. Your content.</p>
            </div>
            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#eee" />
                    <text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>
                </svg>
            </div>
        </div>
        {{-- <hr class="featurette-divider"> --}}
    </div>

    @include('/partials/footer')
@endsection
@push('styles')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    }
</style>
@endpush
@push('pageTitle')
    <title>Home</title>
@endpush
@push('seo')
    {!! SEO::generate() !!}
@endpush