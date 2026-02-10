<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;  // Add this for logging

class QuestionController extends Controller
{
    public function create(Course $course)
    {
        return view('questions.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        // Validate
        $validated = $request->validate([
            'question_text' => 'required|string',
            'type' => 'required|in:mcq,true_false',
            'correct_answer' => 'required',
            'options' => 'nullable|array'
        ]);
    
        if ($request->type === 'mcq') {
            $options = $request->options;
            $correctAnswerIndex = (int) $request->correct_answer;
    
            // Validate the correct answer index
            if (!isset($options[$correctAnswerIndex])) {
                return back()->withErrors(['correct_answer' => 'The selected correct answer is invalid.'])->withInput();
            }
    
            $correctAnswer = $options[$correctAnswerIndex];
        } else {
            $options = null;
            $correctAnswer = $request->correct_answer; // "true" or "false"
        }
    
        // Store
        $question = $course->questions()->create([
            'question_text' => $request->question_text,
            'type' => $request->type,
            'options' => $options,
            'correct_answer' => $correctAnswer,
        ]);
    
        return redirect()->route('courses.show', $course)->with('success', 'Question added!');
    }
    
}
