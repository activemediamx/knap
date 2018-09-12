<!DOCTYPE html>
<html>
<head>
   @include($global->theme_folder.'.sections.meta-data')
   @include($global->theme_folder.'.sections.style')

</head>
<body class="hold-transition skin-{{$global->theme_color}} sidebar-mini">
<div class="wrapper">
    @include($global->theme_folder.'.sections.header')

    <!-- Left side column. contains the logo and sidebar -->
    @include($global->theme_folder.'.sections.sidebar')

    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        @yield('page-header')

        <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>

            <!-- /.content -->
            @yield('modals')
        </div>
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
