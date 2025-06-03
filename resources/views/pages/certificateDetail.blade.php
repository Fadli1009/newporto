@extends('base')
@section('title','Fadli | Detail Sertifikat')
@section('content')
    <style>
        .my-carousel-progress {
            background: #ccc;
        }


        .my-carousel-progress-bar {
            background: #183B4E;
            height: 4px;
            transition: width 400ms ease;
            width: 0;
        }
    </style>
    <div>
        <img src="{{ asset('storage/' . $data->img) }}" class="object-cover w-full" alt="">
    </div>
    <div class="mt-10">
        <h1 class="text-white text-2xl font-bold">{{ $data->judul }}</h1>
    </div>
    <div class="mt-10">

        <div class="mt-5">
            <p class="text-gray-400">{!! nl2br(e($data->desc)) !!}
            </p>
        </div>
    </div>
@endsection
