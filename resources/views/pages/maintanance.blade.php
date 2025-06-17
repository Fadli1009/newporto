<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sedang Maintenance - Harap Bersabar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes pulse-ring {
            0% {
                transform: scale(0.33);
            }

            40%,
            50% {
                opacity: 1;
            }

            100% {
                opacity: 0;
                transform: scale(1.33);
            }
        }

        @keyframes spin-slow {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .float {
            animation: float 3s ease-in-out infinite;
        }

        .pulse-ring {
            animation: pulse-ring 1.25s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
        }

        .spin-slow {
            animation: spin-slow 3s linear infinite;
        }

        .gradient-bg {
            background: linear-gradient(-45deg, #667eea, #764ba2, #f093fb, #f5576c);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>

<body class="gradient-bg min-h-screen flex items-center justify-center p-4">
    <div class="max-w-2xl mx-auto text-center">
        <!-- Icon Container -->
        <div class="relative mb-8">
            <div class="relative inline-flex">
                <!-- Pulse rings -->
                <div class="absolute inset-0 rounded-full bg-white opacity-25 pulse-ring"></div>
                <div class="absolute inset-0 rounded-full bg-white opacity-25 pulse-ring" style="animation-delay: 0.5s;">
                </div>

                <!-- Main icon -->
                <div class="relative bg-white bg-opacity-20 backdrop-blur-lg rounded-full p-8 float">
                    <div class="spin-slow">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div
            class="bg-white bg-opacity-10 backdrop-blur-lg rounded-3xl p-8 shadow-2xl border border-white border-opacity-20">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Sedang Maintenance
            </h1>

            <div class="w-24 h-1 bg-white bg-opacity-60 mx-auto mb-6 rounded-full"></div>

            <p class="text-xl text-white text-opacity-90 mb-8 leading-relaxed">
                Saya sedang melakukan pemeliharaan sistem untuk memberikan pengalaman yang lebih baik.
                <br>
                <span class="font-semibold">Harap bersabar, Saya akan segera kembali!</span>
            </p>

            <!-- Progress Bar Animation -->
            <div class="mb-8">
                <div class="bg-white bg-opacity-20 rounded-full h-2 overflow-hidden">
                    <div class="bg-white h-full rounded-full animate-pulse"
                        style="width: 75%; transition: width 2s ease-in-out;"></div>
                </div>
                <p class="text-white text-opacity-75 text-sm mt-2">Memproses pembaruan...</p>
            </div>

            <!-- Contact Info -->
            <div class="space-y-4">
                <p class="text-white text-opacity-80">
                    Butuh bantuan? Hubungi kami:
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <div class="flex items-center gap-2 text-white text-opacity-90">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                        <span>m.fadlikurniawan1009@gmail.com</span>
                    </div>

                    <div class="flex items-center gap-2 text-white text-opacity-90">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z">
                            </path>
                        </svg>
                        <span>(62) 812-8710-9853</span>
                    </div>
                </div>
            </div>

            <!-- Estimated Time -->
            <div class="mt-8 pt-6 border-t border-white border-opacity-20">
                <p class="text-white text-opacity-60 text-xs mt-1">
                    Terakhir diperbarui: <span id="currentTime"></span>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center">
            <p class="text-white text-opacity-60 text-sm">
                © {{ date('Y') }} Muhammad Fadli Kurniawan.
            </p>
        </div>
    </div>

    <script>
        // Update current time
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleString('id-ID', {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
            document.getElementById('currentTime').textContent = timeString;
        }

        updateTime();
        setInterval(updateTime, 60000); // Update every minute

        // Auto refresh page every 5 minutes
        setTimeout(function() {
            location.reload();
        }, 300000);
    </script>
</body>

</html>
