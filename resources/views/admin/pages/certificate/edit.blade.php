@extends('admin.base')
@section('title', 'Tambah certificate')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('certificate.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <!-- certificate Name -->
                        <div class="mb-3">
                            <label for="certificate_name" class="form-label">certificate Name</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                id="certificate_name" name="judul" value="{{ $certificate->judul }}" required>
                            @error('certificate_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="certificate_name" class="form-label">Sub Judul</label>
                            <input type="text" class="form-control @error('subjudul') is-invalid @enderror"
                                id="certificate_name" name="sub_judul" required value="{{ $certificate->sub_judul }}">
                            @error('certificate_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- certificate Thumbnail -->
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">certificate Thumbnail</label>
                            <input class="form-control @error('thumbnail') is-invalid @enderror" type="file"
                                id="thumbnail" name="img" accept="image/*">
                            <small class="text-muted">Upload the main image for your certificate</small>
                            @error('thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Preview for Thumbnail -->
                        <div class="mb-3">
                            <div class="mt-2" id="thumbnailPreview">
                                <img id="thumbnailImg" src="{{ asset('storage/' . $certificate->img) }}" alt="Thumbnail Preview"
                                    class="img-thumbnail" style="max-height: 200px;">
                            </div>
                        </div>

                        <!-- certificate Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">certificate Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="desc" rows="5"
                                required>{{ $certificate->desc }}</textarea>
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
                                    
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2"
                                onclick="window.history.back();">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save certificate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>   
@endsection
