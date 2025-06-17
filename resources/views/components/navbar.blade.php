<nav id="navbar"
    class="fixed top-0 left-1/2 transform -translate-x-1/2 z-3 lg:w-1/2 bg-[#393E46] p-3 rounded-xl border border-gray-500 lg:mt-5 w-full mt-2 transition-all duration-300">
    <div class="flex justify-between w-full items-center ">
        <div>
            <ul>
                <li class="text-2xl space-x-4 text-gray-400 flex">
                    <a href="/" class="relative group navlink">
                        <i
                            class="ri-home-line hover:bg-[#454b55] {{ Request::is('/') ? 'active' : '' }} rounded-full p-1 transition-all"></i>
                        <span
                            class="absolute bottom-full mb-[3px] left-1/2 -translate-x-1/2 bg-[#454b55] text-xs text-white rounded p-1 opacity-0 group-hover:opacity-100 transition-all pointer-events-none whitespace-nowrap z-10">
                            Home
                        </span>
                    </a>

                    <a href="/about" class="relative group navlink">
                        <i
                            class="ri-map-pin-user-line {{ Request::is('about') ? 'active' : '' }} hover:bg-[#454b55] rounded-full p-1 transition-all"></i>
                        <span
                            class="absolute bottom-full mb-[3px] left-1/2 -translate-x-1/2 bg-[#454b55] text-xs text-white rounded p-1 opacity-0 group-hover:opacity-100 transition-all pointer-events-none whitespace-nowrap z-10">
                            About
                        </span>
                    </a>

                    <a href="/project" class="relative group navlink">
                        <i
                            class="ri-folder-line {{ Request::is('project') ? 'active' : '' }} hover:bg-[#454b55] rounded-full p-1 transition-all"></i>
                        <span
                            class="absolute bottom-full mb-[3px] left-1/2 -translate-x-1/2 bg-[#454b55] text-xs text-white rounded p-1 opacity-0 group-hover:opacity-100 transition-all pointer-events-none whitespace-nowrap z-10">
                            Project
                        </span>
                    </a>

                    <a href="/sertifikat" class="relative group navlink">
                        <i
                            class="ri-vip-crown-line {{ Request::is('sertifikat') ? 'active' : '' }} hover:bg-[#454b55] rounded-full p-1 transition-all"></i>
                        <span
                            class="absolute bottom-full mb-[3px] left-1/2 -translate-x-1/2 bg-[#454b55] text-xs text-white rounded p-1 opacity-0 group-hover:opacity-100 transition-all pointer-events-none whitespace-nowrap z-10">
                            Sertifikat
                        </span>
                    </a>
                    <a href="/personalskils" class="relative group navlink">
                        <i
                            class="ri-apps-line {{ Request::is('personalskils') ? 'active' : '' }} hover:bg-[#454b55] rounded-full p-1 transition-all"></i>
                        <span
                            class="absolute bottom-full mb-[3px] left-1/2 -translate-x-1/2 bg-[#454b55] text-xs text-white rounded p-1 opacity-0 group-hover:opacity-100 transition-all pointer-events-none whitespace-nowrap z-10">
                            Personal Skils
                        </span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="flex justify-between items-center space-x-2 text-white">
            <button class="cursor-pointer text-xl" id="btnmode"><i class="ri-sun-fill " id="icon"></i></button>
            {{-- <button
                class="flex text-white items-center bg-[#454b55] px-2 py-1 rounded space-x-1 hover:bg-[#555c68] transition-all cursor-pointer">
                <i class="ri-add-line text-xs"></i>
                <h1 class="text-sm">Hire Me</h1>
            </button> --}}
        </div>
    </div>
</nav>
<script>

    btn = document.getElementById('btnmode');
        body = document.documentElement;
        icon = document.getElementById('icon');
        let cek = false

        function setTheme(isDark) {
            if (isDark) {
                body.classList.remove('bg-[#222831]')
                body.classList.add('bg-[#c6d8f3]')
                icon.classList.remove('ri-sun-fill')
                icon.classList.add('ri-sun-line')
                localStorage.setItem('theme', 'dark')
            } else {
                body.classList.remove('bg-[#c6d8f3]')
                body.classList.add('bg-[#222831]')
                icon.classList.add('ri-sun-fill')
                icon.classList.remove('ri-sun-line')
                localStorage.setItem('theme', 'light')
            }
        }

        let saved = localStorage.getItem('theme')        
        let isDark = saved == 'dark'
        setTheme(isDark)
        btn.addEventListener('click', function() {
            isDark = !isDark
            console.log('oi');
            
            setTheme(isDark)            

        })
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar')
            if (window.scrollY > 10) {
                navbar.classList.add("bg-[#393E46]/50", "backdrop-blur-lg")
            } else {
                navbar.classList.remove("bg-[#393E46]/50", "backdrop-blur-lg")
            }
        })
</script>
