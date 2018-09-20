
<!--[if lt IE 9] -->
<script src="{{ asset($global->theme_folder.'/global/plugins/respond.min.js') }}"></script>
<script src="{{ asset($global->theme_folder.'/global/plugins/excanvas.min.js') }}"></script>
<script src="{{ asset($global->theme_folder.'/global/plugins/ie8.fix.min.js') }}"></script>
<!-- [endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset($global->theme_folder.'/global/plugins/jquery.min.js') }}" type="text/javascript"></script>


<script src="{{ asset($global->theme_folder.'/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset($global->theme_folder.'/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{ asset($global->theme_folder.'/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>


<script src="{{ asset($global->theme_folder.'/global/plugins/counterup/jquery.waypoints.min.js') }}" type="text/javascript"></script>
<script src="{{ asset($global->theme_folder.'/global/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset($global->theme_folder.'/global/scripts/app.min.js') }}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ asset($global->theme_folder.'/layouts/scripts/layout.min.js') }}" type="text/javascript"></script>
<script src="{{ asset($global->theme_folder.'/layouts/scripts/demo.min.js') }}" type="text/javascript"></script>
<script src="{{ asset($global->theme_folder.'/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset($global->theme_folder.'/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>

<script src="{{ asset($global->theme_folder.'/global/plugins/froiden-helper/helper.js') }}"></script>
<script src="{{ asset($global->theme_folder.'/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Logo path used in knap.js
    var logoPath = '{{$logoPath}}';

    // Avatar path used in knap.js
    var avatarPath = '{{$avatarPath}}';

</script>
<script src="{{ asset('common/js/laroute.js')}}"></script>
<script src="{{ asset('common/js/knap.js')}}"></script>
@yield('footerjs')