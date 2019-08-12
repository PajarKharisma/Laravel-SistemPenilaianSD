<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model {

    protected $table = 'nilai';
    protected $fillable = ['id_np', 'id_sk', 'id_mapel', 'nilai_pengetahuan', 'prediksi_pengetahuan', 'deskripsi_pengetahuan', 'nilai_keterampilan', 'prediksi_keterampilan', 'deskripsi_keterampilan'];
    public $timestamps = false;

    public static $rules = [
        'id_np' =>   'required|unique:nilai,id_np|numeric',
        'id_sk' =>  'required|exists:siswa_kelas,id_sk',
        'id_mapel' =>  'required|exists:mapel,id_mapel',
        'nilai_pengetahuan' =>  'required|numeric',
        'prediksi_pengetahuan' =>  'required|alpha',
        'deskripsi_pengetahuan' =>  'required',
        'nilai_keterampilan' =>  'required|numeric',
        'prediksi_keterampilan' =>  'required|alpha',
        'deskripsi_keterampilan' =>  'required'
    ];

    public function mapel(){
    	return $this->belongsTo('App\Mapel', 'id_mapel', 'id_mapel');
    }

    public function siswaKelas(){
    	return $this->belongsTo('App\SiswaKelas', 'id_sk', 'id_sk');
    }
}
