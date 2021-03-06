\
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span></button>
    <h4 class="modal-title">@lang('core.editEmailTemplate')</h4>
</div>
{!!  Form::open(['url' => '','class'=>'form-horizontal' ,'autocomplete'=>'off','id'=>'add-edit-form']) 	 !!}
@if(isset($editTemplate->id)) <input type="hidden" name="_method" value="PUT"> @endif
<div class="modal-body">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">@lang('core.id')</label>

            <div class="col-sm-10">
                <input type="text" name="name" class="form-control"  placeholder="@lang('core.id')" value="{{$editTemplate->email_id ?? ''}}" disabled>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">@lang('core.subject')</label>
            <div class="col-sm-10">
                <input type="text" name="subject" id="subject" class="form-control" placeholder="@lang('core.subject')" value="{{$editTemplate->subject ?? ''}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">@lang('core.body')</label>
            <div class="col-sm-10">
                <textarea class="textarea" class="form-control" name="body" rows="3" placeholder="@lang('core.enterText')" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!! $editTemplate->body ?? '' !!}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">@lang('core.variablesUsed')</label>
            <div class="col-sm-10">
                <span class="" placeholder="@lang('core.variablesUsed')">{{ $emailVariables ?? ''}}</span>
            </div>
        </div>

    </div>
</div>
<div class="modal-footer">
    <button id="save" type="submit" class="btn btn-success" onclick="knap.addUpdate('email-templates', '{{$editTemplate->id ?? ''}}');return false">@lang('core.submit')</button>
    <button class="btn default" data-dismiss="modal" aria-hidden="true">@lang('core.close')</button>
</div>
{{Form::close()}}
