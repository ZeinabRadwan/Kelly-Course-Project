<x-app-layout>
@if(Auth::user()->role === 'student')
                <script>
                    window.location.href = "/"; 
                </script>
            @else
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                Edit Course {{ $course->title }}
            </h2>
            <a href="{{ route('courses.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Back to Courses
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Course Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $course->title) }}" class="mt-1 block w-full" required>
                    </div>

                    <div>
                        <label for="instructor" class="block text-sm font-medium text-gray-700">Instructor</label>
                        <input type="text" id="instructor" name="instructor" value="{{ old('instructor', $course->instructor) }}" class="mt-1 block w-full" required>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" name="description" rows="4" class="mt-1 block w-full" required>{{ old('description', $course->description) }}</textarea>
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Course Image</label>
                        <input type="file" id="image" name="image" class="mt-1 block w-full">
                    </div>

                    <!-- YouTube Links Section -->
                    <div>
                        <label for="youtube_links" class="block text-sm font-medium text-gray-700">YouTube Links</label>
                        <div class="mt-1 space-y-2">
                            @foreach(old('youtube_links', $course->youtube_links) as $index => $link)
                                <input type="text" name="youtube_links[]" value="{{ $link }}" class="mt-1 block w-full" placeholder="Paste YouTube URL">
                            @endforeach
                            <!-- Add a button to add new input fields -->
                            <button type="button" class="mt-2 text-blue-600" id="add_youtube_link">+ Add another link</button>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update Course</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Add new YouTube link input dynamically
        document.getElementById('add_youtube_link').addEventListener('click', function() {
            const newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'youtube_links[]';
            newInput.classList.add('mt-1', 'block', 'w-full');
            newInput.placeholder = 'Paste YouTube URL';

            // Append the new input to the container
            document.querySelector('div.mt-1.space-y-2').appendChild(newInput);
        });
    </script>
        @endif
        </x-app-layout>
