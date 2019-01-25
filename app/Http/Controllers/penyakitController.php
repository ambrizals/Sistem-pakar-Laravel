<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyakit;
use App\gejalaPenyakit; 
use App\daerahGejala;
use App\Tanaman;
use App\Gejala;
use Response;
use DataTables;
class penyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanaman = Tanaman::get()->pluck('nama','id');
        return view('penyakit.index', compact('tanaman'));
    }

    public function list(){
        $item = Penyakit::with('tanaman')->latest()->get();
        return DataTables::of($item)
                ->addColumn('action', function($data){
                    return view('penyakit.ajax.action_index', compact('data'));
                })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Penyakit::create($request->all());
        if ($item) {
            return Response::json('success', 200);
        } else {
            return Response::json('fail', 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $daerahGejala = daerahGejala::get();
        $item = Penyakit::find($id);
        return view('penyakit.show', compact('item', 'daerahGejala'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Penyakit::find($id);
        $item->update($request->all());
        if ($item) {
            return redirect()->route('penyakit.show', $id);
        } else {
            return redirect()->route('penyakit.show', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Penyakit::find($id);
        if ($item->delete()){
            return Response::json('success', 200);
        } else {
            return Response::json('fail', 400);
        }
    }

    public function setGejala(Request $request, $id){
        $gejala = Gejala::where('nama_gejala', $request->gejala)->where('tanaman',$request->tanaman)->first();
        if(!$gejala) {
            $newGejala = new Gejala();
            $newGejala->tanaman = $request->tanaman;
            $newGejala->daerah_gejala = $request->daerah_gejala;
            $newGejala->nama_gejala = $request->gejala;
            if ($newGejala->save()) {
                $ngFlag = Gejala::where('nama_gejala', $request->gejala)->first();
                if ($ngFlag) {
                    $ngSet = new gejalaPenyakit();
                    $ngSet->gejala = $ngFlag->id;
                    $ngSet->penyakit = $id;
                    if ($ngSet->save()){
                        return Response::json('success', 200);
                    }
                } else {
                    return Response::json('Something Wrong!', 500);
                }
            }
        } else {
            $prepFlag = gejalaPenyakit::where('gejala',$gejala->id)->where('penyakit',$id)->first();
            if ($prepFlag){
                return Response::json('Data has exists', 500);
            } else {
                $setGejala = new gejalaPenyakit();
                $setGejala->gejala = $gejala->id;
                $setGejala->penyakit = $id;
                if ($setGejala->save()){
                    return Response::json('success', 200);
                } else {
                    return Response::json('Something Wrong!', 500);
                }
            }
        }

    }

    public function gejalaSuggest(Request $request, $id){
        if ($request->has('term')){
            $term = $request->get('term');
            $data = Gejala::select('nama_gejala')->where('tanaman',$id)->where('nama_gejala','like','%'.$term.'%')->where('daerah_gejala',$request->daerah)->get();
            if ($data->count() > 0) {
                foreach ($data as $item) {
                    $dat[] = $item->nama_gejala;
                }
                return Response::json($dat, 200);                
            } else {
                return Response::json('Data tidak tersedia', 500);
            }
        } else {
            return Response::json('Something wrong in here!', 500);
        }        
    }

    public function gejalaList($id){
        $gejala = gejalaPenyakit::with(['gejala' => function($query){
            $query->with('daerahGejala');
        }])->where('penyakit',$id)->latest()->get();
        return DataTables::of($gejala)
                ->addColumn('action', function($data){
                    return view('penyakit.ajax.action_gejala', compact('data'));
                })->make(true);
    }

    public function destroyGejala($id){
        $gejala = gejalaPenyakit::find($id);
        if ($gejala->delete()){
            return Response::json('success', 200);
        } else {
            return Response::json('fail', 500);
        }
    }
}
