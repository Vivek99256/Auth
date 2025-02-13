<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'stud_name', 'mid_name', 'surname', 'stud_mobile_no', 'birthdate', 'father_mobile_no',
        'email', 'address', 'state', 'city', 'pincode', 'section', 'standard', 'division',
        'quota', 'gender', 'photo', 'religion', 'caste', 'blood_group', 'adhar_no'
    ];

    public function pastEducation()
    {
        return $this->hasMany(PastEducation::class);
    }

}
