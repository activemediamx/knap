
<div class="panel-heading">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <span class="modal-title">@if(isset($role->id)) @lang('menu.editRole')@else @lang('menu.addRole') @endif </span>
</div>
{!!  Form::open(['url' => '','class'=>'form-horizontal' ,'autocomplete'=>'off','id'=>'add-edit-form']) 	 !!}
@if(isset($role->id)) <input type="hidden" name="_method" value="PUT"> @endif
<div class="modal-body">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">@lang('core.name')</label>

            <div class="col-sm-10">
                <input type="text" name="name" class="form-control"  placeholder="@lang('core.enterRoleName')" value="{{$role->name or ''}}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">@lang('core.displayName')</label>
            <div class="col-sm-10">
                <input type="text" name="display_name" class="form-control" placeholder="@lang('core.enterDisplayName')" value="{{$role->display_name or ''}}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">@lang('core.description')</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="3" name="description" placeholder="@lang('core.description')">{{$role->description or ''}}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">@lang('core.selectPermission')</label>
            <div class="col-sm-10">
                @foreach($permissions as $permission)
                    <span>
                         <input type="checkbox" id="id{{ $permission->id }}" value="{{ $permission->id }}" name="permission[{{ $permission->id }}]" class="check" @if(isset($perms) && in_array($permission->id, $perms)) checked @endif>
                         <span for="id{{ $permission->id }}" style="margin-left: 5px;margin-right:10px;font-size: 13px;">{{ $permission->display_name }}</span>
                    </span>
                @endforeach

            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button id="save" type="submit" class="btn btn-custom" onclick="knap.addUpdate('roles', '{{$role->id or ''}}');return false">@lang('core.submit')</button>
    <button class="btn btn-default btn-outline" data-dismiss="modal" aria-hidden="true">@lang('core.close')</button>
</div>
{{Form::close()}}
<script>
//    iCheck for checkbox and radio inputs
$('input').iCheck({
    checkboxClass: 'icheckbox_minimal-blue'
});
</script>