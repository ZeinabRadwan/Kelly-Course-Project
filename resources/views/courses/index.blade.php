<x-app-layout>
    @if (Auth::user()->role === 'student')
        <script>
            window.location.href = "/";
        </script>
    @else
        <x-slot name="header">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-900 leading-tight">
                    Course Management
                </h2>
                <a href="{{ route('courses.create') }}"
                    class="inline-flex items-center px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition duration-200">
                    <span class="font-semibold">+ Add Course</span>
                </a>
            </div>
        </x-slot>

        <div class="py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach ($courses as $course)
                        <div
                            class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <a href="{{ route('courses.show', $course->id) }}">
                                <div>
                                    @if ($course->image)
                                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}"
                                            class="w-full h-40 object-cover">
                                    @else
                                        <div
                                            class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-500">
                                            No Image Available
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $course->title }}</h3>
                                    <p class="text-sm text-blue-500">Instructor: {{ $course->instructor }}</p>
                                </div>
                            </a>
                            <div class="flex justify-between p-4">
                                <a href="{{ route('courses.edit', $course->id) }}"
                                    class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition duration-200">Edit</a>

                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this course?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition duration-200">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
