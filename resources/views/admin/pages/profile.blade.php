@extends('admin.base')
@section('title', 'Profile')
@section('content')

    <div class="card-header">{{ isset($profile) ? 'Update Profile' : 'Create Profile' }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('profile.store') }} " enctype="multipart/form-data">
            @csrf

            <!-- Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ $profile->name ?? '' }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email', $profile->email ?? '') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- CV Upload Field -->
            <div class="mb-3">
                <label for="cv" class="form-label">CV</label>
                <input type="file" class="form-control @error('cv') is-invalid @enderror" id="cv" name="cv"
                    accept=".pdf,.doc,.docx">
                @error('cv')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <!-- CV Preview -->
                <div class="cv-preview mt-2 w-100 p-3 border rounded" id="cvPreviewContainer"
                    style="display: {{ isset($profile) && $profile->cv ? 'block' : 'none' }}">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-file-earmark-text fs-1 me-3"></i>
                        <div>
                            @if (isset($profile) && $profile->cv)
                                <iframe src="{{ asset('storage/' . $profile->cv) }}" frameborder="1"
                                    class="w-100"></iframe>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Photo Uploads -->
            <div class="mb-3">
                <label class="form-label">Photos</label>

                <div class="row">
                    <!-- Photo 1 -->
                    <div class="col-md-4 mb-3">
                        <label for="photo1" class="form-label">Foto 1 (Home)</label>
                        <input type="file" class="form-control @error('photo1') is-invalid @enderror" id="photo1"
                            name="photo_home" accept="image/*">
                        @error('photo1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div class="mt-2 border rounded preview-container" id="photo1Preview">
                            @if (isset($profile) && $profile->photo_home)
                                <img src="{{ asset('storage/' . $profile->photo_home) }}" class="img-fluid preview-image"
                                    alt="Photo 1">
                            @else
                                <div class="text-center text-muted">Image Preview</div>
                            @endif
                        </div>
                    </div>

                    <!-- Photo 2 -->
                    <div class="col-md-4 mb-3">
                        <label for="photo2" class="form-label">Foto 2 (About me)</label>
                        <input type="file" class="form-control @error('photo2') is-invalid @enderror" id="photo2"
                            name="photo_aboutme1" accept="image/*">
                        @error('photo2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div class="mt-2 border rounded preview-container" id="photo2Preview">
                            @if (isset($profile) && $profile->photo_aboutme1)
                                <img src="{{ asset('storage/' . $profile->photo_aboutme1) }}"
                                    class="img-fluid preview-image" alt="Photo 2">
                            @else
                                <div class="text-center text-muted">Image Preview</div>
                            @endif
                        </div>
                    </div>

                    <!-- Photo 3 -->
                    <div class="col-md-4 mb-3">
                        <label for="photo3" class="form-label">Foto 3 (Flip About Me)</label>
                        <input type="file" class="form-control @error('photo3') is-invalid @enderror" id="photo3"
                            name="photo_aboutme2" accept="image/*">
                        @error('photo3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div class="mt-2 border rounded preview-container" id="photo3Preview">
                            @if (isset($profile) && $profile->photo_aboutme2)
                                <img src="{{ asset('storage/' . $profile->photo_aboutme2) }}"
                                    class="img-fluid preview-image" alt="Photo 3">
                            @else
                                <div class="text-center text-muted">Image Preview</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">
                    {{ isset($profile) ? 'Update' : 'Create' }} Profile
                </button>
            </div>
        </form>
    </div>
@endsection
