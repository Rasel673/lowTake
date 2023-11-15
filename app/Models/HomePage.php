<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;


    protected $fillable = [
        'banner_1',
        'banner_2',
        'banner_3',
        'banner_4',
        'banner_5',
        'selected_category',
       
    ];

}
