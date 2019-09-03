<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use App\Siswa;

class SiswaController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('superadmin');
    }
    
    public function index() {
        $request = Request::all();
        $searchtext = isset($request['searchtext']) ? $request['searchtext'] : null;
        if($searchtext != null){
            $data['datas'] = Siswa::where(function($query)  use ($searchtext){
                $query
                    ->where('nama_siswa',"LIKE",'%'.$searchtext.'%')
                    ->orWhere('nis',"LIKE",$searchtext.'%');
            })->paginate(10);
        } else {
            $data['datas'] = Siswa::orderBy('id_siswa','asc')->paginate(10);
        }
        $data['menusiswa'] = 'active';
        return view('superadmin.siswa.index')->with($data);
    }

    public function getCreate() {
        $data['menusiswa'] = 'active';
        return view('superadmin.siswa.create')->with($data);
    }

    public function postStore() {
        $request = Request::all();
        $validator = Validator::make($request,Siswa::$rules);
        if($validator->passes()){
            $add = new Siswa();
            $add->nis = $request['nis'];
            $add->nama_siswa = $request['nama_siswa'];
            $add->save();
            return redirect()->to('/siswa');
        } else {
            return redirect('/siswa/create')->withInput()->withErrors($validator);
        }
    }

    public function getEdit($id) {
        $edit = Siswa::where('id_siswa', '=', $id)->first();
        $data['edit'] = $edit;
        $data['menusiswa'] = 'active';
        return view('superadmin.siswa.edit')->with($data);
    }

    public function postUpdate($id) {
        $request = Request::all();
        $validator = Validator::make($request,[
            'nis' =>  'required',
            'nama_siswa' =>  'required'
        ]);
        
        if($validator->passes()) {
            $nis = $request['nis'];
            $nama_siswa = $request['nama_siswa'];
            Siswa::where('id_siswa', $id)
            ->update([
                'nis' => $nis,
                'nama_siswa' => $nama_siswa
            ]);
            return redirect()->to('/siswa');
        } else {
            $edit = Siswa::where('id_siswa', '=', $id)->first();
            $data['edit'] = $edit;
            return redirect()->to('/siswa/edit/'. $edit->id_siswa)->withInput()->withErrors($validator);
        }
    }

    public function getDelete($id) {
        Siswa::where('id_siswa', $id)->delete();
        return redirect()->to('/siswa');
    }
}
