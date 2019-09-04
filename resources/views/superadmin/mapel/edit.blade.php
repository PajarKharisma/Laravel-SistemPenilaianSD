@extends('template.backend')

@section('content')
@include('errors.list')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Data Mata Pelajaran</h3>
    </div>
    <form class="form-horizontal" method="post" action="{{url('mapel/update', $edit->id_mapel)}}">
        @csrf
        <div class="box-body">

            <div class="form-group ">
                <label for="kode_mapel" class="col-sm-3 control-label">Kode Mata Pelajaran</label>
                <div class="col-sm-5">
                    <input class="form-control" id="kode_mapel" name="kode_mapel" placeholder="Masukan Kode Mata Pelajaran" value="{{ $edit->kode_mapel }}" required>
                </div>
            </div>

            <div class="form-group ">
                <label for="nama_mapel" class="col-sm-3 control-label">Nama Mata Pelajaran</label>
                <div class="col-sm-5">
                    <input class="form-control" id="nama_mapel" name="nama_mapel" placeholder="Masukan Mata Pelajaran" value="{{ $edit->nama_mapel }}" required>
                </div>
            </div>
    
            <div class="form-group ">
                <label for="jenis_mapel" class="col-sm-3 control-label">Jenis Mata Pelajaran</label>
                <div class="col-sm-5">
                    <select class="form-control select" style="width: 100%;" name="jenis_mapel" id="jenis_mapel">
                        <option id="pengetahuan" value="0">Pengetahuan</option>
                        <option id="sikap" value="1">Sikap</option>
                    </select>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready( function () {
    var jenisMapel = <?php echo $edit->jenis_mapel; ?>;
    if(jenisMapel == 0){
        $('#pengetahuan').attr("selected","selected");
    }  else{
        $('#sikap').attr("selected","selected");
    }
});
</script>    
@endsection
