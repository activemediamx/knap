<script src="{{ asset($global->theme_folder.'/plugins/jQuery/jQuery-2.2.0.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset($global->theme_folder.'/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset($global->theme_folder.'/plugins/fastclick/fastclick.js') }}"></script>
{{--Pace--}}
<script src="{{asset($global->theme_folder.'/plugins/pace/pace.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{ asset($global->theme_folder.'/js/app.min.js') }}"></script>

<script src="{{ asset($global->theme_folder.'/plugins/froiden-helper/helper.js')}}"></script>
<script src="{{ asset($global->theme_folder.'/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{ asset($global->theme_folder.'/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
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