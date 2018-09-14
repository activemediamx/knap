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
            {!! Form::open(['url' => '', 'method' => 'POST', 'id' => 'add-edit-form', 'enctype' => 'multipart/form-data']) !!}
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="setting" value="general">
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <label for="form_control_1">@lang('menu.siteName')</label>
                    <input name = "site_name" id="site_name" type="text" class="form-control"  value = "{{$global->site_name or ''}}"/>

                </div>
                <div class="form-group form-md-line-input">
                    <label for="form_control_1">@lang('core.name')</label>
                    <input name = "name" id="name" type="text" class="form-control"  value = "{{$global->name or ''}}"/>

                </div>
                <div class="form-group form-md-line-input">
                    <label for="form_control_1">@lang('core.email')</label>
                    <input name = "email" id="email" type="email" class="form-control"  value = "{{$global->email or ''}}"/>

                </div>

                <div class="form-group form-md-line-input">
                    <label class="col-md-2">@lang('core.changeLanguage')</label>

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
                                                    <span class="btn btn-file btn-default btn-outline">
                                                    <span class="fileinput-new" > @lang('core.selectImage') </span>
                                                    <span class="fileinput-exists"> @lang('core.change') </span>
                                                    <input type="file" name="image" id="image"> </span>
                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> @lang('core.remove') </a>
                        </div>
                    </div>
                    <div class="clearfix margin-top-10">
                        <span class="label label-danger">@lang('core.note')!</span> @lang('messages.imagePreviewNote') </div>
                </div>
                <div class="form-actions noborder">
                    <button type="button" class="btn btn-custom" onclick="knap.addUpdate('settings', '{{$global->id or ''}}');return false">@lang('core.submit')</button>
                </div>
            </div>
            {!! Form::close()!!}
        </div>
    </div>

@endsection

@section('scripts-footer')

@endsection

