<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu">
            <li class="header">@lang('menu.main_navigation')</li>
            <li @if(strpos(\Request::route()->getName(),'dashboard') !== false) class="active" @endif>
                <a href="{{ route('dashboard.index') }}">
                    <i class="fa fa-dashboard"></i> <span>@lang('menu.dashboard')</span>
                </a>
            </li>
            @permission('view-users')
                <li @if(strpos(\Request::route()->getName(),'users') !== false ) class="active" @endif>
                    <a href="{{ route('users.index') }}">
                        <i class="fa fa-users"></i> <span>@lang('menu.users')</span>
                    </a>
                </li>
            @endpermission
            @permission(['view-role', 'view-permission'])
                <li class="treeview @if(preg_match('/roles/', \Request::route()->getName()) or preg_match('/permissions/', \Request::route()->getName())) active @endif">
                    <a href="#">
                        <i class="fa fa-key"></i> <span>@lang('menu.rolesPermissions')</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @permission('view-role')
                            <li class="@if(preg_match('/roles/', \Request::route()->getName())) active @endif"><a href="{{ route('roles.index') }}"><i class="fa fa-circle-o"></i> @lang('menu.roles')</a></li>
                        @endpermission
                        @permission('view-permission')
                            <li class="@if(preg_match('/permissions/', \Request::route()->getName())) active @endif"><a href="{{ route('permissions.index') }}"><i class="fa fa-circle-o"></i> @lang('menu.permissions')</a></li>
                        @endpermission
                    </ul>
                </li>
            @endpermission
            @permission('view-activity-log')
                <li class="@if(preg_match('/activity/',\Request::route()->getName())) active @endif">
                    <a href="{{ route('activity') }}">
                        <i class="fa fa-clock-o"></i> <span>@lang('menu.activityLog')</span>
                    </a>
                </li>
            @endpermission
            @permission('view-email-template')
                <li @if(preg_match('/email-templates/',\Request::route()->getName())) class="active" @endif>
                    <a href="{{ route('email-templates.index') }}">
                        <i class="fa fa-envelope"></i> <span>@lang('menu.emailTemplates')</span>
                    </a>
                </li>
            @endpermission
            <li @if(strpos(\Request::route()->getName(),'chat')) class="active" @endif>
                <a href="{{ route('chat') }}">
                    <i class="fa fa-comments-o"></i> <span>@lang('menu.userChat')</span>
                </a>
            </li>
            @if($user->user_type=='admin')
                <li class="@if(preg_match('/session/',\Request::route()->getName())) active @endif">
                    <a href="{{ route('sessions.index') }}" class="nav-link ">
                        <i class="fa fa-sign-out"></i>
                        <span>@lang('menu.session')</span>
                    </a>
                </li>
            @endif
            @permission(['update-social-settings', 'update-general-settings', 'update-theme-settings', 'update-mail-settings', 'update-common-settings', 'manage-custom-fields' ])
                <li class=" @if(strpos(\Request::route()->getName(),'setting') or preg_match('/custom-fields/', \Request::route()->getName())) active @endif treeview">
                    <a href="#">
                        <i class="fa fa-cog"></i> <span>@lang('menu.settings')</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @permission('update-social-settings')
                            <li class="@if(preg_match('/social/',\Request::route()->getName())) active @endif"><a href="{{route('social-settings')}}"><i class="fa fa-circle-o"></i> @lang('menu.social')</a></li>
                        @endpermission
                        @permission('update-general-settings')
                            <li class="@if(preg_match('/general/',\Request::route()->getName())) active @endif"><a href="{{ route('general-settings') }}"><i class="fa fa-circle-o"></i> @lang('menu.general')</a></li>
                        @endpermission
                        @permission('update-theme-settings')
                            <li class="@if(preg_match('/theme/',\Request::route()->getName())) active @endif"><a href="{{ route('theme-settings') }}"><i class="fa fa-circle-o"></i> @lang('menu.theme')</a></li>
                        @endpermission
                        @permission('manage-custom-fields')
                            <li class="@if(preg_match('/custom-fields/',\Request::route()->getName())) active @endif"><a href="{{ route('custom-fields.index') }}"><i class="fa fa-circle-o"></i> @lang('menu.custom_fields')</a></li>
                        @endpermission
                        @permission('update-common-settings')
                            <li class="@if(preg_match('/common-settings/',\Request::route()->getName())) active @endif"><a href="{{ route('common-settings') }}"><i class="fa fa-circle-o"></i> @lang('menu.settings')</a></li>
                        @endpermission
                        @permission('update-mail-settings')
                            <li class="@if(preg_match('/mail-settings/',\Request::route()->getName())) active @endif"><a href="{{ route('mail-settings') }}"><i class="fa fa-circle-o"></i> @lang('menu.mailSettings')</a></li>
                        @endpermission
                    </ul>
                </li>
            @endpermission
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>