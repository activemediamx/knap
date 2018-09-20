
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    <h4 class="modal-title">@lang('core.assignRole') </h4>
</div>
{!!  Form::open(['url' => '','class'=>'form-horizontal' ,'autocomplete'=>'off','id'=>'assign-role']) !!}
<input type="hidden" name="id" value="{{$user->id}}">
<div class="modal-body">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">@lang('core.selectRoles')</label>
            <div class="col-sm-10">
                <ul class="list-unstyled">
                    @foreach($roles as $role)
                        <li>
                    <span>
                         <input type="checkbox" id="id{{ $role->id }}" value="{{ $role->id }}" name="role[{{ $role->id }}]" class="minimal" @if(isset($assignedRoles) && in_array($role->id, $assignedRoles)) checked @endif>
                         <span for="id{{ $role->id }}" style="margin-left: 5px;margin-right:10px;font-size: 13px;">{{ $role->display_name }}</span>
                    </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button id="save" type="submit" class="btn btn-success" onclick="knap.assignRole({{$user->id or ''}});return false">@lang('core.submit')</button>
    <button class="btn default" data-dismiss="modal" aria-hidden="true">@lang('core.close')</button>
</div>
{{Form::close()}}
