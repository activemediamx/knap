@extends($global->theme_folder.'.layouts.user')
@section('style')
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('page-header')
    <section class="content-header">
        <h1>
            {{$pageTitle}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> @lang('menu.home')</a></li>
            <li class="active">@lang('menu.session')</li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body ">
                    <table id="sessions" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr>
                        <tr>
                            <th width="20%">@lang('core.user')</th>
                            <th>@lang('core.ip_address')</th>
                            <th>@lang('core.user_agent')</th>
                            <th>@lang('core.last_activity')</th>
                            <th>@lang('core.actions')</th>
                        </tr>
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
    @include($global->theme_folder.'.include.delete-modal')
@endsection

@section('footerjs')
    <!-- DataTables -->
    <script src="{{ asset($global->theme_folder.'/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset($global->theme_folder.'/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset($global->theme_folder.'/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
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
                "sProcessing": '<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>'
            }
        });
    </script>
@endsection