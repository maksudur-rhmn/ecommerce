<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('verified');
        $this->middleware('checkRole');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index',[
            'categories' => Category::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'unique:categories',
            'image' => 'mimes:jpeg,jpg,png,webp,svg'
        ]);

        $category = Category::create($request->except('_token') + ['created_at' => Carbon::now()]);
        
        $image = $request->file('image');
        $filename = $category->name. '.' .$image->extension('image');
        $location = public_path('uploads/categories/' . $filename);
        Image::make($image)->save($location);

        $category->image = $filename;
        $category->save();

        return back()->withSuccess('Category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
       return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name; 

        if($request->hasFile('image'))
        {
            $existing_image = public_path('uploads/categories/' . $category->image);
            unlink($existing_image);

            $image = $request->file('image');
            $filename = $category->name. '.' .$image->extension('image');
            $location = public_path('uploads/categories/' . $filename);
            Image::make($image)->save($location);

            
            $category->image = $filename;
        }

        $category->save();

        return redirect('/categories')->withSuccess('Category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    // Custom Delete Method 
    public function delete($id)
    {

        $category = Category::findOrFail($id);

        if(!$category->hasSubCategory->count() > 0)
        {
           $image = public_path('uploads/categories/' . $category->image);
           unlink($image);
    
            $category->delete();
            return back()->withInfo('Category deleted');
        }

        return back()->withErrors('This category has active sub category.Please delete the sub category');
    }

  // END  
}
