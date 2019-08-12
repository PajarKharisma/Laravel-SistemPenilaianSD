@extends('template.backend')

@section('content')
@include('errors.list')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Input Data Siswa</h3>
    </div>
    <form class="form-horizontal" method="post" action="{{url('siswa/store/')}}">
        @csrf
        <div class="box-body">

            <div class="form-group ">
                <label for="nis" class="col-sm-3 control-label">NIS</label>
                <div class="col-sm-5">
                    <input class="form-control" id="nis" name="nis" placeholder="Masukan NIS" required>
                </div>
            </div>

            <div class="form-group ">
                <label for="nama_siswa" class="col-sm-3 control-label">Nama Siswa</label>
                <div class="col-sm-5">
                    <input class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Masukan Nama Siswa" required>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
@stop
