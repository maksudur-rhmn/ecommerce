<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Order;
use App\Models\Product;
use App\Models\Order_list;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('verified');
    }

    public function index()
    {
        return view('customer.index',[
            'orders' => Order::where('user_id', Auth::id())->get(),
            'products' => Product::latest()->get(),
        ]);
    }

    public function notification($id)
    {
        Order::findOrFail($id)->update([
            'notification' => 'seen',
        ]);

        return back();
    }

    function addreview(Request $request)
    {
      $request->validate([
        'star' => 'required',
        'review' => 'required',
      ]);
      Order_list::where('user_id', Auth::id())->where('product_id', $request->product_id)->whereNull('review')->first()->update([
       'star'  =>  $request->star,
       'review' => $request->review,
      ]);

      return back()->withSuccess('Review Added');
    }
}
