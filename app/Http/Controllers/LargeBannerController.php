<?php

namespace App\Http\Controllers;

use App\Models\LargeBanner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class LargeBannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('verified');        
    }

    public function index()
    {
        return view('lg_banners.index',[
            'banners' => LargeBanner::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,webp',
            'link'  => 'required',
            'title' => 'required',
            'sub_title' => 'required',
        ]);

        $banner = LargeBanner::create($request->except('_token') + ['created_at' => Carbon::now()]);

        $image = $request->file('image');
        $filename = $banner->id. '.' .$image->extension('image');
        $location = public_path('uploads/lg_banners/' . $filename);
        Image::make($image)->save($location);

        $banner->image = $filename;
        $banner->save();

        return back()->withSuccess('Banner Added successfully');
    }

    public function delete($id)
    {
        $banner = LargeBanner::findOrFail($id);
        $image = public_path('uploads/lg_banners/' . $banner->image);
        unlink($image);

        $banner->delete();
        return back()->withSuccess('Banner deleted');
    }
}
