
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="{{  asset('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset($global->theme_folder.'/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset($global->theme_folder.'/global/plugins/simple-line-icons/simple-line-icons.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset($global->theme_folder.'/global/plugins/bootstrap/css/bootstrap'.$rtl.'.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{ asset($global->theme_folder.'/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
@yield('style')
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL STYLES -->

<link rel="stylesheet" type="text/css" href="{{ asset($global->theme_folder.'/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}"/>
<link href="{{ asset($global->theme_folder.'/global/css/components-md'.$rtl.'.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
<link href="{{ asset($global->theme_folder.'/global/css/plugins-md'.$rtl.'.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="{{ asset($global->theme_folder.'/layouts/css/layout'.$rtl.'.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset($global->theme_folder.'/layouts/css/themes/'.$global->theme_color.$rtl.'.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
<link href="{{ asset($global->theme_folder.'/global/plugins/froiden-helper/helper.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset($global->theme_folder.'/layouts/css/custom.css') }}" rel="stylesheet" type="text/css" />
<!-- END THEME LAYOUT STYLES -->
<link rel="shortcut icon" href="{{ asset($global->theme_folder.'/favicon.ico') }}" />
<!-- END HEAD -->
