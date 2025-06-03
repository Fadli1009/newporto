@extends('admin.base')
@section('content')
    <form method="POST" action="{{ route('slug.store') }}" class="mb-5">
        @csrf
        <div class="mb-4">
            <label for="slug1" class="form-label fw-bold">Slug Home</label>
            <div class="input-group">
                <span class="input-group-text">Slug Home</span>
                <textarea class="form-control" id="slug1" name="slug_home" rows="3" placeholder="Enter slug 1">{{ $slug->slug_home ?? '' }}</textarea>
            </div>
            @error('slug1')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="slug2" class="form-label fw-bold">Slug About me 1</label>
            <div class="input-group">
                <span class="input-group-text">Slug about me 1</span>
                <textarea class="form-control" id="slug2" name="slug_about" rows="3" placeholder="Enter slug 2">{{ $slug->slug_about ?? '' }}</textarea>
            </div>
            @error('slug2')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="slug3" class="form-label fw-bold">Slug ABout me 2</label>
            <div class="input-group">
                <span class="input-group-text">Slug about me 2</span>
                <textarea class="form-control" id="slug3" name="slug_about_me" rows="3" placeholder="Enter slug 3">{{ $slug->slug_about_me ?? '' }}</textarea>
            </div>
            @error('slug3')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="reset" class="btn btn-outline-secondary me-md-2">Reset</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
