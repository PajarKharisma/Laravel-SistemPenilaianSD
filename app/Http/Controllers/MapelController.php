<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use App\Mapel;

class MapelController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('superadmin');
    }

    public function index() {
        return $this->getPengetahuan();
    }

    public function indexMenu($menu){
        if($menu == 'pengetahuan')
            return $this->getPengetahuan();
        else
            return $this->getKeterampilan();
    }

    public function getPengetahuan() {
        $data['tabContent'] = 'superadmin.mapel.list';
        $request = Request::all();
        $data['tabs'][0] = 'active';
        $data['tabs'][1] = null;
        $searchtext = isset($request['searchtext']) ? $request['searchtext'] : null;
        if($searchtext != null){
            $data['datas'] = Mapel::where('jenis_mapel', '0')
            ->where(function($query)  use ($searchtext){
                $query
                    ->where('kode_kelas',"LIKE",'%'.$searchtext.'%')
                    ->orWhere('nama_mapel',"LIKE",'%'.$searchtext.'%');
            })->paginate(7);
        } else {
            $data['datas'] = Mapel::where('jenis_mapel', '0')
            ->orderBy('id_mapel','asc')->paginate(7);
        }
        return view('superadmin.mapel.index')->with($data);
    }

    public function getKeterampilan() {
        $data['tabContent'] = 'superadmin.mapel.list';
        $request = Request::all();
        $data['tabs'][0] = null;
        $data['tabs'][1] = 'active';
        $searchtext = isset($request['searchtext']) ? $request['searchtext'] : null;
        if($searchtext != null){
            $data['datas'] = Mapel::where('jenis_mapel', '1')
            ->where(function($query)  use ($searchtext){
                $query
                    ->where('kode_kelas',"LIKE",'%'.$searchtext.'%')
                    ->orWhere('nama_mapel',"LIKE",'%'.$searchtext.'%');
            })->paginate(7);
        } else {
            $data['datas'] = Mapel::where('jenis_mapel', '1')
            ->orderBy('id_mapel','asc')->paginate(7);
        }
        return view('superadmin.mapel.index')->with($data);
    }

    public function getCreate() {
        return view('superadmin.mapel.create');
    }

    public function postStore() {
        $request = Request::all();
        $validator = Validator::make($request,Mapel::$rules);
        if($validator->passes()){
            $add = new Mapel();
            $add->kode_mapel = $request['kode_mapel'];
            $add->nama_mapel = $request['nama_mapel'];
            $add->jenis_mapel = $request['jenis_mapel'];
            $add->save();
            return redirect()->to('/mapel');
        } else {
            return redirect('/mapel/create')->withInput()->withErrors($validator);
        }
    }

    public function getEdit($id) {
        $edit = Mapel::where('id_mapel', '=', $id)->first();
        $data['edit'] = $edit;
        return view('superadmin.mapel.edit')->with($data);
    }

    public function postUpdate($id) {
        $request = Request::all();
        $validator = Validator::make($request,[
            'kode_mapel' => 'required',
            'nama_mapel' =>  'required',
            'jenis_mapel' =>  'required'
        ]);
        
        if($validator->passes()) {
            $kode_mapel = $request['kode_mapel'];
            $nama_mapel = $request['nama_mapel'];
            $jenis_mapel = $request['jenis_mapel'];
            Mapel::where('id_mapel', $id)
            ->update([
                'kode_mapel' => $kode_mapel,
                'nama_mapel' => $nama_mapel,
                'jenis_mapel' => $jenis_mapel
            ]);
            return redirect()->to('/mapel');
        } else {
            $edit = Mapel::where('id_mapel', '=', $id)->first();
            $data['edit'] = $edit;
            return redirect()->to('/mapel/edit/'. $edit->id_mapel)->withInput()->withErrors($validator);
        }
    }

    public function getDelete($id) {
        Mapel::where('id_mapel', $id)->delete();
        return redirect()->to('/mapel');
    }
}
