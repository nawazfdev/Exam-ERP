<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
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
    // Automatically generate a slug when creating or updating a story
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($story) {
            if (empty($story->slug)) {
                $story->slug = Str::slug($story->title, '-');
            }
        });
    }
}
