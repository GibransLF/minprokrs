<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuktiPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        // $nama = $request->input('nama','all');
        // $nama == '' ? $nama = 'all' : $nama;
        // $status = $request->input('status','all');
        // $perPage = 5;

        // $query = Transaksi::with(['member', 'produk'])->withCount('detailTransaksis')->orderBy('created_at','desc');

        // if ($nama !== 'all') {
        //     $query->whereHas('member', function ($query) use ($nama) {
        //         $query->where('nama', 'like', '%' . $nama . '%');
        //     });
        // }
    
        // if ($status == 'late') {
        //     $query->where('tgl_pengembalian', '<', now()->toDateString())
        //             ->where('status_rental', 'progress');
        // } elseif ($status !== 'all') {
        //     $query->where('status_rental', $status);
        // }
    
        
        // $transaksis = $query->paginate($perPage);

        return view('bukti_pembayaran.index');
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
    public function show()
    {
        return view('bukti_pembayaran.detail');
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
