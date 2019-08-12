<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model {
    protected $table = 'semester';
    protected $fillable = ['id_semester', 'nama_semester'];
    public $timestamps = false;

    public static $rules = [
        'nama_semester' =>  'required'
    ];

    public function kelas(){
    	return $this->hasMany('App\Kelas', 'id_semester', 'id_semester');
    }
}
