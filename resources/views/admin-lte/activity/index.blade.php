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
            <li class="active">@lang('menu.activityLog')</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body ">
                    <table id="activity" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr>
                            <th>@lang('core.id')</th>
                            <th>@lang('core.message')</th>
                            <th>@lang('core.logTime')</th>
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

@section('footerjs')
    <!-- DataTables -->
    <script src="{{ asset($global->theme_folder.'/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset($global->theme_folder.'/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">

        var table = $('#activity').dataTable({
            "sScrollY": "100%",
            "scrollCollapse": true,
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "order": [
                [0, "desc"]
            ],
            "ajax": "{{route('ajax.activity')}}",
            "columns": [
                {data: 'id', name: 'id'},
                {data: 'text', name: 'text'},
                {data: 'created_at', name: 'created_at'}
            ],
            "oLanguage": {
                "sProcessing": '<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>'
            }
        });
    </script>
@endsection