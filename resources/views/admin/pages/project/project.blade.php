@extends('admin.base')
@section('title', 'Project')
@section('content')
    <div>
        <a href="{{ route('project.create') }}">Tambah</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Project</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($project as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->status($item->status) }}</td>
                        <td class="d-flex align-items-center">
                            <a href="{{ route('project.edit', $item->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                            <form action="{{ route('profile.destroy', $item->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                @endforelse

            </tbody>
        </table>
    </div>
@endsection
