@extends('template.backend')

@section('content')
@include('errors.list')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Input Semester</h3>
    </div>
    <form class="form-horizontal" method="post" action="{{url('semester/update', $edit->id_semester)}}">
        @csrf
        <div class="box-body">

            <div class="form-group ">
                <label for="nama_semester" class="col-sm-3 control-label">Semester</label>
                <div class="col-sm-5">
                    <input class="form-control" id="nama_semester" name="nama_semester" placeholder="Masukan semester" value="{{ $edit->nama_semester }}" required>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
@stop
