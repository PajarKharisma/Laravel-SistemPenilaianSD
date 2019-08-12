<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model {
    protected $table = 'siswa';
    protected $fillable = ['id_siswa', 'nis', 'nama_siswa'];
    public $timestamps = false;

    public static $rules = [
        'nis' =>  'required|unique:siswa,nis',
        'nama_siswa' =>  'required'
    ];

    public function siswaKelas(){
    	return $this->hasMany('App\SiswaKelas', 'id_siswa', 'id_siswa');
    }
}
