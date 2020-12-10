<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Image;
use Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('verified');   
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create',[
            'categories'    => Category::orderBy('name', 'asc')->get(),
            'subcategories' => SubCategory::all(),
        ]);
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
            'name'           => 'required',
            'price'          => 'required|numeric',
            'discount_price' => 'numeric',
            'quantity'       => 'required|numeric',
            'category_id'    => 'required',
            'subcategory_id' => 'required', 
            'short_desc'     => 'required',
            'long_desc'      => 'required',
            'thumbnail_image'=> 'required|mimes:jpg,jpeg,png,webp,svg',

        ]);

        $slug = Str::slug($request->name) . '-' . Str::random(3);
        $product = Product::create($request->except('_token', 'colors', 'size', 'image', 'updated_at') + ['created_at' => Carbon::now(), 'slug' => $slug]);

        $thumbnail = $request->file('thumbnail_image');
        $filename  = $slug.'.' .$thumbnail->extension('thumbnail_image');
        $location  = public_path('uploads/products/' . $filename);
        Image::make($thumbnail)->save($location);
        
        $product->thumbnail_image = $filename;
        $product->save();

        return back()->withSuccess('Product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
