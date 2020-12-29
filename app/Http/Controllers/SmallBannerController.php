<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\SmallBanner;
use Illuminate\Http\Request;
use Image;


class SmallBannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('verified');        
    }

    public function index()
    {
        return view('sm_banners.index',[
            'banners' => SmallBanner::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,webp',
            'link'  => 'required',
        ]);

        $banner = SmallBanner::create($request->except('_token') + ['created_at' => Carbon::now()]);

        $image = $request->file('image');
        $filename = $banner->id. '-' .$image->extension('image');
        $location = public_path('uploads/sm_banners/' . $filename);
        Image::make($image)->save($location);

        $banner->image = $filename;
        $banner->save();

        return back()->withSuccess('Banner Added successfully');
    }

    public function delete($id)
    {
        $banner = SmallBanner::findOrFail($id);
        $image = public_path('uploads/sm_banners/' . $banner->image);
        unlink($image);

        $banner->delete();
        return back()->withSuccess('Banner deleted');
    }
}
