<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image', 'instructor', 'description',
        'youtube_links', 'youtube_titles', 'materials',
        'solve_quiz', 
    ];
    
    protected $casts = [
        'youtube_links' => 'array',
        'youtube_titles' => 'array',
        'materials' => 'array',
        'solve_quiz' => 'boolean', 
    ];      
    
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function hasQuestions()
{
    return $this->questions()->count() > 0;
}


}

