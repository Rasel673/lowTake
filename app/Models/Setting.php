<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 
        'fav_Icon', 
        'header_Icon',
        'social_fb',
        'social_insta',
        'social_linkedein',
        'social_youtube',
        'social_tweet',
        'footer_Icon',
        'footer_text',
        'footer_address',
        'footer_phone',
        'footer_email',

    
    ];
}
