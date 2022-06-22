<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editCategory" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="mb-3">
                        <label for="editNameLabel" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="editNameLabel"
                            aria-describedby="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="editSlugLabel" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="editSlugLabel"
                            aria-describedby="name" name="slug" value="{{ old('slug') }}" required readonly>
                        @error('slug')
                            <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="editDescriptionLabel" cols="15" rows="5" placeholder="Description mask 250 character" required></textarea>
                        @error('description')
                            <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitEdit">Submit</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const editTitle = document.querySelector('#editNameLabel');
        const editSlug = document.querySelector('#editSlugLabel');
        const editDescription = document.querySelector('#editDescriptionLabel');

        editTitle.addEventListener('change', function() {
            fetch(`/dashboard/articles/checkSlug?title=${editTitle.value}`)
                .then(response => response.json())
                .then(data => editSlug.value = data.slug);
        });

        $(document).ready(function() {
            $("#submitEdit").click(function() {
                $("#editCategory").submit();
            });
        });

        const exampleModal = document.getElementById('editModal');
        exampleModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const slug = button.getAttribute('data-bs-whatever')

            const modal = $(this)

            fetch(`/dashboard/categories/${slug}/edit`)
                .then(response => response.json())
                .then((data) => {
                    editTitle.value = data.name;
                    editSlug.value = data.slug;
                    editDescription.value = data.description;
                    $('#editCategory').attr('action', `{{ URL::current() }}/${slug} }}`)
                })
        });
    </script>
@endpush
