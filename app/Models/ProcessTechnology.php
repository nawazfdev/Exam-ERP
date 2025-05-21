<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProcessTechnology extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'feature_image',
        'description',
    ];
     // Add this method to specify the route key name (slug instead of id)
     public function getRouteKeyName()
     {
         return 'slug';
     }
     // Automatically generate a slug when creating or updating a product
     protected static function boot()
     {
         parent::boot();
 
         static::saving(function ($ProcessTechnology) {
             if (empty($ProcessTechnology->slug)) {
                 $ProcessTechnology->slug = Str::slug($ProcessTechnology->title, '-');
             }
         });
     }
}
