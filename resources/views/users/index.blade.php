<x-app-layout>
@if(Auth::user()->role === 'admin')

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                {{ __('User  Management') }}
            </h2>
            <div class="mb-4">
                <a href="{{ route('user.create') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-200">
                    Create New User
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <!-- Display success message -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-gray-900 ring-opacity-10 max-w-7xl mx-auto">
            <table class="min-w-full text-sm text-gray-800 dark:text-gray-200">
                <!-- Table Header -->
                <thead class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                    <tr class="border-b dark:border-gray-600">
                        <th class="px-6 py-4 text-left font-semibold">Name</th>
                        <th class="px-6 py-4 text-left font-semibold">Email</th>
                        <th class="px-6 py-4 text-left font-semibold">Role</th>
                        <th class="px-6 py-4 text-left font-semibold">Actions</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody>
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-600 border-b dark:border-gray-600">
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-block bg-blue-200 text-blue-800 py-1 px-3 rounded-full text-xs font-semibold">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('user.edit', $user->id) }}" class="inline-block bg-yellow-500 text-white py-2 px-4 rounded-md hover:bg-yellow-600 transition duration-200">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                No users found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @else
    <script>
    window.location.href = "{{ route('dashboard') }}";
    </script>
    @endif   
</x-app-layout>