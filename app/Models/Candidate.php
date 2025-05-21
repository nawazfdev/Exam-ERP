<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 'last_name', 'email', 'username', 'password',
        'candidate_group_id',
        'mobile', 'national_id', 'reference_id',
        'special_needs', 'status', 'created_by', 'organization_id'
    ];
    
    

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function group()
    {
        return $this->belongsTo(CandidateGroup::class, 'candidate_group');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
