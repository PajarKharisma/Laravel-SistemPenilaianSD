@extends('template.backend')

@section('content')
<?php
if(!isset($searchtext)){
	$searchtext = '';
}
?>
<div class="box box-info">

    <div class="box-header with-border">
        <h3 class="box-title"><strong>Pilih Siswa</strong></h3>
    </div>
    
    <br>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('/siswakelas/store') }}" method="GET" class="form-horizontal" role="form">
                <div class="form-group">
                    <div class="">
                        <label for="tahun_masuk" class="col-sm-2 control-label">Tahun Masuk</label>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control selectpicker" style="width: 100%;" name="tahun_masuk" id="tahun_masuk">
                            <option id="0" value="0">Semua</option>
                            @for($i=2000; $i<=2040; $i++)
                                <option id="{{ $i }}" value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="box-body">
        @if(isset($datas) && $datas->count() > 0)
            <form class="form-horizontal" method="post" action="{{ url('siswakelas/store') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive" style=" height: 355px !important;overflow: auto">
                            <table class="table table-striped table-advance table-bordered table-hover">
                                <thead>
                                    <tr class="bg-primary">
                                        <th> NIS </th>
                                        <th> Nama Siswa </th>
                                        <th> Jenis Kelamin </th>
                                        <th> Tahun Mulai </th>
                                        <th> Pilih </th>
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
                                                <input type="checkbox" value="{{ $data->id_siswa }}" name="siswa[]" class="form-check-input" id="">
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
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
@endsection

@section('scripts')
<script>
jQuery(document).ready(function(){
    var tahun = {{ $tahun }};
    $('#'+tahun).attr("selected","selected");

    $('#tahun_masuk').on("change",function(){
        window.location.href = "{{ url('/siswakelas/create')}}/"+$(this).val();
    });
});
</script>
@endsection