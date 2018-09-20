@extends($global->theme_folder.'.layouts.user')
@section('style')
    <link href="{{ asset($global->theme_folder.'/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset($global->theme_folder.'/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .bg-female {
            background: deeppink;
        }

    </style>
@endsection
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <!-- END PAGE TITLE -->
            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BREADCRUMB -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="fa fa-sign-out"></i>
                                    <span class="caption-subject bold uppercase">@lang('menu.session') </span>
                                </div>
                                <div class="actions">
                                </div>
                            </div>
                            <div class="portlet-body">

                                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sessions">
                                    <thead>
                                    <tr>
                                        <th width="20%">@lang('core.user')</th>
                                        <th>@lang('core.ip_address')</th>
                                        <th>@lang('core.user_agent')</th>
                                        <th>@lang('core.last_activity')</th>
                                        <th>@lang('core.actions')</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>
            </section>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE BASE CONTENT -->
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    @include($global->theme_folder.'.include.add-edit-modal')
    @include($global->theme_folder.'.include.delete-modal')
@endsection

@section('scripts-footer')
    <!-- DataTables -->
    <script src="{{ asset($global->theme_folder.'/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset($global->theme_folder.'/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript">

        var table = $('#sessions').dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "pagingType": "bootstrap_full_number",

            "bProcessing": true,
            "bServerSide": true,
            "ajax": "{{route('get-sessions')}}",

            "aoColumns": [
                {data: 'name', name: 'users.name'},
                {data: 'ip_address', name: 'ip_address'},
                {data: 'user_agent', name: 'user_agent'},
                {data: 'last_activity', name: 'last_activity'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            "lengthMenu": [
                [10, 15, 20, -1],
                [10, 15, 20, "All"] // change per page values here
            ],
            "order": [
                [3, "desc"]
            ]
        });
    </script>
@endsection