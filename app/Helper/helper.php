<?php 
function categories()
{
  return \App\Models\Category::orderBy('name', 'asc')->get();
}

function cartCount()
{
   return App\Models\Cart::where('ip_address', request()->ip())->count();
}

function cartItems()
{
  return App\Models\Cart::where('ip_address', request()->ip())->get();
}

function cartTotal()
{
    cartItems();
    $sub_total = 0;
    foreach(cartItems() as $item)
    {
     
        $product_price = App\Models\Product::find($item->product_id)->discount_price ?? App\Models\Product::find($item->product_id)->price ;
        $sub_total = $sub_total + ($item->cart_amount * $product_price);
    }
    return $sub_total;
}