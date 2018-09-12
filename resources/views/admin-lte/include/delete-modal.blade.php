<!-- Start - Delete Modal -->
<div id="deleteModal" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="deleteUserModalForm">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">@lang('core.delete')?</h4>
            </div>
            <div class="modal-body" id="info">

            </div>
            <div class="modal-footer">
                <button id="delete" class="btn btn-danger">@lang('core.delete')</button>
                <button class="btn default" data-dismiss="modal" aria-hidden="true">@lang('core.close')</button>
            </div>
        </div>
    </div>
</div>
