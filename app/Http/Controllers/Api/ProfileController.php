<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class ProfileController extends Controller
{

    public function store(Request $request)
    {
        $user = User::where('user_id', $request->user_id)->first();
        $profile = Profile::where('pasien_id', $user->user_idpasien)->first();

        //? check jika tidak ada
        if ($user && !Hash::check($request->password, $user->user_sandi)) {
            return response()->json([
                'status' => 400,
                'title' => 'Password Salah',
                'message' => 'Mohon pastikan kembali bahwa password yang anda masukkan sudah benar.',
                'data' => null,
                'token' => null,
            ], 400);
        }
        $kode = $request->category;
        $value = $request->value;
        $output = '';
        switch ($kode) {
            case '1':
                $profile->pasien_nama = $value;
                $profile->update();
                $output = 'Nama';
                break;
            case '2':
                $profile->pasien_nik = $value;
                $profile->update();
                $output = 'NIK';
                break;
            case '3':
                $profile->pasien_gender = $value;
                $profile->update();
                $output = 'Data Jenis Kelamin';
                break;
            case '4':
                $profile->pasien_alamat = $value;
                $profile->update();
                $output = 'Alamat';
                break;
            case '5':
                $user->user_sandi = bcrypt($value);
                $user->update();
                $output = 'Password';
                break;
        }
        $data = new UserResource($user);
        return response()->json([
            'status' => 200,
            'title' => 'Berhasil Mengubah ' . $output,
            'message' => $output . ' anda telah diubah.',
            'data' => $data,
            'token' => null,
        ], 200);
    }
}
