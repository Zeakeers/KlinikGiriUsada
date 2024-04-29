<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class dataadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //Index untuk menampilkan semua data
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 3;
        if (strlen($katakunci)) {
            $data = User::where('user_id', 'like', "%$katakunci%")
            ->orWhere('user_nowa', 'like', "%$katakunci%")
            // ->orWhere('phone', 'like', "%$katakunci%")
            // ->orWhere('password', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        } else {
            $data = User::orderBy('user_id', 'desc')->paginate($jumlahbaris);
        }
        return view('Backend.dataadmin.data-admin')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */

    //create untuk menampilkan form dimana form akan digunakan untuk memasukkan data baru
    public function create()
    {
        return view('Backend.dataadmin.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    //store untuk memasukkan data baru ke database
    public function store(Request $request)
    {
        FacadesSession::flash('user_nowa', $request->user_nowa);
        FacadesSession::flash('user_sandi', $request->user_sandi);

        $request->validate([
            // 'user_id' => 'required|numeric|unique:users,id',
            'user_nowa' => 'required|unique:users,user_nowa|min:12|max:13',
            'user_sandi' => 'required|min:8',
            'confirmed', Rules\Password::defaults(),
        ],[
            'user_nowa.required'=>'NOMOR WHATSAPP WAJIB DIISI',
            'user_sandi.required'=>'KATA SANDI WAJIB DIISI',
            'user_nowa.unique' =>'NOMOR WHATSAPP SUDAH TERDAFTAR',
            'user_nowa' => [
                'min' => 'NOMOR WHATSAPP MINIMAL 12 ANGKA',
                'max' => 'NOMOR WHATSAPP MINIMAL 12 ANGKA'
            ],
            'user_sandi' => [
                'min' => 'SANDI WAJIB 8 KARAKTER',
            ],
        ]);
        $data = [
            // 'user_id' => $request->id,
            'user_nowa' => $request->user_nowa,
            'user_sandi' => Hash::make($request->user_sandi),
            'user_idkategori' => $request->input('user_idkategori', 1),
        ];
        // return redirect(RouteServiceProvider::HOME);
        User::create($data);
        return redirect()->to('dataadmin')->with('success', 'DATA BERHASIL DITAMBAHKAN');
    }

    /**
     * Display the specified resource.
     */

    //show untuk menampilkan detail data
    public function show(string $user_id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user_id)
    {
        $data = User::where('user_id', $user_id)->first();
        return view('Backend.dataadmin.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_id)
    {
        $request->validate([
            'user_nowa' => 'required|min:12|max:13',
            'user_sandi' => 'nullable|min:8', // Mengubah required menjadi nullable pada password
        ], [
            'user_nowa.required' => 'NAMA WAJIB DIISI',
            'user_nowa.min' => 'NOMOR WHATSAPP MINIMAL 12 ANGKA',
            'user_nowa.max' => 'NOMOR WHATSAPP MAKSIMAL 13 ANGKA',
            'user_sandi' => [
                'min' => 'SANDI WAJIB 8 KARAKTER',
            ],
        ]);
    
        $data = [
            'user_nowa' => $request->user_nowa,
        ];
    
        if ($request->filled('user_sandi')) { // Cek apakah password diisi atau tidak
            $data['user_sandi'] = Hash::make($request->user_sandi);
        }
    
        User::where('user_id', $user_id)->update($data);
        return redirect()->to('dataadmin')->with('success', 'DATA BERHASIL DIPERBARUI');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('user_id', $id)->delete();
        return redirect()->to('dataadmin')->with('success', 'DATA BERHASIL DIHAPUS');
    }
}