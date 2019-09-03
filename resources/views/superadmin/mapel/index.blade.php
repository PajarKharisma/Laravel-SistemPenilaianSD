@extends('template.backend')

@section('content')
<?php
if(!isset($searchtext)){
	$searchtext = '';
}
?>
<div class="box box-info">

    <div class="box-header with-border">
        <h3 class="box-title"><strong>Mata Pelajaran</strong></h3>
    </div>

    <div class="nav-tabs-custom ">
        <ul class="nav nav-tabs">
            <li class="{{isset($tabs[0]) ? $tabs[0] : null }}" ><a href="{{url('/mapel/daftar/pengetahuan')}}">Pengetahuan</a></li>
            <li class="{{isset($tabs[1]) ? $tabs[1] : null }}" ><a href="{{url('/mapel/daftar/keterampilan')}}">Keterampilan</a></li>
            <li class="{{isset($tabs[2]) ? $tabs[2] : null }}" ><a href="{{url('/mapel/daftar/sikap')}}">Sikap</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active">
                @if(!empty($tabContent))
                    @include($tabContent)
                @endif
            </div>
        </div>
    </div>

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