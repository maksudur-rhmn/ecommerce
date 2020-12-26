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
						<h1>{{ $about->title }}</h1>
						<h3>{{ $about->sub_title }}</h3>
						<p>{{ $about->description }}</p>
					</div>
                </div>  
                <div class="col-lg-6">
                	<div class="about_thumb">
						<img src="{{ asset('uploads/about') }}/{{ $about->image }}" alt="">
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
                            <h3>Fast Delivery</h3>

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
                                    <img src="{{ asset('uploads/about') }}/{{ $about->bottom_title_image_one }}" alt="">
                                </div>
                                <figcaption class="about_gallery_content">
                                   <h3>{{ $about->bottom_title_one }}</h3>
                                   <p>{{ $about->bottom_title_description_one }}</p>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <article class="single_gallery_section">
                            <figure>
                                <div class="gallery_thumb">
                                    <img src="{{ asset('uploads/about') }}/{{ $about->bottom_title_image_two }}" alt="">
                                </div>
                                <figcaption class="about_gallery_content">
                                   <h3>{{ $about->bottom_title_two }}</h3>
                                   <p>{{ $about->bottom_title_description_two }}</p>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <article class="single_gallery_section col__3">
                            <figure>
                                <div class="gallery_thumb">
                                    <img src="{{ asset('uploads/about') }}/{{ $about->bottom_title_image_three }}" alt="">
                                </div>
                                <figcaption class="about_gallery_content">
                                   <h3>{{ $about->bottom_title_three }}</h3>
                                   <p>{{ $about->bottom_title_description_three }}</p>
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