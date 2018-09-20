@extends($global->theme_folder.'.layouts.user')
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
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="fa fa-gears"></i>
                                    <span class="caption-subject bold uppercase">@lang('menu.socialSettings')</span>
                                </div>
                                <div class="actions">
                                </div>
                            </div>
                            <div class="portlet-body box-body form">
                                {!! Form::open(['url' => '', 'method' => 'post', 'id' => 'add-edit-form','class'=>'form-hrizontal']) !!}
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="form-body">
                                        <h4><strong>@lang('core.facebook')</strong></h4>
                                        <div class="form-group form-md-line-input">
                                            <label class="col-sm-2 control-label" for="name">@lang('core.facebookClientId')</label>
                                            <div class="col-md-6">
                                                <input type="text" name="facebook_client_id" id="facebook_client_id" class="form-control"   value = "{{$global->facebook_client_id or ''}}">
                                                <div class="form-control-focus"> </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="col-sm-2 control-label" for="name">@lang('core.facebookClientSecret')</label>
                                            <div class="col-md-6">
                                                <input type="text" name="facebook_client_secret" id="facebook_client_secret" class="form-control"   value = "{{$global->facebook_client_secret or ''}}">
                                                <div class="form-control-focus"> </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <br>
                                        <h4><strong>@lang('core.google')</strong></h4>
                                        <div class="form-group form-md-line-input">
                                            <label class="col-sm-2 control-label" for="name">@lang('core.googleClientId')</label>
                                            <div class="col-md-6">
                                                <input type="text" name="google_client_id" id="google_client_id" class="form-control"   value = "{{$global->google_client_id or ''}}">
                                                <div class="form-control-focus"> </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="col-sm-2 control-label" for="name">@lang('core.googleClientSecret')</label>
                                            <div class="col-md-6">
                                                <input type="text" name="google_client_secret" id="google_client_secret" class="form-control"   value = "{{$global->google_client_secret or ''}}">
                                                <div class="form-control-focus"> </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <br>
                                        <h4><strong>@lang('core.twitter')</strong></h4>
                                        <div class="form-group form-md-line-input">
                                            <label class="col-sm-2 control-label" for="name">@lang('core.twitterClientId')</label>
                                            <div class="col-md-6">
                                                <input type="text" name="twitter_client_id" id="twitter_client_id" class="form-control"   value = "{{$global->twitter_client_id or ''}}">
                                                <div class="form-control-focus"> </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="col-sm-2 control-label" for="name">@lang('core.twitterClientSecret')</label>
                                            <div class="col-md-6">
                                                <input type="text" name="twitter_client_secret" id="twitter_client_secret" class="form-control"   value = "{{$global->twitter_client_secret or ''}}">
                                                <div class="form-control-focus"> </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <br>
                                        <h4><strong>Recaptcha</strong></h4>
                                        <div class="form-group form-md-line-input">
                                            <label class="col-sm-2 control-label" for="name">@lang('core.recaptchaPublicKey')</label>
                                            <div class="col-md-6">
                                                <input type="text" name="recaptcha_public_key" id="recaptch_public_key" class="form-control"   value = "{{$global->recaptcha_public_key or ''}}">
                                                <div class="form-control-focus"> </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="col-sm-2 control-label" for="name">@lang('core.recaptchaPrivateKey')</label>
                                            <div class="col-md-6">
                                                <input type="text" name="recaptcha_private_key" id="recaptcha_private_key" class="form-control"   value = "{{$global->recaptcha_private_key or ''}}">
                                                <div class="form-control-focus"> </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        
                                        <input type="hidden" name="setting" value="social">
                                        <div class="form-actions noborder">
                                            <button type="button" class="btn  blue" onclick="knap.addUpdate('settings', '{{$global->id or ''}}');return false">@lang('core.submit')</button>

                                        </div>
                                    </div>
                                {!! Form::close()!!}
                            </div>
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

@section('scripts-footer')

@endsection

