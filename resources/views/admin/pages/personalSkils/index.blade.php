@extends('admin.base')
@section('title', 'Personal Skils')
@section('content')
    <div class="mb-5">
        <a href="{{ route('categoryskils.create') }}">Tambah</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Skils Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categorySkils as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_kategori }}</td>
                        <td class="d-flex align-items-center">
                            <a href="{{ route('categoryskils.edit', $item->id) }}"
                                class="btn btn-sm btn-warning me-2">Edit</a>
                            <form action="{{ route('categoryskils.destroy', $item->id) }}" method="post">
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
    <div>
        <a href="{{ route('personalskils.create') }}">Tambah</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Skils</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($perSkil as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_personalSkil }}</td>
                        <td>{{ $item->category->nama_kategori }}</td>
                        <td class="d-flex align-items-center">
                            <a href="{{ route('personalskils.edit', $item->id) }}"
                                class="btn btn-sm btn-warning me-2">Edit</a>
                            <form action="{{ route('personalskils.destroy', $item->id) }}" method="post">
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
