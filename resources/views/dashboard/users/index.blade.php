@extends('dashboard/layouts/main') 

@section('container')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Admin</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td> {{ $user->email }} </td>
                            <td> {{ $user->is_admin == true ? 'Admin' : 'User' }} </td>
                            <td>{{ $user->is_actived == true ? 'Actived' : 'Unactived' }}</td>
                            <td>
                                <a class="badge bg-warning text-white" href="/dashboard/users/{{ $user->username }}/edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <button type="button" class="badge bg-danger d-inline border-0" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-whatever="{{ $user->username }}"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Users</h5>
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

@push('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush


@push('scripts')
  <!-- Page level plugins -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  {{-- Page level custom scripts --}}
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
  <script>
  let deleteModal = document.getElementById('deleteModal');
deleteModal.addEventListener('show.bs.modal', function (event) {
  let button = event.relatedTarget;
  let recipient = button.getAttribute('data-bs-whatever');

  let modalParagraph = deleteModal.querySelector('.modal-p');
  let modalFormAction = deleteModal.querySelector('.myForm');

  let title = recipient.replaceAll("-", " ");

  modalParagraph.textContent = `Delete user with username "${title}" ?`;
  modalFormAction.action = `/dashboard/users/${recipient}`;
});
</script>
@endpush