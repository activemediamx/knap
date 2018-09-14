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
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="{{ asset($global->theme_folder.'/favicon.ico') }}" /> </head>

</head>
<!-- END HEAD -->

<body class=" login">
<!-- BEGIN LOGO -->
<div class="logo">
    <img src="{{ asset('/logo/'.$global->logo) }}" height="40px" alt="">
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    {!!  Form::open(['url' => '', 'method' => 'post','class'=>'login-form','id'=>'login-form']) 	 !!}
    <h3 class="form-title font-green">{{ $pageTitle }}</h3>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">@lang('core.email')</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="@lang('core.email')" name="email" /> </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">@lang('core.password')</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="@lang('core.password')" name="password" /> </div>
    <div class="form-actions">
        <button type="submit" class="btn  green uppercase" onclick="knap.login();return false;" >@lang('core.signIn')</button>
        @if($global->remember_me == 1)
            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember"  value="1" />@lang('core.rememberMe')
                <span></span>
            </label>
        @endif
        @if($global->forget_password == 1)
            <a href="{{route('get-reset')}}" id="forget-password" class="forget-password">@lang('core.forgetPassword')?</a>
        @endif
    </div>
    <div class="login-options">
        <h4>@lang('core.orLoginWith')</h4>
        <ul class="social-icons">
            <li>
                <a class="social-icon-color facebook" data-original-title="facebook" href="{{ route('social.login',['facebook']) }}"></a>
            </li>
            <li>
                <a class="social-icon-color twitter" data-original-title="Twitter" href="{{ route('social.login',['twitter']) }}"></a>
            </li>
            <li>
                <a class="social-icon-color googleplus" data-original-title="Google Plus" href="{{ route('social.login',['google']) }}"></a>
            </li>
        </ul>
    </div>
    @if($global->allow_register == 1)
        <div class="create-account">
            <p>
                <a href="{{route('get-register')}}" id="register-btn" class="uppercase">@lang('messages.signUpMessage')</a>
            </p>
        </div>
    @endif
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