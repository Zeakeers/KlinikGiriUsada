@extends('backend/layouts.utama')  

@section('content2')
<main id="main" class="main">
<div class="pagetitle">
  <h1>Ubah Data Pasien</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a>Dashboard</a></li>
      <li class="breadcrumb-item">Daftar Pasien</li>
      <li class="breadcrumb-item active">Ubah Data Pasien</li>
    </ol>
  </nav>
</div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ubah Data Pasien</h2>
            </div>
            
        </div>
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
    @endif

    <form action="{{ route('pasiens.update',$pasiens->pasien_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama:</strong>
                    
                    <input type="text" name="pasien_nama" value="{{ $pasiens->pasien_nama }}" class="form-control" placeholder="Nama">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIK:</strong>
                    
                    <input type="text" name="pasien_nik" value="{{ $pasiens->pasien_nik }}" class="form-control" placeholder="NIK">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Lahir:</strong>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $pasiens->tanggal_lahir }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat:</strong>
                    <textarea class="form-control" style="height:150px" name="pasien_alamat" placeholder="Alamat">{{ $pasiens->pasien_alamat }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenis Kelamin:</strong>
                    <br>
                    <label class="radio-inline">
                      <input type="radio" name="pasien_gender" value="L" @if($pasiens->pasien_gender=="L") checked @endif>Laki-laki
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="pasien_gender" value="P" @if($pasiens->pasien_gender=="P") checked @endif>Perempuan
                    </label>
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12">
</br>
              <button type="submit" class="btn btn-primary">Ubah</button>
                <a class="btn btn-secondary" href="{{ route('pasiens.tampil') }}"> Kembali</a>
            </div>
        </div>

    </form>
@endsection
