@extends('layouts.admin')
@section('title', 'Users Management')
@section('content')
    <div class="content-wrapper" id="users-management-container">
        <div class="flex flex-wrap justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Users Management</h1>
            <button type="button"
                class="add-user-btn px-4 py-2 bg-[#2a2d47] text-white rounded-md flex items-center hover:bg-blue-500 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Add New User
            </button>
        </div>

        <div class="bg-white rounded-lg shadow-md mb-6">
            <div class="p-4 border-b border-gray-200">
                <form action="{{ route('admin.users.index') }}" method="GET">
                    <div class="flex">
                        <input type="text" name="search"
                            class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Search by name or email..." value="{{ request('search') }}">
                        <button type="submit"
                            class="px-4 py-2 bg-gray-100 border border-gray-300 border-l-0 rounded-r-md hover:bg-gray-200 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                    @if (request('search'))
                        <div class="mt-2">
                            <a href="{{ route('admin.users.index') }}" class="text-sm text-blue-600 hover:underline">
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
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Created At</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $user->id }}</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">{{ $user->name }}</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">{{ $user->email }}</td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">
                                    @if ($user->hasRole('admin'))
                                        <span
                                            class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Admin
                                        </span>
                                    @elseif($user->hasRole('editor'))
                                        <span
                                            class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Editor
                                        </span>
                                    @else
                                        <span
                                            class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            User
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">
                                    {{ $user->created_at->format('d M Y, H:i') }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-center">
                                    <div class="flex justify-center space-x-3">
                                        <button type="button" data-user-id="{{ $user->id }}"
                                            data-user-name="{{ $user->name }}" data-user-email="{{ $user->email }}"
                                            data-user-role="{{ $user->roles->first()->name ?? 'user' }}"
                                            data-user-created="{{ $user->created_at->format('d M Y, H:i') }}"
                                            class="text-indigo-600 hover:text-indigo-900 transition-colors show-user-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                        <button type="button" data-user-id="{{ $user->id }}"
                                            data-user-name="{{ $user->name }}" data-user-email="{{ $user->email }}"
                                            data-user-role="{{ $user->roles->first()->name ?? 'user' }}"
                                            class="text-yellow-600 hover:text-yellow-900 transition-colors edit-user-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </button>
                                        <button type="button" data-user-id="{{ $user->id }}"
                                            data-user-name="{{ $user->name }}"
                                            class="text-red-600 hover:text-red-900 transition-colors delete-user-btn">
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
                                <td colspan="6" class="px-4 py-8 text-center text-sm font-medium text-gray-500">No
                                    users found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-between">
                <div class="text-sm text-gray-700">
                    Showing <span class="font-medium">{{ $users->firstItem() ?? 0 }}</span> to <span
                        class="font-medium">{{ $users->lastItem() ?? 0 }}</span> of <span
                        class="font-medium">{{ $users->total() }}</span> users
                </div>
                <div>
                    {{ $users->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Create User Modal -->
    <div id="userEditModalCreate" class="fixed inset-0 z-50 hidden overflow-y-auto" role="dialog">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <!-- Modal Panel -->
            <div class="bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Add New User</h3>
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="create_name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="create_name" required
                                class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="mb-4">
                            <label for="create_email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="create_email" required
                                class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="mb-4">
                            <label for="create_password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password" id="create_password" required
                                class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="create_password_confirmation"
                                class="block text-sm font-medium text-gray-700">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="create_password_confirmation"
                                required
                                class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="mb-4">
                            <label for="create_role" class="block text-sm font-medium text-gray-700">Role</label>
                            <select name="role" id="create_role" required
                                class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="mt-5 sm:mt-6 flex justify-end space-x-3">
                            <button type="button"
                                onclick="document.getElementById('userEditModalCreate').classList.add('hidden')"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded">
                                Cancel
                            </button>
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit User Modal -->
    <div id="userEditModalEdit" class="fixed inset-0 z-50 hidden overflow-y-auto" role="dialog">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <!-- Modal Panel -->
            <div class="bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Edit User</h3>
                    <form id="editUserForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_user_id" name="id">
                        <div class="mb-4">
                            <label for="edit_name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="edit_name" required
                                class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="mb-4">
                            <label for="edit_email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="edit_email" required
                                class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="mb-4">
                            <label for="edit_role" class="block text-sm font-medium text-gray-700">Role</label>
                            <select name="role" id="edit_role" required
                                class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="mt-5 sm:mt-6 flex justify-end space-x-3">
                            <button type="button"
                                onclick="document.getElementById('userEditModalEdit').classList.add('hidden')"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded">
                                Cancel
                            </button>
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Show User Modal -->
    <div id="userEditModalShow" class="fixed inset-0 z-50 hidden overflow-y-auto" role="dialog">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

            <!-- Modal Panel -->
            <div class="bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">User Details</h3>
                    <div class="space-y-3 text-sm text-gray-700">
                        <p><strong>ID:</strong> <span id="show_user_id"></span></p>
                        <p><strong>Name:</strong> <span id="show_user_name"></span></p>
                        <p><strong>Email:</strong> <span id="show_user_email"></span></p>
                        <p><strong>Role:</strong> <span id="show_user_role"></span></p>
                        <p><strong>Created At:</strong> <span id="show_user_created_at"></span></p>
                    </div>
                    <div class="mt-5 sm:mt-6 flex justify-end">
                        <button type="button"
                            onclick="document.getElementById('userEditModalShow').classList.add('hidden')"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete User Modal -->
    <div id="userEditModalDelete" class="fixed inset-0 z-50 hidden overflow-y-auto" role="dialog">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <!-- Modal Panel -->
            <div class="bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Confirm Delete</h3>
                    <p class="text-sm text-gray-600">Are you sure you want to delete the user <strong
                            id="delete_user_name"></strong>?</p>
                    <form id="deleteUserForm" method="POST" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="delete_user_id" name="id">
                        <div class="mt-5 sm:mt-6 flex justify-end space-x-3">
                            <button type="button"
                                onclick="document.getElementById('userEditModalDelete').classList.add('hidden')"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded">
                                Cancel
                            </button>
                            <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">
                                Delete
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
