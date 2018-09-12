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
            <li class=""> @lang('menu.settings')</li>
            <li class="active">@lang('menu.custom_fields')</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <a href="javascript: ;" onclick="knap.addModal('custom-fields.create');return false;" class="btn btn-success">
                        <span class="hidden-xs"> @lang('core.btnAddField') </span><i class="fa fa-plus"></i>
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                    <table id="custom_fields" class="table table-striped table-bordered dt-responsive nowrap">
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

    <script src="{{ asset($global->theme_folder.'/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset($global->theme_folder.'/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset($global->theme_folder.'/plugins/jquery-repeater/jquery.repeater.js') }}" type="text/javascript"></script>
    <!-- DataTables -->
    <script type="text/javascript">
        var table = $('#custom_fields').dataTable({
            "sScrollY": "100%",
            "scrollCollapse": true,
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('get-custom-fields')}}",
            "columns": [
                {data: 'id', name: 'id', orderable: false, searchable: false, visible:false},
                {data: 'label', name: 'label', orderable: true, searchable: true},
                {data: 'name', name: 'name', orderable: true, searchable: true},
                {data: 'type', name: 'type', orderable: true, searchable: true},
                {data: 'values', name: 'values', orderable: true, searchable: true},
                {data: 'required', name: 'required', orderable: true, searchable: true},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            "oLanguage": {
                "sProcessing": '<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>'
            },"order": [
                [0, "asc"]
            ]
        });
    </script>
@endsection