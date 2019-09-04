<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Request;
use Validator;
use App\SiswaKelas;
use App\Siswa;
use App\Kelas;

class SiswaKelasController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('walikelas');
    }

    public function index() {
        $user = Auth::user();

        $request = Request::all();
        $searchtext = isset($request['searchtext']) ? $request['searchtext'] : null;
        if($searchtext != null){
            $data['datas'] = SiswaKelas::join('siswa as s','siswa_kelas.id_siswa', '=', 's.id_siswa')
            ->join('kelas as k','siswa_kelas.id_kelas', '=','k.id_kelas')
            ->where('siswa_kelas.id_kelas', '=', $user->id_kelas)
            ->where(function($query)  use ($searchtext){
                $query
                    ->where('s.nama_siswa',"LIKE",'%'.$searchtext.'%')
                    ->orWhere('s.jenis_kelamin',"LIKE",'%'.$searchtext.'%');
            })->paginate(10);
        } else {
            $data['datas'] = SiswaKelas::join('siswa as s','siswa_kelas.id_siswa', '=', 's.id_siswa')
            ->join('kelas as k','siswa_kelas.id_kelas', '=','k.id_kelas')
            ->where('siswa_kelas.id_kelas', '=', $user->id_kelas)
            ->paginate(10);
        }
        $data['kelas'] = Kelas::where('kelas.id_kelas', $user->id_kelas)->first();
        $data['menusiswakelas'] = 'active';
        return view('admin.siswakelas.index')->with($data);
        //return response()->json($data);
    }

    public function getCreate($tahun=null) {
        if($tahun == null || $tahun == 0){
            $data['datas'] = Siswa::orderBy('id_siswa','asc')->paginate(30);
        }else{
            $data['datas'] = Siswa::orderBy('id_siswa','asc')
            ->where('tahun_mulai', $tahun)
            ->paginate(30);
        }
        $data['tahun'] = ($tahun==null) ? 0 : $tahun;
        $data['menusiswakelas'] = 'active';
        return view('admin.siswakelas.create')->with($data);
    }
}
