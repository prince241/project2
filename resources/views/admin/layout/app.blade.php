<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard analytics - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/shepherd-theme-default.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/tour/tour.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

@include('admin.layout.header')
@include('admin.layout.sidebar')


    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                @if (session()->has('success'))
                <div class="alert alert-success">
                    <span class="closebtn float-right" onclick="this.parentElement.style.display='none';">&times;</span>
                    <b>Success:</b>
                    @if (is_array(session('success')))
                    <ul class='m-0'>
                        @foreach(session('success') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @else
                    {{ session('success') }}
                    @endif
                    @endif
                

            @yield('content')

            </div>
        </div>
    </div>

  

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2019<a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer> 
     <!-- BEGIN: Vendor JS-->
     <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
     <!-- BEGIN Vendor JS-->
 
     <!-- BEGIN: Page Vendor JS-->
     <script src="../../../app-assets/vendors/js/charts/apexcharts.min.js"></script>
     <script src="../../../app-assets/vendors/js/extensions/tether.min.js"></script>
     <script src="../../../app-assets/vendors/js/extensions/shepherd.min.js"></script>
     <!-- END: Page Vendor JS-->
 
     <!-- BEGIN: Theme JS-->
     <script src="../../../app-assets/js/core/app-menu.js"></script>
     <script src="../../../app-assets/js/core/app.js"></script>
     <script src="../../../app-assets/js/scripts/components.js"></script>
     <!-- END: Theme JS-->
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <!-- custome js-->
     <script src="/js/custom.js"></script>

</body>

</html>