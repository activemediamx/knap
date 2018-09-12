<!-- Left navbar-sidebar -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li class="nav-item @if(strpos(\Request::route()->getName(),'dashboard') !== false) active @endif">
                <a href="{{ route('dashboard.index') }}" class="waves-effect">
                    <i class="icon-home"></i>
                    <span class="hide-menu">@lang('menu.dashboard')</span>
                    <!-- <span class="selected"></span> -->
                </a>
            </li>
            @permission('view-users')
                <li class="nav-item @if(strpos(\Request::route()->getName(),'users') !== false) active @endif">
                    <a href="{{ route('users.index') }}" class="waves-effect">
                        <i class="icon-user"></i>
                        <span class="hide-menu">@lang('menu.users')</span>
                        <!-- <span class="selected"></span> -->
                    </a>
                </li>
            @endpermission
            @permission(['view-role', 'view-permission'])
                <li class="nav-item @if(strpos(\Request::route()->getName(),'roles') or strpos(\Request::route()->getName(),'permissions')) active @endif">
                    <a href="javascript:;" class="waves-effectnav-toggle">
                        <i class="icon-key"></i>
                        <span class="hide-menu">@lang('menu.rolesPermissions')</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        @permission('view-role')
                            <li class="nav-item @if(strpos(\Request::route()->getName(),'roles')) active @endif">
                                <a href="{{ route('roles.index') }}" class="waves-effect">
                                    <span class="hide-menu">@lang('menu.roles')</span>
                                </a>
                            </li>
                        @endpermission
                        @permission('view-permission')
                            <li class="nav-item @if(strpos(\Request::route()->getName(),'permissions')) active @endif">
                                <a href="{{ route('permissions.index') }}" class="waves-effect">
                                    <span class="hide-menu">@lang('menu.permissions')</span>
                                </a>
                            </li>
                        @endpermission
                    </ul>
                </li>
            @endpermission
            @permission('view-activity-log')
                <li class="nav-item @if(preg_match('/activity/',\Request::route()->getName())) active @endif">
                    <a href="{{ route('activity') }}" class="waves-effect">
                        <i class="icon-clock"></i>
                        <span class="hide-menu">@lang('menu.activityLog')</span>
                        <!-- <span class="selected"></span> -->
                    </a>
                </li>
            @endpermission
            @permission('view-email-template')
                <li class="nav-item @if(preg_match('/email-templates/',\Request::route()->getName())) active @endif">
                    <a href="{{ route('email-templates.index') }}" class="waves-effect">
                        <i class="icon-envelope"></i>
                        <span class="hide-menu">@lang('menu.emailTemplates')</span>
                        <!-- <span class="selected"></span> -->
                    </a>
                </li>
            @endpermission
            <li class="nav-item @if(strpos(\Request::route()->getName(),'chat')) active @endif">
                <a href="{{ route('chat') }}" class="waves-effect">
                    <i class="fa fa-comments-o"></i>
                    <span class="hide-menu">@lang('menu.userChat')</span>
                    <!-- <span class="selected"></span> -->
                </a>
            </li>
            @if($user->user_type=='admin')
                <li class="nav-item @if(preg_match('/session/',\Request::route()->getName())) active @endif">
                    <a href="{{ route('sessions.index') }}" class="waves-effect">
                        <i class="fa fa-sign-out"></i>
                        <span class="hide-menu">@lang('menu.session')</span>
                    </a>
                </li>
            @endif
            @permission(['update-social-settings', 'update-general-settings', 'update-theme-settings', 'update-mail-settings', 'update-common-settings', 'manage-custom-fields' ])
                <li class="nav-item @if(strpos(\Request::route()->getName(),'setting') || strpos(\Request::route()->getName(),'fields')) active @endif">
                    <a href="javascript:;" class="waves-effectnav-toggle">
                        <i class="icon-settings"></i>
                        <span class="hide-menu">@lang('menu.settings')</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        @permission('update-social-settings')
                            <li class="nav-item @if(preg_match('/social/',\Request::route()->getName())) active @endif">
                                <a href="{{route('social-settings')}}" class="waves-effect">
                                    <span class="hide-menu">@lang('menu.social')</span>
                                </a>
                            </li>
                        @endpermission
                        @permission('update-general-settings')
                            <li class="nav-item @if(preg_match('/general/',\Request::route()->getName())) active @endif">
                                <a href="{{ route('general-settings') }}" class="waves-effect">
                                    <span class="hide-menu">@lang('menu.general')</span>
                                </a>
                            </li>
                        @endpermission
                        @permission('update-theme-settings')
                            <li class="nav-item @if(preg_match('/theme/',\Request::route()->getName())) active @endif">
                                <a href="{{ route('theme-settings') }}" class="waves-effect">
                                    <span class="hide-menu">@lang('menu.theme')</span>
                                </a>
                            </li>
                        @endpermission
                        @permission('manage-custom-fields')
                            <li class="nav-item @if(preg_match('/custom-fields/',\Request::route()->getName())) active @endif">
                                <a href="{{ route('custom-fields.index') }}" class="waves-effect">
                                    <span class="hide-menu">@lang('menu.custom_fields')</span>
                                </a>
                            </li>
                        @endpermission
                        @permission('update-common-settings')
                            <li class="nav-item @if(preg_match('/common-settings/',\Request::route()->getName())) active @endif">
                                <a href="{{ route('common-settings') }}" class="waves-effect">
                                    <span class="hide-menu">@lang('menu.settings')</span>
                                </a>
                            </li>
                        @endpermission
                        @permission('update-mail-settings')
                            <li class="nav-item @if(preg_match('/mail-settings/',\Request::route()->getName())) active @endif">
                                <a href="{{ route('mail-settings') }}" class="waves-effect">
                                    <span class="hide-menu">@lang('menu.mailSettings')</span>
                                </a>
                            </li>
                        @endpermission
                    </ul>
                </li>
            @endpermission
        </ul>
    </div>
</div>
<!-- Left navbar-sidebar end -->