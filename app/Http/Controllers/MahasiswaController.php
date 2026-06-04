<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $mahasiswa = Mahasiswa::with('prodi')->get();
       return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('mahasiswa.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi input 
        $input = $request->validate([
            'npm' => 'required|unique:mahasiswas,npm', // npm harus unik di tabel mahasiswas
            'nama' => 'required',
            'prodi_id' => 'required|exists:prodis,id', // prodi_id harus ada di tabel prodis
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        //upload foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto'); // ambil file foto
            $nama_foto = time() . '_' . $foto->getClientOriginalName(); // buat nama unik untuk foto
            $foto->storeAs('fotos', $nama_foto, 'public'); // simpan foto di folder storage/app/public/fotos
        } else {
            $nama_foto = null; // jika tidak ada foto, set nama_foto ke null
        }
        $input['foto'] = $nama_foto; // tambahkan nama_foto ke data input
        //simpan data ke database
        Mahasiswa::create($input);
        //redirect ke halaman index dengan pesan sukses
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $mahasiswa = Mahasiswa::find($mahasiswa->id);
        $prodi = Prodi::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $input = $request->validate([
            'npm' => 'required|unique:mahasiswas,npm,',
            'nama' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prodi_id' => 'required|exists:prodis,id'
        ]);
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAt('fotos', $nama_foto, 'public');
        }
        else {
            $nama_foto = null;
        }
        $input['foto'] = $nama_foto;
        $mahasiswa->update($input);
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {   
        $mahasiswa = Mahasiswa::find($mahasiswa->id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index');
    }
}
