@extends('template.backend')

@section('content')
@include('errors.list')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Input Tahun Ajaran</h3>
    </div>
    <form class="form-horizontal" method="post" action="{{url('tahunajaran/update', $edit->id_ta)}}">
        @csrf
        <div class="box-body">

            <div class="form-group ">
                <label for="nama_ta" class="col-sm-3 control-label">Tahun Ajaran</label>
                <div class="col-sm-5">
                    <input class="form-control" id="nama_ta" name="nama_ta" placeholder="Masukan tahun ajaran" value="{{ $edit->nama_ta }}" required>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
@stop
