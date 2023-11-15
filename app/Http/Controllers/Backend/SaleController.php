<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetails;

class SaleController extends Controller
{
    //

public function allSales(){

    $orders=Order::orderBy('id', 'DESC')->paginate(10); 

    return view('backend.sale.all_sale',compact('orders'));

}



public function search(Request $request){
    // Get the search value from the request
    $search = $request->input('search');

    // Search in the  from the Order table
    $orders = Order::query()
        ->where('id', 'LIKE', "%{$search}%")
        ->orWhere('order_date', 'LIKE', "%{$search}%")
        ->orWhere('payment_status', 'LIKE', "%{$search}%")
        ->orWhere('delivery_status', 'LIKE', "%{$search}%")
        ->orWhere('payment_type', 'LIKE', "%{$search}%")
        ->paginate(10);

        
    // Return the search view with the resluts compacted
    return view('backend.sale.all_sale',compact('orders'));
}



public function orderDetails($orderId){
    $orderItems=OrderDetails::with('product')->where('order_id',$orderId)->get();
    $order=Order::find($orderId);
    $orderAddress=json_decode($order->shipping_address,true);
    return view('backend.sale.order_details',compact('orderItems','order','orderAddress'));

}


// order invoice print-------
public function orderInvoice($orderId){
    $orderItems=OrderDetails::with('product')->where('order_id',$orderId)->get();
    $order=Order::find($orderId);
    $orderAddress=json_decode($order->shipping_address,true);
    return view('backend.invoice.orderInvoice',compact('orderItems','order','orderAddress'));

}


public function chang_status($type,$orderId){

$order=Order::find($orderId);
if($type=='payment_status'){
$order->payment_status='paid';
$order->update();
}

if($type=='delivery_status'){
    $order->delivery_status='delivered';
    $order->update();
}


if($type=='cencel'){

    $orderItems=OrderDetails::with('product')->where('order_id',$order->id)->get();
    foreach($orderItems as $orderItem){
      // increment product quantity---------
        $product=Product::find($orderItem->product->id);
        $quantity= $product->quantity+$orderItem->demand_quantity;
        $product->update(['quantity' => $quantity]);
        //delete items-------
        $orderItem->delete();
      }

    //delete order-------
    $order->delete();
     return redirect()->back()->with('success','Order has been deleted successfully.');
}


return redirect()->back()->with('success', $type.'has been updated successfully.');

}



}
