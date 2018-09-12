
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
                                <h3 class="box-title">@lang('menu.mailSettings') </h3>
                            </div>
                            {!! Form::open(['url' => '', 'method' => 'post', 'id' => 'add-edit-form', 'class' => '']) !!}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="box-body">

                                <div class="form-group">
                                    <label>@lang('core.mailDriver')</label>
                                    <input name = "mailDriver" type="text" class="form-control"  value = "{{$global->mail_driver or ''}}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('core.mailHost')</label>
                                    <input name = "mailHost" type="text" class="form-control"  value = "{{$global->mail_host or ''}}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('core.mailPort')</label>
                                    <input name = "mailPort" type="text" class="form-control"  value = "{{$global->mail_port or ''}}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('core.mailUsername')</label>
                                    <input name = "mailUsername" type="text" class="form-control"  value = "{{$global->mail_username or ''}}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('core.mailPassword')</label>
                                    <input name = "mailPassword" type="password" class="form-control"  value = "{{$global->mail_password or ''}}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('core.mailEncryption')</label>
                                    <select class="page-header-option form-control" name = "mailEncryption">
                                        <option @if($global->mail_encryption == 'tls') selected @endif value="tls" selected="selected">@lang('core.tls')</option>
                                        <option @if($global->mail_encryption == 'ssl') selected @endif  value="ssl">@lang('core.ssl')</option>
                                    </select>
                                </div>

                                <input type="hidden" name="setting" value="mail">
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

