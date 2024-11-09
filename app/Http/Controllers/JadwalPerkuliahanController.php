<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\MataKuliah;
use App\Models\Semester;
use Illuminate\Http\Request;

class JadwalPerkuliahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $semester = Semester::findOrFail($id);
        $data = Krs::with('matkul', 'dosen', 'semester' , 'jurusan')->where('semester_id', $id)->get();
        $mataKuliah = MataKuliah::with('dosen','jurusan')->get();

        return view('jadwalPerkuliahan.index', compact('semester','data', 'mataKuliah'));
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
    public function store(Request $request, string $id)
    {
        $semesterId = $id;

        $request->validate([
            'mk_id' => 'required',
            'mulai' => ['required' , 'date_format:H:i'],
            'selesai' => ['required' , 'date_format:H:i'],
        ]);


        $mk = MataKuliah::findOrFail($request->mk_id);
        $jurusanId = $mk->jurusan_id;
        $dosenId = $mk->dosen_id;
        
        $krs = new Krs;
        $krs->jurusan_id = $jurusanId;
        $krs->semester_id = $semesterId;
        $krs->dosen_id = $dosenId;
        $krs->mk_id = $request->mk_id;
        $krs->mulai = $request->mulai;
        $krs->selesai = $request->selesai;
        $krs->save();

        return redirect()->route('jadwalPerkuliahan', $id)->with('success', 'Data jadwal mata kuliah ditambahkan');
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
            'mk_id' => 'required',
            'mulai' => ['required' , 'date_format:H:i'],
            'selesai' => ['required' , 'date_format:H:i'],
        ]);

        $mk = MataKuliah::findOrFail($request->mk_id);
        $jurusanId = $mk->jurusan_id;
        $dosenId = $mk->dosen_id;

        $krs = Krs::findOrFail($id);
        $krs->jurusan_id = $jurusanId;
        $krs->dosen_id = $dosenId;
        $krs->mk_id = $request->mk_id;
        $krs->mulai = $request->mulai;
        $krs->selesai = $request->selesai;
        $krs->save();

        return redirect()->route('jadwalPerkuliahan', $krs->semester_id)->with('success', 'Data jadwal mata kuliah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Krs::destroy($id);
            return redirect()->back()->with('success', 'Jadwal berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Jadwal gagal dihapus');
        }
    }
}
