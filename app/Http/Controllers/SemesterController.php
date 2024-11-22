<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Semester::all();
        return view('semester.index', compact('data'));
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
            'nama_semester' => 'required',
            'tahun_ajaran' => 'required',
            'mulai_kontrak'=> ['required','date'],
            'tutup_kontrak' => ['required','date'],
            'nominal_pembayaran' => ['required', 'numeric'],
        ]);

        $mulai_kontrak = date('Y-m-d', strtotime($request->mulai_kontrak));
        $tutup_kontrak = date('Y-m-d', strtotime($request->tutup_kontrak));

        $semester = new Semester;
        $semester->nama_semester = $request->nama_semester;
        $semester->tahun_ajaran = $request->tahun_ajaran;
        $semester->mulai_kontrak = $mulai_kontrak;
        $semester->tutup_kontrak = $tutup_kontrak;
        $semester->nominal_pembayaran = $request->nominal_pembayaran;
        $semester->save();

        return redirect()->back()->with('success', 'Semester berhasil ditambahkan');
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
            'nama_semester' => 'required',
            'tahun_ajaran' => 'required',
            'mulai_kontrak'=> ['required','date'],
            'tutup_kontrak' => ['required','date'],
            'nominal_pembayaran' => ['required', 'numeric'],
        ]);

        $mulai_kontrak = date('Y-m-d', strtotime($request->mulai_kontrak));
        $tutup_kontrak = date('Y-m-d', strtotime($request->tutup_kontrak));

        $semester = Semester::findorFail($id);
        $semester->nama_semester = $request->nama_semester;
        $semester->tahun_ajaran = $request->tahun_ajaran;
        $semester->mulai_kontrak = $mulai_kontrak;
        $semester->tutup_kontrak = $tutup_kontrak;
        $semester->nominal_pembayaran = $request->nominal_pembayaran;
        $semester->save();

        return redirect()->back()->with('success', 'Semester berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Semester::destroy($id);
            return redirect()->back()->with('success', 'Semester berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Semester gagal dihapus');
        }
    }
}
