<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;


class ResetPasswordController extends Controller
{

    public function ubahPassword(Request $request)
    {
        $user = User::where('user_nowa', $request->user_nowa)->first();
        if (empty($user)) {
            return response()->json([
                'status' => 400,
                'title' => 'Nomor Telepon Tidak Dapat Ditemukan',
                'message' => 'Nomor telepon yang anda masukkan tidak terdaftar pada layanan kami.',
                'token' => null,
            ], 400);
        }
        $user->user_sandi = bcrypt($request->password);
        $user->update();
        return response()->json([
            'status' => 200,
            'title' => 'Berhasil Mengubah Kata Sandi',
            'message' => 'Kata sandi anda telah berhasil diubah',
            'token' => null,
        ], 200);
    }
    public function checkNomor(Request $request)
    {
        $nomor = $request->user_nowa;
        $user = User::where('user_nowa', $nomor)->first();

        if (!empty($user)) {
            if (auth('sanctum')->check()) {
                $request->user()->tokens()->delete();
            }
            $token = $user->createToken('mobile', ['pasien'])->plainTextToken;
            $user->remember_token = $token;
            $user->save();
            return response()->json([
                'status' => 200,
                'title' => 'Nomor Tersedia',
                'message' => 'Nomor Telepon Tersedia Pada Database',
                'token' => $token,
            ], 200);
        }
        return response()->json([
            'status' => 400,
            'title' => 'Nomor Telepon Tidak Dapat Ditemukan',
            'message' => 'Nomor telepon yang anda masukkan tidak terdaftar pada layanan kami.',
            'token' => null,
        ], 400);
    }
}
