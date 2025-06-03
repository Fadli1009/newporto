@php
    $sosmed = \App\Models\Skil::all();
    $iconMap = [
        'www.instagram.com' =>
            '<i class="ri-instagram-line rounded-full bg-[#2a2d33] p-2 hover:bg-[#363941] transition-all  text-white"></i>',
        'www.facebook.com' =>
            '<i class="ri-facebook-fill rounded-full bg-[#2a2d33] p-2 hover:bg-[#363941] transition-all text-white"></i>',
        'www.tiktok.com' =>
            '<i class="ri-tiktok-fill rounded-full bg-[#2a2d33] p-2 hover:bg-[#363941] transition-all text-white"></i>',
    ];
@endphp

<div class="mt-10 py-4 px-6 rounded-xl group bg-[#515761]">
    <div class="flex justify-between">
        <div class="flex items-center">
            <div class="h-1.5 w-1.5 rounded-full bg-gray-500 me-2 group-hover:bg-lime-500"></div>
            <span class="text-gray-300 font-bold text-xl">Follow Saya</span>
        </div>
        <div>
            <ul class="flex space-x-3">
                @foreach ($sosmed as $sosmeds)
                    @php
                        $host = parse_url($sosmeds->link, PHP_URL_HOST);
                        $icon =
                            $iconMap[$host] ??
                            '<i class="ri-global-line rounded-full bg-[#2a2d33] p-2 hover:bg-[#363941] transition-all  text-white"></i>';
                    @endphp
                    <li><a href="{{ $sosmeds->link }}" class=''>
                            {!! $icon !!}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="mt-5 bg-[#424750] py-4 px-6 rounded-xl flex justify-center items-center">
    <p class="text-gray-300">&copy;2025 Muhammad Fadli Kurniawan</p>
</div>
