<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamGrading extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_id',
        'exam_type',
        'min_score',
        'max_score',
        'grade',
    ];

    // Define the relationship to Exam model
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
