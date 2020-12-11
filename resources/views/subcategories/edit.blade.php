@extends('layouts.dashboard')

@section('title')
    Ecommerce - Subcategory
@endsection

@section('meta_content')
    Ecommerce Demo with PHP Laravel version 8+
@endsection

@section('top_css') 
   
@endsection

@section('sub_category_menu_active')
    mm-active
@endsection

@section('page-name')
   Category > {{ $subCategory->name }}
@endsection

@section('breadcrumb')
     <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
            <li class="breadcrumb-item active">{{ $subCategory->name }}</li>
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
                <h4 class="card-title">Edit Sub Category</h4>
                <p class="card-title-desc">Edit your Sub Category. All categories are unique and cannot be duplicated</p>
                <form action="{{ route('subcategories.update', $subCategory->id) }}" class="needs-validation" novalidate method="post">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Select Category</label>
                                <select name="category_id" type="text" class="form-control" id="validationTooltip03"
                                    placeholder="Select Category" required>
                                    <option value="{{ $subCategory->hasCategory->id }}">{{ ucfirst($subCategory->hasCategory->name) }}</option>
                                    @foreach ($categories as $category)
                                        @if($category->name != $subCategory->hasCategory->name)
                                            <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="invalid-tooltip">
                                    Please provide a valid sub category name.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Sub category name</label>
                                <input name="name" type="text" class="form-control" id="validationTooltip03"
                                    value="{{ $subCategory->name }}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid category name.
                                </div>
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
