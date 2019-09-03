<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use App\Semester;

class SemesterController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('superadmin');
    }

    public function index() {
        $request = Request::all();
        $searchtext = isset($request['searchtext']) ? $request['searchtext'] : null;
        if($searchtext != null){
            $data['datas'] = Semester::where(function($query)  use ($searchtext){
                $query
                    ->where('id_semester',"LIKE",'%'.$searchtext.'%')
                    ->orWhere('nama_semester',"LIKE",$searchtext.'%');
            })->paginate(10);
        } else {
            $data['datas'] = Semester::orderBy('id_semester','asc')->paginate(10);
        }
        $data['menusemester'] = 'active';
        return view('superadmin.semester.index')->with($data);
    }

    public function getCreate() {
        $data['menusemester'] = 'active';
        return view('superadmin.semester.create')->with($data);
    }

    public function postStore() {
        $request = Request::all();
        $validator = Validator::make($request,Semester::$rules);
        if($validator->passes()){
            $add = new Semester();
            $add->nama_semester = $request['nama_semester'];
            $add->save();
            return redirect()->to('/semester');
        } else {
            return redirect('/semester/create')->withInput()->withErrors($validator);
        }
    }

    public function getEdit($id) {
        $edit = Semester::where('id_semester', '=', $id)->first();
        $data['edit'] = $edit;
        $data['menusemester'] = 'active';
        return view('superadmin.semester.edit')->with($data);
    }

    public function postUpdate($id) {
        $request = Request::all();
        $validator = Validator::make($request,Semester::$rules);
        if($validator->passes()) {
            $nama_semester = $request['nama_semester'];
            $update = Semester::where('id_semester', $id);
            $update->update(['nama_semester'=> $nama_semester]);
            return redirect()->to('/semester');
        } else {
            $edit = Semester::where('id_semester', '=', $id)->first();
            $data['edit'] = $edit;
            return redirect('/semester/edit')->with($data)->withInput()->withErrors($validator);
        }
    }

    public function getDelete($id) {
        Semester::where('id_semester', $id)->delete();
        return redirect('/semester');
    }
}
