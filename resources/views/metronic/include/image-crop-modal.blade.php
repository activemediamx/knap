<!-- image crop model -->
<div class="modal fade dashboard" id="crop_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">@lang('core.changePhoto')</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div id="cropper-example-5">
                            <img id="currentUploadedListingImages" src="" width="100%"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <p id="processingImageDiv" class="pull-left"></p>
                <button type="button" class="btn  dark " data-dismiss="modal">@lang('core.close')</button>
                <button id="advertImageCropButton" type="button" class="btn green" >@lang('core.crop')</button>
            </div>
        </div>
    </div>
</div>