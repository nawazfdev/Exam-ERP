<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_name',
        'site_primary_logo',
        'site_favicon',
        'timezone',
        'facebook_link',
        'twitter_link',
        'whatsapp_link',
        'youtube_link',
        'linkedin_link',
        'skype_link',
        'email',
        'fax',
        'phone',
        'phone_2',
        'address',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_copyright',
        'meta_author',
    ];

}
