@extends('layouts.dashboard')

@section('title')
Ecommerce - {{ $product->name }}
@endsection

@section('meta_content')
Ecommerce Demo with PHP Laravel version 8+
@endsection

@section('top_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous"></script>
@endsection

@section('products_menu_active')
mm-active
@endsection

@section('page-name')
Products > {{ $product->name }}
@endsection

@section('breadcrumb')
<div class="page-title-right">
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
        <li class="breadcrumb-item active">Products</li>
    </ol>
</div>
@endsection

@section('bottom_js')

<!-- parsleyjs -->
<script src="{{ asset('dashboard_assets/libs/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/js/pages/form-validation.init.js') }}"></script>
<!-- trix -->

<script>
    $(document).ready(function(){
       $("#category").change(function(){
           var category_id = $(this).val();
           // Ajax Setup Starts
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
         // Ajax Setup Ends

         // Ajax Request Starts

            $.ajax({
                type:'POST',
                url:'/get/sub/category',
                data:{category_id:category_id},
                success:function(data){
                    $("#subcategory").html(data);
                }
            });
            

         // Ajax Request Ends
       });
    });
</script>

@endsection

@section('content')

{{-- Error Message --}}
@if($errors->all())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</div>
@endif

{{-- Success Message --}}
@if(session('success'))
<div class="aler alert-success">
    {{ session('success') }}
</div>
@endif

{{-- Info Message --}}
@if(session('info'))
<div class="alert alert-info">
    {{ session('info') }}
</div>
@endif

{{-- Warning Message --}}
@if(session('warning'))
<div class="alert alert-warning">
    {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col-xl-10 m-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Products</h4>
                <p class="card-title-desc">Edit your desired products.
                </p>
                <form action="{{ route('products.update', $product->id) }}" class="needs-validation" novalidate method="post"
                    enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Product name</label>
                                <input name="name" type="text" class="form-control" id="validationTooltip03"
                                    value="{{ $product->name }}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid product name.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Product price</label>
                                <input name="price" type="text" class="form-control" id="validationTooltip03"
                                    value="{{ $product->price }}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid product price.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="disc">Product discount price (Optional)</label>
                                <input name="discount_price" type="text" class="form-control" id="disc"
                                    value="{{ $product->discount_price }}">
                                <div class="invalid-tooltip">
                                    Please provide a valid product price.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Product quantity</label>
                                <input name="quantity" type="text" class="form-control" id="validationTooltip03"
                                    value="{{ $product->quantity }}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid product quantity.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label>Product colors (For e.g, red, green, blue)</label>
                                <input name="colors" type="text" class="form-control" value="{{ $product->hasColors->colors }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label>Product size (For e.g, S M L XL XXL XXL) (Optional)</label>
                                <input name="size" type="text" class="form-control" value="{{ $product->hasSizes->size }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="category">Product category</label>
                                <select name="category_id" class="form-control" id="category" required>
                                    <option value="{{ $product->belongTo->hasCategory->id }}"> {{ ucfirst($product->belongTo->hasCategory->name) }} </option>
                                    @foreach ($categories as $category)
                                        @if($product->belongTo->hasCategory->name != $category->name)
                                          <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="invalid-tooltip">
                                    Please provide a valid category name.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="subcategory">Product sub category</label>
                                <select name="sub_category_id" class="form-control" id="subcategory" required>
                                    <option value="{{ $product->belongTo->id }}"> {{ ucfirst($product->belongTo->name) }} </option>
                                </select>
                                <div class="invalid-tooltip">
                                    Please provide a valid subcategory name.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Product short description</label>
                                <input id="x" type="hidden" name="short_desc" placeholder="Enter Short Description">
                                <trix-editor input="x">{!! $product->short_desc !!}</trix-editor>
                                <div class="invalid-tooltip">
                                    Please provide a valid subcategory name.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Product long description</label>
                                <input id="xx" type="hidden" name="long_desc" placeholder="Enter Detailed Description">
                                <trix-editor input="xx">{!! $product->long_desc !!}</trix-editor>
                                <div class="invalid-tooltip">
                                    Please provide a valid subcategory name.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label>Thumbnail image</label>
                                <input name="thumbnail_image" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="py-5 text-center">
                            <img src="{{ asset('uploads/products') }}/{{ $product->thumbnail_image }}" alt="not found" width="200">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label>Multiple Image (Multiple images at once are allowed)</label>
                                <input name="image[]" type="file" multiple class="form-control">
                            </div>
                        </div>
                        <div class="py-5 text-center">
                            @foreach ($product->hasImages as $image)
                              <img src="{{ asset('uploads/product_multiple_image') }}/{{ $image->image }}" alt="not found" width="200">
                            @endforeach
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Featured  (Featured products will always show on homepage featured section)</label>
                                <select name="featured" class="form-control"  required>
                                    <option value="{{ $product->featured }}">{{ $product->featured }}</option>
                                    @if($product->featured == 'yes')
                                    <option value="no">No</option>
                                    @else
                                    <option value="yes">Yes</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Update product</button>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
</div>

@endsection
