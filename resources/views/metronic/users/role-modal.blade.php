<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-{{$iconEdit }} font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">
            @lang('core.assignRole')
            </span>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    </div>
    <div class="portlet-body form">
        {!!  Form::open(['url' => '','class'=>'form-horizontal' ,'autocomplete'=>'off','id'=>'assign-role']) 	 !!}
        <div class="box-body form">
            <div class="form-body">
                <div class="form-group form-md-checkboxes">
                    <label class="col-md-2 control-label">@lang('core.selectRoles')</label>
                    <div class="col-md-10">
                        <div class="md-checkbox-inline">
                            @foreach($roles as $role)
                                <div class="md-checkbox">
                                    <input type="checkbox" id="id{{ $role->id }}" value="{{ $role->id }}" name="role[{{ $role->id }}]" class="md-check" @if(isset($assignedRoles) && in_array($role->id, $assignedRoles)) checked @endif >
                                    <label for="id{{ $role->id }}">
                                        <span class="inc"></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{ $role->display_name }} </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{$user->id}}">
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn  dark" data-dismiss="modal" aria-hidden="true">@lang('core.close')</button>
            <button id="save" type="submit" class="btn  green" onclick="knap.assignRole({{$user->id ?? ''}});return false">@lang('core.submit')</button>
        </div>
        {{Form::close()}}
    </div>
</div>
