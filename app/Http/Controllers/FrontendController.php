<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   public function index()
   {
       return view('frontend.index',[
           'products' => Product::latest()->get(),
       ]);
   }
}
