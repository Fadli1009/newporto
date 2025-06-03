@extends('base')
@section('title', 'Portofolio Muhammad Fadli Kurniawan')
@section('content')
    <style>
        .modal-overlay {
            backdrop-filter: blur(4px);
        }

        .modal-enter {
            animation: modalEnter 0.3s ease-out;
        }

        @keyframes modalEnter {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(-20px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
    <div id="home" class="section">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <div class="h-1.5 w-1.5 rounded-full bg-gray-500 me-2"></div>
                <span class="text-gray-400 font-bold text-sm md:text-xl">Full Stack Web Developer</span>
            </div>
            <div class="flex items-center bg-green-500/40 px-2 py-2 rounded">
                <div class="h-1.5 w-1.5 rounded-full bg-green-500 me-2"></div>
                <span class="text-green-300 text-sm">Ready To Work</span>
            </div>
        </div>
        <div class="mt-7 lg:mt-15 lg:px-5">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="block order-2 lg:order-1">
                    <h1 class="text-2xl text-white font-bold">Saya {{ $profile->name }}</h1>
                    <p class="text-gray-300 font-bold mt-3">{!! nl2br(e($slug->slug_home)) !!}</p>
                    <div class="flex mt-5 space-x-2">
                        <button type="button" id="hireButton"
                            class="flex text-white items-center bg-[#454b55] px-2 py-1 rounded space-x-1 hover:bg-[#555c68] transition-all cursor-pointer">
                            <i class="ri-add-line text-xs"></i>
                            <h1 class="text-sm">Hire Me</h1>
                        </button>

                        <a href="storage/{{ $profile->cv }}" target="_blank"
                            class="flex text-white items-center border-2 border-gray-600 px-2 py-1 rounded space-x-1 hover:bg-[#555c68] transition-all cursor-pointer">
                            <i class="ri-download-2-line text-xs"></i>
                            <h1 class="text-sm">Download CV</h1>
                        </a>
                    </div>
                </div>
                <div class="flex justify-center order-1 lg:order-2 lg:justify-end mb-5 lg:mb-0">
                    <img src="{{ asset('storage/' . $profile->photo_home) }}"
                        class='text-right w-56 h-56 rounded-full border-2 border-gray-400 p-4' alt="">
                </div>
            </div>
        </div>
        <div class="mt-20 bg-[#424750] py-4 px-6 rounded-xl group">
            <div class="flex justify-between">
                <div class="flex items-center">
                    <div class="h-1.5 w-1.5 rounded-full bg-gray-500 me-2 group-hover:bg-lime-500"></div>
                    <span class="text-gray-300 font-bold text-xl">Projects</span>
                </div>
                <a href="/project"
                    class="flex text-white items-center bg-[#454b55] px-2 py-1 rounded space-x-1 hover:bg-[#555c68] transition-all cursor-pointer">View
                    All <i class="ri-arrow-right-line"></i></a>
            </div>
            <div class="mt-6">
                <div class="flex flex-col space-y-2">
                    @foreach ($project as $item)
                        <a href="{{ route('show.project', $item->slug_project) }}"
                            class="bg-[#515761] p-3 rounded-xl block border-2 border-transparent hover:border-gray-500 shadow-xl ">
                            <div class="flex justify-between items-center transition-all ">
                                <div class="flex items-center space-x-3">
                                    <img src="{{ asset('storage/' . $item->img) }}"
                                        class="rounded h-15 w-15 lg:w-20 lg:h-20" alt="">
                                    <div>
                                        <h3 class="font-bold text-white lg:text-xl">{{ $item->judul }}</h3>
                                        <p class="text-gray-300">{{ $item->judul }}</p>
                                    </div>
                                </div>
                                <i class="ri-arrow-right-wide-line text-sm lg:text-2xl text-gray-700"></i>
                            </div>
                        </a>
                    @endforeach
                </div>

            </div>
        </div>

    </div>
    <div id="modalOverlay"
        class="fixed inset-0 bg-black bg-opacity-50 modal-overlay hidden z-50 flex items-center justify-center p-4">
        <!-- Modal Content -->
        <div id="modalContent" class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                        <i class="ri-mail-line text-white text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Get In Touch</h3>
                        <p class="text-sm text-gray-500">Kirim email untuk mengundang saya </p>
                    </div>
                </div>
                <button id="closeModal"
                    class="text-gray-400 hover:text-gray-600 transition-colors p-2 hover:bg-gray-100 rounded-full">
                    <i class="ri-close-line text-xl"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
                <form id="hireForm" class="space-y-6">
                    @csrf

                    <!-- Subject Field -->
                    <div class="space-y-2">
                        <label for="subject" class="block text-sm font-medium text-gray-700">
                            Subject <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" id="subject" name="subject" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 pl-11"
                                placeholder="e.g., Mengundang Interview">
                            <i
                                class="ri-bookmark-line text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
                        </div>
                        <div class="text-xs text-red-500 hidden" id="subjectError">Subject is required</div>
                    </div>

                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email Anda <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 pl-11"
                                placeholder="email@gmail.com">
                            <i class="ri-mail-line text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
                        </div>
                        <div class="text-xs text-red-500 hidden" id="emailError">Please enter a valid email address</div>
                    </div>

                    <!-- Message Body Field -->
                    <div class="space-y-2">
                        <label for="body" class="block text-sm font-medium text-gray-700">
                            Pesan <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <textarea id="body" name="pesan" required rows="6"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none"
                                placeholder="Bisakah Anda menghadiri undangan interview dari perusahaan ..."></textarea>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="text-xs text-red-500 hidden" id="bodyError">Message is required</div>
                            <div class="text-xs text-gray-400">
                                <span id="charCount">0</span>/500 characters
                            </div>
                        </div>
                    </div>

                    <!-- Additional Info -->
                    {{-- <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <div class="flex items-start space-x-3">
                            <i class="ri-information-line text-blue-500 text-lg mt-0.5"></i>
                            <div>
                                <h4 class="text-sm font-medium text-blue-800">Quick Response Guarantee</h4>
                                <p class="text-xs text-blue-600 mt-1">I typically respond to all inquiries within 24 hours.
                                    Please include as much detail as possible to help me provide you with an accurate quote.
                                </p>
                            </div>
                        </div>
                    </div> --}}
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-4 bg-gray-50 rounded-b-2xl flex justify-end space-x-3">
                <button type="button" id="cancelButton"
                    class="px-6 py-2.5 text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200 font-medium">
                    Batal
                </button>
                <button type="submit" form="hireForm" id="submitButton"
                    class="px-6 py-2.5 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-200 font-medium flex items-center space-x-2">
                    <span>Kirim Pesan</span>
                    <i class="ri-send-plane-line text-sm"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Success Toast -->
    <div id="successToast"
        class="fixed top-4 right-0 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 z-50">
        <div class="flex items-center space-x-2">
            <i class="ri-check-line"></i>
            <span>Pesan Berhasil dikirim!</span>
        </div>
    </div>

    <!-- Error Toast -->
    <div id="errorToast"
        class="fixed top-4 right-0 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 z-50">
        <div class="flex items-center space-x-2">
            <i class="ri-error-warning-line"></i>
            <span>Mohon isi form dengan benar!</span>
        </div>
    </div>
    <script>
        // DOM Elements
        const hireButton = document.getElementById('hireButton');
        const modalOverlay = document.getElementById('modalOverlay');
        const modalContent = document.getElementById('modalContent');
        const closeModal = document.getElementById('closeModal');
        const cancelButton = document.getElementById('cancelButton');
        const hireForm = document.getElementById('hireForm');
        const submitButton = document.getElementById('submitButton');
        const successToast = document.getElementById('successToast');
        const errorToast = document.getElementById('errorToast');
        const bodyTextarea = document.getElementById('body');
        const charCount = document.getElementById('charCount');

        // Character counter
        bodyTextarea.addEventListener('input', function() {
            const currentLength = this.value.length;
            charCount.textContent = currentLength;

            if (currentLength > 500) {
                charCount.parentElement.classList.add('text-red-500');
                charCount.parentElement.classList.remove('text-gray-400');
            } else {
                charCount.parentElement.classList.remove('text-red-500');
                charCount.parentElement.classList.add('text-gray-400');
            }
        });

        // Open modal
        hireButton.addEventListener('click', function() {
            modalOverlay.classList.remove('hidden');
            modalOverlay.classList.add('fade-in');
            modalContent.classList.add('modal-enter');
            document.body.style.overflow = 'hidden';
        });

        // Close modal functions
        function closeModalFunction() {
            modalOverlay.classList.add('hidden');
            modalOverlay.classList.remove('fade-in');
            modalContent.classList.remove('modal-enter');
            document.body.style.overflow = 'auto';

            // Reset form
            hireForm.reset();
            charCount.textContent = '0';
            clearErrors();
        }

        closeModal.addEventListener('click', closeModalFunction);
        cancelButton.addEventListener('click', closeModalFunction);

        // Close modal when clicking outside
        modalOverlay.addEventListener('click', function(e) {
            if (e.target === modalOverlay) {
                closeModalFunction();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modalOverlay.classList.contains('hidden')) {
                closeModalFunction();
            }
        });

        // Form validation
        function validateForm() {
            let isValid = true;
            clearErrors();

            const subject = document.getElementById('subject').value.trim();
            const email = document.getElementById('email').value.trim();
            const body = document.getElementById('body').value.trim();

            // Subject validation
            if (!subject) {
                showError('subjectError', 'Subject is required');
                isValid = false;
            }

            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email) {
                showError('emailError', 'Email harus diisi!');
                isValid = false;
            } else if (!emailRegex.test(email)) {
                showError('emailError', 'Masukan alamat email yang valid!');
                isValid = false;
            }

            // Body validation
            if (!body) {
                showError('bodyError', 'Pesan wajib diisi');
                isValid = false;
            } else if (body.length < 20) {
                showError('bodyError', 'Pesan harus diatas 20 karakter');
                isValid = false;
            } else if (body.length > 500) {
                showError('bodyError', 'Pesan harus dibawah 500 karakter');
                isValid = false;
            }

            return isValid;
        }

        function showError(elementId, message) {
            const errorElement = document.getElementById(elementId);
            errorElement.textContent = message;
            errorElement.classList.remove('hidden');
        }

        function clearErrors() {
            const errorElements = document.querySelectorAll('[id$="Error"]');
            errorElements.forEach(element => {
                element.classList.add('hidden');
            });
        }

        // Show toast
        function showToast(toastElement) {
            toastElement.classList.remove('translate-x-full');
            toastElement.classList.add('translate-x-0');

            setTimeout(() => {
                toastElement.classList.add('translate-x-full');
                toastElement.classList.remove('translate-x-0');
            }, 3000);
        }

        // Form submission
        hireForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            if (!validateForm()) {
                showToast(errorToast);
                return;
            }

            // Show loading state
            submitButton.disabled = true;
            submitButton.innerHTML = `
                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Mengirim...</span>
            `;

            try {
                // Simulate form submission (replace with actual Laravel route)
                const formData = new FormData(hireForm);

                // Uncomment and modify this for actual Laravel implementation:

                const response = await fetch('/hire-me', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    }
                });

                if (response.ok) {
                    showToast(successToast);
                    closeModalFunction();                    

                } else {
                    throw new Error('Failed to send message');
                }


                // Simulation delay
                await new Promise(resolve => setTimeout(resolve, 2000));

                showToast(successToast);
                closeModalFunction();

            } catch (error) {
                console.error('Error:', error);
                showToast(errorToast);
            } finally {
                // Reset button state
                submitButton.disabled = false;
                submitButton.innerHTML = `
                    <span>Kirim Pesan</span>
                    <i class="ri-send-plane-line text-sm"></i>
                `;
            }
        });

        // Auto-resize textarea
        bodyTextarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    </script>
@endsection
