<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Request;
use Validator;
use App\Kelas;
use App\Mapel;
use App\MapelKelas;

class MapelKelasController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('walikelas');
    }

    public function index() {
        return $this->getMapelKelas(0);
    }

    public function indexMenu($menu) {
        if($menu == 'pengetahuan')
            return $this->getMapelKelas(0);
        else
            return $this->getMapelKelas(1);
    }

    private function getMapelKelas($index){
        $user = Auth::user();

        $request = Request::all();
        $data['tabContent'] = 'admin.mapelkelas.list';
        $data['tabs'][$index] = 'active';
        $searchtext = isset($request['searchtext']) ? $request['searchtext'] : null;
        if($searchtext != null){
            $data['datas'] = MapelKelas::join('mapel as m','mapel_kelas.id_mapel', '=', 'm.id_mapel')
            ->join('kelas as k','mapel_kelas.id_kelas', '=','k.id_kelas')
            ->where('mapel_kelas.id_kelas', '=', $user->id_kelas)
            ->where('m.jenis_mapel', '=', $index)
            ->where(function($query)  use ($searchtext){
                $query
                    ->where('m.nama_mapel',"LIKE",'%'.$searchtext.'%')
                    ->orWhere('m.kode_mapel',"LIKE",'%'.$searchtext.'%');
            })->paginate(30);
        } else {
            $data['datas'] = MapelKelas::join('mapel as m','mapel_kelas.id_mapel', '=', 'm.id_mapel')
            ->join('kelas as k','mapel_kelas.id_kelas', '=','k.id_kelas')
            ->where('mapel_kelas.id_kelas', '=', $user->id_kelas)
            ->where('m.jenis_mapel', '=', $index)
            ->paginate(30);
        }
        $data['kelas'] = Kelas::where('kelas.id_kelas', $user->id_kelas)->first();
        $data['menumapelkelas'] = 'active';
        return view('admin.mapelkelas.index')->with($data);
    }

    public function getCreate($menu=null) {
        if($menu == null || $menu == 'pengetahuan')
            return $this->getMapel(0);
        else
            return $this->getMapel(1);
    }

    private function getMapel($index){
        $data['tabContent'] = 'admin.mapelkelas.listcreate';
        $request = Request::all();
        $data['tabs'][$index] = 'active';

        $data['datas'] = Mapel::where('jenis_mapel', $index)
        ->whereNotIn('id_mapel', function($query){
            $query->select('id_mapel')
            ->from('mapel_kelas');
        })
        ->orderBy('kode_mapel','asc')->paginate(30);

        $data['menumapel'] = 'active';
        return view('admin.mapelkelas.create')->with($data);
    }

    public function postStore() {
        $request = Request::all();
        $id_kelas = Auth::user()->id_kelas;
        $mapels = $request['mapel'];
        foreach($mapels as $mapel){
            $add = new MapelKelas();
            $add->id_mapel = $mapel;
            $add->id_kelas = $id_kelas;
            $add->save();
        }
        return redirect()->to('/mapelkelas');
    }

    public function getDelete($id) {
        MapelKelas::where('id_mk', $id)->delete();
        return redirect()->to('/mapelkelas');
    }
}
