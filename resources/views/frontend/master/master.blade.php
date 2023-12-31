<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets')}}/images/favicon.ico">
    <!-- CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/vendor/slick.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/vendor/aos.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/plugins/feature.css">
    {{--Custom header asset--}}
    @yield('header-asset')
    <!-- Style css -->
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/style.css">
</head>

<body class="template-color-1 spybody" data-spy="scroll" data-target=".navbar-example2" data-offset="70">

<!-- Start Header -->
<header class="rn-header haeder-default black-logo-version header--fixed header--sticky">
    <div class="header-wrapper rn-popup-mobile-menu m--0 row align-items-center">
        <!-- Start Header Left -->
        <div class="col-lg-2 col-6">
            <div class="header-left">
                <div class="logo">
                    <a href="{{route('home')}}">
                        <img src="{{asset('uploads/admin-avatar/resize' . '/' . \App\Models\AdminDetail::first()->avatar)}}" alt="logo" height="80" width="80">
                    </a>
                </div>
            </div>
        </div>
        <!-- End Header Left -->
        <!-- Start Header Center -->
        <div class="col-lg-10 col-6">
            <div class="header-center">
                <nav id="sideNav" class="mainmenu-nav navbar-example2 d-none d-xl-block onepagenav">
                    <!-- Start Mainmanu Nav -->
                    <ul class="primary-menu nav nav-pills me-5">
                        @foreach(DB::table('menus')->where('status', 1)->latest()->get() as $menu)
                            <li class="nav-item"><a class="nav-link" href="#{{$menu->constant_name}}">{{$menu->name}}</a></li>
                        @endforeach
                    </ul>
                    <!-- End Mainmanu Nav -->
                </nav>
            </div>
        </div>
        <!-- End Header Center -->
    </div>
</header>
<!-- End Header Area -->
<!-- Start Popup Mobile Menu  -->
<div class="popup-mobile-menu">
    <div class="inner">
        <div class="menu-top">
            <div class="menu-header">
                <a class="logo" href="{{route('home')}}">
                    <img src="{{asset('frontend/assets')}}/images/logo/logos-circle.png" alt="Personal Portfolio">
                </a>
                <div class="close-button">
                    <button class="close-menu-activation close"><i data-feather="x"></i></button>
                </div>
            </div>
            <p class="discription">Inbio is a personal portfolio template. You can customize all.</p>
        </div>
        <div class="content">
            <ul class="primary-menu nav nav-pills onepagenav">
                <li class="nav-item current"><a class="nav-link smoth-animation active" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#features">Features</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#portfolio">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#resume">Resume</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#clients">Clients</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#pricing">Pricing</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#blog">blog</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#contacts">Contact</a></li>
            </ul>
            <!-- social sharea area -->
            <div class="social-share-style-1 mt--40">
                <span class="title">find with me</span>
                <ul class="social-share d-flex liststyle">
                    <li class="facebook"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg></a>
                    </li>
                    <li class="instagram"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg></a>
                    </li>
                    <li class="linkedin"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                <rect x="2" y="9" width="4" height="12"></rect>
                                <circle cx="4" cy="4" r="2"></circle>
                            </svg></a>
                    </li>
                </ul>
            </div>
            <!-- end -->
        </div>
    </div>
</div>
<!-- End Popup Mobile Menu  -->
@yield('content')
<!-- Start Footer Area -->
<div class="rn-footer-area rn-section-gap section-separator">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-area text-center">

                    <div class="logo">
                        <a href="{{route('home')}}">
                            <img src="{{asset('frontend/assets')}}/images/logo/logo-vertical.png" alt="logo">
                        </a>
                    </div>

                    <p class="description mt--30">© 2022. All rights reserved by <a href="javascript:void(0)">{{config('app.name')}}.</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Footer Area -->
<!-- JS ============================================ -->
<script src="{{asset('frontend/assets')}}/js/vendor/jquery.js"></script>
<script src="{{asset('frontend/assets')}}/js/vendor/modernizer.min.js"></script>
<script src="{{asset('frontend/assets')}}/js/vendor/feather.min.js"></script>
<script src="{{asset('frontend/assets')}}/js/vendor/slick.min.js"></script>
<script src="{{asset('frontend/assets')}}/js/vendor/bootstrap.js"></script>
<script src="{{asset('frontend/assets')}}/js/vendor/text-type.js"></script>
<script src="{{asset('frontend/assets')}}/js/vendor/wow.js"></script>
<script src="{{asset('frontend/assets')}}/js/vendor/aos.js"></script>
<script src="{{asset('frontend/assets')}}/js/vendor/particles.js"></script>
<script src="{{asset('frontend/assets')}}/js/vendor/jquery-one-page-nav.js"></script>
{{--Custom footer page asset--}}
@yield('footer-asset')
<!-- main JS -->
<script src="{{asset('frontend/assets')}}/js/main.js"></script>

@include('includes.toastr-notification.toastr')

</body>

</html>
