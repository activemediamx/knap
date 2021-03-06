<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-{{$iconEdit}} font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">
         @lang('menu.editEmailTemplate')
            </span>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    </div>
    <div class="portlet-body form">
        {!!  Form::open(['url' => '','class'=>'form-horizontal' ,'autocomplete'=>'off','id'=>'add-edit-form']) 	 !!}
        @if(isset($editTemplate->id)) <input type="hidden" name="_method" value="PUT"> @endif
        <div class="box-body form">
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <label class="col-sm-2 control-label" for="name">@lang('core.id')</label>
                    <div class="col-sm-10">
                        <input type="text" name="id" id="id" class="form-control"  placeholder="@lang('core.id')" value="{{$editTemplate->email_id ?? ''}}" disabled>
                        <span class="form-control-focus"> </span>
                        <span class=" help-block help-block-error" style="color: #e73d4a;">@lang('messages.youCantChangeId')</span>
                    </div>
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-sm-2 control-label" for="email">@lang('core.subject')</label>
                    <div class="col-sm-10">
                        <input type="text" name="subject" id="subject" class="form-control" placeholder="@lang('core.subject')" value="{{$editTemplate->subject ?? ''}}">
                        <div class="form-control-focus"> </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">@lang('core.body')</label>
                    <div class="col-md-10">
                        <textarea name="body" class="form-control" rows="10" id="myEditor" placeholder="@lang('core.enterText')">{!! $editTemplate->body ?? '' !!} </textarea>
                    </div>
                </div>

                <div class="form-group form-md-line-input">
                    <label class="col-sm-2 control-label">@lang('core.variablesUsed')</label>
                    <div class="col-sm-10">
                        {{ $emailVariables ?? ''}}
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn dark " data-dismiss="modal" aria-hidden="true">@lang('core.close')</button>
            <button id="save" type="submit" class="btn green" onclick="knap.addUpdate('email-templates', '{{$editTemplate->id ?? ''}}');return false">@lang('core.submit')</button>
        </div>
        {{Form::close()}}
    </div>
</div>
