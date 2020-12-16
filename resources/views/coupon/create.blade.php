@extends('layouts.dashboard')

@section('title')
Ecommerce - Coupons
@endsection

@section('meta_content')
Ecommerce Demo with PHP Laravel version 8+
@endsection

@section('top_css')
<!-- DataTables -->
<link href="{{ asset('dashboard_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('dashboard_assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
    rel="stylesheet" type="text/css" />
@endsection

@section('coupons_menu_active')
mm-active
@endsection

@section('page-name')
Coupons
@endsection

@section('breadcrumb')
<div class="page-title-right">
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
        <li class="breadcrumb-item active">Coupons</li>
    </ol>
</div>
@endsection

@section('bottom_js')
<!-- parsleyjs -->
<script src="{{ asset('dashboard_assets/libs/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/js/pages/form-validation.init.js') }}"></script>
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
  <div class="col-lg-8 m-auto">
    <div class="card">
      <div class="card-header">
        <h1 class="text-center">{{ isset($coupon) ? 'Edit Coupon' : 'Add Coupon' }}</h1>
      </div>
      <div class="card-body">
        <form class="form-group" action="{{ isset($coupon) ? route('coupon.update', $coupon->id) : route('coupon.store')}}" method="post">
          @csrf
          @isset($coupon)
            {{ method_field('PUT') }}
          @endisset
            <div class="py-3">
              <input class="form-control" type="text" name="coupon_name" value="{{ isset($coupon) ? $coupon->coupon_name : '' }}" placeholder="Coupon Name">
            </div>
            <div class="py-3">
              <input class="form-control" type="number" name="discount" value="{{ isset($coupon) ? $coupon->discount : '' }}" placeholder="Discount">
            </div>
            <div class="py-3">
              <input type="date" name="valid_till" value="{{ isset($coupon) ? $coupon->valid_till : '' }}" class="form-control" min={{ \Carbon\Carbon::now()->toDateString() }}>
            </div>
            <div class="py-3">
              <button type="submit" class="btn btn-primary">{{ isset($coupon) ? 'Update Coupon' : 'Add Coupon' }}</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
