@extends($global->theme_folder.'.layouts.user')
@section('style')
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/icheck/skins/all.css') }}">
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/cropper/dist/cropper.min.css') }}">
@endsection

@section('page-header')
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{$pageTitle}}</h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

            <ol class="breadcrumb">
                <li><a href="#">@lang('menu.home')</a></li>
                <li class="active">{{$pageTitle}}</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">
                        <button id="sample_editable_1_new" class="btn btn-custom"  onclick="knap.addModal('users.create');return false;" >
                            @lang('core.btnAddUser') <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="btn-group pull-right">
                        <a href="{{ route('user.export-users') }}" class="btn btn-custom">
                            @lang('core.exportCsv')  <i class="fa fa-file-excel-o"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">
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
    <script src="{{ asset($global->theme_folder.'/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ asset($global->theme_folder.'/plugins/icheck/icheck.min.js')}}"></script>
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
                        "sProcessing": '<div class="overlay"><div class="cssload-speeding-wheel"></div></div>'
                    }
                });
    </script>
@endsection