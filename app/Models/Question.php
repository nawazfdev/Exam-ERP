<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_id',
        'question_type',
        'question_text',
        'correct_option',
        'options',
        'explanation',
    ];

    protected $casts = [
        'options' => 'array', // Automatically cast JSON column to an array
    ];
    

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function getOptionsAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setOptionsAttribute($value)
    {
        $this->attributes['options'] = json_encode($value);
    }
    
}
