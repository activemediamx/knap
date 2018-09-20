
@extends($global->theme_folder.'.layouts.user')
@section('style')
    <link href="{{ asset($global->theme_folder.'/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset($global->theme_folder.'/global/plugins/cropper/dist/cropper.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset($global->theme_folder.'/pages/css/profile.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="profile-sidebar">
                        <!-- PORTLET MAIN -->
                        <div class="portlet light profile-sidebar-portlet bordered">
                            <!-- SIDEBAR USERPIC -->
                            <div class="profile-userpic">
                                <img src="{{ $editUser->getGravatarAttribute(250) }}" class="img-responsive profile-image" alt=""> </div>
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR USER TITLE -->
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name"> {{ $editUser->name }}</div>
                            </div>
                            <!-- END SIDEBAR USER TITLE -->
                        </div>
                    </div>
                    <!-- END BEGIN PROFILE SIDEBAR -->
                    <!-- BEGIN PROFILE CONTENT -->
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption caption-md">
                                            <i class="icon-globe theme-font hide"></i>
                                            <span class="caption-subject font-blue-madison bold uppercase">@lang('core.profileAccount')</span>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_1_1" data-toggle="tab">@lang('messages.personalInfo')</a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_2" data-toggle="tab">@lang('messages.avatar')</a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_3" data-toggle="tab">@lang('messages.changePassword')</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            <!-- PERSONAL INFO TAB -->
                                            <div class="tab-pane active" id="tab_1_1">
                                                {!!  Form::open(['url' => '','class'=>'form-horizontal' ,'autocomplete'=>'off','enctype' => 'multipart/form-data','id'=>'add-edit-form']) 	 !!}
                                                <input type="hidden" name="_method" value="PUT">
                                                <div class="box-body form">
                                                    <div class="form-body">
                                                        <div class="form-group form-md-line-input">
                                                            <label class="col-sm-2 control-label" for="name">@lang('core.name')</label>

                                                            <div class="col-sm-10">
                                                                <input type="text" name="name" id="name" class="form-control"  placeholder="@lang('core.name')" value="{{$editUser->name or ''}}">
                                                                <div class="form-control-focus"> </div>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="type" value="personalInfo">
                                                        <div class="form-group form-md-line-input">
                                                            <label class="col-sm-2 control-label" for="email">@lang('core.email')</label>
                                                            <div class="col-sm-10">
                                                                <input type="email" name="email" id="email" class="form-control" placeholder="@lang('core.email')" value="{{$editUser->email or ''}}">
                                                                <div class="form-control-focus"> </div>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group form-md-line-input">
                                                            <label  class="col-sm-2 control-label" for="datepicker">@lang('core.dob')</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control form-control-inline date-picker" size="16" name="dob" id="datepicker" value="{{ isset($editUser->dob)?Carbon\Carbon::parse($editUser->dob)->format('Y-m-d'):Carbon\Carbon::now()->format('Y-m-d')}}">
                                                                <div class="form-control-focus"> </div>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-md-line-input">
                                                            <label  class="col-sm-2 control-label" for="gender">Gender</label>
                                                            <div class="col-sm-10">
                                                                {!! Form::select('gender',['male'=>trans('core.male'),'female'=>trans('core.female')],isset($editUser)?$editUser->gender:'',['class' => 'form-control gender']) !!}
                                                                <div class="form-control-focus"> </div>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>

                                                        @foreach($fields as $field)
                                                            <div class="form-group form-md-line-input">
                                                                <label  class="col-sm-2 control-label">{{$field->label}}</label>
                                                                <div class="col-sm-10">
                                                                    @if( $field->type == 'text')
                                                                        <input type="text" name="custom_fields_data[{{$field->name.'_'.$field->id}}]" class="form-control" placeholder="{{$field->label}}" value="{{$editUser->custom_fields_data['field_'.$field->id] or ''}}">
                                                                    @elseif($field->type == 'password')
                                                                        <input type="password" name="custom_fields_data[{{$field->name.'_'.$field->id}}]" class="form-control" placeholder="{{$field->label}}" value="{{$editUser->custom_fields_data['field_'.$field->id] or ''}}">
                                                                    @elseif($field->type == 'number')
                                                                        <input type="number" name="custom_fields_data[{{$field->name.'_'.$field->id}}]" class="form-control" placeholder="{{$field->label}}" value="{{$editUser->custom_fields_data['field_'.$field->id] or ''}}">

                                                                    @elseif($field->type == 'textarea')
                                                                        <textarea name="custom_fields_data[{{$field->name.'_'.$field->id}}]" class="form-control" id="{{$field->name}}" cols="3">{{$editUser->custom_fields_data['field_'.$field->id] or ''}}</textarea>

                                                                    @elseif($field->type == 'radio')
                                                                        <div class="md-radio-list">

                                                                            @foreach($field->values as $key=>$value)
                                                                                <div class="md-radio">
                                                                                    <input type="radio" name="custom_fields_data[{{$field->name.'_'.$field->id}}]" id="optionsRadios{{$key.$field->id}}" class="md-radio" value="{{$value}}"
                                                                                           @if(isset($editUser) && $editUser->custom_fields_data['field_'.$field->id] == $value) checked @elseif($key==0) checked @endif>
                                                                                    <label for="optionsRadios{{$key.$field->id}}">
                                                                                        <span></span>
                                                                                        <span class="check"></span>
                                                                                        <span class="box"></span> {{$value}}
                                                                                    </label>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
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
                                                                        <input type="text" class="form-control form-control-inline date-picker" size="16" name="custom_fields_data[{{$field->name.'_'.$field->id}}]"
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
                                                    <button id="save" type="submit" class="btn  green" onclick="knap.addUpdate('profiles', '{{$editUser->id or ''}}');return false">@lang('core.submit')</button>
                                                </div>
                                                {{Form::close()}}
                                            </div>
                                            <!-- END PERSONAL INFO TAB -->
                                            <!-- CHANGE AVATAR TAB -->
                                            <div class="tab-pane" id="tab_1_2">
                                                {!!  Form::open(['url' => '','class'=>'form-horizontal' ,'autocomplete'=>'off','enctype' => 'multipart/form-data','id'=>'updateImage']) 	 !!}
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <div class="form-group form-md-line-input">
                                                        <label class="col-sm-2 control-label">@lang('core.profileImage')</label>
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail previewDivOne" style="width: 200px; height: 200px;">
                                                                <img src="{{ isset($editUser->id)?$editUser->getGravatarAttribute(250):'' }}" alt="" /> </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail previewOne" style="max-width: 200px; max-height: 200px;"> </div>
                                                            <div>
                                                                        <span class="btn green btn-file">
                                                                            <span class="fileinput-new"> @lang('core.selectImage') </span>
                                                                            <span class="fileinput-exists">  @lang('core.change') </span>
                                                                            <input type="file" name="image" id="imageCropOne" class="photo_input"> </span>
                                                                <input type="hidden" name="xCoordOne" id="xCoordOne">
                                                                <input type="hidden" name="yCoordOne" id="yCoordOne">
                                                                <input type="hidden" name="profileImageWidth" id="profileImageWidth">
                                                                <input type="hidden" name="profileImageHeight" id="profileImageHeight">
                                                            </div>

                                                        </div>
                                                        <input type="hidden" name="id" value=""/>


                                                    </div>
                                                <span class="label label-danger">@lang('core.note')!</span> @lang('messages.imagePreviewNote')
                                                    <input type="hidden" name="type" value="avatar">
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn green" onclick="knap.updateImage('profiles','{{$editUser->id}}');return false"> @lang('core.submit') </button>
                                                    </div>
                                                {!! Form::close() !!}
                                            </div>
                                            <!-- END CHANGE AVATAR TAB -->
                                            <!-- CHANGE PASSWORD TAB -->
                                            <div class="tab-pane" id="tab_1_3">

                                                {!!  Form::open(['url' => '','class'=>'form-horizontal' ,'autocomplete'=>'off','id'=>'changePassword']) 	 !!}
                                                <div class="box-body form">
                                                    <div class="form-body">
                                                    <input type="hidden" name="id" value=""/>
                                                    <input type="hidden" name="type" value="password">
                                                    <div class="form-group form-md-line-input">
                                                        <label class="col-sm-2 control-label">@lang('core.newPassword')</label>
                                                        <div class="col-sm-10">
                                                         <input type="password" class="form-control" name="password" id="password"/>
                                                         </div>
                                                    </div>
                                                    <div class="form-group form-md-line-input">
                                                        <label class="col-sm-2 control-label">@lang('core.reTypePassword')</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"/>
                                                          </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn green" onclick="knap.changePassword('profiles','{{$editUser->id}}');return false;"> @lang('menu.changePassword') </button>
                                                    </div>
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}

                                            </div>
                                            <!-- END CHANGE PASSWORD TAB -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PROFILE CONTENT -->
                </div>
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
        <!-- image crop model -->
    @include($global->theme_folder.'.include.image-crop-modal')
@endsection

@section('scripts-footer')
<script src="{{ asset($global->theme_folder.'/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset($global->theme_folder.'/global/plugins/cropper/dist/cropper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset($global->theme_folder.'/global/plugins/cropper/js/main.js') }}" type="text/javascript"></script>

<script>
    $('.date-picker').datepicker({
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