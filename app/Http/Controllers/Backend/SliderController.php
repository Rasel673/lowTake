<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    //

    public function allSliders(){
        $sliders=Slider::all();
        return view('backend.slider.all_sliders',compact('sliders'));

    }



    public function createSlider(){
        return view('backend.slider.add_slider');

    }


    public function store(Request $request)
    {
         
        $request->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

    
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
 

        $Slider = new  Slider();
        $Slider->title=$request->title;
        $Slider->link=$request->link;
        $Slider->slider_image = $imageName;
        $Slider->save();
        return redirect()->back()->with('success', 'Slider has been created successfully.');
    }


    public function edit($id){
        $slider=Slider::find($id);
        return view('backend.slider.edit_slider',compact('slider'));
    }

    public function update(Request $request, $id){
        $request->validate([
            
            'link' => 'required'
        ]);

        $Slider = Slider::find($id);


        
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    
            ]);

        if($request->image != ''){        
             $path = public_path().'/images/';
   
             //code for remove old file
             if($Slider->slider_image != ''  && $Slider->slider_image != null){
                  $file_old = $path.$Slider->slider_image;
                  unlink($file_old);
             }
   
             //upload new file
             $imageName = time().'.'.$request->image->extension();  
             $request->image->move(public_path('images'), $imageName);
             $Slider->slider_image = $imageName;

            }
        }

   
        //for update in table
        $Slider->title=$request->title;
        $Slider->link=$request->link;
        $Slider->update();
        return redirect()->back()->with('success', 'Slider has been updated successfully.');
    }
   

public function delete($id){
    $Slider = Slider::find($id);
 //code for remove old file

 $path = public_path().'/images/';
 if($Slider->slider_image != ''  && $Slider->slider_image != null){
    $file_old = $path.$Slider->slider_image;
    unlink($file_old);
}

$Slider->delete();

return redirect()->back()->with('success', 'Slider has been deleted successfully.');
   
}

}
