<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-semibold text-gray-800">Take the Quiz: {{ $course->title }}</h2>
            <a href="{{ route('courses.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Back to Courses
            </a>
        </div>
    </x-slot>
    @if (session('quiz_taken_recently'))
<div class="container-msg">
    <div class="quiz-restriction">
        <div class="content">
            <h2 class="title">⚠️ Quiz Restriction</h2>
            <p class="message">{{ session('quiz_taken_recently') }}</p>
            
            <!-- Quote with accounting-style borders and larger, colorful double quotes -->
            <p class="quote">
                <span class="double-quote">&ldquo;</span>Growth isn’t about passing a quiz on the first try—it’s about the wisdom gained from taking the time to learn before the second attempt.<span class="double-quote">&rdquo;</span>
            </p>
            
            <!-- Countdown Timer -->
            <div id="countdown"></div>
        </div>
    </div>
</div>

<!-- Add this style in the <head> of your HTML or inside a <style> block -->
<!-- Updated Style -->
<style>
    /* Container-msg styling using flex */
    .container-msg {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        flex-direction: column;
        width: 100%;
    }

    .quiz-restriction {
        width: 100%;
        max-width: 600px; /* Adjust based on your preference */
        text-align: center; /* Center text inside content */
        border: 2px solid #ddd; /* Optional: border around content */
        border-radius: 8px;
        padding: 20px;
        background-color: #f9f9f9; /* Optional: background color */
    }

    /* Title and message */
    .title {
        font-size: 2em; /* Bigger title size */
        color: #4a90e2; /* Blue color */
        font-weight: 700; /* Bold title */
        text-transform: uppercase; /* Capitalize title text */
        letter-spacing: 2px; /* Letter spacing for a more stylish look */
        margin-bottom: 10px; /* Space below title */
        padding-bottom: 10px; /* Extra padding below title */
        border-bottom: 3px solid #4a90e2; /* Border under title */
    }

    .message {
        font-size: 1.2em;
        color: #333;
        margin-bottom: 20px;
        line-height: 1.6; /* Improve readability */
        font-family: 'Arial', sans-serif; /* Modern font for better appearance */
        background-color:rgba(178, 201, 234, 0.59); /* Subtle background for message */
        padding: 15px;
        border-radius: 5px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Shadow to make message stand out */
    }

    /* Quote with accounting-style borders and bigger colorful double quotes */
    .quote {
        font-size: 1.5em;
        font-style: italic;
        border-top: 2px solid #000; /* Top border */
        border-bottom: 2px solid #000; /* Bottom border */
        padding: 10px 20px; /* Add padding for spacing */
        margin-top: 20px;
        margin-bottom: 20px;
        color: #333;
        position: relative;
    }

    .double-quote {
        font-size: 2.5em; /* Bigger size for the double quotes */
        color: rgb(212, 103, 169); /* Red color for the double quotes */
        font-weight: bold;
    }
</style>


    @else
        <div class="py-8">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white p-8 shadow-lg rounded-lg">
                    <form action="{{ route('quiz.store', $course->id) }}" method="POST">
                        @csrf

                        <div class="space-y-6">
                            @foreach ($questions as $question)
                                <div class="question space-y-4">
                                    <h3 class="text-xl font-medium text-gray-700">{{ $question->question_text }}</h3>

                                    @if ($question->type == 'mcq')
                                        <div class="form-group">
                                            <label class="text-sm font-semibold text-gray-600">Your Answer:</label>
                                            <div class="space-y-2">
                                                @foreach ($question->options as $option)
                                                    <button type="button"
                                                        class="answer-button w-full py-2 px-4 bg-gray-200 rounded-md hover:bg-blue-500 text-gray-700 hover:text-white"
                                                        onclick="selectAnswer('{{ $question->id }}', '{{ $option }}', this)">
                                                        {{ $option }}
                                                    </button>
                                                @endforeach
                                            </div>
                                            <input type="hidden" name="answers[{{ $question->id }}]"
                                                id="answer_{{ $question->id }}" required>
                                        </div>
                                    @elseif ($question->type == 'true_false')
                                        <div class="form-group">
                                            <label class="text-sm font-semibold text-gray-600">Your Answer:</label>
                                            <div class="space-x-4">
                                                <button type="button"
                                                    class="answer-button w-1/3 py-2 px-4 bg-gray-200 rounded-md hover:bg-blue-500 text-gray-700 hover:text-white"
                                                    onclick="selectAnswer('{{ $question->id }}', 'true', this)">
                                                    True
                                                </button>
                                                <button type="button"
                                                    class="answer-button w-1/3 py-2 px-4 bg-gray-200 rounded-md hover:bg-blue-500 text-gray-700 hover:text-white"
                                                    onclick="selectAnswer('{{ $question->id }}', 'false', this)">
                                                    False
                                                </button>
                                            </div>
                                            <input type="hidden" name="answers[{{ $question->id }}]"
                                                id="answer_{{ $question->id }}" required>
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="answer_{{ $question->id }}"
                                                class="text-sm font-semibold text-gray-600">Your Answer:</label>
                                            <input type="text" name="answers[{{ $question->id }}]"
                                                id="answer_{{ $question->id }}"
                                                class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                                required>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group mt-6">
                            <button type="submit"
                                class="w-full py-3 px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 transition">Submit
                                Quiz</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endif
</x-app-layout>

<script>
    function selectAnswer(questionId, answer, button) {
        document.getElementById('answer_' + questionId).value = answer;
        let buttons = document.querySelectorAll(`#question-${questionId} .answer-button`);
        buttons.forEach(btn => btn.classList.remove('selected', 'bg-blue-500', 'text-white', 'hover:bg-blue-600'));
        button.classList.add('selected', 'bg-blue-500', 'text-white', 'hover:bg-blue-600');
    }
</script>

<style>
    .answer-button.selected {
        background-color: #3b82f6;
        color: white;
        cursor: pointer;
    }

    .answer-button:hover {
        background-color: #2563eb;
        color: white;
    }

    .answer-button:focus {
        outline: none;
    }
</style>
