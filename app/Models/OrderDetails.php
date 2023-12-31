<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;
use App\Models\Order;

class OrderDetails extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'order_id',
        'product_id',
        'demand_quantity', 
        'product_price'
    ];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }



    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }


}
