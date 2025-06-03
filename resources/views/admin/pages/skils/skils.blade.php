@extends('admin.base')
@section('title', 'Project')
@section('content')
    <div>
        <a href="{{ route('skils.create') }}">Tambah</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Link</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($skils as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->link }}</td>
                        <td class="d-flex align-items-center">
                            <a href="{{ route('skils.edit', $item->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                            <form action="{{ route('skils.destroy', $item->id) }}" method="post">
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
