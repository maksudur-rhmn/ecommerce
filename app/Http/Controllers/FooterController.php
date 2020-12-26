<?php

namespace App\Http\Controllers;

use Str;
use Image;
use Carbon\Carbon;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('verified');
        $this->middleware('checkRole');
    }

    public function index()
    {
        return view('footer.index',[
            'footer' => Footer::first(),
        ]);
    }

    public function store(Request $request)
    {
        $footer = Footer::findOrFail($request->id);
        $footer->update($request->except('_token') + ['created_at' => Carbon::now()]);

        if($request->hasFile('logo'))
        {
        $logo = $request->file('logo');
        $filename = 'logo-'. Str::random(2). '-.' .$logo->extension('logo');
        $location = public_path('uploads/logo/' . $filename);
        Image::make($logo)->save($location);

        $footer->logo = $filename;
        }
        $footer->save();

        return back()->withSuccess('Logo updated');
    }
}
