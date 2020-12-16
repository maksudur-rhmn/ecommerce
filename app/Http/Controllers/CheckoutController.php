<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_list;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
  
        $coupon_name = $request->coupon_name;
        $total = $request->total;
        return view('frontend.checkout', compact('coupon_name', 'total'));
    }

    public function order(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required', 
            'phone'      => 'required',
            'payment_method'  => 'required',
            'address'         => 'required',
            'zip_code'        => 'required',
        ]);

        $order = Order::create($request->except('_token') + ['user_id' => Auth::id() ?? 0, 'created_at' => Carbon::now()]);
        foreach(cartItems() as $item)
        {
            Order_list::insert([
                'order_id'   => $order->id,
                'user_id'    => Auth::id() ?? '',
                'product_id' => $item->product_id,
                'amount'     => $item->cart_amount,
                'created_at' => Carbon::now(),
            ]);

         Cart::find($item->id)->delete();
        }
        return redirect('/')->withSuccess('Order have been placed. We will get in touch with you as soon as possible');
    }
}
