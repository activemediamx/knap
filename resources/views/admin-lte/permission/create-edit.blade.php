
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span></button>
    <h4 class="modal-title">@if(isset($permissions->id)) @lang('menu.editPermission')@else @lang('menu.addPermission') @endif</h4>
</div>
{!!  Form::open(['url' => '','class'=>'form-horizontal' ,'autocomplete'=>'off','id'=>'add-edit-form']) 	 !!}
@if(isset($permissions->id)) <input type="hidden" name="_method" value="PUT"> @endif
<div class="modal-body">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">@lang('core.name')</label>

            <div class="col-sm-10">
                <input type="text" @if(isset($permissions) && in_array($permissions->name,$permdata)) readonly @endif name="name" id="name" class="form-control"  value="{{ $permissions->name or '' }}" placeholder="@lang('core.enterPermissionName')">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">@lang('core.displayName')</label>
            <div class="col-sm-10">
                <input type="text" name="display_name" class="form-control" placeholder="@lang('core.displayName')" value="{{$permissions->display_name or ''}}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">@lang('core.description')</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="3" name="description" placeholder="@lang('core.description')">{{$permissions->description or ''}}</textarea>
            </div>
        </div>

    </div>
</div>
<div class="modal-footer">
    <button id="save" type="submit" class="btn btn-success" onclick="knap.addUpdate('permissions', '{{$permissions->id or ''}}');return false">@lang('core.submit')</button>
    <button class="btn default" data-dismiss="modal" aria-hidden="true">@lang('core.close')</button>
</div>
{{Form::close()}}