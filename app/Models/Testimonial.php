<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'location',
        'review',
        'feature_image',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    // Automatically generate a slug when creating or updating a testimonial
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($testimonial) {
            if (empty($testimonial->slug)) {
                $testimonial->slug = Str::slug($testimonial->name, '-');
            }
        });
    }
}
