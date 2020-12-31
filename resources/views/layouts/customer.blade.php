<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="@yield('meta_content')" name="description" />
    <meta content="Digital Tech" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('dashboard_assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->

    <link href="{{ asset('dashboard_assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('dashboard_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard_assets/css/icon.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    @yield('top_css')
    <link href="{{ asset('dashboard_assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>


<body>
    @include('sweetalert::alert')
    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="{{ url('/') }}" class="logo logo-dark">
                            <span class="logo-sm">

                                <img src="{{ asset('uploads/logo') }}/{{ footer()->logo }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('uploads/logo') }}/{{ footer()->logo }}" alt="" height="20">
                            </span>
                        </a>

                        <a href="{{ url('/') }}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('uploads/logo') }}/{{ footer()->logo }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('uploads/logo') }}/{{ footer()->logo }}" alt="" height="20">
                            </span>
                        </a>
                    </div>

                    <button type="button"
                        class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <!-- App Search-->
                    <form action="{{ url('/search') }}" method="GET" class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" name="name" placeholder="Search any products...">
                            <span class="uil-search"></span>
                        </div>
                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ml-2">
                        <button type="submit" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="uil-search"></i>
                        </button>
                    </form>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                            aria-labelledby="page-header-search-dropdown">

                            <form action="{{ url('/search') }}" method="GET" class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name" placeholder="Search any products..."
                                            aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="dropdown d-none d-lg-inline-block ml-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="uil-minus-path"></i>
                        </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="uil-bell"></i>
                            <span class="badge badge-danger badge-pill">{{  pendingorder(Auth::id())->count() + cancelledorder(Auth::id())->count() + processingorder(Auth::id())->count() + deliveredorder(Auth::id())->count() }}</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="m-0 font-size-16"> Notifications </h5>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                @foreach (pendingorder(Auth::id())->take(1) as $item)
                                <a href="{{ route('notification.update', $item->id) }}" class="text-reset notification-item">
                                    <div class="media">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="uil-shopping-basket"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Your order is placed</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">We will let you know as soon as the order starts processing</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> {{ $item->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                                @foreach (processingorder(Auth::id())->take(1) as $item)
                                <a href="{{ route('notification.update', $item->id) }}" class="text-reset notification-item">
                                    <div class="media">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="uil-shopping-basket"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Your order is processing</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">We will let you know as soon as the order is delivered</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> {{ $item->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endforeach

                                @foreach (deliveredorder(Auth::id())->take(1) as $item)
                                <a href="{{ route('notification.update', $item->id) }}" class="text-reset notification-item">
                                    <div class="media">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="uil-shopping-basket"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Your order is delivered</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">Please let us know if you faced any problem with your delivery</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> {{ $item->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endforeach

                                @foreach (cancelledorder(Auth::id())->take(1) as $item)
                                <a href="{{ route('notification.update', $item->id) }}" class="text-reset notification-item">
                                    <div class="media">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="uil-shopping-basket"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Your order is cancelled</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">Please contact us for further details.</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> {{ $item->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                               
                            </div>
                            <div class="p-2 border-top">
                                <a class="btn btn-sm btn-link font-size-14 btn-block text-center"
                                    href="{{ url('/customer') }}">
                                    <i class="uil-arrow-circle-right mr-1"></i> View More..
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{ Auth::user()->profile_photo_url }}"
                                alt="Header Avatar">
                            <span
                                class="d-none d-xl-inline-block ml-1 font-weight-medium font-size-15">{{ Auth::user()->name }}</span>
                            <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a class="dropdown-item" href="{{ url('/user/profile') }}"><i
                                    class="uil uil-user-circle font-size-18 align-middle text-muted mr-1"></i> <span
                                    class="align-middle">View Profile</span></a>
                            <a class="dropdown-item" href="#"><i
                                    class="uil uil-lock-alt font-size-18 align-middle mr-1 text-muted"></i> <span
                                    class="align-middle">Lock screen</span></a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"><i
                                    class="uil uil-sign-out-alt font-size-18 align-middle mr-1 text-muted"></i> <span
                                    class="align-middle">Sign out</span></a>
                                    </form>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="uil-cog"></i>
                        </button>
                    </div>

                </div>
            </div>
        </header>
        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ url('/') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('uploads/logo') }}/{{ footer()->logo }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('uploads/logo') }}/{{ footer()->logo }}" alt="" height="20">
                    </span>
                </a>

                <a href="{{ url('/') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('uploads/logo') }}/{{ footer()->logo }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('uploads/logo') }}/{{ footer()->logo }}" alt="" height="20">
                    </span>
                </a>
            </div>

            <div data-simplebar class="sidebar-menu-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="{{ url('/') }}">
                                <i class="fas fa-globe"></i>
                                <span>Visit Darcheni</span>
                            </a>
                        </li>

                        <li class="@yield('dashboard_menu_active')">
                            <a href="{{ route('dashboard') }}">
                                <i class="uil-home-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0">@yield('page-name')</h4>
                                @yield('breadcrumb')
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    @yield('content')


                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())

                            </script> © Ecommerce. Developed by <a href="https://dgtaltech.com">Digital Tech</a>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Crafted with <i class="mdi mdi-heart text-danger"></i> by <a
                                    href="https://dgtaltech.com/" target="_blank" class="text-reset">Digital Tech</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- JAVASCRIPT -->

    <script src="{{ asset('dashboard_assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('dashboard_assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ asset('dashboard_assets/js/pages/dashboard.init.js') }}"></script>
    @yield('bottom_js')
    <script src="{{ asset('dashboard_assets/js/app.js') }}"></script>
    
</body>

</html>
