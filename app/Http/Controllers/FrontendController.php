<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   public function index()
   {
       return view('frontend.index',[
           'products' => Product::latest()->get(),
       ]);
   }

   public function products($name)
   {
     $category = Category::where('name', $name)->first();

     $products = Product::where('category_id', $category->id)->paginate(20);

     return view('frontend.products', compact('category', 'products'));
   }
//    public function lowToHigh($name)
//    {
//      $category = Category::where('name', $name)->first();

//      $products = Product::where('category_id', $category->id)->orderBy('price', 'asc')->get();

//      return view('frontend.products', compact('category', 'products'));
//    }
//    public function highToLow($name)
//    {
//      $category = Category::where('name', $name)->first();

//      $products = Product::where('category_id', $category->id)->orderBy('price', 'desc')->get();

//      return view('frontend.products', compact('category', 'products'));
//    }

    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $products = Product::where('category_id', $product->category_id)->get();
        return view('frontend.productDetails',compact('product', 'products'));

    }

// END
}
