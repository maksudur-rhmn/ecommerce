<?php

namespace App\Http\Controllers;

use Str;
use Image;
use Carbon\Carbon;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Size;
use App\Models\ProductMultipleImage;

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
        return view('products.index',[
            'products' => Product::latest()->get(),
        ]);
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
            'sub_category_id' => 'required', 
            'short_desc'     => 'required',
            'long_desc'      => 'required',
            'thumbnail_image'=> 'required|mimes:jpg,jpeg,png,webp,svg',
            'image'          => 'required',
            'colors'         => 'required',
        ]);

        $slug = Str::slug($request->name) . '-' . Str::random(3);
        $product = Product::create($request->except('_token', 'colors', 'size', 'image', 'updated_at') + ['created_at' => Carbon::now(), 'slug' => $slug]);

        $thumbnail = $request->file('thumbnail_image');
        $filename  = $slug.'.' .$thumbnail->extension('thumbnail_image');
        $location  = public_path('uploads/products/' . $filename);
        Image::make($thumbnail)->save($location);
        
        $product->thumbnail_image = $filename;
        $product->save();

        if($request->hasFile('image'))
        {
            $all_images = $request->file('image');

            $counter = 1;
            foreach($all_images as $single_image)
            {
                $newfilename = $product->id. '-' .$counter. '.' .$single_image->getClientOriginalExtension();
                $newlocation = public_path('uploads/product_multiple_image/' . $newfilename);
                Image::make($single_image)->save($newlocation);
    
                ProductMultipleImage::create([
                    'image'       => $newfilename,
                    'product_id'  => $product->id,
                ]);
                $counter++;
            }
        }

            Color::create([
                'colors'     => $request->colors,
                'product_id' => $product->id,
            ]);

            Size::create([
                'size' => $request->size,
                'product_id' => $product->id,
            ]);

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
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories    = Category::orderBy('name', 'asc')->get();
        $subcategories = SubCategory::all();
        return view('products.edit', compact('product', 'categories', 'subcategories'));
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
        $request->validate([
            'name'           => 'required',
            'price'          => 'required|numeric',
            'discount_price' => 'numeric',
            'quantity'       => 'required|numeric',
            'category_id'    => 'required',
            'sub_category_id'=> 'required', 
            'short_desc'     => 'required',
            'long_desc'      => 'required',
            'thumbnail_image'=> 'mimes:jpg,jpeg,png,webp,svg',
            'colors'         => 'required',
        ]);

        $slug = Str::slug($request->name) . '-' . Str::random(3);
        $product->update($request->except('_token', 'colors', 'size', 'image', 'thumbnail_image') + ['updated_at' => Carbon::now(), 'slug' => $slug]);

        if($request->hasFile('thumbnail_image'))
        {
            $existing_image = public_path('uploads/products/' . $product->thumbnail_image);
            unlink($existing_image);

            $thumbnail = $request->file('thumbnail_image');
            $filename  = $slug.'.' .$thumbnail->extension('thumbnail_image');
            $location  = public_path('uploads/products/' . $filename);
            Image::make($thumbnail)->save($location);
            
            $product->thumbnail_image = $filename;
            $product->save();
        }

        if($request->hasFile('image'))
        {
            foreach($product->hasImages as $delete)
            {
                $oldlocation = public_path('uploads/product_multiple_image/' .$delete->image);
                unlink($oldlocation);
                ProductMultipleImage::where('product_id', $product->id)->delete();
            }
            $all_images = $request->file('image');
            $counter = 1;
            foreach($all_images as $single_image)
            {
                $newfilename = $product->id. '-' .$counter. '.' .$single_image->getClientOriginalExtension();
                $newlocation = public_path('uploads/product_multiple_image/' . $newfilename);
                Image::make($single_image)->save($newlocation);
    
                ProductMultipleImage::create([
                    'image'       => $newfilename,
                    'product_id'  => $product->id,
                ]);
                $counter++;
            }
        }

            Color::where('product_id', $product->id)->update([
                'colors'     => $request->colors,
            ]);

            Size::where('product_id', $product->id)->update([
                'size' => $request->size,
            ]);

        return redirect('/products')->withSuccess('Products updated successfully');
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
    
    public function delete($id)
    {
        $product = Product::findOrFail($id);

        $existing_image = public_path('uploads/products/' . $product->thumbnail_image);
        unlink($existing_image);

        foreach($product->hasImages as $delete)
            {
                $oldlocation = public_path('uploads/product_multiple_image/' .$delete->image);
                unlink($oldlocation);
                ProductMultipleImage::where('product_id', $product->id)->delete();
            }

        $product->delete();
        return back()->withInfo('Product has been deleted');

    }

  // END   
}
