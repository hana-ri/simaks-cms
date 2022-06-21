@extends('dashboard/layouts/main')

{{-- @section('container')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-md-8">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary ">Update Category</h6>
      </div>
      <div class="card-body shadow mb-4">
        <form action="/dashboard/categories/{{ $category->slug }}" method="post">
              @csrf
              @method('put')
              <div class="mb-3">
                <label for="nameLabel" class="form-label">Name</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="nameLabel" aria-describedby="name" name="name" value="{{ old('name', $category->name) }}" required>
                @error('name')
                  <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="slugLabel" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slugLabel" aria-describedby="name" name="slug" value="{{ old('slug', $category->slug) }}" required readonly>
                @error('slug')
                  <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="Description" class="form-label">Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="Description" aria-describedby="name" name="description" value="{{ old('description', $category->description) }}" placeholder="Description mask 250 character" required>
                @error('description')
                  <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="/dashboard/categories" class="btn btn-secondary">Back</a>
      </form>
      </div>
    </div>
@endsection --}}

{{-- <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/categories" method="POST" id="categoryForm">
                    @csrf
                    <div class="mb-3">
                        <label for="nameLabel" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameLabel"
                            aria-describedby="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slugLabel" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slugLabel"
                            aria-describedby="name" name="slug" value="{{ old('slug') }}" required readonly>
                        @error('slug')
                            <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror"
                            id="Description" aria-describedby="name" name="description"
                            value="{{ old('description') }}" placeholder="Description mask 250 character" required>
                        @error('description')
                            <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> --}}


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Tour</h4>
      </div>
      <div class="modal-body">
      <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
          <div class="form-group error">
           <label for="inputName" class="col-sm-3 control-label">Name</label>
             <div class="col-sm-9">
              <input type="text" class="form-control has-error" id="name" name="name" placeholder="Product Name" value="">
             </div>
             </div>
           <div class="form-group">
           <label for="inputDetail" class="col-sm-3 control-label">Details</label>
              <div class="col-sm-9">
              <input type="text" class="form-control" id="details" name="details" placeholder="details" value="">
              </div>
          </div>
      </form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
      <input type="hidden" id="product_id" name="tour_id" value="0">
      </div>
  </div>
</div>
</div>
</div>


@push('scripts')
    <script>
        const title = document.querySelector('#nameLabel');
        const slug = document.querySelector('#slugLabel');

        title.addEventListener('change', function() {
            fetch(`/dashboard/articles/checkSlug?title=${title.value}`)
                .then(response => response.json())
                .then(data => slug.value = data.slug);
        });
    </script>
    <script>
    $(document).on('click','.open_modal',function(){
        var url = "domain.com/yoururl";
        var tour_id= $(this).val();
        $.get(url + '/' + tour_id, function (data) {
            //success data
            console.log(data);
            $('#tour_id').val(data.id);
            $('#name').val(data.name);
            $('#details').val(data.details);
            $('#btn-save').val("update");
            $('#myModal').modal('show');
        }) 
    });

    </script>
@endpush
