<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    //

    public function allCategories()
{
    $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
    return view('backend.category.all_category', compact('categories'));
}

 public function createCategory(Request $request)
    {
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();

        if($request->method()=='GET')
        {
            return view('backend.category.create_category', compact('categories'));
        }
        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'name'      => 'required',
                'slug'      => 'required|unique:categories',
                'parent_id' => 'nullable|numeric'
            ]);

            Category::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'parent_id' =>$request->parent_id
            ]);

            return redirect()->back()->with('success', 'Category has been created successfully.');
        }
    }







public function editCategory($id, Request $request)
    {
        $category = Category::findOrFail($id);
        if($request->method()=='GET')
        {
            $categories = Category::where('parent_id', null)->where('id', '!=', $category->id)->orderby('name', 'asc')->get();
            return view('backend.category.edit_category', compact('category', 'categories'));
        }

        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'name'     => 'required',
                'slug' => ['required', Rule::unique('categories')->ignore($category->id)],
                'parent_id'=> 'nullable|numeric'
            ]);
            if($request->name != $category->name || $request->parent_id != $category->parent_id)
            {
                if(isset($request->parent_id))
                {
                    $checkDuplicate = Category::where('name', $request->name)->where('parent_id', $request->parent_id)->first();
                    if($checkDuplicate)
                    {
                        return redirect()->back()->with('error', 'Category already exist in this parent.');
                    }
                }
                else
                {
                    $checkDuplicate = Category::where('name', $request->name)->where('parent_id', null)->first();
                    if($checkDuplicate)
                    {
                        return redirect()->back()->with('error', 'Category already exist with this name.');
                    }
                }
            }

            $category->name = $request->name;
            $category->parent_id = $request->parent_id;
            $category->slug = $request->slug;
            $category->save();
            return redirect()->back()->with('success', 'Category has been updated successfully.');
        }
    }



    public function deleteCategory($id)
{
    $category = Category::findOrFail($id);

    $productExist=Product::where('category_id',$id)->count();

    if($productExist>0){
        return redirect()->back()->with('error', 'Category already in product table');
    }

    if(count($category->subcategory))
    {
        $subcategories = $category->subcategory;
        foreach($subcategories as $cat)
        {
            $cat = Category::findOrFail($cat->id);
            $cat->parent_id = null;
            $cat->save();
        }
    }
    $category->delete();
    return redirect()->back()->with('delete', 'Category has been deleted successfully.');
}

public function search(Request $request){
    // Get the search value from the request
    $search = $request->input('search');

    // Search in the name and slug columns from the posts table
    $categories = Category::query()
        ->where('name', 'LIKE', "%{$search}%")
        ->orWhere('slug', 'LIKE', "%{$search}%")
        ->get();

        
    // Return the search view with the resluts compacted
    return view('backend.category.all_category', compact('categories'));
}




}
