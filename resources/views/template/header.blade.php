<header class="main-header">
    <!-- Logo -->
    <a href="{{url('/')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>ps</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sistem Penilaian SD</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          @if (Auth::check())
          <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs"><strong>{{ Auth::user()->username }}</strong></span>
              </a>
              <ul class="dropdown-menu">
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="#" class="btn btn-default btn-flat">Edit Profi</a>
                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </div>
                </li>
              </ul>
            </li>
          @else
          <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs"><strong> > </strong></span>
              </a>
              <ul class="dropdown-menu">
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="{{ route('login') }}" class="btn btn-default btn-flat">Login</a>
                  </div>
                </li>
              </ul>
            </li>
          @endif
        </ul>
      </div>
    </nav>
  </header>