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
                        <p class="card-text">Lorem ipsum, in graphical and textual context, refers to filler text that
                            is placed in a document or visual presentation. Lorem ipsum is derived from the Latin "dolorem
                            ipsum" roughly translated as "pain itself. With supporting text below as a natural lead-in to
                            additional content. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                            nibh euismod tincidunt ut laoreet dolore magna. Lorem Ipsum is simply dummy text of the printing
                            and typesetting industry.</p>
                        <div class="row">
                            <div class="col-3">
                                <img src="https://lh3.googleusercontent.com/a-/AOh14Gg25Bzl7xpiqchL3pv-IqULpVs7gJGiUFG3h-B8bw=s288-p-no" class="rounded-circle float-start img-fluid" alt="rizal" style="width: 250px;">
                            </div>
                            <div class="col-9 text-start">
                                <p class="fs-4">Mohamad Rizal Hanafi</p>
                                <p class="fs-5">Mahasiswa Teknik Komputer</p>
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                            </div>
                            
                            <div class="col-9 text-end">
                                <p class="fs-4">DIMAS YUDA PUTRA ARYANTO</p>
                                <p class="fs-5">Mahasiswa Teknik Komputer</p>
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                            </div>
                            <div class="col-3">
                                <img src="https://lh3.googleusercontent.com/a-/AOh14GiAdDSZOgTqxWV5gO7QCg71pVoLMmPRvf_qFKeV=s288-p-no" class="rounded-circle float-start img-fluid" alt="rizal" style="width: 250px;">
                            </div>

                            <div class="col-3">
                                <img src="https://lh3.googleusercontent.com/a-/AOh14GjchcweCg0Vrz6fiyjfXkeDGOUb5o2moI9OILmV=s288-p-no" class="rounded-circle float-start img-fluid" alt="rizal" style="width: 250px;">
                            </div>
                            <div class="col-9 text-start">
                                <p class="fs-4">Mohamad Rizal Hanafi</p>
                                <p class="fs-5">Mahasiswa Teknik Komputer</p>
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                            </div>
                        </div>
                        {{-- <div class="row row-cols-1 row-cols-md-3 g-4">
                            <div class="col">
                                <div class="card h-100">
                                    <svg class="bd-placeholder-img rounded-circle mx-auto mt-3" width="140" height="140"
                                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                                        preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777"
                                            dy=".3em">140x140</text>
                                    </svg>
                                    <div class="card-body">
                                        <h5 class="card-title">Rifty Pradana Gunawan</h5>
                                        <p class="card-text">This is a longer card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100">
                                    <svg class="bd-placeholder-img rounded-circle mx-auto mt-3" width="140" height="140"
                                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                                        preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777"
                                            dy=".3em">140x140</text>
                                    </svg>
                                    <div class="card-body">
                                        <h5 class="card-title">Mohamad Rizal Hanafi</h5>
                                        <p class="card-text">This is a longer card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100">
                                    <svg class="bd-placeholder-img rounded-circle mx-auto mt-3" width="140" height="140"
                                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                                        preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777"
                                            dy=".3em">140x140</text>
                                    </svg>
                                    <div class="card-body">
                                        <h5 class="card-title">Dimas Yuda Putra Aryanto</h5>
                                        <p class="card-text">This is a longer card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-footer text-muted">
                            simaks@gmail.com
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('/partials/footer')
@endsection
@push('pageTitle')
    <title>About</title>
@endpush
