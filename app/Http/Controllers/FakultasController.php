<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $result = Fakultas::all();
        // dd($result);
        return view('fakultas.indeks',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $input=$request->validate([
            'nama_fakultas'=>'required|unique:fakultas',
            'singkatan'=>'required'
        ]);
        Fakultas::create($input);
        return redirect()->route('Fakultas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($fakultas)
    {
        $fakultas=Fakultas::find($fakultas);
        return view('Fakultas.edit',compact('fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$fakultas)
    {
        $input=$request->validate([
            'nama_fakultas'=>'required|unique:fakultas,nama_fakultas,'.$fakultas,
            'singkatan'=>'required'
        ]);
        Fakultas::Where('id',$fakultas)->update($input);
        return redirect()->route('Fakultas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $fakultas)
    {
        $fakultas=Fakultas::find($fakultas,'id');
        $fakultas->delete();
        return redirect()->route('Fakultas.index');
    }
}
