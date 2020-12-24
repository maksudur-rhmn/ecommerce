@extends('layouts.frontend')

@section('content')
    
    <!--header area end-->
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area breadcrumbs_bg">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>home</h3>
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">home</a></li>
                            <li>home</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--slider area start-->
    <section class="slider_section slider_six">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="slider_area owl-carousel">
                        <div class="single_slider d-flex align-items-center" data-bgimg="{{ asset('frontend_assets/img/slider/slider11.png') }}">
                            <div class="slider_content slider_c_six">
                                <h2>Wall hanging</h2>
                                <h1>Open sealf </h1>
                                <a href="shop.html">shop now</a>
                            </div>
                        </div>
                        <div class="single_slider d-flex align-items-center" data-bgimg="{{ asset('frontend_assets/img/slider/slider12.jpg') }}">
                            <div class="slider_content slider_c_six">
                                <h2>thin prescription glasses</h2>
                                <h1>MEN,S LEOPARD</h1>
                                <a href="shop.html">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="banner_sidebar">
                        <div class="single_banner">
                            <div class="banner_thumb">
                                <a href="shop.html"><img src="{{ asset('frontend_assets/img/bg/banner5.png') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="single_banner">
                            <div class="banner_thumb">
                                <a href="shop.html"><img src="{{ asset('frontend_assets/img/bg/banner6.png') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider area end-->
    <div class="home_bg_area">
        <!--product area start-->
        <div class="product_area">
            <div class="container">
                <div class="row">
        <!--latest product star-->
                    <div class="col-lg-4">
                        <img class="beautify" src="{{ asset('frontend_assets/img/beautify/alwas%20important-01.png') }}" alt="">
                        <div class="latest_product">
                            <h2>Our latest Product</h2>
                            <ul>
                                <li>
                                    <P>Shop the</P>
                                    <p>latest</p>
                                </li>
                                <li><a href="{{ route('frontend.productsAll') }}"><i class="fas fa-long-arrow-alt-right"></i></a></li>
                            </ul>
                        </div>
                        <img class="beautify_1" src="{{ asset('frontend_assets/img/beautify/beautify-2-01.png') }}" alt="">
                    </div>
        <!--latest product end-->                   
                    <div class="col-lg-8">
                        <div class="product_wrapper bottom">
                            <div class="section_title">
                                <h2>HOT ITEMS</h2>
                            </div>
                            <div class="row">
                                <div class="product_carousel product_column3 owl-carousel">
                                    @foreach ($products->take(5) as $product)
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
                                                            <li class="wishlist">
                                                                <form action="{{ route('wishlist.store') }}" method="POST">
                                                                    @csrf 
                                                                        <input type="hidden" name="product_id" value="{{ $product->id }}"> 
                                                                        <a href="{{ route('wishlist.store') }}"onclick="event.preventDefault();
                                                                        this.closest('form').submit();"><i class="far fa-heart" aria-hidden="true"></i></a>
                                                                    </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="{{ route('frontend.productDetails', $product->slug) }}">{{ ucfirst($product->name) }}</a></h4>
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
                                                        <form action="{{ route('cart.store') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                            <input type="hidden" name="cart_amount" value="1">
                                                            <a href="{{ route('cart.store') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();">Add To Cart</a>
                                                    </div>
                                                </form>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--product area end-->
        <!--product area start-->
        <div class="product_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_tab_btn">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#arrival" role="tab" aria-controls="arrival" aria-selected="true">
                                        New Arrival
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#bestseller" role="tab" aria-controls="bestseller" aria-selected="false">
                                        Bestseller
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="false">
                                        Featured Products
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="product_container">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="arrival" role="tabpanel">
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
                                                            <li class="wishlist">
                                                                <form action="{{ route('wishlist.store') }}" method="POST">
                                                                    @csrf 
                                                                        <input type="hidden" name="product_id" value="{{ $product->id }}"> 
                                                                        <a href="{{ route('wishlist.store') }}"onclick="event.preventDefault();
                                                                        this.closest('form').submit();"><i class="far fa-heart" aria-hidden="true"></i></a>
                                                                    </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="{{ route('frontend.productDetails', $product->slug) }}">{{ ucfirst($product->name) }}</a></h4>
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
                                                            <a href="{{ route('cart.store') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();">Add To Cart</a>
                                                            </form>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="bestseller" role="tabpanel">
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
                                                            <li class="wishlist">
                                                                <form action="{{ route('wishlist.store') }}" method="POST">
                                                                    @csrf 
                                                                        <input type="hidden" name="product_id" value="{{ $product->id }}"> 
                                                                        <a href="{{ route('wishlist.store') }}"onclick="event.preventDefault();
                                                                        this.closest('form').submit();"><i class="far fa-heart" aria-hidden="true"></i></a>
                                                                    </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="{{ route('frontend.productDetails', $product->slug) }}">{{ ucfirst($product->name) }}</a></h4>
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
                                                        <a href="{{ route('cart.store') }}" onclick="event.preventDefault();
                                                          this.closest('form').submit();">Add To Cart</a>
                                                        </form>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="featured" role="tabpanel">
                            <div class="row">
                                <div class="product_carousel product_column5 owl-carousel">
                                    @forelse ($products as $product)
                                    @if($product->featured == 'yes')
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
                                                            <li class="wishlist">
                                                                <form action="{{ route('wishlist.store') }}" method="POST">
                                                                    @csrf 
                                                                        <input type="hidden" name="product_id" value="{{ $product->id }}"> 
                                                                    <a href="{{ route('wishlist.store') }}"onclick="event.preventDefault();
                                                                    this.closest('form').submit();"><i class="far fa-heart" aria-hidden="true"></i></a>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name"><a href="{{ route('frontend.productDetails', $product->slug) }}">{{ ucfirst($product->name) }}</a></h4>
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
                                                            <a href="{{ route('cart.store') }}" onclick="event.preventDefault();
                                                                  this.closest('form').submit();">Add To Cart</a>
                                                        </form>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                    @endif
                                    @empty
                                    <strong>No Featured Product</strong>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--product area end-->
         <!--category started-->
        <div class="Category">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="our_collections">
                                    <img class="img_top" src="{{ asset('frontend_assets/img/beautify/alwas%20important-01.png') }}" alt="">
                                    <h2>Shop our collections</h2>
                                    <ul>
                                        <li>
                                            <p>Shop All</p>
                                            <p>Categories</p>
                                        </li>
                                        <li><a href="{{ route('frontend.productsAll') }}"><i class="fas fa-long-arrow-alt-right"></i></a></li>
                                    </ul>
                                    <img class="img_bottom" src="{{ asset('frontend_assets/img/beautify/beautify-2-01.png') }}" alt="">
                                </div>
                            </div>
                            @foreach (categories() as $category)
                            <div class="col-lg-3">
                                <div class="card">
                                    <a href="{{ route('frontend.products', $category->name) }}">
                                        <img src="{{ asset('uploads/categories') }}/{{ $category->image }}" alt="">
                                   </a>
                                   <div class="band">
                                        <h3>{{ ucfirst($category->name) }}</h3>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- category end-->

        <!--product are start-->
        <div class="product_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2>Mens</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product_carousel product_column5 owl-carousel">
                        @foreach ($products as $product)
                         @if($product->belongTo->hasCategory->name == 'men')
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
                                                <li class="wishlist">
                                                    <form action="{{ route('wishlist.store') }}" method="POST">
                                                    @csrf 
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}"> 
                                                        <a href="{{ route('wishlist.store') }}"onclick="event.preventDefault();
                                                        this.closest('form').submit();"><i class="far fa-heart" aria-hidden="true"></i></a>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name"><a href="{{ route('frontend.productDetails', $product->slug) }}">{{ ucfirst($product->name) }}</a></h4>
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
                                                <a href="{{ route('cart.store') }}" onclick="event.preventDefault();
                                                          this.closest('form').submit();">Add To Cart</a>
                                            </form>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                         @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!--product are end-->
       
        <!--blog area start-->
        <div class="blog_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2>Static Blogs</h2>
                        </div>
                    </div>
                </div>
                <div class="blog_container">
                    <div class="row">
                        <div class="blog_carousel blog_column3 owl-carousel">
                            @forelse ($blogs as $item)
                            <div class="col-lg-4">
                                <div class="single_blog">
                                    <div class="blog_thumb">
                                        <a href="{{ route('frontend.blogDetails', $item->id) }}"><img src="{{ asset('uploads/blogs') }}/{{ $item->image }}" alt="not found" width="370" height="200"></a>
                                    </div>
                                    <div class="blog_content">
                                        <h4><a href="{{ route('frontend.blogDetails', $item->id) }}">{{ ucfirst($item->title) }}</a></h4>
                                        <p>{{ ucfirst($item->sub_title) }}</p>
                                        <a href="{{ route('frontend.blogDetails', $item->id) }}">Read More</a>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <p>No data available</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--blog area end-->
        <!--banner area start-->
        <div class="banner_area b_box_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2>sample banners</h2>
                        </div>
                    </div>
                </div>
                <div class="banner_box_container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="banner_box box1">
                                <div class="banner_box_img">
                                    <img src="{{ asset('frontend_assets/img/about/box1.png') }}" alt="">
                                </div>
                                <div class="banner_box_text">
                                    <h2>fast delivery</h2>
                                    <p>24 hour parcel delivery</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="banner_box box2">
                                <div class="banner_box_img">
                                    <img src="{{ asset('frontend_assets/img/about/box2.png') }}" alt="">
                                </div>
                                <div class="banner_box_text">
                                    <h2>worldwide shipping</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="banner_box box3">
                                <div class="banner_box_img">
                                    <img src="{{ asset('frontend_assets/img/about/box3.png') }}" alt="">
                                </div>
                                <div class="banner_box_text">
                                    <h2>free money back</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--banner area end-->
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
   