@extends($global->theme_folder.'.layouts.user')
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
            {!! Form::open(['url' => '', 'method' => 'post', 'id' => 'add-edit-form']) !!}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <label for="form_control_1">@lang('core.facebookClientId')</label>
                    <input name = "facebook_client_id" type="text" class="form-control"  value = "{{$global->facebook_client_id or ''}}">
                </div>
                <div class="form-group form-md-line-input">
                    <label for="form_control_1">@lang('core.facebookClientSecret')</label>
                    <input name = "facebook_client_secret" type="text" class="form-control"  value = "{{$global->facebook_client_secret or ''}}">
                </div>
                <div class="form-group form-md-line-input">
                    <label for="form_control_1">@lang('core.googleClientId')</label>
                    <input name = "google_client_id" type="text" class="form-control"  value = "{{$global->google_client_id or ''}}">

                </div>
                <div class="form-group form-md-line-input">
                    <label for="form_control_1">@lang('core.googleClientSecret')</label>
                    <input name = "google_client_secret" type="text" class="form-control"  value = "{{$global->google_client_secret or ''}}">

                </div>
                <div class="form-group form-md-line-input">
                    <label for="form_control_1">@lang('core.twitterClientId')</label>
                    <input name = "twitter_client_id" type="text" class="form-control"  value = "{{$global->twitter_client_id or ''}}">

                </div>
                <div class="form-group form-md-line-input">
                    <label for="form_control_1">@lang('core.twitterClientSecret')</label>
                    <input name = "twitter_client_secret" type="text" class="form-control"  value = "{{$global->twitter_client_secret or ''}}">

                </div>
                <div class="form-group form-md-line-input">
                    <label for="form_control_1">@lang('core.recaptchaPublicKey')</label>
                    <input name = "recaptcha_public_key" type="text" class="form-control"  value = "{{$global->recaptcha_public_key or ''}}">

                </div>
                <div class="form-group form-md-line-input">
                    <label for="form_control_1">@lang('core.recaptchaPrivateKey')</label>
                    <input name = "recaptcha_private_key" type="text" class="form-control"  value = "{{$global->recaptcha_private_key or ''}}">

                </div>
                <input type="hidden" name="setting" value="social">
                <div class="form-actions noborder">
                    <button type="button" class="btn  btn-custom" onclick="knap.addUpdate('settings', '{{$global->id or ''}}');return false">@lang('core.submit')</button>
                </div>
            </div>
            {!! Form::close()!!}
        </div>
    </div>

@endsection

@section('scripts-footer')

@endsection

