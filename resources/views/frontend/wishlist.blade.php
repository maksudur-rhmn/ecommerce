@extends('layouts.frontend')


@section('content')
<div class="wishlist_area">
    <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="table_desc wishlist">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_remove">Delete</th>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Stock Status</th>
                                        <th class="product_total">Add To Cart</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($wishlists as $item)
                                    <tr>
                                        <td class="product_remove">
                                            <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST">
                                                @csrf 
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" value="{{ $item->id }}" name="id">
                                                <a href="{{ route('wishlist.destroy', $item->id) }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">X</a>
                                            </form>
                                        </td>
                                         <td class="product_thumb"><a href="{{ route('frontend.productDetails', $item->get_products->slug) }}"><img src="{{ asset('uploads/products') }}/{{ $item->get_products->thumbnail_image }}" alt=""></a></td>
                                         <td class="product_name"><a href="{{ route('frontend.productDetails', $item->get_products->slug) }}">{{  $item->get_products->name }}</a></td>
                                         @if($item->get_products->discount_price)
                                         <td class="product-price">BDT @convert($item->get_products->discount_price)</td>
                                         @else
                                         <td class="product-price">BDT @convert($item->get_products->price)</td>
                                         @endif 

                                        @if($item->get_products->quantity > 0)
                                         <td class="product_quantity">In Stock</td>
                                         @else 
                                         <td class="product_quantity">Out of Stock</td>
                                         @endif 

                                         <td class="product_total">
                                              <form action="{{ route('cart.store') }}" method="POST">
                                                @csrf 
                                                <input type="hidden" name="product_id" value="{{ $item->get_products->id }}">
                                                <input type="hidden" name="cart_amount" value="1">
                                                <a href="{{ route('cart.store') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">Add To Cart</a>
                                             </form>
                                        </td>
                                     </tr>
                                @empty
                                     <h5>No items on wishlist</h5>
                                 @endforelse
                                </tbody>
                            </table>   
                        </div>  
                    </div>
                 </div>
             </div>
        <div class="row">
            <div class="col-12">
                 <div class="wishlist_share">
                    <h4>Share on:</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>           
                        <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>           
                        <li><a href="#"><i class="fab fa-tumblr"></i></a></li>           
                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>        
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>        
                    </ul>      
                </div>
            </div> 
        </div>

    </div>
</div>
<!--wishlist area end -->

@endsection