<link href="{{ asset($global->theme_folder.'/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset($global->theme_folder.'/plugins/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
<!-- animation CSS -->
<link href="{{ asset($global->theme_folder.'/css/animate.css')}}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ asset($global->theme_folder.'/css/style.css')}}" rel="stylesheet">
<link href="{{ asset($global->theme_folder.'/css/custom.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/froiden-helper/helper.css')}}">

<!-- color CSS you can use different color css from css/colors folder -->
<!-- We have chosen the skin-blue (blue.css) for this starter
   page. However, you can choose any other skin from folder css / colors .
   -->
<link href="{{ asset($global->theme_folder.'/css/colors/'.$global->theme_color.'.css')}}" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<link href="{{ asset($global->theme_folder.'/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
<![endif]-->
<!-- iCheck -->
@yield('style')

