<!DOCTYPE html>
<html>
<head>
   @include($global->theme_folder.'.sections.meta-data')
   @include($global->theme_folder.'.sections.style')

</head>
<body class="fix-sidebar">
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
    @include($global->theme_folder.'.sections.header')

    <!-- Left side column. contains the logo and sidebar -->
    @include($global->theme_folder.'.sections.sidebar')

    <!-- Content Wrapper. Contains page content -->



        <!-- Main content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    @yield('page-header')

                        @yield('content')
                </div>
            </div>

            <!-- /.content -->
            @yield('modals')

        <!-- /.content-wrapper -->

     {{--Footer section--}}
    @include($global->theme_folder.'.sections.footer')


</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
@include($global->theme_folder.'.sections.footer-scripts')
@yield('scripts-footer')

</body>
</html>
