@extends('layouts/main')
@section('container')
    <!--MAIN BANNER AREA -->
    <div class="banner-area banner-2">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
                            <div class="banner-content content-padding">
                                <h5 class="subtitle">A creative agency</h5>
                                <h1 class="banner-title">We craft seo and digital markting services</h1>
                                <p>We provide marketing services to startups and small businesses to looking for a
                                    partner for their digital media, design-area.We are a a startup company to be
                                    commited to work and time management.</p>

                                <a href="#" class="btn btn-white btn-circled">lets start</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--MAIN HEADER AREA END -->

    <!--  TESTIMONIAL AREA START  -->
    <section id="testimonial" class="section-padding ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="mb-5">
                        <h3 class="mb-2">Trusted by hundred over years</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, dignissimos?</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 m-auto col-sm-12 col-md-12">
                    <div class="carousel slide" id="test-carousel2">
                        <div class="carousel-inner">
                            <ol class="carousel-indicators">
                                <li data-target="#test-carousel2" data-slide-to="0" class="active"></li>
                                <li data-target="#test-carousel2" data-slide-to="1"></li>
                                <li data-target="#test-carousel2" data-slide-to="2"></li>
                            </ol>

                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="testimonial-content style-2">
                                            <div class="author-info ">
                                                <div class="author-img">
                                                    <img src="{{ asset('/assets/assets/images/author/3b.jpg') }}" alt=""
                                                        class="img-fluid">
                                                </div>
                                            </div>

                                            <p><i class="icofont icofont-quote-left"></i>They is a great platform to
                                                anyone like who want to start buisiness but not get right decision. It’s
                                                really great placefor new to start the buisness in righ way! <i
                                                    class="icofont icofont-quote-right"></i></p>
                                            <div class="author-text">
                                                <h5>Marine Joshi</h5>
                                                <p>Senior designer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item ">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="testimonial-content style-2">
                                            <div class="author-info ">
                                                <div class="author-img">
                                                    <img src="{{ asset('/assets/assets/images/author/5b.jpg') }}" alt=""
                                                        class="img-fluid">
                                                </div>
                                            </div>

                                            <p><i class="icofont icofont-quote-left"></i>They is a great platform to
                                                anyone like who want to start buisiness but not get right decision. It’s
                                                really great placefor new to start the buisness in righ way! <i
                                                    class="icofont icofont-quote-right"></i></p>
                                            <div class="author-text">
                                                <h5>Marine Joshi</h5>
                                                <p>Senior designer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  ITEM END  -->

                            <div class="carousel-item ">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="testimonial-content style-2">
                                            <div class="author-info ">
                                                <div class="author-img">
                                                    <img src="{{ asset('/assets/assets/images/author/3b.jpg') }}" alt=""
                                                        class="img-fluid">
                                                </div>
                                            </div>

                                            <p><i class="icofont icofont-quote-left"></i>They is a great platform to
                                                anyone like who want to start buisiness but not get right decision. It’s
                                                really great placefor new to start the buisness in righ way!<i
                                                    class="icofont icofont-quote-right"></i></p>
                                            <div class="author-text">
                                                <h5>Marine Joshi</h5>
                                                <p>Senior designer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  ITEM END  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  TESTIMONIAL AREA END  -->

    <!--  COUNTER AREA START  -->
    <section id="counter" class="section-padding">
        <div class="overlay dark-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="counter-stat">
                        <i class="icofont icofont-heart"></i>
                        <span class="counter">460</span>
                        <h5>Our Happy Clients</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="counter-stat">
                        <i class="icofont icofont-rocket"></i>
                        <span class="counter">60</span>
                        <h5>Projects Done</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="counter-stat">
                        <i class="icofont icofont-hand-power"></i>
                        <span class="counter">30</span>
                        <h5>Experienced stuff</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="counter-stat">
                        <i class="icofont icofont-shield-alt"></i>
                        <span class="counter">25</span>
                        <h5>Ongoning Projects</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  COUNTER AREA END  -->
    <!--  BLOG AREA START  -->
    <section id="blog" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 m-auto">
                    <div class="section-heading">
                        <h4 class="section-title">Latest Blog news</h4>
                        <div class="line"></div>
                        <p>Our blog journey may come handy to build a community to make more effective success for
                            business. Latest and trend tricks will help a lot </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-sm-6 col-md-4">
                    <div class="blog-block ">
                        <img src="{{ asset('/assets/assets/images/blog/blog-1.jpg') }}" alt="" class="img-fluid">
                        <div class="blog-text">
                            <h6 class="author-name"><span>Tips and tricks</span>john Doe</h6>
                            <a href="blog-single.html" class="h5 my-2 d-inline-block">
                                Best tips to grow your content quality and standard.
                            </a>
                            <p>If you want to grow your content quality and standard you should foolow these tips
                                properly voluptatibus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-4">
                    <div class="blog-block ">
                        <img src="{{ asset('/assets/assets/images/blog/blog-2.jpg') }}" alt="" class="img-fluid">
                        <div class="blog-text">
                            <h6 class="author-name"><span>Branding</span>john Doe</h6>
                            <a href="blog-single.html" class="h5 my-2 d-inline-block">
                                Brand your site at top in few minuts.
                            </a>
                            <p>Brand your site at top, boost your audioance corporis facilis animi voluptas alias ex
                                saepe quo voluptatibus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-4">
                    <div class="blog-block ">
                        <img src="{{ asset('/assets/assets/images/blog/blog-3.jpg') }}" alt="" class="img-fluid">
                        <div class="blog-text">
                            <h6 class="author-name"><span>Marketing</span>john Doe</h6>
                            <a href="blog-single.html" class="h5 my-2 d-inline-block">
                                How to become a best sale <br>marketer in a year!
                            </a>
                            <p>Becomeing a best sale marketer is not easy but not impossible too.Need to follow up some
                                proper guidance and strategy .</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  BLOG AREA END  -->
@endsection

@push('pageTitle')
    <title>Home</title>
@endpush

@push('seo')
    {!! SEO::generate() !!}
@endpush
