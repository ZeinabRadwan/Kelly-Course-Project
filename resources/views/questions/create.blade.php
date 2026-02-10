<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-900 leading-tight">
                Create Questions for Course: {{ $course->name }}
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('courses.index') }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition duration-200">
                    Back to Courses
                </a>
            </div>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Add Questions</h3>

        <form action="{{ route('questions.store', $course) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf

            <div class="mb-4">
                <label for="question_text" class="block text-sm font-semibold text-gray-700">Question Text:</label>
                <textarea name="question_text" id="question_text"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-500"
                    rows="3" required>{{ old('question_text') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="type" class="block text-sm font-semibold text-gray-700">Question Type:</label>
                <select name="type" id="type"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-500"
                    required>
                    <option value="mcq" {{ old('type') == 'mcq' ? 'selected' : '' }}>Multiple Choice (MCQ)</option>
                    <option value="true_false" {{ old('type') == 'true_false' ? 'selected' : '' }}>True/False</option>
                </select>
            </div>

            <div id="mcq-options" class="mcq-options hidden">
                <div class="mb-4">
                    <label for="option_a" class="block text-sm font-semibold text-gray-700">Option A:</label>
                    <input type="text" name="options[0]" id="option_a" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('options.0') }}">
                </div>
                <div class="form-group">
                    <label for="option_b" class="block text-sm font-semibold text-gray-700">Option B:</label>
                    <input type="text" name="options[1]" id="option_b" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('options.1') }}">
                </div>
                <div class="form-group">
                    <label for="option_c" class="block text-sm font-semibold text-gray-700">Option C:</label>
                    <input type="text" name="options[2]" id="option_c" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('options.2') }}">
                </div>
                <div class="form-group">
                    <label for="option_d" class="block text-sm font-semibold text-gray-700">Option D:</label>
                    <input type="text" name="options[3]" id="option_d" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('options.3') }}">
                </div>
            </div>

            <div id="true-false-options" class="true-false-options hidden">
                <div class="mb-4">
                    <label for="correct_answer_true_false" class="block text-sm font-semibold text-gray-700">Correct Answer:</label>
                    <select name="correct_answer" id="correct_answer_true_false" 
                            class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-500">
                        <option value="true" {{ old('correct_answer') == 'true' ? 'selected' : '' }}>True</option>
                        <option value="false" {{ old('correct_answer') == 'false' ? 'selected' : '' }}>False</option>
                    </select>
                </div>
            </div>

            <div class="mb-4">
    <label for="correct_answer_mcq" class="block text-sm font-semibold text-gray-700">Correct Answer:</label>
    <select name="correct_answer" id="correct_answer_mcq"
        class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-500">
        <option value="0" {{ old('correct_answer') == '0' ? 'selected' : '' }}>Option A</option>
        <option value="1" {{ old('correct_answer') == '1' ? 'selected' : '' }}>Option B</option>
        <option value="2" {{ old('correct_answer') == '2' ? 'selected' : '' }}>Option C</option>
        <option value="3" {{ old('correct_answer') == '3' ? 'selected' : '' }}>Option D</option>
    </select>
</div>


            <button type="submit" class="mt-4 bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition duration-200">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById('type').addEventListener('change', function() {
            const mcqOptions = document.getElementById('mcq-options');
            const trueFalseOptions = document.getElementById('true-false-options');
            
            if (this.value === 'mcq') {
                mcqOptions.style.display = 'block';
                trueFalseOptions.style.display = 'none';
            } else if (this.value === 'true_false') {
                trueFalseOptions.style.display = 'block';
                mcqOptions.style.display = 'none';
            } else {
                mcqOptions.style.display = 'none';
                trueFalseOptions.style.display = 'none';
            }
        });

        document.getElementById('type').dispatchEvent(new Event('change'));
    </script>
</x-app-layout>
