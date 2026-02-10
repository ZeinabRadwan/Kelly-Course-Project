<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::latest()->get();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!in_array(Auth::user()->role, ['admin', 'instructor'])) {
            abort(403, 'Unauthorized');
        }
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'instructor' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'youtube_links' => 'nullable|array',
            'youtube_links.*' => 'url',
            'youtube_titles' => 'nullable|array',
            'youtube_titles.*' => 'string',
            'materials' => 'nullable|array',
            'materials.*.type' => 'nullable|in:pdf,video,image,slide',
            'materials.*.title' => 'nullable|string',
            'materials.*.url' => 'nullable|url',
        ]);
    
        // Process the materials, filtering out any materials with empty title and url
        $materials = collect($request->materials)->filter(function ($material) {
            return !empty($material['title']) && !empty($material['url']);
        });
    
        // Store the course and materials
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }
    
        // Save the course and materials
        $course = Course::create(array_merge($validated, ['materials' => $materials]));
    
        return redirect()->route('courses.index')->with('success', 'Course created successfully!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::findOrFail($id);
        
        // Fetch the user's answers from the quiz_responses table for this course's questions
        $userResponses = \DB::table('quiz_responses')
                            ->where('user_id', auth()->id())
                            ->whereIn('question_id', $course->questions->pluck('id')->toArray())
                            ->get();
        
        // Check if there are user responses, and if all answers are correct
        $allCorrect = $userResponses->every(function ($response) use ($course) {
            // Retrieve the question based on the question ID
            $question = $course->questions->where('id', $response->question_id)->first();
    
            // If no question is found, treat this response as incorrect
            if (!$question) {
                return false;
            }
    
            // Check if the user's answer matches the correct answer (case-insensitive)
            return strtolower(trim($response->answer)) === strtolower(trim($question->correct_answer));
        });
    
        // Pass the course and allCorrect flag to the view
        return view('courses.show', compact('course', 'allCorrect'));
    }    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string',
            'instructor' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'youtube_links' => 'nullable|array',
            'youtube_links.*' => 'url',  
        ]);
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }
        $course->update($validated);
        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}
