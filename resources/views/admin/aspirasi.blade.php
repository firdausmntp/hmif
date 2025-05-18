@extends('layouts.admin')
@section('title', 'Aspirasi Management')

@section('styles')
    <style>
        @media (max-width: 768px) {
            .overflow-x-auto {
                -webkit-overflow-scrolling: touch;
                scrollbar-width: thin;
                cursor: grab;
            }

            .overflow-x-auto:active {
                cursor: grabbing;
            }

            /* Optional: Make the indicator pulse slightly to draw attention */
            @keyframes pulse {

                0%,
                100% {
                    opacity: 0.7;
                }

                50% {
                    opacity: 1;
                }
            }

            .swipe-indicator {
                animation: pulse 2s infinite;
            }
        }
    </style>

@endsection

@section('content')
    <div class="content-wrapper overflow-x-auto" id="aspirasi-management-container">
        <div class="flex flex-wrap justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Aspirasi Management</h1>
        </div>

        <div class="bg-white rounded-lg shadow-lg mb-6">
            <div class="p-5 border-b border-gray-200">
                <form action="{{ route('admin.aspirasi') }}" method="GET">
                    <div class="flex">
                        <input type="text" name="search"
                            class="w-full px-4 py-3 border-2 border-[#2a2d47] rounded-l-md focus:outline-none focus:ring-1 focus:ring-[#2a2d47] text-gray-700 bg-gray-50"
                            placeholder="Cari aspirasi..." value="{{ request('search') }}">
                        <button type="submit"
                            class="px-4 py-3 bg-[#2a2d47] border-2 border-[#2a2d47] border-l-0 rounded-r-md hover:bg-[#3a3d57]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex mt-3 space-x-4">
                        <a href="{{ route('admin.aspirasi', ['status' => 'all']) }}"
                            class="text-sm {{ request('status') == 'all' || !request('status') ? 'text-blue-600 font-medium' : 'text-gray-600' }} hover:text-blue-600 transition-colors">
                            Semua
                        </a>
                        <a href="{{ route('admin.aspirasi', ['status' => 'pending']) }}"
                            class="text-sm {{ request('status') == 'pending' ? 'text-blue-600 font-medium' : 'text-gray-600' }} hover:text-blue-600 transition-colors">
                            Menunggu Respon
                        </a>
                        <a href="{{ route('admin.aspirasi', ['status' => 'resolved']) }}"
                            class="text-sm {{ request('status') == 'resolved' ? 'text-blue-600 font-medium' : 'text-gray-600' }} hover:text-blue-600 transition-colors">
                            Sudah Direspon
                        </a>
                    </div>
                    @if (request('search'))
                        <div class="mt-3">
                            <a href="{{ route('admin.aspirasi') }}"
                                class="text-sm text-[#2a2d47] font-medium hover:underline">
                                Clear search
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>

        @if (session('success'))
            <div id="alert-success"
                class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm" role="alert">
                <div class="flex">
                    <div class="py-1">
                        <svg class="h-6 w-6 text-green-500 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div>
                        <p>{{ session('success') }}</p>
                    </div>
                    <button type="button" class="ml-auto text-green-700"
                        onclick="document.getElementById('alert-success').remove()">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div id="alert-error" class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm"
                role="alert">
                <div class="flex">
                    <div class="py-1">
                        <svg class="h-6 w-6 text-red-500 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div>
                        <p>{{ session('error') }}</p>
                    </div>
                    <button type="button" class="ml-auto text-red-700"
                        onclick="document.getElementById('alert-error').remove()">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto overflow-y-auto">
                <table class="min-w-[1000px] divide-y divide-gray-200">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aspirasi</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($aspirasi as $asp)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $asp->id }}</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">
                                    {{ $asp->is_anonymous ? 'Anonim' : $asp->name }}</td>
                                <td class="px-4 py-3 text-sm text-gray-700">
                                    {{ Str::limit($asp->aspirasi, 50) }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">
                                    @if ($asp->status == 'pending')
                                        <span
                                            class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Menunggu
                                        </span>
                                    @else
                                        <span
                                            class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Direspon
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">
                                    {{ $asp->created_at->format('d M Y, H:i') }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-center">
                                    <div class="flex justify-center space-x-3">
                                        <button type="button" data-aspirasi-id="{{ $asp->id }}"
                                            data-aspirasi-name="{{ $asp->is_anonymous ? 'Anonim' : $asp->name }}"
                                            data-aspirasi-content="{{ $asp->aspirasi }}"
                                            data-aspirasi-status="{{ $asp->status }}"
                                            data-aspirasi-anonymous="{{ $asp->is_anonymous }}"
                                            data-aspirasi-response="{{ $asp->response }}"
                                            data-aspirasi-created="{{ $asp->created_at->format('d M Y, H:i') }}"
                                            data-aspirasi-admin="{{ $asp->admin ? $asp->admin->name : '' }}"
                                            data-aspirasi-updated="{{ $asp->updated_at->format('d M Y, H:i') }}"
                                            class="text-indigo-600 hover:text-indigo-900 transition-colors show-aspirasi-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                        <button type="button" data-aspirasi-id="{{ $asp->id }}"
                                            data-aspirasi-name="{{ $asp->is_anonymous ? 'Anonim' : $asp->name }}"
                                            data-aspirasi-content="{{ $asp->aspirasi }}"
                                            data-aspirasi-status="{{ $asp->status }}"
                                            data-aspirasi-response="{{ $asp->response }}"
                                            class="text-yellow-600 hover:text-yellow-900 transition-colors respond-aspirasi-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                            </svg>
                                        </button>
                                        <button type="button" data-aspirasi-id="{{ $asp->id }}"
                                            data-aspirasi-name="{{ $asp->is_anonymous ? 'Anonim' : $asp->name }}"
                                            class="text-red-600 hover:text-red-900 transition-colors delete-aspirasi-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-8 text-center text-sm font-medium text-gray-500">Tidak
                                    ada aspirasi ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-between">
                <div class="text-sm text-gray-700">
                    Showing <span class="font-medium">{{ $aspirasi->firstItem() ?? 0 }}</span> to <span
                        class="font-medium">{{ $aspirasi->lastItem() ?? 0 }}</span> of <span
                        class="font-medium">{{ $aspirasi->total() }}</span> aspirasi
                </div>
                <div>
                    {{ $aspirasi->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Show Aspirasi Modal -->
    <div id="aspirasiShowModal"
        class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/60 backdrop-blur-md transition-opacity duration-300"
        role="dialog">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0 animate-modal-in">
            <!-- Modal Panel -->
            <div
                class="bg-white/95 dark:bg-gray-800/95 rounded-3xl shadow-2xl border border-gray-100 dark:border-gray-700 sm:my-8 sm:max-w-lg sm:w-full transform transition-all duration-300 backdrop-blur-sm">
                <div class="px-8 pt-8 pb-6">
                    <div class="absolute top-6 right-6">
                        <button type="button"
                            onclick="document.getElementById('aspirasiShowModal').classList.add('hidden')"
                            class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">Detail Aspirasi</h3>
                    <p class="text-gray-500 dark:text-gray-400 mb-8" id="show-aspirasi-subtitle">Informasi lengkap
                        aspirasi</p>

                    <div
                        class="bg-gray-50 text-left dark:bg-gray-700/50 rounded-2xl p-6 border border-gray-100 dark:border-gray-600">
                        <div class="flex flex-col space-y-5">
                            <div class="flex items-start">
                                <div
                                    class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900/50 flex items-center justify-center text-blue-600 dark:text-blue-300 flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Pengirim</div>
                                    <div class="font-medium text-gray-900 dark:text-white" id="show-aspirasi-name">Anonim
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div
                                    class="w-10 h-10 rounded-full bg-emerald-100 dark:bg-emerald-900/50 flex items-center justify-center text-emerald-600 dark:text-emerald-300 flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Status</div>
                                    <div class="font-medium" id="show-aspirasi-status">
                                        <span
                                            class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Menunggu
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div
                                    class="w-10 h-10 rounded-full bg-purple-100 dark:bg-purple-900/50 flex items-center justify-center text-purple-600 dark:text-purple-300 flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Tanggal Dibuat</div>
                                    <div class="font-medium text-gray-900 dark:text-white" id="show-aspirasi-created">06
                                        Mei 2023, 10:30</div>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 dark:border-gray-600 pt-5">
                                <div class="text-xs text-gray-500 dark:text-gray-400 mb-2">Aspirasi</div>
                                <div
                                    class="bg-white dark:bg-gray-600 p-4 rounded-xl border border-gray-200 dark:border-gray-500">
                                    <p class="text-gray-800 dark:text-gray-200" id="show-aspirasi-content">
                                        Isi aspirasi akan ditampilkan di sini.
                                    </p>
                                </div>
                            </div>

                            <div id="show-response-section" class="border-t border-gray-200 dark:border-gray-600 pt-5">
                                <div class="text-xs text-gray-500 dark:text-gray-400 mb-2">Respon</div>
                                <div
                                    class="bg-white dark:bg-gray-600 p-4 rounded-xl border border-gray-200 dark:border-gray-500">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-xs text-blue-600 dark:text-blue-400"
                                            id="show-aspirasi-admin">Admin</span>
                                        <span class="text-xs text-gray-500 dark:text-gray-400"
                                            id="show-aspirasi-updated">07 Mei 2023, 11:45</span>
                                    </div>
                                    <p class="text-gray-800 dark:text-gray-200" id="show-aspirasi-response">
                                        Respon akan ditampilkan di sini.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end">
                        <button type="button"
                            onclick="document.getElementById('aspirasiShowModal').classList.add('hidden')"
                            class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500 transition-colors duration-200">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Respond Aspirasi Modal -->
    <div id="aspirasiRespondModal"
        class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/60 backdrop-blur-md transition-opacity duration-300"
        role="dialog">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0 animate-modal-in">
            <!-- Modal Panel -->
            <div
                class="bg-white/95 dark:bg-gray-800/95 rounded-3xl shadow-2xl border border-gray-100 dark:border-gray-700 sm:my-8 sm:max-w-lg sm:w-full transform transition-all duration-300 backdrop-blur-sm">
                <div class="px-8 pt-8 pb-6">
                    <div class="absolute top-6 right-6">
                        <button type="button"
                            onclick="document.getElementById('aspirasiRespondModal').classList.add('hidden')"
                            class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">Respon Aspirasi</h3>
                    <p class="text-gray-500 dark:text-gray-400 mb-8">Berikan tanggapan untuk aspirasi yang masuk</p>

                    <div
                        class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4 mb-6 border border-gray-200 dark:border-gray-600">
                        <div class="flex justify-between items-center mb-2">
                            <div class="font-medium text-gray-900 dark:text-white" id="respond-aspirasi-name">Nama
                                Pengirim</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400" id="respond-aspirasi-created">06 Mei
                                2023</div>
                        </div>
                        <div class="text-gray-700 dark:text-gray-300 text-sm" id="respond-aspirasi-content">
                            Isi aspirasi akan ditampilkan di sini.
                        </div>
                    </div>

                    <form id="respondAspirasiForm" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" id="respond_aspirasi_id" name="id">

                        <div class="space-y-6 text-left">
                            <div>
                                <label for="respond_response"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Respon
                                </label>
                                <textarea name="response" id="respond_response" rows="5" required
                                    class="block w-full border border-gray-200 dark:border-gray-600 rounded-xl py-3 px-4 bg-white/50 dark:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:placeholder-gray-400 sm:text-sm transition-all duration-200"
                                    placeholder="Tuliskan respon aspirasi..."></textarea>
                            </div>

                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status</label>
                                <div class="flex space-x-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="status" value="pending"
                                            class="form-radio text-blue-600">
                                        <span class="ml-2 text-gray-700 dark:text-gray-300">Tetap Menunggu</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="status" value="resolved"
                                            class="form-radio text-green-600" checked>
                                        <span class="ml-2 text-gray-700 dark:text-gray-300">Selesai Direspon</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end space-x-4">
                            <button type="button"
                                onclick="document.getElementById('aspirasiRespondModal').classList.add('hidden')"
                                class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500 transition-colors duration-200">
                                Batal
                            </button>
                            <button type="submit"
                                class="px-6 py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700 shadow-lg hover:shadow-blue-500/40 transition-all duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                                Kirim Respon
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Aspirasi Modal -->
    <div id="aspirasiDeleteModal"
        class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/60 backdrop-blur-md transition-opacity duration-300"
        role="dialog">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0 animate-modal-in">
            <!-- Modal Panel -->
            <div
                class="bg-white/95 dark:bg-gray-800/95 rounded-3xl shadow-2xl border border-gray-100 dark:border-gray-700 sm:my-8 sm:max-w-lg sm:w-full transform transition-all duration-300 backdrop-blur-sm">
                <div class="px-8 pt-8 pb-6">
                    <div class="absolute top-6 right-6">
                        <button type="button"
                            onclick="document.getElementById('aspirasiDeleteModal').classList.add('hidden')"
                            class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex items-center justify-center mb-6">
                        <div
                            class="w-16 h-16 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center text-red-500 dark:text-red-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2 text-center">Hapus Aspirasi</h3>
                    <p class="text-gray-500 dark:text-gray-400 mb-6 text-center">Apakah Anda yakin ingin menghapus aspirasi
                        ini? Tindakan ini tidak dapat dibatalkan.</p>

                    <div
                        class="bg-red-50 dark:bg-red-900/20 rounded-2xl p-4 border border-red-100 dark:border-red-800/30 mb-6">
                        <div class="flex items-center">
                            <div class="mr-3 text-red-500 dark:text-red-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <p class="text-sm text-red-600 dark:text-red-300">
                                Anda akan menghapus aspirasi dari <strong id="delete_aspirasi_name"
                                    class="font-semibold"></strong>
                            </p>
                        </div>
                    </div>

                    <form id="deleteAspirasiForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="delete_aspirasi_id" name="id">
                        <div class="flex justify-center space-x-4">
                            <button type="button"
                                onclick="document.getElementById('aspirasiDeleteModal').classList.add('hidden')"
                                class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500 transition-colors duration-200">
                                Batal
                            </button>
                            <button type="submit"
                                class="px-6 py-3 bg-red-600 text-white font-medium rounded-xl hover:bg-red-700 shadow-lg hover:shadow-red-500/40 transition-all duration-200">
                                Hapus Aspirasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
