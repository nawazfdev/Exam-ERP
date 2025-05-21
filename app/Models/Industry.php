<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Industry extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'feature_image',
        'description',
        'industrycategory_id',
    ];
    
    // Add this method to specify the route key name (slug instead of id)
    public function getRouteKeyName()
    {
        return 'slug';
    }
    // Automatically generate a slug when creating or updating a Industry
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($Industry) {
            if (empty($Industry->slug)) {
                $Industry->slug = Str::slug($Industry->title, '-');
            }
        });
    }
    public function category()
    {
        return $this->belongsTo(IndustryCategory::class, 'industrycategory_id');
    }
}
