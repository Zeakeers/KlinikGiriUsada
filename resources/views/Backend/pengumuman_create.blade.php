@extends('backend/layouts.utama')

@section('content1')
<main id="main" class="main">
<div class="pagetitle">
  <h1>Tambah Data pengumuman</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a>Beranda</a></li>
      <li class="breadcrumb-item">Pengumuman</li>
      <li class="breadcrumb-item active">Tambah Data Pengumuman</li>
    </ol>
  </nav>    

  <div class="pull-left">
                <h2>Tambah Data Pengumuman</h2>
            </div>

</div><!-- End Page Title -->
<div class="container">
        <form action="{{ route('pengumuman.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
            <strong> <label for="judul">Judul:</label></strong>
                <input type="text" class="form-control" id="judul" name="pengumuman_judul" required>
            </div>
            <div class="form-group">
            <strong> <label for="deskripsi">Deskripsi:</label></strong>
                <textarea class="form-control" id="deskripsi" name="pengumuman_deskripsi" rows="3" required></textarea>
            </div>
            <div class="form-group">
            <strong><label for="tanggal">Tanggal:</label></strong>
                <input type="date" class="form-control" id="tanggal" name="pengumuman_tanggal" required>
            </div>
            <div class="form-group">
            <strong><label for="status">Status:</label></strong>
                <select class="form-control" id="status" name="pengumuman_status" required>
                <option value="">Pilih Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="tidak aktif">Tidak Aktif</option>
                </select>
            </div>
            </br>
            <div class="form-group">
            <strong><label for="gambar">Gambar:</label></strong>
                <input type="file" class="form-control-file" id="gambar" name="pengumuman_gambar" required>
            </div>
</br>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-secondary" href="{{ route('pengumuman.index') }}"> Kembali</a>
        </form>
    </div>
@endsection