<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">New tag</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/tag" method="POST" id="createNewCategory">
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitButton">Submit</button>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        // Slug
        const title = document.querySelector('#nameLabel');
        const slug = document.querySelector('#slugLabel');

        title.addEventListener('change', function() {
            fetch(`/dashboard/articles/checkSlug?title=${title.value}`)
                .then(response => response.json())
                .then(data => slug.value = data.slug);
        });

        $(document).ready(function() {
            $("#submitButton").click(function() {
                $("#createNewCategory").submit();
            });
        });
    </script>
@endpush