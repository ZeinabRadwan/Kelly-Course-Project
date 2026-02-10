<x-app-layout>
@if(Auth::user()->role === 'admin')

    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('user.update', $user->id) }}">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">New Password</label>
                    <input type="password" name="password" id="password" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <p class="text-xs text-gray-500 mt-1">Leave blank to keep current password.</p>
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm New Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-6">
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-200">
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
    @else
    <script>
    window.location.href = "{{ route('dashboard') }}";
    </script>
    @endif   
</x-app-layout>