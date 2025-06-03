@extends('admin.base')
@section('title', 'Tambah Project')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <!-- Project Name -->
                        <div class="mb-3">
                            <label for="project_name" class="form-label">Project Name</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                id="project_name" name="judul" value="{{ $project->judul }}" required>
                            @error('project_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="project_name" class="form-label">Sub Judul</label>
                            <input type="text" class="form-control @error('subjudul') is-invalid @enderror"
                                id="project_name" name="sub_judul" required value="{{ $project->sub_judul }}">
                            @error('project_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- Project Thumbnail -->
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Project Thumbnail</label>
                            <input class="form-control @error('thumbnail') is-invalid @enderror" type="file"
                                id="thumbnail" name="img" accept="image/*">
                            <small class="text-muted">Upload the main image for your project</small>
                            @error('thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Preview for Thumbnail -->
                        <div class="mb-3">
                            <div class="mt-2" id="thumbnailPreview">
                                <img id="thumbnailImg" src="{{ asset('storage/' . $project->img) }}" alt="Thumbnail Preview"
                                    class="img-thumbnail" style="max-height: 200px;">
                            </div>
                        </div>

                        <!-- Project Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Project Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="desc" rows="5"
                                required>{{ $project->desc }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Status</label>
                            <select name="status" id="" class="form-select">
                                <option value="1" selected>Post</option>
                                <option value="0">Draft</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="project_images" class="form-label">Project Images</label>
                            <input class="form-control @error('project_images') is-invalid @enderror" type="file"
                                id="project_images" name="project_images[]" accept="image/*" multiple>
                            <small class="text-muted">You can select multiple images for your project gallery</small>
                            @error('project_images')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="row" id="imagesPreview">
                                <h6 class="fw-bold">Foto Baru</h6>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h6 class="fw-bold">Current Images</h6>

                            @if ($projectImgs->count() > 0)
                                <div class="row" id="existingImages">
                                    @foreach ($projectImgs as $image)
                                        <div class="col-md-3 mb-3 image-container" id="image-{{ $image->id }}">
                                            <div class="card h-100">
                                                <img src="{{ asset('storage/' . $image->project_images) }}"
                                                    class="card-img-top" alt="Project Image"
                                                    style="height: 150px; object-fit: cover;">
                                                <div class="card-body p-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input delete-image" type="checkbox"
                                                            name="delete_images[]" value="{{ $image->id }}"
                                                            id="delete-{{ $image->id }}">
                                                        <label class="form-check-label" for="delete-{{ $image->id }}">
                                                            Mark for deletion
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-info">
                                    No images have been added to this project yet.
                                </div>
                            @endif
                        </div>


                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2"
                                onclick="window.history.back();">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        
        document.getElementById('thumbnail').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('thumbnailImg').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        // Preview for multiple images
        document.getElementById('project_images').addEventListener('change', function(e) {
            const imagesPreview = document.getElementById('imagesPreview');
            imagesPreview.innerHTML = '';

            if (this.files) {
                Array.from(this.files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const col = document.createElement('div');
                        col.className = 'col-md-3 mt-2';

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'img-thumbnail';
                        img.style.height = '150px';
                        img.style.width = '100%';
                        img.style.objectFit = 'cover';

                        col.appendChild(img);
                        imagesPreview.appendChild(col);
                    }
                    reader.readAsDataURL(file);
                });
            }
        });
        document.querySelectorAll('.delete-image').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const container = this.closest('.image-container');
                if (this.checked) {
                    container.style.opacity = '0.5';
                } else {
                    container.style.opacity = '1';
                }
            });
        });
        const existingImagesEl = document.getElementById('existingImages');
        if (existingImagesEl) {
            const sortable = new Sortable(existingImagesEl, {
                animation: 150,
                ghostClass: 'sortable-ghost',
                onEnd: function() {
                    updateImageOrder();
                }
            });

            // Update hidden input with image order
            function updateImageOrder() {
                const imageContainers = document.querySelectorAll('#existingImages .image-container');
                const imageIds = Array.from(imageContainers).map(container => {
                    return container.id.replace('image-', '');
                });
                document.getElementById('imageOrder').value = JSON.stringify(imageIds);
            }

            // Initialize image order
            updateImageOrder();
        }
    </script>
@endsection
