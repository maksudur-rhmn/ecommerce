@extends('layouts.frontend')

@section('content')
 <!--section bg area-->
 <div class="section_bg">
    <div class="container">
        <!--breadcrumbs area start-->
         <div class="breadcrumbs_area">  
             <div class="row">
                 <div class="col-12">
                     <div class="breadcrumb_content">
                         <h3>shop</h3>
                         <ul>
                             <li><a href="{{ route('frontend.index') }}">home</a></li>
                             <li>shop</li>
                         </ul>
                     </div>
                 </div>
             </div>       
         </div>
         <!--breadcrumbs area end-->
         
         <!--shop  area start-->
         <div class="shop_area shop_reverse">
             <div class="row">
                 <div class="col-lg-3 col-md-12">
                    <!--sidebar widget start-->
                     <aside class="sidebar_widget">
                         <div class="widget_inner">
                             <div class="widget_list widget_categories">
                                 <h3>CATEGORIES</h3>
                                 <ul>
                                     @php
                                         $i = 1;
                                     @endphp
                                    @foreach ($products->unique('category_id') as $item)
                                    <li class="widget_sub_categories sub_categories{{ $i }}">
                                        <a href="javascript:void(0)">{{ ucfirst($item->belongTo->hasCategory->name) }}</a>
                                        <ul class="widget_dropdown_categories dropdown_categories{{ $i }}">
                                           @foreach ($item->belongTo->hasCategory->hasSubCategory as $sub)
                                           <li><a href="{{ route('frontend.products', $sub->name) }}">{{ $sub->name }}</a></li>
                                           @endforeach
                                        </ul>
                                    </li>
                                    @php
                                        $i++;
                                    @endphp
                                    @endforeach
                                 </ul>
                             </div>
                             <div class="widget_list widget_filter">
                                 <h3>Filter by price</h3>
                                 <form action="{{ url('/search') }}"> 
                                     <div id="slider-range"></div>   
                                     <button type="submit">Filter</button>
                                     <input type="text" name="text" id="amount" />   
                                 </form> 
                             </div>
                             <div class="widget_list widget_color">
                                 <h3>Select By Categories</h3>
                                 <ul>
                                   
                                    @foreach (categories() as $item)
                                    
                                        <li><a href="{{ route('frontend.products', $item->name) }}">{{ ucfirst($item->name) }}</a></li>

                                    @endforeach
                                   
                                 </ul>
                             </div>
                             <div class="widget_list widget_color">
                                 <h3>Select By Sub Categories</h3>
                                 <ul>
                                     
                                    @foreach (categories() as $item)
                                        @foreach($item->hasSubCategory as $subcategory)
                                          <li><a href="{{ route('frontend.products', $subcategory->name) }}">{{ ucfirst($subcategory->name) }}</a></li>
                                        @endforeach
                                    @endforeach

                                 </ul>
                             </div>
                         </div>
                     </aside>
                     <!--sidebar widget end-->
                 </div>
                 <div class="col-lg-9 col-md-12">
                     <!--shop wrapper start-->

                     <!--shop toolbar start-->
                     <div class="shop_toolbar_wrapper">
                         <div class="shop_toolbar_btn">
                             <button data-role="grid_4" type="button"  class="  btn-grid-4" data-toggle="tooltip" title="4"></button>
                             <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"></button>
                             <button data-role="grid_list" type="button"  class="btn-list" data-toggle="tooltip" title="List"></button>
                         </div>
                     
                         <div class="page_amount">
                             <p>Showing {{ $products->count() }} results</p>
                         </div>
                     </div>
                      <!--shop toolbar end-->
                      <div class="row shop_wrapper">
                        @foreach ($products as $product)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{ route('frontend.productDetails', $product->slug) }}"><img src="{{ asset('uploads/products') }}/{{ $product->thumbnail_image }}" alt="" style="width:217px; height:217px;"></a>
                                        <div class="label_product">
                                            @if($product->discount_price)
                                            <span class="label_sale">Sale</span>
                                            @endif
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box{{ $product->id }}" title="quick view"> <i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="far fa-heart" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name"><a href="product-details.html">{{ ucfirst($product->name) }}</a></h4>
                                        <div class="product_rating">
                                            <ul>
                                                @if(average_stars($product->id) == 1)
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                @elseif(average_stars($product->id) == 2)
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                @elseif(average_stars($product->id) == 3)
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                @elseif(average_stars($product->id) == 4)
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                @elseif(average_stars($product->id) == 5)
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                @else 
                                                <p>No ratings yet.</p>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="price_box">
                                           @if($product->discount_price)
                                           <span class="old_price">BDT @convert($product->price)</span>
                                           <span class="current_price">BDT @convert($product->discount_price)</span>
                                           @else
                                           <span class="current_price">BDT @convert($product->price)</span>
                                           @endif
                                        </div>
                                        <div class="add_to_cart">
                                            <form method="POST" action="{{ route('cart.store') }}">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="cart_amount" value="1">
                                                <a title="Add to cart" href="{{ route('cart.store') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add To Cart</a>
                                                </form>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        @endforeach
                     </div>
                     <div class="shop_toolbar t_bottom">
                         <div class="pagination">
                          @if($products->hasPages())
                          <ul>
                            <li class="prev"><a href="{{ $products->previousPageUrl() }}">prev</a></li>
                            <li class="next"><a href="{{ $products->nextPageUrl() }}">next</a></li>
                        </ul>
                          @endif
                         </div>
                     </div>
                     <!--shop toolbar end-->
                     <!--shop wrapper end-->
                 </div>
             </div>
         </div>
         <!--shop  area end-->
         
         <!--brand area start-->
         <div class="brand_area">
            <div class="row">
                 <div class="col-12">
                     <div class="section_title">
                         <h2>Brand</h2>
                     </div>   
                 </div>
             </div>
             <div class="row">
                 <div class="col-12">
                     <div class="brand_container owl-carousel ">
                         <div class="single_brand">
                             <a href="#"><img src="{{ asset('frontend_assets/img/brand/brand1.jpg') }}" alt=""></a>
                         </div>
                         <div class="single_brand">
                             <a href="#"><img src="{{ asset('frontend_assets/img/brand/brand2.jpg') }}" alt=""></a>
                         </div>
                         <div class="single_brand">
                             <a href="#"><img src="{{ asset('frontend_assets/img/brand/brand3.jpg') }}" alt=""></a>
                         </div>
                         <div class="single_brand">
                             <a href="#"><img src="{{ asset('frontend_assets/img/brand/brand4.jpg') }}" alt=""></a>
                         </div>
                         <div class="single_brand">
                             <a href="#"><img src="{{ asset('frontend_assets/img/brand/brand1.jpg') }}" alt=""></a>
                         </div>
                         <div class="single_brand">
                             <a href="#"><img src="{{ asset('frontend_assets/img/brand/brand2.jpg') }}" alt=""></a>
                         </div>
                         <div class="single_brand">
                             <a href="#"><img src="{{ asset('frontend_assets/img/brand/brand3.jpg') }}" alt=""></a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!--brand area end-->
    </div>
