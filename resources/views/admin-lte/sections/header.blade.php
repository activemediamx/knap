<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><img src="{{ asset('/logo/knap-small.png') }}" alt="logo" class="logo-default" height="30px"></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">
        <img id="logo" src="{{ asset('/logo/'.$global->logo)  }}" alt="logo" class="logo-default" height="30px">
    </span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="{{ asset('#') }}" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">


        <li class="dropdown user user-menu">
          <a href="{{ asset('#') }}" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ $user->getGravatarAttribute(200) }}" class="user-image profile-image" alt="User Image">
            <span class="hidden-xs">{{ $user->present()->displayName }}</span>
            <i class="fa fa-angle-down"></i>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{ $user->getGravatarAttribute(200) }}" class="img-circle " alt="User Image">

              <p>
                {{ $user->present()->displayName }}
                <small>@lang('core.memberSince') {{ $user->present()->memberSince }}</small>
              </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="{{ route('profile-edit') }}" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="{{ route('user.logout') }}" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </nav>
</header>