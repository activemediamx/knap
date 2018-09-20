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
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/iCheck/all.css')}}">
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/froiden-helper/helper.css')}}">
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/datepicker/datepicker3.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <img src="{{ asset('/logo/'.$global->logo)  }}" height="50px" alt="">
    </div>

    <div class="register-box-body">
        <p id="alert"></p>
        {!!  Form::open(['url' => '', 'method' => 'post','class'=>'register-form', 'id' => 'forget-form']) !!}
        <p class="login-box-msg">@lang('messages.enterYourEmailAddress').</p>

        <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="@lang('core.email')" name="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="row">
            <div class="col-xs-8">
                <a class="btn btn-default" href="{{route('user.login')}}">@lang('core.back')</a>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">

                <button type="submit" class="btn btn-primary btn-block btn-flat" onclick="knap.forget('register-box-body');return false;">@lang('core.submit')</button>
            </div>
            <!-- /.col -->
        </div>

        {!! Form::close()  !!}
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->
<!-- jQuery 2.2.0 -->
<script src="{{ asset($global->theme_folder.'/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset($global->theme_folder.'/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{ asset($global->theme_folder.'/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{ asset($global->theme_folder.'/plugins/froiden-helper/helper.js')}}"></script>
<script src="{{ asset($global->theme_folder.'/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset($global->theme_folder.'/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{ asset('common/js/laroute.js')}}"></script>
<script src="{{ asset('common/js/knap.js')}}"></script>
<!-- Laravel Javascript Validation -->


<!-- End Login Script-->
</body>

</html>