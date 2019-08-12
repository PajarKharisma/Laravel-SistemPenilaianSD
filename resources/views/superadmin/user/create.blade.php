@extends('template.backend')

@section('content')
@include('errors.list')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Input User</h3>
    </div>
    <form class="form-horizontal" method="post" action="{{ url('user/store/') }}">
        @csrf
        <div class="box-body">

            <div class="form-group ">
                <label for="kode_kelas" class="col-sm-3 control-label">Username</label>
                <div class="col-sm-5">
                    <input class="form-control" id="username" name="username" placeholder="Masukan Username" required autofocus>
                </div>
            </div>

            <div class="form-group ">
                <label for="jabatan" class="col-sm-3 control-label">Jabatan</label>
                <div class="col-sm-5">
                    <select id="jabatan" name="jabatan" class="form-control">
                        <option value="998">Wali Kelas</option>
                        <option value="0">Kepala Sekolah</option>
                    </select>
                </div>
            </div>

            <div class="form-group ">
                <label for="nama_guru" class="col-sm-3 control-label">Kode Kelas</label>
                <div class="col-sm-4">
                    <input type="hidden" name="id_kelas" id="id_kelas">
                    <input class="form-control" id="kode_kelas" name="kode_kelas" placeholder="Masukan Kode Kelas" readonly required>
                </div>
                <button type="button" class="btn btn-primary" id="show_kelas"> ... </button>
            </div>

            <div class="form-group ">
                <label for="password" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-5">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>

{{-- Modal Table Guru--}}
<div id="modal_kelas" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="classModalLabel"><strong>Data Kelas</strong></h4>
        </div>
        <div class="modal-body">
            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table id="tbl_guru" class="table table-bordered table-striped mb-0">
                    <thead>
                        <tr class="bg-primary">
                            <th> Id Kelas </th>
                            <th> Kode Kelas </th>
                            <th> Nama Kelas </th>
                            <th> Nama Guru </th>
                            <th> Tahun Ajaran </th>
                            <th> Semester </th>
                            <th> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas_kelas as $data)
                        <tr>
                            <td>{{ $data->id_kelas }}</td>
                            <td>{{ $data->kode_kelas }}</td>
                            <td>{{ $data->nama_kelas }}</td>
                            <td>{{ $data->nama_guru }}</td>
                            <td>{{ $data->nama_ta }}</td>
                            <td>{{ $data->nama_semester }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success select_kelas"><i class="fa fa-fw fa-check-square-o"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script>
function setKelas(){
    $('#show_kelas').on('click', function() {
        $('#modal_kelas').modal('show');
    });

    $('.select_kelas').on('click', function() {
        let $tr = $(this).closest('tr');
        let id_kelas = $('td:eq(0)', $tr).text();
        let kode_kelas = $('td:eq(1)', $tr).text();

        $('#id_kelas').val(id_kelas);
        $('#kode_kelas').val(kode_kelas);

        $('#modal_kelas').modal('hide');
    }); 
}

$(function () {
    $(document).ready( function () {
        setKelas();
    });

    $('#jabatan').change(function() {
        let jabatan = $('#jabatan').val();
        if(jabatan == 998){
            $('#show_kelas').attr("disabled", false);
        } else {
            console.log("masuk sini");
            $('#show_kelas').attr("disabled", true);
            $('#id_kelas').val(-1);
            $('#kode_kelas').val('');
        }
    });
});
</script>
@endsection

@section('styles')
<style>
.my-custom-scrollbar {
    position: relative;
    height: 450px;
    overflow: auto;
}
.table-wrapper-scroll-y {
    display: block;
}
</style>
<style>
.modal-body {
  overflow-x: auto;
}
</style>
@endsection
