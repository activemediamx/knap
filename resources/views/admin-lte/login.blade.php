<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $global->site_name }} | {{ $pageTitle }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/css/AdminLTE.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/iCheck/square/blue.css')}}">
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/froiden-helper/helper.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <img src="{{ asset('/logo/'.$global->logo) }}" height="50px" alt="">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">@lang('messages.signInMessage')</p>

        {!!  Form::open(['url' => '', 'method' => 'post','class'=>'login-form','id'=>'login-form']) 	 !!}
            <div id="alert"></div>
            <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="@lang('core.email')">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="@lang('core.password')">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    @if($global->remember_me == 1)
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> @lang('core.rememberMe')
                            </label>
                        </div>
                    @endif
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" onclick="knap.login();return false;" >@lang('core.signIn')</button>
                </div>
                <!-- /.col -->
            </div>
        {!! Form::close()  !!}
        <div class = "social-auth-links text-center">
            <p>-OR-</p>
            <a href="{{ route('social.login',['facebook']) }}" class="btn btn-block btn-social btn-facebook btn-flat">
                <i class="fa fa-facebook"></i>
                @lang('core.loginWithFacebook')
            </a>
            <a href="{{ route('social.login',['google']) }}" class="btn btn-block btn-social btn-google btn-flat">
                <i class="fa fa-google-plus"></i>
                @lang('core.loginWithGoogle')
            </a>
            <a href="{{ route('social.login',['twitter']) }}" class="btn btn-block btn-social btn-twitter">
                <i class="fa fa-twitter"></i>
                @lang('core.loginWithTwitter')
            </a>
        </div>

        @if($global->forget_password == 1)
            <a href="{{ route('get-reset') }}" class="text-center">@lang('core.forgetPassword')</a><br>
        @endif
        @if($global->allow_register == 1)
            <a href="{{ route('get-register') }}" class="text-center">@lang('messages.signUpMessage')</a>
        @endif

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="{{ asset($global->theme_folder.'/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset($global->theme_folder.'/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{ asset($global->theme_folder.'/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{ asset($global->theme_folder.'/plugins/froiden-helper/helper.js')}}"></script>
<script src="{{ asset('common/js/laroute.js')}}"></script>
<script src="{{ asset('common/js/knap.js')}}"></script>
<!-- Laravel Javascript Validation -->
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
