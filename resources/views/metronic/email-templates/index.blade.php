@extends($global->theme_folder.'.layouts.user')
@section('style')
    <link href="{{ asset($global->theme_folder.'/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset($global->theme_folder.'/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .bg-female {
            background: deeppink;
        }
        .table-checkable tr>td:first-child, .table-checkable tr>th:first-child {
             max-width: unset !important;
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
                                    <i class="icon-envelope"></i>
                                    <span class="caption-subject bold uppercase"> @lang('menu.emailTemplates') </span>
                                </div>
                                <div class="actions">
                                </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="emailTemplate">
                                    <thead>
                                    <tr>
                                        <th>@lang('core.emailID')</th>
                                        <th>@lang('core.subject')</th>
                                        <th>@lang('core.text')</th>
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
@endsection

@section('scripts-footer')
    <!-- DataTables -->
    <script src="{{ asset($global->theme_folder.'/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset($global->theme_folder.'/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript">

        var table = $('#emailTemplate').dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "pagingType": "bootstrap_full_number",

            "bProcessing": true,
            "bServerSide": true,
            "ajax": "{{route('get-email-template')}}",

            "aoColumns": [
                {data: 'email_id', name: 'email_id'},
                {data: 'subject', name: 'subject'},
                {data: 'body', name: 'body'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            "lengthMenu": [
                [10, 15, 20, -1],
                [10, 15, 20, "All"] // change per page values here
            ],
            "order": [
                [0, "desc"]
            ]
        });

    </script>
@endsection