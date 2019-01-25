<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gejala;
use App\daerahGejala;
use App\Tanaman;
use Response;
use DataTables;

class gejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$tanaman = Tanaman::get()->pluck('nama','id');
    	$daerahGejala = daerahGejala::get()->pluck('daerah_gejala','id');
        return view('gejala.index', compact('tanaman','daerahGejala'));
    }

    public function listGejala(){
    	$item = Gejala::with(['daerahGejala','tanaman'])->latest()->get();
    	return DataTables::of($item)
    			->addColumn('action', function($data){
    				return view('gejala.ajax.action', compact('data'));
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
        $item = Gejala::create($request->all());
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
        $item = Gejala::with(['tanaman','daerahGejala'])->find($id);
        if ($item) {
            return Response::json($item, 200);
        } else {
            return Response::json('error', 400);
        }
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
        $item = Gejala::find($id);
        $item->update($request->all());
        if ($item) {
            return Response::json('success', 200);
        } else {
            return Response::json('fail', 400);
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
        $item = Gejala::find($id);
        if ($item->delete()){
            return Response::json('success', 200);
        } else {
            return Response::json('fail', 400);
        }
    }
}
