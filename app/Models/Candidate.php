<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Candidate extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'username',
        'password',
        'organization_id',
        'candidate_group_id',
        'mobile',
        'national_id',
        'reference_id',
        'special_needs',
        'status',
        'created_by'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the full name attribute.
     */
    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Check if candidate is active.
     */
    public function isActive()
    {
        return $this->status === 'active';
    }

    /**
     * Get the organization that the candidate belongs to.
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * Get the candidate group that the candidate belongs to.
     */
    public function candidateGroup()
    {
        return $this->belongsTo(CandidateGroup::class);
    }

    /**
     * Get the user who created this candidate.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the exam results for the candidate.
     */
    public function examResults()
    {
        return $this->hasMany(ExamResult::class);
    }

    /**
     * Get the answers provided by the candidate.
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * Get exams that the candidate is eligible for.
     */
    public function eligibleExams()
    {
        return Exam::where('candidate_group_id', $this->candidate_group_id)
                   ->where('organization_id', $this->organization_id)
                   ->where('availability', 1);
    }
}