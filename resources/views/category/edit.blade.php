@extends('layouts.dashboard')

@section('title')
    Ecommerce - Category
@endsection

@section('meta_content')
    Ecommerce Demo with PHP Laravel version 8+
@endsection

@section('top_css') 
   
@endsection

@section('category_menu_active')
    mm-active
@endsection

@section('page-name')
   Category > {{ $category->name }}
@endsection

@section('breadcrumb')
     <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
            <li class="breadcrumb-item active">{{ $category->name }}</li>
        </ol>
    </div> 
@endsection

@section('bottom_js')
    <!-- parsleyjs -->
    <script src="{{ asset('dashboard_assets/libs/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/pages/form-validation.init.js') }}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-10 m-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Category</h4>
                <p class="card-title-desc">Edit your Category. All categories are unique and cannot be duplicated</p>
                <form action="{{ route('categories.update', $category->id) }}" class="needs-validation" novalidate method="post" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Category name</label>
                                <input name="name" type="text" class="form-control" id="validationTooltip03" value="{{ $category->name }}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid category name.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Image</label>
                                <input name="image" type="file" class="form-control">
                                <div class="invalid-tooltip">
                                    Please provide a valid image.
                                </div>
                            </div>
                            <div class="py-3 text-center">
                                <img src="{{ asset('uploads/categories') }}/{{ $category->image }}" alt="Not Found" width="200">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Update category</button>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
@endsection
