<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Request;
use App\User;
use App\Kelas;
use App\Guru;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $user = Auth::user();
        $data['menuberanda'] = 'active';
        if($user->jabatan == 998){
            $data['walikelas'] = User::join('kelas as k','users.id_kelas', '=', 'k.id_kelas')
                ->join('guru as g','k.id_guru','g.id_guru')
                ->where('users.id_kelas',"=", $user->id_kelas)
                ->first();
        }
        return view('home')->with($data);
    }
}
