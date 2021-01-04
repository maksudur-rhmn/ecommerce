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
<!-- Required datatable js -->

<script src="{{ asset('dashboard_assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ asset('dashboard_assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('dashboard_assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- Responsive examples -->
<script src="{{ asset('dashboard_assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
</script>

<!-- Datatable init js -->
<script src="{{ asset('dashboard_assets/js/pages/datatables.init.js') }}"></script>
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
        <div class="d-flex float-right mb-3">
          <a href="{{ route('coupon.create') }}" class="btn btn-success">Add Coupon</a>
        </div>
        <table class="table table-striped">
          <tr>
            <th>SL</th>
            <th>Coupon Name</th>
            <th>Coupon Discount</th>
            <th>Valid Till</th>
            <th>Created at</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          @foreach ($coupons as $coupon)
          <tr>
            <td>{{ $loop->index +1 }}</td>
            <td>{{ $coupon->coupon_name }}</td>
            <td>{{ $coupon->discount }} %</td>
            <td>{{ $coupon->valid_till }}</td>
            <td>{{ $coupon->created_at->format('Y-m-d') }}</td>
            <td>
              @if ($coupon->valid_till >= \Carbon\Carbon::now()->format('Y-m-d'))
                <span class="badge badge-success">{{ \Carbon\Carbon::parse($coupon->valid_till)->diffInDays(\Carbon\Carbon::now()->format('Y-m-d')) }} Days left</span>
              @else
                <span class="badge badge-danger">Expired</span>
              @endif
            </td>
            <td>
              @can('edit')
              <a href="{{ route('coupon.edit', $coupon->id) }}" class="btn btn-warning">Edit</a>
              @endcan
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
@endsection
