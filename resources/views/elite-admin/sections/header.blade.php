<!-- Top Navigation -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <!-- Toggle icon for mobile view -->
        <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
        <!-- Logo -->
        <div class="top-left-part" style="text-align: center;height: 60px;">
            <a class="logo" href="">
                <!-- Logo icon image, you can use font-icon also -->
                {{--<b> <img src="{{ asset('/logo/'.$global->logo) }}" alt="home" height="30px"/></b>--}}
                <!-- Logo text image you can use text also -->
                <span class="hidden-xs" style="vertical-align: -webkit-baseline-middle;"><img style="vertical-align: -webkit-baseline-middle;" id="logo" src="{{ asset('/logo/'.$global->logo) }}" alt="home" height="30px" alt="home" /></span>
            </a>
        </div>
        <!-- /Logo -->
        <!-- Search input and Toggle icon -->

        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
        </ul>
        <!-- This is the message dropdown -->
        <ul class="nav navbar-top-links navbar-right pull-right">

            <!-- .user dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle profile-pic"
                   data-toggle="dropdown" href="#"> <img src="{{$user->getGravatarAttribute(200)}}" alt="user-img" width="36" class="img-circle profile-image"><b class="hidden-xs">{{$user->name}}</b> <i class="fa fa-chevron-down"></i> </a>
                <ul class="dropdown-menu dropdown-user animated flipInY">
                    <li><a href="{{ route('profile-edit') }}" ><i class="ti-user"></i> My Profile</a></li>

                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('user.logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
                <!-- /.user dropdown-user -->
            </li>
            <!-- /.user dropdown -->

        </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>
<!-- End Top Navigation -->