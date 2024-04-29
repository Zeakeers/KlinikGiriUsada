@extends('Backend.layouts.utama')  
       <!-- START FORM -->
       @section('konten')

       <form action='{{ url('dataadmin') }}' method='post'>
        @csrf

        <main id="main" class="main">
        <div class="pagetitle">
  <h1>Tambah Data Admin</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a>Beranda</a></li>
      <li class="breadcrumb-item">Data Admin</li>
      <li class="breadcrumb-item active">Tambah Data Admin</li>
    </ol>
  </nav>    

  <div class="pull-left">
                <h2>Tambah Data Admin</h2>
            </div>
     
     
            
            @include('Backend.dataadmin.komponen.pesan')
            {{-- <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='id' value="{{ Session::get('id') }}" id="id">
                </div>
            </div> --}}
            <div class="mb-3 row">
                <label for="user_nowa" class="col-sm-2 col-form-label">Nomor Whatsapp</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='user_nowa' value="{{ Session::get('user_nowa')}}" id="user_nowa">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Kata Sandi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='user_sandi' value="{{ Session::get('user_sandi')}}" id="user_sandi">
                    <small class="text-muted">Minimal sandi 8 karakter</small>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">ID Kategori</label>
                <div class="col-sm-10">
                    {{ old('user_idkategori', 1) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
              
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                <a href="{{ route('dataadmin.index') }}" class="btn btn-secondary">Kembali</a></div>
               
            </div>
        </div>
    </div>
    </form>
        <!-- AKHIR FORM -->
        @endsection