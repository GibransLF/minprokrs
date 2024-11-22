<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\RiwayatPembayaran;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loggedInUser = Auth::user();
        $mahasiswaId = $loggedInUser->mahasiswa->id;
        $jurusanId = $loggedInUser->mahasiswa->jurusan_id;

        $dataDibuka = Semester::where('mulai_kontrak', '<=', now())
        ->where('tutup_kontrak', '>=', now())
        ->whereHas('krs', function ($query) use ($jurusanId) {
            $query->where('jurusan_id', $jurusanId);
        })
        ->whereDoesntHave('riwayatPembayaran', function ($query) use ($loggedInUser, $mahasiswaId) {
            $query->where('mahasiswa_id', $mahasiswaId);
        })
        ->get();

        $dataRiwayatPembayaran = RiwayatPembayaran::with('semester', 'admin')
        ->whereHas('semester', function($query) {
            $query->where('mulai_kontrak', '<=', now())
                ->where('tutup_kontrak', '>=', now());
        })
        ->where('mahasiswa_id', $mahasiswaId)
        ->get();

        return view('pengajuan.index', compact('dataDibuka', 'dataRiwayatPembayaran'));
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
    public function store(string $id, Request $request)
    {
        $loggedInUser = Auth::user();
        $mahasiswaId = $loggedInUser->mahasiswa->id;
        $jurusanId = $loggedInUser->mahasiswa->jurusan_id;
        $semesterId = $id;

        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
    
        if ($request->hasFile('gambar')) {
            $kodePembayaran = 'SBC'. now()->format('dmY') . 'M' . $mahasiswaId; 
            $namaGambar = time() .'M'. $mahasiswaId . '.' . $request->gambar->extension();

            $path = $request->file('gambar')->storeAs('images', $namaGambar, 'public');
            
            $data = new RiwayatPembayaran();
            $data->mahasiswa_id = $mahasiswaId;
            $data->jurusan_id = $jurusanId;
            $data->semester_id = $semesterId;
            $data->kode_pembayaran = $kodePembayaran;
            $data->gambar = $path;
            $data->save();
    
            return redirect()->route('pengajuan')->with('success', 'Gambar bukti pembayaran berhasil diupload');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $loggedInUser = Auth::user();
        $jurusanId = $loggedInUser->mahasiswa->jurusan_id;
        $semester = Semester::findOrFail($id);
        
        $data = Krs::where('semester_id', $id)->where('jurusan_id', $jurusanId)->get();
        
        return view('pengajuan.show', compact('semester','data'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
