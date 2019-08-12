<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model {
    
    protected $table = 'guru';
    protected $fillable = ['id_guru', 'nip', 'nama_guru'];
    public $timestamps = false;

    public static $rules = [
        'nip' =>  'required|unique:guru,nip',
        'nama_guru' =>  'required'
    ];

    public function kelas(){
    	return $this->hasMany('App\Kelas', 'id_guru', 'id_guru');
    }
}
