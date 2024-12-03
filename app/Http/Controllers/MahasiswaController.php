<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Mahasiswa::with('user','fakultas','jurusan')->get();
        $dataSelect = Fakultas::with('jurusan')->get();
        return view('mahasiswa.index', compact('data', 'dataSelect'));
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
            'name' => 'required',
            'nim' => ['required', 'numeric', 'digits_between:0,12', 'unique:'.Mahasiswa::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'fakultas' => 'required',
            'jurusan' => 'required',
            'password' => ['required', 'confirmed', password::defaults()],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->assignRole('mahasiswa');

        $mahasiswa = new Mahasiswa;
        $mahasiswa->user_id = $user->id;
        $mahasiswa->fakultas_id = $request->fakultas;
        $mahasiswa->jurusan_id = $request->jurusan;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->save();

        return redirect('/mahasiswa')->with('success', 'Data Mahasiswa berhasil ditambahkan');
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
        $mhs = Mahasiswa::with('user', 'fakultas', 'jurusan')->findOrFail($id);
        // dd($mahasiswa);
        $dataSelect = Fakultas::with('jurusan')->get();
        return view('mahasiswa.edit', compact('mhs', 'dataSelect'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_id = Mahasiswa::findOrFail($id)->user_id;

        $request->validate([
            'name' => 'required',
            'nim' => ['required', 'numeric', 'digits_between:0,12', Rule::unique('mahasiswa')->ignore($id),],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($user_id),],
            'fakultas' => 'required',
            'jurusan' => 'required',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->fakultas_id = $request->fakultas;
        $mahasiswa->jurusan_id = $request->jurusan;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->save();
        
        $user = User::findOrFail($mahasiswa->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('mahasiswa')->with('success', 'Data Mahasiswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user_id = Mahasiswa::with('user')->findOrFail($id)->user_id;
        $user = User::findOrFail($user_id); 
        try {
            Mahasiswa::destroy($id);
            $user->removeRole('mahasiswa');
            User::destroy($user_id);
            return redirect()->back()->with('success', 'Mahasiswa berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Mahasiswa gagal dihapus '. $e->getMessage());
        }
    }

    public function changePass(string $id){
        $mhs = Mahasiswa::with('user')->findOrFail($id);
        return view('mahasiswa.changepass', compact('mhs'));
    }
    
    public function updatePass(Request $request, string $id){
        $request->validate([
            'password' => ['required', 'confirmed', password::defaults()],
        ]);
        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect()->route('mahasiswa')->with('success', 'Password Mahasiswa diubah');
    }
}
