<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'feature_image',
        'description',
        'blogcategory_id', // Assuming you have a foreign key for category
    ];

    // Add this method to specify the route key name (slug instead of id)
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Automatically generate a slug when creating or updating a blog post
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($blogPost) {
            if (empty($blogPost->slug)) {
                $blogPost->slug = Str::slug($blogPost->title, '-');
            }
        });
    }
   
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blogcategory_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
  
}
