@extends($global->theme_folder.'.layouts.user')

@section('style')
{{--    <link href="{{ asset($global->theme_folder.'/plugins/bootstrap-switch/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />--}}
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
                <div class="form-group form-md-line-input">
                    <label class="col-md-2">@lang('core.mailDriver')</label>
                    <div class="col-md-9">
                        <input name = "mailDriver" type="text" class="form-control"  value = "{{$global->mail_driver or ''}}">
                        <div class="form-control-focus"> </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-2">@lang('core.mailHost')</label>
                    <div class="col-md-9">
                        <input name = "mailHost" type="text" class="form-control"  value = "{{$global->mail_host or ''}}">
                        <div class="form-control-focus"> </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-2">@lang('core.mailPort')</label>
                    <div class="col-md-9">
                        <input name = "mailPort" type="text" class="form-control"  value = "{{$global->mail_port or ''}}">
                        <div class="form-control-focus"> </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-2">@lang('core.mailUsername')</label>
                    <div class="col-md-9">
                        <input name = "mailUsername" type="text" class="form-control"  value = "{{$global->mail_username or ''}}">
                        <div class="form-control-focus"> </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-2">@lang('core.mailPassword')</label>
                    <div class="col-md-9">
                        <input name = "mailPassword" type="password" class="form-control"  value = "{{$global->mail_password or ''}}">
                        <div class="form-control-focus"> </div>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2">@lang('core.mailEncryption')</label>
                    <div class="col-md-9">
                        <select class="page-header-option form-control" name = "mailEncryption">
                            <option @if($global->mail_encryption == 'tls') selected @endif value="tls" selected="selected">@lang('core.tls')</option>
                            <option @if($global->mail_encryption == 'ssl') selected @endif  value="ssl">@lang('core.ssl')</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="setting" value="mail">
                <div class="form-actions noborder">
                    <button type="button" class="btn btn-custom" onclick="knap.addUpdate('settings', '{{$global->id or ''}}');return false">@lang('core.submit')</button>
                </div>
            </div>
            {!! Form::close()!!}
        </div>
    </div>

@endsection

@section('footerjs')
@endsection

@section('scripts-footer')
@endsection

