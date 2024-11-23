<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\RiwayatPembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $user = Auth::user();
        $userRoles = $user->roles->first()->name;
        
        $perPage = 5;

        if ($userRoles == 'admin') {
            $nim = $request->input('nim','all');
            $nim == '' ? $nim = 'all' : $nim;

            $query = RiwayatPembayaran::with('mahasiswa')->orderByRaw("FIELD(status, 'pending', 'rejected', 'completed')");

            if ($nim !== 'all') {
                $query->whereHas('mahasiswa', function ($query) use ($nim) {
                    $query->where('nim', 'like', '%' . $nim . '%');
                });
            }
            
            $data = $query->paginate($perPage);
        }
        else{
            $query = RiwayatPembayaran::where('mahasiswa_id', $user->mahasiswa->id)->orderByRaw("FIELD(status, 'pending','verified', 'rejected', 'completed')");

            $data = $query->paginate($perPage);
        }

        return view('riwayatPembayaran.index',compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $riwayatPembayaran = RiwayatPembayaran::findOrFail($id);
        $jurusanId = $riwayatPembayaran->jurusan_id;
        $semesterId = $riwayatPembayaran->semester_id;
        $mahasiswaId = $riwayatPembayaran->mahasiswa_id;
        
        $data = Krs::where('semester_id', $semesterId)
        ->whereHas('semester', function ($query) use ($jurusanId) {
            $query->where('jurusan_id', $jurusanId);
        })
        ->orderBy('mulai')
        ->get();
        return view('riwayatPembayaran.show', compact('riwayatPembayaran',  'data'));
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
        $loggedInUser = Auth::user();
        $mahasiswaId = $loggedInUser->mahasiswa->id;

        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
    
        if ($request->hasFile('gambar')) {
            $namaGambar = time() .'M'. $mahasiswaId . '.' . $request->gambar->extension();

            $path = $request->file('gambar')->storeAs('images', $namaGambar, 'public');
            
            $data = RiwayatPembayaran::findOrFail($id);
            $data->gambar = $path;
            $data->status = 'pending';
            $data->save();
    
            return redirect()->route('pengajuan')->with('success', 'Gambar bukti pembayaran berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function rejected(Request $request, $id)
    {
        $request->validate([
            'keterangan' => 'max:255',
        ]);

        $riwayatPembayaran = RiwayatPembayaran::findOrFail($id);
        $riwayatPembayaran->admin_id = Auth::user()->admin->id;
        $riwayatPembayaran->keterangan = $request->keterangan;
        $riwayatPembayaran->status = 'rejected';
        $riwayatPembayaran->save();
        return redirect()->route('riwayatPembayaran')->with('success', 'Pembayaran ditolak');
    }

    public function verified(Request $request, $id)
    {
        $request->validate([
            'keterangan' => 'max:255',
        ]);

        $riwayatPembayaran = RiwayatPembayaran::findOrFail($id);
        $riwayatPembayaran->admin_id = Auth::user()->admin->id;
        $riwayatPembayaran->status = 'verified';
        $riwayatPembayaran->save();
        return redirect()->route('riwayatPembayaran')->with('success', 'Pembayaran dikonfirmasi');
    }
}
