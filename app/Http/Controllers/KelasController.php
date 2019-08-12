<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use App\Kelas;
use App\Guru;
use App\TahunAjaran;
use App\Semester;

class KelasController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('superadmin');
    }
    
    public function index() {
        $request = Request::all();
        $searchtext = isset($request['searchtext']) ? $request['searchtext'] : null;
        if($searchtext != null){
            $data['datas'] = Kelas::join('tahun_ajaran as ta','kelas.id_ta', '=', 'ta.id_ta')
            ->join('semester as s','kelas.id_semester','s.id_semester')
            ->join('guru as g','kelas.id_guru','g.id_guru')
            ->where(function($query)  use ($searchtext){
                $query
                    ->where('kode_kelas',"LIKE",'%'.$searchtext.'%')
                    ->orWhere('nama_kelas',"LIKE",'%'.$searchtext.'%');
            })->paginate(7);
        } else {
            $data['datas'] = Kelas::join('tahun_ajaran as ta','kelas.id_ta', '=', 'ta.id_ta')
            ->join('semester as s','kelas.id_semester','s.id_semester')
            ->join('guru as g','kelas.id_guru','g.id_guru')
            ->paginate(7);
        }
        return view('superadmin.kelas.index')->with($data);
    }

    public function getCreate() {
        $data['datas_guru'] = Guru::orderBy('id_guru', 'asc')->get();
        $data['datas_ta'] = TahunAjaran::orderBy('id_ta', 'asc')->get();
        $data['datas_semester'] = Semester::orderBy('id_semester', 'asc')->get();
        //return response()->json($data);
        return view('superadmin.kelas.create')->with($data);
    }

    public function postStore() {
        $request = Request::all();
        $validator = Validator::make($request,Kelas::$rules);
        if($validator->passes()){
            $add = new Kelas();
            $add->kode_kelas = $request['kode_kelas'];
            $add->nama_kelas = $request['nama_kelas'];
            $add->id_guru = $request['id_guru'];
            $add->id_ta = $request['id_ta'];
            $add->id_semester = $request['id_semester'];
            $add->save();
            return redirect()->to('/kelas');
        } else {
            return redirect('/kelas/create')->withInput()->withErrors($validator);
        }
    }

    public function getEdit($id) {
        $data['datas_guru'] = Guru::orderBy('id_guru', 'asc')->get();
        $data['datas_ta'] = TahunAjaran::orderBy('id_ta', 'asc')->get();
        $data['datas_semester'] = Semester::orderBy('id_semester', 'asc')->get();
        $data['edit'] = Kelas::join('tahun_ajaran as ta','kelas.id_ta', '=', 'ta.id_ta')
            ->join('semester as s','kelas.id_semester','s.id_semester')
            ->join('guru as g','kelas.id_guru','g.id_guru')
            ->where('id_kelas', $id)
            ->first();
        return view('superadmin.kelas.edit')->with($data);
    }

    public function postUpdate($id) {
        $request = Request::all();
        $validator = Validator::make($request,[
            'kode_kelas' =>  'required',
            'nama_kelas' =>  'required',
            'id_guru' =>  'required',
            'id_ta' =>  'required',
            'id_semester' =>  'required',
        ]);
        
        if($validator->passes()) {
            $kode_kelas = $request['kode_kelas'];
            $nama_kelas = $request['nama_kelas'];
            $id_guru = $request['id_guru'];
            $id_ta = $request['id_ta'];
            $id_semester = $request['id_semester'];
            Kelas::where('id_kelas', $id)
            ->update([
                'kode_kelas' => $kode_kelas,
                'nama_kelas' => $nama_kelas,
                'id_guru' => $id_guru,
                'id_ta' => $id_ta,
                'id_semester' => $id_semester,
            ]);
            return redirect()->to('/kelas');
        } else {
            $edit = Kelas::where('id_kelas', $id)->first();
            $data['edit'] = $edit;
            return redirect()->to('/kelas/edit/'. $edit->id_kelas)->withInput()->withErrors($validator);
        }
    }

    public function getDelete($id) {
        Kelas::where('id_kelas', $id)->delete();
        return redirect()->to('/kelas');
    }
}
