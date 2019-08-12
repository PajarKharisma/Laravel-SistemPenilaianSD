<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiswaKelas extends Model {
    
    protected $table = 'siswa_kelas';
    protected $fillable = ['id_sk', 'id_siswa', 'id_kelas'];
    public $timestamps = false;

    public static $rules = [
        'id_sk' =>   'required|unique:siswa_kelas,id_sk|numeric',
        'id_siswa' =>  'required|exists:siswa,id_siswa',
        'id_kelas' =>  'required|exists:kelas,id_kelas'
    ];

    public function nilai(){
    	return $this->hasMany('App\Nilai', 'id_mapel', 'id_mapel');
    }

    public function nilaiSikap(){
    	return $this->hasMany('App\NilaiSikap', 'id_mapel', 'id_mapel');
    }

    public function kelas(){
    	return $this->belongsTo('App\Kelas', 'id_kelas', 'id_kelas');
    }
}
