@extends('base')
@section('title', 'Fadli | Detail Project')
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
        <img src="{{ asset('storage/' . $data->img) }}" class="h-40 w-40 rounded-full" alt="">
    </div>
    <div class="mt-10">
        <h1 class="text-white text-2xl font-bold">{{ $data->judul }}</h1>
    </div>
    <div class="mt-10">
        @if ($data['projectImages']->isNotEmpty())
            <section class="splide" aria-label="...">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($data['projectImages'] as $item)
                            <li class="splide__slide">
                                <img src="{{ asset('storage/' . $item->project_images) }}" class="object-cover"
                                    alt="">
                            </li>
                        @endforeach
                    </ul>
                </div>


                <!-- Add the progress bar element -->
                <div class="my-carousel-progress">
                    <div class="my-carousel-progress-bar"></div>
                </div>
            </section>
        @endif

        <div class="mt-5">
            <p class="text-gray-400">{!! nl2br(e($data->desc)) !!}
            </p>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var splide = new Splide('.splide', {
                rewind: true
            });
            var bar = splide.root.querySelector('.my-carousel-progress-bar');
            splide.on('mounted move', function() {
                var end = splide.Components.Controller.getEnd() + 1;
                var rate = Math.min((splide.index + 1) / end, 1);
                bar.style.width = String(100 * rate) + '%';
            });
            splide.mount();
        });
    </script>
@endsection
