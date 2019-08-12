<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use App\Guru;

class GuruController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('superadmin');
    }
    
    public function index() {
        $request = Request::all();
        $searchtext = isset($request['searchtext']) ? $request['searchtext'] : null;
        if($searchtext != null){
            $data['datas'] = Guru::where(function($query)  use ($searchtext){
                $query
                    ->where('nip',"LIKE",'%'.$searchtext.'%')
                    ->orWhere('nama_guru',"LIKE",'%'.$searchtext.'%');
            })->paginate(7);
        } else {
            $data['datas'] = Guru::orderBy('id_guru','asc')->paginate(7);
        }
        return view('superadmin.guru.index')->with($data);
    }

    public function getCreate() {
        return view('superadmin.guru.create');
    }

    public function postStore() {
        $request = Request::all();
        $validator = Validator::make($request,Guru::$rules);
        if($validator->passes()){
            $add = new Guru();
            $add->nip = $request['nip'];
            $add->nama_guru = $request['nama_guru'];
            $add->save();
            return redirect()->to('/guru');
        } else {
            return redirect('/guru/create')->withInput()->withErrors($validator);
        }
    }

    public function getEdit($id) {
        $edit = Guru::where('id_guru', '=', $id)->first();
        $data['edit'] = $edit;
        return view('superadmin.guru.edit')->with($data);
    }

    public function postUpdate($id) {
        $request = Request::all();
        $validator = Validator::make($request,[
            'nip' =>  'required',
            'nama_guru' =>  'required'
        ]);
        
        if($validator->passes()) {
            $nip = $request['nip'];
            $nama_guru = $request['nama_guru'];
            Guru::where('id_guru', $id)
            ->update([
                'nip' => $nip,
                'nama_guru' => $nama_guru
            ]);
            return redirect()->to('/guru');
        } else {
            $edit = Guru::where('id_guru', '=', $id)->first();
            $data['edit'] = $edit;
            return redirect()->to('/guru/edit/'. $edit->id_guru)->withInput()->withErrors($validator);
        }
    }

    public function getDelete($id) {
        Guru::where('id_guru', $id)->delete();
        return redirect()->to('/guru');
    }
}
