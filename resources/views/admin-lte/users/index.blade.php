@extends($global->theme_folder.'.layouts.user')
@section('style')
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/cropper/dist/cropper.min.css') }}">
@endsection

@section('page-header')
    <section class="content-header">
        <h1>
            {{$pageTitle}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> @lang('menu.home')</a></li>
            <li class="active">@lang('menu.users')</li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <a href="javascript: ;" onclick="knap.addModal('users.create');return false;" class="btn btn-success">
                        <span class="hidden-xs"> @lang('core.btnAddUser') </span><i class="fa fa-plus"></i>
                    </a>

                    <a href="{{ route('user.export-users') }}" class="btn btn-success pull-right">
                        <span class="hidden-xs">@lang('core.exportCsv')</span> <i class="fa fa-file-excel-o"></i>
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                    <table id="users" class="table table-striped table-bordered dt-responsive nowrap">
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
                           {{--Ajax Load Data Here--}}
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
    @include($global->theme_folder.'.include.image-crop-modal')
@endsection

@section('footerjs')
    <!-- DataTables -->
    <script src="{{ asset($global->theme_folder.'/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset($global->theme_folder.'/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset($global->theme_folder.'/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset($global->theme_folder.'/plugins/cropper/dist/cropper.min.js')}}"></script>
    <script src="{{ asset($global->theme_folder.'/plugins/cropper/js/main.js')}}"></script>
    <script type="text/javascript">
                {{----Datatable loading --}}
        var  table = $('#users').dataTable({
                    "sScrollY": "100%",
                    "scrollCollapse": true,
                    "responsive": true,
                    "processing": true,
                    "serverSide": true,
                    "order": [
                        [0, "desc"]
                    ],
                    "lengthMenu": [
                        [10, 15, 20, -1],
                        [10, 15, 20, "All"] // change per page values here
                    ],
                    "ajax": "{{route('user.get-users')}}",
                    "columns": [
                        {data: 'id', name: 'id'},
                        {data: 'avatar', name: 'avatar'},
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'gender', name: 'gender'},
                        {data: 'roles', name: 'roles',searchable: false, orderable: false },
                        {data: 'status', name: 'status'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ],
                    "oLanguage": {
                        "sProcessing": '<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>'
                    }
                });


    </script>
@endsection