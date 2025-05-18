@extends('layouts.app')

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
    </style>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Article Header Section with Background -->
    <div class="w-full relative mb-8" aria-labelledby="article-title">
        <div class="w-full relative overflow-hidden h-[300px] md:h-[400px]">
            @if ($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" class="w-full h-full object-cover filter brightness-75"
                    alt="{{ $article->title }}">
            @else
                <div class="w-full h-full bg-gradient-to-r from-blue-600 to-blue-900"></div>
            @endif
        </div>

        <!-- Overlay with content -->
        <div class="absolute inset-0 flex items-center bg-gradient-to-b from-black/70 to-black/70">
            <!-- Decorative frame corners -->
            <div class="absolute top-4 left-4 w-12 h-12 border-t-2 border-l-2 border-blue-300 opacity-80"></div>
            <div class="absolute top-4 right-4 w-12 h-12 border-t-2 border-r-2 border-blue-300 opacity-80"></div>
            <div class="absolute bottom-4 left-4 w-12 h-12 border-b-2 border-l-2 border-blue-300 opacity-80"></div>
            <div class="absolute bottom-4 right-4 w-12 h-12 border-b-2 border-r-2 border-blue-300 opacity-80"></div>

            <!-- Content container -->
            <div class="max-w-5xl mx-auto px-4 md:px-8 lg:px-16 w-full z-10">
                <div class="flex flex-col gap-4 items-center justify-center w-full text-center">
                    <!-- Article Title -->
                    <div class="overflow-hidden">
                        <h1 id="article-title"
                            class="text-white text-3xl md:text-4xl lg:text-5xl font-bold animate-fade-in-up"
                            style="text-shadow: 0px 2px 4px rgba(0,0,0,0.5); letter-spacing: -0.01em;">
                            {{ $article->title }}
                        </h1>
                    </div>

                    <!-- Metadata -->
                    <div class="flex items-center gap-3 text-white/80 animate-fade-in">
                        <span>{{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}</span>
                        <span>•</span>
                        <span>{{ \Carbon\Carbon::parse($article->created_at)->format('H:i') }}</span>
                    </div>

                    <!-- Category Tag -->
                    <span
                        class="inline-block bg-blue-500 text-white text-sm font-medium px-3 py-1 rounded-full animate-fade-in">
                        Artikel
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Article Content Section -->
    <div class="w-full bg-gray-100 py-12 md:py-16">
        <div class="max-w-4xl mx-auto px-4 md:px-8">
            <!-- Article Content Card -->
            <div class="bg-white rounded-xl shadow-md p-6 md:p-10 mb-10">
                <!-- Article Content -->
                <div class="prose prose-lg max-w-none">
                    {!! nl2br(e($article->content)) !!}
                </div>
            </div>

            <!-- Navigation and Share Section -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-12">
                <!-- Back Button -->
                <a href="{{ route('home') }}"
                    class="inline-flex items-center text-gray-700 hover:text-blue-600 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Beranda
                </a>

                <!-- Share Buttons -->
                <div class="flex items-center gap-3">
                    <span class="text-gray-700">Bagikan:</span>
                    <a href="#" class="text-blue-600 hover:text-blue-800" aria-label="Share to Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-blue-400 hover:text-blue-600" aria-label="Share to Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-green-600 hover:text-green-700" aria-label="Share to WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <!-- Related Articles Section -->
            <div class="mt-12">
                <h2 class="text-gray-800 text-2xl font-semibold mb-6">Artikel Terkait</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($relatedArticles ?? [] as $relatedArticle)
                        <a href="{{ route('articles.detail', $relatedArticle->id) }}"
                            class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col transform transition-all duration-300 hover:scale-[1.02] hover:shadow-lg">
                            <!-- Article Image -->
                            @if ($relatedArticle->image)
                                <img src="{{ asset('storage/' . $relatedArticle->image) }}"
                                    alt="{{ $relatedArticle->title }}" class="w-full h-40 object-cover">
                            @else
                                <div class="w-full h-40 bg-gray-200 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif

                            <!-- Article Details -->
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $relatedArticle->title }}</h3>
                                <div class="flex text-xs text-gray-500 mb-2">
                                    <span>{{ \Carbon\Carbon::parse($relatedArticle->created_at)->format('d M Y') }}</span>
                                </div>
                                <p class="text-gray-600 text-sm">{{ Str::limit($relatedArticle->content, 80) }}</p>
                            </div>
                        </a>
                    @endforeach

                    <!-- If no related articles are available -->
                    @if (!isset($relatedArticles) || count($relatedArticles) === 0)
                        <div class="col-span-1 md:col-span-2 text-center py-8">
                            <p class="text-gray-500">Belum ada artikel terkait.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- HMIF Call to Action Section -->
@endsection
