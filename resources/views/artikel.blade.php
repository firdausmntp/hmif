@extends('layouts.app')
@section('title', 'Artikel')
@section('description', 'Informasi terbaru seputar kegiatan dan perkembangan di jurusan Informatika')
@section('style')
    <style>
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fade-in {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.6s ease-out forwards;
        }

        .animate-fade-in {
            animation: fade-in 0.8s ease-out forwards;
            animation-delay: 0.2s;
            opacity: 0;
        }

        /* Article card hover effects */
        .article-card {
            transition: all 0.3s ease;
        }

        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .article-card .article-image {
            transition: all 0.5s ease;
        }

        .article-card:hover .article-image {
            transform: scale(1.05);
        }
    </style>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Articles Header Section with Background -->
    <div class="w-full relative mb-8" aria-labelledby="articles-heading">
        <div class="w-full relative overflow-hidden h-[250px] md:h-[300px]">
            <div class="w-full h-full bg-gradient-to-r from-blue-600 to-blue-900"></div>
        </div>

        <!-- Overlay with content -->
        <div class="absolute inset-0 flex items-center bg-gradient-to-b from-black/60 to-black/60">
            <!-- Decorative frame corners -->
            <div class="absolute top-4 left-4 w-12 h-12 border-t-2 border-l-2 border-blue-300 opacity-80"></div>
            <div class="absolute top-4 right-4 w-12 h-12 border-t-2 border-r-2 border-blue-300 opacity-80"></div>
            <div class="absolute bottom-4 left-4 w-12 h-12 border-b-2 border-l-2 border-blue-300 opacity-80"></div>
            <div class="absolute bottom-4 right-4 w-12 h-12 border-b-2 border-r-2 border-blue-300 opacity-80"></div>

            <!-- Content container -->
            <div class="max-w-5xl mx-auto px-4 md:px-8 lg:px-16 w-full z-10">
                <div class="flex flex-col gap-4 items-center justify-center w-full text-center">
                    <!-- Articles Title -->
                    <div class="overflow-hidden">
                        <h1 id="articles-heading"
                            class="text-white text-3xl md:text-4xl lg:text-5xl font-bold animate-fade-in-up"
                            style="text-shadow: 0px 2px 4px rgba(0,0,0,0.5); letter-spacing: -0.01em;">
                            Artikel HMIF
                        </h1>
                    </div>

                    <!-- Subtitle -->
                    <p class="text-white/90 text-lg md:text-xl max-w-2xl mx-auto animate-fade-in">
                        Informasi terbaru seputar kegiatan dan perkembangan di jurusan Informatika
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Articles List Section -->
    <div class="w-full bg-gray-100 py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <!-- Search and Filter -->
            <div class="mb-10 flex flex-col md:flex-row justify-between items-center gap-4">
                <!-- Left side: Search -->
                <div class="w-full md:w-auto">
                    <form action="{{ route('articles.index') }}" method="GET" class="flex">
                        <div class="relative flex-grow">
                            <input type="text" name="search" placeholder="Cari artikel..."
                                value="{{ request('search') }}"
                                class="pl-10 pr-4 py-2 w-full md:w-80 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                        </div>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-r-lg transition duration-200">
                            Cari
                        </button>
                    </form>
                </div>

                <!-- Right side: Category Filters -->
                <div class="flex flex-wrap justify-center gap-2">
                    <a href="{{ route('articles.index') }}"
                        class="px-4 py-2 rounded-full text-sm font-medium {{ !request('category') ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} transition duration-200">
                        Semua
                    </a>
                    <a href="{{ route('articles.index', ['category' => 'berita']) }}"
                        class="px-4 py-2 rounded-full text-sm font-medium {{ request('category') == 'berita' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} transition duration-200">
                        Berita
                    </a>
                    <a href="{{ route('articles.index', ['category' => 'pengumuman']) }}"
                        class="px-4 py-2 rounded-full text-sm font-medium {{ request('category') == 'pengumuman' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} transition duration-200">
                        Pengumuman
                    </a>
                    <a href="{{ route('articles.index', ['category' => 'kegiatan']) }}"
                        class="px-4 py-2 rounded-full text-sm font-medium {{ request('category') == 'kegiatan' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} transition duration-200">
                        Kegiatan
                    </a>
                </div>
            </div>

            <!-- Articles Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @forelse ($articles as $article)
                    <a href="{{ route('articles.detail', $article->id) }}"
                        class="article-card bg-white rounded-xl shadow-md overflow-hidden flex flex-col h-full">
                        <!-- Article Image -->
                        <div class="overflow-hidden h-48">
                            @if ($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                                    class="article-image w-full h-full object-cover">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-r from-blue-600/80 to-blue-800/80 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-white/70" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Article Details -->
                        <div class="p-5 flex flex-col flex-grow">
                            <div class="flex flex-wrap items-center gap-2 mb-3">
                                <h3 class="text-xl font-semibold text-gray-800">{{ $article->title }}</h3>
                                <span
                                    class="text-xs font-semibold text-blue-600 bg-blue-100 px-2 py-1 rounded-full">Artikel</span>
                            </div>

                            <div class="flex flex-wrap gap-3 text-sm text-gray-500 mb-4">
                                <span>{{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}</span>
                                <span>•</span>
                                <span>{{ \Carbon\Carbon::parse($article->created_at)->format('H:i') }}</span>
                            </div>

                            <p class="text-gray-600 text-sm flex-grow mb-4">
                                {{ Str::limit($article->content, 150) }}
                            </p>

                            <div class="flex justify-end mt-auto">
                                <span
                                    class="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    Baca selengkapnya
                                    <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-1 md:col-span-3 py-16 text-center">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        <h3 class="text-xl font-medium text-gray-700 mb-1">Tidak ada artikel</h3>
                        <p class="text-gray-500">Belum ada artikel yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection
