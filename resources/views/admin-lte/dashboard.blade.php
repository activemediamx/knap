@extends($global->theme_folder.'.layouts.user')
@section('content')

    @if($user->user_type == 'admin')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>{{$activeUsers}}</h3>

                    <p>@lang('core.activeUsers')</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$inActiveUsers}}</h3>

                    <p>@lang('core.inActiveUsers')</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$totalUsers}}</h3>

                    <p>@lang('core.totalUsers')</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>{{$rolesCount}}</h3>

                    <p>@lang('core.role')</p>
                </div>
                <div class="icon">
                    <i class="ion ion-key"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$permissionCount}}</h3>

                    <p>@lang('core.permissions')</p>
                </div>
                <div class="icon">
                    <i class="ion ion-key"></i>
                </div>
            </div>
        </div>

    </div>
    @elseif($user->can('view-users'))
    <div class="row">
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('core.recentUsers')</h3>
                    <div class="box-tools pull-right">
                        <span class="label label-danger">{{count($recentUsers)}} New Users</span>
                    </div>
                </div>

                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <ul class="users-list clearfix">
                        <!-- /.users-list -->
                        @forelse($recentUsers as $recentUser)
                            <li>
                                <img src="{{ $recentUser->getGravatarAttribute(250) }}" alt="User Image" height="80px">
                                <a class="users-list-name" href="#">{{ $recentUser->name }}</a>
                                <span class="users-list-date">{{$recentUser->created_at->diffForHumans()}}</span>
                                <span class="label @if($recentUser->gender == 'female' )bg-red @else bg-blue @endif">
                                <i class="fa fa-{{$recentUser->gender}}"></i>
                                    @lang('core.'.$recentUser->gender)
                            </span>

                            </li>
                        @empty
                            @lang('core.noUserFound')
                        @endforelse
                    </ul>
                </div>
                <div class="box-footer text-center">
                    <a href="{{route('users.index')}}" class="uppercase">View All Users</a>
                </div>
            </div>
            <!--/.box -->
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-lg-3 col-xs-6">
        <h4>@lang('messages.welcomeToDashboard')</h4>
        </div>
    </div>
    @endif



@endsection