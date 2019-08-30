<aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><strong>MENU</strong></li>
        <li class="" ><a href="{{url('/home')}}"><i class="fa fa-home"></i>  <span>Beranda</span></a></li>
        @if(Auth::check() && Auth::user()->jabatan == 999)
        <li class=""><a href="{{ url('/user') }}"><i class="fa fa-users"></i>  <span>Kelola Pengguna</span></a></li>
        <li class=""><a href="{{ url('/tahunajaran') }}"><i class="fa  fa-calendar"></i>  <span>Kelola Tahun Ajaran</span></a></li>
        <li class=""><a href="{{ url('/semester') }}"><i class="fa fa-calendar-o"></i>  <span>Kelola Semester</span></a></li>
        <li class=""><a href="{{ url('/guru') }}"><i class="fa fa-graduation-cap"></i>  <span>Data Guru</span></a></li>
        <li class=""><a href="{{ url('/siswa') }}"><i class="fa fa-male"></i>  <span>Data Siswa</span></a></li>
        <li class=""><a href="{{ url('/mapel') }}"><i class="fa fa-book"></i>  <span>Data Mata Pelajaran</span></a></li>
        <li class=""><a href="{{ url('/kelas') }}"><i class="fa fa-building"></i>  <span>Data Kelas</span></a></li>
        @endif
        <li class="header">About</li>
        <li class=""><a href="#"><i class="fa fa-info-circle"></i>  <span>Informasi</span></a></li>
        <li class=""><a href="#"><i class="fa fa-question-circle"></i>  <span>Bantuan</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>