<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\About;
use Illuminate\Http\Request;
use Image;
use Str;

class AboutController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth:sanctum');
       $this->middleware('verified');
       $this->middleware('checkRole');
   }

   public function index()
   {
      return view('about.index',[
          'about' => About::first(),
      ]);
   }

   public function store(Request $request)
   {

        $about = About::findOrFail($request->id);

        if($request->hasFile('image'))
        {
         $existing = public_path('uploads/about/' . $about->image);
         unlink($existing); 
        }

       if($request->hasFile('bottom_title_image_one'))
       {
        $existing1 = public_path('uploads/about/' . $about->bottom_title_image_one);
        unlink($existing1); 
       }

       if($request->hasFile('bottom_title_image_two'))
       {
        $existing2 = public_path('uploads/about/' . $about->bottom_title_image_two);
        unlink($existing2); 
       }

       if($request->hasFile('bottom_title_image_three'))
       {
        $existing2 = public_path('uploads/about/' . $about->bottom_title_image_three);
        unlink($existing2);
       }

        $about->update($request->except('_token') + ['created_at' => Carbon::now()]);
     
       
       if($request->hasFile('image'))
       {
        $image = $request->file('image');
        $filename = 'top-image-'. Str::random(3). '-' .$about->id. '.' .$image->extension('image');
        $location = public_path('uploads/about/' . $filename);
        Image::make($image)->save($location);
 
        $about->image = $filename;
 
       }

       if($request->hasFile('bottom_title_image_one'))
       {

        $image_one = $request->file('bottom_title_image_one');
        $filename1 = 'bottom-image-one-'. Str::random(3). '-' . $about->id. '.' .$image->extension('bottom_title_image_one');
        $location = public_path('uploads/about/' . $filename1);
        Image::make($image_one)->save($location);
 
        $about->bottom_title_image_one = $filename1;
       }

       if($request->hasFile('bottom_title_image_two'))
       {

        $image_two = $request->file('bottom_title_image_two');
        $filename2 = 'bottom-image-two-'. Str::random(3). '-' . $about->id. '.' .$image->extension('bottom_title_image_two');
        $location = public_path('uploads/about/' . $filename2);
        Image::make($image_two)->save($location);
 
        $about->bottom_title_image_two = $filename2;
       }

       if($request->hasFile('bottom_title_image_three'))
       {

        $image_three = $request->file('bottom_title_image_three');
        $filename3 = 'bottom-image-three-'. Str::random(3). '-' . $about->id. '.' .$image->extension('bottom_title_image_three');
        $location = public_path('uploads/about/' . $filename3);
        Image::make($image_three)->save($location);
 
        $about->bottom_title_image_three = $filename3;
       }

       $about->save();

       return back()->withSuccess('About updated');
       
   }
}
