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

        html,
        body {
            overflow-x: hidden;
            width: 100%;
            position: relative;
            box-sizing: border-box;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }
    </style>
</head>

<body class="min-h-screen w-full bg-gray-100">
    <nav class="w-full bg-[#3a6186] shadow-lg fixed top-0 left-0 z-50" aria-label="Main navigation">
        <div
            class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between px-4 md:px-8 lg:px-16 py-4 md:h-[72px]">
            <div class="flex items-center justify-between w-full md:w-auto">
                <div class="flex items-center gap-2 md:gap-6 lg:gap-10">
                    <a href="/" class="relative">
                        <img class="w-[62px] h-auto object-contain" src="{{ asset('images/LOGO_HMIF.png') }}"
                            alt="HMIF Logo">

                    </a>
                    <span class="ml-2 text-blue-400 font-bold text-4xl md:hidden">HMIF</span>
                    <div id="desktop-menu" class="hidden md:flex flex-row gap-6 lg:gap-8 items-center">
                        <!-- Home Link with Fancy Hover Effect -->
                        <a href="{{ route('home') }}"
                            class="nav-link text-white text-base leading-[150%] font-medium relative group px-2 py-1 overflow-hidden">
                            <span
                                class="relative z-10 transition-colors duration-300 group-hover:text-[#2a2d47]">Home</span>
                            <span
                                class="nav-highlight absolute bottom-0 left-0 w-full h-[2px] bg-[#f4efeb] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100"></span>
                            <span
                                class="absolute inset-0 bg-[#f4efeb] transform origin-top transition-transform duration-300 scale-y-0 group-hover:scale-y-100 -z-0"></span>
                        </a>

                        <!-- About Us Link with Fancy Hover Effect -->
                        <div class="relative inline-block text-left" id="about-dropdown">
                            <div>
                                <button type="button"
                                    class="nav-link text-white text-base leading-[150%] font-medium relative group px-2 py-1 overflow-hidden flex items-center gap-x-1"
                                    id="about-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span
                                        class="relative z-10 transition-colors duration-300 group-hover:text-[#2a2d47]">About</span>
                                    <svg class="w-4 h-4 text-white group-hover:text-[#2a2d47] transition-colors duration-300"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span
                                        class="nav-highlight absolute bottom-0 left-0 w-full h-[2px] bg-[#f4efeb] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100"></span>
                                    <span
                                        class="absolute inset-0 bg-[#f4efeb] transform origin-top transition-transform duration-300 scale-y-0 group-hover:scale-y-100 -z-0"></span>
                                </button>
                            </div>

                            <!-- Dropdown menu -->
                            <div class="hidden absolute z-10 mt-2 w-48 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="about-menu-button"
                                tabindex="-1" id="about-dropdown-menu">
                                <div class="py-1" role="none">

                                    <a href="{{ route('team') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                                        tabindex="-1">Our Team</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem" tabindex="-1">History</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem" tabindex="-1">Vision & Mission</a>
                                </div>
                            </div>
                        </div>

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
                <button id="mobile-menu-button"
                    class="md:hidden focus:outline-none group bg-[#2a4d69] p-2 rounded-md transition-all duration-300 hover:bg-[#203d54]"
                    aria-label="Toggle mobile menu" aria-expanded="false">
                    <div class="w-6 h-5 flex flex-col justify-between relative">
                        <span
                            class="w-6 h-0.5 bg-white rounded transform transition-transform duration-300 origin-right"
                            id="burger-top"></span>
                        <span class="w-6 h-0.5 bg-white rounded transition-opacity duration-300"
                            id="burger-middle"></span>
                        <span
                            class="w-6 h-0.5 bg-white rounded transform transition-transform duration-300 origin-right"
                            id="burger-bottom"></span>
                    </div>
                </button>
            </div>

            <!-- Mobile Menu - Enhanced with Hover Effects and Consistent Div Structure -->
            <div id="mobile-menu"
                class="hidden flex-col gap-4 items-center w-full mt-4 md:hidden transition-all duration-300 ease-in-out overflow-hidden shadow-lg rounded-xl border border-[#2a4d69]/20">
                <div class="w-full bg-gradient-to-b from-[#3a6186] to-[#2a4d69] backdrop-blur-md p-6 pt-4">
                    <!-- Home -->
                    <div class="w-full relative mt-2" id="mobile-home-dropdown">
                        <button
                            class="w-full text-left py-3 px-4 text-white text-base leading-[150%] font-normal relative overflow-hidden group flex items-center gap-2 rounded-lg border-solid border-[1.5px] border-transparent transition-all duration-300"
                            id="mobile-home-button">
                            <span class="relative z-10 group-hover:text-white">Home</span>
                            <span
                                class="absolute inset-0 bg-[#136ca9] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100 -z-0"></span>
                        </button>
                        <div class="hidden bg-[#1e3c55] w-full rounded-lg overflow-hidden shadow-inner mt-1"
                            id="mobile-home-dropdown-menu">
                            <!-- Kosong untuk saat ini, bisa ditambahkan sub-menu jika perlu -->
                        </div>
                    </div>

                    <!-- About Dropdown -->
                    <div class="w-full relative mt-2" id="mobile-about-dropdown">
                        <button
                            class="w-full py-3 px-4 text-white text-base leading-[150%] font-normal relative overflow-hidden group flex items-center gap-1 rounded-lg hover:bg-white/10 transition-all duration-300"
                            id="mobile-about-button">
                            <span class="relative z-10">About</span>
                            <svg class="w-4 h-4 text-white transition-transform duration-300" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true" id="about-dropdown-icon">
                                <path fill-rule="evenodd"
                                    d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span
                                class="absolute inset-0 bg-[#136ca9] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100 -z-0"></span>
                        </button>
                        <div class="hidden bg-[#1e3c55] w-full rounded-lg overflow-hidden shadow-inner mt-1"
                            id="mobile-about-dropdown-menu">
                            <a href="{{ route('team') }}"
                                class="w-full text- py-3 px-4 text-white text-sm leading-[150%] font-normal relative overflow-hidden group flex hover:bg-white/10 transition-colors duration-300">
                                <span class="relative z-10">Our Team</span>
                                <span
                                    class="absolute inset-0 bg-[#136ca9] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100 -z-0"></span>
                            </a>
                            <a href="#"
                                class="w-full text- py-3 px-4 text-white text-sm leading-[150%] font-normal relative overflow-hidden group flex hover:bg-white/10 transition-colors duration-300">
                                <span class="relative z-10">History</span>
                                <span
                                    class="absolute inset-0 bg-[#136ca9] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100 -z-0"></span>
                            </a>
                            <a href="#"
                                class="w-full text- py-3 px-4 text-white text-sm leading-[150%] font-normal relative overflow-hidden group flex hover:bg-white/10 transition-colors duration-300">
                                <span class="relative z-10">Vision & Mission</span>
                                <span
                                    class="absolute inset-0 bg-[#136ca9] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100 -z-0"></span>
                            </a>
                        </div>
                    </div>

                    <!-- Events -->
                    <div class="w-full relative mt-2" id="mobile-forum-dropdown">
                        <button
                            class="w-full text-left py-3 px-4 text-white text-base leading-[150%] font-normal relative overflow-hidden group flex items-center gap-2 rounded-lg border-solid border-[1.5px] border-transparent transition-all duration-300"
                            id="mobile-forum-button">
                            <span class="relative z-10 group-hover:text-white">Events</span>
                            <span
                                class="absolute inset-0 bg-[#136ca9] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100 -z-0"></span>
                        </button>
                        <div class="hidden bg-[#1e3c55] w-full rounded-lg overflow-hidden shadow-inner mt-1"
                            id="mobile-forum-dropdown-menu">
                            <!-- Kosong untuk saat ini, bisa ditambahkan sub-menu jika perlu -->
                        </div>
                    </div>

                    <!-- Forum -->
                    <div class="w-full relative mt-2" id="mobile-forum-dropdown">
                        <button
                            class="w-full text-left py-3 px-4 text-white text-base leading-[150%] font-normal relative overflow-hidden group flex items-center gap-2 rounded-lg border-solid border-[1.5px] border-transparent transition-all duration-300"
                            id="mobile-forum-button">
                            <span class="relative z-10 group-hover:text-white">Forum</span>
                            <span
                                class="absolute inset-0 bg-[#136ca9] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100 -z-0"></span>
                        </button>
                        <div class="hidden bg-[#1e3c55] w-full rounded-lg overflow-hidden shadow-inner mt-1"
                            id="mobile-forum-dropdown-menu">
                            <!-- Kosong untuk saat ini, bisa ditambahkan sub-menu jika perlu -->
                        </div>
                    </div>

                    <!-- Login Button -->
                    <div class="flex flex-row gap-4 items-center justify-center w-full mt-6 mb-2">
                        @auth
                            <a href="{{ auth()->user()->role == 'admin' ? route('admin.dashboard') : route('dashboard') }}"
                                class="relative overflow-hidden group border-[#2a2d47] flex flex-row gap-2 items-center justify-center px-5 py-2.5 rounded-full border-solid border-[1.5px] bg-[#f4efeb] text-[#2a2d47] text-base font-medium transition-colors duration-300 shadow-md w-full">
                                <span class="relative z-10 group-hover:text-white">Dashboard</span>
                                <span
                                    class="absolute inset-0 bg-[#136ca9] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100 -z-0"></span>
                            </a>
                        @else
                            <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal"
                                class="relative overflow-hidden group border-[#2a2d47] flex flex-row gap-2 items-center justify-center px-5 py-2.5 rounded-full border-solid border-[1.5px] bg-[#f4efeb] text-[#2a2d47] text-base font-medium transition-colors duration-300 shadow-md w-full">
                                <span class="relative z-10 group-hover:text-white">Login</span>
                                <span
                                    class="absolute inset-0 bg-[#136ca9] transform origin-left transition-transform duration-300 scale-x-0 group-hover:scale-x-100 -z-0"></span>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Login Button with Advanced Hover Effect (Desktop) -->
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
    </nav>

    <main class="w-full overflow-x-hidden pt-[60px] md:pt-[72px]">
        <div class="w-full max-w-full overflow-x-hidden">
            @yield('content')
        </div>
    </main>


    <footer class="w-full bg-[#2a2d47] text-white" aria-label="Footer">
        <!-- Box-border ensures padding is included in width calculation -->
        <div class="box-border max-w-full mx-auto px-4 md:px-8 lg:px-16 py-8 md:py-12 overflow-x-hidden">
            <div class="flex flex-col md:flex-row gap-8 md:gap-16 items-start justify-between mb-8 md:mb-12">
                <!-- HMIF Info Section - Reduced width on mobile -->
                <div class="flex flex-col gap-6 items-start w-full max-w-[95%] md:w-[35%]">
                    <div class="flex items-center gap-4">
                        <img class="w-14 md:w-16 h-auto object-contain" src="{{ asset('images/logo_HMIF.png') }}"
                            alt="HMIF Logo">
                        <div class="flex flex-col">
                            <span class="text-blue-400 text-2xl md:text-xl font-bold">HMIF</span>
                            <span class="text-white text-2xl md:text-sm font-bold uppercase">Untirta</span>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3 items-start">
                        <h3 class="text-[#f4efeb] text-xs md:text-sm font-semibold">ADDRESS</h3>
                        <p class="text-white text-xs md:text-sm leading-[150%] max-w-[95%]">
                            Jl. Jendral Soedirman KM. 3 Cilegon 42435 Provinsi Banten
                        </p>
                    </div>

                    <!-- Social Media with flex-wrap -->
                    <div class="flex flex-wrap gap-2">
                        <a href="#"
                            class="w-8 h-8 rounded-full bg-[#136ca9] flex items-center justify-center hover:bg-blue-600 transition"
                            aria-label="Facebook">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </a>
                        <a href="#"
                            class="w-8 h-8 rounded-full bg-[#136ca9] flex items-center justify-center hover:bg-blue-600 transition"
                            aria-label="Twitter">
                            <i class="fab fa-twitter text-sm"></i>
                        </a>
                        <a href="#"
                            class="w-8 h-8 rounded-full bg-[#136ca9] flex items-center justify-center hover:bg-blue-600 transition"
                            aria-label="Instagram">
                            <i class="fab fa-instagram text-sm"></i>
                        </a>
                        <a href="#"
                            class="w-8 h-8 rounded-full bg-[#136ca9] flex items-center justify-center hover:bg-blue-600 transition"
                            aria-label="Email">
                            <i class="fas fa-envelope text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Navigation & Connect - Reduced width on mobile, smaller gap -->
                <div class="grid grid-cols-2 md:grid-cols-3 gap-2 md:gap-6 w-[95%] md:w-[60%]">
                    <!-- Navigation Column -->
                    <div class="flex flex-col gap-2 md:gap-4 items-start justify-start overflow-hidden">
                        <h3 class="text-[#f4efeb] text-sm font-semibold">Navigation</h3>
                        <div class="flex flex-col space-y-2 w-full">
                            <a href=""
                                class="text-white text-xs md:text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200 truncate">Home</a>
                            <a href=""
                                class="text-white text-xs md:text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200 truncate">About
                                Us</a>
                            <a href="{{ route('team') }}"
                                class="text-white text-xs md:text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200 pl-2 truncate">Our
                                Team</a>
                            <a href="#"
                                class="text-white text-xs md:text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200 pl-2 truncate">History</a>
                            <a href="#"
                                class="text-white text-xs md:text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200 pl-2 truncate">Vision
                                & Mission</a>
                            <a href="#"
                                class="text-white text-xs md:text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200 truncate">Events</a>
                        </div>
                    </div>

                    <!-- Connect Column -->
                    <div class="flex flex-col gap-2 md:gap-4 items-start justify-start overflow-hidden">
                        <h3 class="text-[#f4efeb] text-sm font-semibold">Connect</h3>
                        <div class="flex flex-col space-y-2 w-full">
                            <a href="#"
                                class="text-white text-xs md:text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200 truncate">Contact
                                Us</a>
                            <a href="#"
                                class="text-white text-xs md:text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200 truncate">Join
                                Us</a>
                            <a href="#"
                                class="text-white text-xs md:text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200 truncate">Member
                                Login</a>
                        </div>
                    </div>

                    <!-- Support Column -->
                    <div class="flex flex-col gap-2 md:gap-4 items-start justify-start overflow-hidden">
                        <h3 class="text-[#f4efeb] text-sm font-semibold">Support</h3>
                        <div class="flex flex-col space-y-2 w-full">
                            <a href="#"
                                class="text-white text-xs md:text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200 truncate">FAQs</a>
                            <a href="#"
                                class="text-white text-xs md:text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200 truncate">Support</a>
                            <a href="#"
                                class="text-white text-xs md:text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200 truncate">Feedback</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Copyright section -->
            <div class="text-center text-white text-xs pt-4 border-t border-gray-700">
                <p>&copy; {{ date('Y') }} HMIF Untirta. All rights reserved.</p>
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

            // About dropdown functionality
            const aboutButton = document.getElementById('about-menu-button');
            const aboutDropdownMenu = document.getElementById('about-dropdown-menu');

            if (aboutButton && aboutDropdownMenu) {
                // Toggle dropdown when button is clicked
                aboutButton.addEventListener('click', function() {
                    const isExpanded = aboutDropdownMenu.classList.contains('hidden');

                    // Toggle the dropdown visibility
                    aboutDropdownMenu.classList.toggle('hidden', !isExpanded);

                    // Add animation classes
                    if (isExpanded) {
                        aboutDropdownMenu.classList.add('transition', 'ease-out', 'duration-100',
                            'transform', 'opacity-100', 'scale-100');
                        aboutDropdownMenu.classList.remove('opacity-0', 'scale-95');
                    } else {
                        aboutDropdownMenu.classList.add('transition', 'ease-in', 'duration-75', 'transform',
                            'opacity-0', 'scale-95');
                        aboutDropdownMenu.classList.remove('opacity-100', 'scale-100');
                    }

                    aboutButton.setAttribute('aria-expanded', isExpanded);
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(event) {
                    if (!aboutButton.contains(event.target) && !aboutDropdownMenu.contains(event.target)) {
                        aboutDropdownMenu.classList.add('hidden');
                        aboutButton.setAttribute('aria-expanded', 'false');
                    }
                });
            }

            // Mobile About dropdown functionality
            const mobileAboutButton = document.getElementById('mobile-about-button');
            const mobileAboutDropdownMenu = document.getElementById('mobile-about-dropdown-menu');

            if (mobileAboutButton && mobileAboutDropdownMenu) {
                mobileAboutButton.addEventListener('click', function() {
                    mobileAboutDropdownMenu.classList.toggle('hidden');
                });
            }

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
