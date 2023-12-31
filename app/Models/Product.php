<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'category_id',
        'discount',
        'name', 
        'slug',
        'thumbnail', 
        'sku',
        'rating',
        'price',
        'quantity',
        'short_desc',
        'long_desc',
        'popular',
        'islamic',
        'children',
        'novels',
        'meta_title',
        'meta_description',
       
       
    ];



    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }


    // public function discount()
    // {
    //     return $this->belongsTo(\App\Models\Category::class, 'parent_id');
    // }
}
