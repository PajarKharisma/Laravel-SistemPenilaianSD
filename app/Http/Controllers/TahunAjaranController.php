<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use App\TahunAjaran;

class TahunAjaranController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('superadmin');
    }
    
    public function index() {
        $request = Request::all();
        $searchtext = isset($request['searchtext']) ? $request['searchtext'] : null;
        if($searchtext != null){
            $data['datas'] = TahunAjaran::where(function($query)  use ($searchtext){
                $query
                    ->where('nama_ta',"LIKE",'%'.$searchtext.'%');
            })->paginate(10);
        } else {
            $data['datas'] = TahunAjaran::orderBy('id_ta','asc')->paginate(10);
        }
        $data['menuta'] = 'active';
        return view('superadmin.tahunajaran.index')->with($data);
    }

    public function getCreate() {
        $data['menuta'] = 'active';
        return view('superadmin.tahunajaran.create')->with($data);
    }

    public function postStore() {
        $request = Request::all();
        $validator = Validator::make($request,TahunAjaran::$rules);
        if($validator->passes()){
            $add = new TahunAjaran();
            $add->nama_ta = $request['nama_ta'];
            $add->save();
            return redirect()->to('/tahunajaran');
        } else {
            return redirect('/tahunajaran/create')->withInput()->withErrors($validator);
        }
    }

    public function getEdit($id) {
        $edit = TahunAjaran::where('id_ta', '=', $id)->first();
        $data['edit'] = $edit;
        $data['menuta'] = 'active';
        return view('superadmin.tahunajaran.edit')->with($data);
    }

    public function postUpdate($id) {
        $request = Request::all();
        $nama_ta = $request['nama_ta'];
        $update = TahunAjaran::where('id_ta', $id);
        $update->update(['nama_ta'=> $nama_ta]);

        return redirect()->to('/tahunajaran');
    }

    public function getDelete($id) {
        TahunAjaran::where('id_ta', $id)->delete();
        return redirect('/tahunajaran');
    }
}
