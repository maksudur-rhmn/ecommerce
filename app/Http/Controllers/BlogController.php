<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use Illuminate\Http\Request;
use Auth;
use Image;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('blog.index',[
           'blogs' => Blog::latest()->get(),
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate(['title' => 'required', 'sub_title' => 'required', 'description_one' => 'required', 'image' => 'required']);
       $blog = Blog::create($request->except('_token') + ['created_at' => Carbon::now(), 'written_by' => Auth::user()->name]);

       $image = $request->file('image');
       $filename = $blog->id. '.' .$image->extension('image');
       $location = public_path('uploads/blogs/' . $filename);
       Image::make($image)->save($location);

       $blog->image = $filename;
       $blog->save();

       return redirect('/blog')->withSuccess('Blog Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        if($request->hasFile('image'))
        {
            $img = public_path('uploads/blogs/' . $blog->image);
            unlink($img);

            $image = $request->file('image');
            $filename = $blog->id. '.' .$image->extension('image');
            $location = public_path('uploads/blogs/' . $filename);
            Image::make($image)->save($location);
            $blog->image = $filename;
        }

        $blog->title = $request->title;
        $blog->sub_title = $request->sub_title;
        $blog->description_one = $request->description_one;
        $blog->description_two = $request->description_two;
        $blog->description_three = $request->description_three;
        $blog->quotation = $request->quotation;
        $blog->save();

        return redirect('/blog')->withSuccess('Blog updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }

    // Custom Delete 
    public function delete($id)
    {
        Blog::findOrFail($id)->delete();

        return back()->withSuccess('Blog deleted');
    }
}
