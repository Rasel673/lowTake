<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\OrderDetails;


class Order extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'cupon_id',
        'ship_charge_id', 
        'payment_type',
        'payment_status', 
        'delivery_status',
        'order_amount',
        'order_quantity',
        'order_date',
        'shipping_address',
       
    ];

    public function orderDetails()
    {
        
    }



  
}
