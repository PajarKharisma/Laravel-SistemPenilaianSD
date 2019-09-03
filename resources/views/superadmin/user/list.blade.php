<div class="row">
    <div class="col-md-6 form-group has-feedback ">
        <form method="GET" >
            {!! Form::text('searchtext', $searchtext, ['class' => 'form-control','placeholder' => 'Filter','id' => 'searchtext']) !!}						
        </form>
    </div>
    <div class="col-md-6">
        <a class="btn btn-success btn-sm pull-right" href="{{url('/user/create')}}">
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
                        <th> Username </th>
                        @if ($tabs[0] != null)
                        <th> Kode Kelas </th>
                        @endif
                        <th> Jabatan  </th>
                        <th> Aksi </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $data)
                    <tr>
                        <td>{{ $data->username }}</td>
                        @if ($data->id_kelas != -1)
                        <td>{{ $data->kode_kelas }}</td>
                        @endif
                        <td>
                            @if ($data->jabatan == 0)
                                Pimpinan
                            @else
                                Wali Kelas
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-success" href="{{url('/user/edit/'.$data->id)}}"><i class="fa fa-fw fa-check-square-o"></i></a>
                                <button class="btn btn-danger" data-href="{{url('/user/delete/'.$data->id)}}" data-toggle="modal" data-target="#confirm-delete">
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