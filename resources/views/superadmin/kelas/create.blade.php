@extends('template.backend')

@section('content')
@include('errors.list')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Input Data Guru</h3>
    </div>
    <form class="form-horizontal" method="post" action="{{url('kelas/store/')}}">
        @csrf
        <div class="box-body">

            <div class="form-group ">
                <label for="kode_kelas" class="col-sm-3 control-label">Kode Kelas</label>
                <div class="col-sm-5">
                    <input class="form-control" id="kode_kelas" name="kode_kelas" placeholder="Masukan Kode Kelas" required>
                </div>
            </div>

            <div class="form-group ">
                <label for="nama_kelas" class="col-sm-3 control-label">Nama Kelas</label>
                <div class="col-sm-5">
                    <input class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Masukan Nama Kelas" required>
                </div>
            </div>

            <div class="form-group ">
                <label for="nama_guru" class="col-sm-3 control-label">Nama Guru</label>
                <div class="col-sm-4">
                    <input type="hidden" name="id_guru" id="id_guru">
                    <input class="form-control" id="nama_guru" name="nama_guru" placeholder="Masukan Nama Guru" readonly required>
                </div>
                <button type="button" class="btn btn-primary" id="show_guru"> ... </button>
            </div>

            <div class="form-group ">
                <label for="nama_ta" class="col-sm-3 control-label">Tahun Ajaran</label>
                <div class="col-sm-4">
                    <input type="hidden" name="id_ta" id="id_ta">
                    <input class="form-control" id="nama_ta" name="nama_ta" placeholder="Masukan Tahun Ajaran" readonly required>
                </div>
                <button type="button" class="btn btn-primary" id="show_ta"> ... </button>
            </div>

            <div class="form-group ">
                <label for="nama_semester" class="col-sm-3 control-label">Semester</label>
                <div class="col-sm-4">
                    <input type="hidden" name="id_semester" id="id_semester">
                    <input class="form-control" id="nama_semester" name="nama_semester" placeholder="Masukan Semester" readonly required>
                </div>
                <button type="button" class="btn btn-primary" id="show_semester"> ... </button>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>

{{-- Modal Table Guru--}}
<div id="modal_guru" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="classModalLabel"><strong>Data Guru</strong></h4>
        </div>
        <div class="modal-body">
            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table id="tbl_guru" class="table table-bordered table-striped mb-0">
                    <thead>
                        <tr class="bg-primary">
                            <th> Id Guru</th>
                            <th> NIP </th>
                            <th> Nama Guru </th>
                            <th> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas_guru as $data)
                        <tr>
                            <td>{{$data->id_guru}}</td>
                            <td>{{$data->nip}}</td>
                            <td>{{$data->nama_guru}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success select_guru"><i class="fa fa-fw fa-check-square-o"></i></button>
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

{{-- Modal Table Guru--}}
<div id="modal_ta" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="classModalLabel"><strong>Data Tahun Ajaran</strong></h4>
        </div>
        <div class="modal-body">
            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table id="tbl_guru" class="table table-bordered table-striped mb-0">
                    <thead>
                        <tr class="bg-primary">
                            <tr class="bg-primary">
                                <th> Id Tahun Ajaran</th>
                                <th> Tahun Ajaran </th>
                                <th> Aksi </th>
                            </tr>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas_ta as $data)
                        <tr>
                            <td>{{$data->id_ta}}</td>
                            <td>{{$data->nama_ta}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success select_ta"><i class="fa fa-fw fa-check-square-o"></i></button>
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

{{-- Modal Table Semester--}}
<div id="modal_semester" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="classModalLabel"><strong>Data Semester</strong></h4>
        </div>
        <div class="modal-body">
            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table id="tbl_semester" class="table table-bordered table-striped mb-0">
                    <thead>
                        <tr class="bg-primary">
                            <tr class="bg-primary">
                                <th> Id Semester</th>
                                <th> Semester </th>
                                <th> Aksi </th>
                            </tr>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas_semester as $data)
                        <tr>
                            <td>{{$data->id_semester}}</td>
                            <td>{{$data->nama_semester}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success select_semester"><i class="fa fa-fw fa-check-square-o"></i></button>
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
function setGuru(){
    $('#show_guru').on('click', function() {
        $('#modal_guru').modal('show');
    });

    $('.select_guru').on('click', function() {
        let $tr = $(this).closest('tr');
        let id_guru = $('td:eq(0)', $tr).text();
        let nip = $('td:eq(1)', $tr).text();
        let nama_guru = $('td:eq(2)', $tr).text();

        $('#id_guru').val(id_guru);
        $('#nama_guru').val(nama_guru);

        $('#modal_guru').modal('hide');
    }); 
}

function setTa(){
    $('#show_ta').on('click', function() {
        $('#modal_ta').modal('show');
    });

    $('.select_ta').on('click', function() {
        let $tr = $(this).closest('tr');
        let id_ta = $('td:eq(0)', $tr).text();
        let nama_ta = $('td:eq(1)', $tr).text();

        $('#id_ta').val(id_ta);
        $('#nama_ta').val(nama_ta);

        $('#modal_ta').modal('hide');
    }); 
}

function setSemester(){
    $('#show_semester').on('click', function() {
        $('#modal_semester').modal('show');
    });

    $('.select_semester').on('click', function() {
        let $tr = $(this).closest('tr');
        let id_semester = $('td:eq(0)', $tr).text();
        let nama_semester = $('td:eq(1)', $tr).text();

        $('#id_semester').val(id_semester);
        $('#nama_semester').val(nama_semester);

        $('#modal_semester').modal('hide');
    }); 
}

$(document).ready( function () {
    setGuru();
    setTa();
    setSemester();
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
