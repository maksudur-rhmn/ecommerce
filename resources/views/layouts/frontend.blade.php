
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Darcheni-Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('frontend_assets/img/Darcheni.png') }}">

    <!-- CSS 
    ========================= -->
    <!--bootstrap min css-->
    
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/bootstrap.min.css') }}">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/owl.carousel.min.css') }}">
    <!--slick min css-->
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/slick.css') }}">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/magnific-popup.css') }}">
    <!--font awesome css-->
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/all.min.css') }}">
    <!--ionicons css-->
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/ionicons.min.css') }}">
    <!--7 stroke icons css-->
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/pe-icon-7-stroke.css') }}">
    <!--animate css-->
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/animate.css') }}">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/jquery-ui.min.css') }}">
    <!--plugins css-->
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/plugins.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/style.css') }}">

    <!--modernizr min js here-->
    <script src="{{ asset('frontend_assets/js/vendor/modernizr-3.7.1.min.js') }}"></script>
</head>

<body>

    <!--header area start-->

    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">
    </div>
    <div class="offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="fas fa-times"></i></a>
                        </div>
                        <div class="header_search_box">
                            <form action="#">
                                <input placeholder="Search" type="text">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>

                            </form>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="{{ route('frontend.index') }}}}">Home</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Shop</a>
                                    <ul class="sub-menu">
                                        @foreach (categories() as $category)
                                        <li class="menu-item-has-children">
                                            <a href="{{ route('frontend.products', $category->name) }}">{{ $category->name }}</a>
                                            <ul class="sub-menu">
                                                @foreach ($category->hasSubCategory as $subcategory)    
                                                  <li><a href="">{{ $subcategory->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog.html">blog</a></li>
                                        <li><a href="blog-details.html">blog details</a></li>
                                        <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                        <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                    </ul>

                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">pages </a>
                                    <ul class="sub-menu">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="services.html">services</a></li>
                                        <li><a href="faq.html">Frequently Questions</a></li>
                                        <li><a href="contact.html">contact</a></li>
                                        <li><a href="login.html">login</a></li>
                                        <li><a href="404.html">Error 404</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="my-account.html">my account</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="about.html">about Us</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="contact.html"> Contact Us</a>
                                </li>
                            </ul>
                        </div>
                        <div class="offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--offcanvas menu area end-->

    <header>
        <div class="main_header">
            <div class="header_top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="header_contact_us">
                                <ul>
                                    <li><span><i class="fa fa-phone"></i> Call us now: </span> <a href="tel:(+800)123456789"><i class="icon-call-in"></i> (+800)123456789</a></li>
                                    <li><span><i class="fa fa-envelope-o"></i>Email: </span> <a href="mailto:http://1.envato.market/9LbxW"><i class="icon-envelope"></i> has@posthemes.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="header_account_area">
                                <ul>
                                    <li><a href="wishlist.html">My Wishlist</a></li>
                                    <li><a href="checkout.html">check out</a></li>
                                    <li><a href="login.html">Sign in</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-4 col-3 col_canvas">
                            <div class="canvas_open">
                                <a href="javascript:void(0)"><i class="ion-navicon-round"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-5">
                            <div class="logo">
                                
                                <a href="{{ route('frontend.index') }}"><img src="{{ asset('frontend_assets/img/logo/logo.png') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col_search">
                            <div class="header_search_box">
                                <form action="#">
                                    <input placeholder="Search" type="text">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>

                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-5 col-4">
                            <div class="cart_wishlist_area">
                                <div class="header_wishlist">
                                    <a href="wishlist.html"><i class="far fa-heart" aria-hidden="true"></i>
                                        <span class="item_count">3</span>
                                    </a>
                                </div>
                                <div class="mini_cart_wrapper">
                                    <a href="javascript:void(0)"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span class="cartitems"> Cart Items</span>
                                        <span class="item_count">{{ cartCount() }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_bottom sticky-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10">
                            <!--main menu start-->
                            <div class="main_menu menu_position">
                                <nav>
                                    <ul>
                                        <li><a class="active" href="{{ route('frontend.index') }}">home</a></li>
                                        <li class="mega_items"><a href="">shop<i class="fa fa-angle-down"></i></a>
                                            <div class="mega_menu">
                                                <ul class="mega_menu_inner">
                                                  @foreach (categories() as $category)
                                                  <li><a href="{{ route('frontend.products', $category->name) }}">{{ ucfirst($category->name) }}</a>
                                                        <ul>
                                                            @foreach ($category->hasSubCategory as $subcategory)
                                                            <li><a href="shop-fullwidth.html">{{ ucfirst($subcategory->name) }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                 </li>
                                                  @endforeach
                                                </ul>
                                                <div class="mega_menu_banner">
                                                    @foreach (categories() as $category)
                                                    <div class="banner_menu_thumb">
                                                        <a href="{{ route('frontend.products', $category->name) }}"><img src="{{ asset('uploads/categories') }}/{{ $category->image }}" alt=""style="width:200px; height:96px;"></a>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </li>
                                        <li><a href="blog.html">blog<i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="blog-details.html">blog details</a></li>
                                                <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                                <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html"> Contact Us</a></li>
                                        <li><a href="about.html"> About us</a></li>
                                        <li><a href="#">pages <i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="about.html">About Us</a></li>
                                                <li><a href="services.html">services</a></li>
                                                <li><a href="faq.html">Frequently Questions</a></li>
                                                <li><a href="contact.html">contact</a></li>
                                                <li><a href="login.html">login</a></li>
                                                <li><a href="404.html">Error 404</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!--main menu end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--mini cart-->
        <div class="mini_cart">
            <div class="cart_gallery">
                <div class="cart_close">
                    <div class="cart_text">
                        <h3>cart</h3>
                    </div>
                    <div class="mini_cart_close">
                        <a href="javascript:void(0)"><i class="fas fa-times"></i></a>
                    </div>
                </div>
                @foreach (cartItems() as $item)
                <div class="cart_item">
                    <div class="cart_img">
                        <a href="{{ route('frontend.productDetails', $item->get_product->slug) }}"><img src="{{ asset('uploads/products') }}/{{ $item->get_product->thumbnail_image }}" alt=""></a>
                    </div>
                    <div class="cart_info">
                        <a href="{{ route('frontend.productDetails', $item->get_product->slug) }}">{{ $item->get_product->name }}</a>
                        <p>{{ $item->cart_amount }} x <span> 
                            @if($item->get_product->discount_price)
                             BDT @convert($item->get_product->discount_price)
                            @else 
                             BDT @convert($item->get_product->price)
                            @endif
                        </span></p>
                    </div>
                    <div class="cart_remove">
                        <a href="{{ route('cart.delete', $item->id) }}"><i class="ion-ios-close-outline"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mini_cart_table">
                <div class="cart_table_border">
                    <div class="cart_total">
                        <span>Sub total:</span>
                        <span class="price">BDT @convert(cartTotal())</span>
                    </div>
                    <div class="cart_total mt-10">
                        <span>total:</span>
                        <span class="price">BDT @convert(cartTotal())</span>
                    </div>
                </div>
            </div>
            <div class="mini_cart_footer">
                <div class="cart_button">
                    <a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i> View cart</a>
                </div>
                <div class="cart_button">
                    <a class="active" href="{{ route('checkout.index') }}"><i class="fa fa-sign-in"></i> Checkout</a>
                </div>

            </div>
        </div>
        <!--mini cart end-->
    </header>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @yield('content')

     <!--footer area start-->
     <footer class="footer_widgets">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer_list">
                            <div class="footer_list_title">
                                <h3>about us</h3>
                            </div>
                            <div class="footer_logo">
                                <a href="{{ route('frontend.index') }}"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                            <div class="footer_desc">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitse do eiusmod tempor incididunt ut labore et dolore.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer_list">
                            <div class="footer_list_title">
                                <h3>THEME FEATURES</h3>
                            </div>
                            <div class="footer_list_menu">
                                <ul>
                                    <li><a href="#">theme features</a></li>
                                    <li><a href="#">Our Other Projects</a></li>
                                    <li><a href="#">Typography</a></li>
                                    <li><a href="#">One Click To Join Us</a></li>
                                    <li><a href="#">Follow Us On Twitter</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer_list">
                            <div class="footer_list_title">
                                <h3>KEY FEATURES</h3>
                            </div>
                            <div class="footer_contact">
                                <div class="footer_contact_list">
                                    <div class="footer_contact_icon">
                                        <span>1</span>
                                    </div>
                                    <div class="footer_contact_text">
                                        <p>Choose your wishlist products then add to cart.</p>
                                    </div>
                                </div>
                                <div class="footer_contact_list">
                                    <div class="footer_contact_icon">
                                        <span>2</span>
                                    </div>
                                    <div class="footer_contact_text">
                                        <p>Call us for more info about our products.</p>
                                    </div>
                                </div>
                                <div class="footer_contact_list">
                                    <div class="footer_contact_icon">
                                        <span>3</span>
                                    </div>
                                    <div class="footer_contact_text">
                                        <p>Pay by creadit card.</p>
                                    </div>
                                </div>
                                <div class="footer_contact_list">
                                    <div class="footer_contact_icon">
                                        <span>4</span>
                                    </div>
                                    <div class="footer_contact_text">
                                        <p>We will send this product in 2 days.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer_list">
                            <div class="footer_list_title">
                                <h3>contact us</h3>
                            </div>
                            <div class="footer_contact">
                                <div class="footer_contact_list">
                                    <div class="footer_contact_icon">
                                        <span><i class="fa fa-phone"></i></span>
                                    </div>
                                    <div class="footer_contact_text">
                                        <p>Call Us <a href="tel:+001666951">+001 666 951</a></p>
                                        <p>Fax <a href="tel:+001678987"> +001 678 987</a></p>
                                    </div>
                                </div>
                                <div class="footer_contact_list">
                                    <div class="footer_contact_icon">
                                        <span><i class="fa fa-mobile"></i></span>
                                    </div>
                                    <div class="footer_contact_text">
                                        <p><a href="tel:+771231234">+77 123 1234</a></p>
                                        <p><a href="tel:+42989876"> +42 98 9876</a></p>
                                    </div>
                                </div>
                                <div class="footer_contact_list">
                                    <div class="footer_contact_icon">
                                        <span><i class="fa fa-envelope"></i></span>
                                    </div>
                                    <div class="footer_contact_text">
                                        <p><a href="mailto:http://1.envato.market/9LbxW">has@posthemes.com</a></p>
                                        <p><a href="mailto:http://1.envato.market/9LbxW">has@posthemes.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_social_newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-4">
                        <div class="footer_social">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-8">
                        <div class="newsletter_area">
                            <div class="newsletter_text">
                                <h2>Newsletter</h2>
                            </div>
                            <div class="subscribe_form">
                                <form id="mc-form" class="mc-form footer-newsletter">
                                    <input id="mc-email" type="email" autocomplete="off" placeholder="Enter your e-mail" />
                                    <button id="mc-submit">Subscribe</button>
                                </form>
                                <!-- mailchimp-alerts Start -->
                                <div class="mailchimp-alerts text-centre">
                                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                    <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                    <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                </div><!-- mailchimp-alerts end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="footer_middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer_list">
                            <div class="footer_list_title">
                                <h3>Categories</h3>
                            </div>
                            <div class="footer_list_menu">
                                <ul>
                                    <li><a href="#">T-Shirts & Top</a></li>
                                    <li><a href="#">Dress & Skirt</a></li>
                                    <li><a href="#">Denim</a></li>
                                    <li><a href="#">Menwear</a></li>
                                    <li><a href="#">Accessories</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer_list">
                            <div class="footer_list_title">
                                <h3>Information</h3>
                            </div>
                            <div class="footer_list_menu">
                                <ul>
                                    <li><a href="#">Specials</a></li>
                                    <li><a href="#">New products</a></li>
                                    <li><a href="#">Best sellers</a></li>
                                    <li><a href="#">Our stores</a></li>
                                    <li><a href="contact.html">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer_list">
                            <div class="footer_list_title">
                                <h3>My account</h3>
                            </div>
                            <div class="footer_list_menu">
                                <ul>
                                    <li><a href="#">My orders</a></li>
                                    <li><a href="#">My credit slips</a></li>
                                    <li><a href="#">My addresses</a></li>
                                    <li><a href="#">My personal info</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer_list">
                            <div class="footer_list_title">
                                <h3>Extra</h3>
                            </div>
                            <div class="footer_list_menu">
                                <ul>
                                    <li><a href="#"> Specials </a></li>
                                    <li><a href="#"> New products </a></li>
                                    <li><a href="#">Best sellers</a></li>
                                    <li><a href="#">Our stores</a></li>
                                    <li><a href="contact.html"> Site Map </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-7">
                        <div class="copyright_area">
                            <p>Copyright © 2020 <a href="{{ route('frontend.index') }}">Classico</a>. <a href="https://hasthemes.com/" target="_blank">All rights reserved.</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="footer_paypal text-right">
                            <a href="#"><img src="assets/img/icon/payment.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end-->


    <!--news letter popup start-->
    {{-- <div class="newletter-popup">
        <div id="boxes" class="newletter-container">
            <div id="dialog" class="window">
                <div id="popup2">
                    <span class="b-close"><span>close</span></span>
                </div>
                <div class="box">
                    <div class="newletter-title">
                        <h2>Newsletter</h2>
                    </div>
                    <div class="box-content newleter-content">
                        <label class="newletter-label">Enter your email address to subscribe our notification of our new post &amp; features by email.</label>
                        <div id="frm_subscribe">
                            <form name="subscribe" id="subscribe_popup">
                                <!-- <span class="required">*</span><span>Enter you email address here...</span>-->
                                <input type="text" value="" name="subscribe_pemail" id="subscribe_pemail" placeholder="Enter you email address here...">
                                <input type="hidden" value="" name="subscribe_pname" id="subscribe_pname">
                                <div id="notification"></div>
                                <a class="theme-btn-outlined" onclick="email_subscribepopup()"><span>Subscribe</span></a>
                            </form>
                            <div class="subscribe-bottom">
                                <input type="checkbox" id="newsletter_popup_dont_show_again">
                                <label for="newsletter_popup_dont_show_again">Don't show this popup again</label>
                            </div>
                        </div>
                        <!-- /#frm_subscribe -->
                    </div>
                    <!-- /.box-content -->
                </div>
            </div>

        </div>
        <!-- /.box -->
    </div> --}}
    <!--news letter popup start-->



    <!-- JS
============================================ -->
    <!--jquery min js-->
    <script src="{{ asset('frontend_assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!--popper min js-->
    <script src="{{ asset('frontend_assets/js/popper.min.js') }}"></script>
    <!--bootstrap min js-->
    <script src="{{ asset('frontend_assets/js/bootstrap.min.js') }}"></script>
    <!--owl carousel min js-->
    <script src="{{ asset('frontend_assets/js/owl.carousel.min.js') }}"></script>
    <!--slick min js-->
    <script src="{{ asset('frontend_assets/js/slick.min.js') }}"></script>
    <!--magnific popup min js-->
    <script src="{{ asset('frontend_assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!--jquery countdown min js-->
    <script src="{{ asset('frontend_assets/js/jquery.countdown.js') }}"></script>
    <!--jquery ui min js-->
    <script src="{{ asset('frontend_assets/js/jquery.ui.js') }}"></script>
    <!--jquery elevatezoom min js-->
    <script src="{{ asset('frontend_assets/js/jquery.elevatezoom.js') }}"></script>
    <!--isotope packaged min js-->
    <script src="{{ asset('frontend_assets/js/isotope.pkgd.min.js') }}"></script>
    <!-- Plugins JS -->
    <script src="{{ asset('frontend_assets/js/plugins.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('frontend_assets/js/main.js') }}"></script>

    @yield('custom-js')
</body>

</html>


