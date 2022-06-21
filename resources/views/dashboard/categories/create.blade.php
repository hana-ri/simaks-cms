<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Modal title</h5>
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

        $(document).ready(function() {
            $("#submitButton").click(function() {
                $("#categoryForm").submit();
            });
        });
    </script>
@endpush