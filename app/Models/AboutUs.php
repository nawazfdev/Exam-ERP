<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description','feature_image'];

    public function items()
    {
        return $this->hasMany(AboutUsItem::class);
    }
}
