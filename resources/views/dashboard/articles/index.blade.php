@extends('dashboard/layouts/main')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="my-3">
        <a href="/dashboard/articles/create" class="btn btn-success">
            <span class="text">Create article</span>
        </a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Articles</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Categori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Categori</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->category->name }}</td>
                            <td>
                                <a class="badge bg-success text-white" href="/dashboard/articles/{{ $article->slug }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="badge bg-warning text-white" href="/dashboard/articles/{{ $article->slug }}/edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                                    <button type="button" class="badge bg-danger d-inline border-0" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-whatever="{{ $article->slug }}"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Modal -->
<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Article</h5>
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
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
{{-- Page level custom scripts --}}
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

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

  modalParagraph.textContent = `Delete article "${title}" ?`;
  modalFormAction.action = `/dashboard/articles/${recipient}`;
});
</script>
@endpush