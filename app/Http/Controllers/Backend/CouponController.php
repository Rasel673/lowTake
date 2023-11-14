<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    
    public function allCoupons()
    {
        $coupons = Coupon::orderby('id', 'desc')->paginate(5);
        return view('backend.coupon.all_coupon', compact('coupons'));
    }


    public function storeCoupon(Request $request)
    {

        if($request->method()=='GET')
        {
            return view('backend.coupon.create_coupon');
        }

        if($request->method()=='POST')
        {

        $request->validate([
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required|numeric',
                       
        ]);
        $coupon = new Coupon();
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->cart_value = $request->cart_value;        
        $coupon->save();
        return redirect()->back()->with('message','Coupon has been created successfully!');
    }
    }


    public function updateCoupon(Request $request,$id)
    {

        if($request->method()=='GET')
        {
            $coupon = Coupon::find($id);
            return view('backend.coupon.edit_coupon', compact('coupon'));
        }

        if($request->method()=='POST')
        {
        $request->validate([
            'code' => 'required',
            'type' => 'required',
            'value' => 'required|numeric',         
        ]);

        $coupon = Coupon::find($id);
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        $coupon->value = $request->value;
        $coupon->cart_value = $request->cart_value;        
        $coupon->save();
        return redirect()->back()->with('message','Coupon has been updated successfully!');
    }
}


public function deleteCuopon($id)
{
    $coupon = Coupon::findOrFail($id);
    $coupon->delete();
    return redirect()->back()->with('delete', 'Coupon has been deleted successfully.');
}


}
