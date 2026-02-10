<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Question;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class QuizController extends Controller
{
    public function create(Course $course)
    {
        // First, check if the quiz questions are stored in the session
        $quizQuestions = session('quiz_question_ids');
    
        // If there are quiz questions in the session, use those
        if ($quizQuestions) {
            $questions = Question::whereIn('id', $quizQuestions)->get();
        } else {
            // Check if the user has already taken the quiz in the last hour
            $lastQuizAttempt = \DB::table('quiz_responses')
                                  ->where('user_id', auth()->id())
                                  ->latest('taken_at')
                                  ->first();
    
            if ($lastQuizAttempt && $lastQuizAttempt->taken_at && now()->diffInHours($lastQuizAttempt->taken_at) < 1) {
                // If the quiz was taken recently, flash a message to indicate the user can't retake the quiz
                session()->flash('quiz_taken_recently', 'You are not allowed to retake the quiz now. Try again after 1 hour.');
    
                // You can also pass an empty array for the questions if needed
                $questions = [];
            } else {
                // If no previous attempt or more than 1 hour has passed, generate new random questions
                $questions = $course->questions()->inRandomOrder()->take(2)->get();
                // Store the selected question IDs in session to lock them
                session(['quiz_question_ids' => $questions->pluck('id')->toArray()]);
            }
        }
    
        return view('quizzes.create', compact('course', 'questions'));
    }
    

    public function store(Request $request, Course $course)
    {
        $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|string',
        ]);
    
        $questionIds = session('quiz_question_ids', []); // Get the IDs of the selected questions
        $questions = Question::whereIn('id', $questionIds)->get(); // Retrieve the questions
    
        $score = 0;
    
        // Loop through each question and save the answer
        foreach ($questions as $question) {
            $userAnswer = $request->answers[$question->id] ?? null; // Use question ID to get the answer
    
            if ($userAnswer === null) continue; // Skip if no answer is provided
    
            // Store the user's answer in the database
            \DB::table('quiz_responses')->insert([
                'user_id' => auth()->id(),
                'question_id' => $question->id,
                'answer' => $userAnswer,
                'course_id' => $course->id, // Assuming you have a course_id column in quiz_responses
                'taken_at' => now(), // Store the timestamp when the quiz was taken
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            // Check if the answer is correct
            if (strtolower(trim($userAnswer)) === strtolower(trim($question->correct_answer))) {
                $score++;
            }
        }
    
        // Clear the session variable for quiz question IDs
        session()->forget('quiz_question_ids');
    
        return redirect()->route('quiz.responses', $course->id);
    }

    
    public function showResponses(Course $course)
    {
        // Fetch the user's answers from the quiz_responses table for this course's questions
        $userAnswers = \DB::table('quiz_responses')
                          ->where('user_id', auth()->id())
                          ->whereIn('question_id', $course->questions->pluck('id')->toArray())
                          ->get();
    
        $questions = $course->questions;
        $feedback = [];
        $score = 0;
    
        // Loop through each answer and compare with the correct answer
        foreach ($userAnswers as $userAnswer) {
            $question = $questions->where('id', $userAnswer->question_id)->first();
    
            if ($question) {
                $questionText = $question->question_text;
                $correctAnswerText = $question->correct_answer;
                $userAnswerText = $userAnswer->answer;
    
                // Score if correct
                if (strtolower(trim($userAnswerText)) === strtolower(trim($correctAnswerText))) {
                    $score++;
                }
    
                // Collect feedback for the view
                $feedback[] = [
                    'question_id'    => $userAnswer->question_id,
                    'question_text'  => $questionText,
                    'user_answer'    => $userAnswerText,
                    'correct_answer' => $correctAnswerText,
                ];
            }
        }
    
        // Pass all data to the Blade view
        return view('quizzes.responses', compact('score', 'feedback', 'course'));
    }
    
    
}
