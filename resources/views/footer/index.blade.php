@extends('layouts.dashboard')

@section('meta_content')
Ecommerce Demo with PHP Laravel version 8+
@endsection

@section('title')
    Darceni | Footer
@endsection
@section('footer_menu_active')
mm-active
@endsection

@section('page-name')
About
@endsection

@section('breadcrumb')
<div class="page-title-right">
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
        <li class="breadcrumb-item active">Footer Settings</li>
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
                <h4 class="card-title">Footer Settings</h4>
                <p class="card-title-desc">Here is the setting of your footer.
                </p>
                <form action="{{ route('footer.store') }}" class="needs-validation" novalidate method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $footer->id }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Phone</label>
                                <input name="phone" type="text" class="form-control" id="validationTooltip03"
                                    value="{{ $footer->phone }}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid phone number.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Bkash number</label>
                                <input name="bkash_number" type="text" class="form-control" id="validationTooltip03"
                                    value="{{ $footer->bkash_number }}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid bkash number.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Address</label>
                                <input name="address" type="text" class="form-control" id="validationTooltip03"
                                    value="{{ $footer->address }}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid address.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Email</label>
                                <input name="email" type="text" class="form-control" id="validationTooltip03"
                                    value="{{ $footer->email }}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid email.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Facebook link</label>
                                <input name="facebook" type="text" class="form-control" id="validationTooltip03"
                                    value="{{ $footer->facebook }}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid facebook link.
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Logo</label>
                                <input name="logo" type="file" class="form-control">
                            </div>
                            <div class="py-3">
                                <img src="{{ asset('uploads/logo') }}/{{ $footer->logo }}" alt="not found" width="200">
                            </div>
                        </div>
                    <button class="btn btn-primary" type="submit">Update Footer Setting</button>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
</div>
@endsection