</div>
<!--section bg area end-->
@foreach ($products as $product)
<div class="modal fade" id="modal_box{{ $product->id }}" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true"><i class="fas fa-times"></i></span>
         </button>
         <div class="modal_body">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-5 col-md-5 col-sm-12">
                         <div class="modal_tab">
                             <div class="tab-content product-details-large">
                                 <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                     <div class="modal_tab_img">
                                         <a href="#"><img src="{{ asset('uploads/products') }}/{{ $product->thumbnail_image }}" alt=""></a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-7 col-md-7 col-sm-12">
                         <div class="modal_right">
                             <div class="modal_title mb-10">
                                 <h2>{{ ucfirst($product->name) }}</h2>
                             </div>
                             <div class="modal_price mb-10">
                                @if($product->discount_price)
                                <span class="new_price">BDT @convert($product->discount_price)</span>
                                <span class="old_price">BDT @convert($product->price)</span>
                                @else 
                                <span class="new_price">BDT @convert($product->price)</span>
                                @endif
                             </div>
                             <div class="modal_description mb-15">
                                {!! $product->short_desc !!}
                             </div>
                             <div class="variants_selects">
                                 <div class="variants_size">
                                     <h2>size</h2>
                                     <select class="select_option">
                                         @if($product->hasSizes->size != "")
                                         @foreach(explode(' ', $product->hasSizes->size) as $info) 
                                         <option value="{{ $info }}">{{ ucfirst($info) }}</option>
                                         @endforeach
                                         @endif
                                     </select>
                                 </div>
                                 <div class="variants_color">
                                     <h2>color</h2>
                                     <select class="select_option">
                                         @if($product->hasColors->colors != "")
                                         @foreach(explode(',', $product->hasColors->colors) as $info) 
                                         <option value="{{ $info }}">{{ ucfirst($info) }}</option>
                                         @endforeach
                                         @endif
                                     </select>
                                 </div>
                                 <div class="modal_add_to_cart">
                                        <form method="POST" action="{{ route('cart.store') }}">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input min="1" max="100" value="1" type="number" name="cart_amount">
                                            <button type="submit">add to cart</button>
                                        </form>
                                 </div>
                             </div>
                             <div class="modal_social">
                                 <h2>Share this product</h2>
                                  <ul>
                                     <li class="facebook"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                     <li class="twitter"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                     <li class="pinterest"><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                     <li class="google-plus"><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                     <li class="linkedin"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                 </ul> 
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>
@endforeach
@endsection
   