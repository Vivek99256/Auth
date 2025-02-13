<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PastEducation extends Model
{
    use HasFactory;

    protected $table = 'past_educations';

    protected $fillable = [
        'student_id', 'previous_school', 'last_standard', 'percentage', 'board'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
