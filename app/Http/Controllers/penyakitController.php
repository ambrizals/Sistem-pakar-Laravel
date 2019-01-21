<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyakit;
use App\Tanaman;
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
        $item = Penyakit::with('gejala')->find($id);
        return view('penyakit.show', compact('item'));
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
        $item = Penyakit::find($id);
        if ($item->delete()){
            return Response::json('success', 200);
        } else {
            return Response::json('fail', 400);
        }
    }
}
