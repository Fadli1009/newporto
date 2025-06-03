@extends('base')
@section('title','Fadli | About')
@section('content')
    <div class="flex items-center">
        <div class="h-1.5 w-1.5 rounded-full bg-gray-500 me-2"></div>
        <span class="text-gray-400 font-bold text-xl">About</span>
    </div>
    <div class="mt-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
            <div class="order-2 md:order-1">
                <h1 class="text-white font-bold text-4xl mb-3">Hi, Saya Fadlii</h1>
                <p class="text-gray-400">{!! $slug->slug_about !!}
                </p>
            </div>
            <div class="flex lg:justify-end items-center p-0.5 rounded-xl z-1 order-1 md:order-2">
                <div class="relative h-64 w-64 perspective-1000">
                    <div class="relative h-full w-full duration-700 transform-style-preserve-3d group hover:rotate-y-180">
                        <div class="absolute inset-0 backface-hidden">
                            <div class="flex justify-center items-center bg-gray-500/50 p-2 rounded-xl h-full w-full">
                                <img src="{{ asset('storage/' . $profile->photo_aboutme1) }}"
                                    class="rounded-2xl h-full w-full object-cover " alt="Front image">
                            </div>
                        </div>

                        <!-- Back side -->
                        <div class="absolute inset-0 backface-hidden rotate-y-180">
                            <div class="flex justify-center items-center bg-gray-500/50 p-2 rounded-xl h-full w-full">
                                <img src="{{ asset('storage/' . $profile->photo_aboutme2) }}" />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="mt-10">
            <h1 class="text-white text-xl font-bold">More About me</h1>
            <div class="mt-5">
                <p class="text-gray-400">{!! nl2br(e($slug->slug_about_me)) !!}
                </p>
            </div>
        </div>
        <style>
            /* These custom properties are needed for the 3D effect since Tailwind doesn't have built-ins for all of these */
            .perspective-1000 {
                perspective: 1000px;
            }

            .backface-hidden {
                backface-visibility: hidden;
            }

            .transform-style-preserve-3d {
                transform-style: preserve-3d;
            }

            .rotate-y-180 {
                transform: rotateY(180deg);
            }

            .group:hover .rotate-y-180 {
                transform: rotateY(180deg);
            }
        </style>
    @endsection
