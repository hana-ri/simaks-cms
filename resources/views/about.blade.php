@extends('layouts/main')

@section('container')
    @include('/partials/navbar')
    <div class="container my-3">
        <div class="row">
            <div class="col">
                <div class="card text-center">
                  <div class="card-header">
                    <strong>About us</strong>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Our Team</h5>
                    <p class="card-text">Lorem ipsum, in graphical and textual context, refers to filler text that is placed in a document or visual presentation. Lorem ipsum is derived from the Latin "dolorem ipsum" roughly translated as "pain itself. With supporting text below as a natural lead-in to additional content. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

                    <div class="row row-cols-1 row-cols-md-3 g-4">
                      <div class="col">
                        <div class="card h-100">
                          <svg class="bd-placeholder-img rounded-circle mx-auto mt-3" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                          <div class="card-body">
                            <h5 class="card-title">Rifty Pradana Gunawan</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card h-100">
                          <svg class="bd-placeholder-img rounded-circle mx-auto mt-3" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                          <div class="card-body">
                            <h5 class="card-title">Mohamad Rizal Hanafi</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card h-100">
                          <svg class="bd-placeholder-img rounded-circle mx-auto mt-3" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                          <div class="card-body">
                            <h5 class="card-title">Dimas Yuda Putra Aryanto</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-muted">
                        simaks@gmail.com
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('/partials/footer')
@endsection('container')
@push('pageTitle')
    <title>About</title>
@endpush
