<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\daerahGejala;
use DataTables;
use Response;

class daerahGejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('daerahGejala.index', compact('item'));
    }

    public function list(){
        $item = daerahGejala::latest()->get();
        return DataTables::of($item)
                ->addColumn('action', function($data){
                    return view('daerahGejala.ajax.action', compact('data'));
                })->make('true');
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
        $item = daerahGejala::create($request->all());
        if ($item) {
            return Response::json('success',200);
        } else {
            return Response::json('error', 400);
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
        $item = daerahGejala::find($id);
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
        $item = daerahGejala::find($id);
        $item->update($request->all());
        if ($item) {
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
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
        $item = daerahGejala::find($id);
        if ($item->delete()){
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }
    }
}
