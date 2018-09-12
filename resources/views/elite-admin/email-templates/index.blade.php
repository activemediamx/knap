@extends($global->theme_folder.'.layouts.user')
@section('style')
    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/plugins/datatables/dataTables.bootstrap.css') }}">
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
            <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="emailTemplate">
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
                "sProcessing": '<div class="overlay"><div class="cssload-speeding-wheel"></div></div>'
            }
        });
    </script>
@endsection