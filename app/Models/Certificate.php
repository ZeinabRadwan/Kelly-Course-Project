<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    // Define the table name (optional if it follows Laravel's conventions)
    protected $table = 'certificates';

    // Define the fillable fields
    protected $fillable = [
        'user_id',
        'course_id',
    ];

    // Define relationships to other models

    // Each certificate belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Each certificate belongs to a course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
