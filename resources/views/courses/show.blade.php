<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-900 leading-tight">
                {{ $course->title }} Details
            </h2>
            <div class="flex gap-2">
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('courses.index') }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition duration-200">
                        Back to Courses
                    </a>
                    <a href="{{ route('questions.create', $course->id) }}"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition duration-200">
                        ➕ Add Question
                    </a>
                @else
                    <a href="/"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition duration-200">
                        Back to Courses
                    </a>
                @endif

                @if (Auth::user()->role === 'student' && !$allCorrect)
                    <a href="{{ route('quiz.create', $course->id) }}"
                        class="ml-4 px-6 py-2 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 transition duration-200">
                        🎓 Take Quiz
                    </a>
                @endif

            </div>
        </div>
    </x-slot>

    @if ($allCorrect)
        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white p-10 shadow-lg rounded-lg border-t-4 border-blue-600">
                    <div class="space-y-8">
                        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Congratulations! 🎉</h2>
                        <div class="bg-gray-100 p-6 rounded-lg mt-10">
                            <div class="text-center">
                                <p class="text-lg text-gray-600 mb-8">You have successfully completed the quiz for
                                    <strong class="text-blue-600">{{ $course->title }}</strong>. Now, you can view and
                                    print your
                                    certificate.
                                </p>
                                <details class="bg-white shadow-md rounded-lg p-4">
                                    <summary class="cursor-pointer text-xl font-semibold text-blue-700 hover:underline">
                                        🎓 View Your Certificate
                                    </summary>
                                    <div class="certificate-container" id="certificate">
                                        <div class="overlay">
                                            <h3 class="user-name">{{ auth()->user()->name }}</h3>
                                            <p class="course-title">Successfully Completed: {{ $course->title }}</p>
                                        </div>
                                    </div>
                                    <button onclick="printCertificate()"
                                        class="mt-6 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 ease-in-out">
                                        Print Certificate
                                    </button>
                                </details>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <style>
        .certificate-container {
            position: relative;
            width: 100%;
            height: 150vh;
            background-image: url('{{ asset('storage/images/cert.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
        }

        .certificate-container .overlay {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 16px;
        }

        .certificate-container .overlay .user-name {
            font-size: 3rem;
            font-weight: 800;
            color: #7987b8;
            position: absolute;
            top: 38%;
            font-family: "Papyrus", fantasy;
        }

        .certificate-container .overlay .course-title {
            font-size: 2rem;
            font-weight: 500;
            color: #7987b8;
            position: absolute;
            top: 72%;
            font-family: "Brush Script MT", cursive;
        }

        @media (max-width: 768px) {
            .certificate-container {
                width: 100%;
            }

            .certificate-container .overlay .user-name {
                font-size: 2.5rem;
            }

            .certificate-container .overlay .course-title {
                font-size: 1rem;
            }
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #certificate,
            #certificate * {
                visibility: visible;
            }

            #certificate {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100vh;
            }

            .certificate-container {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                background-image: url('{{ asset('storage/images/cert.jpg') }}') !important;
                background-size: cover !important;
            }
        }
    </style>
    <script>
        function printCertificate() {
            window.print();
        }
    </script>
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-lg p-8">

                {{-- Course Info Section --}}
                <div class="flex flex-col md:flex-row md:items-start gap-8">
                    @if ($course->image)
                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}"
                            class="w-64 h-64 object-cover rounded-lg shadow-md">
                    @endif

                    <div class="flex-1">
                        <h3 class="text-3xl font-bold text-gray-800 mb-3">{{ $course->title }}</h3>
                        <p class="text-gray-700 mb-2">
                            <strong>Instructor:</strong> <span class="font-medium">{{ $course->instructor }}</span>
                        </p>
                        <div class="text-gray-800">
                            <h4 class="text-xl font-semibold mt-4">Description</h4>
                            <p class="mt-2">{{ $course->description }}</p>
                        </div>
                    </div>
                </div>

                @if (is_array($course->youtube_links) && count($course->youtube_links) > 0)
                    <div class="mt-10">
                        <h4 class="text-xl font-semibold mb-4">Course Videos</h4>

                        <!-- Flexbox container for videos -->
                        <div class="flex flex-wrap gap-8 justify-start">
                            @foreach ($course->youtube_links as $index => $link)
                                @php
                                    // Extract YouTube video ID from different formats
                                    preg_match(
                                        '/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/))([^\?&"\'>]+)/',
                                        $link,
                                        $matches,
                                    );
                                    $videoId = $matches[1] ?? null;
                                    $videoTitle = $course->youtube_titles[$index] ?? 'Topic ' . ($index + 1); // Fallback to 'Topic N' if title is not available
                                @endphp

                                @if ($videoId)
                                    <div x-data="{ open: false, fullscreen: true }"
                                        class="bg-blue-100 rounded-lg p-4 shadow hover:shadow-lg transition duration-200 w-full">
                                        <div class="flex justify-between items-center">
                                            <h5 class="font-semibold text-lg text-blue-800">{{ $videoTitle }}</h5>
                                            <button @click="open = !open"
                                                class="px-3 py-1 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition duration-200">
                                                <span x-text="open ? '-' : '+'"></span>
                                            </button>
                                        </div>

                                        <div x-show="open" x-collapse class="mt-2">
                                            <div :class="fullscreen ? 'w-full h-screen' : 'aspect-w-16 aspect-h-9'">
                                                <iframe class="w-full h-full rounded-lg shadow"
                                                    :src="fullscreen ?
                                                        'https://www.youtube.com/embed/{{ $videoId }}?autoplay=0' :
                                                        'https://www.youtube.com/embed/{{ $videoId }}'"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen>
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <p class="text-red-500">Invalid YouTube URL</p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (is_array($course->materials) && count($course->materials) > 0)
                    <div class="mt-10">
                        <h4 class="text-xl font-semibold mb-4">Course Materials</h4>

                        <div class="flex flex-wrap gap-8 justify-start">
                            @foreach ($course->materials as $material)
                                <div
                                    class="bg-blue-100 rounded-lg p-4 shadow hover:shadow-lg transition duration-200 w-full">
                                    <div class="flex justify-between items-center">
                                        <h5 class="font-semibold text-lg text-blue-800">
                                            {{ $material['title'] ?? 'Untitled' }}</h5>

                                        @if ($material['type'] === 'pdf')
                                            <a href="{{ $material['url'] }}" target="_blank"
                                                class="text-blue-600 underline">
                                                View PDF
                                            </a>
                                        @elseif($material['type'] === 'image')
                                            <div x-data="{ showImage: true }">
                                                <button @click="showImage = !showImage"
                                                    class="px-3 py-1 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition duration-200">
                                                    <span x-text="showImage ? '-' : '+'"></span>
                                                </button>
                                                <div x-show="showImage" class="mt-2">
                                                    <img src="{{ $material['url'] }}" alt="{{ $material['title'] }}"
                                                        class="w-full h-full rounded-lg shadow">
                                                </div>
                                            </div>
                                        @elseif($material['type'] === 'video')
                                            <video controls class="w-full rounded shadow">
                                                <source src="{{ $material['url'] }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @elseif($material['type'] === 'slide')
                                            <a href="{{ $material['url'] }}" target="_blank"
                                                class="text-blue-600 underline">
                                                View Slide
                                            </a>
                                        @else
                                            <p class="text-red-500">Unsupported material type</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
