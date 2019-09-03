<aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><strong>MENU</strong></li>
        <li class="{{ isset($menuberanda) ? $menuberanda : null }}" ><a href="{{url('/home')}}"><i class="fa fa-home"></i>  <span>Beranda</span></a></li>
        
        @if(Auth::check() && Auth::user()->jabatan == 999)
        <li class="{{ isset($menuuser) ? $menuuser : null }}"><a href="{{ url('/user') }}"><i class="fa fa-users"></i>  <span>Kelola Pengguna</span></a></li>
        <li class="{{ isset($menuta) ? $menuta : null }}"><a href="{{ url('/tahunajaran') }}"><i class="fa  fa-calendar"></i>  <span>Kelola Tahun Ajaran</span></a></li>
        <li class="{{ isset($menusemester) ? $menusemester : null }}"><a href="{{ url('/semester') }}"><i class="fa fa-calendar-o"></i>  <span>Kelola Semester</span></a></li>
        <li class="{{ isset($menuguru) ? $menuguru : null }}"><a href="{{ url('/guru') }}"><i class="fa fa-graduation-cap"></i>  <span>Data Guru</span></a></li>
        <li class="{{ isset($menusiswa) ? $menusiswa : null }}"><a href="{{ url('/siswa') }}"><i class="fa fa-male"></i>  <span>Data Siswa</span></a></li>
        <li class="{{ isset($menumapel) ? $menumapel : null }}"><a href="{{ url('/mapel') }}"><i class="fa fa-book"></i>  <span>Data Mata Pelajaran</span></a></li>
        <li class="{{ isset($menukelas) ? $menukelas : null }}"><a href="{{ url('/kelas') }}"><i class="fa fa-building"></i>  <span>Data Kelas</span></a></li>
        
        @elseif(Auth::check() && Auth::user()->jabatan == 998)
        <li class="{{ isset($menusiswakelas) ? $menusiswakelas : null }}"><a href="{{ url('/siswakelas') }}"><i class="fa fa-group"></i>  <span>Daftar Siswa</span></a></li>
        <li class="{{ isset($menumapelkelas) ? $menumapelkelas : null }}"><a href="{{ url('/mapelkelas') }}"><i class="fa fa-list-alt"></i>  <span>Daftar Mata Pelajaran</span></a></li>
        <li class="{{ isset($menunilai) ? $menunilai : null }}"><a href="{{ url('/nilai') }}"><i class="fa fa-file-text"></i>  <span>Nilai</span></a></li>
        
        @else
        @endif
        <li class="header">About</li>
        <li class=""><a href="#"><i class="fa fa-info-circle"></i>  <span>Informasi</span></a></li>
        <li class=""><a href="#"><i class="fa fa-question-circle"></i>  <span>Bantuan</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>