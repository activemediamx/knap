<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>{{ $global->site_name }} | {{ $pageTitle }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ asset($global->theme_folder.'/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset($global->theme_folder.'/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset($global->theme_folder.'/global/plugins/bootstrap/css/bootstrap'.$rtl.'.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset($global->theme_folder.'/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset($global->theme_folder.'/global/css/components-md'.$rtl.'.css') }}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ asset($global->theme_folder.'/global/css/plugins-md'.$rtl.'.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset($global->theme_folder.'/pages/css/login'.$rtl.'.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->

    <link rel="stylesheet" type="text/css" href="{{ asset($global->theme_folder.'/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}"/>
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="{{ asset($global->theme_folder.'/favicon.ico') }}" />
</head>
<!-- END HEAD -->

<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
    <img src="{{ asset('/logo/'.$global->logo) }}" height="40px" alt="">
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <p id="alert"></p>
    <!-- BEGIN LOGIN FORM -->
    {!!  Form::open(['url' => '', 'method' => 'POST','class'=>'login-form', 'id' => 'forget-form']) 	 !!}
        <h3 class="font-green">@lang('core.forgetPassword') ?</h3>
        <p> @lang('messages.enterYourEmailAddress'). </p>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">@lang('core.email')</label>
            <input class="form-control placeholder-no-fix" type="text" placeholder="@lang('core.email')" name="email" />
        </div>

    <div class="form-actions">
            <a href="{{ route('user.login') }}" id="back-btn" class="btn default">@lang('core.back')</a>
            <button type="submit" class="btn btn-success uppercase pull-right" onclick="knap.forget('content');return false;">@lang('core.submit')</button>
        </div>

{!! Form::close()  !!}
<!-- END LOGIN FORM -->
</div>
<!--[if lt IE 9]>
<script src="{{ asset($global->theme_folder.'/global/plugins/respond.min.js') }}"></script>
<script src="{{ asset($global->theme_folder.'/global/plugins/excanvas.min.js') }}"></script>
<script src="{{ asset($global->theme_folder.'/global/plugins/ie8.fix.min.js') }}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset($global->theme_folder.'/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset($global->theme_folder.'/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset($global->theme_folder.'/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>


<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset($global->theme_folder.'/global/scripts/app.min.js') }}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->

<script src="{{ asset($global->theme_folder.'/global/plugins/froiden-helper/helper.js')}}"></script>
<script src="{{ asset('common/js/laroute.js')}}"></script>
<script src="{{ asset('common/js/knap.js')}}"></script>

<!-- End Login Script-->
</body>

</html>