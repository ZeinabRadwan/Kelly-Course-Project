<x-app-layout>
@if(Auth::user()->role === 'admin')
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
            {{ __('Create New User') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                    <!-- Name Input -->
                    <div>
                        <label for="name" class="block text-gray-700 dark:text-gray-200 font-semibold">Name</label>
                        <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" required>
                    </div>

                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-gray-700 dark:text-gray-200 font-semibold">Email</label>
                        <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" required>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-gray-700 dark:text-gray-200 font-semibold">Password</label>
                        <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" required>
                    </div>

                    <!-- Password Confirmation Input -->
                    <div>
                        <label for="password_confirmation" class="block text-gray-700 dark:text-gray-200 font-semibold">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-200">
                            Create User
                        </button>
                    </div>
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