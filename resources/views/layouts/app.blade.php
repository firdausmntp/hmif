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
    <nav class="w-full bg-[#3a6186] shadow-lg" aria-label="Main navigation">
        <div
            class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between px-4 md:px-8 lg:px-16 py-4 md:h-[72px]">
            <div class="flex items-center justify-between w-full md:w-auto">
                <div class="flex items-center gap-2 md:gap-6 lg:gap-10">
                    <a href="/" class="relative">
                        <img class="w-[62px] h-auto object-contain" src="{{ asset('images/LOGO_HMIF.png') }}"
                            alt="HMIF Logo">

                    </a>
                    <span class="ml-2 text-white font-bold text-xxl md:hidden">HMIF</span>
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
                        <a href="{{ route('about') }}"
                            class="text-white text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200">About
                            Us</a>
                        <a href="#"
                            class="text-white text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200 ml-4">Our
                            Team</a>
                        <a href="#"
                            class="text-white text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200 ml-4">History</a>
                        <a href="#"
                            class="text-white text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200 ml-4">Vision
                            & Mission</a>
                        <a href="#"
                            class="text-white text-sm leading-[150%] font-normal hover:text-[#f4efeb] transition-colors duration-200">Events</a>
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
