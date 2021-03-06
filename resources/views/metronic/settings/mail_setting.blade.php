@extends($global->theme_folder.'.layouts.user')

@section('style')
    <link href="{{ asset($global->theme_folder.'/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
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
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="fa fa-gears"></i>
                                    <span class="caption-subject bold uppercase"> @lang('menu.mailSettings') </span>
                                </div>
                                <div class="actions">
                                </div>
                            </div>
                            <div class="portlet-body form">
                                {!! Form::open(['url' => '', 'method' => 'post', 'id' => 'add-edit-form', 'class' => 'form-horizontal']) !!}
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-body">
                                    <div class="form-group form-md-line-input">
                                        <label class="control-label col-md-3">@lang('core.mailDriver')</label>
                                        <div class="col-md-9">
                                            <input name = "mailDriver" type="text" class="form-control"  value = "{{$global->mail_driver ?? ''}}">
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <label class="control-label col-md-3">@lang('core.mailHost')</label>
                                        <div class="col-md-9">
                                            <input name = "mailHost" type="text" class="form-control"  value = "{{$global->mail_host ?? ''}}">
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <label class="control-label col-md-3">@lang('core.mailPort')</label>
                                        <div class="col-md-9">
                                            <input name = "mailPort" type="text" class="form-control"  value = "{{$global->mail_port ?? ''}}">
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <label class="control-label col-md-3">@lang('core.mailUsername')</label>
                                        <div class="col-md-9">
                                            <input name = "mailUsername" type="text" class="form-control"  value = "{{$global->mail_username ?? ''}}">
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <label class="control-label col-md-3">@lang('core.mailPassword')</label>
                                        <div class="col-md-9">
                                            <input name = "mailPassword" type="password" class="form-control"  value = "{{$global->mail_password ?? ''}}">
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">@lang('core.mailEncryption')</label>
                                        <div class="col-md-9">
                                            <select class="page-header-option form-control" name = "mailEncryption">
                                                <option @if($global->mail_encryption == 'tls') selected @endif value="tls" selected="selected">@lang('core.tls')</option>
                                                <option @if($global->mail_encryption == 'ssl') selected @endif  value="ssl">@lang('core.ssl')</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="setting" value="mail">
                                    <div class="form-actions noborder">
                                        <button type="button" class="btn  blue" onclick="knap.addUpdate('settings', '{{$global->id ?? ''}}');return false">@lang('core.submit')</button>

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

@section('footerjs')
    <script src="{{ asset($global->theme_folder.'/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
@endsection

@section('scripts-footer')
@endsection

