@extends('template.backend')

@section('content')
<?php
if(!isset($searchtext)){
	$searchtext = '';
}
?>
<div class="box box-info">

    <div class="box-header with-border">
        <h3 class="box-title"><strong>Siswa</strong></h3>
    </div>

    <div class="box-body">

        <div class="row">
            <div class="col-md-6 form-group has-feedback ">
                <form method="GET" >
                    {!! Form::text('searchtext', $searchtext, ['class' => 'form-control','placeholder' => 'Filter','id' => 'searchtext']) !!}						
                </form>
            </div>
            <div class="col-md-6">
                <a class="btn btn-success btn-sm pull-right" href="{{url('/siswa/create')}}">
                    <i class="fa fa-plus"> Data Baru</i>
                </a> 
            </div>
        </div>

        @if(isset($datas) && $datas->count() > 0)
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped table-advance table-hover">
                    <thead>
                        <tr class="bg-primary">
                            <th> NIS </th>
                            <th> Nama Siswa </th>
                            <th> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                        <tr>
                            <td>{{$data->nis}}</td>
                            <td>{{$data->nama_siswa}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-success" href="{{url('/siswa/edit',$data->id_siswa)}}"><i class="fa fa-fw fa-check-square-o"></i></a>
                                    <button class="btn btn-danger" data-href="{{url('/siswa/delete',$data->id_siswa)}}" data-toggle="modal" data-target="#confirm-delete">
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
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
});
</script>
@endsection