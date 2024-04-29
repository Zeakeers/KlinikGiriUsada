@extends('Backend.layouts.utama')  
       <!-- START FORM -->
       @section('konten')

       <form action="{{ route('dataadmin.update', $data->user_id) }}" method="post">
        @csrf
        @method('PUT')

        <main id="main" class="main">
        <div class="pagetitle">
  <h1>Ubah Data Admin</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a>Beranda</a></li>
      <li class="breadcrumb-item">Data Admin</li>
      <li class="breadcrumb-item active">Ubah Data Admin</li>
    </ol>
  </nav>    

  <div class="pull-left">
                <h2>Ubah Data Admin</h2>
            </div>
            @include('Backend.dataadmin.komponen.pesan')
            <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    {{ $data->user_id }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nomor Whatsapp</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='user_nowa' value="{{ $data->user_nowa }}" id="user_nowa">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Kata Sandi</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name='user_sandi' value="" id="user_sandi">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah kata sandi, Minimal Sandi jika dirubah 8 karakter</small>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">ID Kategori</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='id_kategori' value="{{ $data->user_idkategori }}" id="id_kategori" readonly>
                </div>
            </div>
            <style>
input[readonly] {
    opacity: 0.6;
}
</style>
            <!-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Terjadi kesalahan saat input data.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif -->
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                <a href="{{ route('dataadmin.index') }}" class="btn btn-secondary">Kembali</a></div>
            </div>
        </div>
    </div>
    </form>
        <!-- AKHIR FORM -->
        @endsection