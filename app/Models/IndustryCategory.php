<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class IndustryCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function industrycategory()
    {
        return $this->belongsTo(IndustryCategory::class);
    }
    public function industries()
    {
        return $this->hasMany(Industry::class);
    }
}
