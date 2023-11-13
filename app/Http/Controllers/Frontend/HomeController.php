<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    //
public function index(){
    return view('frontend.index');
}


public function home(){
    return view('home');
}



public function search_product(Request $request){

    if ($request->ajax()) {
        $output = '';
        $query = $request->get('query');

        $products = Product::select("name as value", "id")
        ->where('name', 'like', '%' . $query . '%')->get();


     

        if ($products) {
            $output = '<ul class="dropdown-menu ps-3" style="display:block; z-index:500; position:relative">';
            foreach($products as $product)
            {
             $output .= '
             <li><a href="#" style="text-decoration:none; display:block; color:black;">'.$product->value.'</a></li>
             ';
            }
            $output .= '</ul>';

            echo $output;
           
        }
    }


}





}