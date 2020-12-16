@extends('layouts.frontend')

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area  breadcrumbs_bg">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>checkout</h3>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--Checkout page section-->
    <div class="Checkout_section">
       <div class="container">
            <div class="row">
                @if($errors->all())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
               <div class="col-12">
                    <div class="user-actions">
                        <h3> 
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Returning customer?
                            <a class="Returning" href="{{ url('/login') }}" data-toggle="collapse" data-target="#checkout_login" aria-expanded="true">Click here to login</a>     

                        </h3>   
                    </div>
               </div>
            </div>
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form action="{{ route('order.store') }}" method="post">
                            @csrf
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-lg-6 mb-20">
                                    <label>First Name <span>*</span></label>
                                    <input name="first_name" type="text" value="{{ Auth::user()->name ?? '' }}">    
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Last Name  <span>*</span></label>
                                    <input name="last_name" type="text"> 
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Email</label>
                                    <input name="email" type="text" value="{{ Auth::user()->email ?? '' }}">     
                                </div>

                                <div class="col-12 mb-20">
                                    <label>Street address  <span>*</span></label>
                                    <input name="address" placeholder="House number and street name" type="text">     
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Zip code <span>*</span></label>
                                    <input name="zip_code"  type="text">    
                                </div> 
                                <div class="col-lg-12 mb-20">
                                    <label>Phone<span>*</span></label>
                                    <input name="phone" type="text"> 

                                </div> 
                                <div class="col-12">
                                    <div class="order-notes">
                                         <label for="order_note">Order Notes</label>
                                        <textarea name="notes" id="order_note" placeholder="Notes about your order, e.g. special notes for delivery. size, color-preference etc"></textarea>
                                    </div>    
                                </div>     	    	    	    	    	    	    
                            </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                            <h3>Your order</h3> 
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (cartItems() as $item)
                                        <tr>
                                            <td> {{ ucfirst($item->get_product->name) }} <strong> × {{ $item->cart_amount }}</strong></td>
                                            <td> 
                                                @if($item->get_product->discount_price)
                                                BDT {{ $item->get_product->discount_price * $item->cart_amount }}.00
                                                @else 
                                                BDT {{ $item->get_product->price * $item->cart_amount }}.00
                                                @endif
                                            </td>
                                        </tr> 
                                        @endforeach
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Cart Subtotal</th>
                                            <td>BDT @convert(cartTotal())</td>
                                        </tr>
                                        <tr>
                                            <th>Discount</th>
                                            <td><strong>{{ $coupon_name ?? 'No coupon used' }}</strong></td>
                                        </tr>
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td><strong> @isset($total)
                                              BDT  @convert($total)
                                            @else  
                                              BDT  @convert(cartTotal())
                                            @endisset 
                                         </strong></td>
                                        </tr>
                                    </tfoot>
                                </table>     
                            </div>
                               <div class="py-3">
                                <label>Select Payment method<span>*</span></label>
                                    <select class="form-control" name="payment_method" id="">
                                        <option value="cash on delivery">Cash on Delivery</option>
                                        <option value="bkash">Bkash</option>
                                    </select>
                               </div>
                               <div class="py-3">
                                <label>Trx ID (Only Applicable if you have paid via Bkash, Nagad, or Rocket)<span></span></label>
                                   <input type="text" placeholder="Please provide trx id if you have paid by bkash">
                               </div>
                               <div class="py-3">
                                   <div class="alert alert-warning">Please make sure you have given the correct trx id. We will confirm your order within 4-5 hours after the order is placed.</div>
                               </div>
                                <div class="order_button">
                                    <input type="hidden" name="discount" value="{{ $coupon_name ?? '' }}">
                                    <input type="hidden" name="total" value="{{ $total ?? cartTotal() }}">
                                    <button  type="submit">Proceed to Checkout</button> 
                                </div>    
                            </div> 
                        </form>         
                    </div>
                </div> 
            </div> 
        </div>       
    </div>
    <!--Checkout page section end-->
@endsection