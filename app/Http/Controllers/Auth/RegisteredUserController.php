<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Fakultas;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $data = Fakultas::with('jurusan')->get();
        return view('auth.register', compact('data'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nim' => ['required', 'numeric', 'digits_between:0,8'],
            'name' => ['required'],
            'fakultas' => ['required'],
            'jurusan' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('mahasiswa');

        Mahasiswa::create([
            'user_id' => $user->id,
            'fakultas_id' => $request->fakultas,
            'jurusan_id' => $request->jurusan,
            'nim' => $request->nim,
            'verifikasi' => 'pending'
        ]);

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
