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
                                <h3 class="box-title">@lang('menu.generalSettings')</h3>
                            </div>
                            {!! Form::open(['url' => '', 'method' => 'POST', 'id' => 'add-edit-form']) !!}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>@lang('menu.siteName')</label>
                                    <input name = "site_name" type="text" class="form-control"  value="{{$global->site_name or ''}}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('core.name')</label>
                                    <input name = "name" type="text" class="form-control"  value="{{$global->name or ''}}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('core.email')</label>
                                    <input name = "email" type="email" class="form-control"  value="{{$global->email or ''}}">
                                </div>

                                <div class="form-group">
                                    <label>@lang('core.changeLanguage')</label>
                                    <select class="page-header-option form-control" name = "language">
                                        <option value="en" @if($global->locale == 'en') selected @endif>@lang('core.english')</option>
                                        <option value="es" @if($global->locale == 'es') selected @endif>@lang('core.spanish')</option>
                                        <option value="fr" @if($global->locale == 'fr') selected @endif>@lang('core.french')</option>
                                        <option value="ar" @if($global->locale == 'ar') selected @endif>Arabic</option>
                                    </select>
                                </div>

                                <div class="form-group ">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">

                                            <img src="{{ $global->logo != null ? asset('/logo/'.$global->logo) : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA' }}" alt="" /> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"> </div>
                                        <div>
                                                    <span class="btn btn-file btn-default">
                                                    <span class="fileinput-new"> @lang('core.selectImage') </span>
                                                    <span class="fileinput-exists"> @lang('core.change') </span>
                                                    <input type="file" name="image" id="image"> </span>
                                            <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">  @lang('core.remove')  </a>
                                        </div>
                                    </div>
                                    <div class="clearfix margin-top-10">
                                        <span class="label label-danger">@lang('core.note')!</span> @lang('messages.imagePreviewNote') </div>
                                </div>

                                <input type="hidden" name="setting" value="general">
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
    <script src="{{ asset($global->theme_folder.'/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
@endsection

