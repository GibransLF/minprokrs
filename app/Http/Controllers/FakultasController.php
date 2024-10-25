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
        $data = Fakultas::all();
        return view('fakultas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_fakultas' => 'required',
            'nama_fakultas' => 'required',
        ]);

        $fakultas = new Fakultas;
        $fakultas->kode_fakultas = $request->kode_fakultas;
        $fakultas->nama_fakultas = $request->nama_fakultas;
        $fakultas->save();

        return redirect()->back()->with('success', 'Fakultas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_fakultas' => 'required',
            'nama_fakultas' => 'required',
        ]);

        $fakultas = Fakultas::findOrFail($id);
        $fakultas->kode_fakultas = $request->kode_fakultas;
        $fakultas->nama_fakultas = $request->nama_fakultas;
        
        $fakultas->save();

        return redirect()->back()->with('success', 'Fakultas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Fakultas::destroy($id);
            return redirect()->back()->with('success', 'Fakultas berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Fakultas gagal dihapus');
        }
    }
}
