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
                                 <h3>Women</h3>
                                 <ul>
                                     <li class="widget_sub_categories sub_categories1"><a href="javascript:void(0)">Shoes</a>
                                         <ul class="widget_dropdown_categories dropdown_categories1">
                                             <li><a href="#">Document</a></li>
                                             <li><a href="#">Dropcap</a></li>
                                             <li><a href="#">Dummy Image</a></li>
                                             <li><a href="#">Dummy Text</a></li>
                                             <li><a href="#">Fancy Text</a></li>
                                         </ul>
                                     </li>
                                     <li class="widget_sub_categories sub_categories2"><a href="javascript:void(0)">Bags</a>
                                         <ul class="widget_dropdown_categories dropdown_categories2">
                                             <li><a href="#">Flickr</a></li>
                                             <li><a href="#">Flip Box</a></li>
                                             <li><a href="#">Cocktail</a></li>
                                             <li><a href="#">Frame</a></li>
                                             <li><a href="#">Flickrq</a></li>
                                         </ul>
                                     </li>
                                     <li class="widget_sub_categories sub_categories3"><a href="javascript:void(0)">Clothing</a>
                                         <ul class="widget_dropdown_categories dropdown_categories3">
                                             <li><a href="#">Platform Beds</a></li>
                                             <li><a href="#">Storage Beds</a></li>
                                             <li><a href="#">Regular Beds</a></li>
                                             <li><a href="#">Sleigh Beds</a></li>
                                             <li><a href="#">Laundry</a></li>
                                         </ul>
                                     </li>
                                 </ul>
                             </div>
                             <div class="widget_list widget_filter">
                                 <h3>Filter by price</h3>
                                 <form action="#"> 
                                     <div id="slider-range"></div>   
                                     <button type="submit">Filter</button>
                                     <input type="text" name="text" id="amount" />   
                                 </form> 
                             </div>
                             <div class="widget_list widget_color">
                                 <h3>Select By Color</h3>
                                 <ul>
                                     <li>
                                         <a href="#">Black  <span>(6)</span></a> 
                                     </li>
                                     <li>
                                         <a href="#">White  <span>(4)</span></a> 
                                     </li>
                                     <li>
                                         <a href="#"> Blue <span>(8)</span></a> 
                                     </li>
                                     <li>
                                         <a href="#"> Green <span>(6)</span></a> 
                                     </li>

                                 </ul>
                             </div>
                             <div class="widget_list widget_color">
                                 <h3>Select By SIze</h3>
                                 <ul>
                                     <li>
                                         <a href="#">S  <span>(6)</span></a> 
                                     </li>
                                     <li>
                                         <a href="#"> M <span>(8)</span></a> 
                                     </li>
                                     <li>
                                         <a href="#">L <span>(10)</span></a> 
                                     </li>
                                     <li>
                                         <a href="#"> XL <span>(6)</span></a> 
                                     </li>

                                 </ul>
                             </div>
                              <div class="widget_list widget_brand">
                                 <h3>Brand</h3>
                                 <ul>
                                     <li>
                                         <a href="#">Studio Design <span>(8)</span></a> 
                                     </li>
                                     <li>
                                         <a href="#"> Graphic Corner<span>(5)</span></a> 
                                     </li>
                                 </ul>
                             </div>
                             <div class="widget_list widget_manu">
                                 <h3>Manufacturer</h3>
                                 <ul>
                                     <li>
                                         <a href="#">Cotton <span>(6)</span></a> 
                                     </li>
                                     <li>
                                         <a href="#">Elastane <span>(10)</span></a> 
                                     </li>
                                     <li>
                                         <a href="#">Polyester <span>(4)</span></a> 
                                     </li>
                                     <li>
                                         <a href="#">Wool <span>(10)</span></a> 
                                     </li>
                                     <li>
                                         <a href="#">Squarred <span>(3)</span></a> 
                                     </li>

                                 </ul>
                             </div>
                             <div class="widget_list tags_widget">
                                 <h3>Product tags</h3>
                                 <div class="tag_cloud">
                                     <a href="#">Men</a>
                                     <a href="#">Women</a>
                                     <a href="#">Watches</a>
                                     <a href="#">Bags</a>
                                     <a href="#">Dress</a>
                                 </div>
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
                         {{-- <div class=" niceselect_option">
                                 <div class="select_option">
                                    <select name="orderby" onchange="window.location.href=this.value">
                                        <option value="">Filter products</option>
                                        <option value="https://google.com">Sort by price: low to high</option>
                                        <option value="5">Sort by price: high to low</option>
                                        <option value="6">Product Name: Z</option>
                                    </select>

                                 </div>
                         </div> --}}
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
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
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
                                            <a href="cart.html" title="Add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
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
                                     <form action="#">
                                         <input min="1" max="100" step="2" value="1" type="number">
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
   