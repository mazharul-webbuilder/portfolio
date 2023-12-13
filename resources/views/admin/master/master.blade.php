<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset("asset") }}/img/favicon.ico">
    {{--    Multiple Select--}}

    <!-- Bootstrap Css -->
    <link href="{{ asset("assets/css/bootstrap.min.css") }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset("assets/css/icons.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset("assets/css/app.min.css") }}" id="app-style" rel="stylesheet" type="text/css" />
    {{--Datatable--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    {{--Page indipendend assets--}}
    @yield('page-header-assets')
</head>

<body data-sidebar="dark">
<!-- Begin page -->
<div id="layout-wrapper">
    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset("assets") }}/images/logo.svg" alt="" height="22">
                                </span>
                    </a>

                    <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset("assets") }}/images/logo-light.svg" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{ asset("assets") }}/images/logo-light.png" alt="" height="19">
                                </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <!-- App Search-->
                <form class="app-search d-none d-lg-block">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="bx bx-search-alt"></span>
                    </div>
                </form>

            </div>

            <div class="d-flex">
                <div class="dropdown d-inline-block d-lg-none ml-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                         aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>




                <div class="dropdown d-none d-lg-inline-block ml-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="bx bx-fullscreen"></i>
                    </button>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-bell bx-tada"></i>
                        <span class="badge badge-danger badge-pill">3</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                         aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0"> Notifications </h6>
                                </div>
                                <div class="col-auto">
                                    <a href="#!" class="small"> View All</a>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 230px;">
                            <a href="#" class="text-reset notification-item">
                                <div class="media">
                                    <div class="avatar-xs mr-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="bx bx-cart"></i>
                                                </span>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1">Your order is placed</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1">If several languages coalesce the grammar</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="text-reset notification-item">
                                <div class="media">
                                    <img src="{{ asset("assets") }}/images/users/avatar-3.jpg"
                                         class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1">James Lemire</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1">It will seem like simplified English.</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="text-reset notification-item">
                                <div class="media">
                                    <div class="avatar-xs mr-3">
                                                <span class="avatar-title bg-success rounded-circle font-size-16">
                                                    <i class="bx bx-badge-check"></i>
                                                </span>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1">Your item is shipped</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1">If several languages coalesce the grammar</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="#" class="text-reset notification-item">
                                <div class="media">
                                    <img src="{{ asset("assets") }}/images/users/avatar-4.jpg"
                                         class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1">Salena Layfield</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="p-2 border-top">
                            <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                                <i class="mdi mdi-arrow-right-circle mr-1"></i> View More..
                            </a>
                        </div>
                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{ asset("assets") }}/images/users/avatar-1.jpg"
                             alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ml-1">{{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->name }}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle mr-1"></i> Profile</a>
                        <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right"></span><i class="bx bx-wrench font-size-16 align-middle mr-1"></i> Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('adminlogout{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->id}}').submit();">
                            <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>
                        <form action="{{route('admin.logout')}}" method="post" id="adminlogout{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->id}}">@csrf
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </header> <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>
                    <li>
                        <a href="{{route('admin.dashboard')}}" class="waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span>Dashboards</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.menus')}}" class="waves-effect">
                            <i class="bx bx-menu"></i>
                            <span>Menus</span>
                        </a>
                    </li>

                    <li class="menu-title">Apps</li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-users"></i>
                            <span>Users</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="#">Registered Users</a></li>
                            <li><a href="#">Unregistered Users</a></li>

                        </ul>
                    </li>


                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="dripicons-gear"></i>
                            <span>Setting</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="#">General Settings</a></li>
                            <li><a href="#">Maintenance</a></li>
                        </ul>
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

        @yield('content')
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © Irozen.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            Irozen
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
<script src="{{ asset("assets") }}/libs/jquery/jquery.min.js"></script>
<script src="{{ asset("assets") }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset("assets") }}/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ asset("assets") }}/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset("assets") }}/libs/node-waves/waves.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


<!-- App js -->
<script src="{{ asset("assets") }}/js/app.js"></script>


@yield('page-footer-assets')

@include('includes.toastr-notification.toastr')

</body>
</html>
