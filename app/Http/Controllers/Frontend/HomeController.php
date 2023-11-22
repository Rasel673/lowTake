<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    //
public function index(){
    return view('frontend.index');
}


public function home(){
    return view('frontend.user_home');
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





public function category_product($cat_id){
    $category=Category::find($cat_id);
    $products=Product::where('category_id',$cat_id)
    ->get();
    return view('frontend.categorywise_product',compact('products','category'));

}


// reset user profile----------
public function reset_profile(Request $request,$id){

    $user=User::find($id);
    if($request->method()=='GET')
    {
       
        return view('frontend.change_user_profile',compact('user'));
    }

    if($request->method()=='POST')
    {
       
        $request->validate([
            'name' => 'required',
            'email' => 'required',
          ]);


          if($request->password!=null || $request->password!=''){
            $user->password=Hash::make($request->password);
          }

          $user->name=$request->name;
          $user->email=$request->email;
          $user->update();
          return redirect()->back()->with('success','Profile has been updated successfully!');

        }


}


}
