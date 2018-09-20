<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="{{ asset($global->theme_folder.'/bootstrap/css/bootstrap.min.css') }}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset($global->theme_folder.'/css/AdminLTE.css') }}">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{ asset($global->theme_folder.'/css/skins/skin-'.$global->theme_color.'.min.css') }}">
<!-- Pace -->
<link rel="stylesheet" href="{{asset($global->theme_folder.'/plugins/pace/pace.min.css')}}">
<!-- iCheck -->
<link href="{{ asset($global->theme_folder.'/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
@yield('style')

<link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/iCheck/square/blue.css')}}">
<link href="{{ asset($global->theme_folder.'/css/custom.css') }}" rel="stylesheet" type="text/css" />
{{--Froiden Helper--}}
<link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/froiden-helper/helper.css')}}">
<!-- custom css -->
<link href="{{ asset($global->theme_folder.'/layouts/css/custom.css') }}" rel="stylesheet" type="text/css" />
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="{{ asset('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}"></script>
<script src="{{ asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
<![endif]-->
