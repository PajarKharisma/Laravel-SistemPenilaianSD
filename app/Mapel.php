<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model {

    protected $table = 'mapel';
    protected $fillable = ['id_mapel', 'kode_mapel', 'nama_mapel', 'jenis_mapel'];
    public $timestamps = false;

    public static $rules = [
        'kode_mapel' =>   'required|unique:mapel,kode_mapel',
        'nama_mapel' =>  'required',
        'jenis_mapel' => 'required'
    ];

    public function mapelKelas(){
    	return $this->hasMany('App\MapelKelas', 'id_mapel', 'id_mapel');
    }

    public function nilai(){
    	return $this->hasMany('App\Nilai', 'id_mapel', 'id_mapel');
    }

    public function nilaiSikap(){
    	return $this->hasMany('App\NilaiSikap', 'id_mapel', 'id_mapel');
    }
}
