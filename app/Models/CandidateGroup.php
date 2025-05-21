<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateGroup extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'created_by', 'organization_id'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id'); 
    }
}
