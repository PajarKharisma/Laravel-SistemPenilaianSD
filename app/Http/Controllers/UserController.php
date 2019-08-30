<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use App\User;
use App\Kelas;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('superadmin');
    }
    
    public function index(){
        return $this->getWaliKelas();
    }

    public function indexMenu($menu){
        if($menu == 'pimpinan')
            return $this->getPimpinan();
        else
            return $this->getWaliKelas();
    }

    public function getWaliKelas(){
        $request = Request::all();
        $data['tabContent'] = 'superadmin.user.list';
        $data['tabs'][0] = 'active';
        $data['tabs'][1] = null;
        $searchtext= isset($request['searchtext']) ? $request['searchtext'] : null;
        if($searchtext!=null) {
            $data['datas'] = User::
                join('kelas as k','users.id_kelas','=','k.id_kelas')
                ->where('jabatan','998')
                ->where(function($query)  use ($searchtext){
                    $query
                        ->where('username',"LIKE",'%'.$searchtext.'%')
                        ->orWhere('k.kode_kelas',"LIKE",'%'.$searchtext.'%');
                })->paginate(7);
        } else {
            $data['datas'] = User::
            join('kelas as k','users.id_kelas','=','k.id_kelas')
            ->where('jabatan','998')
            ->paginate(7);
        }
        return view('superadmin.user.index')->with($data);
        //return response()->json($data);
    }

    public function getPimpinan(){
        $request = Request::all();
        $data['tabContent'] = 'superadmin.user.list';
        $data['tabs'][0] = null;
        $data['tabs'][1] = 'active';
        $searchtext= isset($request['searchtext']) ? $request['searchtext'] : null;
        if($searchtext!=null) {
            $data['datas'] = User::where('jabatan','0')
                ->where(function($query)  use ($searchtext){
                    $query
                        ->where('username',"LIKE",'%'.$searchtext.'%');
                })->paginate(7);
        } else {
            $data['datas'] = User::where('jabatan','0')
            ->paginate(7);
        }
        return view('superadmin.user.index')->with($data);
    }

    public function getCreate() {
        $data['datas_kelas'] = $data['datas'] = Kelas::join('tahun_ajaran as ta','kelas.id_ta', '=', 'ta.id_ta')
            ->join('semester as s','kelas.id_semester','s.id_semester')
            ->join('guru as g','kelas.id_guru','g.id_guru')
            ->get();
        return view('superadmin.user.create')->with($data);
    }

    public function postStore() {
        $request = Request::all();
        $validator = Validator::make($request,User::$rules);
        if($validator->passes()) {
            $request['password'] =  Hash::make($request['password']);
            User::create($request);
            return redirect()->to('/user');
        } else {
            return redirect('/user/create')->withInput()->withErrors($validator);
        }
    }

    public function getEdit($id) {
        $data['datas_kelas'] = Kelas::join('tahun_ajaran as ta','kelas.id_ta', '=', 'ta.id_ta')
            ->join('semester as s','kelas.id_semester','s.id_semester')
            ->join('guru as g','kelas.id_guru','g.id_guru')
            ->get();
        $user = User::where('id', $id)->first();
        $data['edit'] = ($user->id_kelas == -1) ? $user :
            User::join('kelas as k','users.id_kelas','k.id_kelas')
            ->where('id', $id)
            ->first();
        return view('superadmin.user.edit')->with($data);
    }

    public function postUpdate($id) {
        $request = Request::all();
        $validator = Validator::make($request,[
            'username' =>  'required',
            'password' =>  'required',
            'id_kelas' =>  'required',
            'jabatan' =>  'required',
        ]);
        
        if($validator->passes()) {
            User::where('id', $id)
            ->update([
                'username' => $request['username'],
                'password' => Hash::make($request['password']),
                'id_kelas' => $request['id_kelas'],
                'jabatan' => $request['jabatan'],
            ]);
            return redirect()->to('/user');
        } else {
            $data['datas_kelas'] = Kelas::join('tahun_ajaran as ta','kelas.id_ta', '=', 'ta.id_ta')
                ->join('semester as s','kelas.id_semester','s.id_semester')
                ->join('guru as g','kelas.id_guru','g.id_guru')
                ->get();
            $user = User::where('id', $id)->first();
            $edit = ($user->id_kelas == -1) ? $user :
            User::join('kelas as k','users.id_kelas','k.id_kelas')
                ->where('id', $id)
                ->first();
            $data['edit'] = $edit;
            return redirect()->to('/user/edit/'. $edit->id)->withInput()->withErrors($validator);
        }
    }

    public function getDelete($id) {
        User::where('id', $id)->delete();
        return redirect()->to('/user');
    }
}