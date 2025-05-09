@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="w-full relative" aria-labelledby="welcome-heading">
        <div class="w-full h-[500px] md:h-[700px] lg:h-[900px] relative overflow-hidden">
            <img src="{{ asset('images/fotohmif.jpg') }}" alt="HMIF Background"
                class="w-full h-full object-cover object-center">
        </div>
        <div class="absolute inset-0 flex items-center">
            <div class="max-w-7xl mx-auto px-4 md:px-8 lg:px-16 w-full">
                <div class="flex flex-col gap-6 md:gap-8 items-start justify-center w-full md:w-[60%] lg:w-[560px]">
                    <div class="flex flex-col gap-4 md:gap-6 items-start justify-start w-full">
                        <h1 id="welcome-heading"
                            class="text-white text-4xl md:text-5xl lg:text-[56px] leading-[120%] tracking-[-0.01em] font-normal">
                            Welcome to HMIF
                        </h1>
                        <p class="text-white text-base md:text-lg leading-[150%] font-normal">
                            Himpunan Mahasiswa Informatika (HMIF) is a student organization that brings together students
                            from the Informatics study program. We organize various activities to enhance knowledge, skills,
                            and networking opportunities.
                        </p>
                    </div>
                    <div class="flex flex-row gap-4 items-start">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal"
                            class="flex flex-row gap-2 items-center justify-center px-4 md:px-6 py-2 md:py-2.5 rounded-full border-solid border-[1.5px] border-[#2a2d47] bg-[#f4efeb] text-[#2a2d47] text-sm md:text-base font-medium hover:bg-[#136ca9] focus:bg-[#136ca9] transition-colors duration-200 shadow-md">
                            Join Us
                        </a>
                        <a href="#about"
                            class="flex flex-row gap-2 items-center justify-center px-4 md:px-6 py-2 md:py-2.5 rounded-full border-solid border-[1.5px] border-[#2a2d47] bg-[#2a2d47] text-white text-sm md:text-base font-medium hover:bg-[#136ca9] focus:bg-[#136ca9] transition-colors duration-200 shadow-md">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="about" class="w-full bg-[#2a2d47]" aria-labelledby="about-heading">
        <div class="max-w-7xl mx-auto px-4 md:px-8 lg:px-16 py-16 md:py-20 lg:py-28">
            <div class="flex flex-col lg:flex-row gap-12 md:gap-16 lg:gap-20 items-center">
                <div class="flex flex-col gap-4 md:gap-6 items-start justify-start w-full lg:w-1/2">
                    <h2 id="about-heading"
                        class="text-white text-3xl md:text-4xl lg:text-[40px] leading-[120%] tracking-[-0.01em] font-normal">
                        About HMIF
                    </h2>
                    <p class="text-white text-base md:text-lg leading-[150%] font-normal">
                        HMIF is dedicated to fostering a vibrant community of informatics students. We organize workshops,
                        seminars, and networking events to help members develop their skills and connect with industry
                        professionals.
                    </p>
                </div>
                <img src="{{ asset('images/temptest.jpeg') }}" alt="About HMIF"
                    class="rounded-2xl w-full lg:w-1/2 h-auto md:h-[400px] lg:h-[640px] object-cover">
            </div>
        </div>
    </div>

    <div class="w-full bg-[#136ca9]" aria-labelledby="recent-events-heading">
        <div class="max-w-7xl mx-auto px-4 md:px-8 lg:px-16 py-16 md:py-20 lg:py-28">
            <div class="flex flex-col gap-4 items-start justify-start w-full md:w-[768px] mb-12 md:mb-20">
                <span class="text-[#f4efeb] text-base leading-[150%] font-semibold">Recent Events</span>
                <h2 id="recent-events-heading"
                    class="text-white text-3xl md:text-4xl lg:text-[48px] leading-[120%] tracking-[-0.01em] font-normal">
                    Latest Activities
                </h2>
            </div>
            <div class="w-full">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    <div class="rounded-2xl flex flex-col gap-0 items-start justify-start bg-[#2a2d47] overflow-hidden">
                        <img src="{{ asset('images/temptest.jpeg') }}" alt="Web Development Workshop"
                            class="w-full h-[200px] md:h-[300px] object-cover">
                        <div class="flex flex-col gap-6 items-start justify-start w-full p-4 md:p-6">
                            <div class="flex flex-col gap-2 items-start justify-start w-full">
                                <div class="border border-transparent rounded-full bg-[#f4efeb] px-2 py-1">
                                    <span class="text-[#2a2d47] text-sm leading-[150%] font-semibold">Workshop</span>
                                </div>
                                <h3 class="text-white text-xl md:text-2xl leading-[140%] tracking-[-0.01em] font-normal">
                                    Web Development Workshop
                                </h3>
                                <p class="text-white text-base leading-[150%] font-normal">
                                    Learn the fundamentals of web development with hands-on experience.
                                </p>
                            </div>
                            <div class="flex flex-row gap-4 items-center justify-start w-full">
                                <img src="{{ asset('images/avatar.png') }}" alt="Speaker John Doe"
                                    class="w-10 h-10 md:w-12 md:h-12 object-cover rounded-full">
                                <div class="flex flex-col">
                                    <span class="text-white text-sm leading-[150%] font-semibold">John Doe</span>
                                    <div class="flex flex-row gap-2 items-center">
                                        <span class="text-white text-xs md:text-sm leading-[150%] font-normal">Jan 11,
                                            2024</span>
                                        <span class="text-white text-xs md:text-sm leading-[150%] font-normal">•</span>
                                        <span class="text-white text-xs md:text-sm leading-[150%] font-normal">5 min
                                            read</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-2xl flex flex-col gap-0 items-start justify-start bg-[#2a2d47] overflow-hidden">
                        <img src="{{ asset('images/temptest.jpeg') }}" alt="Data Science Seminar"
                            class="w-full h-[200px] md:h-[300px] object-cover">
                        <div class="flex flex-col gap-6 items-start justify-start w-full p-4 md:p-6">
                            <div class="flex flex-col gap-2 items-start justify-start w-full">
                                <div class="border border-transparent rounded-full bg-[#f4efeb] px-2 py-1">
                                    <span class="text-[#2a2d47] text-sm leading-[150%] font-semibold">Seminar</span>
                                </div>
                                <h3 class="text-white text-xl md:text-2xl leading-[140%] tracking-[-0.01em] font-normal">
                                    Data Science Seminar
                                </h3>
                                <p class="text-white text-base leading-[150%] font-normal">
                                    Explore the latest trends in data science with industry experts.
                                </p>
                            </div>
                            <div class="flex flex-row gap-4 items-center justify-start w-full">
                                <img src="{{ asset('images/avatar.png') }}" alt="Speaker Jane Smith"
                                    class="w-10 h-10 md:w-12 md:h-12 object-cover rounded-full">
                                <div class="flex flex-col">
                                    <span class="text-white text-sm leading-[150%] font-semibold">Jane Smith</span>
                                    <div class="flex flex-row gap-2 items-center">
                                        <span class="text-white text-xs md:text-sm leading-[150%] font-normal">Jan 20,
                                            2024</span>
                                        <span class="text-white text-xs md:text-sm leading-[150%] font-normal">•</span>
                                        <span class="text-white text-xs md:text-sm leading-[150%] font-normal">7 min
                                            read</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-2xl flex flex-col gap-0 items-start justify-start bg-[#2a2d47] overflow-hidden">
                        <img src="{{ asset('images/temptest.jpeg') }}" alt="Hackathon 2024"
                            class="w-full h-[200px] md:h-[300px] object-cover">
                        <div class="flex flex-col gap-6 items-start justify-start w-full p-4 md:p-6">
                            <div class="flex flex-col gap-2 items-start justify-start w-full">
                                <div class="border border-transparent rounded-full bg-[#f4efeb] px-2 py-1">
                                    <span class="text-[#2a2d47] text-sm leading-[150%] font-semibold">Hackathon</span>
                                </div>
                                <h3 class="text-white text-xl md:text-2xl leading-[140%] tracking-[-0.01em] font-normal">
                                    Hackathon 2024
                                </h3>
                                <p class="text-white text-base leading-[150%] font-normal">
                                    Collaborate and innovate in our annual coding competition.
                                </p>
                            </div>
                            <div class="flex flex-row gap-4 items-center justify-start w-full">
                                <img src="{{ asset('images/avatar.png') }}" alt="Speaker Alex Brown"
                                    class="w-10 h-10 md:w-12 md:h-12 object-cover rounded-full">
                                <div class="flex flex-col">
                                    <span class="text-white text-sm leading-[150%] font-semibold">Alex Brown</span>
                                    <div class="flex flex-row gap-2 items-center">
                                        <span class="text-white text-xs md:text-sm leading-[150%] font-normal">Feb 1,
                                            2024</span>
                                        <span class="text-white text-xs md:text-sm leading-[150%] font-normal">•</span>
                                        <span class="text-white text-xs md:text-sm leading-[150%] font-normal">10 min
                                            read</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full bg-[#2a2d47]" aria-labelledby="upcoming-events-heading">
        <div class="max-w-7xl mx-auto px-4 md:px-8 lg:px-16 py-16 md:py-20 lg:py-28">
            <div class="flex flex-col gap-4 items-center justify-start w-full md:w-[768px] mx-auto mb-12 md:mb-20">
                <span class="text-[#f4efeb] text-center text-base leading-[150%] font-semibold">Upcoming Events</span>
                <h2 id="upcoming-events-heading"
                    class="text-white text-center text-3xl md:text-4xl lg:text-[48px] leading-[120%] tracking-[-0.01em] font-normal">
                    Events
                </h2>
                <p class="text-white text-center text-base md:text-lg leading-[150%] font-normal">
                    Join our upcoming events and expand your knowledge
                </p>
            </div>
            <div class="flex flex-col gap-8 md:gap-12 items-center justify-center w-full md:w-[90%] lg:w-[768px] mx-auto">
                <div class="overflow-x-auto w-full">
                    <div class="flex flex-row gap-2 md:gap-4 items-center min-w-max">
                        <button
                            class="flex flex-row gap-2 items-center justify-center px-3 md:px-4 py-2 md:py-2.5 rounded-full bg-[#f4efeb] text-[#2a2d47] text-sm md:text-base font-medium hover:bg-[#136ca9] hover:text-white focus:bg-[#136ca9] focus:text-white transition-colors duration-200">
                            View All
                        </button>
                        <button
                            class="flex flex-row gap-2 items-center justify-center px-3 md:px-4 py-2 md:py-2.5 rounded-full text-white text-sm md:text-base font-normal hover:bg-[#136ca9] focus:bg-[#136ca9] transition-colors duration-200">
                            Workshops
                        </button>
                        <button
                            class="flex flex-row gap-2 items-center justify-center px-3 md:px-4 py-2 md:py-2.5 rounded-full text-white text-sm md:text-base font-normal hover:bg-[#136ca9] focus:bg-[#136ca9] transition-colors duration-200">
                            Seminars
                        </button>
                        <button
                            class="flex flex-row gap-2 items-center justify-center px-3 md:px-4 py-2 md:py-2.5 rounded-full text-white text-sm md:text-base font-normal hover:bg-[#136ca9] focus:bg-[#136ca9] transition-colors duration-200">
                            Hackathons
                        </button>
                        <button
                            class="flex flex-row gap-2 items-center justify-center px-3 md:px-4 py-2 md:py-2.5 rounded-full text-white text-sm md:text-base font-normal hover:bg-[#136ca9] focus:bg-[#136ca9] transition-colors duration-200">
                            Networking
                        </button>
                    </div>
                </div>
                <div class="border-b border-[#f4efeb] w-full">
                    <div
                        class="flex flex-col md:flex-row gap-6 md:gap-8 items-start md:items-center py-6 md:py-8 border-t border-[#f4efeb]">
                        <img src="{{ asset('images/temptest.jpeg') }}" alt="Untirta IO Workshop"
                            class="rounded-2xl w-full md:w-36 h-auto md:h-36 object-cover">
                        <div class="flex flex-col gap-3 md:gap-4">
                            <div class="flex flex-col md:flex-row gap-2 md:gap-6 items-start md:items-center">
                                <h4 class="text-white text-xl md:text-2xl leading-[140%] tracking-[-0.01em] font-normal">
                                    Untirta IO
                                </h4>
                                <div class="bg-[#f4efeb] px-2 md:px-2.5 py-1 rounded-full">
                                    <span
                                        class="text-[#2a2d47] text-xs md:text-sm leading-[150%] font-semibold">Workshop</span>
                                </div>
                            </div>
                            <div class="flex flex-col md:flex-row gap-2 md:gap-4">
                                <span class="text-white text-xs md:text-sm leading-[150%] font-normal">Feb 15, 2024</span>
                                <span class="text-white text-xs md:text-sm leading-[150%] font-normal">1:00 PM - 4:00
                                    PM</span>
                            </div>
                            <p class="text-white text-sm md:text-base leading-[150%] font-normal">
                                Learn the principles of UI/UX design and create user-friendly interfaces.
                            </p>
                        </div>
                    </div>
                    <div
                        class="flex flex-col md:flex-row gap-6 md:gap-8 items-start md:items-center py-6 md:py-8 border-t border-[#f4efeb]">
                        <img src="{{ asset('images/temptest.jpeg') }}" alt="UI/UX Design Workshop"
                            class="rounded-2xl w-full md:w-36 h-auto md:h-36 object-cover">
                        <div class="flex flex-col gap-3 md:gap-4">
                            <div class="flex flex-col md:flex-row gap-2 md:gap-6 items-start md:items-center">
                                <h4 class="text-white text-xl md:text-2xl leading-[140%] tracking-[-0.01em] font-normal">
                                    UI/UX Design Workshop
                                </h4>
                                <div class="bg-[#f4efeb] px-2 md:px-2.5 py-1 rounded-full">
                                    <span
                                        class="text-[#2a2d47] text-xs md:text-sm leading-[150%] font-semibold">Workshop</span>
                                </div>
                            </div>
                            <div class="flex flex-col md:flex-row gap-2 md:gap-4">
                                <span class="text-white text-xs md:text-sm leading-[150%] font-normal">Feb 15, 2024</span>
                                <span class="text-white text-xs md:text-sm leading-[150%] font-normal">1:00 PM - 4:00
                                    PM</span>
                            </div>
                            <p class="text-white text-sm md:text-base leading-[150%] font-normal">
                                Learn the principles of UI/UX design and create user-friendly interfaces.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full bg-[#136ca9]" aria-labelledby="testimonial-heading">
        <div class="max-w-7xl mx-auto px-4 md:px-8 lg:px-16 py-16 md:py-20 lg:py-28">
            <div class="flex flex-col gap-6 md:gap-8 items-center justify-start w-full md:w-[90%] lg:w-[768px] mx-auto">
                <img src="{{ asset('images/LOGO_HMIF.png') }}" alt="HMIF Logo"
                    class="w-[160px] md:w-[200px] lg:w-[240px] h-auto object-contain">
                <blockquote id="testimonial-heading"
                    class="text-white text-center text-xl md:text-2xl leading-[140%] tracking-[-0.01em] font-normal">
                    "HMIF has been instrumental in my growth as a developer. The workshops and networking events have opened
                    many doors for me."
                </blockquote>
                <div class="flex flex-col gap-3 md:gap-4 items-center justify-start w-full md:w-[300px]">
                    <img src="{{ asset('images/avatar.png') }}" alt="Testimonial by Jane Smith"
                        class="w-12 h-12 md:w-16 md:h-16 object-cover rounded-full">
                    <div class="text-center">
                        <p class="text-white text-base leading-[150%] font-semibold">Jane Smith</p>
                        <p class="text-[#f4efeb] text-sm md:text-base leading-[150%] font-normal">Software Engineer at Tech
                            Corp</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full bg-[#2a2d47]" aria-labelledby="why-join-heading">
        <div class="max-w-7xl mx-auto px-4 md:px-8 lg:px-16 py-16 md:py-20 lg:py-28">
            <h2 id="why-join-heading"
                class="text-white text-center text-3xl md:text-4xl lg:text-[40px] leading-[120%] tracking-[-0.01em] font-normal w-full mx-auto mb-12 md:mb-20">
                Why Join HMIF?
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">
                <div class="flex flex-col gap-6 md:gap-8 items-center justify-start">
                    <svg class="w-10 h-10 md:w-12 md:h-12 text-[#f4efeb]" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z" />
                    </svg>
                    <div class="flex flex-col gap-4 md:gap-6 items-center text-center">
                        <h3 class="text-white text-xl md:text-2xl leading-[140%] tracking-[-0.01em] font-normal">
                            Networking Opportunities
                        </h3>
                        <p class="text-white text-sm md:text-base leading-[150%] font-normal">
                            Connect with industry professionals and fellow students
                        </p>
                    </div>
                    <a href="#"
                        class="flex flex-row gap-2 items-center text-[#f4efeb] hover:text-white focus:text-white transition-colors duration-200 underline">
                        Learn More
                        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
                <div class="flex flex-col gap-6 md:gap-8 items-center justify-start">
                    <svg class="w-10 h-10 md:w-12 md:h-12 text-[#f4efeb]" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z" />
                    </svg>
                    <div class="flex flex-col gap-4 md:gap-6 items-center text-center">
                        <h3 class="text-white text-xl md:text-2xl leading-[140%] tracking-[-0.01em] font-normal">
                            Educational Programs
                        </h3>
                        <p class="text-white text-sm md:text-base leading-[150%] font-normal">
                            Access workshops, seminars, and resources to enhance your skills
                        </p>
                    </div>
                    <a href="#"
                        class="flex flex-row gap-2 items-center text-[#f4efeb] hover:text-white focus:text-white transition-colors duration-200 underline">
                        Learn More
                        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
                <div class="flex flex-col gap-6 md:gap-8 items-center justify-start">
                    <svg class="w-10 h-10 md:w-12 md:h-12 text-[#f4efeb]" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
                    </svg>
                    <div class="flex flex-col gap-4 md:gap-6 items-center text-center">
                        <h3 class="text-white text-xl md:text-2xl leading-[140%] tracking-[-0.01em] font-normal">
                            Community
                        </h3>
                        <p class="text-white text-sm md:text-base leading-[150%] font-normal">
                            Be part of a supportive community of like-minded students
                        </p>
                    </div>
                    <a href="#"
                        class="flex flex-row gap-2 items-center text-[#f4efeb] hover:text-white focus:text-white transition-colors duration-200 underline">
                        Learn More
                        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full bg-[#136ca9]" aria-labelledby="join-heading">
        <div class="max-w-7xl mx-auto px-4 md:px-8 lg:px-16 py-16 md:py-20 lg:py-28">
            <div class="flex flex-col lg:flex-row gap-12 md:gap-16 lg:gap-20 items-center">
                <div class="flex flex-col gap-6 md:gap-8 items-start justify-start w-full lg:w-1/2">
                    <h2 id="join-heading"
                        class="text-white text-3xl md:text-4xl lg:text-[40px] leading-[120%] tracking-[-0.01em] font-normal">
                        Ready to Join?
                    </h2>
                    <p class="text-white text-base md:text-lg leading-[150%] font-normal">
                        Become a part of our community and start your journey with HMIF today.
                    </p>
                    <a href=""
                        class="flex flex-row gap-2 items-center text-[#f4efeb] hover:text-white focus:text-white transition-colors duration-200 underline">
                        Join Now
                        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
                <div class="w-full lg:w-1/2">
                    <img src="{{ asset('images/temptest.jpeg') }}" alt="Join HMIF"
                        class="rounded-2xl w-full h-[250px] md:h-[300px] lg:h-[400px] object-cover">
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md mx-4 overflow-hidden transform transition-all">
            <!-- Close button -->
            <div class="absolute top-4 right-4">
                <button id="closeLoginModal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Modal content -->
            <div class="px-8 pt-8 pb-10">
                <!-- Logo centered -->
                <div class="flex justify-center mb-8">
                    <img class="w-24 h-auto object-contain" src="{{ asset('images/LOGO_HMIF.png') }}" alt="HMIF Logo">
                </div>

                <!-- Modal title -->
                <h2 class="text-2xl font-bold text-center text-[#2a2d47] mb-6">Sign In to HMIF</h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Show error message if exists -->
                    @if ($errors->has('login_error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <span>{{ $errors->first('login_error') }}</span>
                        </div>
                    @endif
                    <!-- Email input -->
                    <div class="mb-5">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" id="email" name="email"
                                class="pl-10 block w-full rounded-lg border @error('email') border-red-500 @else border-gray-300 @enderror py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#136ca9] focus:border-transparent transition duration-150"
                                placeholder="your@email.com" value="{{ old('email') }}" required>
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-1">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>

                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" id="password" name="password"
                                class="pl-10 block w-full rounded-lg border border-gray-300 py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#136ca9] focus:border-transparent transition duration-150"
                                placeholder="••••••••" required>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <button type="button" id="togglePassword"
                                    class="text-gray-400 hover:text-gray-600 focus:outline-none">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Remember me checkbox -->
                    <div class="flex items-center mb-6">
                        <input type="checkbox" id="remember" name="remember"
                            class="h-4 w-4 text-[#136ca9] focus:ring-[#136ca9] border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit"
                        class="w-full bg-[#2a2d47] text-white py-3 px-4 rounded-lg font-medium hover:bg-[#136ca9] focus:outline-none focus:ring-2 focus:ring-[#136ca9] focus:ring-opacity-50 transition duration-150 shadow-md flex items-center justify-center">
                        <span>Sign In</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </form>

            </div>
        </div>
    </div>
@endsection
