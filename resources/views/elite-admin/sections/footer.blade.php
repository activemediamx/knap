<footer class="footer text-center">
    <strong>Copyright &copy; {{ Carbon\Carbon::now()->format('Y') }} {{ $global->site_name }}</strong> @lang('messages.allRightsReserved')
</footer>

<!-- Add FORM -->
<div id="AdminEditModal" class="modal fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-inverse">
            {{--Content to inserted by ajax data--}}
        </div>
    </div>
</div>