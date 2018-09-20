<!-- Start - Delete Modal -->
<div id="deleteModal" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-inverse" id="deleteUserModalForm">
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <span class="modal-title">@lang('core.delete')?</span>
            </div>
            <div class="modal-body" id="info">

            </div>
            <div class="modal-footer">
                <button id="delete" class="btn btn-danger">@lang('core.delete')</button>
                <button class="btn btn-default btn-outline" data-dismiss="modal" aria-hidden="true">@lang('core.close')</button>
            </div>
        </div>
    </div>
</div>
