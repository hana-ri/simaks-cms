<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Action!!!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <p>Apakah anda yakin ingin menghapus data tersebut?</p>
                    <form id="deleteForm" method="POST">
                        @method('DELETE')
                        @csrf
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="deleteRowButton">Hapus</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        $('#deleteModal').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget)
            let recipient = button.data('bs-whatever')
            let modal = $(this)
            modal.find('.modal-body form').attr('action', '{{ URL::current() }}/' + recipient)
        });

        $(document).ready(function() {
            $("#deleteRowButton").click(function() {
                $("#deleteForm").submit();
            });
        });
    </script>
@endpush
