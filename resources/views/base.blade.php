<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="transition-colors duration-500">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script>
        (function() {
            const saved = localStorage.getItem('theme');
            const isDark = saved === 'dark';            
            const bodyClassList = document.documentElement.classList;
            console.log(saved);
            
            if (!isDark) {
                bodyClassList.remove('bg-[#c6d8f3]');
                bodyClassList.add('bg-[#222831]')   ;
            } else {
                bodyClassList.remove('bg-[#222831]');
                bodyClassList.add('bg-[#c6d8f3]');
            }
        })();
    </script>
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/splide/dist/css/splide.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tsparticles/confetti@3.0.3/tsparticles.confetti.bundle.min.js"></script>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/splide/dist/js/splide.min.js') }}"></script>


</head>

<body class="w-full h-screen  loading" id="body">
    <div class="px-5 mx-auto w-full lg:px-0 lg:w-[50%] shadow-xl/30">
        <div class="mx-5">
            @include('components.navbar')
        </div>
        <div class="mt-24 mb-10 bg-[#393E46] rounded-xl px-4 py-5" id="content-web">
            @yield('content')
            @include('components.footer')
        </div>

    </div>
</body>

</html>
