<div class="row">
    <div class="col-md-6 form-group has-feedback ">
        <form method="GET" >
            {!! Form::text('searchtext', $searchtext, ['class' => 'form-control','placeholder' => 'Filter','id' => 'searchtext']) !!}						
        </form>
    </div>
    <div class="col-md-6">
        <a class="btn btn-success btn-sm pull-right" href="{{url('/mapel/create')}}">
            <i class="fa fa-plus"> Data Baru</i>
        </a> 
    </div>
</div>

@if(isset($datas) && $datas->count() > 0)
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive" style=" height: 385px !important;overflow: auto">
            <table class="table table-striped table-advance table-bordered table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th> Kode Mata Pelajaran </th>
                        <th> Mata Pelajaran </th>
                        <th> Jenis </th>
                        <th> Aksi </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $data)
                    <tr>
                        <td>{{ $data->kode_mapel }}</td>
                        <td>{{ $data->nama_mapel }}</td>
                        <td>
                            @if ($data->jenis_mapel == 0)
                                Pengetahuan
                            @else
                                Keterampilan
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-success" href="{{url('/mapel/edit',$data->id_mapel)}}"><i class="fa fa-fw fa-check-square-o"></i></a>
                                <button class="btn btn-danger" data-href="{{url('/mapel/delete',$data->id_mapel)}}" data-toggle="modal" data-target="#confirm-delete">
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