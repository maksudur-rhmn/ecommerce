@extends('layouts.dashboard')

@section('title')
Ecommerce - blog
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

                <h4 class="card-title">Blog lists</h4>
                <p class="card-title-desc">
                    List of all the blog can be downloaded in PDF or Excel Format
                </p>
                <div class="table table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                            <th>Sub Header</th>
                            <th>Details</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td><strong>{{ ucfirst($blog->title) }}</strong></td>
                            <td>{{ ucfirst($blog->sub_title) }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#exampleModalCenter{{ $blog->id }}">
                                    Details
                                </button>
                            </td>
                            <td>
                                <img src="{{ asset('uploads/blogs') }}/{{ $blog->image }}" alt="not found"
                                    width="100">
                            </td>
                            <td>
                                @can('edit')
                                <a href="{{ route('blog.edit', $blog->id) }}"><i class="text-warning fas fa-edit mr-1"></i></a>
                                @endcan
                                @can('delete')
                                <a href="{{ route('blog.delete', $blog->id) }}"><i class="text-danger fas fa-trash"></i></a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @foreach ($blogs as $blog)
                       <!-- Modal -->
                       <div class="modal fade" id="exampleModalCenter{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                             <div class="table table-responsive">
                                 <table class="table table-striped table-bordered">
                                     <tr>
                                         <th>Description one</th>
                                         <td>{{ $blog->description_one }}</td>
                                     </tr>
                                     <tr>
                                         <th>Description two</th>
                                         <td>{{ $blog->description_two }}</td>
                                     </tr>
                                     <tr>
                                         <th>Description three</th>
                                         <td>{{ $blog->description_three }}</td>
                                     </tr>
                                     <tr>
                                         <th>Quotation</th>
                                         <td>{{ $blog->quotation }}</td>
                                     </tr>
                                 </table>
                             </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection
