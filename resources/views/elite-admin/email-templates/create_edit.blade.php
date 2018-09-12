
<div class="panel-heading">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <span class="modal-title">@lang('core.editEmailTemplate')</span>
</div>
{!!  Form::open(['url' => '','class'=>'form-horizontal' ,'autocomplete'=>'off','id'=>'add-edit-form']) 	 !!}
@if(isset($editTemplate->id)) <input type="hidden" name="_method" value="PUT"> @endif
<div class="modal-body">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">@lang('core.id')</label>

            <div class="col-sm-10">
                <input type="text" name="name" class="form-control"  placeholder="@lang('core.id')" value="{{$editTemplate->email_id or ''}}" disabled>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">@lang('core.subject')</label>
            <div class="col-sm-10">
                <input type="text" name="subject" id="subject" class="form-control" placeholder="@lang('core.subject')" value="{{$editTemplate->subject or ''}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">@lang('core.body')</label>
            <div class="col-sm-10">
                <textarea class="textarea" class="form-control" name="body" placeholder="@lang('core.enterText')" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!! $editTemplate->body or '' !!}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">@lang('core.variablesUsed')</label>
            <div class="col-sm-10">
                <span class="" placeholder="@lang('core.variablesUsed')">{{ $emailVariables or ''}}</span>
            </div>
        </div>

    </div>
</div>
<div class="modal-footer">
    <button id="save" type="submit" class="btn btn-custom" onclick="knap.addUpdate('email-templates', '{{$editTemplate->id or ''}}');return false">@lang('core.submit')</button>
    <button class="btn btn-default btn-outline" data-dismiss="modal" aria-hidden="true">@lang('core.close')</button>
</div>
{{Form::close()}}
