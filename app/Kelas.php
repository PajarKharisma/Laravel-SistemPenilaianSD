<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model {

    protected $table = 'kelas';
    protected $fillable = ['id_kelas', 'kode_kelas', 'nama_kelas', 'id_guru', 'id_ta', 'id_semester'];
    public $timestamps = false;

    public static $rules = [
        'kode_kelas' =>   'required|unique:kelas,kode_kelas',
        'nama_kelas' =>  'required',
        'id_guru' =>  'required|exists:guru,id_guru',
        'id_ta' =>  'required|exists:tahun_ajaran,id_ta',
        'id_semester' =>  'required|exists:semester,id_semester'
    ];

    public function tahunAjaran(){
    	return $this->belongsTo('App\TahunAjaran', 'id_ta', 'id_ta');
    }

    public function semester(){
    	return $this->belongsTo('App\Semester', 'id_semester', 'id_semester');
    }

    public function guru(){
    	return $this->belongsTo('App\Guru', 'id_guru', 'id_guru');
    }

    public function mapelKelas(){
    	return $this->hasMany('App\MapelKelas', 'id_kelas', 'id_kelas');
    }

    public function user(){
    	return $this->hasMany('App\User', 'id_kelas', 'id_kelas');
    }

    public function siswaKelas(){
    	return $this->hasMany('App\SiswaKelas', 'id_kelas', 'id_kelas');
    }
}
