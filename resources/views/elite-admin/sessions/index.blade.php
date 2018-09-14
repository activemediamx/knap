@extends($global->theme_folder.'.layouts.user')
@section('style')
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/icheck/skins/all.css') }}">
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

        <div class="panel-body">
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

@endsection

@section('modals')
    @include($global->theme_folder.'.include.delete-modal')
@endsection

@section('footerjs')
    <!-- DataTables -->
    <script src="{{ asset($global->theme_folder.'/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset($global->theme_folder.'/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset($global->theme_folder.'/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ asset($global->theme_folder.'/plugins/icheck/icheck.min.js')}}"></script>
    <script type="text/javascript">
    {{----Datatable loading --}}
        var  table = $('#sessions').dataTable({
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
            "ajax": "{{route('get-sessions')}}",
            "columns": [
                {data: 'name', name: 'users.name'},
                {data: 'ip_address', name: 'ip_address'},
                {data: 'user_agent', name: 'user_agent'},
                {data: 'last_activity', name: 'last_activity'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            "oLanguage": {
                "sProcessing": '<div class="overlay"><div class="cssload-speeding-wheel"></div></div>'
            }
        });
    </script>
@endsection