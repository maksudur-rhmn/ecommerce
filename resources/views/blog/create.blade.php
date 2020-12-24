@extends('layouts.dashboard')

@section('title')
Ecommerce - Blogs
@endsection

@section('meta_content')
Ecommerce Demo with PHP Laravel version 8+
@endsection


@section('blog_menu_active')
mm-active
@endsection

@section('page-name')
Blogs
@endsection

@section('breadcrumb')
<div class="page-title-right">
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
        <li class="breadcrumb-item active">Blogs</li>
    </ol>
</div>
@endsection

@section('bottom_js')

<!-- parsleyjs -->
<script src="{{ asset('dashboard_assets/libs/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/js/pages/form-validation.init.js') }}"></script>
<!-- trix -->
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
                <h4 class="card-title">Add Blogs</h4>
                <p class="card-title-desc">Add your desired blogs.
                </p>
                <form action="{{ route('blog.store') }}" class="needs-validation" novalidate method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Blog title</label>
                                <input name="title" type="text" class="form-control" id="validationTooltip03"
                                    placeholder="Title" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid blog title.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Blog Sub header</label>
                                <input name="sub_title" type="text" class="form-control" id="validationTooltip03"
                                    placeholder="Sub Header" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid blog sub header.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Blog description</label>
                                <textarea class="form-control" name="description_one" id="validationTooltip03" cols="30" rows="10" placeholder="Description"></textarea>
                                <div class="invalid-tooltip">
                                    Please provide a valid description.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Blog description Two (Optional)</label>
                                <textarea class="form-control" name="description_two" id="" cols="30" rows="10" placeholder="Description Two"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Blog description Three (Optional)</label>
                                <textarea class="form-control" name="description_three" id="" cols="30" rows="10" placeholder="Description Three"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Quotation (Optional)</label>
                                <textarea class="form-control" name="quotation" id="" cols="30" rows="10" placeholder="Quotation"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03"> Image</label>
                                <input name="image" type="file" class="form-control" id="validationTooltip03"
                                    placeholder="Image" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid image.
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Add Blog</button>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
</div>

@endsection
