<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class ReportController extends Controller
{
    //

    public function report(){

        // initialy show only today orders
        $orders=Order::whereDate('created_at', '=', Carbon::today()->toDateString())->get();
        return view('backend.Report.report',compact('orders'));

    }


    public function filter_report(Request $request,$type){

      
       

        if($type=='today'){
            $orders=Order::whereDate('created_at', '=', Carbon::today()->toDateString())->get();
           
        }

        if($type=='previous_day'){
            $orders=Order::whereDate('created_at',Carbon::yesterday())->get();
        }

        if($type=='current_month'){
        $orders=Order::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->get();
        }

        if($type=='previous_month'){
            $orders=Order::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(1))->get();
        }

        if($type=='current_year'){
            $orders=Order::whereYear('created_at',Carbon::now()->year)->get();
        }


        if($type=='custom'){
            $startDate =$request->start_date; // Start 
            $endDate =$request->end_date; // End 
            $orders= Order::whereBetween('created_at', [$startDate, $endDate]) ->get();
        }

        return view('backend.Report.report',compact('orders'));

    }


    



}
