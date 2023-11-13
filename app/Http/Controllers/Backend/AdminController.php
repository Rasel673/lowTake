<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Category;

class AdminController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware(['auth', 'user-access:1']);
    }

    public function index(){
        return view('backend.index');
    }
    


   public  function website_setup(Request $request){

    if($request->method()=='GET')
    {
        $setting=Setting::first();
        return view('backend.settings.website_setup',compact('setting'));
    }
 

    if($request->method()=='POST')
    {
       
       

        $request->validate([
            'title' => 'required',
            'footer_address' => 'required',
            'footer_phone' => 'required',
            'footer_email' => 'required',
          ]);


          $setting=Setting::first();


          if ($request->hasFile('header_Icon')) {
            $request->validate([
                'header_Icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    
            ]);
        if($request->header_Icon != ''){        
            $path = public_path().'/images/';
  
            //code for remove old file
            if($setting->header_Icon != ''  && $setting->header_Icon != null){
                 $file_old = $path.$setting->header_Icon;
                 unlink($file_old);
            }
  
            //upload new file
            $imageName = time().'headerIcon'.'.'.$request->header_Icon->extension();  
            $request->header_Icon->move(public_path('images'), $imageName);
            $setting->header_Icon =$imageName;
  
            }

        }
          

        if ($request->hasFile('footer_Icon')) {
            $request->validate([
                'footer_Icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    
            ]);
        if($request->footer_Icon != ''){        
            $path = public_path().'/images/';
  
            //code for remove old file
            if($setting->footer_Icon != ''  && $setting->footer_Icon != null){
                 $file_old = $path.$setting->footer_Icon;
                 unlink($file_old);
            }
  
            //upload new file
            $imageName2 = time().'footer_Icon'.'.'.$request->footer_Icon->extension();  
            $request->footer_Icon->move(public_path('images'), $imageName);
            $setting->footer_Icon =$imageName2;
  
            }

        }


        $setting->title=$request->title;
        $setting->social_fb=$request->social_fb;
        $setting->social_insta=$request->social_insta;
        $setting->social_linkedein=$request->social_linkedein;
        $setting->social_youtube=$request->social_youtube;
        $setting->social_tweet=$request->social_tweet;
        $setting->footer_text=$request->footer_text;
        $setting->footer_address=$request->footer_address;
        $setting->footer_phone=$request->footer_phone;
        $setting->footer_email=$request->footer_email;
        $setting->update();

        return redirect()->back()->with('success', 'Settings has been updated successfully.');

        }

   }


//  pages setup------------

public function page_settings(Request $request){

    if($request->method()=='GET')
    {
        $setting=Setting::first();

     $categories = Category::where('deleted_at',null)
     ->orderby('name', 'asc')->get();
        return view('backend.settings.home_page',compact('categories'));
    }
 



    

}





}
