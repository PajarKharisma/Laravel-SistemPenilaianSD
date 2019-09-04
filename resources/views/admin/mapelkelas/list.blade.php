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
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive" style=" height: 345px !important;overflow: auto">
            <table class="table table-striped table-advance table-bordered table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th> Kode Mata Pelajaran </th>
                        <th> Nama Mata Pelajaran </th>
                        <th> Jenis Mata Pelajaran </th>
                        <th> Aksi </th>
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
                            <div class="btn-group">
                                <button class="btn btn-danger" data-href="{{ url('/mapelkelas/delete',$data->id_mk) }}" data-toggle="modal" data-target="#confirm-delete">
                                    <i class="fa fa-fw fa-remove"></i>
                                </button>
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
@else
<div class="row">
    <div class="col-lg-12">
        <strong>DATA TIDAK DITEMUKAN</strong>
    </div>
</div>
@endif