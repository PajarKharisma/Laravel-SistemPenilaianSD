<aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><strong>MENU</strong></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Kelola</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if(Auth::check() && Auth::user()->jabatan == 999)
            <li><a href="{{ url('/user') }}"><i class="fa fa-circle-o"></i> Data Pengguna</a></li>
            <li><a href="{{ url('/tahunajaran') }}"><i class="fa fa-circle-o"></i> Tahun Ajaran</a></li>
            <li><a href="{{ url('/semester') }}"><i class="fa fa-circle-o"></i> Data Semester</a></li>
            <li><a href="{{ url('/guru') }}"><i class="fa fa-circle-o"></i> Data Guru</a></li>
            <li><a href="{{ url('/siswa') }}"><i class="fa fa-circle-o"></i> Data Siswa</a></li>
            <li><a href="{{ url('/mapel') }}"><i class="fa fa-circle-o"></i> Data Mata Pelajaran</a></li>
            <li><a href="{{ url('/kelas') }}"><i class="fa fa-circle-o"></i> Data Kelas</a></li>
            @endif
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="header">About</li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Tutorial</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>