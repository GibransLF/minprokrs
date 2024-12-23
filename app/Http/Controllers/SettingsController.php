<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('setting.index');
    }

    public function updateLogo(Request $request)
    {
        // Validasi file
    $request->validate([
        'logo' => 'required|image|mimes:png|max:500',
    ]);

    // Tangkap file
    $file = $request->file('logo');

    // Tentukan nama file (sama setiap kali)
    $filename = 'logoSTMIK.png';

    // Pindahkan file ke folder 'public/assets', file lama akan tertimpa
    $file->move(public_path('img'), $filename);

    return redirect()->back()->with('success', 'Logo berhasil diubah');
    }

    public function updateSvg(Request $request)
    {
        // Validasi file
    $request->validate([
        'logoPrint' => 'required|image|mimes:svg|max:500',
    ]);

    // Tangkap file
    $file = $request->file('logoPrint');

    // Tentukan nama file (sama setiap kali)
    $filename = 'logoSTMIK.svg';

    // Pindahkan file ke folder 'public/assets', file lama akan tertimpa
    $file->move(public_path('img'), $filename);

    return redirect()->back()->with('success', 'Logo Print berhasil diubah');
    }
}
