@extends('layouts.frontend')

@section('content')
     <!--breadcrumbs area start-->
     <div class="breadcrumbs_area breadcrumbs_bg">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>about</h3>
                        <ul>
                            <li><a href="{{ route('frontend.about') }}">home</a></li>
                            <li>about us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--about section area -->
    <section class="about_section"> 
       <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                	<div class="about_content">
						<h1>About Our Classico Store</h1>
						<h3>We believe that every project existing in digital world is a result of an idea and every idea has a cause.</h3>
						<p>For this reason, our each design serves an idea. Our strength in design is reflected by our name, our care for details. Our specialist won't be afraid to go extra miles just to approach near perfection. We don't require everything to be perfect, but we need them to be perfectly cared for. That's a reason why we are willing to give contributions at best. Not a single detail is missed out under Billey's professional eyes.The amount of dedication and effort equals to the level of passion and by.</p>
					</div>
                </div>  
                <div class="col-lg-6">
                	<div class="about_thumb">
						<img src="{{ asset('frontend_assets/img/about/about1.jpg') }}" alt="">
					</div>
                </div>
            </div>  
        </div> 
    </section>
    <!--about section end-->

    <!--chose us area start-->
    <div class="choseus_area" data-bgimg="{{ asset('frontend_assets/img/about/about-us-policy-bg.jpg') }}">
        <div class="container">   
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_chose">
                        <div class="chose_icone">
                            <img src="{{ asset('frontend_assets/img/about/About_icon1.png') }}" alt="">
                        </div>
                        <div class="chose_content">
                            <h3>Creative Design</h3>
                            <p>Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare velit amet</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_chose">
                        <div class="chose_icone">
                            <img src="{{ asset('frontend_assets/img/about/About_icon2.png') }}" alt="">
                        </div>
                        <div class="chose_content">
                            <h3>100% Money Back Guarantee</h3>
                            <p>Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare velit amet</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_chose chose3">
                        <div class="chose_icone">
                            <img src="{{ asset('frontend_assets/img/about/About_icon3.png') }}" alt="">
                        </div>
                        <div class="chose_content">
                            <h3>Online Support 24/7</h3>
                            <p>Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare velit amet</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>

    <!--chose us area end-->      

    <!--services img area-->
    <div class="about_gallery_section"> 
        <div class="container">
           <div class="about_gallery_container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <article class="single_gallery_section">
                            <figure>
                                <div class="gallery_thumb">
                                    <img src="{{ asset('frontend_assets/img/about/about2.jpg') }}" alt="">
                                </div>
                                <figcaption class="about_gallery_content">
                                   <h3>What do we do?</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto</p>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <article class="single_gallery_section">
                            <figure>
                                <div class="gallery_thumb">
                                    <img src="{{ asset('frontend_assets/img/about/about3.jpg') }}" alt="">
                                </div>
                                <figcaption class="about_gallery_content">
                                   <h3>Our Mission</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto</p>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <article class="single_gallery_section col__3">
                            <figure>
                                <div class="gallery_thumb">
                                    <img src="{{ asset('frontend_assets/img/about/about4.jpg') }}" alt="">
                                </div>
                                <figcaption class="about_gallery_content">
                                   <h3>History Of Us</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto</p>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                </div> 
            </div>
        </div>      
    </div>
    <!--services img end-->    
@endsection