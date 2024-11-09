<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MataKuiiahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addJurusan = Jurusan::all();
        $addDosen = Dosen::all();
        $data = MataKuliah::with('jurusan', 'dosen')->get();
        return view('matkul.index', compact('data', 'addJurusan', 'addDosen'));
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
            'jurusan_id' => 'required',
            'dosen_id' => 'required',
            'kode_mk' => ['required', Rule::unique('mata_kuliah')],
            'nama_mk' => 'required',
            'sks' => 'required',
        ]);

        $matkul = new MataKuliah;
        $matkul->jurusan_id = $request->jurusan_id;
        $matkul->dosen_id = $request->dosen_id;
        $matkul->kode_mk = $request->kode_mk;
        $matkul->nama_mk = $request->nama_mk;
        $matkul->sks = $request->sks;
        $matkul->save();

        return redirect()->route('matkul')->with('success', 'Data mata kuliah ditambahkan');
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
            'jurusan_id' => 'required',
            'dosen_id' => 'required',
            'kode_mk' => ['required', Rule::unique('mata_kuliah')->ignore($id)],
            'nama_mk' => 'required',
            'sks' => 'required',
        ]);

        $matkul = MataKuliah::findOrFail($id);
        $matkul->jurusan_id = $request->jurusan_id;
        $matkul->dosen_id = $request->dosen_id;
        $matkul->kode_mk = $request->kode_mk;
        $matkul->nama_mk = $request->nama_mk;
        $matkul->sks = $request->sks;
        $matkul->save();

        return redirect()->route('matkul')->with('success', 'Data mata kuliah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            MataKuliah::destroy($id);
            return redirect()->back()->with('success', 'Mata Kuliah berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Mata Kuliah gagal dihapus');
        }
    }
}
