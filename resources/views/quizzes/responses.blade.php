<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-4xl font-bold text-gray-900">Quiz Results</h2>
            <a href="{{ route('courses.index') }}"
                class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 ease-in-out">
                Back to Courses
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-10 shadow-lg rounded-lg border-t-4 border-blue-600">
                <div class="space-y-8">
                    @foreach ($feedback as $response)
                        <div class="question space-y-6 border-b pb-6">
                            <div class="bg-gray-100 p-4 rounded-lg" style="margin: 25px 0 0 0;">
                                <h3 class="text-2xl font-semibold text-gray-800">{{ $response['question_text'] }}</h3>
                            </div>

                            <div
                                class="form-grou bg-gray-50 p-4 rounded-lg border {{ strtolower(trim($response['user_answer'])) === strtolower(trim($response['correct_answer'])) ? 'border-green-500' : 'border-red-500' }}">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <p class="text-sm font-semibold text-gray-600">Your Answer:</p>
                                        <p class="ml-2 text-lg text-gray-800">
                                            {{ $response['user_answer'] ?? 'Not answered' }}</p>
                                    </div>

                                    <div class="flex items-center">
                                        @if (strtolower(trim($response['user_answer'])) === strtolower(trim($response['correct_answer'])))
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-8 h-8 text-teal-500 transition-transform transform hover:scale-110"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-8 h-8 text-red-600 transition-transform transform hover:scale-110"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        @endif
                                    </div>
                                </div>

                                @if (strtolower(trim($response['user_answer'])) !== strtolower(trim($response['correct_answer'])))
                                    <p class="mt-2 text-sm font-semibold text-red-600">Correct Answer:
                                        {{ $response['correct_answer'] }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    <div class="bg-gray-100 p-6 rounded-lg mt-10">
                        <h3 class="text-2xl font-semibold text-gray-800 text-center">
                            Your Total Score:
                            <span
                                class="text-4xl font-extrabold text-blue-600 border border-blue-600 rounded-full px-4 py-1">
                                {{ $score }} / {{ count($feedback) }}
                            </span>
                        </h3>

                        <p class="mt-4 text-xl font-bold text-center text-green-600">
                            @if ($score == count($feedback))
                                Amazing job! You've achieved a flawless score! 🎉
                            @else
                                Unfortunately, you didn't make it this time. Take some time to review and give it
                                another shot! 💪
                            @endif
                        </p>

                        @if ($score == count($feedback))
                            <div class="mt-10 text-center">
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

                                <style>
                                    .certificate-container {
                                        position: relative;
                                        width: 100%;
                                        height: 125vh;
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
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
