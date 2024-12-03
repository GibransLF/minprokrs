<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Dosen;
use App\Models\KrsKontrak;
use App\Models\Mahasiswa;
use App\Models\RiwayatPembayaran;
use App\Models\Semester;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $userRoles = $user->roles->first()->name;

        if($userRoles == 'admin'){
            $akunMhs = Mahasiswa::count();
            $dosenT = Dosen::count();
            $rpPending = RiwayatPembayaran::where('status', 'pending')->count();

            $semesters = Semester::where('mulai_kontrak', '<=', now())
            ->where('tutup_kontrak', '>=', now())->get();
            $rp = RiwayatPembayaran::with('mahasiswa')->where('status', 'pending')->get();

            return view('dashboard', compact('dosenT', 'akunMhs', 'rpPending',  'semesters', 'rp'));
        }
        else
        {
            $mahasiswaId = $user->mahasiswa->id;

            $sumSks =KrsKontrak::with('krs.mataKuliah')
            ->where('mahasiswa_id', $mahasiswaId)
            ->get()
            ->sum(function ($kontrak) {
                return $kontrak->krs->mataKuliah->sks ?? 0;
            });

            $sumKontrak = RiwayatPembayaran::where('mahasiswa_id', $mahasiswaId)->where('status', 'completed')->count();

            $semesters = Semester::where('mulai_kontrak', '<=', now())
            ->where('tutup_kontrak', '>=', now())->get();

            $info = RiwayatPembayaran::with('semester')
            ->whereHas('semester', function($query) {
                $query->where('mulai_kontrak', '<=', now())
                    ->where('tutup_kontrak', '>=', now());
            })
            ->where('mahasiswa_id', $mahasiswaId)
            ->get()->first();

            $info = $info ?? (object)['status' => 'null'];

            return view('dashboard', compact('semesters', 'info', 'sumSks', 'sumKontrak'));
        }
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
}
