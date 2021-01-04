@extends('layouts.customer')

@section('title')
    Darcheni | Customer Dashboard
@endsection

@section('meta_content')
    Ecommerce Demo with PHP Laravel version 8+
@endsection

@section('dashboard_menu_active')
    mm-active
@endsection

@section('page-name')
   Customer Dashboard
@endsection

@section('breadcrumb')
     <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div> 
@endsection

@section('top_css')
<!-- DataTables -->
<link href="{{ asset('dashboard_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('dashboard_assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
    rel="stylesheet" type="text/css" />
@endsection

@section('category_menu_active')
mm-active
@endsection

@section('page-name')
Category
@endsection

@section('breadcrumb')
<div class="page-title-right">
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
        <li class="breadcrumb-item active">Category</li>
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

<!-- parsleyjs -->
<script src="{{ asset('dashboard_assets/libs/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/js/pages/form-validation.init.js') }}"></script>
@endsection

@section('content')

<div class="row">

    <div class="col-xl-10 m-auto">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">My Orders</h4>
                <p class="card-title-desc">
                    List of all the orders can be downloaded in PDF or Excel Format
                </p>

                <div class="table table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Order Number</th>
                            <th>Payment</th>
                            <th>TRX ID</th>
                            <th>Total</th>
                            <th>Products</th>
                            <th>Status</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>#{{ $order->id }}</td>
                            <td>{{ ucfirst($order->payment_method) }}</td>
                            <td>{{ ($order->trx_id) ? $order->trx_id : 'cash on' }}</td>
                            <td>@convert($order->total)</td>
                            <td class="text-left">
                                <ul class="text-left">
                                    @foreach ($order->lists as $item)
                                    <li>
                                        <strong>
                                            <a href="{{ route('frontend.productDetails', $item->getproducts->slug) }}">
                                                {{ ucfirst($item->getproducts->name) }} 
                                                 <strong style="color:green">Qt.</strong> {{ $item->amount }}
                                                 <strong style="color:green">Size.</strong> {{ $item->size }}
                                                 <strong style="color:green">Color.</strong> {{ $item->color }}
                                                </a> 
                                        </strong>
                                        
                                    </li>
                                   @endforeach 
                                </ul>
                            </td>
                            <td>
                                @if($order->status == 'processing')
                                    <span class="badge badge-primary">{{ ucfirst($order->status) }}</span>
                                @elseif($order->status == 'pending')
                                    <span class="badge badge-warning">{{ ucfirst($order->status) }}</span>
                                @elseif($order->status == 'cancelled')
                                    <span class="badge badge-danger">{{ ucfirst($order->status) }}</span>
                                @elseif($order->status == 'delivered')
                                    <span class="badge badge-success">{{ ucfirst($order->status) }}</span>
                                @endif
                                <form class="pb-3" action="{{ route('orders.update') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                     @if($order->status == 'cancelled')
                                     <select style="display: none;" name="status" id="">
                                        <option value="pending"></option>
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-success">Re-issue order</button>
                                    </form>
                                     @elseif($order->status == 'delivered')
                                     
                                     @else 
                                     <select style="display: none;" name="status" id="">
                                        <option value="cancelled">Cancelled</option>
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-success">Cancel order</button>
                                     @endif
                                    </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->

  <div class="col-lg-10 m-auto">
    <div class="head">
        <h2 class="text-center">
            OUR LATEST PRODUCTS
        </h2>
    </div>
  </div>
    @foreach ($products->take(6) as $product)
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                {{ ucfirst($product->name) }}
            </div>
            <div class="card-body text-center bg-dark">
                <h5 class="card-title text-white">
                    @if($product->discount_price)
                        BDT @convert($product->discount_price)
                    @else
                       BDT @convert($product->price)
                    @endif
                </h5>
                <img src="{{ asset('uploads/products') }}/{{ $product->thumbnail_image }}" alt="" width="200" height="300">
            </div>
            <div class="card-footer">
                <a class="btn btn-success btn-lg" href="{{ route('frontend.productDetails', $product->slug) }}">BUY NOW</a>
            </div>
        </div>
     </div>
    @endforeach
</div>

@endsection