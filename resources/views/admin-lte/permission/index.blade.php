@extends($global->theme_folder.'.layouts.user')
@section('style')
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/iCheck/minimal/_all.css') }}">
@endsection

@section('page-header')
    <section class="content-header">
        <h1>
            {{$pageTitle}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> @lang('menu.home')</a></li>
            <li class=""> @lang('menu.rolesPermissions')</li>
            <li class="active">@lang('menu.permissions')</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <a href="javascript: ;" onclick="knap.addModal('permissions.create')" class="btn btn-success">
                        <span class="hidden-xs"> @lang('core.btnAddPermission') </span><i class="fa fa-plus"></i>
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                    <table id="permissions" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr>
                            <th class="hidden">@lang('core.id')</th>
                            <th>@lang('core.name')</th>
                            <th>@lang('core.displayName')</th>
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
<script type="text/javascript">
{{----Datatable loading --}}
var  table = $('#permissions').dataTable({
        "sScrollY": "100%",
    "scrollCollapse": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "ajax": "{{route('user.get-permissions')}}",
        "columns": [
            {data: 'id', name: 'id', orderable: false, searchable: false, visible:false},
            {data: 'name', name: 'name', orderable: true, searchable: true},
            {data: 'display_name', name: 'display_name', orderable: true, searchable: true},
            {data: 'description', name: 'description', orderable: true, searchable: true},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        "oLanguage": {
            "sProcessing": '<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>'
        }
    });
</script>
@endsection