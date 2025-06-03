@extends('base')
@section('title', 'Fadli | Personal Skils')
@section('content')
    <div class="flex items-center md:px-5">
        <div class="h-1.5 w-1.5 rounded-full bg-gray-500 me-2"></div>
        <span class="text-gray-400 font-bold md:text-xl">Sistem yang saya pahami</span>
    </div>
    <div class="mt-10">
        <div class="md:px-5">
            <h1 class="text-white font-bold text-xl md:text-4xl mb-3">Sistem yang saya pahami</h1>
            <p class="text-gray-400">Berikut ini adalah beberapa sistem yang telah saya pelajari dan pahami dalam proses
                pembelajaran dan pengalaman saya
            </p>
        </div>
        <div class="mt-6">
            <div class="flex flex-col space-y-3 p-5 bg-[#424750] rounded-xl">
                @foreach ($categoryPerskil as $item)
                    <div class="w-full bg-[#222831] rounded">
                        <div class="flex items-center p-3">
                            <i class="ri-folder-2-fill text-yellow-500 text-2xl"></i>
                            <p class="text-gray-400 ms-2">{{ $item->nama_kategori }}</p>
                        </div>
                        <div class="mt-5 ms-11">
                            <ul>
                                @foreach ($item->personalSkils as $perskil)
                                    <li class="text-gray-300 flex items-center mb-5">
                                        <img src="{{ asset('storage/' . $perskil->foto_skils) }}"
                                            class="w-10 h-10 object-cover" alt="">
                                        <p class="ms-3">{{ $perskil->nama_personalSkil }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
