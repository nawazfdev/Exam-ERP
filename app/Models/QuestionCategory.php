<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class QuestionCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'organization_id',
    ];
    public function questioncategory()
    {
        return $this->belongsTo(QuestionCategory::class);
    }
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
