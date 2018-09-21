
@extends($global->theme_folder.'.layouts.user')
@section('style')
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/cropper/dist/cropper.min.css')}}">
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
    <div class="row">
        <div class="col-md-4 col-xs-12">
            <div class="white-box">
                <div class="user-bg"> <img class="profile-image" width="100%" alt="user" src="{{ isset($editUser->id)?$editUser->getGravatarAttribute(250):'' }}">
                    <div class="overlay-box">
                        <div class="user-content"> <a href="javascript:void(0)"><img src="{{ isset($editUser->id)?$editUser->getGravatarAttribute(250):'' }}" class="thumb-lg img-circle profile-image" alt="img"></a>
                            <h4 class="text-white">{{ $editUser->name }}</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-8 col-xs-12">
            <div class="white-box">
                <ul class="nav nav-tabs tabs customtab">
                    <li class="active tab"><a href="#personalInfo" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">@lang('messages.personalInfo')</span> </a> </li>
                    <li class="tab"><a href="#avatar" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">@lang('messages.avatar')</span> </a> </li>
                    <li class="tab"><a href="#password" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs">@lang('messages.changePassword')</span> </a> </li>
                    </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="personalInfo">
                        {!!  Form::open(['url' => '','class'=>'form-horizontal' ,'autocomplete'=>'off','enctype' => 'multipart/form-data','id'=>'add-edit-form']) 	 !!}
                        @if(isset($editUser->id)) <input type="hidden" name="_method" value="PUT"> @endif
                        <input type="hidden" name="type" value="personalInfo">
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">@lang('core.name')</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control"  placeholder="@lang('core.name')" value="{{$editUser->name ?? ''}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">@lang('core.email')</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" placeholder="@lang('core.email')" value="{{$editUser->email ?? ''}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">@lang('core.dob')</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control datepicker" name="dob" id="datepicker" value="{{ isset($editUser->dob)?Carbon\Carbon::parse($editUser->dob)->format('Y-m-d'):Carbon\Carbon::now()->format('Y-m-d')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Gender</label>
                                    <div class="col-sm-10">
                                        {!! Form::select('gender',['male'=>'Male','female'=>'Female'],isset($editUser)?$editUser->gender:'') !!}
                                    </div>
                                </div>

                                @foreach($fields as $field)
                                    <div class="form-group">
                                        <label  class="col-sm-2 control-label">{{$field->label}}</label>
                                        <div class="col-sm-10">
                                            @if( $field->type == 'text')
                                                <input type="text" name="custom_fields_data[{{$field->name.'_'.$field->id}}]" class="form-control" placeholder="{{$field->name}}" value="{{$editUser->custom_fields_data['field_'.$field->id] ?? ''}}">
                                            @elseif($field->type == 'password')
                                                <input type="password" name="custom_fields_data[{{$field->name.'_'.$field->id}}]" class="form-control" placeholder="{{$field->name}}" value="{{$editUser->custom_fields_data['field_'.$field->id] ?? ''}}">
                                            @elseif($field->type == 'number')
                                                <input type="number" name="custom_fields_data[{{$field->name.'_'.$field->id}}]" class="form-control" placeholder="{{$field->name}}" value="{{$editUser->custom_fields_data['field_'.$field->id] ?? ''}}">

                                            @elseif($field->type == 'textarea')
                                                <textarea name="custom_fields_data[{{$field->name.'_'.$field->id}}]" class="form-control" id="{{$field->name}}" cols="3">{{$editUser->custom_fields_data['field_'.$field->id] ?? ''}}</textarea>

                                            @elseif($field->type == 'radio')
                                                @foreach($field->values as $key => $value)
                                                    <div class="radio radio-success">
                                                        <input type="radio" name="custom_fields_data[{{$field->name.'_'.$field->id}}]" id="optionsRadios{{$key.$field->id}}" class="md-radio" id="optionsRadios1" value="{{$value}}"
                                                               @if(isset($editUser) && $editUser->custom_fields_data['field_'.$field->id] == $value) checked @elseif($key==0) checked @endif>
                                                        <label for="optionsRadios{{$key.$field->id}}"> {{$value}} </label>
                                                    </div>
                                                @endforeach
                                            @elseif($field->type == 'select')
                                                {!! Form::select('custom_fields_data['.$field->name.'_'.$field->id.']',
                                                        $field->values,
                                                         isset($editUser)?$editUser->custom_fields_data['field_'.$field->id]:'',['class' => 'form-control gender'])
                                                 !!}

                                            @elseif($field->type == 'checkbox')
                                                <div class="mt-checkbox-inline">
                                                    @foreach($field->values as $key => $value)
                                                        <label class="mt-checkbox mt-checkbox-outline">
                                                            <input name="custom_fields_data[{{$field->name.'_'.$field->id}}][]" type="checkbox" value="{{$key}}"> {{$value}}
                                                            <span></span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            @elseif($field->type == 'date')
                                                <input type="text" class="form-control form-control-inline datepicker" size="16" name="custom_fields_data[{{$field->name.'_'.$field->id}}]"
                                                       id="datepicker" value="{{ isset($editUser->dob)?Carbon\Carbon::parse($editUser->dob)->format('Y-m-d'):Carbon\Carbon::now()->format('Y-m-d')}}"
                                            @endif
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block"></span>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="save" type="submit" class="btn btn-custom" onclick="knap.addUpdate('profiles', '{{$editUser->id ?? ''}}');return false">@lang('core.submit')</button>
                            <button class="btn btn-default btn-outline" data-dismiss="modal" aria-hidden="true">@lang('core.close')</button>
                        </div>
                        {{Form::close()}}
                    </div>
                    <div class="tab-pane" id="avatar">
                        {!!  Form::open(['url' => '','class'=>'form-horizontal' ,'autocomplete'=>'off','enctype' => 'multipart/form-data','id'=>'updateImage']) 	 !!}
                        @if(isset($editUser->id)) <input type="hidden" name="_method" value="PUT"> @endif
                        <div class="modal-body">
                            <div class="box-body">

                                <div class="form-group form-md-line-input">
                                    <label class="col-sm-2 control-label">@lang('core.profileImage')</label>
                                    <div class="col-sm-10">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail previewDivOne" style="width: 200px; height: 200px;">
                                                <img src="{{ isset($editUser->id)?$editUser->getGravatarAttribute(250):'' }}" alt="" />
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail previewOne" style="max-width: 200px; max-height: 200px;"> </div>
                                            <div>
                                                   <span class="btn btn-file btn-default btn-outline">
                                                    <span class="fileinput-new"> @lang('core.selectImage') </span>
                                                    <span class="fileinput-exists"> @lang('core.change') </span>
                                                    <input type="file" name="image" id="imageCropOne" class="photo_input"> </span>
                                                <input type="hidden" name="xCoordOne" id="xCoordOne">
                                                <input type="hidden" name="yCoordOne" id="yCoordOne">
                                                <input type="hidden" name="profileImageWidth" id="profileImageWidth">
                                                <input type="hidden" name="profileImageHeight" id="profileImageHeight">
                                            </div>
                                        </div>
                                        <div class="clearfix margin-top-10">
                                            <span class="label label-danger">@lang('core.note')!</span>  @lang('messages.imagePreviewNote') </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="type" value="avatar">
                        <div class="modal-footer">
                            <button id="save" type="submit" class="btn btn-custom" onclick="knap.updateImage('profiles', '{{$editUser->id ?? ''}}');return false"> @lang('core.submit')</button>
                            <button class="btn btn-default btn-outline" data-dismiss="modal" aria-hidden="true"> @lang('core.close')</button>
                        </div>
                        {{Form::close()}}
                    </div>
                    <div class="tab-pane" id="password">
                        {!!  Form::open(['url' => '','class'=>'form-horizontal' ,'autocomplete'=>'off','enctype' => 'multipart/form-data','id'=>'changePassword']) 	 !!}
                        @if(isset($editUser->id)) <input type="hidden" name="_method" value="PUT"> @endif
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">@lang('core.newPassword')</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" placeholder="@lang('core.password')">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">@lang('core.reTypePassword')</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="@lang('core.reTypePassword')">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <input type="hidden" name="type" value="password">
                        <div class="modal-footer">
                            <button id="save" type="submit" class="btn btn-custom" onclick="knap.changePassword('profiles', '{{$editUser->id ?? ''}}');return false">@lang('core.submit')</button>
                            <button class="btn btn-default btn-outline" data-dismiss="modal" aria-hidden="true">@lang('core.close')</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- image crop model -->
    @include($global->theme_folder.'.include.image-crop-modal')
@endsection

@section('footerjs')
    <!-- DataTables -->
    <script src="{{ asset($global->theme_folder.'/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ asset($global->theme_folder.'/plugins/cropper/dist/cropper.min.js')}}"></script>
    <script src="{{ asset($global->theme_folder.'/plugins/cropper/js/main.js')}}"></script>
    <script src="{{ asset($global->theme_folder.'/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript">
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });

    </script>
    <script>

        var heightCropOne = '{{ \Config::get('image_size.height') }}';
        var widthCropOne = '{{  \Config::get('image_size.width') }}';

        var $previewsOne  = $('.previewOne');
        var $imageCrop = $('#cropper-example-5 > img'),
            advertCropBoxData,
            advertCanvasData;



        function readImageURL(input) {
            //  console.log(input.id);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#cropper-example-5 > img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageCropOne").change(function(){
            readImageURL(this);
            $('#crop_image').modal('show');

        });

        $("#advertImageCropButton").click(function(){
            $('#crop_image').modal('hide');
        });


        $('#crop_image').on('shown.bs.modal', function () {

            $imageCrop.cropper({
                autoCropArea: 0.8,
                aspectRatio: widthCropOne / heightCropOne ,
                dragMode:'move',
                guides: true,
                highlight: true,
                dragCrop: true,
                cropBoxMovable: true,
                cropBoxResizable: true,
                mouseWheelZoom: true,
                touchDragZoom:false,
                built: function () {

                    // Width and Height params are number types instead of string
                    $imageCrop.cropper('setCropBoxData', {width: widthCropOne, height: heightCropOne} );
                    $imageCrop.cropper('setCanvasData', advertCanvasData);
                    var $clone = $(this).clone();
                    $clone.css({
                        display: 'block',
                        width: '100%',
                        minWidth: 0,
                        minHeight: 0,
                        maxWidth: 'none',
                        maxHeight: 'none'
                    });

                    $previewsOne.css({
                        width: '100%',
                        overflow: 'hidden'
                    }).html($clone);

                    $clone.removeAttr( "class" );
                },
                crop: function(e) {
                    // Output the result data for cropping image.

                    $previews        = $previewsOne;
                    $previewDiv      = $('.previewDivOne');

                    var imageDataCrops = $(this).cropper('getImageData');

                    var previewAspectRatio = e.width / e.height;

                    $previewsOne.each(function () {
                        var $preview = $(this);
                        var previewWidth = $preview.width();
                        var previewHeight = previewWidth / previewAspectRatio;
                        var imageScaledRatio = e.width / previewWidth;

                        $preview.find('img').removeAttr( "class" );

                        $previewDiv.css({
                            width: widthCropOne,
                            height: heightCropOne,
                            overflow: 'hidden'
                        });

                        $preview.height(previewHeight).find('img').css({
                            width: imageDataCrops.naturalWidth / imageScaledRatio,
                            height: imageDataCrops.naturalHeight / imageScaledRatio,
                            marginLeft: -e.x / imageScaledRatio,
                            marginTop: -e.y / imageScaledRatio
                        });
                    });

                    $('#xCoordOne').val(e.x);
                    $('#yCoordOne').val(e.y);
                    $('#profileImageWidth').val(e.width);
                    $('#profileImageHeight').val(e.height);

                }

            });
        }).on('hidden.bs.modal', function () {
            advertCropBoxData = $imageCrop.cropper('getCropBoxData');
            advertCanvasData = $imageCrop.cropper('getCanvasData');
            $imageCrop.cropper('destroy');
        });

        $("#advertImageCropButton").click(function(){
            $('#crop_image').modal('hide');
        });

    </script>
@endsection