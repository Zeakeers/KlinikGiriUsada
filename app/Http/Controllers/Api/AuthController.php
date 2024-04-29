<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserResource;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthController extends Controller
{
    public function loginPasien(Request $request)
    {
        $credentials = Validator::make(
            $request->only('user_nowa', 'password', 'device_name'),
            [
                'user_nowa' => ['required', 'string', 'max:13',],
                'password' => ['required', 'min:8'],
                'device_name' => ['required'],
            ]
        );
        if ($credentials->fails()) {
            return response()->json([
                'status' => 403,
                'title' => 'Nomor Telepon & Kata Sandi Tidak Sesuai',
                'message' => 'Mohon pastikan kembali bahwa data yang anda masukkan sudah benar.',
                'data' => null,
                'token' => null,
            ], 403);
        }

        if (!FacadesAuth::attempt($request->only(['user_nowa', 'password']))) {
            return response()->json([
                'status' => 400,
                'title' => 'Nomor Telepon & Kata Sandi Tidak Sesuai',
                'message' => 'Mohon pastikan kembali bahwa data yang anda masukkan sudah benar.',
                'data' => null,
                'token' => null,
            ], 400);
        } else {
            $user = User::where('user_nowa', $request->input('user_nowa'))->first();

            $myuser = $request->user();


            if (auth('sanctum')->check()) {
                $request->user()->tokens()->delete();
            }

            $token = $user->createToken($request->device_name, ['pasien'])->plainTextToken;
            $myuser->remember_token = $token;
            $myuser->save();

            $data = new UserResource($user);

            return response()->json([
                'status' => 200,
                'title' => 'Login Berhasil',
                'message' => "Anda telah berhasil login & dapat mengakses aplikasi.",
                'data' => $data,
                'token' => $token,
            ], 200);
        }
    }

    public function registerPasien(Request $request)
    {
        DB::beginTransaction();

        try {

            $user = User::where('user_nowa', $request->input('user_nowa'))->first();
            if (!empty($user)) {
                return response()->json([
                    'status' => 400,
                    'title' => 'Nomor Telepon Tidak Bisa Digunakan',
                    'message' => "Nomor whatsapp yang anda masukkan tidak bisa didaftarkan. Coba gunakan nomor whatsapp lain.",
                    'data' => null,
                    'token' => null,
                ], 400);
            }
            $credentials = Validator::make($request->all(), [
                'user_nowa' => ['required', 'string', 'max:13', 'min:12', Rule::unique(User::class),],
                'password' => ['required', 'min:8'],
                'pasien_nik' => ['required', 'max:16', 'min:16'],
                'pasien_nama' => ['required', 'max:50'],
                'pasien_gender' => ['required', 'max:1'],
                'pasien_alamat' => ['required', 'max:100'],
                'device_name' => ['required'],
                // 'pasien_foto' => ['required'],
            ]);

            if ($credentials->fails()) {
                return response()->json([
                    'status' => 403,
                    'title' => 'Validasi Error',
                    'message' => 'Pastikan data sudah terisi semua dan sudah sesuai',
                    'data' => $credentials->errors(),
                    'token' => null,
                ], 403);
            }


            $profile = Profile::create([
                'pasien_nama' => $request->pasien_nama,
                'pasien_nik' => $request->pasien_nik,
                'pasien_gender' => $request->pasien_gender,
                'pasien_foto' => $request->pasien_foto,
                'pasien_alamat' => $request->pasien_alamat,
            ]);

            $user = User::create([
                'user_nowa' => $request->user_nowa,
                'user_sandi' => bcrypt($request->password),
                'user_idkategori' => 2,
                'user_idpasien' => $profile->pasien_id,
            ]);

            $token = $user->createToken($request->device_name, ['pasien'])->plainTextToken;
            $user->remember_token = $token;
            $user->update();

            DB::commit();
            $data = new UserResource($user);
            return response()->json([
                'status' => 201,
                'title' => 'Akun Telah Berhasil Dibuat',
                'message' => 'Akun anda berhasil dibuat. Anda sudah bisa mengakses aplikasi',
                'data' => $data,
                'token' => $token,
            ], 201);

            //! upload gambar
            // $file = $request->file('image');

            // // Get the original file name
            // $filename = $file->getClientOriginalName();

            // // Save the file to disk
            // $file->storeAs('images', $filename);

            // // Return a response
            // return response()->json(['filename' => $filename]);

            //! return userResource
            // return (new UserResource($user))->additional([
            //     'status' => 200,
            //     'message' => 'registered account successfully',
            //     'token' => $token,
            // ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => $e]);
        }
    }

    public function logoutPasien(Request $request)
    {
        $user = $request->user()->tokens()->delete();
        $data = new UserResource($user);
        return response()->json([
            'status' => 200,
            'title' => 'Logout Berhasil',
            'message' => 'Akun anda telah dikeluarkan dari aplikasi',
            'data' => null,
            'token' => null,
        ]);
    }

    public function getData()
    {
        $users = User::with('profile')->get();
        return UserResource::collection($users);
    }
}
