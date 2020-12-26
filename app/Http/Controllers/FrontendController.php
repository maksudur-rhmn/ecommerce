<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Blog;
use App\Models\About;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Mail\VisitorQueries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
   public function index()
   {
       return view('frontend.index',[
           'products' => Product::latest()->get(),
           'blogs'    => Blog::latest()->get(),
       ]);
   }

   public function products($name)
   {
     if(Category::where('name', $name)->exists())
     {
       $category = Category::where('name', $name)->first();
     }
     else
     {
       $category = SubCategory::where('name', $name)->first();
     }


     if(Category::where('name', $name)->exists())
     {
       $products = Product::where('category_id', $category->id)->paginate(20);
     }
     else 
     {
      $products = Product::where('sub_category_id', $category->id)->paginate(20);
     }

     return view('frontend.products', compact('category', 'products'));
   }
   public function productsAll()
   {
     
     $products = Product::latest()->paginate(20);

     return view('frontend.products', compact('products'));
   }

    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $products = Product::where('category_id', $product->category_id)->get();
        return view('frontend.productDetails',compact('product', 'products'));

    }

    public function blogs()
    {
      return view('frontend.blogs',[
        'blogs' => Blog::latest()->simplePaginate(5),
      ]);
    }
    public function blogDetails($id)
    {
      $blog = Blog::findOrFail($id);
      $blogs = Blog::all();

      return view('frontend.blogDetails', compact('blog', 'blogs'));
    }

    public function contact()
    {
      return view('frontend.contact');
    }

    public function contactPost(Request $request)
    {
      $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required|numeric',
        'message' => 'required',
     ]);

     $name = $request->name;
     $email = $request->email;
     $phone = $request->phone;
     $message = $request->message;

     Mail::to('darcheniecommerce@gmail.com')->send(new VisitorQueries($name, $email, $phone, $message));

     return back()->withSuccess('Message received successfully.We will get back to you as soon as possible');
    }

    public function about()
    {
      return view('frontend.about',[
        'about' => About::first(),
      ]);
    }

    public function faq()
    {
      return view('frontend.faq',[
        'faqs' => Faq::all(),
      ]);
    }

// END
}
