@extends('layouts.admin')
@section('title', 'Events Management')
@section('content')
    <div class="content-wrapper" id="events-management-container">
        <div class="flex flex-wrap justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Events Management</h1>
            <button type="button"
                class="add-event-btn px-4 py-2 bg-[#2a2d47] text-white rounded-md flex items-center hover:bg-blue-500 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Add New Event
            </button>
        </div>

        <div class="bg-white rounded-lg shadow-lg mb-6">
            <div class="p-5 border-b border-gray-200">
                <form action="{{ route('admin.events.index') }}" method="GET">
                    <div class="flex">
                        <input type="text" name="search"
                            class="w-full px-4 py-3 border-2 border-[#2a2d47] rounded-l-md focus:outline-none focus:ring-1 focus:ring-[#2a2d47] text-gray-700 bg-gray-50"
                            placeholder="Search by title or detail..." value="{{ request('search') }}">
                        <button type="submit"
                            class="px-4 py-3 bg-[#2a2d47] border-2 border-[#2a2d47] border-l-0 rounded-r-md hover:bg-[#3a3d57]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                    @if (request('search'))
                        <div class="mt-3">
                            <a href="{{ route('admin.events.index') }}"
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
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Detail
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Category
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Event Date
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Location
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image
                            </th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($events as $event)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $event->id }}</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">{{ $event->title }}</td>
                                <td class="px-4 py-3 text-sm text-gray-700">
                                    {{ \Illuminate\Support\Str::limit($event->detail, 100) }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">{{ $event->category }}</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">
                                    @if ($event->event_date)
                                        @if (is_string($event->event_date))
                                            {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}
                                        @else
                                            {{ $event->event_date->format('d M Y') }}
                                        @endif
                                    @else
                                        <span>N/A</span>
                                    @endif
                                    <div class="text-xs text-gray-500">
                                        @if ($event->start_time)
                                            {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }}
                                            @if ($event->end_time)
                                                - {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }}
                                            @endif
                                        @endif
                                    </div>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">
                                    {{ $event->location ?? 'N/A' }}</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $event->status == 'upcoming'
                                            ? 'bg-blue-100 text-blue-800'
                                            : ($event->status == 'ongoing'
                                                ? 'bg-green-100 text-green-800'
                                                : ($event->status == 'completed'
                                                    ? 'bg-gray-100 text-gray-800'
                                                    : 'bg-red-100 text-red-800')) }}">
                                        {{ ucfirst($event->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">
                                    @if ($event->image)
                                        <img src="{{ asset('storage/' . $event->image) }}" alt="Event image"
                                            class="h-12 w-20 object-cover rounded-md">
                                    @else
                                        <span class="text-gray-400">No image</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-center">
                                    <div class="flex justify-center space-x-3">
                                        <button type="button" data-event-id="{{ $event->id }}"
                                            data-event-title="{{ $event->title }}"
                                            data-event-detail="{{ $event->detail }}"
                                            data-event-category="{{ $event->category }}"
                                            data-event-image="storage/{{ $event->image }}"
                                            data-event-date="{{ $event->event_date ? \Carbon\Carbon::parse($event->event_date)->format('Y-m-d') : '' }}"
                                            data-event-start-time="{{ $event->start_time ? \Carbon\Carbon::parse($event->start_time)->format('H:i') : '' }}"
                                            data-event-end-time="{{ $event->end_time ? \Carbon\Carbon::parse($event->end_time)->format('H:i') : '' }}"
                                            data-event-location="{{ $event->location }}"
                                            data-event-status="{{ $event->status }}"
                                            data-event-created="{{ $event->created_at->format('d M Y, H:i') }}"
                                            class="text-indigo-600 hover:text-indigo-900 transition-colors show-event-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                        <button type="button" data-event-id="{{ $event->id }}"
                                            data-event-title="{{ $event->title }}"
                                            data-event-detail="{{ $event->detail }}"
                                            data-event-category="{{ $event->category }}"
                                            data-event-date="{{ $event->event_date ? \Carbon\Carbon::parse($event->event_date)->format('Y-m-d') : '' }}"
                                            data-event-start-time="{{ $event->start_time ? \Carbon\Carbon::parse($event->start_time)->format('H:i') : '' }}"
                                            data-event-end-time="{{ $event->end_time ? \Carbon\Carbon::parse($event->end_time)->format('H:i') : '' }}"
                                            data-event-location="{{ $event->location }}"
                                            data-event-status="{{ $event->status }}"
                                            class="text-yellow-600 hover:text-yellow-900 transition-colors edit-event-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </button>
                                        <button type="button" data-event-id="{{ $event->id }}"
                                            data-event-title="{{ $event->title }}"
                                            class="text-red-600 hover:text-red-900 transition-colors delete-event-btn">
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
                                <td colspan="9" class="px-4 py-8 text-center text-sm font-medium text-gray-500">No
                                    events found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-between">
                <div class="text-sm text-gray-700">
                    Showing <span class="font-medium">{{ $events->firstItem() ?? 0 }}</span> to <span
                        class="font-medium">{{ $events->lastItem() ?? 0 }}</span> of <span
                        class="font-medium">{{ $events->total() }}</span> events
                </div>
                <div>
                    {{ $events->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Create Event Modal -->
    <div id="eventEditModalCreate"
        class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/60 backdrop-blur-md transition-opacity duration-300"
        role="dialog">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0 animate-modal-in">
            <!-- Modal Panel -->
            <div
                class="bg-white/95 dark:bg-gray-800/95 rounded-3xl shadow-2xl border border-gray-100 dark:border-gray-700 sm:my-8 sm:max-w-lg sm:w-full transform transition-all duration-300 backdrop-blur-sm">
                <div class="px-8 pt-8 pb-6">
                    <div class="absolute top-6 right-6">
                        <button type="button"
                            onclick="document.getElementById('eventEditModalCreate').classList.add('hidden')"
                            class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">Add New Event</h3>
                    <p class="text-gray-500 dark:text-gray-400 mb-8">Complete the form below to create a new event</p>
                    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-4 text-left">
                            <div>
                                <label for="create_title"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                    <input type="text" name="title" id="create_title" required
                                        class="block w-full border border-gray-200 dark:border-gray-600 rounded-xl py-3.5 pl-12 pr-4 bg-white/50 dark:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:placeholder-gray-400 sm:text-sm transition-all duration-200">
                                </div>
                            </div>

                            <div>
                                <label for="create_detail"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Detail</label>
                                <div class="relative">
                                    <textarea name="detail" id="create_detail" required rows="4"
                                        class="block w-full border border-gray-200 dark:border-gray-600 rounded-xl py-3.5 px-4 bg-white/50 dark:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:placeholder-gray-400 sm:text-sm transition-all duration-200"></textarea>
                                </div>
                            </div>

                            <div>
                                <label for="create_category"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                    </span>
                                    <select name="category" id="create_category" required
                                        class="block w-full border border-gray-200 dark:border-gray-600 rounded-xl py-3.5 pl-12 pr-4 bg-white/50 dark:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:placeholder-gray-400 sm:text-sm transition-all duration-200">
                                        <option value="">Pilih Kategori</option>
                                        @foreach (App\Models\Event::CATEGORIES as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="create_event_date"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Event
                                        Date</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </span>
                                        <input type="date" name="event_date" id="create_event_date"
                                            class="block w-full border border-gray-200 dark:border-gray-600 rounded-xl py-3.5 pl-12 pr-4 bg-white/50 dark:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:placeholder-gray-400 sm:text-sm transition-all duration-200">
                                    </div>
                                </div>

                                <div>
                                    <label for="create_location"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Location</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </span>
                                        <input type="text" name="location" id="create_location"
                                            class="block w-full border border-gray-200 dark:border-gray-600 rounded-xl py-3.5 pl-12 pr-4 bg-white/50 dark:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:placeholder-gray-400 sm:text-sm transition-all duration-200">
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="create_start_time"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Start
                                        Time</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </span>
                                        <input type="time" name="start_time" id="create_start_time"
                                            class="block w-full border border-gray-200 dark:border-gray-600 rounded-xl py-3.5 pl-12 pr-4 bg-white/50 dark:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:placeholder-gray-400 sm:text-sm transition-all duration-200">
                                    </div>
                                </div>

                                <div>
                                    <label for="create_end_time"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">End
                                        Time</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </span>
                                        <input type="time" name="end_time" id="create_end_time"
                                            class="block w-full border border-gray-200 dark:border-gray-600 rounded-xl py-3.5 pl-12 pr-4 bg-white/50 dark:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:placeholder-gray-400 sm:text-sm transition-all duration-200">
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="create_status"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                    <select name="status" id="create_status"
                                        class="block w-full border border-gray-200 dark:border-gray-600 rounded-xl py-3.5 pl-12 pr-4 bg-white/50 dark:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:placeholder-gray-400 sm:text-sm transition-all duration-200">
                                        <option value="upcoming">Upcoming</option>
                                        <option value="ongoing">Ongoing</option>
                                        <option value="completed">Completed</option>
                                        <option value="canceled">Canceled</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="create_image"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Image
                                    (Optional)</label>
                                <div class="relative">
                                    <input type="file" name="image" id="create_image" accept="image/*"
                                        class="block w-full border border-gray-200 dark:border-gray-600 rounded-xl py-3.5 px-4 bg-white/50 dark:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:placeholder-gray-400 sm:text-sm transition-all duration-200">
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end space-x-4">
                            <button type="button"
                                onclick="document.getElementById('eventEditModalCreate').classList.add('hidden')"
                                class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500 transition-colors duration-200">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-6 py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700 shadow-lg hover:shadow-blue-500/40 transition-all duration-200">
                                Save Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Event Modal -->
    <div id="eventEditModalEdit"
        class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/60 backdrop-blur-md transition-opacity duration-300"
        role="dialog">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0 animate-modal-in">
            <!-- Modal Panel -->
            <div
                class="bg-white/95 dark:bg-gray-800/95 rounded-3xl shadow-2xl border border-gray-100 dark:border-gray-700 sm:my-8 sm:max-w-lg sm:w-full transform transition-all duration-300 backdrop-blur-sm">
                <div class="px-8 pt-8 pb-6">
                    <div class="absolute top-6 right-6">
                        <button type="button"
                            onclick="document.getElementById('eventEditModalEdit').classList.add('hidden')"
                            class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white transition-colors">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">Edit Event</h3>
                    <p class="text-gray-500 dark:text-gray-400 mb-8">Update event information</p>
                    <form id="editEventForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_event_id" name="id">
                        <div class="space-y-4 text-left">
                            <div>
                                <label for="edit_title"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                        <i class="fas fa-heading"></i>
                                    </span>
                                    <input type="text" name="title" id="edit_title" required
                                        class="block w-full border border-gray-200 dark:border-gray-600 rounded-xl py-3.5 pl-12 pr-4 bg-white/50 dark:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:placeholder-gray-400 sm:text-sm transition-all duration-200">
                                </div>
                            </div>

                            <div>
                                <label for="edit_detail"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Detail</label>
                                <div class="relative">
                                    <textarea name="detail" id="edit_detail" required rows="4"
                                        class="block w-full border border-gray-200 dark:border-gray-600 rounded-xl py-3.5 px-4 bg-white/50 dark:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:placeholder-gray-400 sm:text-sm transition-all duration-200"></textarea>
                                </div>
                            </div>

                            <div>
                                <label for="edit_category"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                        <i class="fas fa-tag"></i>
                                    </span>
                                    <input type="text" name="category" id="edit_category" required
                                        class="block w-full border border-gray-200 dark:border-gray-600 rounded-xl py-3.5 pl-12 pr-4 bg-white/50 dark:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:placeholder-gray-400 sm:text-sm transition-all duration-200">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="edit_event_date"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Event
                                        Date</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                            <i class="fas fa-calendar-alt"></i>
                                        </span>
                                        <input type="date" name="event_date" id="edit_event_date"
                                            class="block w-full border border-gray-200 dark:border-gray-600 rounded-xl py-3.5 pl-12 pr-4 bg-white/50 dark:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:placeholder-gray-400 sm:text-sm transition-all duration-200">
                                    </div>
                                </div>

                                <div>
                                    <label for="edit_location"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Location</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                        <input type="text" name="location" id="edit_location"
                                            class="block w-full border border-gray-200 dark:border-gray-600 rounded-xl py-3.5 pl-12 pr-4 bg-white/50 dark:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:placeholder-gray-400 sm:text-sm transition-all duration-200">
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="edit_start_time"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Start
                                        Time</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                            <i class="fas fa-clock"></i>
                                        </span>
                                        <input type="time" name="start_time" id="edit_start_time"
                                            class="block w-full border border-gray-200 dark:border-gray-600 rounded-xl py-3.5 pl-12 pr-4 bg-white/50 dark:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:placeholder-gray-400 sm:text-sm transition-all duration-200">
                                    </div>
                                </div>

                                <div>
                                    <label for="edit_end_time"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">End
                                        Time</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                            <i class="fas fa-clock"></i>
                                        </span>
                                        <input type="time" name="end_time" id="edit_end_time"
                                            class="block w-full border border-gray-200 dark:border-gray-600 rounded-xl py-3.5 pl-12 pr-4 bg-white/50 dark:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:placeholder-gray-400 sm:text-sm transition-all duration-200">
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="edit_status"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                        <i class="fas fa-check-circle"></i>
                                    </span>
                                    <select name="status" id="edit_status"
                                        class="block w-full border border-gray-200 dark:border-gray-600 rounded-xl py-3.5 pl-12 pr-4 bg-white/50 dark:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:placeholder-gray-400 sm:text-sm transition-all duration-200">
                                        <option value="upcoming">Upcoming</option>
                                        <option value="ongoing">Ongoing</option>
                                        <option value="completed">Completed</option>
                                        <option value="canceled">Canceled</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="edit_image"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Image
                                    (Optional)</label>
                                <div class="relative">
                                    <input type="file" name="image" id="edit_image" accept="image/*"
                                        class="block w-full border border-gray-200 dark:border-gray-600 rounded-xl py-3.5 px-4 bg-white/50 dark:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:placeholder-gray-400 sm:text-sm transition-all duration-200">
                                </div>
                                <div id="current_image_container" class="mt-2 hidden">
                                    <p class="text-sm text-gray-500">Current image:</p>
                                    <img id="current_image" src="" alt="Current image"
                                        class="h-24 mt-1 rounded-md">
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end space-x-4">
                            <button type="button"
                                onclick="document.getElementById('eventEditModalEdit').classList.add('hidden')"
                                class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500 transition-colors duration-200">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-6 py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700 shadow-lg hover:shadow-blue-500/40 transition-all duration-200">
                                <i class="fas fa-save mr-2"></i> Update Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Show Event Modal -->
    <div id="eventEditModalShow"
        class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/60 backdrop-blur-md transition-opacity duration-300"
        role="dialog">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0 animate-modal-in">
            <!-- Modal Panel -->
            <div
                class="bg-white/95 dark:bg-gray-800/95 rounded-3xl shadow-2xl border border-gray-100 dark:border-gray-700 sm:my-8 sm:max-w-lg sm:w-full transform transition-all duration-300 backdrop-blur-sm">
                <div class="px-8 pt-8 pb-6">
                    <div class="absolute top-6 right-6">
                        <button type="button"
                            onclick="document.getElementById('eventEditModalShow').classList.add('hidden')"
                            class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white transition-colors">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">Event Details</h3>
                    <p class="text-gray-500 dark:text-gray-400 mb-8">Complete event information</p>

                    <div
                        class="bg-gray-50 text-left dark:bg-gray-700/50 rounded-2xl p-6 border border-gray-100 dark:border-gray-600">
                        <div class="flex flex-col space-y-5">
                            <div class="flex items-start">
                                <div
                                    class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900/50 flex items-center justify-center text-blue-600 dark:text-blue-300 flex-shrink-0">
                                    <i class="fas fa-id-card"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Event ID</div>
                                    <div class="font-medium text-gray-900 dark:text-white" id="show_event_id">1</div>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div
                                    class="w-10 h-10 rounded-full bg-emerald-100 dark:bg-emerald-900/50 flex items-center justify-center text-emerald-600 dark:text-emerald-300 flex-shrink-0">
                                    <i class="fas fa-heading"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Title</div>
                                    <div class="font-medium text-gray-900 dark:text-white" id="show_event_title">Event
                                        Title
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div
                                    class="w-10 h-10 rounded-full bg-purple-100 dark:bg-purple-900/50 flex items-center justify-center text-purple-600 dark:text-purple-300 flex-shrink-0">
                                    <i class="fas fa-align-left"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Detail</div>
                                    <div class="font-medium text-gray-900 dark:text-white" id="show_event_detail">
                                        Event detail goes here...</div>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div
                                    class="w-10 h-10 rounded-full bg-pink-100 dark:bg-pink-900/50 flex items-center justify-center text-pink-600 dark:text-pink-300 flex-shrink-0">
                                    <i class="fas fa-tag"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Category</div>
                                    <div class="font-medium text-gray-900 dark:text-white" id="show_event_category">
                                        Workshop</div>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div
                                    class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center text-indigo-600 dark:text-indigo-300 flex-shrink-0">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Event Date</div>
                                    <div class="font-medium text-gray-900 dark:text-white" id="show_event_date">May 15,
                                        2025</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400" id="show_event_time">10:00 AM -
                                        12:00 PM</div>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div
                                    class="w-10 h-10 rounded-full bg-green-100 dark:bg-green-900/50 flex items-center justify-center text-green-600 dark:text-green-300 flex-shrink-0">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Location</div>
                                    <div class="font-medium text-gray-900 dark:text-white" id="show_event_location">
                                        Conference Room 3B</div>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div
                                    class="w-10 h-10 rounded-full bg-teal-100 dark:bg-teal-900/50 flex items-center justify-center text-teal-600 dark:text-teal-300 flex-shrink-0">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Status</div>
                                    <div class="font-medium" id="show_event_status">
                                        <span
                                            class="px-2 py-1 text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            Upcoming
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-start" id="show_image_container">
                                <div
                                    class="w-10 h-10 rounded-full bg-amber-100 dark:bg-amber-900/50 flex items-center justify-center text-amber-600 dark:text-amber-300 flex-shrink-0">
                                    <i class="fas fa-image"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Image</div>
                                    <div class="mt-2">
                                        <img id="show_event_image" src="" alt="Event image"
                                            class="rounded-lg max-h-48">
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div
                                    class="w-10 h-10 rounded-full bg-rose-100 dark:bg-rose-900/50 flex items-center justify-center text-rose-600 dark:text-rose-300 flex-shrink-0">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Created At</div>
                                    <div class="font-medium text-gray-900 dark:text-white" id="show_event_created_at">13
                                        May 2025, 09:42</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end">
                        <button type="button"
                            onclick="document.getElementById('eventEditModalShow').classList.add('hidden')"
                            class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500 transition-colors duration-200">
                            <i class="fas fa-times mr-2"></i> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Event Modal -->
    <div id="eventEditModalDelete"
        class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/60 backdrop-blur-md transition-opacity duration-300"
        role="dialog">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0 animate-modal-in">
            <!-- Modal Panel -->
            <div
                class="bg-white/95 dark:bg-gray-800/95 rounded-3xl shadow-2xl border border-gray-100 dark:border-gray-700 sm:my-8 sm:max-w-lg sm:w-full transform transition-all duration-300 backdrop-blur-sm">
                <div class="px-8 pt-8 pb-6">
                    <div class="absolute top-6 right-6">
                        <button type="button"
                            onclick="document.getElementById('eventEditModalDelete').classList.add('hidden')"
                            class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white transition-colors">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <div class="flex items-center justify-center mb-6">
                        <div
                            class="w-16 h-16 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center text-red-500 dark:text-red-300">
                            <i class="fas fa-trash-alt text-2xl"></i>
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2 text-center">Delete Event</h3>
                    <p class="text-gray-500 dark:text-gray-400 mb-6 text-center">Are you sure you want to delete this
                        event?
                        This action cannot be undone.</p>

                    <div
                        class="bg-red-50 dark:bg-red-900/20 rounded-2xl p-4 border border-red-100 dark:border-red-800/30 mb-6">
                        <div class="flex items-center">
                            <div class="mr-3 text-red-500 dark:text-red-300">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <p class="text-sm text-red-600 dark:text-red-300">
                                You are about to delete <strong id="delete_event_title" class="font-semibold"></strong>
                            </p>
                        </div>
                    </div>

                    <form id="deleteEventForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="delete_event_id" name="id">
                        <div class="flex justify-center space-x-4">
                            <button type="button"
                                onclick="document.getElementById('eventEditModalDelete').classList.add('hidden')"
                                class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500 transition-colors duration-200">
                                <i class="fas fa-ban mr-2"></i> Cancel
                            </button>
                            <button type="submit"
                                class="px-6 py-3 bg-red-600 text-white font-medium rounded-xl hover:bg-red-700 shadow-lg hover:shadow-red-500/40 transition-all duration-200">
                                <i class="fas fa-trash-alt mr-2"></i> Delete Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
