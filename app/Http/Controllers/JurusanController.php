<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Jurusan::with('fakultas')->get();
        $addFakultas = Fakultas::all();
        return view('jurusan.index', compact('data', 'addFakultas'));
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
            'kode_jurusan' => 'required',
            'nama_jurusan' => 'required',
            'fakultas_id' => 'required',
        ]);

        $jurusan = new Jurusan;
        $jurusan->fakultas_id = $request->fakultas_id;
        $jurusan->kode_jurusan = $request->kode_jurusan;
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();

        return redirect()->route('jurusan')->with('success', 'Data jurusan ditambahkan');
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
            'fakultas_id' => 'required',
            'kode_jurusan' => 'required',
            'nama_jurusan' => 'required',
        ]);

        $jurusan = Jurusan::findOrFail($id);
        $jurusan->fakultas_id = $request->fakultas_id;
        $jurusan->kode_jurusan = $request->kode_jurusan;
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();

        return redirect()->route('jurusan')->with('success', 'Data jurusan diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Jurusan::destroy($id);
            return redirect()->back()->with('success', 'Jurusan berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Jurusan gagal dihapus');
        }
    }
}
