<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'name', 
        'site_address', 
        'logo', 
        'email', 
        'phone', 
        'description', 
        'is_active', 
        'status'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relationships
    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function candidateGroups()
    {
        return $this->hasMany(CandidateGroup::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }
}
