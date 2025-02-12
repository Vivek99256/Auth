<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastEducation extends Model
{
    use HasFactory;

    protected $table = 'past_eduction'; // Custom table name

    protected $fillable = [
        'medium',
        'name_of_board',
        'year',
        'percentage',
        'school_name',
        'place',
        'trial'
    ];

    // Define relationship with Student
    public function student()
    {
        Log::info('past_id');
        return $this->belongsTo(Student::class, 'past_id');
    }
}
