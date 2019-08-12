<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'jabatan', 'id_kelas', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $rules = [
        'username' =>   'required|unique:users,username',
        'id_kelas' =>  'required|numeric',
        'jabatan' => 'required',
        'password' => 'required|min:6'
    ];

    public function kelas(){
    	return $this->belongsTo('App\Kelas', 'id_kelas', 'id_kelas');
    }
}
