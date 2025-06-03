@extends('admin.base')
@section('title', 'Tambah Project')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('personalskils.update', $personalSkils->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="project_name" class="form-label">Nama Personal Skils</label>
                            <input type="text" class="form-control @error('skils') is-invalid @enderror"
                                id="project_name" name="nama_personalSkil" value="{{ $personalSkils->nama_personalSkil }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="project_name" class="form-label">Category SKils</label>
                            <select name="id_category" class="form-select" id="">
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $personalSkils->id_category == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="project_name" class="form-label">Foto Skils</label>
                            <input type="file" name="foto_skils" class="form-control" id="">
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

    <script>
        $(document).ready(function() {
            $('#btnadd').click(function() {
                let container = $('#container')
                let html = `<div class="mb-3">
                            <label for="project_name" class="form-label">Sosmed Link</label>
                            <input type="url" class="form-control @error('skils') is-invalid @enderror"
                                id="project_name" name="link[]" required>
                        </div>`
                container.append(html)
            })
        })
    </script>
@endsection
