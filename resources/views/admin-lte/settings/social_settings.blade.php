
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
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">@lang('menu.socialSettings')</h3>
                            </div>
                            {!! Form::open(['url' => '', 'method' => 'post', 'id' => 'add-edit-form']) !!}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>@lang('core.facebookClientId')</label>
                                    <input name = "facebook_client_id" type="text" class="form-control"  value="{{$global->facebook_client_id or ''}}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('core.facebookClientSecret')</label>
                                    <input name = "facebook_client_secret" type="text" class="form-control"  value="{{$global->facebook_client_secret or ''}}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('core.googleClientId')</label>
                                    <input name = "google_client_id" type="text" class="form-control"  value="{{$global->google_client_id or ''}}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('core.googleClientSecret')</label>
                                    <input name = "google_client_secret" type="text" class="form-control"  value="{{$global->google_client_secret or ''}}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('core.twitterClientId')</label>
                                    <input name = "twitter_client_id" type="text" class="form-control"  value="{{$global->twitter_client_id or ''}}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('core.twitterClientSecret')</label>
                                    <input name = "twitter_client_secret" type="text" class="form-control"  value="{{$global->twitter_client_secret or ''}}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('core.recaptchaPublicKey')</label>
                                    <input name = "recaptcha_public_key" type="text" class="form-control"  value="{{$global->recaptcha_public_key or ''}}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('core.recaptchaPrivateKey')</label>
                                    <input name = "recaptcha_private_key" type="text" class="form-control"  value="{{$global->recaptcha_private_key or ''}}">
                                </div>
                                <input type="hidden" name="setting" value="social">
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


@section('scripts-footer')

@endsection

