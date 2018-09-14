@extends($global->theme_folder.'.layouts.user')
@section('style')
    <link href="{{ asset($global->theme_folder.'/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset($global->theme_folder.'/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset($global->theme_folder.'/global/plugins/cropper/dist/cropper.min.css') }}" rel="stylesheet" type="text/css" />
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
                                    <i class="icon-users"></i>
                                    <span class="caption-subject bold uppercase"> @lang('menu.users') </span>
                                </div>
                                <div class="actions">
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="btn-group">
                                                <button id="sample_editable_1_new" class="btn  sbold green"  onclick="knap.addModal('users.create')" >
                                                     @lang('core.btnAddUser') <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="btn-group pull-right">
                                                <a href="{{ route('user.export-users') }}" class="btn  green  ">
                                                    @lang('core.exportCsv')  <i class="fa fa-file-excel-o"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="users">
                                    <thead>
                                    <tr>

                                        <th>@lang('core.id')</th>
                                        <th>@lang('core.avatar')</th>
                                        <th>@lang('core.name')</th>
                                        <th>@lang('core.email')</th>
                                        <th>@lang('core.gender')</th>
                                        <th>@lang('core.role')</th>
                                        <th>@lang('core.status')</th>
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

    @include($global->theme_folder.'.include.delete-modal')
    @include($global->theme_folder.'.include.add-edit-modal')
    @include($global->theme_folder.'.include.image-crop-modal')
@endsection

@section('scripts-footer')
    <!-- DataTables -->
    <script src="{{ asset($global->theme_folder.'/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset($global->theme_folder.'/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset($global->theme_folder.'/global/plugins/cropper/dist/cropper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset($global->theme_folder.'/global/plugins/cropper/js/main.js') }}" type="text/javascript"></script>
    <script type="text/javascript">

        var table = $('#users').dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "pagingType": "bootstrap_full_number",

            "bProcessing": true,
            "bServerSide": true,
            "ajax": "{{route('user.get-users')}}",

            "aoColumns": [
                {data: 'id', name: 'id'},
                {data: 'avatar', name: 'avatar'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'gender', name: 'gender'},
                {data: 'roles', name: 'roles',searchable: false, orderable: false },
                {data: 'status', name: 'status'},
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