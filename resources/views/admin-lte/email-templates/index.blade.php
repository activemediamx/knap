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
            <li class=""> @lang('menu.emailTemplates')</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body ">
                    <table id="emailTemplate" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr>
                            <th>@lang('core.emailID')</th>
                            <th>@lang('core.subject')</th>
                            <th>@lang('core.text')</th>
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

        var  table = $('#emailTemplate').dataTable({
            "sScrollY": "100%",
            "scrollCollapse": true,
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('get-email-template')}}",
            "columns": [
                {data: 'email_id', name: 'email_id'},
                {data: 'subject', name: 'subject'},
                {data: 'body', name: 'body'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            "oLanguage": {
                "sProcessing": '<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>'
            }
        });

    </script>
@endsection