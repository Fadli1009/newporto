@extends('admin.base')
@section('title', 'Tambah Project')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('skils.update', $skil->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="project_name" class="form-label">Sosmed Link</label>
                            <input type="url" class="form-control @error('skils') is-invalid @enderror"
                                id="project_name" name="link" value="{{ $skil->link }}" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2"
                                onclick="window.history.back();">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Skils</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
