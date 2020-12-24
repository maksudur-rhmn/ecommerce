@extends('layouts.frontend')

@section('content')
     <!--breadcrumbs area start-->
     <div class="breadcrumbs_area breadcrumbs_bg">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{ url('/') }}">home</a></li>
                            <li>blog sidebar</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--blog area start-->
    <div class="blog_page_section blog_reverse">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="blog_sidebar_widget">
                        <div class="widget_list widget_search">
                            <div class="widget_title">
                                <h3>Search</h3>
                            </div>
                            <form action="#">
                                <input placeholder="Search..." type="text">
                                <button type="submit">search</button>
                            </form>
                        </div>
                        <div class="widget_list widget_post">
                            <div class="widget_title">
                                <h3>Recent Posts</h3>
                            </div>
                            @foreach ($blogs as $item)
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="{{ route('frontend.blogDetails', $item->id) }}"><img src="{{ asset('uploads/blogs') }}/{{ $item->image }}" alt="not found" width="60" height="51"></a>
                                </div>
                                <div class="post_info">
                                    <h4><a href="{{ route('frontend.blogDetails', $item->id) }}">{{ $item->title }}</a></h4>
                                    <span>{{ $item->created_at->format('d M,Y') }} </span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="widget_list widget_categories">
                            <div class="widget_title">
                                <h3>Categories</h3>
                            </div>
                            <ul>
                                @foreach (categories() as $item)
                                 <li><a href="{{ route('frontend.products', $item->name) }}">{{ ucfirst($item->name) }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="blog_wrapper">
                        @forelse ($blogs as $item)
                        <div class="single_blog">
							<div class="blog_thumb">
								<a href="{{ route('frontend.blogDetails', $item->id) }}"><img src="{{ asset('uploads/blogs') }}/{{ $item->image }}" alt="not found" width="370" height="200"></a>
							</div>
							<div class="blog_content">
								<div class="post_date">
									<span>Posted by: <a href="javascript : void(0);">{{ ucfirst($item->written_by) }}</a> / On : <a href="#"> {{ $item->created_at->format('d M, Y') }} </a></span>
								</div>
							   <h5 class="post_title"><a href="{{ route('frontend.blogDetails', $item->id) }}">{{ ucfirst($item->sub_title) }} </a></h5>
							   <p> {{ Str::limit($item->description_one, 50) }} </p>
							   <footer class="blog_footer">
									<a href="{{ route('frontend.blogDetails', $item->id) }}">+ Read More</a>
								</footer>
							</div>
                        </div>
                        @empty
                        
                        <p>No data available</p>

                        @endforelse
                        
                    </div>
                    <!--blog pagination area start-->
                    <div class="blog_pagination">
                        <div class="pagination">
                            <ul>
                                @if($blogs->hasPages())
                                <li class="next"><a href="{{ $blogs->previousPageUrl() }}">prev</a></li>
                                <li class="next"><a href="{{ $blogs->nextPageUrl() }}">next</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!--blog pagination area end-->
                </div>  
                
            </div>
        </div>
    </div>
    <!--blog area end-->
@endsection