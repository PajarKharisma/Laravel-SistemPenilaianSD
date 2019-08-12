<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapelKelas extends Model {

    protected $table = 'mapel_kelas';
    protected $fillable = ['id_mk', 'id_mapel', 'id_kelas'];
    public $timestamps = false;

    public static $rules = [
        'id_mk' =>   'required|unique:mapel_kelas,id_mk|numeric',
        'id_mapel' =>  'required|exists:mapel,id_mapel',
        'id_kelas' =>  'required|exists:kelas,id_kelas'
    ];

    public function kelas(){
    	return $this->belongsTo('App\Kelas', 'id_kelas', 'id_kelas');
    }

    public function mapel(){
    	return $this->belongsTo('App\Mapel', 'id_mapel', 'id_mapel');
    }
}
