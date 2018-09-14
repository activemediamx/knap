@extends($global->theme_folder.'.layouts.user')
@section('content')

    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            @if($user->user_type == 'admin')
                <section class="content">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                <div class="visual">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$activeUsers}}">{{$activeUsers}}</span>
                                    </div>
                                    <div class="desc">@lang('core.activeUsers')</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                <div class="visual">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$inActiveUsers}}">{{$inActiveUsers}}</span></div>
                                    <div class="desc">@lang('core.inActiveUsers')</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                <div class="visual">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$totalUsers}}">{{$totalUsers}}</span>
                                    </div>
                                    <div class="desc"> @lang('core.totalUsers') </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                <div class="visual">
                                    <i class="fa fa-key"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$rolesCount}}">{{$rolesCount}}</span>
                                    </div>
                                    <div class="desc"> @lang('core.role') </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                <div class="visual">
                                    <i class="fa fa-key"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$permissionCount}}">{{$permissionCount}}</span></div>
                                    <div class="desc"> @lang('core.permissions') </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </section>
            @elseif($user->can('view-users'))
                <div class="row">
                    <div class="col-lg-6 col-xs-12 col-sm-12">
                        <div class="portlet light portlet-fit bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-users font-green"></i>
                                    <span class="caption-subject font-green bold uppercase">@lang('core.recentUsers')</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="mt-element-card mt-element-overlay">
                                    <div class="row">
                                        @forelse($recentUsers as $recentUser)
                                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                <div class="mt-card-item">
                                                    <div class="mt-card-avatar mt-overlay-1 mt-scroll-left">
                                                        <img src="{{ $recentUser->getGravatarAttribute(250) }}" height="80px">
                                                    </div>
                                                    <div class="mt-card-content">
                                                        <h3 class="mt-card-name">{{ $recentUser->trim_name }}</h3>
                                                        <p class="mt-card-desc font-grey-mint">
                                                            {{$recentUser->created_at->diffForHumans()}}
                                                        </p>
                                                        <p class="mt-card-desc font-grey-mint">
                                                            <span id="status99" class="label @if($recentUser->gender == 'female' )bg-female  @else bg-blue @endif disabled " style="background: deeppink;">
                                                                <i class="@if($recentUser->gender == 'female' )fa fa-female @else fa fa-male @endif"></i> @if($recentUser->gender == 'female' )@lang('core.female') @else @lang('core.male') @endif
                                                            </span>
                                                        </p>
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
            @else
                <section class="content">
                    <div class="row">
                        <h4> @lang('messages.welcomeToDashboard')</h4>
                    </div>
                </section>

            @endif

        </div>
        <!-- END CONTENT BODY -->
    </div>
@endsection