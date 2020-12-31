<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth:sanctum');
       $this->middleware('verified');
   }

   public function cod()
   {
       return view('orders.cod',[
           'orders' => Order::where('payment_method', 'cash on delivery')->orderBy('id', 'desc')->get(),
       ]);
   }

   public function bkash()
   {
    return view('orders.bkash',[
        'orders' => Order::where('payment_method', 'bkash')->orderBy('id', 'desc')->get(),
    ]);
   }

   public function update(Request $request)
   {
       Order::findOrFail($request->id)->update([
        'status' => $request->status,
        'notification' => 'unseen',
       ]);

       return back();
   }
}
