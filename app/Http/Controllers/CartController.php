<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index($coupon_name = "")
    {
        if(cartTotal() > 0)
        {
            if($coupon_name != "")
            {
              if(Coupon::where('coupon_name', $coupon_name)->exists())
              {
               if(Coupon::where('coupon_name', $coupon_name)->first()->valid_till >= Carbon::now()->format('Y-m-d'))
               {
                 $coupon_name;
                 $coupon_discount = Coupon::where('coupon_name', $coupon_name)->first();
                 return view('frontend.cart.index', compact('coupon_name', 'coupon_discount'));
               }
               else 
               {
                return redirect('/cart')->withSuccess('Coupon is Expired');
               }
              }
              else 
              {
               return redirect('/cart')->withSuccess('Coupon is invalid');
              }
            }
            else
            {
              return view('frontend.cart.index');
            }
        }
        else 
        {
          return redirect('/')->withSuccess('You do not have any products on cart');
        }
    }
    public function store(Request $request)
    {
        if(Cart::where('ip_address', $request->ip())->where('product_id', $request->product_id)->exists())
        {
          Cart::where('ip_address', $request->ip())->where('product_id', $request->product_id)->increment('cart_amount', $request->cart_amount);
          return back()->withSuccess('Product Updated to Cart');
        }
        else
        {
          Cart::insert([
            'ip_address'  => $request->ip(),
            'cart_amount' => $request->cart_amount,
            'product_id'  => $request->product_id,
            'created_at'  => Carbon::now(),
          ]);
          return back()->withSuccess('Product Added to Cart');
        }
    }

    public function delete($cart_id)
    {
      Cart::find($cart_id)->delete();
      return back()->withSuccess('Product Removed From the Cart');
    }

    public function cartUpdate(Request $request)
    {

      foreach ($request->id as $key => $id) {
        Cart::findOrFail($id)->update([
          'cart_amount' => $request->cart_amount[$key],
        ]);
      }
        return back()->withSuccess('Cart Updated');
    }
}
