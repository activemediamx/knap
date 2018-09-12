<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-{{$iconEdit or $icon }} font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">
         @if(isset($role->id)) @lang('menu.editRole')@else @lang('menu.addRole') @endif
            </span>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    </div>

    <div class="portlet-body form">


        {!!  Form::open(['url' => '' ,'method' => 'post', 'id' => 'add-edit-form','class'=>'form-horizontal']) 	 !!}
        @if(isset($role->id)) <input type="hidden" name="_method" value="PUT"> @endif
            <div class="box-body form">
                <div class="form-body">
                    <div class="form-group form-md-line-input">
                        <label class="col-sm-2 control-label" for="name">@lang('core.name')</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control"  value="{{ $role->name or old('name') }}" placeholder="@lang('core.enterRoleName')">
                            <div class="form-control-focus"> </div>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <label class="col-sm-2 control-label" for="display_name">@lang('core.displayName')</label>
                        <div class="col-sm-10">
                            <input type="text" id="display_name" class="form-control"  value="{{ $role->display_name or old('display_name') }}" name="display_name" placeholder="@lang('core.enterDisplayName')">
                            <div class="form-control-focus"> </div>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <label class="col-sm-2 control-label" for="description">@lang('core.description')</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" name="description" id="description">{{ $role->description or old('description') }}</textarea>
                            <div class="form-control-focus"> </div>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group form-md-checkboxes">
                        <label class="col-md-2 control-label">@lang('core.selectPermission')</label>
                        <div class="col-md-10">
                            <div class="md-checkbox-inline">
                                @foreach($permissions as $permission)
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="id{{ $permission->id }}" value="{{ $permission->id }}" name="permission[{{ $permission->id }}]" class="md-check" @if(isset($perms) && in_array($permission->id, $perms)) checked @endif >
                                        <label for="id{{ $permission->id }}">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> {{ $permission->display_name }} </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
    <button class="btn  dark " data-dismiss="modal" aria-hidden="true">@lang('core.close')</button>
    <button id="save" type="submit" class="btn  green" onclick="knap.addUpdate('roles', '{{$role->id or ''}}');return false">@lang('core.submit')</button>
</div>
        {{ Form::close() }}
    </div>
</div>

