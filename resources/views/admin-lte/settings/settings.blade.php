
@extends($global->theme_folder.'.layouts.user')

@section('style')
    <link href="{{ asset($global->theme_folder.'/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <!-- END PAGE TITLE -->
            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BREADCRUMB -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">@lang('menu.settings') </h3>
                            </div>
                            {!! Form::open(['url' => '', 'method' => 'post', 'id' => 'add-edit-form', 'class' => 'form-horizontal']) !!}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">@lang('core.emailNotification')</label>
                                    <div class="col-sm-9">
                                        <input type="checkbox"  @if($global->email_notification == 1) checked @endif class="make-switch" data-size="normal" name="emailNotification" value="1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">@lang('core.recaptcha')</label>
                                    <div class="col-sm-9">
                                        <input type="checkbox" @if($global->recaptcha == 1) checked @endif class="make-switch" data-size="normal" name="recaptcha" value="1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">@lang('core.rememberMe')</label>
                                    <div class="col-sm-9">
                                        <input type="checkbox" @if($global->remember_me == 1) checked @endif class="make-switch" data-size="normal" name="rememberMe" value="1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">@lang('core.forgetPassword')</label>
                                    <div class="col-sm-9">
                                        <input type="checkbox" @if($global->forget_password == 1) checked @endif class="make-switch" data-size="normal"  name="forgetPassword" value="1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">@lang('core.allowRegister')</label>
                                    <div class="col-sm-9">
                                        <input type="checkbox" @if($global->allow_register == 1) checked @endif class="make-switch" data-size="normal"  name="allowRegister" value="1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">@lang('core.emailConfirmation')</label>
                                    <div class="col-sm-9">
                                        <input type="checkbox" @if($global->email_confirmation == 1) checked @endif class="make-switch" data-size="normal"  name="emailConfirmation" value="1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">@lang('core.customFieldOnRegister')</label>
                                    <div class="col-sm-9">
                                        <input type="checkbox" @if($global->custom_field_on_register == 1) checked @endif class="make-switch" data-size="normal"  name="customOnRegister" value="1">
                                    </div>
                                </div>

                                <input type="hidden" name="setting" value="settings">
                                <div class="box-footer">
                                    <button type="button" class="btn btn-primary" onclick="knap.addUpdate('settings', '{{$global->id or ''}}');return false">@lang('core.submit')</button>

                                </div>
                            </div>
                            {!! Form::close()!!}
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>
            </section>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE BASE CONTENT -->
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
@endsection

@section('footerjs')
    <script src="{{ asset($global->theme_folder.'/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
@endsection

@section('scripts-footer')
    <script>
        $(function () {
            $('.make-switch').bootstrapSwitch();
        });
    </script>
@endsection

