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
                <span class="hidden-xs"><i class="fa fa-user"></i><strong>   {{ Auth::user()->username }}</strong></span>
              </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/home') }}" ><i class="fa fa-home"></i><span> Beranda</span></a></li>
                    <li><a href="#"><i class="fa fa-gear"></i> Edit Profil</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>
                        Keluar
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
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