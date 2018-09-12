<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $global->site_name }} | {{ $pageTitle }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset($global->theme_folder.'/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{ asset($global->theme_folder.'/css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset($global->theme_folder.'/css/style.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset($global->theme_folder.'/css/colors/blue.css') }}" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/froiden-helper/helper.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>
<body>
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">

    <div class="login-box">
        <div class="white-box">
            <p id="alert"></p>
            {!!  Form::open(['url' => '', 'method' => 'post','class'=>'form-horizontal form-material  register-form', 'id' => 'forget-form']) !!}
                <h3 class="box-title m-b-20">@lang('core.recoverPassword')</h3>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="email" type="text" required="" placeholder="@lang('core.email')">
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                                onclick="knap.forget('login-register');return false;"  type="submit">@lang('core.btnSubmit')</button>
                    </div>
                </div>
            <p>@lang('messages.rememberThePassword') <a href="{{ route('user.login') }}" class="text-primary m-l-5"><b>@lang('core.login')</b></a></p>
            {!! Form::close()  !!}
        </div>
    </div>
</section>
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
<script src="{{ asset('common/js/laroute.js')}}"></script>
<script src="{{ asset('common/js/knap.js')}}"></script>
</body>

</html>
