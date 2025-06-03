@extends('admin.base')
@section('title', 'Tambah Project')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Project Name -->
                        <div class="mb-3">
                            <label for="project_name" class="form-label">Project Name</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                id="project_name" name="judul" required>
                            @error('project_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="project_name" class="form-label">Sub Judul</label>
                            <input type="text" class="form-control @error('subjudul') is-invalid @enderror"
                                id="project_name" name="sub_judul" required>
                            @error('project_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- Project Thumbnail -->
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Project Thumbnail</label>
                            <input class="form-control @error('thumbnail') is-invalid @enderror" type="file"
                                id="thumbnail" name="img" accept="image/*" required>
                            <small class="text-muted">Upload the main image for your project</small>
                            @error('thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Preview for Thumbnail -->
                        <div class="mb-3">
                            <div class="mt-2" id="thumbnailPreview" style="display: none;">
                                <img id="thumbnailImg" src="#" alt="Thumbnail Preview" class="img-thumbnail"
                                    style="max-height: 200px;">
                            </div>
                        </div>

                        <!-- Project Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Project Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="desc" rows="5"
                                required></textarea>
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
                        <!-- Multiple Images -->
                        <div class="mb-3">
                            <label for="project_images" class="form-label">Project Images</label>
                            <input class="form-control @error('project_images') is-invalid @enderror" type="file"
                                id="project_images" name="project_images[]" accept="image/*" multiple>
                            <small class="text-muted">You can select multiple images for your project gallery</small>
                            @error('project_images')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Preview for Multiple Images -->
                        <div class="mb-3">
                            <div class="row" id="imagesPreview"></div>
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
        // Preview for thumbnail
        document.getElementById('thumbnail').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('thumbnailImg').src = e.target.result;
                    document.getElementById('thumbnailPreview').style.display = 'block';
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
    </script>
@endsection
