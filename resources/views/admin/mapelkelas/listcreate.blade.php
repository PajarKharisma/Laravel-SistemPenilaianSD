<div class="box-body">
    @if(isset($datas) && $datas->count() > 0)
        <form class="form-horizontal" method="post" action="{{ url('mapelkelas/store') }}">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive" style=" height: 355px !important;overflow: auto">
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
                                    @else
                                        <td>Sikap</td>
                                    @endif
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" value="{{ $data->id_mapel }}" name="mapel[]" class="form-check-input" id="">
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