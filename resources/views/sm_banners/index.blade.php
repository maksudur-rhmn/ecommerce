@extends('layouts.dashboard')

@section('title')
Ecommerce - Small Banners
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
                <h4 class="card-title">Add Banners</h4>
                <p class="card-title-desc">Add your desired Banners.
                </p>
                <form action="{{ route('sm-banners.store') }}" class="needs-validation" novalidate method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Valid link of the banner button</label>
                                <input name="link" type="text" class="form-control" id="validationTooltip03"
                                    placeholder="Enter button link" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid url.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Image</label>
                                <input name="image" type="file" class="form-control" id="validationTooltip03"
                                    placeholder="Name" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid image.
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Add Banner</button>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div> <!-- end col -->

    <div class="col-xl-10 m-auto">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Banner Lists</h4>
                <p class="card-title-desc">
                    List of all the banner can be downloaded in PDF or Excel Format
                </p>

                <div class="table table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>URL</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($banners as $banner)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td><strong>{{ $banner->link }}</strong></td>
                            <td>
                                <img src="{{ asset('uploads/sm_banners') }}/{{ $banner->image }}" alt="not found"
                                    width="100">
                            </td>
                            <td>
                                @can('delete')
                                <a href="{{ route('sm-banners.delete', $banner->id) }}"><i class="text-danger fas fa-trash"></i></a>
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
