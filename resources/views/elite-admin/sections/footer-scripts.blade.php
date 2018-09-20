<!-- jQuery -->
<script src="{{ asset($global->theme_folder.'/plugins/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset($global->theme_folder.'/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{ asset($global->theme_folder.'/plugins/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>

<!--slimscroll JavaScript -->
<script src="{{ asset($global->theme_folder.'/js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{ asset($global->theme_folder.'/js/waves.js')}}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset($global->theme_folder.'/js/custom.min.js')}}"></script>
<!--Style Switcher -->
<script src="{{ asset($global->theme_folder.'/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
<script src="{{ asset($global->theme_folder.'/plugins/froiden-helper/helper.js')}}"></script>
<script src="{{ asset($global->theme_folder.'/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('common/js/laroute.js')}}"></script>
<script src="{{ asset('common/js/knap.js')}}"></script>
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

