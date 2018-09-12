<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">

<head>
    @include($global->theme_folder.'.sections.meta-data')
    @include($global->theme_folder.'.sections.style')
</head>
<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
<!-- BEGIN CONTAINER -->
@include($global->theme_folder. '.sections.header')
<div class="clearfix"> </div>

<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    @include($global->theme_folder. '.sections.sidebar')
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    @yield('content')

    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
@yield('modals')
@include($global->theme_folder. '.sections.footer')


<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
@include($global->theme_folder.'.sections.footer-scripts')
@yield('scripts-footer')

</body>
</html>
