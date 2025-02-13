<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'document'; // ✅ Make sure this matches your table name

    protected $fillable = [
        'student_id',
        'document_type',
        'document_title',
        'file_name',
    ];
}
