@extends('backend/layouts.utama')



@section('content3')
<main id="main" class="main">
<div class="pagetitle">
  <h1>Pengumuman</h1>
  <nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a>Beranda</a></li>
      <li class="breadcrumb-item">Pengumuman</li>
      <li class="breadcrumb-item active">Ubah Pengumuman</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<div class="container">
  <div class="row justify-content-left">
  <div class="pull-left">
                <h2>Tambah Data Pengumuman</h2>
            </div>
        <div class="card-body">
          <form method="POST" action="{{ route('pengumuman.update', $pengumuman->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
           
               
            
            <div class="form-group">
              <strong><label for="pengumuman_judul">Judul:</label><strong>
              <input type="text" class="form-control" id="pengumuman_judul" name="pengumuman_judul" value="{{ $pengumuman->pengumuman_judul }}" required>
            </div>

            <div class="form-group">
              <label for="pengumuman_deskripsi">Deskripsi:</label>
              <textarea class="form-control" id="pengumuman_deskripsi" name="pengumuman_deskripsi" rows="3" required>{{ $pengumuman->pengumuman_deskripsi }}</textarea>
            </div>

            <div class="form-group">
              <label for="pengumuman_tanggal">Tanggal:</label>
              <input type="date" class="form-control" id="pengumuman_tanggal" name="pengumuman_tanggal" value="{{ $pengumuman->pengumuman_tanggal }}" required>
            </div>

            <div class="form-group">
              <label for="pengumuman_status">Status:</label>
              <select class="form-control" id="pengumuman_status" name="pengumuman_status">
              <option value="pilih">Pilih Status</option>
                <option value="aktif" {{ $pengumuman->pengumuman_status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="tidak aktif" {{ $pengumuman->pengumuman_status == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
              </select>
            </div>
            <br>

            

            <div class="form-group">
              <label for="pengumuman_gambar">Gambar:</label>
              <input type="file" class="form-control-file" id="pengumuman_gambar" name="pengumuman_gambar">
            </div>
            <div class="card-img-top-container">
                        <img src="{{ asset('/storage/pengumuman/'.$pengumuman->pengumuman_gambar) }}" class="card-img-top" alt="{{ $pengumuman->pengumuman_judul }}" style="width: 50%; height: 50%; ">
                    </div>
            @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Terjadi kesalahan saat input data.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif</br>
            <button type="submit" class="btn btn-primary">Ubah</button>
            <a class="btn btn-secondary" href="{{ route('pengumuman.index') }}"> Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection