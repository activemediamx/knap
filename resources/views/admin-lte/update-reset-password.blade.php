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
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/froiden-helper/helper.css')}}">

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
        {!!  Form::open(['url' => '', 'method' => 'post','class'=>'register-form']) !!}
        <p class="login-box-msg">Reset your Password</p>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <input type="hidden" name="passwordResetCode" value="{{$passwordResetCode}}">
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>

        <div class="row">
            <div class="col-xs-8">
                {{--<div class="checkbox icheck">--}}
                {{--<label>--}}
                {{--<input type="checkbox"> I agree to the <a href="#">terms</a>--}}
                {{--</label>--}}
                {{--</div>--}}
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat" onclick="changePassword();return false;">Submit</button>
            </div>
            <!-- /.col -->
        </div>

        {!! Form::close() !!}
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->
<!-- jQuery 2.2.0 -->
<script src="{{ asset($global->theme_folder.'/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset($global->theme_folder.'/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{ asset($global->theme_folder.'/plugins/froiden-helper/helper.js')}}"></script>

<script>


    function changePassword(){
        $.easyAjax({
            url: "{!! route('post-password-reset') !!}",
            type: "POST",
            data: $(".register-form").serialize(),
            container: ".register-box-body",
            messagePosition: "inline",
            success: function (response) {
                if(response.status == 'success'){
                    $('.register-form').remove();
                }
            }
        });
    }
</script>