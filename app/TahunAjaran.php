<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model {

    protected $table = 'tahun_ajaran';
    protected $fillable = ['id_ta', 'nama_ta'];
    public $timestamps = false;

    public static $rules = [
        'nama_ta' =>  'required'
    ];

    public function kelas(){
    	return $this->hasMany('App\Kelas', 'id_ta', 'id_ta');
    }
}
