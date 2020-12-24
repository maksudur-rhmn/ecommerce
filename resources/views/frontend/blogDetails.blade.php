@extends('layouts.frontend')

@section('content')
 <!--breadcrumbs area start-->
 <div class="breadcrumbs_area breadcrumbs_bg">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>Praesent imperdiet</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>
<!--breadcrumbs area end-->

<!--blog body area start-->
<div class="blog_details">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <!--blog grid area start-->
                <div class="blog_wrapper blog_wrapper_details">
                    <article class="single_blog">
                        <figure>
                           <div class="post_header">
                               <h3 class="post_title">{{ $blog->title }}</h3>
                                <div class="blog_meta">   
                                   <p>Posted by : <a href="javascript : void(0)">{{ ucfirst($blog->written_by) }}</a> / On : <a href="#">{{ $blog->created_at->format('d M,Y') }}</a> </p>
                                </div>
                            </div>
                            <div class="blog_d_thumb">
                               <img class="w-100" src="{{ asset('uploads/blogs') }}/{{ $blog->image }}" alt="not found">
                           </div>
                           <figcaption class="blog_content">
                                <div class="post_content">
                                    <p>
                                        {{ ucfirst($blog->description_one) }}
                                    </p>
                                    <blockquote>
                                        <p> {{ ucfirst($blog->quotation) }} </p>
                                    </blockquote>
                                    <p>{{ $blog->description_two }}</p>
                                    <p>{{ $blog->description_three }}</p>
                                </div>
                           </figcaption>
                        </figure>
                    </article>
                    <div class="related_posts">
                       <h3>Related posts</h3>
                        <div class="row">
                            @forelse ($blogs->take(3) as $item)
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <article class="single_related">
                                    <figure>
                                        <div class="related_thumb">
                                            <a href="{{ route('frontend.blogDetails', $item->id) }}"><img width="370" height="200" src="{{ asset('uploads/blogs') }}/{{ $item->image }}" alt="not found"></a>
                                        </div>
                                        <figcaption class="related_content">
                                           <h4><a href="{{ route('frontend.blogDetails', $item->id) }}">{{ $item->title }}</a></h4>
                                           <div class="blog_meta">                                        
                                                <span class="author">By : <a href="javascript : void(0)">{{ ucfirst($item->written_by) }}</a> / </span>
                                                <span class="meta_date"> {{ $item->created_at->format('d M,Y') }}	</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            @empty
                                <p>
                                    No data available.
                                </p>
                            @endforelse
                        </div>
                   </div> 
                   <div id="disqus_thread"></div>
                   <script>
                       /**
                       *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                       *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                      
                       var disqus_config = function () {
                       this.page.url = {{ config('app.url') }}/blogs{{ $blog->id }}/details;  // Replace PAGE_URL with your page's canonical URL variable
                       this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                       };
                       
                       (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://http-127-0-0-1-8000-ortq4cdcaw.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                        })();
                   </script>
                   <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                </div>
                <!--blog grid area start-->
            </div>
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
        </div>
    </div>
</div>
<!--blog section area end-->
@endsection

@section('custom-js')
<script id="dsq-count-scr" src="//http-127-0-0-1-8000-ortq4cdcaw.disqus.com/count.js" async></script>
@endsection
   