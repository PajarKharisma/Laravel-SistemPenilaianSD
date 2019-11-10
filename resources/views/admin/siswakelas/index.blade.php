@extends('template.backend')

@section('content')
<?php
if(!isset($searchtext)){
	$searchtext = '';
}
?>
<div class="box box-info">

    <div class="box-header with-border">
        <h3 class="box-title"><strong>Daftar siswa kelas {{ $kelas->nama_kelas }}</strong></h3>
    </div>

    <div class="box-body">

        <div class="row">
            <div class="col-md-6 form-group has-feedback ">
                <form method="GET" >
                    {!! Form::text('searchtext', $searchtext, ['class' => 'form-control','placeholder' => 'Filter','id' => 'searchtext']) !!}						
                </form>
            </div>
            <div class="col-md-6">
                <a class="btn btn-success btn-sm pull-right" href="{{url('/siswakelas/create')}}">
                    <i class="fa fa-plus"> Data Baru</i>
                </a>
            </div>
        </div>

        @if(isset($datas) && $datas->count() > 0)
        <form class="form-horizontal" method="post" id="formdata" action="{{ url('siswakelas/delete') }}">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive" style=" height: 375px !important;overflow: auto">
                        <table class="table table-striped table-advance table-bordered table-hover">
                            <thead>
                                <tr class="bg-primary">
                                    <th> NIS </th>
                                    <th> Nama Siswa </th>
                                    <th> Jenis Kelamin </th>
                                    <th> Tahun Mulai </th>
                                    <th> Hapus </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $data)
                                <tr>
                                    <td>{{ $data->nis }}</td>
                                    <td>{{ $data->nama_siswa }}</td>
                                    @if($data->jenis_kelamin == 0)
                                        <td>Perempuan</td>
                                    @else
                                        <td>Laki - laki</td>
                                    @endif
                                    <td>{{ $data->tahun_mulai }}</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" value="{{ $data->id_sk }}" name="siswa[]" class="form-check-input" id="">
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $datas->render() }}
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">Hapus</button>
            </div>
        </form>
        @else
        <div class="row">
            <div class="col-lg-12">
                <strong>DATA TIDAK DITEMUKAN</strong>
            </div>
        </div>
        @endif

    </div>


    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    KONFIRMASI
                </div>
                <div class="modal-body">
                    Yakin ingin menghapus?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <a id="submit" class="btn btn-danger btn-ok">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
jQuery(document).ready(function(){
	$('#confirm-delete').on('show.bs.modal', function(e) {
    	$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});

    $('#submit').click(function(){
        $('#formdata').submit();
    });
});
</script>
@endsection