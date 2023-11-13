<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    //
    public function allProducts()
    {
        $products = Product::with('category')->orderby('id', 'asc')->paginate(5);
        return view('backend.product.all_product', compact('products'));
    }


    public function createProduct(Request $request)
    {
        $products = Product::orderby('id', 'asc')->get();
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();

        if($request->method()=='GET')
        {
            return view('backend.product.create_product', compact('products','categories'));
        }
        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'category_id'=>'required',
                'name'      => 'required|unique:products',
                'price'      => 'required',
                'image'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'quantity'      => 'required',
                'short_desc'      => 'required',
                
            ]);

            
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
     



            Product::create([
                'category_id'=>$request->category_id,
                'discount_id'=>$request->discount_id,
                'name' => $request->name,
                'slug' =>str_replace(" ","_",$request->name),
                'sku' => $request->sku,
                'price' => $request->price,
                'thumbnail' => $imageName,
                'quantity' => $request->quantity,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'meta_title' => $request->name,
                'meta_description' => $request->short_desc,
            ]);

            return redirect()->back()->with('success', 'Product has been created successfully.');
        }
    }



    public function editProduct($id, Request $request)
    {
       

        $product = Product::with('category')->findOrFail($id);
        if($request->method()=='GET')
        {
            $categories = Category::orderby('name', 'asc')->get();
            return view('backend.product.edit_product', compact('product', 'categories'));
        }

        
        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'category_id'=>'required',
                'name'     => ['required', Rule::unique('products')->ignore($product->id)],
                'price'      => 'required',
                'quantity'      => 'required',
                'short_desc'      => 'required',
               
            ]);

           
            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
                ]);
            if($request->image != ''){        
                $path = public_path().'/images/';
      
                //code for remove old file
                if($product->thumbnail != ''  && $product->thumbnail != null){
                     $file_old = $path.$product->thumbnail;
                     unlink($file_old);
                }
      
                //upload new file
                $imageName = time().'.'.$request->image->extension();  
                $request->image->move(public_path('images'), $imageName);
                $product->thumbnail =$imageName;
      
                }

            }



            $product->category_id = $request->category_id;
            $product->discount_id = $request->discount_id;
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->sku = $request->sku;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->short_desc = $request->short_desc;
            $product->long_desc = $request->long_desc;
            $product->update();
            return redirect()->back()->with('success', 'Product has been updated successfully.');
            
        }
    }


public function viewProduct($id){
    $product = Product::findOrFail($id);
    return view('backend.product.view_product', compact('product'));
}




    public function deleteProduct($id)
{
    $product = Product::findOrFail($id);

    $path = public_path().'/images/';
    if($product->thumbnail != ''  && $product->thumbnail != null){
       $file_old = $path.$product->thumbnail;
       unlink($file_old);
   }
   

    $product->delete();
    return redirect()->back()->with('delete', 'Product has been deleted successfully.');
}


public function search(Request $request){
    // Get the search value from the request
    $search = $request->input('search');

    // Search in the name and slug columns from the posts table
    $products = Product::query()
        ->where('name', 'LIKE', "%{$search}%")
        ->orWhere('slug', 'LIKE', "%{$search}%")
        ->with('category')
        ->paginate(5);

        
    // Return the search view with the resluts compacted
    return view('backend.product.all_product', compact('products'));
}


}
