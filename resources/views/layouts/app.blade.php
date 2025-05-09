<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMIF - Himpunan Mahasiswa Informatika</title>
    <link rel="icon" href="{{ asset('images/LOGO_HMIF.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Advanced hover animations for navigation links */
        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background-color: #f4efeb;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link.active::before,
        .nav-link:hover::before {
            width: 100%;
        }

        /* Add subtle hover lift effect */
        .nav-link:hover {
            transform: translateY(-2px);
            transition: transform 0.3s ease;
        }

        /* Glowing effect for buttons */
        a.group:hover::after {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #136ca9, #2a2d47);
            border-radius: 50px;
            z-index: -2;
            filter: blur(8px);
            opacity: 0.4;
            transition: opacity 0.3s ease;
        }

        /* Active page indicator */
        .nav-link.active {
            font-weight: 600;
            position: relative;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #f4efeb;
        }
    </style>
</head>

<body class="min-h-screen w-full bg-gray-100">
    <nav class="w-full bg-[#2a2d47] shadow-lg" aria-label="Main navigation">
        <div
            class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between px-4 md:px-8 lg:px-16 py-4 md:h-[72px]">
            <div class="flex items-center justify-between w-full md:w-auto">
                <div class="flex items-center gap-2 md:gap-6 lg:gap-10">
                    <a href="/" class="relative">
                        <img class="w-[62px] h-auto object-contain" src="{{ asset('images/LOGO_HMIF.png') }}"
                            alt="HMIF Logo">
                    </a>
                    <div id="desktop-menu" class="hidden md:flex flex-row gap-6 lg:gap-8 items-center">
                        <!-- Home Link with Fancy Hover Effect -->
                        <a href=""
                            class="nav-link text-white text-base leading-[150%] font-medium relative group px-2 py-1 overflow-hidden">
                            <span
                                class="relative z-10 transition-colors duration-300 group-hover:text-[#2a2d47]">Home</span>
                            <span
                                class="nav-highlight absolute bottom-0 left-0 w-full h-[2px] bg-[#f4efeb] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100"></span>
                            <span
                                class="absolute inset-0 bg-[#f4efeb] transform origin-top transition-transform duration-300 scale-y-0 group-hover:scale-y-100 -z-0"></span>
                        </a>

                        <!-- About Us Link with Fancy Hover Effect -->
                        <a href="#about"
                            class="nav-link text-white text-base leading-[150%] font-medium relative group px-2 py-1 overflow-hidden">
                            <span class="relative z-10 transition-colors duration-300 group-hover:text-[#2a2d47]">About
                                Us</span>
                            <span
                                class="nav-highlight absolute bottom-0 left-0 w-full h-[2px] bg-[#f4efeb] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100"></span>
                            <span
                                class="absolute inset-0 bg-[#f4efeb] transform origin-top transition-transform duration-300 scale-y-0 group-hover:scale-y-100 -z-0"></span>
                        </a>

                        <!-- Events Link with Fancy Hover Effect -->
                        <a href="#"
                            class="nav-link text-white text-base leading-[150%] font-medium relative group px-2 py-1 overflow-hidden">
                            <span
                                class="relative z-10 transition-colors duration-300 group-hover:text-[#2a2d47]">Events</span>
                            <span
                                class="nav-highlight absolute bottom-0 left-0 w-full h-[2px] bg-[#f4efeb] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100"></span>
                            <span
                                class="absolute inset-0 bg-[#f4efeb] transform origin-top transition-transform duration-300 scale-y-0 group-hover:scale-y-100 -z-0"></span>
                        </a>

                        <!-- Forum Link with Fancy Hover Effect -->
                        <a href="#"
                            class="nav-link text-white text-base leading-[150%] font-medium relative group px-2 py-1 overflow-hidden">
                            <span
                                class="relative z-10 transition-colors duration-300 group-hover:text-[#2a2d47]">Forum</span>
                            <span
                                class="nav-highlight absolute bottom-0 left-0 w-full h-[2px] bg-[#f4efeb] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100"></span>
                            <span
                                class="absolute inset-0 bg-[#f4efeb] transform origin-top transition-transform duration-300 scale-y-0 group-hover:scale-y-100 -z-0"></span>
                        </a>
                    </div>
                </div>
                <button id="mobile-menu-button" class="md:hidden focus:outline-none" aria-label="Toggle mobile menu"
                    aria-expanded="false">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu - Also Enhanced -->
            <div id="mobile-menu"
                class="hidden flex-col gap-4 items-center w-full mt-4 md:hidden transition-all duration-300 ease-in-out bg-[#136ca9] rounded-lg p-4">
                <a href=""
                    class="w-full text-center py-2 text-white text-base leading-[150%] font-normal relative overflow-hidden group">
                    <span class="relative z-10">Home</span>
                    <span
                        class="absolute inset-0 bg-[#2a2d47] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100 -z-0"></span>
                </a>
                <a href="#about"
                    class="w-full text-center py-2 text-white text-base leading-[150%] font-normal relative overflow-hidden group">
                    <span class="relative z-10">About Us</span>
                    <span
                        class="absolute inset-0 bg-[#2a2d47] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100 -z-0"></span>
                </a>
                <a href="#"
                    class="w-full text-center py-2 text-white text-base leading-[150%] font-normal relative overflow-hidden group">
                    <span class="relative z-10">Events</span>
                    <span
                        class="absolute inset-0 bg-[#2a2d47] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100 -z-0"></span>
                </a>
                <a href="#"
                    class="w-full text-center py-2 text-white text-base leading-[150%] font-normal relative overflow-hidden group">
                    <span class="relative z-10">Forum</span>
                    <span
                        class="absolute inset-0 bg-[#2a2d47] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100 -z-0"></span>
                </a>
                <div class="flex flex-row gap-4 items-center justify-center w-full mt-2">
                    @auth
                        <a href="{{ auth()->user()->role == 'admin' ? route('admin.dashboard') : route('dashboard') }}"
                            class="relative overflow-hidden group border-[#2a2d47] flex flex-row gap-2 items-center justify-center px-5 py-2 rounded-full border-solid border-[1.5px] bg-[#f4efeb] text-[#2a2d47] text-base font-medium transition-colors duration-300 shadow-md">
                            <span class="relative z-10">Dashboard</span>
                            <span
                                class="absolute inset-0 bg-[#136ca9] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100 -z-0"></span>
                            <span
                                class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gradient-to-r from-transparent via-white to-transparent blur-sm"></span>
                        </a>
                    @else
                        <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal"
                            class="relative overflow-hidden group border-[#2a2d47] flex flex-row gap-2 items-center justify-center px-5 py-2 rounded-full border-solid border-[1.5px] bg-[#f4efeb] text-[#2a2d47] text-base font-medium transition-colors duration-300 shadow-md">
                            <span class="relative z-10 group-hover:text-white">Login</span>
                            <span
                                class="absolute inset-0 bg-[#136ca9] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100 -z-0"></span>
                            <span
                                class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gradient-to-r from-transparent via-white to-transparent blur-sm"></span>
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Login Button with Advanced Hover Effect -->
            <div class="hidden md:flex flex-row gap-4 items-center">
                @auth
                    <a href="{{ auth()->user()->role == 'admin' ? route('admin.dashboard') : route('dashboard') }}"
                        class="relative overflow-hidden group flex items-center justify-center px-5 py-2 rounded-full border-solid border-[1.5px] border-[#2a2d47] bg-[#f4efeb] text-[#2a2d47] text-base font-medium transition-all duration-300 shadow-md">
                        <span class="relative z-10 group-hover:text-white transition-colors duration-300">Dashboard</span>
                        <span
                            class="absolute inset-0 bg-[#136ca9] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100"></span>
                        <span
                            class="absolute inset-0 opacity-0 group-hover:opacity-20 transition-opacity duration-300 bg-gradient-to-r from-transparent via-white to-transparent blur-sm"></span>
                    </a>
                @else
                    <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal"
                        class="relative overflow-hidden group flex items-center justify-center px-5 py-2 rounded-full border-solid border-[1.5px] border-[#2a2d47] bg-[#f4efeb] text-[#2a2d47] text-base font-medium transition-all duration-300 shadow-md hover:border-[#136ca9]">
                        <span class="relative z-10 group-hover:text-white transition-colors duration-300">Login</span>
                        <span
                            class="absolute inset-0 bg-[#136ca9] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100"></span>
                        <span
                            class="absolute -inset-x-2 -inset-y-2 opacity-0 group-hover:opacity-20 transition-opacity duration-300 bg-gradient-to-r from-transparent via-white to-transparent blur-sm"></span>
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="w-full">
        @yield('content')
    </main>


    <footer class="w-full bg-[#2a2d47] text-white" aria-label="Footer">
        <div class="max-w-7xl mx-auto px-4 md:px-8 lg:px-16 py-12 md:py-20">
            <div class="flex flex-col md:flex-row gap-12 md:gap-16 items-start justify-between mb-16 md:mb-20">
                <div class="flex flex-col gap-8 items-start justify-start w-full md:w-[40%]">
                    <a href="/" class="w-[120px] md:w-[150px] lg:w-[170px] relative">
                        <img class="w-full h-auto object-contain" src="{{ asset('images/logo_HMIF.png') }}"
                            alt="HMIF Logo">
                    </a>
                    <div class="flex flex-col gap-4 items-start justify-start w-full">
                        <h3 class="text-[#f4efeb] text-sm font-semibold">Address</h3>
                        <p class="text-white text-sm leading-[150%] font-normal">Jl. Jendral Soedirman KM. 3 Cilegon
                            42435 Provinsi Banten
                        </p>
                    </div>
                    <div class="flex flex-col gap-4 items-start justify-start w-full">
                        <h3 class="text-[#f4efeb] text-sm font-semibold">Contact</h3>
                        <div class="flex flex-col gap-2">
                            <a href="mailto:info@hmif.com"
                                class="text-white text-sm leading-[150%] font-normal hover:text-[#f4efeb] underline">info@hmif.com</a>
                        </div>
                    </div>
                    <div class="flex flex-row gap-4 items-start">
                        <a href="#" class="w-6 h-6 hover:text-[#f4efeb] transition-colors duration-200"
                            aria-label="Facebook">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="w-6 h-6 hover:text-[#f4efeb] transition-colors duration-200"
                            aria-label="Twitter">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="w-6 h-6 hover:text-[#f4efeb] transition-colors duration-200"
                            aria-label="Instagram">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                    </div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-6 w-full md:w-[60%]">
                    <div class="flex flex-col gap-4 items-start justify-start">
                        <h3 class="text-[#f4efeb] text-sm font-semibold">Navigation</h3>
                        <a href=""
                            class="text-white text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200">Home</a>
                        <a href="#"
                            class="text-white text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200">About
                            Us</a>
                        <a href="#"
                            class="text-white text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200">Events</a>
                        <a href="#"
                            class="text-white text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200">Forum</a>
                    </div>
                    <div class="flex flex-col gap-4 items-start justify-start">
                        <h3 class="text-[#f4efeb] text-sm font-semibold">Connect</h3>
                        <a href="#"
                            class="text-white text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200">Contact
                            Us</a>
                        <a href="#"
                            class="text-white text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200">Join
                            Us</a>
                        <a href="#"
                            class="text-white text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200">Member
                            Login</a>
                    </div>
                    <div class="flex flex-col gap-4 items-start justify-start">
                        <h3 class="text-[#f4efeb] text-sm font-semibold">Support</h3>
                        <a href="#"
                            class="text-white text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200">FAQs</a>
                        <a href="#"
                            class="text-white text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200">Support</a>
                        <a href="#"
                            class="text-white text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200">Feedback</a>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="border-t border-[#136ca9] -mt-px mb-8"></div>
                <div class="flex flex-col md:flex-row items-center md:items-start md:justify-between gap-4 md:gap-0">
                    <p class="text-white text-sm leading-[150%] font-normal text-center md:text-left">
                        &copy;{{ date('Y') }} HMIF.
                        All rights reserved.</p>
                    <div
                        class="flex flex-col md:flex-row gap-4 md:gap-6 items-center md:items-start text-center md:text-left">
                        <a href="#"
                            class="text-white text-sm leading-[150%] font-normal hover:text-[#f4efeb] underline transition-colors duration-200">Privacy
                            Policy</a>
                        <a href="#"
                            class="text-white text-sm leading-[150%] font-normal hover:text-[#f4efeb] underline transition-colors duration-200">Terms
                            of Service</a>
                        <a href="#"
                            class="text-white text-sm leading-[150%] font-normal hover:text-[#f4efeb] underline transition-colors duration-200">Cookies
                            Settings</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fungsi untuk menangani mobile menu
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuButton.addEventListener('click', function() {
                const isExpanded = mobileMenu.classList.toggle('hidden');
                mobileMenu.classList.toggle('flex', !isExpanded);
                mobileMenuButton.setAttribute('aria-expanded', !isExpanded);
            });

            // Tambahkan kode untuk menangani modal login
            const loginModal = document.getElementById('loginModal');
            const loginButtons = document.querySelectorAll('[data-bs-target="#loginModal"]');
            const closeLoginModal = document.getElementById('closeLoginModal');
            const togglePasswordButton = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');

            // Buka modal ketika tombol login diklik
            loginButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    loginModal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden'; // Mencegah scrolling
                });
            });

            // Tutup modal ketika tombol close diklik
            if (closeLoginModal) {
                closeLoginModal.addEventListener('click', function() {
                    loginModal.classList.add('hidden');
                    document.body.style.overflow = ''; // Aktifkan scrolling kembali
                });
            }

            // Tutup modal ketika klik di luar konten modal
            window.addEventListener('click', function(e) {
                if (e.target === loginModal) {
                    loginModal.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            });

            // Toggle password visibility
            if (togglePasswordButton && passwordInput) {
                togglePasswordButton.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    // Ubah ikon mata
                    const icon = togglePasswordButton.querySelector('i');
                    if (type === 'password') {
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    } else {
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    }
                });
            }

            @if (Session::has('show_login_modal') || $errors->has('login_error') || $errors->has('email'))
                document.getElementById('loginModal').classList.remove('hidden');
            @endif

            // Setup close button functionality
            document.getElementById('closeLoginModal').addEventListener('click', function() {
                document.getElementById('loginModal').classList.add('hidden');
            });

            // Setup toggle password visibility
            document.getElementById('togglePassword').addEventListener('click', function() {
                const passwordInput = document.getElementById('password');
                const icon = this.querySelector('i');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });
    </script>
</body>

</html>
