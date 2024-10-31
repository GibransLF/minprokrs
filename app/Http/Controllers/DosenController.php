<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Dosen::all();
        return view('dosen.index', compact('data'));
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
            'nidn' => ['required', 'numeric', 'digits_between:0,10', 'unique:'.Dosen::class],
            'nama_dosen' => 'required',
        ]);

        $dosen = new Dosen;
        $dosen->nidn = $request->nidn;
        $dosen->nama_dosen = $request->nama_dosen;
        $dosen->save();

        return redirect()->route('dosen')->with('success', 'Data Dosen berhasil ditambahkan');
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
            'nidn' => ['required', 'numeric', 'digits_between:0,10', Rule::unique('dosen')->ignore($id),],
            'nama_dosen' => 'required',
        ]);

        $dosen = Dosen::findOrFail($id);
        $dosen->nidn = $request->nidn;
        $dosen->nama_dosen = $request->nama_dosen;
        $dosen->save();

        return redirect()->route('dosen')->with('success', 'Data Dosen berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Dosen::destroy($id);
            return redirect()->back()->with('success', 'Dosen berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Dosen gagal dihapus '. $e->getMessage());
        }
    }
}
