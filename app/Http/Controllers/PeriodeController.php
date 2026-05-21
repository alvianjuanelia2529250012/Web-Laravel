<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $result1 = Periode::all();
        // dd($result);
        return view('periode.index',compact('result1'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('periode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $input=$request->validate([
            'Tahun_Akademik'=>'required',
            'Semester'=>'required'
        ]);
        Periode::create($input);
        return redirect()->route('periodes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($periode)
    {
         $periode=Periode::find($periode);
        return view('periode.edit',compact('periode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $periode)
    {
         $input=$request->validate([
            'Tahun_Akademik'=>'required|unique:periodes,Tahun_Akademik,'.$periode,
            'Semester'=>'required'
        ]);
        Periode::Where('id',$periode->id)->update($input);
        return redirect()->route('periodes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periode $periode)
    {
        //
    }
}
