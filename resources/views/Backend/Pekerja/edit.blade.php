@extends('backend/layouts.utama')

@section('content14')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Ubah Data Pekerja</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Beranda</a></li>
                <li class="breadcrumb-item"><a>Data Pekerja</a></li>
                <li class="breadcrumb-item active">Ubah Data Pekerja</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ubah Data Pekerja</h2>
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

    <form action="{{ route('pekerja.update', $pekerja->pekerja_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
        <strong><label for="pekerja_nama">Nama:</label><strong>
            <input type="text" name="pekerja_nama" value="{{ $pekerja->pekerja_nama }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pekerja_nowa">Nomor Whatsapp:</label>
            <input type="number" name="pekerja_nowa" value="{{ $pekerja->pekerja_nowa }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pekerja_alamat">Alamat:</label>
            <textarea name="pekerja_alamat" class="form-control" required>{{ $pekerja->pekerja_alamat }}</textarea>
        </div></br>
        <div class="form-group">
            <label for="pekerja_foto">Foto:</label>
            <input type="file" name="pekerja_foto" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="pekerja_idkategori">Kategori Pekerja:</label>
            <select name="pekerja_idkategori" class="form-control" required>
                <option value="">Pilih Kategori Pekerja</option>
                @foreach($kategoriPekerja as $kategori)
                        <option value="{{ $kategori->katekerja_id }}" {{ $pekerja->pekerja_idkategori == $kategori->katekerja_id ? 'selected' : '' }}>{{ $kategori->katekerja_nama }}</option>
                    @endforeach
            </select>
        </div></br>
        <button type="submit" class="btn btn-primary">Save</button>
    
                <a class="btn btn-secondary" href="{{ route('pekerja.index') }}">Kembali</a>
         
    </form>
</main>
@endsection