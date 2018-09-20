<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-{{$iconEdit ?? $icon }} font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">
         @if(isset($editUser->id)) @lang('core.edit')@else @lang('core.add') @endif @lang('core.user')
            </span>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    </div>
    <div class="portlet-body form">
        {!!  Form::open(['url' => '','class'=>'form-horizontal' ,'autocomplete'=>'off','enctype' => 'multipart/form-data','id'=>'add-edit-form']) 	 !!}
        @if(isset($editUser->id)) <input type="hidden" name="_method" value="PUT"> @endif
        <div class="box-body form">
                <div class="form-body">
                    <div class="form-group form-md-line-input">
                        <label class="col-sm-2 control-label" for="name">@lang('core.name')</label>

                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control"  placeholder="@lang('core.name')" value="{{$editUser->name ?? ''}}">
                            <div class="form-control-focus"> </div>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <label class="col-sm-2 control-label" for="email">@lang('core.email')</label>
                        <div class="col-sm-10">
                            <input type="email" name="email"  @if(!isset($editUser->id)) onchange="knap.fetchUserImage(this.value);" @endif class="form-control" placeholder="@lang('core.email')" value="{{$editUser->email ?? ''}}">
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
                        <label  class="col-sm-2 control-label" for="gender">@lang('core.gender')</label>
                        <div class="col-sm-10">
                            {!! Form::select('gender',['male'=>trans('core.male'),'female'=>trans('core.female')],isset($editUser)?$editUser->gender:'',['class'=>'form-control']) !!}
                            <div class="form-control-focus"> </div>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group form-md-line-input">
                        <label  class="col-sm-2 control-label">@lang('core.password')</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" placeholder="@lang('core.password')">
                            @if(isset($editUser->id))
                                <div class="italic">@lang('messages.leaveBlankPassword')</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <label class="col-sm-2 control-label">@lang('core.profileImage')</label>
                        <div class="col-sm-10">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail previewDivOne" style="width: 200px; height: 200px;">
                                    <img src="{{ isset($editUser->id)?$editUser->getGravatarAttribute(250):'https://www.gravatar.com/avatar/7763df2327b3e792aa8883a3c89b4f2b?d=mm&s=250' }}" alt="" id="user-image" /> </div>
                                <div class="fileinput-preview fileinput-exists thumbnail previewOne" style="max-width: 200px; max-height: 200px;"> </div>
                                <div>
                                                                        <span class="btn green btn-file">
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
                                <span class="label label-danger">@lang('core.note')!</span> @lang('messages.imagePreviewNote') </div>
                        </div>
                    </div>

                    @foreach($fields as $field)
                        <div class="form-group form-md-line-input">
                            <label  class="col-sm-2 control-label">{{$field->label}}</label>
                            <div class="col-sm-10">
                                @if( $field->type == 'text')
                                    <input type="text" name="custom_fields_data[{{$field->name.'_'.$field->id}}]" class="form-control" placeholder="{{$field->label}}" value="{{$editUser->custom_fields_data['field_'.$field->id] ?? ''}}">
                                @elseif($field->type == 'password')
                                    <input type="password" name="custom_fields_data[{{$field->name.'_'.$field->id}}]" class="form-control" placeholder="{{$field->label}}" value="{{$editUser->custom_fields_data['field_'.$field->id] ?? ''}}">
                                @elseif($field->type == 'number')
                                    <input type="number" name="custom_fields_data[{{$field->name.'_'.$field->id}}]" class="form-control" placeholder="{{$field->label}}" value="{{$editUser->custom_fields_data['field_'.$field->id] ?? ''}}">

                                @elseif($field->type == 'textarea')
                                    <textarea name="custom_fields_data[{{$field->name.'_'.$field->id}}]" class="form-control" id="{{$field->name}}" cols="3">{{$editUser->custom_fields_data['field_'.$field->id] ?? ''}}</textarea>

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
                    {{---------------------Show Status change for  Edit Users-------------}}
                    @if(isset($editUser->id))
                        <div class="form-group">
                            <label  class="col-sm-2 control-label" for="">@lang('core.status')</label>
                            <div class="col-sm-10">
                                <div class="md-radio-list">
                                    <div class="md-radio">
                                        <input type="radio" name="status" class="md-radio" id="optionsRadios1" value="active" @if($editUser->status=='active') checked @endif>
                                        <label for="optionsRadios1">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> @lang('core.active')
                                        </label>
                                    </div>
                                    <div class="md-radio">

                                        <input type="radio" name="status" class="md-radio" id="optionsRadios2" value="inactive" @if($editUser->status=='inactive') checked @endif>
                                        <label for="optionsRadios2">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> @lang('core.inactive')
                                        </label>
                                    </div>

                                </div>
                            </div>
                            {{--------------------------END HERE----------------------------------}}

                        </div>
                    @endif
                </div>
            </div>

        <div class="modal-footer">
            <button class="btn  dark " data-dismiss="modal" aria-hidden="true">@lang('core.close')</button>
            <button id="save" type="submit" class="btn  green" onclick="knap.addUpdate('users', '{{ $editUser->id ?? ''}}');return false">@lang('core.submit')</button>
        </div>
        {{Form::close()}}
    </div>
</div>

<script>
    $('.date-picker').datepicker({
        format: 'yyyy-mm-dd'
    });

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