<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $prodis = Prodi::with('fakultas')->get();
        // dd($result);
        return view('prodis.index',compact('prodis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $fakultas = Fakultas::all();
        return view('prodis.create',compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $input=$request->validate([
            'nama_prodi'=>'required',
            'Singkatan'=>'required',
            'Kaprodi'=>'required',
            'fakultas_id'=>'required'
        ]);
        Prodi::create($input);
        return redirect()->route('prodis.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($prodi)
    {
        $prodi=Prodi::find($prodi);
        $fakultas = Fakultas::all();
        return view('prodis.edit',compact('prodi', 'fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
            $input=$request->validate([
                'nama_prodi'=>'required',
                'Singkatan'=>'required',
                'Kaprodi'=>'required',
                'fakultas_id'=>'required'
            ]);
            Prodi::Where('id',$prodi->id)->update($input);
            return redirect()->route('prodis.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        //
    }
}
