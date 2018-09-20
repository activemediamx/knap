<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-{{$iconEdit or $icon }} font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">
         @if(isset($permissions->id)) @lang('menu.editPermission')@else @lang('menu.addPermission') @endif
            </span>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    </div>

<div class="portlet-body form">
{!!  Form::open(['url' => '' ,'method' => 'post', 'id' => 'add-edit-form','class'=>'form-horizontal']) 	 !!}
    @if(isset($permissions->id)) <input type="hidden" name="_method" value="PUT"> @endif
    <div class="box-body form">
        <div class="form-body">
            <div class="form-group form-md-line-input">
                <label class="col-sm-2 control-label" for="name">@lang('core.name')</label>
                <div class="col-sm-10">
                    <input type="text" @if(isset($permissions) && in_array($permissions->name,$permdata)) readonly @endif name="name" id="name" class="form-control"  value="{{ $permissions->name or '' }}" placeholder="@lang('core.enterPermissionName')">

                    <div class="form-control-focus"> </div>
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group form-md-line-input">
                <label class="col-sm-2 control-label" for="display_name">@lang('core.displayName')</label>
                <div class="col-sm-10">
                    <input type="text" id="display_name" class="form-control"  value="{{ $permissions->display_name or old('display_name') }}" name="display_name" placeholder="@lang('core.displayName')">
                    <div class="form-control-focus"> </div>
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group form-md-line-input">
                <label class="col-sm-2 control-label" for="description">@lang('core.description')</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="description" id="description">{{ $permissions->description or old('description') }}</textarea>
                    <div class="form-control-focus"> </div>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
    </div>

<div class="modal-footer">
    <button class="btn  dark " data-dismiss="modal" aria-hidden="true">@lang('core.close')</button>
    <button id="save" type="submit" class="btn  green" onclick="knap.addUpdate('permissions', '{{$permissions->id or ''}}');return false">@lang('core.submit')</button>
</div>
{{ Form::close() }}
</div>
</div>

