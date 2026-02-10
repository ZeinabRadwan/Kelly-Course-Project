<x-app-layout>
    @if (Auth::user()->role === 'student')
        <script>
            window.location.href = "/";
        </script>
    @else
        <x-slot name="header">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                    {{ __('Create a New Course') }}
                </h2>
                <a href="{{ route('courses.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Back to Courses
                </a>
            </div>
        </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-lg rounded-lg p-8">
            @csrf

            <!-- Tabs Navigation -->
            <div class="mb-6">
                <ul class="flex border-b">
                    <li class="mr-1">
                        <button type="button" id="requiredTab" class="bg-blue-600 text-white px-4 py-2 rounded-t-md focus:outline-none">About Course</button>
                    </li>
                    <li class="mr-1">
                        <button type="button" id="nonRequiredTab" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-t-md focus:outline-none">Course Content</button>
                    </li>
                </ul>
            </div>

            <!-- Required Data Tab -->
            <div id="requiredData" class="tab-content">
                <div class="mb-6">
                    <label for="title" class="block text-sm font-semibold text-gray-800">Course Title*</label>
                    <input type="text" name="title" id="title" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-500" required>
                </div>

                <div class="mb-6">
                    <label for="instructor" class="block text-sm font-semibold text-gray-800">Instructor Name*</label>
                    <input type="text" name="instructor" id="instructor" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-500" required>
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-sm font-semibold text-gray-800">Course Description*</label>
                    <textarea name="description" id="description" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-500" required></textarea>
                </div>

                <div class="mb-6">
                    <label for="image" class="block text-sm font-semibold text-gray-800">Upload Course Image*</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-500">
                </div>
            </div>

            <!-- Non-Required Data Tab -->
            <div id="nonRequiredData" class="tab-content hidden">
                <div class="mb-6">
                    <label for="youtube_links" class="block text-sm font-semibold text-gray-800">YouTube Video Links</label>
                    <div id="youtube-links-container">
                        <div class="flex mb-4">
                            <input type="text" name="youtube_links[]" placeholder="Enter a YouTube link" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-500" />
                            <input type="text" name="youtube_titles[]" placeholder="Enter video title" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-500 ml-4" />
                        </div>
                    </div>
                    <button type="button" class="mt-2 bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-200" onclick="addYouTubeField()">Add Another Video</button>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-800">Additional Materials</label>
                    <div id="materials-container">
                        <div class="flex flex-wrap items-center mb-4 space-x-4">
                            <select name="materials[0][type]" class="material-type border p-3 rounded-md">
                                <option value="pdf">PDF</option>
                                <option value="slide">Slide</option>
                                <option value="image">Image</option>
                            </select>
                            <input type="url" name="materials[0][url]" placeholder="Material URL" class="material-url border p-3 rounded-md w-1/2">
                            <input type="text" name="materials[0][title]" placeholder="Material Title " class="border p-3 rounded-md w-1/3">
                        </div>
                    </div>
                    <button type="button" onclick="addMaterialField()" class="bg-blue-600 text-white px-4 py-2 rounded-md mt-2">Add Another Material</button>
                </div>
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition duration-200">Create Course</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Handle tab switching
    document.getElementById('requiredTab').onclick = function() {
        document.getElementById('requiredData').classList.remove('hidden');
        document.getElementById('nonRequiredData').classList.add('hidden');
        document.getElementById('requiredTab').classList.add('bg-blue-600', 'text-white');
        document.getElementById('nonRequiredTab').classList.remove('bg-blue-600', 'text-white');
        document.getElementById('nonRequiredTab').classList.add('bg-gray-200', 'text-gray-800');
    };

    document.getElementById('nonRequiredTab').onclick = function() {
        document.getElementById('nonRequiredData').classList.remove('hidden');
        document.getElementById('requiredData').classList.add('hidden');
        document.getElementById('nonRequiredTab').classList.add('bg-blue-600', 'text-white');
        document.getElementById('requiredTab').classList.remove('bg-blue-600', 'text-white');
        document.getElementById('requiredTab').classList.add('bg-gray-200', 'text-gray-800');
    };

    // Add YouTube field
    function addYouTubeField() {
        const container = document.getElementById('youtube-links-container');
        const div = document.createElement('div');
        div.classList.add('flex', 'mb-4');

        const youtubeInput = document.createElement('input');
        youtubeInput.type = 'text';
        youtubeInput.name = 'youtube_links[]';
        youtubeInput.placeholder = 'Enter a YouTube link';
        youtubeInput.classList.add('mt-1', 'block', 'w-full', 'border', 'border-gray-300', 'rounded-md', 'p-2',
            'focus:outline-none', 'focus:ring', 'focus:ring-blue-500');

        const titleInput = document.createElement('input');
        titleInput.type = 'text';
        titleInput.name = 'youtube_titles[]';
        titleInput.placeholder = 'Enter video title';
        titleInput.classList.add('mt-1', 'block', 'w-full', 'border', 'border-gray-300', 'rounded-md', 'p-2',
            'focus:outline-none', 'focus:ring', 'focus:ring-blue-500', 'ml-4');

        div.appendChild(youtubeInput);
        div.appendChild(titleInput);
        container.appendChild(div);
    }

    // Add material field
    let materialIndex = 1;

    function addMaterialField() {
        const container = document.getElementById('materials-container');
        const div = document.createElement('div');
        div.classList.add('flex', 'flex-wrap', 'items-center', 'mb-4', 'space-x-4');

        div.innerHTML = `
            <select name="materials[${materialIndex}][type]" class="material-type border p-2 rounded-md">
                <option value="pdf">PDF</option>
                <option value="slide">Slide</option>
                <option value="image">Image</option>
                <option value="video">Video</option>
            </select>
            <input type="text" name="materials[${materialIndex}][title]" placeholder="Material Title" class="border p-2 rounded-md w-1/3">
            <input type="url" name="materials[${materialIndex}][url]" placeholder="Material URL" class="material-url border p-2 rounded-md w-1/2">
            <input type="file" name="materials[${materialIndex}][file]" class="material-file border p-2 rounded-md w-1/2 hidden">
        `;
        container.appendChild(div);
        materialIndex++;
    }

    // Remove empty material fields before form submission
    document.querySelector("form").addEventListener("submit", function(event) {
        const materials = document.querySelectorAll("[name^='materials']");
        materials.forEach((material, index) => {
            const title = document.querySelector(`[name='materials[${index}][title]']`).value;
            const url = document.querySelector(`[name='materials[${index}][url]']`).value;

            if (!title && !url) {
                material.closest('.flex').remove();
            }
        });
    });
</script>

    @endif
</x-app-layout>
