<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Admin::with('user')->get();
        return view('admin.index', compact('data'));
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
            'dapartemen' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', password::defaults()],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->assignRole('admin');

        $admin = new Admin;
        $admin->user_id = $user->id;
        $admin->dapartemen = $request->dapartemen;
        $admin->save();

        return redirect('/admin')->with('success', 'Data Admin berhasil ditambahkan');
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
        $user_id = Admin::findOrFail($id)->user_id;

        $request->validate([
            'name' => 'required',
            'dapartemen' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($user_id),]
        ]);

        $admin = Admin::findOrFail($id);
        $admin->dapartemen = $request->dapartemen;
        $admin->save();
        
        $user = User::findOrFail($admin->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin')->with('success', 'Data Admin berhasil diubah');
    }

    /**
     * Remove the specified resource) from storage.
     */
    public function destroy(string $id)
    {
        $user_id = Admin::with('user')->findOrFail($id)->user_id;
        $user = User::findOrFail($user_id); 
        try {
            Admin::destroy($id);
            $user->removeRole('admin');
            User::destroy($user_id);
            return redirect()->back()->with('success', 'Admin berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Admin gagal dihapus '. $e->getMessage());
        }
    }

    public function changePass(string $id){
        $admin = Admin::with('user')->findOrFail($id);
        return view('admin.changepass', compact('admin'));
    }

    public function updatePass(Request $request, string $id){
        $request->validate([
            'password' => ['required', 'confirmed', password::defaults()],
        ]);
        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect()->route('admin')->with('success', 'Password Admin diubah');
    }
}
