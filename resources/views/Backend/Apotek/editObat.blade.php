@extends('backend/layouts.utama')

@section('content11')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Ubah Data Barang Obat</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="#">Data Barang Obat</a></li>
                    <li class="breadcrumb-item active">Ubah Data Barang Obat</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Ubah Data Barang Obat</h2>
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

        <form action="{{ route('apotek.updateObat', $barangObat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <strong><label for="kode_obat">Kode Obat:</label></strong>
                <input type="text" class="form-control" id="kode_obat" name="kode_obat" value="{{ $barangObat->kode_obat }}" required>
            </div>

            <div class="form-group">
                <label for="nama">Nama Obat:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $barangObat->nama }}" required>
            </div>

            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $barangObat->harga }}" required>
            </div>

            <div class="form-group">
                <label for="jumlah_stock">Jumlah Stock:</label>
                <input type="number" class="form-control" id="jumlah_stock" name="jumlah_stock" value="{{ $barangObat->jumlah_stock }}" required>
            </div></br>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-secondary" href="{{ route('daftar.transaksi') }}">Kembali</a>
        </form>
    </main>
@endsection
