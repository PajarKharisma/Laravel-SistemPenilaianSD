@extends('template.backend')

@section('content')
@include('errors.list')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Input Data Guru</h3>
    </div>
    <form class="form-horizontal" method="post" action="{{url('guru/store/')}}">
        @csrf
        <div class="box-body">

            <div class="form-group ">
                <label for="nip" class="col-sm-3 control-label">NIP</label>
                <div class="col-sm-5">
                    <input class="form-control" id="nip" name="nip" placeholder="Masukan NIP" required>
                </div>
            </div>

            <div class="form-group ">
                <label for="nama_guru" class="col-sm-3 control-label">Nama Guru</label>
                <div class="col-sm-5">
                    <input class="form-control" id="nama_guru" name="nama_guru" placeholder="Masukan Nama Guru" required>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
@stop
