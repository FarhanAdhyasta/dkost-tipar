<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
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
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::min(8) // Minimal 8 karakter
                    ->numbers() // Setidaknya satu angka
                    ->symbols() // Setidaknya satu karakter khusus
                    ->uncompromised(), // Tidak boleh menggunakan password yang mudah ditebak atau telah dikompromi
            ],
            'alamat' => ['required'],
            'hp' => ['required', 'numeric'],
            'nik' => ['required', 'numeric', 'digits:16'],
            'gender' => ['required', 'in:Laki-laki,Perempuan'],
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.lowercase' => 'Email harus menggunakan huruf kecil.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal harus terdiri dari :min karakter.',
            'password.mixed_case' => 'Password harus mengandung setidaknya satu huruf besar dan satu huruf kecil.',
            'password.numbers' => 'Password harus mengandung setidaknya satu angka.',
            'password.symbols' => 'Password harus mengandung setidaknya satu karakter khusus.',
            'password.uncompromised' => 'Password tidak boleh menggunakan kata sandi yang mudah ditebak atau telah dikompromi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'hp.required' => 'Nomor HP wajib diisi.',
            'hp.numeric' => 'Nomor HP harus berupa angka.',
            'nik.required' => 'NIK wajib diisi.',
            'nik.numeric' => 'NIK harus berupa angka.',
            'nik.digits' => 'NIK harus 16 digit.',
            'gender.required' => 'Jenis kelamin wajib diisi.',
            'gender.in' => 'Jenis kelamin tidak valid.',
        ]);
        
        

        $user = User::create([
            'name' => $request->name,
            'address' => $request->alamat,
            'phone_number' => $request->hp,
            'email' => $request->email,
            'nik' => $request->nik,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
