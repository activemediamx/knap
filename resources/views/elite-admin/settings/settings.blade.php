@extends($global->theme_folder.'.layouts.user')

@section('style')
    <link href="{{ asset($global->theme_folder.'/plugins/bootstrap-switch/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-header')
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{$pageTitle}}</h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

            <ol class="breadcrumb">
                <li><a href="#">@lang('menu.home')</a></li>
                <li class="active">{{$pageTitle}}</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection
@section('content')
    <div class="panel panel-default">

        <div class="panel-body">
            {!! Form::open(['url' => '', 'method' => 'post', 'id' => 'add-edit-form', 'class' => 'form-horizontal']) !!}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-body">

                <div class="form-group">
                    <label class="control-label col-md-3">@lang('core.emailNotification')</label>
                    <div class="col-md-9">
                        <input type="checkbox"  @if($global->email_notification == 1) checked @endif class="make-switch" data-size="normal" name="emailNotification" value="1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">@lang('core.recaptcha')</label>
                    <div class="col-md-9">
                        <input type="checkbox" @if($global->recaptcha == 1) checked @endif class="make-switch" data-size="normal" name="recaptcha" value="1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">@lang('core.rememberMe')</label>
                    <div class="col-md-9">
                        <input type="checkbox" @if($global->remember_me == 1) checked @endif class="make-switch" data-size="normal" name="rememberMe" value="1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">@lang('core.forgetPassword')</label>
                    <div class="col-md-9">
                        <input type="checkbox" @if($global->forget_password == 1) checked @endif class="make-switch" data-size="normal"  name="forgetPassword" value="1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">@lang('core.allowRegister')</label>
                    <div class="col-md-9">
                        <input type="checkbox" @if($global->allow_register == 1) checked @endif class="make-switch" data-size="normal"  name="allowRegister" value="1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">@lang('core.emailConfirmation')</label>
                    <div class="col-md-9">
                        <input type="checkbox" @if($global->email_confirmation == 1) checked @endif class="make-switch" data-size="normal"  name="emailConfirmation" value="1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">@lang('core.customFieldOnRegister')</label>
                    <div class="col-md-9">
                        <input type="checkbox" @if($global->custom_field_on_register == 1) checked @endif class="make-switch" data-size="normal"  name="customOnRegister" value="1">
                    </div>
                </div>

                <input type="hidden" name="setting" value="settings">
                <div class="form-actions noborder">
                    <button type="button" class="btn btn-custom" onclick="knap.addUpdate('settings', '{{$global->id or ''}}');return false">@lang('core.submit')</button>
                </div>
            </div>
            {!! Form::close()!!}
        </div>
    </div>

@endsection

@section('footerjs')
    <script src="{{ asset($global->theme_folder.'/plugins/bootstrap-switch/bootstrap-switch.min.js') }}"></script>
@endsection

@section('scripts-footer')
    <script>
        $(function () {
            $('.make-switch').bootstrapSwitch();
        });
    </script>
@endsection

