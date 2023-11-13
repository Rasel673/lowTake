<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetails;

class OrderController extends Controller
{
    //

    public function checkout(Request $request){
        if($request->method()=='GET')
        {
            return view('frontend.checkout');
        }

        if($request->method()=='POST')
        {
           
            $request->validate([
                'full_name' => 'required',
                'mobile' => 'required',
                'address' => 'required',
                'zip' => 'required',
                'payment_type' => 'required',

              ]);


            $shipping_address = $request->only('full_name','mobile','email','address','country','state','zip');
            $user_id=auth()->user()->id;
            $cart_orders = session()->get('cart', []);
            $totalQuantity=0;
            $totalPrice = 0;
            $todayDate=date("d-m-Y");


            foreach($cart_orders as $order){
                $totalPrice += $order['price'] * $order['quantity'];
                $totalQuantity += $order['quantity'];
            }


            // generate order--------
            $new_order=new Order();
            $new_order->user_id=$user_id;
            $new_order->cupon_id=$request->cupon_id;
            $new_order->ship_charge_id=$request->ship_charge_id;
            $new_order->payment_type=$request->payment_type;
            $new_order->order_amount=$totalPrice;
            $new_order->order_quantity=$totalQuantity;
            $new_order->shipping_address=json_encode($shipping_address);;
            $new_order->order_date=$todayDate;
            $new_order->save();


            // insert oder in order details-----
            foreach($cart_orders as $cartDetail){
              $orderDetails=new OrderDetails();
              $orderDetails->order_id=$new_order->id;
              $orderDetails->product_id=$cartDetail['id'];
              $orderDetails->demand_quantity=$cartDetail['quantity'];
              $orderDetails->product_price=$cartDetail['price'];
              $orderDetails->save();

            // decrement product quantity---------
              $product=Product::find($cartDetail['id']);
              $quantity= $product->quantity;
              $cartqty=$cartDetail['quantity'];

              $product->update(['quantity' => $quantity- $cartqty]);
            }

            //cart reset-----------------
            session()->forget('cart');
          

            ///redirect to order confirm page---------

            return redirect()->route('confirm_order',['id'=> $new_order->id]);
           
          
        }


    }



    public function confirm_order($orderId){

        $new_order=Order::find(15);
        $delivery_address=json_decode($new_order->shipping_address);
        return view('frontend.order_confirmation',compact('new_order','delivery_address'));

    }



}
