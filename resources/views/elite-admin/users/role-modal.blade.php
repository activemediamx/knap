
<div class="panel-heading">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <span class="modal-title">@lang('core.assignRole')</span>
</div>
{!!  Form::open(['url' => '','class'=>'form-horizontal' ,'autocomplete'=>'off','id'=>'assign-role']) 	 !!}
<div class="modal-body">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">@lang('core.selectRoles')</label>
            <div class="col-sm-10">
                @foreach($roles as $role)
                    <span>
                         <input type="checkbox" id="id{{ $role->id }}" value="{{ $role->id }}" name="role[{{ $role->id }}]" class="check" @if(isset($assignedRoles) && in_array($role->id, $assignedRoles)) checked @endif>
                         <span for="id{{ $role->id }}" style="margin-left: 5px;margin-right:10px;font-size: 13px;">{{ $role->display_name }}</span>
                    </span>
                @endforeach

            </div>
        </div>
    </div>
</div>
<input type="hidden" name="id" value="{{$user->id}}">
<div class="modal-footer">
    <button id="save" type="submit" class="btn btn-custom" onclick="knap.assignRole({{$user->id or ''}});return false">@lang('core.submit')</button>
    <button class="btn btn-default btn-outline" data-dismiss="modal" aria-hidden="true">@lang('core.close')</button>
</div>
{{Form::close()}}
<script>
    //    iCheck for checkbox and radio inputs
    $('input').iCheck({
        checkboxClass: 'icheckbox_minimal-blue'
    });
</script>