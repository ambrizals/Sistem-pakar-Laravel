<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tanaman;
use Response;

class tanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanaman = Tanaman::latest()->get();
        return view('tanaman.index', compact('tanaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tanaman = Tanaman::create($request->all());
        if ($tanaman) {
            return redirect()->route('tanaman.index');
        } else {
            echo 'error';
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
        $tanaman = Tanaman::find($id);
        return Response::json($tanaman, 200);
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
        $tanaman = Tanaman::find($id);
        $tanaman->update($request->all());
        if ($tanaman) {
            return redirect()->route('tanaman.index');
        } else {
            echo 'Error';
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
        $tanaman = Tanaman::find($id);
        if ($tanaman->delete()){
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }
    }
}
