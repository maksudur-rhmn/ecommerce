@extends('layouts.dashboard')

@section('title')
Ecommerce - Products
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

@section('products_menu_active')
mm-active
@endsection

@section('page-name')
Products
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
    <div class="col-xl-10 m-auto">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Product lists</h4>
                <p class="card-title-desc">
                    List of all the products can be downloaded in PDF or Excel Format
                </p>
                <div class="table table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Sub category</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Featured</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td><strong>{{ ucfirst($product->name) }}</strong></td>
                            <td>{{ ucfirst($product->belongTo->hasCategory->name) }}</td>
                            <td>{{ ucfirst($product->belongTo->name) }}</td>
                            <td> @convert($product->price) </td>
                            <td> @convert($product->discount_price) </td>
                            <td>{{ ucfirst($product->featured) }}</td>
                            <td>
                               {{ $product->quantity }} pcs.
                            </td>
                            <td>
                                <img src="{{ asset('uploads/products') }}/{{ $product->thumbnail_image }}" alt="not found"
                                    width="100">
                            </td>
                            <td>
                               @can('view')
                               <a href="{{ route('products.show', $product->id) }}"><i class="fas fa-eye text-success"></i></a>
                               @endcan
                               @can('edit')
                               <a href="{{ route('products.edit', $product->id) }}"><i class="text-warning fas fa-edit mr-1"></i></a>
                               @endcan
                               @can('delete')
                               <a href="{{ route('products.delete', $product->id) }}"><i class="text-danger fas fa-trash"></i></a>
                               @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

@endsection
