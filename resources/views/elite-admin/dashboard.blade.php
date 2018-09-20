@extends($global->theme_folder.'.layouts.user')
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
    @if($user->user_type == 'admin')
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">@lang('core.activeUsers')</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <i class="fa fa-users"></i>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">{{$activeUsers}}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">@lang('core.inActiveUsers')</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <i class="fa fa-users"></i>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">{{$inActiveUsers}}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">@lang('core.totalUsers')</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <i class="fa fa-users"></i>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">{{$totalUsers}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title"> @lang('core.role') </h3>
                    <ul class="list-inline two-part">
                        <li>
                            <i class="fa fa-key"></i>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">{{$rolesCount}}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">@lang('core.permissions')</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <i class="fa fa-key"></i>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">{{$permissionCount}}</span></li>
                    </ul>
                </div>
            </div>
        </div>

    @elseif($user->can('view-users'))
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-inverse block1">
                    <div class="panel-heading">@lang('core.recentUsers')</div>
                    <div class="panel-wrapper">
                        <div class="panel-body">
                            <div class="row el-element-overlay m-b-40">
                                <div class="col-md-12">


                                    <!-- /.usercard -->
                                    @forelse($recentUsers as $recentUser)
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                            <div class="white-box">
                                                <div class="el-card-item">
                                                    <div class="el-card-avatar el-overlay-1">
                                                        <img src="{{$recentUser->getGravatarAttribute(250)}}" height="80px"/>
                                                    </div>
                                                    <div class="el-card-content">
                                                        <h3 class="box-title">{{ explode(' ', $recentUser->name)[0] }}</h3>
                                                        <small>{{$recentUser->created_at->diffForHumans()}}</small><br>
                                                        <small><span class="label @if($recentUser->gender == 'female' )bg-pink @else bg-info @endif">
                                <i class="fa fa-{{$recentUser->gender}}"></i>
                                                                @lang('core.'.$recentUser->gender)
                            </span></small><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        @lang('core.noUserFound')
                                    @endforelse

                                    <div class="col-lg-12 text-center">

                                        <a href="{{route('users.index')}}" class="uppercase btn btn-default">View All Users</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @else
        <h4>@lang('messages.welcomeToDashboard')</h4>
    @endif


@endsection