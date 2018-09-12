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
        {!!  Form::open(['url' => '', 'method' => 'post','class'=>'register-form', 'id' => 'register-form']) !!}
            <p class="login-box-msg">@lang('messages.enterYourDetail')</p>

            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="@lang('core.name')" name="name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="@lang('core.email')" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="@lang('core.password')" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="@lang('core.rePassword')" name="password_confirmation">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <div class="input-group date">
                    <input type="text" class="form-control pull-right" id="datepicker" placeholder="@lang('core.dob')">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                </div>
                <!-- /.input group -->
            </div>

            @if($global->custom_field_on_register == 1)
                @foreach($fields as $field)
                    <div class="form-group has-feedback">

                            @if( $field->type == 'text')
                                <input type="text" name="custom_fields_data[{{$field->name.'_'.$field->id}}]" class="form-control" placeholder="{{ucwords($field->name)}}" value="{{$editUser->custom_fields_data['field_'.$field->id] or ''}}">
                            @elseif($field->type == 'password')
                                <input type="password" name="custom_fields_data[{{$field->name.'_'.$field->id}}]" class="form-control" placeholder="{{ucwords($field->name)}}" value="{{$editUser->custom_fields_data['field_'.$field->id] or ''}}">
                            @elseif($field->type == 'number')
                                <input type="number" name="custom_fields_data[{{$field->name.'_'.$field->id}}]" class="form-control" placeholder="{{ucwords($field->name)}}" value="{{$editUser->custom_fields_data['field_'.$field->id] or ''}}">

                            @elseif($field->type == 'textarea')
                                <textarea name="custom_fields_data[{{$field->name.'_'.$field->id}}]" class="form-control" id="{{$field->name}}" placeholder="{{ucwords($field->name)}}" cols="3">{{$editUser->custom_fields_data['field_'.$field->id] or ''}}</textarea>

                            @elseif($field->type == 'radio')
                                    <label>{{ucwords($field->label)}}</label>
                                    @foreach($field->values as $key=>$value)
                                            <input type="radio" name="custom_fields_data[{{$field->name.'_'.$field->id}}]" id="optionsRadios{{$key.$field->id}}"   @if($key==0) checked @endif  class="minimal" value="{{$value}}">
                                            {{$value}}
                                    @endforeach
                            @elseif($field->type == 'select')
                                 <label>{{ucwords($field->label)}}</label>
                                {!! Form::select($field->name,
                                        $field->values,
                                         isset($editUser)?$editUser->custom_fields_data['field_'.$field->id]:'',['class' => 'form-control gender'])
                                 !!}

                            @elseif($field->type == 'checkbox')
                            <label>{{ucwords($field->label)}}</label>
                                <div class="mt-checkbox-inline">
                                    @foreach($field->values as $key => $value)
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input name="custom_fields_data[{{$field->name.'_'.$field->id}}][]" type="checkbox" value="{{$key}}"> {{$value}}
                                            <span></span>
                                        </label>
                                    @endforeach
                                </div>
                            @elseif($field->type == 'date')
                                <input type="text" class="form-control form-control-inline date-picker" size="16" name="custom_fields_data[{{$field->name.'_'.$field->id}}]"
                                       id="datepicker" placeholder="{{ucwords($field->name)}}" value="{{ isset($editUser->dob)?Carbon\Carbon::parse($editUser->dob)->format('Y-m-d'):Carbon\Carbon::now()->format('Y-m-d')}}">
                            @endif
                            <div class="form-control-focus"> </div>
                            <span class="help-block"></span>
                    </div>
                @endforeach
            @endif

            <div class="form-group has-feedback">
                <label>@lang('core.gender')</label>
                    <input type="radio" name="gender" class="minimal" value="male" checked>
                        @lang('core.male')
                    <input type="radio" name="gender" class="minimal" value="female">
                        @lang('core.female')
            </div>
            @if($global->recaptcha == 1)
                <div class="form-group">
                    <label class="control-label">@lang('core.captcha')</label>
                    {!! \Greggilbert\Recaptcha\Facades\Recaptcha::render() !!}
                </div>
            @endif

            <div class="row">
                <div class="col-xs-8">
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" onclick="knap.register('register-box-body');return false;">@lang('core.signUp')</button>
                </div>
                <!-- /.col -->
            </div>

            <a href="{{ route('user.login') }}" class="text-center">@lang('messages.alreadyHaveAccount')</a>

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
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="{{ asset('common/js/laroute.js')}}"></script>
<script src="{{ asset('common/js/knap.js')}}"></script>
<!-- Laravel Javascript Validation -->
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_minimal-blue',
            increaseArea: '20%' // optional
        });

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
    });


</script>
</body>
</html>
