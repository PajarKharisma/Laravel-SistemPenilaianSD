<div class="row">
    <div class="col-md-6 form-group has-feedback ">
        <form method="GET" >
            {!! Form::text('searchtext', $searchtext, ['class' => 'form-control','placeholder' => 'Filter','id' => 'searchtext']) !!}						
        </form>
    </div>
    <div class="col-md-6">
        <a class="btn btn-success btn-sm pull-right" href="{{url('/mapelkelas/create')}}">
            <i class="fa fa-plus"> Data Baru</i>
        </a>
    </div>
</div>

@if(isset($datas) && $datas->count() > 0)
<form class="form-horizontal" method="post" id="formdata" action="{{ url('mapelkelas/delete') }}">
@csrf
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive" style=" height: 290px !important;overflow: auto">
            <table class="table table-striped table-advance table-bordered table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th> Kode Mata Pelajaran </th>
                        <th> Nama Mata Pelajaran </th>
                        <th> Jenis Mata Pelajaran </th>
                        <th> Pilih </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $data)
                    <tr>
                        <td>{{ $data->kode_mapel }}</td>
                        <td>{{ $data->nama_mapel }}</td>
                        @if($data->jenis_mapel == 0)
                            <td>Pengetahuan</td>
                        @elseif($data->jenis_mapel == 1)
                            <td>Keterampilan</td>
                        @else
                            <td>Sikap</td>
                        @endif
                        <td>
                            <div class="form-check">
                                <input type="checkbox" value="{{ $data->id_mk }}" name="mapel[]" class="form-check-input" id="">
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