@extends('admin.base')
@section('title', 'Certificate')
@section('content')
    <div>
        <a href="{{ route('certificate.create') }}">Tambah</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Certificate</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($certificate as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->status($item->status) }}</td>
                        <td class="d-flex align-items-center">
                            <a href="{{ route('certificate.edit', $item->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                            <form action="{{ route('certificate.destroy', $item->id) }}">
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
