<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'name', 'site_address', 'logo', 'email', 'phone', 'description', 'is_active', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
