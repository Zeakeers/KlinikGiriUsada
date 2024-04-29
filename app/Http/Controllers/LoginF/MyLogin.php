<?php

namespace App\Http\Controllers\LoginF;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MyLogin extends Controller
{

    public function login()
    {
        $users = User::all();
        return view('loginku.loginku', compact('users'));
    }

    public function loginme(Request $request)
    {
        $credentials = $request->only('user_nowa', 'password');

        if (FacadesAuth::attempt($request->only(['user_nowa', 'password']))) {
            $user = User::where('user_nowa', $request->input('user_nowa'))->first();
            $token = $request->user()->createToken('auth-token')->plainTextToken;

            // Login berhasil, arahkan ke dashboard
            return redirect()->route('dashboard');
        } else {
            $user = User::where('user_nowa', $request->input('user_nowa'))->first();

            if (!$user) {
                // Nomor telepon tidak ditemukan di database
                throw ValidationException::withMessages([
                    'user_nowa' => trans('Nomor Telepon Salah'),
                ]);
            } else {
                if (!Hash::check($request->input('password'), $user->password)) {
                    // Password salah
                    throw ValidationException::withMessages([
                        'password' => trans('Kata Sandi Salah'),
                    ]);
                }
            }
        }
    }
}
