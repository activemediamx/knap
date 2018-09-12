@extends($global->theme_folder.'.layouts.user')
@section('style')
    <link href="{{ asset($global->theme_folder.'/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset($global->theme_folder.'/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
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
                                    <i class="icon-key"></i>
                                    <span class="caption-subject bold uppercase"> @lang('menu.custom_fields') </span>
                                </div>
                                <div class="actions">
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="btn-group">
                                                <button id="sample_editable_1_new" class="btn  sbold green" onclick="knap.addModal('custom-fields.create')">
                                                    @lang('core.btnAddField') <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="custom_fields">
                                    <thead>
                                    <tr>
                                        <th class="hidden">@lang('core.id')</th>
                                        <th>@lang('core.label')</th>
                                        <th>@lang('core.name')</th>
                                        <th>@lang('core.type')</th>
                                        <th>@lang('core.values')</th>
                                        <th>@lang('core.required')</th>
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
@endsection

@section('modals')
    @include($global->theme_folder.'.include.add-edit-modal')
    @include($global->theme_folder.'.include.delete-modal')
@endsection

@section('scripts-footer')
    <script src="{{ asset($global->theme_folder.'/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset($global->theme_folder.'/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset($global->theme_folder.'/global/plugins/jquery-repeater/jquery.repeater.js') }}" type="text/javascript"></script>
    <!-- DataTables -->
    <script type="text/javascript">

        var table = $('#custom_fields').dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "pagingType": "bootstrap_full_number",
            "bProcessing": true,
            "bServerSide": true,
            "ajax": "{{route('get-custom-fields')}}",

            "aoColumns": [
                {data: 'id', name: 'id', orderable: false, searchable: false, visible:false},
                {data: 'label', name: 'label', orderable: true, searchable: true},
                {data: 'name', name: 'name', orderable: true, searchable: true},
                {data: 'type', name: 'type', orderable: true, searchable: true},
                {data: 'values', name: 'values', orderable: true, searchable: true},
                {data: 'required', name: 'required', orderable: true, searchable: true},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            "order": [
                [0, "asc"]
            ]
        });

    </script>
@endsection