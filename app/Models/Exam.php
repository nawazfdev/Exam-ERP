<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'duration',
        'organization_id',
        'candidate_group_id',
        'question_picking',
        'availability',
        'display_countdown',
        'submit_before_end',
        'negative_marks',
        'allow_partial_marks',
        'allow_question_navigation',
        'allow_section_navigation',
        'allow_review',
        'allow_feedback_after_exam',
        'display_results',
        'display_results_after_expiry',
        'display_ranking',
        'allow_pause_resume',
        'allow_download_paper',
        'system_check',
        'allow_retake',
        'retake_count',
        'proctoring',
        'terminate_on_unusual_behavior',
        'live_chat_support',
        'force_fullscreen',
        'exam_price'
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    public function grading()
    {
        return $this->hasOne(ExamGrading::class);
    }
    public function group()
    {
        return $this->belongsTo(CandidateGroup::class, 'candidate_group_id');
    }
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
