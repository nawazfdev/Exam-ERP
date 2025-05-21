<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsItem extends Model
{
    use HasFactory;
    protected $fillable = ['about_us_id', 'heading', 'content'];

    public function aboutUs()
    {
        return $this->belongsTo(AboutUs::class);
    }
}
