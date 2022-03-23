@extends('dashboard/layouts/main')
@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary ">Categories</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success mb-4" data-toggle="modal" data-target="#createModal">Create new category</button>
                        <div class="row">
                          <div class="col">
                           @foreach ($categories as $category)
                            <!-- Collapsable Card Example -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#card-{{ $loop->iteration }}" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="card-{{ $loop->iteration }}">
                                    <h6 class="m-0 font-weight-bold text-primary">{{ $category->name }}</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse hidden" id="card-{{ $loop->iteration }}">
                                    <div class="card-body">
                                        <p>{{ $category->description }}</p>
                                        <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning text-white">Edit</a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-whatever="{{ $category->slug }}">Delete</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                          </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<!-- Modal -->
<!-- Create Modal-->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Create category</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
          <form action="/dashboard/categories" method="post">
            <div class="modal-body">
              @csrf
              <div class="mb-3">
                <label for="nameLabel" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameLabel" aria-describedby="name" name="name" value="{{ old('name') }}">
                @error('name')
                  <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="slugLabel" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slugLabel" aria-describedby="name" name="slug" value="{{ old('slug') }}" readonly>
                @error('name')
                  <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="Description" class="form-label">Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="Description" aria-describedby="name" name="description" value="{{ old('description') }}" placeholder="Description mask 250 character">
                @error('name')
                  <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Submit <span data-feather="log-out"></span></button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body modal-delete">
          <div class="mb-3">
            <p class="modal-p"></p>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form class="myForm" action="" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
   const title = document.querySelector('#nameLabel');
   const slug = document.querySelector('#slugLabel');

   title.addEventListener('change',function() {
   fetch(`/dashboard/articles/checkSlug?title=${title.value}`)
       .then(response => response.json())
       .then(data => slug.value = data.slug);
   });
</script>

<script>
  let deleteModal = document.getElementById('deleteModal');
  deleteModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    let button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    let recipient = button.getAttribute('data-bs-whatever');
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    let modalParagraph = deleteModal.querySelector('.modal-p');
    let modalFormAction = deleteModal.querySelector('.myForm');
    let title = recipient.replaceAll("-", " ");

    modalParagraph.textContent = `Delete category "${title}" ?`;
    modalFormAction.action = `/dashboard/categories/${recipient}`;
  });
</script>
@endpush