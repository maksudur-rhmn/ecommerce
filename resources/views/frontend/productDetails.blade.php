@extends('layouts.frontend')

@section('content')
<div class="section_bg">
    <div class="container">
        <!--breadcrumbs area start-->
        <div class="breadcrumbs_area">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">home</a></li>
                            <li>{{ ucfirst($product->name) }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->

        <!--product details start-->
        <div class="product_details variable_product mb-60">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{ asset('uploads/products') }}/{{ $product->thumbnail_image }}" data-zoom-image="{{ asset('uploads/products') }}/{{ $product->thumbnail_image }}" alt="big-1">
                            </a>
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{ asset('uploads/products') }}/{{ $product->thumbnail_image }}" data-zoom-image="{{ asset('uploads/products') }}/{{ $product->thumbnail_image }}">
                                        <img src="{{ asset('uploads/products') }}/{{ $product->thumbnail_image }}" alt="zo-th-1" />
                                    </a>

                                </li>
                                @foreach ($product->hasImages as $image)
                                <li>
                                    
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{ asset('uploads/product_multiple_image') }}/{{ $image->image }}" data-zoom-image="{{ asset('uploads/product_multiple_image') }}/{{ $image->image }}">
                                        <img src="{{ asset('uploads/product_multiple_image') }}/{{ $image->image }}" alt="zo-th-1" />
                                    </a>

                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="product_d_right">
                            <div class="productd_title_nav">
                                <h1><a href="#">{{ $product->name }}</a></h1>
                            </div>

                            <div class=" product_ratting">
                                <ul>
                                    @if(average_stars($product->id) == 1)
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li class="review"><a href="#"> (customer review ) </a></li>
                                    @elseif(average_stars($product->id) == 2)
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li class="review"><a href="#"> (customer review ) </a></li>
                                    @elseif(average_stars($product->id) == 3)
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li class="review"><a href="#"> (customer review ) </a></li>
                                    @elseif(average_stars($product->id) == 4)
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li class="review"><a href="#"> (customer review ) </a></li>
                                    @elseif(average_stars($product->id) == 5)
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star"></i></a></li>
                                    <li class="review"><a href="#"> (customer review ) </a></li>
                                    @else 
                                    <p>No ratings yet.</p>
                                    @endif
                                </ul>
                            </div>
                            <div class="price_box">
                                @if($product->discount_price)
                                <span class="current_price">$@convert($product->discount_price) </span>
                                <span class="old_price">$@convert($product->price)</span>
                                @else
                                <span class="current_price">$@convert($product->price) </span>
                                @endif
                            </div>
                            <div class="product_desc">
                                {!! $product->short_desc !!}
                            </div>
                            <div class="product_variant color">
                                <h3>Available Options</h3>
                                <label>color</label>
                                <ul>
                                    @if($product->hasColors->colors != "")
                                    @foreach(explode(',', $product->hasColors->colors) as $info) 
                                    <li class="color1"><a style="background: {{ $info }}" href="#"></a></li>
                                    @endforeach
                                    @endif
                                    <li style="margin-left: 20px;">
                                        <select class="select_option">
                                            <option value="">Select one color</option>
                                            @if($product->hasColors->colors != "")
                                            @foreach(explode(',', $product->hasColors->colors) as $info) 
                                            <option value="{{ $info }}">{{ ucfirst($info) }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </li>
                                
                                </ul>
                            </div>

                            <div class="product_variant size">
                                <label>size</label>
                                <select class="select_option">
                                    @if($product->hasSizes->size != "")
                                    @foreach(explode(' ', $product->hasSizes->size) as $info) 
                                    <option value="{{ $info }}">{{ ucfirst($info) }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="product_variant quantity">
                                <form method="POST" action="{{ route('cart.store') }}">
                                    @csrf
                                <label>quantity</label>
                                <input min="1" max="100" value="1" type="number" name="cart_amount">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button class="button" type="submit">add to cart</button>
                                </form>
                            </div>
                            <div class=" product_d_action">
                                <ul>
                                    <li><a href="#" title="Add to wishlist">+ Add to Wishlist</a></li>
                                </ul>
                            </div>

                        <div class="product_d_meta">
                            <span>SKU: N/A</span>
                            <span>Category: <a href="{{ route('frontend.products', $product->belongTo->hasCategory->name) }}">{{ ucfirst($product->belongTo->hasCategory->name) }}</a></span>
                            
                        </div>
                        <div class="priduct_social">
                            <ul>
                                <li><a class="facebook" href="#" title="facebook"><i class="fab fa-facebook-f"></i> Like</a></li>
                                <li><a class="twitter" href="#" title="twitter"><i class="fab fa-twitter"></i> tweet</a></li>
                                <li><a class="pinterest" href="#" title="pinterest"><i class="fab fa-pinterest-p"></i> save</a></li>
                                <li><a class="google-plus" href="#" title="google +"><i class="fab fa-google-plus-g"></i> share</a></li>
                                <li><a class="linkedin" href="#" title="linkedin"><i class="fab fa-linkedin-in"></i> linked</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--product details end-->

        <!--product info start-->
        <div class="product_d_info mb-60">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Specification</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews ({{ \App\Models\Order_list::where('user_id', Auth::id())->where('product_id', $product->id)->whereNotNull('review')->get()->count() }})</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product_info_content">
                                   {!! $product->long_desc !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sheet" role="tabpanel">
                                <div class="product_d_table">
                                    <form action="#">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="first_child">Size</td>
                                                    <td>{{ strtoupper($product->hasSizes->size) }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Colors</td>
                                                    <td>
                                                        {{ strtoupper($product->hasColors->colors) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Category</td>
                                                    <td>{{ ucfirst($product->belongTo->hasCategory->name) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="product_info_content">
                                   {!! $product->short_desc !!}
                                   {!! $product->long_desc !!}
                                </div>
                            </div>

                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                <div class="reviews_wrapper">
                                    <h2>1 review for {{ ucfirst($product->name) }}</h2>
                                    <div class="reviews_comment_box">
                                        <div class="comment_text">
                                            @forelse(\App\Models\Order_list::where('product_id', $product->id)->whereNotNull('review')->get() as $review)
                                            <div class="reviews_meta">
                                                <div class="star_rating">
                                                    <ul>
                                                        @if($review->star == 1)
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        @elseif($review->star == 2)
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        @elseif($review->star == 3)
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        @elseif($review->star == 4)
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        @elseif($review->star == 5)
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <p><strong> {{ $review->getuser->name }} </strong>
                                                    - {{ $review->updated_at->format('d M , Y') }}</p>
                                                <span>{{ $review->review }}</span>
                                            </div>
                                            @empty 
                                            <p>This product has not yet been reviewed</p>
                                            @endforelse
                                        </div>

                                    </div>
                                    @guest
                                        Please <a href="{{ url('/login') }}"> <strong>Log in</strong> </a> to review this product
                                    @endguest
                                    @auth 
                                    @if(\App\Models\Order_list::where('user_id', Auth::id())->where('product_id', $product->id)->whereNull('review')->exists())
                                    <div class="comment_title">
                                        <h2>Add a review </h2>
                                        <p>Your email address will not be published. Required fields are marked </p>
                                    </div>
                                    
                                    <div class="form-group form-group__rating">
                                        <form action="{{ route('add.review') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <label>Your rating of this product</label>
                                        <select name="star" class="ps-rating" data-read-only="false" required>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="product_review_form">
                                        
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="review_comment">Your review </label>
                                                    <textarea name="review" id="review_comment" required></textarea>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="author">Name</label>
                                                    <input id="author" type="text" value="{{ Auth::user()->name }}">

                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="email">Email </label>
                                                    <input id="email" type="text" value="{{ Auth::user()->email }}">
                                                </div>
                                            </div>
                                            <button type="submit">Submit</button>
                                        </form>
                                    </div>
                                    @else
                                    <h5>Only Customers who bought the product can review the items. Or you may have already reviewed the item</h5>
                                    @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--product info end-->

        <!--product area start-->
        <section class="product_area related_products">
            <div class="row">
                <div class="col-12">
                    <div class="section_title psec_title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product_carousel product_column5 owl-carousel">
                    @foreach ($products as $product)
                    <div class="col-lg-3">
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
                                        <form method="POST" action="{{ route('cart.store') }}">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="cart_amount" value="1">
                                            <button style="
                                            line-height: 45px;
                                            height: 45px;
                                            display: inline-block;
                                            font-size: 13px;
                                            font-weight: 400;
                                            text-transform: uppercase;
                                            padding: 0 30px;
                                            width: 100%;
                                            background: #999999;
                                            color: #fff;" type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</button>
                                        </form>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--product area end-->
    </div>
</div>

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
   