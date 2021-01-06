@extends('layouts.dashboard')

@section('meta_content')
Ecommerce Demo with PHP Laravel version 8+
@endsection

@section('title')
    Darceni | About
@endsection
@section('about_menu_active')
mm-active
@endsection

@section('page-name')
About
@endsection

@section('breadcrumb')
<div class="page-title-right">
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
        <li class="breadcrumb-item active">About Settings</li>
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
@hasrole('Admin')
<div class="row">
    <div class="col-xl-10 m-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">About Settings</h4>
                <p class="card-title-desc">Here is the setting of your about page.
                </p>
                <form action="{{ route('abouts.store') }}" class="needs-validation" novalidate method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $about->id }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Title</label>
                                <input name="title" type="text" class="form-control" id="validationTooltip03"
                                    value="{{ $about->title }}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid title.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Sub title</label>
                                <input name="sub_title" type="text" class="form-control" id="validationTooltip03"
                                    value="{{ $about->sub_title }}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid sub title.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Description</label>
                                <textarea rows="5" name="description" type="text" class="form-control" id="validationTooltip03"
                                    placeholder="Description" required>{{ $about->description }}</textarea>
                                <div class="invalid-tooltip">
                                    Please provide a valid Description.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Image</label>
                                <input name="image" type="file" class="form-control">
                            </div>
                            <div class="py-3">
                                <img src="{{ asset('uploads/about') }}/{{ $about->image }}" alt="not found" width="300">
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Bottom title</label>
                                <input name="bottom_title_one" type="text" class="form-control" id="validationTooltip03"
                                    value="{{ $about->bottom_title_one }}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid bottom title.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Description</label>
                                <textarea rows="5" name="bottom_title_description_one" type="text" class="form-control" id="validationTooltip03"
                                    placeholder="Bottom Description" required>{{ $about->bottom_title_description_one }}</textarea>
                                <div class="invalid-tooltip">
                                    Please provide a valid bottom Description.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Image</label>
                                <input name="bottom_title_image_one" type="file" class="form-control">
                                
                            </div>

                            <div class="py-3">
                                <img src="{{ asset('uploads/about') }}/{{ $about->bottom_title_image_one }}" alt="not found" width="300">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Bottom title</label>
                                <input name="bottom_title_two" type="text" class="form-control" id="validationTooltip03"
                                    value="{{ $about->bottom_title_two }}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid bottom title.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Description</label>
                                <textarea rows="5" name="bottom_title_description_two" type="text" class="form-control" id="validationTooltip03"
                                    placeholder="Bottom Description" required>{{ $about->bottom_title_description_two }}</textarea>
                                <div class="invalid-tooltip">
                                    Please provide a valid bottom Description.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Image</label>
                                <input name="bottom_title_image_two" type="file" class="form-control">
                            </div>

                            <div class="py-3">
                                <img src="{{ asset('uploads/about') }}/{{ $about->bottom_title_image_two }}" alt="not found" width="300">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Bottom title</label>
                                <input name="bottom_title_three" type="text" class="form-control" id="validationTooltip03"
                                    value="{{ $about->bottom_title_three }}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid bottom title.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Description</label>
                                <textarea rows="5" name="bottom_title_description_three" type="text" class="form-control" id="validationTooltip03"
                                    placeholder="Bottom Description" required>{{ $about->bottom_title_description_three }}</textarea>
                                <div class="invalid-tooltip">
                                    Please provide a valid bottom Description.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Image</label>
                                <input name="bottom_title_image_three" type="file" class="form-control">
                            </div>

                            <div class="py-3">
                                <img src="{{ asset('uploads/about') }}/{{ $about->bottom_title_image_three }}" alt="not found" width="300">
                            </div>
                        </div>
                    <button class="btn btn-primary" type="submit">Update About Setting</button>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
</div>
@else 
 <h5>You do not have permission to view this page.</h5>
@endhasrole
@endsection
