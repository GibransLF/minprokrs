<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\KrsKontrak;
use App\Models\RiwayatPembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KrsKontrakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $userRoles = $user->roles->first()->name;

        if ($userRoles == 'admin') {
            $data = RiwayatPembayaran::with(['semester', 'mahasiswa'])
            ->withCount('krsKontrak')
            ->where('status', 'verified')
            ->get();
        }
        else{
            $mahasiswaId = $user->mahasiswa->id;
            $data = RiwayatPembayaran::with(['semester'])
            ->withCount('krsKontrak')
            ->where('status', 'verified')
            ->where('mahasiswa_id', $mahasiswaId)
            ->get();
        }

        return view('kontrak.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $riwayatPembayaran = RiwayatPembayaran::findOrFail($id);
        
        if($riwayatPembayaran->status != 'verified'){
            abort(403, 'Unauthorized action.');
        }

        $semesterId = $riwayatPembayaran->semester_id;
        $jurusanId = $riwayatPembayaran->jurusan_id;
        $data = Krs::where('semester_id', $semesterId)
        ->whereHas('semester', function ($query) use ($jurusanId) {
            $query->where('jurusan_id', $jurusanId);
        })
        ->get();

        return view('kontrak.create', compact('riwayatPembayaran','data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $request->validate([
            'krs_ids' => 'required|array', // Pastikan ada checkbox yang dipilih
            'krs_ids.*' => 'exists:krs,id', // Pastikan ID yang dipilih valid di tabel KRS
        ]);
    
        // Tangkap semua ID dari checkbox yang dicentang
        $krsIds = $request->input('krs_ids');

        $riwayatPembayaran = RiwayatPembayaran::findOrFail($id);
        $jurusanId = $riwayatPembayaran->jurusan_id;
        $semesterId = $riwayatPembayaran->semester_id;
        $mahasiswaId = $riwayatPembayaran->mahasiswa_id;
        $riwayatPembayaranId = $riwayatPembayaran->id;

    
        foreach ($krsIds as $krsId) {
            DB::table('krs_kontrak')->insert([
                'mahasiswa_id' => $mahasiswaId,
                'semester_id' => $semesterId,
                'jurusan_id' => $jurusanId,
                'krs_id' => $krsId,
                'riwayat_pembayaran_id' => $riwayatPembayaranId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    
        return redirect()->route('kontrak')->with('success', 'Data berhasil diisi.');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function detail(string $id){
        $riwayatPembayaran = RiwayatPembayaran::findOrFail($id);
        $data = KrsKontrak::with(['krs','krs.matkul', 'riwayatPembayaran'])
        ->where('riwayat_pembayaran_id', $id)
        ->get();

        return view('kontrak.detail', compact('data', 'riwayatPembayaran'));
    }
}
