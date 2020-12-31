<?php 
function categories()
{
  return \App\Models\Category::orderBy('name', 'asc')->get();
}

function cartCount()
{
   return App\Models\Cart::where('ip_address', request()->ip())->count();
}

function wishlistCount()
{
  return App\Models\Wishlist::where('ip_address', request()->ip())->count();
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

function about()
{
  return App\Models\About::first();
}

function footer()
{
  return App\Models\Footer::first();
}

function pendingorder($id)
{
  return App\Models\Order::where('user_id', $id)->where('status', 'pending')->where('notification', 'unseen')->orderBy('id', 'desc')->get();
}
function processingorder($id)
{
  return App\Models\Order::where('user_id', $id)->where('status', 'processing')->where('notification', 'unseen')->orderBy('id', 'desc')->get();
}
function cancelledorder($id)
{
  return App\Models\Order::where('user_id', $id)->where('status', 'cancelled')->where('notification', 'unseen')->orderBy('id', 'desc')->get();
}
function deliveredorder($id)
{
  return App\Models\Order::where('user_id', $id)->where('status', 'delivered')->where('notification', 'unseen')->orderBy('id', 'desc')->get();
}
function pending()
{
  return App\Models\Order::where('status', 'pending')->orderBy('id', 'desc')->get();
}
// function processing()
// {
//   return App\Models\Order::where('status', 'processing')->orderBy('id', 'desc')->get();
// }
// function cancelled()
// {
//   return App\Models\Order::where('status', 'cancelled')->orderBy('id', 'desc')->get();
// }
// function delivered()
// {
//   return App\Models\Order::where('status', 'delivered')->orderBy('id', 'desc')->get();
// }