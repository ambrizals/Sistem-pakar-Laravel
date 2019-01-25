<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyakit;
use App\Gejala;
use App\daerahGejala;
use App\gejalaPenyakit;
use App\Tanaman;
use DataTables;

class diagnosaController extends Controller
{
    public function index(){
    	$tanaman = Tanaman::get();
    	return view('home', compact('tanaman'));
    }

    public function preDiagnostic($id){
    	$daerahGejala = daerahGejala::with(['gejala' => function($query) use ($id){
    		$query->where('tanaman',$id);
    	}])->get();
    	$tanaman = Tanaman::find($id);
    	return view('prediagnostic', compact('daerahGejala','tanaman'));
    }

    public function postDiagnostic(Request $request, $id){
    	$diagnosa = [];
    	$data = Penyakit::with('gejalaPenyakit')->where('tanaman',$id)->get();
    	foreach($data as $key => $data) {
    		$jumlah_gejala = $data->gejalaPenyakit->count();
    		$gejala = 0;
    		foreach($request->gejala as $inputGejala) {
    			$flagGejala = gejalaPenyakit::where('penyakit',$data->id)->where('gejala',$inputGejala)->first();
    			if($flagGejala){
    				$gejala = $gejala + 1;
    			}
    		}
    		$skor = ($gejala / $jumlah_gejala) * 100;
    		if(($skor < 100) and ($skor > 0)){
    			$diagnosa[$key] = [
    				'nama_penyakit' => $data->nama_penyakit,
    				'id_penyakit' => $data->id,
    				'skor' => $skor
    			];
    		}
    	}
    	return view('postdiagnostic', compact('diagnosa'));
    }
    public function gejalaList($id){
        $gejala = gejalaPenyakit::with(['gejala' => function($query){
            $query->with('daerahGejala');
        }])->where('penyakit',$id)->latest()->get();
        return DataTables::of($gejala)->make(true);
    }
    public function penyakit($id)
    {
        $daerahGejala = daerahGejala::get();
        $item = Penyakit::find($id);
        return view('penyakit', compact('item', 'daerahGejala'));
    }
    public function daftarPenyakit($id){
    	$tanaman = Tanaman::find($id);
    	$penyakit = Penyakit::where('tanaman',$id)->latest()->get();
    	return view('daftarPenyakit', compact('tanaman','penyakit'));
    }
}
