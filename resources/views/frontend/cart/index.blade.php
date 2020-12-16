@extends('layouts.frontend')

@section('content')

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area  breadcrumbs_bg">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>cart</h3>
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">home</a></li>
                            <li>cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
       <!--shopping cart area start -->
       <div class="shopping_cart_area">
        <div class="container">  
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                            <thead>
                                <tr>
                                    <th class="product_remove">Delete</th>
                                    <th class="product_thumb">Image</th>
                                    <th class="product_name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product_quantity">Quantity</th>
                                    <th class="product_total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('cart.custom.update') }}" method="post">
                                    @csrf
                                @foreach (cartItems() as $item)
                                <tr>
                                    <td class="product_remove"><a href="{{ route('cart.delete', $item->id) }}"><i class="fas fa-trash-alt"></i></a></td>
                                     <td class="product_thumb"><a href="{{ asset('frontend.productDetails', $item->get_product->slug) }}"><img src="{{ asset('uploads/products') }}/{{ $item->get_product->thumbnail_image }}" alt=""></a></td>
                                     <td class="product_name"><a href="{{ route('frontend.productDetails', $item->get_product->slug) }}">{{ $item->get_product->name }}</a></td>
                                     <td class="product-price">
                                         @if($item->get_product->discount_price)
                                         BDT @convert($item->get_product->discount_price)
                                         @else 
                                         BDT @convert($item->get_product->price)
                                         @endif
                                     </td>
                                     <td class="product_quantity"><label>Quantity</label> 
                                        <input type="hidden" name="id[]" value="{{ $item->id }}">
                                        <input min="1" max="100" name="cart_amount[]" value="{{ $item->cart_amount }}" type="number">
                                    </td>
                                     <td class="product_total">
                                         @if($item->get_product->discount_price)
                                         BDT @convert($item->get_product->discount_price * $item->cart_amount)
                                         @else 
                                         BDT @convert($item->get_product->price * $item->cart_amount)
                                         @endif
                                     </td>
                                 </tr>
                                @endforeach

                            </tbody>
                        </table>   
                            </div>  
                            <div class="cart_submit">
                                <button type="submit">update cart</button>
                            </form>
                            </div>      
                        </div>
                     </div>
                 </div>
                 <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code left">
                                <h3>Coupon</h3>
                                <div class="coupon_inner">   
                                    <p>Enter your coupon code if you have one.</p>                                
                                    <input type="text" placeholder="Cupon Code" id="couponName" value="{{ $coupon_name ?? "" }}">
                                    <button type="button" id="applyCoupon">Apply Cupon</button>
                                </div>    
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                   <div class="cart_subtotal">
                                       <p>Subtotal</p>
                                       <p class="cart_amount">BDT @convert(cartTotal())</p>
                                   </div>
                                   <div class="cart_subtotal ">
                                       <p>Discount</p>
                                      @isset($coupon_discount)
                                      <p class="cart_amount"><span>Flat Rate:</span> {{ $coupon_discount->discount }}%</p>
                                      @else 
                                      <p class="cart_amount"><span>Flat Rate:</span> BDT 0.00</p>
                                      @endisset
                                   </div>

                                   <div class="cart_subtotal">
                                       <p>Total</p>
                                       @isset($coupon_discount)
                                       <p class="cart_amount">BDT {{  $total = round( cartTotal() - ($coupon_discount->discount / 100) * cartTotal()) }}.00</p>
                                       @else 
                                       <p class="cart_amount">BDT @convert(cartTotal())</p>
                                       @endisset
                                   </div>
                                   <div class="checkout_btn">
                                    <form action="{{ route('checkout.index') }}" method="post">
                                        @csrf
                                    
                                        <input type="hidden" value="{{ $coupon_discount->coupon_name ?? "" }}" name="coupon_name">
                                        <input type="hidden" value="{{ $total ?? "" }}" name="total">
                                       <button type="submit">Proceed to Checkout</button>
                                    </form>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
        </div>     
    </div>
    <!--shopping cart area end -->
    
@endsection

@section('custom-js')
<script>
    $(document).ready(function(){
      $('#applyCoupon').click(function(){
         var coupon_name = $('#couponName').val();
         window.location.href = "{{ url('/cart') }}" + "/" + coupon_name
      });
    });
 </script>    
@endsection