@extends('template.backend')

@section('content')
    @if (Auth::user()->jabatan == 998)
        <p><b><font size="18">SELAMAT DATANG BAPAK / IBU {{ $walikelas->nama_guru }} WALI KELAS {{ $walikelas->nama_kelas }}</font><b></p>
    @elseif (Auth::user()->jabatan == 0)
        <p><b><font size="18">SELAMAT DATANG KEPALA SEKOLAH</font><b></p>
    @else
        <p><b><font size="18">SELAMAT DATANG DI SISTEM INFORMASI PENILAIAN SEKOLAH DASAR</font><b></p>
    @endif
@endsection