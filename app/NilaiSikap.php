<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiSikap extends Model {
    
    protected $table = 'nilai_sikap';
    protected $fillable = ['id_ns', 'id_sk', 'id_mapel', 'nilai', 'deskripsi'];
    public $timestamps = false;

    public static $rules = [
        'id_ns' =>   'required|unique:nilai_sikap,id_ns|numeric',
        'id_sk' =>  'required|exists:siswa_kelas,id_sk',
        'id_mapel' =>  'required|exists:mapel,id_mapel',
        'nilai' =>  'required|alpha',
        'deskripsi' =>  'required'
    ];

    public function mapel(){
    	return $this->belongsTo('App\Mapel', 'id_mapel', 'id_mapel');
    }

    public function siswaKelas(){
    	return $this->belongsTo('App\SiswaKelas', 'id_sk', 'id_sk');
    }
}
