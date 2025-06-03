@extends('base')
@section('title', 'Fadli | Sertifikat')
@section('content')
    <div class="flex items-center md:px-5">
        <div class="h-1.5 w-1.5 rounded-full bg-gray-500 me-2"></div>
        <span class="text-gray-400 font-bold md:text-xl">Sertifikat</span>
    </div>
    <div class="mt-10">
        <div class="md:px-5">
            <h1 class="text-white font-bold text-xl md:text-4xl mb-3">Sertifikat Saya</h1>
            <p class="text-gray-400">Berikut adalah beberapa sertifikat yang telah saya peroleh sebagai bukti kompetensi dan
                pencapaian saya di bidang terkait.
            </p>
        </div>
        <div class="mt-6">
            <div class="flex flex-col space-y-3 p-5 bg-[#424750] rounded-xl">
                @foreach ($certificate as $item)
                    <a href="{{ route('show.certificate', $item->slug_certificate) }}"
                        class="bg-[#515761] p-3 rounded-xl block border-2 border-transparent hover:border-gray-500 shadow-xl ">
                        <div class="flex justify-between items-center transition-all ">
                            <div class="flex items-center space-x-3">
                                <img src="{{ asset('storage/' . $item->img) }}" class="rounded h-15 w-15 lg:w-20 lg:h-20"
                                    alt="">
                                <div>
                                    <h3 class="font-bold text-white lg:text-xl">{{ $item->judul }}</h3>
                                    <p class="text-gray-300">{{ $item->judul }}</p>
                                </div>
                            </div>
                            <i class="ri-arrow-right-wide-line text-sm lg:text-2xl text-gray-700"></i>
                        </div>
                    </a>
                @endforeach
                <div class="mt-10">
                    {{ $certificate->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
