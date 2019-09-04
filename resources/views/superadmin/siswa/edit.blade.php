@extends('template.backend')

@section('content')
@include('errors.list')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Data Siswa</h3>
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

            <div class="form-group ">
                <label for="jenis_kelamin" class="col-sm-3 control-label">Jenis Kelamin</label>
                <div class="col-sm-5">
                    <select class="form-control select" style="width: 100%;" name="jenis_kelamin" id="jenis_kelamin">
                        <option id="perempuan" value="0">Perempuan</option>
                        <option id="laki" value="1">Laki - Laki</option>
                    </select>
                </div>
            </div>

            <div class="form-group ">
                <label for="tahun_mulai" class="col-sm-3 control-label">Tahun Mulai</label>
                <div class="col-sm-5">
                    <input class="form-control" id="tahun_mulai" name="tahun_mulai" placeholder="Masukan Tahun Mulai" value="{{ $edit->tahun_mulai }}" required>
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
    var jenisKelamin = <?php echo $edit->jenis_kelamin; ?>;
    if(jenisKelamin == 0){
        $('#perempuan').attr("selected","selected");
    } else{
        $('#laki').attr("selected","selected");
    }
});
</script>    
@endsection
