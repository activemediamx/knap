@extends($global->theme_folder.'.layouts.user')
@section('style')
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('page-header')
    <section class="content-header">
        <h1>
            {{$pageTitle}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> @lang('menu.home')</a></li>
            <li class=""> @lang('menu.rolesPermissions')</li>
            <li class="active">@lang('menu.roles')</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <a href="javascript: ;" onclick="knap.addModal('roles.create')" class="btn btn-success">
                        <span class="hidden-xs"> @lang('core.btnAddRole') </span><i class="fa fa-plus"></i>
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                    <table id="roles" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr>
                            <th>@lang('core.role')</th>
                            <th>@lang('core.permissions')</th>
                            <th>@lang('core.description')</th>
                            <th>@lang('core.actions')</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

@endsection

@section('modals')
    @include($global->theme_folder.'.include.add-edit-modal')
    @include($global->theme_folder.'.include.delete-modal')
@endsection

@section('footerjs')
    <!-- DataTables -->

    <script src="{{ asset($global->theme_folder.'/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset($global->theme_folder.'/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset($global->theme_folder.'/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript">
            {{----Datatable loading --}}
    var table = $('#roles').dataTable({
        "sScrollY": "100%",
    "scrollCollapse": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "ajax": "{{route('user.get-roles')}}",
        "columns": [
            {data: 'display_name', name: 'roles.display_name'},
            {data: 'perms', name: 'permissions.display_name', orderable: false, searchable: false},
            {data: 'description', name: 'description', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        "oLanguage": {
            "sProcessing": '<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>'
        }
    });

</script>
@endsection