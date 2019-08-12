@extends('template.backend')

@section('content')
@include('errors.list')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Data Guru</h3>
    </div>
    <form class="form-horizontal" method="post" action="{{url('siswa/update', $edit->id_siswa)}}">
        @csrf
        <div class="box-body">

            <div class="form-group ">
                <label for="nis" class="col-sm-3 control-label">NIP</label>
                <div class="col-sm-5">
                    <input class="form-control" id="nis" name="nis" placeholder="Masukan NIS" value="{{ $edit->nis }}" required>
                </div>
            </div>

            <div class="form-group ">
                <label for="nama_siswa" class="col-sm-3 control-label">Nama Siswa</label>
                <div class="col-sm-5">
                    <input class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Masukan Nama Siswa" value="{{ $edit->nama_siswa }}" required>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
@stop
