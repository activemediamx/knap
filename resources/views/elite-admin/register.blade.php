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
    <link href="{{ asset($global->theme_folder.'/css/colors/'.$global->theme_color.'.css')}}" id="theme"  rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/froiden-helper/helper.css')}}">
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
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
<section id="wrapper" class="login-register register-form">
    <div class="login-box">
        <div class="white-box">
            <h3 class="box-title m-b-20">@lang('core.signUp')</h3>
            <!-- BEGIN REGISTRATION FORM -->
            {!!  Form::open(['url' => '', 'method' => 'POST','class'=>'form-horizontal form-material', 'id' => 'register-form']) 	 !!}
            <div class="form-group">
                <input class="form-control placeholder-no-fix" type="text" placeholder="@lang('core.name')" name="name" /> </div>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <input class="form-control placeholder-no-fix" type="text" placeholder="@lang('core.email')" name="email" /> </div>
            <div class="form-group">
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="@lang('core.password')" name="password" /> </div>

            <div class="form-group">
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="@lang('core.rePassword')" name="password_confirmation" />
            </div>

            <div class="form-group">
                <input type="date" class="form-control form-control-inline date-picker" size="16" name="dob"
                       id="datepicker" placeholder="@lang('dob')" value="">
            </div>
            <div class="form-group">

                    <div class="radio radio-success">
                        <input type="radio" name="gender" id="male" class="md-radio" value="male" checked>
                        <label for="male">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> @lang('core.male')
                        </label>
                    </div>
                    <div class="radio radio-success">
                        <input type="radio" name="gender" id="female" class="md-radio" value="female">
                        <label for="female">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> @lang('core.female')
                        </label>
                    </div>

            </div>

            {{--Custom Fields--}}
            @if($global->custom_field_on_register == 1)
                @foreach($fields as $field)
                    <div class="form-group ">
                        @if( $field->type == 'text')
                            <input type="text" name="custom_fields_data[{{$field->name.'_'.$field->id}}]" class="form-control" placeholder="{{$field->name}}" value="{{$editUser->custom_fields_data['field_'.$field->id] or ''}}">
                        @elseif($field->type == 'password')
                            <input type="password" name="custom_fields_data[{{$field->name.'_'.$field->id}}]" class="form-control" placeholder="{{$field->name}}" value="{{$editUser->custom_fields_data['field_'.$field->id] or ''}}">
                        @elseif($field->type == 'number')
                            <input type="number" name="custom_fields_data[{{$field->name.'_'.$field->id}}]" class="form-control" placeholder="{{$field->name}}" value="{{$editUser->custom_fields_data['field_'.$field->id] or ''}}">

                        @elseif($field->type == 'textarea')
                            <textarea name="custom_fields_data[{{$field->name.'_'.$field->id}}]" class="form-control" id="{{$field->name}}" cols="3" placeholder="{{ucwords($field->name)}}">{{$editUser->custom_fields_data['field_'.$field->id] or ''}}</textarea>

                        @elseif($field->type == 'radio')
                        <label  class="control-label">{{$field->label}}</label>
                            <div class="md-radio-list">

                                @foreach($field->values as $key=>$value)
                                    <div class="radio radio-success">
                                        <input type="radio" name="custom_fields_data[{{$field->name.'_'.$field->id}}]" id="optionsRadios{{$key.$field->id}}"
                                               @if($key==0) checked @endif     class="md-radio" value="{{$value}}">
                                        <label for="optionsRadios{{$key.$field->id}}">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> {{$value}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @elseif($field->type == 'select')
                        <label  class="control-label">{{$field->label}}</label>
                            {!! Form::select($field->name,
                                    $field->values,
                                     isset($editUser)?$editUser->custom_fields_data['field_'.$field->id]:'',['class' => 'form-control gender'])
                             !!}

                        @elseif($field->type == 'checkbox')
                        <label  class="control-label">{{$field->label}}</label>
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
                                   id="datepicker" value="{{ isset($editUser->dob)?Carbon\Carbon::parse($editUser->dob)->format('Y-m-d'):Carbon\Carbon::now()->format('Y-m-d')}}">
                        @endif

                    </div>
                @endforeach
            @endif

            @if($global->recaptcha == 1)
                <div class="form-group">
                    <label class="control-label">@lang('core.captcha')</label>
                    {!! \Greggilbert\Recaptcha\Facades\Recaptcha::render() !!}
                </div>
            @endif

            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" onclick="knap.register('login-register');return false">@lang('core.signUp')</button>
                </div>
            </div>
            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    <p>@lang('messages.alreadyHaveAccount')? <a href="{{route('user.login')}}" class="text-primary m-l-5"><b>@lang('core.signIn')</b></a></p>
                </div>
            </div>

        {!! Form::close()  !!}
        <!-- END LOGIN FORM -->
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
<script src="{{ asset($global->theme_folder.'/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('common/js/laroute.js')}}"></script>
<script src="{{ asset('common/js/knap.js')}}"></script>
<script>

    $('.date-picker').datepicker({
        format: 'yyyy-mm-dd'
    });

</script>
</body>

</html>
